<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_DB {

    private static OW_Base_Db_Driver $active_db;
    private static OW_Base_Db_Forge $forge;
    private static OW_Base_Db_Utility $utility;


    public static function initialize(array $db_config){
        /**
         * initialisation de la premiere base de données comme celle par defaut.
         */
        self::$active_db = OW_Base_Db::DB($db_config);
    }

    /**
     * @return OW_Base_Db_Driver
     */
    public static function getActiveDb(): OW_Base_Db_Driver
    {
        return self::$active_db;
    }

    /**
     * @param OW_Base_Db_Driver $active_db
     */
    public static function setActiveDb(OW_Base_Db_Driver $active_db): void
    {
        self::$active_db = $active_db;
    }

    /**
     * @return OW_Base_Db_Forge
     */
    public static function getForge(): OW_Base_Db_Forge
    {
        return self::$forge;
    }

    /**
     * @param OW_Base_Db_Forge $forge
     */
    public static function setForge(OW_Base_Db_Forge $forge): void
    {
        self::$forge = $forge;
    }

    /**
     * @return OW_Base_Db_Utility
     */
    public static function getUtility(): OW_Base_Db_Utility
    {
        return self::$utility;
    }

    /**
     * @param OW_Base_Db_Utility $utility
     */
    public static function setUtility(OW_Base_Db_Utility $utility): void
    {
        self::$utility = $utility;
    }


}