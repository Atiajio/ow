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

/**
 * Demarage du systeme
 */
OW::run();