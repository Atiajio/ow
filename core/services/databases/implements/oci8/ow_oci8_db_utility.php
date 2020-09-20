<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Oci8_Db_Utility extends OW_Base_Db_Utility {


    /**
     * List databases statement
     *
     * @var	string
     */
    protected $_list_databases	= 'SELECT username FROM dba_users'; // Schemas are actual usernames

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