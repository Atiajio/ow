<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Translator implements OW_Translator_Interface{

    /**
     * @param string $language
     * @return array
     */
    public static function read_translation_file(string $language): array
    {
        // TODO: Implement read_translation_file() method.
    }

    /**
     * @param string $text
     * @return bool
     */
    public static function add_translation_string(string $text): bool
    {
        // TODO: Implement add_translation_string() method.
    }

    /**
     * @return string
     */
    public static function get_remote_language(): string
    {
        // TODO: Implement get_remote_language() method.
    }
}