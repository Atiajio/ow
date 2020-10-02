<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * Classe de gestion du system
 */

 class OW_System extends OW_Object{

    /**
     * Variables globales du systeme
     */

    /**
     * Public 
     */

    public static OW_Request $Request;
    public static OW_Response $Response;
    public static OW_Base_Db_Driver $db;
    public static OW_Base_Db_Driver $tmp_db;

    /**
      * Private
      */

    private static array $databases = array();
    private static array $middleware = array();
    private static int $middleware_analysed = -1;
    private static bool $middleware_analysing_incoming_request = true;
    private static string $Default_controller = "Starter";
    private static string $Default_method = "index";
    private static string $base_url = "http://localhost/ow";
    private static bool $ajax_request = false;


    public function __construct()
    {


    }


     /**
      * Fonction d'enregistrement des middlewares
      *
      * @param OW_Middleware $new_middleware
      */
    public static function register_middleware(OW_Middleware $new_middleware)
    {
        
        self::$middleware[] = $new_middleware;

    }

     /**
      * Fonction d'enregistrement des middlewares
      *
      * @param array $db_config
      */
     public static function register_db(array $db_config)
     {

         self::$databases[] = $db_config;

     }

     public static function register_base_url(string $url)
     {

         self::$base_url = $url;

     }

     /**
      * @param int $index
      */
     public static function init_db(int $index)
     {
        if (isset(self::$databases[$index])) {

            OW_DB::initialize(self::$databases[$index]);
            self::$db = OW_DB::getActiveDb();

        } else {

            if (!empty(self::$databases)) {

                debug("Index database does not exist ! ", true);

            }

        }
     }

     /**
      * @param int $index
      */
     public static function init_tmp_db(int $index)
     {
         if (isset(self::$databases[$index])) {

             OW_DB::initialize(self::$databases[$index]);
             self::$tmp_db = OW_DB::getActiveDb();

         } else {

             debug("Index database does not exist ! ", true);

         }
     }

    /**
     * Fonction de lancement des middlewares
     */
    public static function launch_middleware(){

        /**
         * Controlle de l'existance de la requete
         */
        OW_System::$Request = new OW_Request();

        /**
         * Controlle de l'existance de la reponse
         */
        
        OW_System::$Response = new OW_Response(OW_System::$Request);

        return OW_System::next(OW_System::$Request, OW_System::$Response, "OW_System::next");

    }

     /**
      * Fonction d'enregistrement du default controller
      *
      * @param $controller_name
      */
     public static function register_default_controller($controller_name){

         self::$Default_controller = $controller_name;

     }

     /**
      * Fonction permettant de retouner  default controller
      *
      * @return string
      */
     public static function get_default_controller(){

         return self::$Default_controller ;

     }

     /**
      * Fonction d'enregistrement de la default method
      *
      * @param $controller_method
      */
     public static function register_default_method($controller_method){

         self::$Default_method = $controller_method;

     }

     /**
      * Fonction permettant de retouner  la default method
      *
      * @return string
      */
     public static function get_default_method(){

         return self::$Default_method ;

     }

     /**
      *
      * Fonction qui execute de maniere recursive les middlewares
      *
      * @param OW_Request $request
      * @param OW_Response $response
      * @param $next
      * @return OW_Response
      */
    public static function next (OW_Request $request, OW_Response $response, $next) {
        
        if (OW_System::$middleware_analysing_incoming_request == true) {

            // Middleware sur les requetes entrantes
            if (OW_System::$middleware_analysed < sizeof(OW_System::$middleware)-1 ) {
                
                // on prend le middleware suivant, sachant qu on commence a -1 pour eviter les bugs
                OW_System::$middleware_analysed++;

                return OW_System::$middleware[OW_System::$middleware_analysed]->run($request, $response, $next);

            } else {

                // Actions du controller
                $controller = OW_System::$Request->getAttributes()['controller'];
                $controller = new $controller();

                $method = OW_System::$Request->getAttributes()['method'];
                $params = OW_System::$Request->getAttributes()['params'];

                if ( ! ($controller instanceof  OW_Controller) ) {

                    debug(" Controller '". OW_System::$Request->getAttributes()['controller'] ."' is not instance of OW_Controller ");


                } else {


                    if (method_exists($controller, $method)){

                        $controller->setRequest(OW_System::$Request);
                        $controller->setResponse(OW_System::$Response);

                        call_user_func_array([$controller, $method], $params);

                    }else {

                        if (SYSTEM_MODE == 'DEV') {

                            debug("Method '" . $method . "' not found in Controller '" . OW_System::$Request->getAttributes()['controller'] . "'");

                        } else {

                            /**
                             * inteligent managing
                             */
                            debug("Method '" . $method . "' not found in Controller '" . OW_System::$Request->getAttributes()['controller'] . "' (inteligent managing)");
                        }
                    }

                }

                /**
                 * Retour de la reponse du controller
                 */
                return $controller->getResponse();
            }
        } 
    }

     /**
      * @return OW_Request
      */
     public static function getRequest(): OW_Request
     {
         return self::$Request;
     }

     /**
      * @param OW_Request $Request
      */
     public static function setRequest(OW_Request $Request): void
     {
         self::$Request = $Request;
     }

     /**
      * @return OW_Response
      */
     public static function getResponse(): OW_Response
     {
         return self::$Response;
     }

     /**
      * @param OW_Response $Response
      */
     public static function setResponse(OW_Response $Response): void
     {
         self::$Response = $Response;
     }

     /**
      * @return OW_Base_Db_Driver
      */
     public static function getDb(): OW_Base_Db_Driver
     {
         return self::$db;
     }

     /**
      * @param OW_Base_Db_Driver $db
      */
     public static function setDb(OW_Base_Db_Driver $db): void
     {
         self::$db = $db;
     }

     /**
      * @return OW_Base_Db_Driver
      */
     public static function getTmpDb(): OW_Base_Db_Driver
     {
         return self::$tmp_db;
     }

     /**
      * @param OW_Base_Db_Driver $tmp_db
      */
     public static function setTmpDb(OW_Base_Db_Driver $tmp_db): void
     {
         self::$tmp_db = $tmp_db;
     }

     /**
      * @return array
      */
     public static function getDatabases(): array
     {
         return self::$databases;
     }

     /**
      * @param array $databases
      */
     public static function setDatabases(array $databases): void
     {
         self::$databases = $databases;
     }

     /**
      * @return array
      */
     public static function getMiddleware(): array
     {
         return self::$middleware;
     }

     /**
      * @param array $middleware
      */
     public static function setMiddleware(array $middleware): void
     {
         self::$middleware = $middleware;
     }

     /**
      * @return int
      */
     public static function getMiddlewareAnalysed(): int
     {
         return self::$middleware_analysed;
     }

     /**
      * @param int $middleware_analysed
      */
     public static function setMiddlewareAnalysed(int $middleware_analysed): void
     {
         self::$middleware_analysed = $middleware_analysed;
     }

     /**
      * @return bool
      */
     public static function isMiddlewareAnalysingIncomingRequest(): bool
     {
         return self::$middleware_analysing_incoming_request;
     }

     /**
      * @param bool $middleware_analysing_incoming_request
      */
     public static function setMiddlewareAnalysingIncomingRequest(bool $middleware_analysing_incoming_request): void
     {
         self::$middleware_analysing_incoming_request = $middleware_analysing_incoming_request;
     }

     /**
      * @return string
      */
     public static function getBaseUrl(): string
     {
         return self::$base_url;
     }

     /**
      * @param string $base_url
      */
     public static function setBaseUrl(string $base_url): void
     {
         self::$base_url = $base_url;
     }

     /**
      * @return bool
      */
     public static function isAjaxRequest(): bool
     {
         return self::$ajax_request;
     }

     /**
      * @param bool $ajax_request
      */
     public static function setAjaxRequest(bool $ajax_request): void
     {
         self::$ajax_request = $ajax_request;
     }




 }