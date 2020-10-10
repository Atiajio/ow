<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_System_Cmd extends OW_Base_Command{


    public static function run(array $params) : string
    {
        $output_cmd = "";
        $possible_cmd = array();

        foreach (get_class_methods(self::class) as $method_name){

            if (str_starts_with($method_name,"startExec") == true ){

                $found = true;

                foreach ($params as $key => $value) {

                    if (str_containt($method_name, ucwords(trim($value, '-'))) == false ) {

                        $found = false;
                        break;

                    }

                }

                if ($found == true) {

                    $possible_cmd[] = $method_name;

                }

            }

        }

        /**
         * Gestion de la CMD
         */

        if (empty($possible_cmd) == true) {

            $output_cmd .= "Your instruction does not match any combination in the system, please consult the help.";

        } elseif (sizeof($possible_cmd) > 1) {

            $output_cmd .= "Your instruction corresponds to more than one combination in the system, please consult the help.";

        } else {

            $to_execute_function = $possible_cmd[0];
            $output_cmd .= self::$to_execute_function($params);

        }

        return $output_cmd;
    }

    public static function help(array $params) : string
    {
        $output_cmd = "";

        if (empty($params) == true) {

            $first_with_name = true;

            foreach (get_class_methods(self::class) as $method_name){

                if (str_starts_with($method_name,"getHelp")){

                    $output_cmd .= self::$method_name($first_with_name);

                    if ($first_with_name == true){

                        $first_with_name = false;

                    }

                }

            }

        } else {

            foreach (get_class_methods(self::class) as $method_name){

                if (str_starts_with($method_name,"getHelp") == true ){

                    $found = true;

                    foreach ($params as $key => $value) {

                        if (str_containt($method_name, ucwords(trim($value, '-'))) == false ) {

                            $found = false;
                            break;

                        }

                    }

                    if ($found == true) {

                        $output_cmd .= self::$method_name(true);

                    }

                }

            }

        }

        return $output_cmd;
    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpSysVersion(bool $show_cmd = false){

        return '<tr>
                 <td style="color: white;text-align: left;">
                        '. (($show_cmd == true)? "system" : "" ) .'
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --version
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns the the actual version of the system.
                 </td>
            </tr>';

    }

    public static function getHelpSysUpdate(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                     '. (($show_cmd == true)? "system" : "" ) .'   
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --update
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysConfigShow(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "system" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --config show 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysConfigSet(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                        '. (($show_cmd == true)? "system" : "" ) .'
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --config set 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysConfigReset(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                       '. (($show_cmd == true)? "system" : "" ) .' 
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --config reset 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysConfigDelete(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                       '. (($show_cmd == true)? "system" : "" ) .' 
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --config delete 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysMigrationMake(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                       '. (($show_cmd == true)? "system" : "" ) .' 
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration make 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysMigrationMigrate(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                        '. (($show_cmd == true)? "system" : "" ) .'
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration migrate 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysMigrationRebase(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                       '. (($show_cmd == true)? "system" : "" ) .' 
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration rebase  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysMigrationExport(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                       '. (($show_cmd == true)? "system" : "" ) .' 
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration export  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysMigrationImport(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                        '. (($show_cmd == true)? "system" : "" ) .'
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration import  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysMigrationShow(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                        '. (($show_cmd == true)? "system" : "" ) .'
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration show  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function getHelpSysMigrationDelete(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                       '. (($show_cmd == true)? "system" : "" ) .' 
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }
}