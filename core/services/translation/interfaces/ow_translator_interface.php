<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

interface OW_Translator_Interface {

    /**
     * @param string $language
     * @return array
     */
    public static function read_translation_file(string $language):array;

    /**
     * @param string $text
     * @return bool
     */
    public static function add_translation_string(string $text):bool;

    /**
     * @return string
     */
    public static function get_remote_language():string;
}