<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * Interface de base pour les gestion des objects de type request et response 
 */

 interface OW_Package_Interface {

    public function withHeader($name, $value);
    public function getHeaderLine($name);
    public function getProtocolVersion();
    public function withProtocolVersion($version);
    public function getHeaders();
    public function hasHeader($name);
    public function getHeader($name);
    public function withAddedHeader($name, $value);
    public function withoutHeader($name);
    public function getBody();
    public function withBody($body);
 }