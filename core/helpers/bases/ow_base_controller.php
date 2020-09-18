<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Controller extends OW_Object{
    
    public $request;
    public $response;

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;

    }

    /**
     * @param mixed $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @param $model_name
     * @return mixed
     */
    public function model ($model_name)
    {
        if (ow_file_for_class_definition_exist($model_name)) {

            $new_model = ucwords(strtolower($model_name));

            $new_model = new $new_model();

            if ($new_model instanceof OW_Model) {

                return new $new_model();

            } else {

                debug("The class ". ucwords($model_name) ." mus extends OW_Model");

            }
        } else {

            debug("The class ". ucwords($model_name) ." doesn't exist. Please create it in the file : App/models/". ucwords($model_name) .".php");

        }
    }


}