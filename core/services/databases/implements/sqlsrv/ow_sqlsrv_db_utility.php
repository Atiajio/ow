<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Sqlsrv_Db_Utility extends OW_Base_Db_Utility {

    /**
     * List databases statement
     *
     * @var	string
     */
    protected $_list_databases	= 'EXEC sp_helpdb'; // Can also be: EXEC sp_databases

    /**
     * OPTIMIZE TABLE statement
     *
     * @var	string
     */
    protected $_optimize_table	= 'ALTER INDEX all ON %s REORGANIZE';

    // --------------------------------------------------------------------

    /**
     * Export
     *
     * @param	array	$params	Preferences
     * @return	bool
     */
    protected function _backup($params = array())
    {
        // Currently unsupported
        return $this->db->display_error('db_unsupported_feature');
    }
}