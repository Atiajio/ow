<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Postgres_Db_Utility extends OW_Base_Db_Utility {


    /**
     * List databases statement
     *
     * @var	string
     */
    protected $_list_databases	= 'SELECT datname FROM pg_database';

    /**
     * OPTIMIZE TABLE statement
     *
     * @var	string
     */
    protected $_optimize_table	= 'REINDEX TABLE %s';

    // --------------------------------------------------------------------

    /**
     * Export
     *
     * @param	array	$params	Preferences
     * @return	mixed
     */
    protected function _backup($params = array())
    {
        // Currently unsupported
        return $this->db->display_error('db_unsupported_feature');
    }
}