<?php

interface OW_Reseult_Interface {

     function num_rows();

    // --------------------------------------------------------------------

    /**
     * Query result. Acts as a wrapper function for the following functions.
     *
     * @param	string	$type	'object', 'array' or a custom class name
     * @return	array
     */
     function result($type = 'object');

    // --------------------------------------------------------------------

    /**
     * Custom query result.
     *
     * @param	string	$class_name
     * @return	array
     */
     function custom_result_object($class_name);

    // --------------------------------------------------------------------

    /**
     * Query result. "object" version.
     *
     * @return	array
     */
     function result_object();

    // --------------------------------------------------------------------

    /**
     * Query result. "array" version.
     *
     * @return	array
     */
     function result_array();

    // --------------------------------------------------------------------

    /**
     * Row
     *
     * A wrapper method.
     *
     * @param	mixed	$n
     * @param	string	$type	'object' or 'array'
     * @return	mixed
     */
     function row($n = 0, $type = 'object');

    // --------------------------------------------------------------------

    /**
     * Assigns an item into a particular column slot
     *
     * @param	mixed	$key
     * @param	mixed	$value
     * @return	void
     */
     function set_row($key, $value = NULL);

    // --------------------------------------------------------------------

    /**
     * Returns a single result row - custom object version
     *
     * @param	int	$n
     * @param	string	$type
     * @return	object
     */
     function custom_row_object($n, $type);

    // --------------------------------------------------------------------

    /**
     * Returns a single result row - object version
     *
     * @param	int	$n
     * @return	object
     */
     function row_object($n = 0);

    // --------------------------------------------------------------------

    /**
     * Returns a single result row - array version
     *
     * @param	int	$n
     * @return	array
     */
     function row_array($n = 0);

    // --------------------------------------------------------------------

    /**
     * Returns the "first" row
     *
     * @param	string	$type
     * @return	mixed
     */
     function first_row($type = 'object');

    // --------------------------------------------------------------------

    /**
     * Returns the "last" row
     *
     * @param	string	$type
     * @return	mixed
     */
     function last_row($type = 'object');

    // --------------------------------------------------------------------

    /**
     * Returns the "next" row
     *
     * @param	string	$type
     * @return	mixed
     */
     function next_row($type = 'object');

    // --------------------------------------------------------------------

    /**
     * Returns the "previous" row
     *
     * @param	string	$type
     * @return	mixed
     */
     function previous_row($type = 'object');

    // --------------------------------------------------------------------

    /**
     * Returns an unbuffered row and move pointer to next row
     *
     * @param	string	$type	'array', 'object' or a custom class name
     * @return	mixed
     */
     function unbuffered_row($type = 'object');

    // --------------------------------------------------------------------

    /**
     * The following methods are normally overloaded by the identically named
     * methods in the platform-specific driver -- except when query caching
     * is used. When caching is enabled we do not load the other driver.
     * These functions are primarily here to prevent undefined function errors
     * when a cached result object is in use. They are not otherwise fully
     * operational due to the unavailability of the database resource IDs with
     * cached results.
     */

    // --------------------------------------------------------------------

    /**
     * Number of fields in the result set
     *
     * Overridden by driver result classes.
     *
     * @return	int
     */
     function num_fields();

    // --------------------------------------------------------------------

    /**
     * Fetch Field Names
     *
     * Generates an array of column names.
     *
     * Overridden by driver result classes.
     *
     * @return	array
     */
     function list_fields();

    // --------------------------------------------------------------------

    /**
     * Field data
     *
     * Generates an array of objects containing field meta-data.
     *
     * Overridden by driver result classes.
     *
     * @return	array
     */
     function field_data();

    // --------------------------------------------------------------------

    /**
     * Free the result
     *
     * Overridden by driver result classes.
     *
     * @return	void
     */
     function free_result();

    // --------------------------------------------------------------------

    /**
     * Data Seek
     *
     * Moves the internal pointer to the desired offset. We call
     * this internally before fetching results to make sure the
     * result set starts at zero.
     *
     * Overridden by driver result classes.
     *
     * @param	int	$n
     * @return	bool
     */
     function data_seek($n = 0);

    // --------------------------------------------------------------------

    /**
     * Result - associative array
     *
     * Returns the result set as an array.
     *
     * Overridden by driver result classes.
     *
     * @return	array
     */
     function _fetch_assoc();

    // --------------------------------------------------------------------

    /**
     * Result - object
     *
     * Returns the result set as an object.
     *
     * Overridden by driver result classes.
     *
     * @param	string	$class_name
     * @return	object
     */
     function _fetch_object($class_name = 'stdClass');
    
}