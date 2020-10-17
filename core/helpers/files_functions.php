<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * Recursive files deletion
 *
 * @param $dir
 * @return bool
 */
function recursive_delete_directories($dir)
{
	   	
    $files = array_diff(scandir($dir), array('.','..'));
 
    foreach ($files as $file) {
    
        (is_dir("$dir/$file")) ? recursiv_delete_directories("$dir/$file") : unlink("$dir/$file");
    
    }
    
    return rmdir($dir);
}

/**
 * Recursive get list of the files in the system
 *
 * @param $dir
 * @param string $extention
 * @return array
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

/**
 * Fonction pour creer les fichiers avec un contenu
 *
 * @param string $content
 * @param string $filepath
 */
function create_file_content(string $content, string $filepath){

    file_put_contents($filepath,$content);

}


