<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * System URL Configuration
 *  https|http
 *  base_url
 */

OW_System::register_base_url("http://localhost/ow");

/**
 * System View type Configuration
 *  UI options
 *  => React
 *  => Quasar
 */


/**
 * System Database Configuration
 *  List Databases
 *  array()
 */


/**
 * System Middleware Configuration
 *  Register Middleware object
 */

$db = array(
    'dsn'	=> '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'ow',
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
);

OW_System::register_db($db);

/**
 * System Parallel Server Configuration
 *  List Parallel Server for large Executions
 */


/**
 * System Error Route templates
 *  List route Templates
 */


/**
 * System Payment Activation
 *  Register the type of Payment needed
 *  => API Keys
 */


/**
 * System Security Service activation
 * => Mega Large Firewall Activation
 */

/**
 * System Online Editor Service Activation
 *  => Editor online for Quickly edition
 */


/**
 * Default System Configuration
 *  default controller
 *  default method
 *  ....
 */