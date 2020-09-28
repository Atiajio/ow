<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class Starter extends OW_Controller{

    public function index(){

        $result = OW_System::$db->query("select * from users");
        foreach ($result->result() as $row){
            echo $row->name ."<br>";
            echo $row->age ."<br>";
            echo $row->sexe ."<br>";
        }
        $this->respond();
    }

}