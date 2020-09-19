<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * Return true if the given ClassName is for the core oder app
 */
function is_core_class($className)
{
    $className = strtolower($className);

    if ( str_starts_with($className, 'ow_') || $className == "ow" ) {

        return true;

    }

    return false;
}

/**
 * Return the string of complete path of the file 
 *  if matched with the given name
 */
function get_matched_filename($liste, $filename)
{
    $filename = strtolower($filename);

    foreach ($liste as $element){

        if (str_ends_with(strtolower($element), $filename . '.php')) {

            return $element;

        }
    }

    return false;
}

/**
 * Function autoloading classes
 *
 * @param $class
 */
function __autoload($class)
{
    
    if (is_core_class($class)) {

        $filename = get_matched_filename(CORE_PHP_FILES, $class);

        if ($filename != false) {

            require_once($filename);

        } else {

            if (SYSTEM_MODE == 'DEV') {

                debug("Enable to load the class : " . $class. " In Core ");
                die();


            } else {

                /**
                 * Response for the production mode
                 */

            }

        }

    }else{

        $filename = get_matched_filename(APP_PHP_FILES, $class);

        if ($filename != false) {

            require_once($filename);

        } else {

            if (SYSTEM_MODE == 'DEV') {

                debug("Enable to load the class : " . $class . " In App ");
                die();

            } else {

                /**
                 * Response for the production mode
                 */

            }

        }

    }

    /**
     * Check if the class was effective loaded
     */

    if ( !class_exists($class) && !interface_exists($class)) {

        if (str_ends_with($class, "Interface")) {

            debug("A file for the Interface ".ucwords($class)." Exist but dont' have a definition.");

        } else {

            debug("A file for the class ".ucwords($class)." Exist but dont' have a definition.");

        }

        die();

    }
}

/**
 *
 * Fonction qui permet de tester si le fichier d'une classe existe
 *
 * @param $class_name
 * @return bool
 */
function ow_file_for_class_definition_exist($class_name)
{
    if (is_core_class($class_name)) {

        $filename = get_matched_filename(CORE_PHP_FILES, $class_name);

    } else {

        $filename = get_matched_filename(APP_PHP_FILES, $class_name);

    }

    if ($filename != false) {

        return true;

    } else {

        return false;
    }
}