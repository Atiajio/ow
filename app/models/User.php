<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class User extends  OW_Model{

    protected string $useTable = "user";
    protected string $tablePrefix = "ow_";
    protected string $primaryKey = "id";
    protected string $displayField = "name";



}