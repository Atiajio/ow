<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

interface OW_Migration_Interface {

    /**
     * Function qui lance l'execution de la migration en avant
     * @return true
     */
     static function migrate():bool;

    /**
     * Function qui lance l'execution de la migration en arriere
     * @return true
     */
    static function rebase():bool;

}