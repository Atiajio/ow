<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

interface OW_Db_Forge_Interface {

    /**
     * Create database
     *
     * @param	string	$db_name
     * @return	bool
     */
     function create_database($db_name);

    // --------------------------------------------------------------------

    /**
     * Drop database
     *
     * @param	string	$db_name
     * @return	bool
     */
     function drop_database($db_name);

    // --------------------------------------------------------------------

    /**
     * Add Key
     *
     * @param	string	$key
     * @param	bool	$primary
     * @return	CI_DB_forge
     */
     function add_key($key, $primary = FALSE);

    // --------------------------------------------------------------------

    /**
     * Add Field
     *
     * @param	array	$field
     * @return	CI_DB_forge
     */
     function add_field($field);

    // --------------------------------------------------------------------

    /**
     * Create Table
     *
     * @param	string	$table		Table name
     * @param	bool	$if_not_exists	Whether to add IF NOT EXISTS condition
     * @param	array	$attributes	Associative array of table attributes
     * @return	bool
     */
     function create_table($table, $if_not_exists = FALSE, array $attributes = array());

    // --------------------------------------------------------------------

    /**
     * Drop Table
     *
     * @param	string	$table_name	Table name
     * @param	bool	$if_exists	Whether to add an IF EXISTS condition
     * @return	bool
     */
     function drop_table($table_name, $if_exists = FALSE);

    // --------------------------------------------------------------------

    /**
     * Rename Table
     *
     * @param	string	$table_name	Old table name
     * @param	string	$new_table_name	New table name
     * @return	bool
     */
     function rename_table($table_name, $new_table_name);

    // --------------------------------------------------------------------

    /**
     * Column Add
     *
     * @todo	Remove deprecated $_after option in 3.1+
     * @param	string	$table	Table name
     * @param	array	$field	Column definition
     * @param	string	$_after	Column for AFTER clause (deprecated)
     * @return	bool
     */
     function add_column($table, $field, $_after = NULL);

    // --------------------------------------------------------------------

    /**
     * Column Drop
     *
     * @param	string	$table		Table name
     * @param	string	$column_name	Column name
     * @return	bool
     */
     function drop_column($table, $column_name);

    // --------------------------------------------------------------------

    /**
     * Column Modify
     *
     * @param	string	$table	Table name
     * @param	string	$field	Column definition
     * @return	bool
     */
     function modify_column($table, $field);

}