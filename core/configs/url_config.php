<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * FICHIER DE DECALARATION DES VARIABLES GLOBALES POUR LES URLS
 */

/**
 * Chemin de base vers les Fichiers php du core
 * aide à l'autochargement du dossier de classe
 */
define('CORE_PHP_FILES', recursiv_find_files(ROOT . DS . 'core'));
/**
 *  Chemin de base vers les Fichiers php de la nouvelle App
 *  aide à l'autochargement du dossier de classe
 */
define('APP_PHP_FILES', recursiv_find_files(ROOT . DS . 'app'));