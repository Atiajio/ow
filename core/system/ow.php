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
        $response = OW_System::launch_middleware();

        if ($response->isContentSent()) {
            /**
             * Retrour de la reponse en fonction du mode UI installé
             */

            /**
             * Cas REACT
             */


            /**
             * CAS QUASAR
             */

        } else {

            debug('The Controller mus call the function respond() LIKE  $this->respond(); at the end of the controller function. ');

        }
    }

 }