<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Db implements  OW_Db_Interface {


    public static  function DB($params = '')
    {

        /**
         * Tester s il a choisi la bd par defaut
         */

        if (empty($params['dbdriver']))
        {
            debug('You have not selected a database type to connect to.', true);
        }

        $driver = 'OW_'. ucwords($params['dbdriver']) .'_Db_Driver';


        $DB = new $driver($params);

        $DB->initialize();

        return $DB;
    }

}