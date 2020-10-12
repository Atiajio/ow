<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Console extends OW_Controller {

    /**
     * Function qui permet de recuperer la requete vers la console et retourne la reponse
     */
    public function exec(){

        $query = $this->request->getQuery();
        $cmd = $query['cmd'];
        $params = explode(" ", $cmd);
        $cmd_params_clean = array();
        foreach ($params as $token){

            $cmd_params_clean[] = trim($token);

        }
        $data['result'] = self::real_exec($cmd_params_clean);
        $this->response->setBody($data);
        $this->respond();
    }


    public static function real_exec(array $params) :string
    {
        $success = true;
        $output_result = "";
        $output_cmd = "";

        /**
         * Traitement de commande
         */
        if ($params[0] == 'help') {

            $output_cmd .= self::getStartTable(true);

            if (sizeof($params) == 1) {

                $output_cmd .= self::getAllHelp();

            } else {

                array_shift($params);
                $command = $params[0];
                $command_class_name = 'OW_'. ucwords($command) .'_Cmd';
                array_shift($params);
                $output_cmd .= $command_class_name::help($params);
            }

            $output_cmd .= self::getEndTable();

        } else {

            if (sizeof($params) == 1) {

                $command = $params[0];
                array_shift($params);
                $command_class_name = 'OW_'. ucwords($command) .'_Cmd';
                $output_cmd .= $command_class_name::run($params);

            } else {

                $command = $params[0];
                array_shift($params);
                $command_class_name = 'OW_'. ucwords($command) .'_Cmd';
                $output_cmd .= $command_class_name::run($params);

            }

        }

        /**
         * Traitement de la reponse
         */
        if ($success == true ) {

            $output_result .= '<div style="background-color: #1B5E1A; color: white; padding:10px;">';

            $output_result .= $output_cmd;

            $output_result .= '</div>';

        } else {

            $output_result .= '<div style="background-color: red; color: white; padding:10px;">';

            $output_result .= $output_cmd;

            $output_result .= '</div>';

        }

        return $output_result;
    }

    /**
     * Fonctions qui retrourne les commades help
     *
     */
    /**
     * @return string
     */
    public static function getHelpCMD(){

        return '<tr>
                 <td style="color: white;text-align: left;">
                        help
                 </td>
                 
                 <td style="color:white;text-align: left;" >
                    Command | None
                 </td>
                 
                 <td style="color:white;text-align: left;">
                    Returns the list of available commands and associated options. Then adds a description of the actions of these commands.
                 </td>
            </tr>';

    }



    public static function getAllHelp() {
        /**
         * Affichage de la commande help
         */
        $output = self::getHelpCMD();

        /**
         * Charge les autres helps
         */

        $files_names = recursiv_find_files(ROOT . DS . 'core' . DS . 'services' . DS . 'console' . DS . 'implements', '.php');
        foreach ($files_names as $key => $value) {

            $table = explode('_',substr(basename($value), 0,-4));
            $command_class_name = 'OW_'. ucwords($table[1]) . '_' . ucwords($table[2]);
            $output .= $command_class_name::help(array());
        }

        return $output;
    }

    /**
     * Retourne le debut de la table d affichage des commandes
     * @return string
     */
    public static function getStartTable(){

        return '
<div style="color: #1B5E1A">
    <table style="width: 100%">
        <thead style="background-color: white; width: 100%; font-weight: bolder">
            <th style="width: 100px;">Command</th>
            <th style="width: 150px;">Options</th>
            <th>Actions</th>
        </thead>
        <tbody>';

    }

    /**
     * Retourne la fermeture de la table d affichage des commandes
     * @return string
     */
    public static function getEndTable(){

        return '
        </tbody>
    </table>
</div>';
    }

}