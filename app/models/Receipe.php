<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class Receipe extends  OW_Model{

    protected string $useTable = "receipe";
    protected string $tablePrefix = "ow_";

    public function __construct($params = null)
    {
        parent::__construct($params);

        $this->belongsTo('User');
    }
}