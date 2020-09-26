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

    /**
     * @var
     */
    protected $_hidden;


}