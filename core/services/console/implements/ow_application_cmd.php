<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Application_Cmd extends OW_Base_Command{

    /**
     * @param array $params
     * @return string
     */
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

    /**
     * @param array $params
     * @return string
     */
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
    public static function getHelpApplicationControllerList(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --controller list  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationControllerList(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationControllerCreate(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --controller create  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationControllerCreate(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationControllerEdit(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --controller edit  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationControllerEdit(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationControllerDelete(bool $show_cmd = false) {

        return ' <tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --controller delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationControllerDelete(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationViewList(bool $show_cmd = false) {

        return ' <tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --view list  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationViewList(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationViewCreate(bool $show_cmd = false) {

        return ' <tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --view create  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationViewCreate(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationViewEdit(bool $show_cmd = false) {

        return ' <tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --view edit  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationViewEdit(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationViewDelete(bool $show_cmd = false) {

        return ' <tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --view delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationViewDelete(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationModelList(bool $show_cmd = false) {

        return ' <tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --model list  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationModelList(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationModelCreate(bool $show_cmd = false) {

        return ' <tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --model create  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationModelCreate(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationModelEdit(bool $show_cmd = false) {

        return ' <tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --model edit  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationModelEdit(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationModelDelete(bool $show_cmd = false) {

        return ' <tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --model delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationModelDelete(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMigrationMake(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration make 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationMigrationMake(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMigrationMigrate(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration migrate 
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationMigrationMigrate(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMigrationRebase(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration rebase  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationMigrationRebase(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMigrationExport(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration export  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationMigrationExport(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMigrationImport(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration import  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationMigrationImport(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMigrationShow(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration show  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationMigrationShow(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMigrationDelete(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --migration delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationMigrationDelete(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMiddlewareList(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --middleware list  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationMiddlewareList(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMiddlewareCreate(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --middleware create  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationMiddlewareCreate(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMiddlewareEdit(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --middleware edit  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string#
     */
    public static function startExecApplicationMiddlewareEdit(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationMiddlewareDelete(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --middleware delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function startExecApplicationMiddlewareDelete(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationTestsList(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --tests list  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationTestsList(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationTestsCreate(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --tests create  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationTestsCreate(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationTestsDelete(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --tests delete  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    /**
     * @param array $params
     * @return string
     */
    public static function startExecApplicationTestsDelete(array $params){

        return 'Not Ready yet ';

    }

    /**
     * @param bool $show_cmd
     * @return string
     */
    public static function getHelpApplicationTestsRun(bool $show_cmd = false) {

        return '<tr>
                 <td style="color: white;text-align: left;">
                      '. (($show_cmd == true)? "application" : "" ) .'  
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    --tests run  
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns 
                 </td>
            </tr>';

    }

    public static function startExecApplicationTestsRun(array $params){

        return 'Not Ready yet ';

    }

}