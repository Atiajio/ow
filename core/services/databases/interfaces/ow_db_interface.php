<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 *
 */

interface OW_Db_Interface  {

    /**
     * Retourne un driver sur la BD
     *
     * @param string $params
     * @return mixed
     */
    public static  function DB($params = '');

}