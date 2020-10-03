<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class User extends  OW_Model{

    protected string $useTable = "user";
    protected string $tablePrefix = "ow_";

    /**
     * definition des attributs
     */
    protected OW_Db_Element $name;
    protected OW_Db_Element $sexe;
    protected OW_Db_Element $age;
    /**
     * User constructor.
     * @param null $params
     */
    public function __construct($params = null)
    {
        parent::__construct($params);

        $this->hasOne('Profil');
        $this->hasMany('Receipe');
        /**
         * initialisation des attributs
         */
        $this->name = new OW_Db_Element("name");
        $this->name->type(OW_Db_Element::VARCHAR)->length(255);

        $this->sexe = new OW_Db_Element("sexe");
        $this->sexe->type(OW_Db_Element::CHAR);

        $this->age = new OW_Db_Element("age");
        $this->age->type(OW_Db_Element::INT)->length(7);
    }
}