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

    }

 }