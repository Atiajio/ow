<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Model extends OW_Object implements OW_Model_Interface {

    public function read($data){
        debug($data);
    }

}