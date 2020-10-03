<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class Ingredient extends OW_Model{

    protected string $useTable = "ingredient";
    protected string $tablePrefix = "ow_";

    public function __construct($params = null)
    {
        parent::__construct($params);

        $this->hasAndBelongsToMany('Receipe');
    }
}