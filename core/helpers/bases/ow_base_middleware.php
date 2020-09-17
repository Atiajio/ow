<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Middleware implements OW_Middleware_Interface{


    public function run(OW_Request $request, OW_Response $response, $next)
    {
        
        debug("OW Framework middleware with the simpliest run() method !");
        
        // Actions sur la requette avant l'envoit au controller
        // ici ...

        $new_response =  $next($request, $response, $next);

        // Actions sur la reponse avant le renvoit au client
        // ici ...

        return $new_response;
    }
}