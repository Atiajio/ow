<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

interface OW_Db_Element_Interface {

    /**
     * le type de l'element dans la base de données
     *
     * @param string $type
     * @return OW_Base_Db_Element
     */
    public function type (string $type): OW_Base_Db_Element;

    /**
     * Longueur de l'element dans la base de données
     *
     * @param int $length
     * @return OW_Base_Db_Element
     */
    public function length (int $length): OW_Base_Db_Element;

    /**
     *
     * Liste des valeurs pour les enums
     *
     * @param string $sets
     * @return OW_Base_Db_Element
     */
    public function sets (string $sets): OW_Base_Db_Element;

    /**
     * True ou false pour les element signé
     *
     * @param bool $signed
     * @return OW_Base_Db_Element
     */
    public function signed (bool $signed): OW_Base_Db_Element;

    /**
     * Accepte la valeur null
     *
     * @param bool $nullable
     * @return OW_Base_Db_Element
     */
    public function nullable (bool $nullable): OW_Base_Db_Element;

    /**
     * @param bool $zerofill
     * @return OW_Base_Db_Element
     */
    public function zerofill (bool $zerofill): OW_Base_Db_Element;

    /**
     * Valeur standart, ou alors une function ou tout autre chose
     *
     * @param string $standard
     * @return OW_Base_Db_Element
     */
    public function standard (string $standard): OW_Base_Db_Element;

    /**
     * A faire lors d'un update
     *
     * @param string $on_update
     * @return OW_Base_Db_Element
     */
    public function on_update (string $on_update): OW_Base_Db_Element;

    /**
     * Comment
     *
     * @param string $comment
     * @return OW_Base_Db_Element
     */
    public function comment (string $comment): OW_Base_Db_Element;

    /**
     *
     * Collation
     *
     * @param string $collation
     * @return OW_Base_Db_Element
     */
    public function collation (string $collation): OW_Base_Db_Element;

    /**
     *
     * Expression
     *
     * @param string $expression
     * @return OW_Base_Db_Element
     */
    public function expression (string $expression): OW_Base_Db_Element;

    /**
     * Virtualité de l'element
     *
     * @param string $virtuality
     * @return OW_Base_Db_Element
     */
    public function virtuality (string $virtuality): OW_Base_Db_Element;

    /**
     * Retourne la query necessaire pour creer une colonne cet element dans la table de la BD
     *
     * @param string $preview_column
     * @return string
     */
    public function getAddColumnQuery(string $preview_column = 'id'): string;

}