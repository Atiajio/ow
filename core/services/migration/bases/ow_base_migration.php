<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Migration extends OW_Object implements OW_Migration_Interface{


    /**
     * Function qui lance l'execution de la migration en avant
     * @return true
     */
    static function migrate(): bool
    {
        // TODO: Implement migrate() method.
    }

    /**
     * Function qui lance l'execution de la migration en arriere
     * @return true
     */
    static function rebase(): bool
    {
        // TODO: Implement rebase() method.
    }
}