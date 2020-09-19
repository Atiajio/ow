<?php

/**
 * FICHIER PRINCIPALE DU FRAMEWORK OW
 */

/**
 * Constante supper globales du systeme
 */
define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);


/**
 * Initialisation du service de gestion des Sessions
 */
 session_start();

/**
 * Chargement des configurations du system
 */
require_once(ROOT . DS . 'core' . DS . 'configs' . DS .'config.php' );
 

 
/**
 * Chargement des configuration de la nouvelle application 
 */
require_once(ROOT . DS . 'app' . DS . 'configs' . DS .'config.php' );
require_once(ROOT . DS . 'app' . DS . 'configs' . DS .'routes.php' );
require_once(ROOT . DS . 'app' . DS . 'configs' . DS .'middlewares.php' );

/**
 * Demarage du systeme
 */
OW::run();