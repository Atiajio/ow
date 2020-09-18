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
    public static $Request = null;
    public static $Response = null;
    public static $DB = array();

    /**
     * Private
     */
    private static $Routes = array();


    public static $Middlewares = array();
    private static $middleware_analysed = -1;
    private static $middleware_analysing_incoming_request = true;
    private static $Default_controller = "Starter";
    private static $Default_method = "index";


    /**
     * Fonction d'enregistrement des middlewares
     */
    public static function register_middleware(OW_Middleware $new_middleware){
        
        self::$Middlewares[] = $new_middleware;

    }

    /**
     * Fonction de lancement des middlewares
     */
    public static function launch_middlewares(){

        // Controlle de l'existance de la requete

        if (is_null(OW_System::$Request)) {

            OW_System::$Request = new OW_Request();

        }

        // Controlle de l'existance de la reponse
        
        if (is_null(OW_System::$Response)) {

            OW_System::$Response = new OW_Response(OW_System::$Request);

        }
       
        return OW_System::next(OW_System::$Request, OW_System::$Response, "OW_System::next");

    }

    /**
     * Fonction d'enregistrement des routes
     */
    public static function register_route(){
        debug("Register Route");
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
      */
     public static function get_default_method(){

         return self::$Default_method ;

     }

    /**
     * Fonction qui execute de maniere recursive les middlewares
     */
    public static function next (OW_Request $request, OW_Response $response, $next) {
        
        if (OW_System::$middleware_analysing_incoming_request == true) {

            // Middleware sur les requetes entrantes
            if (OW_System::$middleware_analysed < sizeof(OW_System::$Middlewares)-1 ) {
                
                // on prend le middleware suivant, sachant qu on commence a -1 pour eviter les bugs
                OW_System::$middleware_analysed++;

                return OW_System::$Middlewares[OW_System::$middleware_analysed]->run($request, $response, $next);

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
                        }
                    }

                }


                // retour de la reponse
                // ici il va falloir retourner la vrai reponse du controller et ce que je suis entrain de faire la
                return $response;
            }
        } 
    }

 }