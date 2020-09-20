<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Sqlite3_Db_Utility extends OW_Base_Db_Utility {


    /**
     * Export
     *
     * @param	array	$params	Preferences
     * @return	mixed
     */
    protected function _backup($params = array())
    {
        // Not supported
        return $this->db->display_error('db_unsupported_feature');
    }
}