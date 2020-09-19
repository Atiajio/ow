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

        $db = array(
           0 => array(
               'dsn'	=> '',
               'hostname' => 'localhost',
               'username' => 'root',
               'password' => '',
               'database' => 'stock',
               'dbdriver' => 'mysqli',
               'dbprefix' => '',
               'pconnect' => FALSE,
               'db_debug' => (SYSTEM_MODE !== 'PROD'),
               'cache_on' => FALSE,
               'cachedir' => '',
               'char_set' => 'utf8',
               'dbcollat' => 'utf8_general_ci',
               'swap_pre' => '',
               'encrypt' => FALSE,
               'compress' => FALSE,
               'stricton' => FALSE,
               'failover' => array(),
               'save_queries' => TRUE
           ),

        1=> array(
            'dsn'	=> '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'blog',
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (SYSTEM_MODE !== 'PROD'),
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt' => FALSE,
            'compress' => FALSE,
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE
        )

        );

        OW_DB::initialize($db);

        $query = OW_DB::$db->query('SELECT name, title, email FROM my_table');

        foreach ($query->result_array() as $row)
        {
            echo $row['title'] . "<br>";
            echo $row['name'] . "<br>";
            echo $row['email'] . "<br>";
        }

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


            //debug("Resquest was created and managed !!! ");

        } else {

            debug('The Controller mus call the function respond() LIKE  $this->respond(); at the end of the controller function. ');

        }
    }

 }