<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * Class de representation et gestion de la reponse en cours
 */

 class OW_Response extends OW_Base_Package{
    
    public function getStatusCode()
    {

    }

    
    public function withStatus($code, $reasonPhrase = '')
    {

    }

    public function getReasonPhrase()
    {
        
    }
 }