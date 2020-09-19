<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 *
 */

interface OW_Db_Interface  {

    public static  function &DB($params = '');

}