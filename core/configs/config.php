<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');
/**
 * FICHIER DE CHARGEMENT DES CONFIGURATIONS NECESSAIRES
 */

/**
 * Chargement des fonctions utilisables partout dans le systeme
 */

require_once(ROOT . DS . 'core' . DS . 'helpers' . DS .'common.php' );

/**
 * Chargement des fonction globales liées a la gestion des fichiers
 */
  
require_once(ROOT . DS . 'core' . DS . 'helpers' . DS .'files_functions.php' );

/**
 * Chargement des parametres d'urls
 */
require_once(ROOT . DS . 'core' . DS . 'configs' . DS .'url_config.php' );

/**
 * Chargement des constantes globales du systeme
 */

require_once(ROOT . DS . 'core' . DS . 'configs' . DS .'constants.php' );


/**
 * Chargement de la fonction autoloader de OW
 */

require_once(ROOT . DS . 'core' . DS . 'helpers' . DS .'autoloader.php' );


/**
 * Chargement des configurations globales su systeme
 */

require_once(ROOT . DS . 'core' . DS . 'configs' . DS .'global_config.php' );

