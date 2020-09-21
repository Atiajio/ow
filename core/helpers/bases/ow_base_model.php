<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Model extends OW_Object implements OW_Model_Interface {

    /**
     * @var array
     */
    protected static  $associations =  array('belongsTo', 'hasOne', 'hasMany', 'hasAndBelongsToMany');


    /**
     * Retourne les type d'Associations dans le systeme
     * @return mixed
     */
    public static function associations(){

        return self::$associations;

    }

    /**
     * @param $attr_name
     * @return mixed
     */
    public function get($attr_name)
    {
        // TODO: Implement get() method.
    }

    /**
     *
     * @param $attr_name
     * @param $attr_new_value
     */
    public function set($attr_name, $attr_new_value)
    {
        // TODO: Implement set() method.
    }

    /**
     * @param $attr_name
     * @return bool
     */
    public function has($attr_name)
    {
        // TODO: Implement has() method.
    }

    /**
     * @param $attr_name
     * @return bool
     */
    public function isEmpty($attr_name)
    {
        // TODO: Implement isEmpty() method.
    }

    /**
     * @param $attr_name
     * @return bool
     */
    public function hasValue($attr_name)
    {
        // TODO: Implement hasValue() method.
    }

    /**
     * @return array
     */
    public function hasErrors()
    {
        // TODO: Implement hasErrors() method.
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        // TODO: Implement getErrors() method.
    }

    /**
     * @param $attr_name
     * @param $errors
     */
    public function setError($attr_name, $errors)
    {
        // TODO: Implement setError() method.
    }

    /**
     * @param $errors
     */
    public function setErrors($errors)
    {
        // TODO: Implement setErrors() method.
    }

    /**
     * @param $attr_id
     * @return array
     */
    public function findById($attr_id)
    {
        // TODO: Implement findById() method.
    }

    /**
     *  chaque table gace aux migrations auront des colonnes deleted, created_at, et modified_at
     * en mode soft delete, on met juste deleted a true
     */
    public function softDelete()
    {
        // TODO: Implement softDelete() method.
    }

    /**
     * Converti l'object en cour en array et retourne
     */
    public function toArray()
    {
        // TODO: Implement toArray() method.
    }

    /**
     *
     */
    public function setVirtual()
    {
        // TODO: Implement setVirtual() method.
    }/**
 * List of options
 *
 * conditions provide conditions for the WHERE clause of your query.
 *limit* Set the number of rows you want.
 *offset* Set the page offset you want. You can also use page to make the calculation simpler.
 *contain define the associations to eager load.
 *fields limit the fields loaded into the entity. Only loading some fields can cause entities to behave incorrectly.
 *group add a GROUP BY clause to your query. This is useful when using aggregating functions.
 *having add a HAVING clause to your query.
 * join define additional custom joins.
 * order order the result set.
 *
 *
 * https://book.cakephp.org/3/en/orm/retrieving-data-and-resultsets.html
 *
 * @param $type
 * @param array $options
 */
    public function find($type, $options = [])
    {
        // TODO: Implement find() method.
    }

    /**
     * Ecris les informations necessaires a la creation d'un nouvel objet dans la base de données
     *
     * @param array $options_echappees
     * @param array $options_non_echappees
     * @return bool
     */
    public function create($options_echappees = array(), $options_non_echappees = array())
    {
        // TODO: Implement create() method.
    }

    /**
     * Function qui permet de faire un update sur une ou plusieurs colonnes du model
     *
     * @param $where
     * @param array $options_echappees
     * @param array $options_non_echappees
     * @return bool
     */
    public function update($where, $options_echappees = array(), $options_non_echappees = array())
    {
        // TODO: Implement update() method.
    }

    /**
     * Function pour supprimer une ou plusieurs colonnes dans la base de données
     *
     * @param $where
     * @return bool
     */
    public function delete($where)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Counter des elements de la table d'un model
     *
     * @param array $where
     * @return int
     */
    public function count($where = array())
    {
        // TODO: Implement count() method.
    }

    /**
     * Function qui permet de convertir le resultat d'une requete : passage de l'acces pas array[0][elt] à array[elt]
     *
     * @param $object
     * @param bool $one
     * @return mixed
     */
    function convert($object, $one = false)
    {
        // TODO: Implement convert() method.
    }
}