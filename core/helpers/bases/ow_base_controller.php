<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

class OW_Base_Controller extends OW_Object implements OW_Controller_Interface {
    
    public OW_Request $request;
    public OW_Response $response;

    /**
     * @return OW_Request
     */
    public function getRequest(): OW_Request
    {
        return $this->request;

    }

    /**
     * @param OW_Request $request
     */
    public function setRequest(OW_Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return OW_Response
     */
    public function getResponse(): OW_Response
    {
        return $this->response;
    }

    /**
     * @param OW_Response $response
     */
    public function setResponse(OW_Response $response)
    {
        $this->response = $response;
    }

    /**
     * @param string $model_name
     * @return OW_Model
     */
    public function model (string $model_name):OW_Model
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