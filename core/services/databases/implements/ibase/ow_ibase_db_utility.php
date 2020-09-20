<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Ibase_Db_Utility extends OW_Base_Db_Utility {


    /**
     * Export
     *
     * @param	string	$filename
     * @return	mixed
     */
    protected function _backup($filename)
    {
        if ($service = ibase_service_attach($this->db->hostname, $this->db->username, $this->db->password))
        {
            $res = ibase_backup($service, $this->db->database, $filename.'.fbk');

            // Close the service connection
            ibase_service_detach($service);
            return $res;
        }

        return FALSE;
    }
}