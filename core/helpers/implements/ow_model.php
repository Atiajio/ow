<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Model extends OW_Base_Model{

    /**
     * Les attibutes doivent etre public
     * pour permettre l'acces direct
     * $this->id
     * $this->...
     * dans les controlleurs ou alleuirs
     */

    /**
     * OW_Model constructor.
     *
     * new Entity();
     * new Entity([
        'id' => 1,
     *  ...
        ]);
     * @param null $params
     */
    public function __construct($params = null)
    {

    }

    /**
     * $useTable = false; // This model does not use a database table
     * $useTable = 'exmp'; // This model uses a database table 'exmp'
     * @var bool
     */
    protected $useTable = false;

    /**
     * $tablePrefix = 'ow_table_prefix_'; // will look for 'alternate_examples'
     *
     * @var string
     */
    protected $tablePrefix = 'ow_table_prefix_';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Champ a afficher en cas de to_string de l'element
     *
     * dans le cas de plusieurs fields a display
     * $displayFields = array(
            fields => array('first_name', 'last_name'),
     *      format => "Name : %s  Lastname : %s"
     * );
     *
     * @var string|array
     */
    protected $displayField = 'id';

    /**
     *
     * $virtualFields = array(
            'name' => "CONCAT(User.first_name, ' ', User.last_name)",
     *       'is_admin' => true or false ...
        );
     *
     * @var array 
     */
    protected $virtualFields = array();

    /**
     * @var
     */
    protected $_hidden;

    /**
     * @param $attr_name
     * @return mixed
     */
    public function get($attr_name){

        /**
         * @todo test exestance
         *
         * si c est un intval en param, c est qu on voulais selct where id = $attr_name
         */

        return $this->$attr_name;
    }

    /**
     *
     * @param $attr_name
     * @param $attr_new_value
     */
    public function set($attr_name, $attr_new_value){

        /**
         * @todo test exestance
         * @todo permettre aussi le cas de plusieurs attr
         * array de attr => $value
         */

        $this->$attr_name = $attr_new_value;
    }

    /**
     * @param $attr_name
     * @return bool
     */
    public function has($attr_name){

        /**
         * @todo test exestance
         */

        return true;
    }

    /**
     * @param $attr_name
     * @return bool
     */
    public function isEmpty($attr_name){

        /**
         * @todo test if empty
         */

        return true;
    }

    /**
     * @param $attr_name
     * @return bool
     */
    public function hasValue($attr_name){

        /**
         * @todo test if != null
         */

        return true;
    }

    /**
     * @return array
     */
    public function hasErrors(){

        /**
         * retourne true ou false s'il ya les erreurs de validation du model
         */
        return false;
    }
    /**
     * @return array
     */
    public function getErrors(){

        /**
         * retourne les erreurs de validation du model
         */
        return array(

        );
    }

    /**
     * @param $attr_name
     * @param $errors
     */
    public function setError($attr_name, $errors){

        /**
         * edit les erreurs de validation du model pour cet attr
         */
    }

    /**
     * @param $errors
     */
    public function setErrors($errors){

        /**
         * edit les erreurs de validation du model pour un ensemble d'Attr en mode attr => errors
         */
    }

    /**
     * @param $attr_id
     * @return array
     */
    public function findById($attr_id){

        return array();
    }

    /**
     *  chaque table gace aux migrations auront des colonnes deleted, created_at, et modified_at
     * en mode soft delete, on met juste deleted a true
     */
    public function softDelete(){

    }

    /**
     * Converti l'object en cour en array et retourne
     */
    public function toArray(){

    }

    /**
     *
     */
    public function setVirtual(){

    }

    /**
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
    public function find($type, $options = []){

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
        /**
         * Si les données sont vide, on sort car on ne peut pas enregistrer des informations vides
         */
        if(empty($options_echappees) AND empty($options_non_echappees)) {

            return false;

        }

        return (bool) OW_DB::$db->set($options_echappees)
            ->set($options_non_echappees, null, false)
            ->insert($this->table);
    }

    /**
     * Function qui permet de faire un update sur une ou plusieurs colonnes du model
     *
     * @param $where
     * @param array $options_echappees
     * @param array $options_non_echappees
     * @return bool
     */
    public function update($where, $options_echappees = array(), $options_non_echappees = array()) {

        /**
         * Pas d'enregistrement d'informations vides
         */
        if(empty($options_echappees) AND empty($options_non_echappees)) {

            return false;

        }

        /**
         * Cas ou le $where est juste l'id de la colonne a update
         */
        if(is_integer($where)) {

            $where = array('id' => $where);

        }

        return (bool) OW_DB::$db->set($options_echappees)
            ->set($options_non_echappees, null, false)
            ->where($where)
            ->update($this->table);
    }

    /**
     * Function pour supprimer une ou plusieurs colonnes dans la base de données
     *
     * @param $where
     * @return bool
     */
    public function delete($where) {

        if(is_integer($where)) {

            $where = array('id' => $where);

        }

        return (bool) OW_DB::$db->where($where)
            ->delete($this->table);
    }

    /**
     * Counter des elements de la table d'un model
     *
     * @param array $where
     * @return int
     */
    public function count($where = array()){

        return (int) OW_DB::$db->where($where)
            ->count_all_results($this->table);
    }

    /**
     * Function qui permet de convertir le resultat d'une requete : passage de l'acces pas array[0][elt] à array[elt]
     *
     * @param $object
     * @param bool $one
     * @return mixed
     */
    public function convert($object, $one = false){

        $data =  json_decode(json_encode($object), True);

        if (sizeof($data) == 1 && $one == true) {

            return $data[0];

        }

        return $data;
    }
}