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
     * Funtion qui permet de donner le SQL de migration du model
     */
    public function getSqlMigration(){

        $class = get_class($this);
        $instance = new $class();
        $previous_column = "id";

        /**
         * Recuperation des informations sur la table
         */
        $actual_table = $this->getActualTableInfos();
        $sql = "-- Auto Generated Migration SQL For the Model : ". strtoupper(get_class($this)) . "\n\n";

        if (empty($actual_table) == true) {

            /**
             * Cas ou la table du model n'exite pas encore
             */

            $sql .= $this->getSQLCreateTable();
            $sql .= "\n\n\n";

            $sql .= "ALTER TABLE ". $this->tablePrefix .'' . $this->useTable . "\n";

            foreach (get_object_vars ($instance) AS $attr) {

                if ($attr instanceof  OW_Db_Element) {

                    if ($attr->getName() != "id") {

                        $sql .= "\t". $attr->getAddColumnQuery($previous_column) .",\n";

                        $previous_column = $attr->getName();

                    }
                }
            }

            $sql = substr($sql, 0, -2) .";";

        } else {

            /**
             * Cas ou la table existe deja
             */

        }


        return $sql;
    }


    /**
     * @return string
     */
    public function getSQLCreateTable(){

        $sql = "
CREATE TABLE IF NOT EXISTS `". $this->tablePrefix .'' . $this->useTable ."` (
\t`id` BIGINT NULL AUTO_INCREMENT COMMENT 'ID Column for the table of ". $this->useTable ."',
\tINDEX `id` (`id`)
)COLLATE='utf8mb4_general_ci';";
        return $sql;
    }

    /**
     * Fonction qui retourne toutes les informations actuelles sur la base de données
     *
     * @return array
     */
    private function getActualTableInfos(): array
    {
        $sql = "
SELECT 
    col.COLUMN_NAME,
    col.ORDINAL_POSITION,
    col.COLUMN_DEFAULT,
    col.IS_NULLABLE,
    col.DATA_TYPE,
    col.CHARACTER_MAXIMUM_LENGTH,
    col.NUMERIC_PRECISION,
    col.DATETIME_PRECISION,
    col.COLLATION_NAME,
    col.COLUMN_TYPE,
    col.COLUMN_KEY,
    col.COLUMN_KEY,
    col.EXTRA,
    col.COLUMN_COMMENT
FROM INFORMATION_SCHEMA.COLUMNS AS col
WHERE TABLE_SCHEMA = '". OW_System::$db->database  ."'
AND TABLE_NAME = '" . $this->tablePrefix .'' . $this->useTable  ."';";

        $result = OW_System::$db->query($sql);
        return $result->result_array();
    }

}