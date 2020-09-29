<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * Return true if a string starts with another sub string
 */
function str_starts_with( $haystack, $needle ) 
{
    $length = strlen( $needle );
    return substr( $haystack, 0, $length ) === $needle;
}

/**
 * Return true if a string ends with another sub string
 */
function str_ends_with( $haystack, $needle ) 
{
   $length = strlen( $needle );

   if( !$length ) {

       return true;

   }

   return substr( $haystack, -$length ) === $needle;
}

/**
 * Return true if a String containt substring
 */
function str_containt($haystack, $needle)
{
    if (strpos($haystack, $needle) !== false) {

        return true;
    
    }

    return false;
}

/**
 * Debuging function
 *  usefull to structure the data during devellepement
 *
 * @param $data
 * @param bool $hard_stop
 */
 function debug($data, $hard_stop = false)
 {
     echo "
        <div style=\" background-color:#258E65; padding:20px; font-weight : bolder; color:white; margin : 20px; overflow-x:scroll; \">
            <pre>";
    if (!isset($data)) {

        echo "No parameter given to debug";
    
    } else {

        var_dump($data);

    }

    echo "<br>";

     $bt = debug_backtrace();
     $caller = array_shift($bt);
     echo $caller['file'];
     echo ";  Line number : ";
     echo $caller['line'];

     echo " </pre>
        </div>
    ";

    if ( $hard_stop == true) {

        die();

    }
 }

/**
 * Return the path from base url to specification
 *
 * @param string $path
 * @return bool
 */
function base_url(string $path  = "")
{

    return rtrim(OW_System::getBaseUrl(), '/'). "/" . ltrim($path, '/');
}