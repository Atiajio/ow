<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Model extends OW_Base_Model{

    /**
     * Relations de l'object
     */

    protected array $hasOne;
    protected array $hasMany;
    protected array $belongsTo;
    protected array $hasAndBelongsToMany;

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
        parent::__construct($params);
    }

    /**
     * @return array
     */
    public function getHasOne(): array
    {
        return $this->hasOne;
    }

    /**
     * @param string $model_name
     */
    public function hasOne(string $model_name)
    {
        $this->hasOne[] = $model_name;
    }

    /**
     * @param array $hasOne
     */
    public function setHasOne(array $hasOne): void
    {
        $this->hasOne = $hasOne;
    }

    /**
     * @return array
     */
    public function getHasMany(): array
    {
        return $this->hasMany;
    }

    /**
     * @param string $model_name
     */
    public function hasMany(string $model_name)
    {
        $this->hasMany[] = $model_name;
    }

    /**
     * @param array $hasMany
     */
    public function setHasMany(array $hasMany): void
    {
        $this->hasMany = $hasMany;
    }

    /**
     * @return array
     */
    public function getBelongsTo(): array
    {
        return $this->belongsTo;
    }

    /**
     * @param string $model_name
     */
    public function belongsTo(string $model_name)
    {
        $this->belongsTo[] = $model_name;
    }

    /**
     * @param array $belongsTo
     */
    public function setBelongsTo(array $belongsTo): void
    {
        $this->belongsTo = $belongsTo;
    }

    /**
     * @return array
     */
    public function getHasAndBelongsToMany(): array
    {
        return $this->hasAndBelongsToMany;
    }

    /**
     * @param string $model_name
     */
    public function hasAndBelongsToMany(string $model_name): void
    {
        $this->hasAndBelongsToMany[] = $model_name;
    }

    /**
     * @param array $hasAndBelongsToMany
     */
    public function setHasAndBelongsToMany(array $hasAndBelongsToMany): void
    {
        $this->hasAndBelongsToMany = $hasAndBelongsToMany;
    }

    /**
     * Funtion qui permet de donner le SQL de migration du model
     */
    public function getSqlMigration(){

        $class = get_class($this);
        $instance = new $class();
        $previous_column = "id";

        $sql = "ALTER TABLE ". $this->tablePrefix .'' . $this->useTable . "\n";

        foreach (get_object_vars ($instance) AS $attr) {

            if ($attr instanceof  OW_Db_Element) {

                if ($attr->getName() != "id") {

                    $sql .= "\t". $attr->getAddColumnQuery($previous_column) .",\n";

                    $previous_column = $attr->getName();

                }
            }
        }

        $sql = substr($sql, 0, -2) .";";

        debug($sql);
    }


    public function getSQLCreateTable(){

        $sql = "
CREATE TABLE `". $this->tablePrefix .'' . $this->useTable ."` (
    `id` BIGINT NULL AUTO_INCREMENT COMMENT 'ID Column for the table of ". $this->useTable ."',
    INDEX `id` (`id`)
)
COLLATE='utf8mb4_general_ci'
;";

        debug($sql);
        return $sql;
    }

}