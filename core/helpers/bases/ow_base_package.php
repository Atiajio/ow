<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * Classe de base pour les requetes et le reponses
 */

class OW_Base_Package extends OW_Object implements OW_Package_Interface{

    public function withHeader($name, $value){
        
    }

    public function getHeaderLine($name){
        
    }
    
    public function getProtocolVersion(){

    }
    
    public function withProtocolVersion($version){

    }
    
    public function getHeaders(){

    }
    
    public function hasHeader($name){

    }
    
    public function getHeader($name){

    }
    
    public function withAddedHeader($name, $value){

    }

    public function withoutHeader($name){

    }

    public function getBody(){

    }

    public function withBody($body){

    }

 }