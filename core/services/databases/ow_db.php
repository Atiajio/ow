<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_DB {

    private static $db;
    private static $forge;
    private static $all_db;

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


    }

    /**
     * @return mixed
     */
    public static function getDb()
    {
        return self::$db;
        debug("je suis bien dans la fonction de la db");
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