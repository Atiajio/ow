<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Controller extends OW_Base_Controller{

    public function respond(){
        /**
         * Generating the responce depending on the type of the UI used
         */

        $this->response->setContentSent(true);

    }
}