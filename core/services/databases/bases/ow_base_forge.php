<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Forge implements  OW_Forge_Interface {

    /**
     * Create database
     *
     * @param	string	$db_name
     * @return	bool
     */
    function create_database($db_name){}

    // --------------------------------------------------------------------

    /**
     * Drop database
     *
     * @param	string	$db_name
     * @return	bool
     */
    function drop_database($db_name){}

    // --------------------------------------------------------------------

    /**
     * Add Key
     *
     * @param	string	$key
     * @param	bool	$primary
     * @return	CI_DB_forge
     */
    function add_key($key, $primary = FALSE){}

    // --------------------------------------------------------------------

    /**
     * Add Field
     *
     * @param	array	$field
     * @return	CI_DB_forge
     */
    function add_field($field){}

    // --------------------------------------------------------------------

    /**
     * Create Table
     *
     * @param	string	$table		Table name
     * @param	bool	$if_not_exists	Whether to add IF NOT EXISTS condition
     * @param	array	$attributes	Associative array of table attributes
     * @return	bool
     */
    function create_table($table, $if_not_exists = FALSE, array $attributes = array()){}

    // --------------------------------------------------------------------

    /**
     * Create Table
     *
     * @param	string	$table		Table name
     * @param	bool	$if_not_exists	Whether to add 'IF NOT EXISTS' condition
     * @param	array	$attributes	Associative array of table attributes
     * @return	mixed
     */
    function _create_table($table, $if_not_exists, $attributes){}

    // --------------------------------------------------------------------

    /**
     * CREATE TABLE attributes
     *
     * @param	array	$attributes	Associative array of table attributes
     * @return	string
     */
    function _create_table_attr($attributes){}
    // --------------------------------------------------------------------

    /**
     * Drop Table
     *
     * @param	string	$table_name	Table name
     * @param	bool	$if_exists	Whether to add an IF EXISTS condition
     * @return	bool
     */
    function drop_table($table_name, $if_exists = FALSE){}

    // --------------------------------------------------------------------

    /**
     * Drop Table
     *
     * Generates a platform-specific DROP TABLE string
     *
     * @param	string	$table		Table name
     * @param	bool	$if_exists	Whether to add an IF EXISTS condition
     * @return	mixed	(Returns a platform-specific DROP table string, or TRUE to indicate there's nothing to do)
     */
    function _drop_table($table, $if_exists){}

    // --------------------------------------------------------------------

    /**
     * Rename Table
     *
     * @param	string	$table_name	Old table name
     * @param	string	$new_table_name	New table name
     * @return	bool
     */
    function rename_table($table_name, $new_table_name){}

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
    function add_column($table, $field, $_after = NULL){}

    // --------------------------------------------------------------------

    /**
     * Column Drop
     *
     * @param	string	$table		Table name
     * @param	string	$column_name	Column name
     * @return	bool
     */
    function drop_column($table, $column_name){}

    // --------------------------------------------------------------------

    /**
     * Column Modify
     *
     * @param	string	$table	Table name
     * @param	string	$field	Column definition
     * @return	bool
     */
    function modify_column($table, $field){}

    // --------------------------------------------------------------------

    /**
     * ALTER TABLE
     *
     * @param	string	$alter_type	ALTER type
     * @param	string	$table		Table name
     * @param	mixed	$field		Column definition
     * @return	string|string[]
     */
    function _alter_table($alter_type, $table, $field){}

    // --------------------------------------------------------------------

    /**
     * Process fields
     *
     * @param	bool	$create_table
     * @return	array
     */
    function _process_fields($create_table = FALSE){}

    // --------------------------------------------------------------------

    /**
     * Process column
     *
     * @param	array	$field
     * @return	string
     */
    function _process_column($field){}

    // --------------------------------------------------------------------

    /**
     * Field attribute TYPE
     *
     * Performs a data type mapping between different databases.
     *
     * @param	array	&$attributes
     * @return	void
     */
    function _attr_type(&$attributes){}

    // --------------------------------------------------------------------

    /**
     * Field attribute UNSIGNED
     *
     * Depending on the _unsigned property value:
     *
     *	- TRUE will always set $field['unsigned'] to 'UNSIGNED'
     *	- FALSE will always set $field['unsigned'] to ''
     *	- array(TYPE) will set $field['unsigned'] to 'UNSIGNED',
     *		if $attributes['TYPE'] is found in the array
     *	- array(TYPE => UTYPE) will change $field['type'],
     *		from TYPE to UTYPE in case of a match
     *
     * @param	array	&$attributes
     * @param	array	&$field
     * @return	void
     */
    function _attr_unsigned(&$attributes, &$field){}

    // --------------------------------------------------------------------

    /**
     * Field attribute DEFAULT
     *
     * @param	array	&$attributes
     * @param	array	&$field
     * @return	void
     */
    function _attr_default(&$attributes, &$field){}

    // --------------------------------------------------------------------

    /**
     * Field attribute UNIQUE
     *
     * @param	array	&$attributes
     * @param	array	&$field
     * @return	void
     */
    function _attr_unique(&$attributes, &$field){}

    // --------------------------------------------------------------------

    /**
     * Field attribute AUTO_INCREMENT
     *
     * @param	array	&$attributes
     * @param	array	&$field
     * @return	void
     */
    function _attr_auto_increment(&$attributes, &$field){}

    // --------------------------------------------------------------------

    /**
     * Process primary keys
     *
     * @param	string	$table	Table name
     * @return	string
     */
    function _process_primary_keys($table){}

    // --------------------------------------------------------------------

    /**
     * Process indexes
     *
     * @param	string	$table	Table name
     * @return	string[] list of SQL statements
     */
    function _process_indexes($table){}

    // --------------------------------------------------------------------

    /**
     * Reset
     *
     * Resets table creation vars
     *
     * @return	void
     */
    function _reset(){}

}