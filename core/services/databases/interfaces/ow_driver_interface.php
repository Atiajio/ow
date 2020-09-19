<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

interface OW_Driver_Interface {

    /**
     * Initialize Database Settings
     *
     * @return	bool
     */
    public function initialize();

    // --------------------------------------------------------------------

    /**
     * DB connect
     *
     * This is just a dummy method that all drivers will override.
     *
     * @return	mixed
     */
    public function db_connect();

    // --------------------------------------------------------------------

    /**
     * Persistent database connection
     *
     * @return	mixed
     */
    public function db_pconnect();

    // --------------------------------------------------------------------

    /**
     * Reconnect
     *
     * Keep / reestablish the db connection if no queries have been
     * sent for a length of time exceeding the server's idle timeout.
     *
     * This is just a dummy method to allow drivers without such
     * functionality to not declare it, while others will override it.
     *
     * @return	void
     */
    public function reconnect();

    // --------------------------------------------------------------------

    /**
     * Select database
     *
     * This is just a dummy method to allow drivers without such
     * functionality to not declare it, while others will override it.
     *
     * @return	bool
     */
    public function db_select();

    // --------------------------------------------------------------------

    /**
     * Last error
     *
     * @return	array
     */
    public function error();

    // --------------------------------------------------------------------

    /**
     * Set client character set
     *
     * @param	string
     * @return	bool
     */
    public function db_set_charset($charset);

    // --------------------------------------------------------------------

    /**
     * The name of the platform in use (mysql, mssql, etc...)
     *
     * @return	string
     */
    public function platform();

    // --------------------------------------------------------------------

    /**
     * Database version number
     *
     * Returns a string containing the version of the database being used.
     * Most drivers will override this method.
     *
     * @return	string
     */
    public function version();

    // --------------------------------------------------------------------

    /**
     * Version number query string
     *
     * @return	string
     */
     function _version();

    // --------------------------------------------------------------------

    /**
     * Execute the query
     *
     * Accepts an SQL string as input and returns a result object upon
     * successful execution of a "read" type query. Returns boolean TRUE
     * upon successful execution of a "write" type query. Returns boolean
     * FALSE upon failure, and if the $db_debug variable is set to TRUE
     * will raise an error.
     *
     * @param	string	$sql
     * @param	array	$binds = FALSE		An array of binding data
     * @param	bool	$return_object = NULL
     * @return	mixed
     */
    public function query($sql, $binds = FALSE, $return_object = NULL);

    // --------------------------------------------------------------------

    /**
     * Load the result drivers
     *
     * @return	string	the name of the result class
     */
    public function load_rdriver();

    // --------------------------------------------------------------------

    /**
     * Simple Query
     * This is a simplified version of the query() function. Internally
     * we only use it when running transaction commands since they do
     * not require all the features of the main query() function.
     *
     * @param	string	the sql query
     * @return	mixed
     */
    public function simple_query($sql);

    // --------------------------------------------------------------------

    /**
     * Disable Transactions
     * This permits transactions to be disabled at run-time.
     *
     * @return	void
     */
    public function trans_off();

    // --------------------------------------------------------------------

    /**
     * Enable/disable Transaction Strict Mode
     *
     * When strict mode is enabled, if you are running multiple groups of
     * transactions, if one group fails all subsequent groups will be
     * rolled back.
     *
     * If strict mode is disabled, each group is treated autonomously,
     * meaning a failure of one group will not affect any others
     *
     * @param	bool	$mode = TRUE
     * @return	void
     */
    public function trans_strict($mode = TRUE);

    // --------------------------------------------------------------------

    /**
     * Start Transaction
     *
     * @param	bool	$test_mode = FALSE
     * @return	bool
     */
    public function trans_start($test_mode = FALSE);

    // --------------------------------------------------------------------

    /**
     * Complete Transaction
     *
     * @return	bool
     */
    public function trans_complete();

    // --------------------------------------------------------------------

    /**
     * Lets you retrieve the transaction flag to determine if it has failed
     *
     * @return	bool
     */
    public function trans_status();

    // --------------------------------------------------------------------

    /**
     * Begin Transaction
     *
     * @param	bool	$test_mode
     * @return	bool
     */
    public function trans_begin($test_mode = FALSE);

    // --------------------------------------------------------------------

    /**
     * Commit Transaction
     *
     * @return	bool
     */
    public function trans_commit();

    // --------------------------------------------------------------------

    /**
     * Rollback Transaction
     *
     * @return	bool
     */
    public function trans_rollback();
    // --------------------------------------------------------------------

    /**
     * Compile Bindings
     *
     * @param	string	the sql statement
     * @param	array	an array of bind data
     * @return	string
     */
    public function compile_binds($sql, $binds);

    // --------------------------------------------------------------------

    /**
     * Determines if a query is a "write" type.
     *
     * @param	string	An SQL query string
     * @return	bool
     */
    public function is_write_type($sql);

    // --------------------------------------------------------------------

    /**
     * Calculate the aggregate query elapsed time
     *
     * @param	int	The number of decimal places
     * @return	string
     */
    public function elapsed_time($decimals = 6);

    // --------------------------------------------------------------------

    /**
     * Returns the total number of queries
     *
     * @return	int
     */
    public function total_queries();
    // --------------------------------------------------------------------

    /**
     * Returns the last query that was executed
     *
     * @return	string
     */
    public function last_query();

    // --------------------------------------------------------------------

    /**
     * "Smart" Escape String
     *
     * Escapes data based on type
     * Sets boolean and null types
     *
     * @param	string
     * @return	mixed
     */
    public function escape($str);

    // --------------------------------------------------------------------

    /**
     * Escape String
     *
     * @param	string|string[]	$str	Input string
     * @param	bool	$like	Whether or not the string will be used in a LIKE condition
     * @return	string
     */
    public function escape_str($str, $like = FALSE);

    // --------------------------------------------------------------------

    /**
     * Escape LIKE String
     *
     * Calls the individual driver for platform
     * specific escaping for LIKE conditions
     *
     * @param	string|string[]
     * @return	mixed
     */
    public function escape_like_str($str);

    // --------------------------------------------------------------------

    /**
     * Platform-dependent string escape
     *
     * @param	string
     * @return	string
     */
     function _escape_str($str);

    // --------------------------------------------------------------------

    /**
     * Primary
     *
     * Retrieves the primary key. It assumes that the row in the first
     * position is the primary key
     *
     * @param	string	$table	Table name
     * @return	string
     */
    public function primary($table);

    // --------------------------------------------------------------------

    /**
     * "Count All" query
     *
     * Generates a platform-specific query string that counts all records in
     * the specified database
     *
     * @param	string
     * @return	int
     */
    public function count_all($table = '');

    // --------------------------------------------------------------------

    /**
     * Returns an array of table names
     *
     * @param	string	$constrain_by_prefix = FALSE
     * @return	array
     */
    public function list_tables($constrain_by_prefix = FALSE);

    // --------------------------------------------------------------------

    /**
     * Determine if a particular table exists
     *
     * @param	string	$table_name
     * @return	bool
     */
    public function table_exists($table_name);

    // --------------------------------------------------------------------

    /**
     * Fetch Field Names
     *
     * @param	string	$table	Table name
     * @return	array
     */
    public function list_fields($table);

    // --------------------------------------------------------------------

    /**
     * Determine if a particular field exists
     *
     * @param	string
     * @param	string
     * @return	bool
     */
    public function field_exists($field_name, $table_name);

    // --------------------------------------------------------------------

    /**
     * Returns an object with field data
     *
     * @param	string	$table	the table name
     * @return	array
     */
    public function field_data($table);

    // --------------------------------------------------------------------

    /**
     * Escape the SQL Identifiers
     *
     * This function escapes column and table names
     *
     * @param	mixed
     * @return	mixed
     */
    public function escape_identifiers($item);

    // --------------------------------------------------------------------

    /**
     * Generate an insert string
     *
     * @param	string	the table upon which the query will be performed
     * @param	array	an associative array data of key/values
     * @return	string
     */
    public function insert_string($table, $data);

    // --------------------------------------------------------------------

    /**
     * Insert statement
     *
     * Generates a platform-specific insert string from the supplied data
     *
     * @param	string	the table name
     * @param	array	the insert keys
     * @param	array	the insert values
     * @return	string
     */
     function _insert($table, $keys, $values);

    // --------------------------------------------------------------------

    /**
     * Generate an update string
     *
     * @param	string	the table upon which the query will be performed
     * @param	array	an associative array data of key/values
     * @param	mixed	the "where" statement
     * @return	string
     */
    public function update_string($table, $data, $where);

    // --------------------------------------------------------------------

    /**
     * Update statement
     *
     * Generates a platform-specific update string from the supplied data
     *
     * @param	string	the table name
     * @param	array	the update data
     * @return	string
     */
     function _update($table, $values);

    // --------------------------------------------------------------------

    /**
     * Tests whether the string has an SQL operator
     *
     * @param	string
     * @return	bool
     */
     function _has_operator($str);

    // --------------------------------------------------------------------

    /**
     * Returns the SQL string operator
     *
     * @param	string
     * @return	string
     */
     function _get_operator($str);

    // --------------------------------------------------------------------

    /**
     * Enables a native PHP function to be run, using a platform agnostic wrapper.
     *
     * @param	string	$function	Function name
     * @return	mixed
     */
    public function call_function($function);

    // --------------------------------------------------------------------

    /**
     * Set Cache Directory Path
     *
     * @param	string	the path to the cache directory
     * @return	void
     */
    public function cache_set_path($path = '');

    // --------------------------------------------------------------------

    /**
     * Enable Query Caching
     *
     * @return	bool	cache_on value
     */
    public function cache_on();

    // --------------------------------------------------------------------

    /**
     * Disable Query Caching
     *
     * @return	bool	cache_on value
     */
    public function cache_off();

    // --------------------------------------------------------------------

    /**
     * Delete the cache files associated with a particular URI
     *
     * @param	string	$segment_one = ''
     * @param	string	$segment_two = ''
     * @return	bool
     */
    public function cache_delete($segment_one = '', $segment_two = '');

    // --------------------------------------------------------------------

    /**
     * Delete All cache files
     *
     * @return	bool
     */
    public function cache_delete_all();

    // --------------------------------------------------------------------

    /**
     * Initialize the Cache Class
     *
     * @return	bool
     */
     function _cache_init();

    // --------------------------------------------------------------------

    /**
     * Close DB Connection
     *
     * @return	void
     */
    public function close();

    // --------------------------------------------------------------------

    /**
     * Close DB Connection
     *
     * This method would be overridden by most of the drivers.
     *
     * @return	void
     */
     function _close();

    // --------------------------------------------------------------------

    /**
     * Display an error message
     *
     * @param	string	the error message
     * @param	string	any "swap" values
     * @param	bool	whether to localize the message
     * @return	string	sends the application/views/errors/error_db.php template
     */
    public function display_error($error = '', $swap = '', $native = FALSE);

    // --------------------------------------------------------------------

    /**
     * Protect Identifiers
     *
     * This function is used extensively by the Query Builder class, and by
     * a couple functions in this class.
     * It takes a column or table name (optionally with an alias) and inserts
     * the table prefix onto it. Some logic is necessary in order to deal with
     * column names that include the path. Consider a query like this:
     *
     * SELECT hostname.database.table.column AS c FROM hostname.database.table
     *
     * Or a query with aliasing:
     *
     * SELECT m.member_id, m.member_name FROM members AS m
     *
     * Since the column name can include up to four segments (host, DB, table, column)
     * or also have an alias prefix, we need to do a bit of work to figure this out and
     * insert the table prefix (if it exists) in the proper position, and escape only
     * the correct identifiers.
     *
     * @param	string
     * @param	bool
     * @param	mixed
     * @param	bool
     * @return	string
     */
    public function protect_identifiers($item, $prefix_single = FALSE, $protect_identifiers = NULL, $field_exists = TRUE);

    // --------------------------------------------------------------------

    /**
     * Dummy method that allows Query Builder class to be disabled
     * and keep count_all() working.
     *
     * @return	void
     */
     function _reset_select();



}