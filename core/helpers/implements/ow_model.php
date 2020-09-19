<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Model extends OW_Base_Model{

    public function __construct()
    {
        OW_DB::getDb();
    }

}