<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Model extends OW_Object implements OW_Model_Interface {

    /**
     * $useTable = ''; // This model does not use a database table
     * $useTable = 'example'; // This model uses a database table 'example'
     * @var string
     */
    protected string $useTable = '';

    /**
     * $tablePrefix = ''; // will look for 'alternate_examples'
     *
     * @var string
     */
    protected string $tablePrefix = '';


    /**
     * @var array
     */
    protected static array $associations =  array('belongsTo', 'hasOne', 'hasMany', 'hasAndBelongsToMany');


    /**
     * Retourne les type d'Associations dans le systeme
     * @return mixed
     */
    public static function associations(): array
    {

        return self::$associations;

    }

    /**
     * @param $attr_name
     * @return mixed
     */
    public function get($attr_name): mixed
    {
        // TODO: Implement get() method.
    }

    /**
     * @param string $attr_name
     * @param mixed $attr_new_value
     * @return mixed
     */
    public function set(string $attr_name, $attr_new_value)
    {
        // TODO: Implement set() method.
    }

    /**
     * @param string $attr_name
     * @return mixed
     */
    public function has(string $attr_name)
    {
        // TODO: Implement has() method.
    }

    /**
     * @param string $attr_name
     * @return mixed
     */
    public function isEmpty(string $attr_name)
    {
        // TODO: Implement isEmpty() method.
    }

    /**
     * @param string $attr_name
     * @return mixed
     */
    public function hasValue(string $attr_name)
    {
        // TODO: Implement hasValue() method.
    }

    /**
     * @return bool
     */
    public function hasErrors(): bool
    {
        // TODO: Implement hasErrors() method.
    }

    /**
     *
     * @return mixed
     */
    public function getErrors(): array
    {
        // TODO: Implement getErrors() method.
    }

    /**
     * @param string $attr_name
     * @param array $errors
     * @return mixed
     */
    public function setError(string $attr_name, array $errors)
    {
        // TODO: Implement setError() method.
    }

    /**
     * @param array $errors
     * @return mixed
     */
    public function setErrors(array $errors)
    {
        // TODO: Implement setErrors() method.
    }

    /**
     * @param int $attr_id
     * @return OW_Model
     */
    public function findById(int $attr_id): OW_Model
    {
        // TODO: Implement findById() method.
    }

    /**
     *
     * chaque table gace aux migrations auront des colonnes deleted, created_at, et modified_at
     * en mode soft delete, on met juste deleted a true
     *
     * @param array $where
     * @return bool
     */
    public function softDelete(array $where): bool
    {
        // TODO: Implement softDelete() method.
    }

    /**
     * Converti l'object en cour en array et retourne
     *
     * @return array
     */
    public function toArray(): array
    {
        // TODO: Implement toArray() method.
    }

    /**
     *
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
     *
     * @param string $type
     * @param array $options
     * @return array
     */
    public function find(string $type, array $options = []): array
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
    public function create(array $options_echappees = array(), array $options_non_echappees = array()): bool
    {
        if (empty($options_echappees) AND empty($options_non_echappees)) {

            return false;

        }

        return (bool) OW_System::$db->set($options_echappees)
                               ->set($options_non_echappees, null, false)
                               ->insert($this->tablePrefix .'' . $this->useTable);
    }

    /**
     * Reading information in one table
     *
     * @param string $select
     * @param array $where
     * @param null $nb
     * @param null $debut
     * @return mixed
     */
    public function read($select = '*', $where = array(), $nb = null, $debut = null): array
    {
        return OW_System::$db->select($select)
                        ->from($this->tablePrefix .'' . $this->useTable)
                        ->where($where)
                        ->limit($nb, $debut)
                        ->get()
                        ->result();
    }

    /**
     * Function qui permet de faire un update sur une ou plusieurs colonnes du model
     *
     * @param array $where
     * @param array $options_echappees
     * @param array $options_non_echappees
     * @return bool
     */
    public function update(array $where, array $options_echappees = array(), array $options_non_echappees = array()): bool
    {

        if (empty($options_echappees) AND empty($options_non_echappees)) {

            return false;

        }

        if (is_integer($where)) {

            $where = array('id' => $where);

        }

        return (bool) OW_System::$db->set($options_echappees)
                                    ->set($options_non_echappees, null, false)
                                    ->where($where)
                                    ->update($this->tablePrefix .'' . $this->useTable);
    }

    /**
     * Function pour supprimer une ou plusieurs colonnes dans la base de données
     *
     * @param array $where
     * @return bool
     */
    public function delete(array $where): bool
    {
        if (is_integer($where)) {

            $where = array('id' => $where);

        }

        return (bool) OW_System::$db->where($where)
                                    ->delete($this->tablePrefix .'' . $this->useTable);
    }

    /**
     *  Counter des elements de la table d'un model
     *
     * @param array $where
     * @return int
     */
    public function count(array $where = array()): int
    {

        return (int) OW_System::$db->where($where)
                              ->from($this->tablePrefix .'' . $this->useTable)
                              ->count_all_results();

    }

    /**
     * Function qui permet de convertir le resultat d'une requete : passage de l'acces pas array[0][elt] à array[elt]
     *
     * @param array $object
     * @return array
     */
    function convert(array $object): array
    {
        // TODO: Implement convert() method.
    }
}