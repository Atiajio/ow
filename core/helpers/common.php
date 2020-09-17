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
 */

 function debug($data)
 {
     echo "
        <div style=\" background-color:#258E65; padding:20px; font-weight : bolder; color:white; margin : 20px; overflow-x:scroll; \">
            <pre>";
    if (!isset($data)) {

        echo "No parameter given to debug";
    
    } else {

        var_dump($data);

    }

    echo "
            </pre>
        </div>
    ";
    
 }