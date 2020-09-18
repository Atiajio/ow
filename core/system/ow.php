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
         * Demarage des middlewares
         */
        $response = OW_System::launch_middlewares();

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

            /**
             * Normale framework case
             */


            debug("Resquest was created and managed !!! ");

        } else {

            debug('The Controller mus call the function respond() LIKE  $this->respond(); at the end of the controller function. ');

        }
    }

 }