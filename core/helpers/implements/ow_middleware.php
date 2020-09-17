<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Middleware extends OW_Base_Middleware{

    public function run(OW_Request $request, OW_Response $response, $next)
    {
        // Actions sur la requette avant l'envoit au controller
        // ici ...
        debug("OW Framework middleware on request");

        $new_response =  $next($request, $response, $next);

        // Actions sur la reponse avant le renvoit au client
        // ici ...
        debug("OW Framework middleware on response");

        return $new_response;

    }
}