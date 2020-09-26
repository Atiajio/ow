<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 *
 */

interface OW_Model_Interface  {

    /**
     * Retourne les type d'Associations dans le systeme
     * @return array
     */
    public static function associations(): array;

    /**
     * @param $attr_name
     * @return mixed
     */
    public function get($attr_name): mixed;

    /**
     * @param string $attr_name
     * @param mixed $attr_new_value
     * @return mixed
     */
    public function set(string $attr_name, mixed $attr_new_value);

    /**
     * @param string $attr_name
     * @return mixed
     */
    public function has(string $attr_name);

    /**
     * @param string $attr_name
     * @return mixed
     */
    public function isEmpty(string $attr_name);

    /**
     * @param string $attr_name
     * @return mixed
     */
    public function hasValue(string $attr_name);

    /**
     * @return bool
     */
    public function hasErrors():bool;

    /**
     *
     * @return mixed
     */
    public function getErrors():array;

    /**
     * @param string $attr_name
     * @param array $errors
     * @return mixed
     */
    public function setError(string $attr_name, array $errors);

    /**
     * @param array $errors
     * @return mixed
     */
    public function setErrors(array $errors);

    /**
     * @param int $attr_id
     * @return OW_Model
     */
    public function findById(int $attr_id):OW_Model;

    /**
     *
     * chaque table gace aux migrations auront des colonnes deleted, created_at, et modified_at
     * en mode soft delete, on met juste deleted a true
     *
     * @param array $where
     * @return bool
     */
    public function softDelete(array $where): bool;

    /**
     * Converti l'object en cour en array et retourne
     *
     * @return array
     */
    public function toArray():array;

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
    public function find(string $type, array $options = []): array;

    /**
     * Ecris les informations necessaires a la creation d'un nouvel objet dans la base de données
     *
     * @param array $options_echappees
     * @param array $options_non_echappees
     * @return bool
     */
    public function create(array $options_echappees = array(), array $options_non_echappees = array()): bool;

    /**
     * Function qui permet de faire un update sur une ou plusieurs colonnes du model
     *
     * @param array $where
     * @param array $options_echappees
     * @param array $options_non_echappees
     * @return bool
     */
    public function update(array $where, array $options_echappees = array(), array $options_non_echappees = array()): bool;

    /**
     * Function pour supprimer une ou plusieurs colonnes dans la base de données
     *
     * @param array $where
     * @return bool
     */
    public function delete(array $where): bool;

    /**
     *  Counter des elements de la table d'un model
     *
     * @param array $where
     * @return int
     */
    public function count(array $where = array()):int;

    /**
     * Function qui permet de convertir le resultat d'une requete : passage de l'acces pas array[0][elt] à array[elt]
     *
     * @param array $object
     * @return array
     */
     function convert(array $object): array;
}