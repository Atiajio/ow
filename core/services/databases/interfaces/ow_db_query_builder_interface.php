<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

interface OW_Db_Query_Builder_Interface {

    /**
     * Select
     *
     * Generates the SELECT portion of the query
     *
     * @param	string
     * @param	mixed
     * @return	OW_Query_Builder
     */
    public function select($select = '*', $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * Select Max
     *
     * Generates a SELECT MAX(field) portion of a query
     *
     * @param	string	the field
     * @param	string	an alias
     * @return	OW_Query_Builder
     */
    public function select_max($select = '', $alias = '');

    // --------------------------------------------------------------------


    /**
     * Select Min
     *
     * Generates a SELECT MIN(field) portion of a query
     *
     * @param	string	the field
     * @param	string	an alias
     * @return	OW_Query_Builder
     */
    public function select_min($select = '', $alias = '');
    /**
     * Select Average
     *
     * Generates a SELECT AVG(field) portion of a query
     *
     * @param	string	the field
     * @param	string	an alias
     * @return	OW_Query_Builder
     */
    public function select_avg($select = '', $alias = '');

    // --------------------------------------------------------------------

    /**
     * Select Sum
     *
     * Generates a SELECT SUM(field) portion of a query
     *
     * @param	string	the field
     * @param	string	an alias
     * @return	OW_Query_Builder
     */
    public function select_sum($select = '', $alias = '');

    // --------------------------------------------------------------------


    /**
     * DISTINCT
     *
     * Sets a flag which tells the query string compiler to add DISTINCT
     *
     * @param	bool	$val
     * @return	OW_Query_Builder
     */
    public function distinct($val = TRUE);

    // --------------------------------------------------------------------


    /**
     * From
     *
     * Generates the FROM portion of the query
     *
     * @param	mixed	$from	can be a string or array
     * @return	OW_Query_Builder
     */
    public function from($from);

    // --------------------------------------------------------------------


    /**
     * JOIN
     *
     * Generates the JOIN portion of the query
     *
     * @param	string
     * @param	string	the join condition
     * @param	string	the type of join
     * @param	string	whether not to try to escape identifiers
     * @return	OW_Query_Builder
     */
    public function join($table, $cond, $type = '', $escape = NULL);

    // --------------------------------------------------------------------


    /**
     * WHERE
     *
     * Generates the WHERE portion of the query.
     * Separates multiple calls with 'AND'.
     *
     * @param	mixed
     * @param	mixed
     * @param	bool
     * @return	OW_Query_Builder
     */
    public function where($key, $value = NULL, $escape = NULL);

    // --------------------------------------------------------------------


    /**
     * OR WHERE
     *
     * Generates the WHERE portion of the query.
     * Separates multiple calls with 'OR'.
     *
     * @param	mixed
     * @param	mixed
     * @param	bool
     * @return	OW_Query_Builder
     */
    public function or_where($key, $value = NULL, $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * WHERE IN
     *
     * Generates a WHERE field IN('item', 'item') SQL query,
     * joined with 'AND' if appropriate.
     *
     * @param	string	$key	The field to search
     * @param	array	$values	The values searched on
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function where_in($key, array $values, $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * OR WHERE IN
     *
     * Generates a WHERE field IN('item', 'item') SQL query,
     * joined with 'OR' if appropriate.
     *
     * @param	string	$key	The field to search
     * @param	array	$values	The values searched on
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function or_where_in($key, array $values, $escape = NULL);
    /**
     * WHERE NOT IN
     *
     * Generates a WHERE field NOT IN('item', 'item') SQL query,
     * joined with 'AND' if appropriate.
     *
     * @param	string	$key	The field to search
     * @param	array	$values	The values searched on
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function where_not_in($key, array $values, $escape = NULL);

    /**
     * OR WHERE NOT IN
     *
     * Generates a WHERE field NOT IN('item', 'item') SQL query,
     * joined with 'OR' if appropriate.
     *
     * @param	string	$key	The field to search
     * @param	array	$values	The values searched on
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function or_where_not_in($key, array $values, $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * HAVING IN
     *
     * Generates a HAVING field IN('item', 'item') SQL query,
     * joined with 'AND' if appropriate.
     *
     * @param	string	$key	The field to search
     * @param	array	$values	The values searched on
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function having_in($key, array $values, $escape = NULL);
    /**
     * OR HAVING IN
     *
     * Generates a HAVING field IN('item', 'item') SQL query,
     * joined with 'OR' if appropriate.
     *
     * @param	string	$key	The field to search
     * @param	array	$values	The values searched on
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function or_having_in($key, array $values, $escape = NULL);

    /**
     * HAVING NOT IN
     *
     * Generates a HAVING field NOT IN('item', 'item') SQL query,
     * joined with 'AND' if appropriate.
     *
     * @param	string	$key	The field to search
     * @param	array	$values	The values searched on
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function having_not_in($key, array $values, $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * OR HAVING NOT IN
     *
     * Generates a HAVING field NOT IN('item', 'item') SQL query,
     * joined with 'OR' if appropriate.
     *
     * @param	string	$key	The field to search
     * @param	array	$values	The values searched on
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function or_having_not_in($key, array $values, $escape = NULL);
    // --------------------------------------------------------------------

    /**
     * LIKE
     *
     * Generates a %LIKE% portion of the query.
     * Separates multiple calls with 'AND'.
     *
     * @param	mixed	$field
     * @param	string	$match
     * @param	string	$side
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function like($field, $match = '', $side = 'both', $escape = NULL);

    // --------------------------------------------------------------------


    /**
     * NOT LIKE
     *
     * Generates a NOT LIKE portion of the query.
     * Separates multiple calls with 'AND'.
     *
     * @param	mixed	$field
     * @param	string	$match
     * @param	string	$side
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function not_like($field, $match = '', $side = 'both', $escape = NULL);

    /**
     * OR LIKE
     *
     * Generates a %LIKE% portion of the query.
     * Separates multiple calls with 'OR'.
     *
     * @param	mixed	$field
     * @param	string	$match
     * @param	string	$side
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function or_like($field, $match = '', $side = 'both', $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * OR NOT LIKE
     *
     * Generates a NOT LIKE portion of the query.
     * Separates multiple calls with 'OR'.
     *
     * @param	mixed	$field
     * @param	string	$match
     * @param	string	$side
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function or_not_like($field, $match = '', $side = 'both', $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * Starts a query group.
     *
     * @param	string	$not	(Internal use only)
     * @param	string	$type	(Internal use only)
     * @return	OW_Query_Builder
     */
    public function group_start($not = '', $type = 'AND ');

    // --------------------------------------------------------------------


    /**
     * Starts a query group, but ORs the group
     *
     * @return	OW_Query_Builder
     */
    public function or_group_start();

    // --------------------------------------------------------------------

    /**
     * Starts a query group, but NOTs the group
     *
     * @return	OW_Query_Builder
     */
    public function not_group_start();

    // --------------------------------------------------------------------

    /**
     * Ends a query group
     *
     * @return	OW_Query_Builder
     */
    public function group_end();

    // --------------------------------------------------------------------

    /**
     * GROUP BY
     *
     * @param	string	$by
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function group_by($by, $escape = NULL);
    // --------------------------------------------------------------------

    /**
     * HAVING
     *
     * Separates multiple calls with 'AND'.
     *
     * @param	string	$key
     * @param	string	$value
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function having($key, $value = NULL, $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * OR HAVING
     *
     * Separates multiple calls with 'OR'.
     *
     * @param	string	$key
     * @param	string	$value
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function or_having($key, $value = NULL, $escape = NULL);
    // --------------------------------------------------------------------

    /**
     * ORDER BY
     *
     * @param	string	$orderby
     * @param	string	$direction	ASC, DESC or RANDOM
     * @param	bool	$escape
     * @return	OW_Query_Builder
     */
    public function order_by($orderby, $direction = '', $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * LIMIT
     *
     * @param	int	$value	LIMIT value
     * @param	int	$offset	OFFSET value
     * @return	OW_Query_Builder
     */
    public function limit($value, $offset = 0);
    // --------------------------------------------------------------------

    /**
     * Sets the OFFSET value
     *
     * @param	int	$offset	OFFSET value
     * @return	OW_Query_Builder
     */
    public function offset($offset);
    // --------------------------------------------------------------------

    /**
     * The "set" function.
     *
     * Allows key/value pairs to be set for inserting or updating
     *
     * @param	mixed
     * @param	string
     * @param	bool
     * @return	OW_Query_Builder
     */
    public function set($key, $value = '', $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * Get SELECT query string
     *
     * Compiles a SELECT query string and returns the sql.
     *
     * @param	string	the table name to select from (optional)
     * @param	bool	TRUE: resets QB values; FALSE: leave QB values alone
     * @return	string
     */
    public function get_compiled_select($table = '', $reset = TRUE);
    // --------------------------------------------------------------------

    /**
     * Get
     *
     * Compiles the select statement based on the other functions called
     * and runs the query
     *
     * @param	string	the table
     * @param	string	the limit clause
     * @param	string	the offset clause
     * @return	CI_DB_result
     */
    public function get($table = '', $limit = NULL, $offset = NULL);
    // --------------------------------------------------------------------

    /**
     * "Count All Results" query
     *
     * Generates a platform-specific query string that counts all records
     * returned by an Query Builder query.
     *
     * @param	string
     * @param	bool	the reset clause
     * @return	int
     */
    public function count_all_results($table = '', $reset = TRUE);
    // --------------------------------------------------------------------

    /**
     * get_where()
     *
     * Allows the where clause, limit and offset to be added directly
     *
     * @param	string	$table
     * @param	string	$where
     * @param	int	$limit
     * @param	int	$offset
     * @return	CI_DB_result
     */
    public function get_where($table = '', $where = NULL, $limit = NULL, $offset = NULL);
    // --------------------------------------------------------------------

    /**
     * Insert_Batch
     *
     * Compiles batch insert strings and runs the queries
     *
     * @param	string	$table	Table to insert into
     * @param	array	$set 	An associative array of insert values
     * @param	bool	$escape	Whether to escape values and identifiers
     * @return	int	Number of rows inserted or FALSE on failure
     */
    public function insert_batch($table, $set = NULL, $escape = NULL, $batch_size = 100);

    // --------------------------------------------------------------------

    /**
     * The "set_insert_batch" function.  Allows key/value pairs to be set for batch inserts
     *
     * @param	mixed
     * @param	string
     * @param	bool
     * @return	OW_Query_Builder
     */
    public function set_insert_batch($key, $value = '', $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * Get INSERT query string
     *
     * Compiles an insert query and returns the sql
     *
     * @param	string	the table to insert into
     * @param	bool	TRUE: reset QB values; FALSE: leave QB values alone
     * @return	string
     */
    public function get_compiled_insert($table = '', $reset = TRUE);

    // --------------------------------------------------------------------

    /**
     * Insert
     *
     * Compiles an insert string and runs the query
     *
     * @param	string	the table to insert data into
     * @param	array	an associative array of insert values
     * @param	bool	$escape	Whether to escape values and identifiers
     * @return	bool	TRUE on success, FALSE on failure
     */
    public function insert($table = '', $set = NULL, $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * Replace
     *
     * Compiles an replace into string and runs the query
     *
     * @param	string	the table to replace data into
     * @param	array	an associative array of insert values
     * @return	bool	TRUE on success, FALSE on failure
     */
    public function replace($table = '', $set = NULL);

    // --------------------------------------------------------------------

    /**
     * Get UPDATE query string
     *
     * Compiles an update query and returns the sql
     *
     * @param	string	the table to update
     * @param	bool	TRUE: reset QB values; FALSE: leave QB values alone
     * @return	string
     */
    public function get_compiled_update($table = '', $reset = TRUE);

    // --------------------------------------------------------------------

    /**
     * UPDATE
     *
     * Compiles an update string and runs the query.
     *
     * @param	string	$table
     * @param	array	$set	An associative array of update values
     * @param	mixed	$where
     * @param	int	$limit
     * @return	bool	TRUE on success, FALSE on failure
     */
    public function update($table = '', $set = NULL, $where = NULL, $limit = NULL);

    // --------------------------------------------------------------------

    /**
     * Update_Batch
     *
     * Compiles an update string and runs the query
     *
     * @param	string	the table to retrieve the results from
     * @param	array	an associative array of update values
     * @param	string	the where key
     * @return	int	number of rows affected or FALSE on failure
     */
    public function update_batch($table, $set = NULL, $index = NULL, $batch_size = 100);

    // --------------------------------------------------------------------

    /**
     * The "set_update_batch" function.  Allows key/value pairs to be set for batch updating
     *
     * @param	array
     * @param	string
     * @param	bool
     * @return	OW_Query_Builder
     */
    public function set_update_batch($key, $index = '', $escape = NULL);

    // --------------------------------------------------------------------

    /**
     * Empty Table
     *
     * Compiles a delete string and runs "DELETE FROM table"
     *
     * @param	string	the table to empty
     * @return	bool	TRUE on success, FALSE on failure
     */
    public function empty_table($table = '');
    /**
     * Truncate
     *
     * Compiles a truncate string and runs the query
     * If the database does not support the truncate() command
     * This function maps to "DELETE FROM table"
     *
     * @param	string	the table to truncate
     * @return	bool	TRUE on success, FALSE on failure
     */
    public function truncate($table = '');

    // --------------------------------------------------------------------

    /**
     * Get DELETE query string
     *
     * Compiles a delete query string and returns the sql
     *
     * @param	string	the table to delete from
     * @param	bool	TRUE: reset QB values; FALSE: leave QB values alone
     * @return	string
     */
    public function get_compiled_delete($table = '', $reset = TRUE);
    /**
     * Delete
     *
     * Compiles a delete string and runs the query
     *
     * @param	mixed	the table(s) to delete from. String or array
     * @param	mixed	the where clause
     * @param	mixed	the limit clause
     * @param	bool
     * @return	mixed
     */
    public function delete($table = '', $where = '', $limit = NULL, $reset_data = TRUE);

    // --------------------------------------------------------------------

    /**
     * DB Prefix
     *
     * Prepends a database prefix if one exists in configuration
     *
     * @param	string	the table
     * @return	string
     */
    public function dbprefix($table = '');

    // --------------------------------------------------------------------

    /**
     * Set DB Prefix
     *
     * Set's the DB Prefix to something new without needing to reconnect
     *
     * @param	string	the prefix
     * @return	string
     */
    public function set_dbprefix($prefix = '');

    // --------------------------------------------------------------------

    /**
     * Start Cache
     *
     * Starts QB caching
     *
     * @return	OW_Query_Builder
     */
    public function start_cache();

    // --------------------------------------------------------------------

    /**
     * Stop Cache
     *
     * Stops QB caching
     *
     * @return	OW_Query_Builder
     */
    public function stop_cache();

    // --------------------------------------------------------------------

    /**
     * Flush Cache
     *
     * Empties the QB cache
     *
     * @return	OW_Query_Builder
     */
    public function flush_cache();

    // --------------------------------------------------------------------

    /**
     * Reset Query Builder values.
     *
     * Publicly-visible method to reset the QB values.
     *
     * @return	OW_Query_Builder
     */
    public function reset_query();

}