
<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class App_Migration extends OW_Base_Migration{


    /**
     * Function qui lance l'execution de la migration en avant
     * @return true
     */
    static function migrate(): bool
    {
        OW_System::$db->trans_start();
        


$sql ="


-- Auto Generated Migration SQL For the Model : INGREDIENT

";

        foreach(explode(";", $sql) as $sub_sql) {
            
            if (!empty($sub_sql)){
            
                $result = OW_System::$db->query($sub_sql);
            
            }
        
        }
            


$sql ="


-- Auto Generated Migration SQL For the Model : PROFIL

";

        foreach(explode(";", $sql) as $sub_sql) {
            
            if (!empty($sub_sql)){
            
                $result = OW_System::$db->query($sub_sql);
            
            }
        
        }
            


$sql ="


-- Auto Generated Migration SQL For the Model : RECEIPE

";

        foreach(explode(";", $sql) as $sub_sql) {
            
            if (!empty($sub_sql)){
            
                $result = OW_System::$db->query($sub_sql);
            
            }
        
        }
            


$sql ="


-- Auto Generated Migration SQL For the Model : USER

";

        foreach(explode(";", $sql) as $sub_sql) {
            
            if (!empty($sub_sql)){
            
                $result = OW_System::$db->query($sub_sql);
            
            }
        
        }
            
        return OW_System::$db->trans_complete();
    }

    /**
     * Function qui lance l'execution de la migration en arriere
     * @return true
     */
    static function rebase(): bool
    {
        $sql ="
";
        
        $result = OW_System::$db->query($sql);
        return $result->result_array();
    }
}