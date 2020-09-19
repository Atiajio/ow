<?php

interface OW_Db_Utility_Interface {

    /**
     * Return the list of existing databases
     * @return mixed
     */
     function list_databases();

    // --------------------------------------------------------------------

    /**
     * Determine if a particular database exists
     *
     * @param	string	$database_name
     * @return	bool
     */
     function database_exists($database_name);

    // --------------------------------------------------------------------

    /**
     * Optimize Table
     *
     * @param	string	$table_name
     * @return	mixed
     */
     function optimize_table($table_name);

    // --------------------------------------------------------------------

    /**
     * Optimize Database
     *
     * @return	mixed
     */
     function optimize_database();

    // --------------------------------------------------------------------

    /**
     * Repair Table
     *
     * @param	string	$table_name
     * @return	mixed
     */
     function repair_table($table_name);

    // --------------------------------------------------------------------

    /**
     * Generate CSV from a query result object
     *
     * @param	OW_Base_Result	$query		Query result object
     * @param	string	$delim		Delimiter (default: ,)
     * @param	string	$newline	Newline character (default: \n)
     * @param	string	$enclosure	Enclosure (default: ")
     * @return	string
     */
     function csv_from_result(OW_Base_Result $query, $delim = ',', $newline = "\n", $enclosure = '"');

    // --------------------------------------------------------------------

    /**
     * Generate XML data from a query result object
     *
     * @param	OW_Base_Result	$query	Query result object
     * @param	array	$params	Any preferences
     * @return	string
     */
     function xml_from_result(OW_Base_Result $query, $params = array());

    // --------------------------------------------------------------------

    /**
     * Database Backup
     *
     * @param	array	$params
     * @return	string
     */
     function backup($params = array());
    
}