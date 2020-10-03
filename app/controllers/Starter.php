<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class Starter extends OW_Controller{

    public function index(){

        $this->model("Receipe")->getSQLCreateTable();
        $this->model("Receipe")->getSqlMigration();

        $this->respond();
    }

}