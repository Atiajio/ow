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

            OW_System::$Response = new OW_Response();

        }
       
        return OW_System::next(OW_System::$Request, OW_System::$Response, "OW_System::next");

    }

    /**
     * Fonction d'enregistrement des routes
     */
    public static function register_route(){
        debug("Register Middleware");
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

                // ici on a atteind le fond de la ligne , ce qui signifie qu'on a atteind le controller
                debug("je suis dans le Contoller");
                
                // Actions du controller



                // retour de la reponse
                // ici il va falloir retourner la vrai reponse du controller et ce que je suis entrain de faire la
                return $response;
            }
        } 
    }
 }