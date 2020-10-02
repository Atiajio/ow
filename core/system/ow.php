<?php
/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * CLASSE PRINCIPALE DE DEMARAGE DU SYSTEME
 */

 class OW extends OW_Object{

    /**
     * Lancement du systeme et gestion de la requete en cours
     */
    public static function run(){

        /**
         * Connexion a la base de données
         */
        OW_System::init_db(0);

        /**
         * Demarage des middlewares
         */

        /**
         * Si la requete est en mode Ajax on lance les middelwares et toute la suite
         * sinon on retourne juste la page template
         */
        //IF HTTP_X_REQUESTED_WITH is equal to xmlhttprequest
        if(
            isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ){
            OW_System::setAjaxRequest(true);
        }

        if(OW_System::isAjaxRequest() == false){

            /**
             * Retrour de la reponse en fonction du mode UI installé
             */

            /**
             * Cas REACT
             */
            ob_start();

            require_once(ROOT . DS . 'core' . DS . 'helpers' . DS .'default_view.php' );

            return ob_flush();

            /**
             * CAS QUASAR
             */


        } else {

            $response = OW_System::launch_middleware();

            if ($response->isContentSent()) {

                /**
                 * Retour de la reponse json
                 */
                //$response->sendHeader();
                //debug(headers_list());
                echo json_encode($response->getBody(), JSON_NUMERIC_CHECK);

            } else {

                debug('The Controller mus call the function respond() LIKE  $this->respond(); at the end of the controller function. ');

            }

        }

    }

 }