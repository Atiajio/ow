<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Command extends OW_Object implements OW_Command_Interface {
    
    /**
     * Function qui declanchce l'execution de la commande
     *
     * @param array $params
     * @return string
     */
    public static function run(array $params): string
    {
        // TODO: Implement run() method.
    }

    /**
     * Function qui retourne l aide sur une commande
     * @param array $params
     * @return string
     */
    public static function help(array $params): string
    {
        // TODO: Implement help() method.
    }
}