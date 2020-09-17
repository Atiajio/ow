<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * Recursiv files deletion
 */
function recursiv_delete_directories($dir) 
{
	   	
    $files = array_diff(scandir($dir), array('.','..'));
 
    foreach ($files as $file) {
    
        (is_dir("$dir/$file")) ? recursiv_delete_directories("$dir/$file") : unlink("$dir/$file");
    
    }
    
    return rmdir($dir);
}

/**
 * Recursiv get list of the files in the system
 */
function recursiv_find_files($dir, $extention = "") 
{
	$return_files = array();
    $files = array_diff(scandir($dir), array('.','..'));
    
    foreach ($files as $file) {
    
        if (is_dir("$dir" . DS ."$file")) {
            
            $tmp_files = recursiv_find_files("$dir" . DS ."$file", $extention);
            $return_files = array_merge($return_files, $tmp_files);

        } else {
            

            $tmp_name = "$dir" . DS ."$file";
            
            if ($extention != "" ) {
                
                if (str_ends_with($tmp_name, $extention)) {

                    $return_files[] = $tmp_name;

                }
                
            } else {

                $return_files[] = $tmp_name;

            }
        }
    }
    
    return $return_files;
}