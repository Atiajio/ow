<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_DB {

    public static $db;
    public static $forge;
    public static $all_db;

    /**
     * Initialize all databases
     *
     * $param = array(
        0 => array(
     *      'database_name' => "database",
     *      ...
     * ),
     *  ...
     * );
     *
     * @param array $params
     */
    public function initialize(array $params){

        self::$all_db = $params;

        /**
         * initialisation de la premiere base de données comme celle par defaut.
         */
        self::$db = OW_Base_Db::DB($params[0]);
    }

    /**
     * @return mixed
     */
    public static function getDb()
    {
        return self::$db;

    }

    /**
     * @param mixed $db
     */
    public static function setDb($db)
    {
        self::$db = $db;
    }

    /**
     * @return mixed
     */
    public static function getForge()
    {
        return self::$forge;
    }

    /**
     * @param mixed $forge
     */
    public static function setForge($forge)
    {
        self::$forge = $forge;
    }

    /**
     * @return mixed
     */
    public static function getAllDb()
    {
        return self::$all_db;
    }

    /**
     * @param mixed $all_db
     */
    public static function setAllDb($all_db)
    {
        self::$all_db = $all_db;
    }


}