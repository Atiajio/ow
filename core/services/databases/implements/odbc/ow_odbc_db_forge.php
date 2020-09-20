<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Odbc_Db_Forge extends OW_Base_Db_Forge {

    /**
     * CREATE TABLE IF statement
     *
     * @var	string
     */
    protected $_create_table_if	= FALSE;

    /**
     * DROP TABLE IF statement
     *
     * @var	string
     */
    protected $_drop_table_if	= FALSE;

    /**
     * UNSIGNED support
     *
     * @var	bool|array
     */
    protected $_unsigned		= FALSE;

    // --------------------------------------------------------------------

    /**
     * Field attribute AUTO_INCREMENT
     *
     * @param	array	&$attributes
     * @param	array	&$field
     * @return	void
     */
    protected function _attr_auto_increment(&$attributes, &$field)
    {
        // Not supported (in most databases at least)
    }
}