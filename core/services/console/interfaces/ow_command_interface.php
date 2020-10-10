<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 *
 */

interface OW_Command_Interface  {

    /**
     * Function qui declanchce l'execution de la commande
     *
     * @param array $params
     * @return string
     */
    public static function run(array $params) : string;

    /**
     * Function qui retourne l aide sur une commande
     * @param array $params
     * @return string
     */
    public static function help(array $params) : string;

}