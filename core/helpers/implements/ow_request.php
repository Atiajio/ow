<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

/**
 * Class de representation et gestion de la requete en cours
 */

class OW_Request extends OW_Base_Package{

    const METHOD_HEAD = 'HEAD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PURGE = 'PURGE';
    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_TRACE = 'TRACE';
    const METHOD_CONNECT = 'CONNECT';

    /**
     * Custom parameters.
     * Contient (controller, method, params)
     */
    public $attributes;

    /**
     * Request body parameters ($_POST).
     *
     */
    public $request;

    /**
     * Query string parameters ($_GET).
     *
     */
    public $query;

    /**
     * Url params
     */
    public $params;

    /**
     * Server and execution environment parameters ($_SERVER).
     *
     */
    public $server;

    /**
     * Uploaded files ($_FILES).
     *
     */
    public $files;

    /**
     * Cookies ($_COOKIE).
     *
     */
    public $cookies;

    /**
     * Headers (taken from the $_SERVER).
     *
     */
    public $headers;


    /**
     * @var string
     */
    protected $pathInfo;


    /**
     * @var string
     */
    protected $method;

    public function __construct()
    {
        $this->init_request($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    /**
     * @param array $query
     * @param array $request
     * @param array $cookies
     * @param array $files
     * @param array $server
     */
    private function init_request(array $query = [], array $request = [], array $cookies = [], array $files = [], array $server = [])
    {
        /**
         * Recuperation des variables GET
         */
        $this->query = $query;

        /**
         * Recuperation des variables POST
         */
        $this->request = $request;

        /**
         * Recuperation des COOKIES
         */
        $this->cookies = $cookies;

        /**
         * Recuperation des fichiers uploadés
         */
        $this->files = $files;

        /**
         * Recuperation des variables du serveur
         */
        $indicesServer = array('PHP_SELF',
            'argv',
            'argc',
            'GATEWAY_INTERFACE',
            'SERVER_ADDR',
            'SERVER_NAME',
            'SERVER_SOFTWARE',
            'SERVER_PROTOCOL',
            'REQUEST_METHOD',
            'REQUEST_TIME',
            'REQUEST_TIME_FLOAT',
            'QUERY_STRING',
            'DOCUMENT_ROOT',
            'HTTP_ACCEPT',
            'HTTP_ACCEPT_CHARSET',
            'HTTP_ACCEPT_ENCODING',
            'HTTP_ACCEPT_LANGUAGE',
            'HTTP_CONNECTION',
            'HTTP_HOST',
            'HTTP_REFERER',
            'HTTP_USER_AGENT',
            'HTTPS',
            'REMOTE_ADDR',
            'REMOTE_HOST',
            'REMOTE_PORT',
            'REMOTE_USER',
            'REDIRECT_REMOTE_USER',
            'SCRIPT_FILENAME',
            'SERVER_ADMIN',
            'SERVER_PORT',
            'SERVER_SIGNATURE',
            'PATH_TRANSLATED',
            'SCRIPT_NAME',
            'REQUEST_URI',
            'PHP_AUTH_DIGEST',
            'PHP_AUTH_USER',
            'PHP_AUTH_PW',
            'AUTH_TYPE',
            'PATH_INFO',
            'ORIG_PATH_INFO') ;

        $this->server = array();

        foreach ($indicesServer as $arg) {

            if (isset($_SERVER[$arg])) {

                $this->server[strtolower($arg)] =  $_SERVER[$arg];

            }
            else {
                $this->server[strtolower($arg)] =  null;
            }
        }

        /**
         * Generation des informations de l'url
         */
        /**
         * @todo penser a toutes les formes de url possible, meme venant de la console....
         */
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->pathInfo = parse_url($actual_link);

        /**
         * Generation des attributs
         */

        $this->attributes = array();

        if ($this->server["path_info"] != null) {

            $attr_tmp = explode("/", trim($this->server["path_info"], '/'));

            $this->attributes['controller'] = ucwords($attr_tmp[0]);

            array_shift($attr_tmp);

            $this->attributes['method'] = (isset($attr_tmp[0]) && $attr_tmp[0] != "") ? $attr_tmp[0]:  OW_System::get_default_method();

            array_shift($attr_tmp);

            $this->attributes['params'] = $attr_tmp;

        } else {

            $this->attributes['controller'] = OW_System::get_default_controller();
            $this->attributes['method'] = OW_System::get_default_method();
            $this->attributes['params'] = array();

        }

        /**
         * Initialisation des parametres d'urls
         */

        $this->params = $this->attributes['params'];

        /**
         * Initialisation du header
         */

        if ($this->server['server_software'] != null && !str_containt($this->server['server_software'], "Apache")) {

            $this->headers  = new OW_Header($this->nginx_request_headers());

        } else {

            $this->headers  = new OW_Header($this->apache_request_headers());

        }
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

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
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param mixed $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getCookies()
    {
        return $this->cookies;
    }

    /**
     * @param mixed $cookies
     */
    public function setCookies($cookies)
    {
        $this->cookies = $cookies;
    }

    /**
     * @return string
     */
    public function getPathInfo()
    {
        return $this->pathInfo;
    }

    /**
     * @param string $pathInfo
     */
    public function setPathInfo($pathInfo)
    {
        $this->pathInfo = $pathInfo;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param mixed $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }



    /**
     * Function permettant de generer le header pour un serveur apache
     * @return mixed
     */
    private function apache_request_headers()
    {

        foreach($_SERVER as $key => $value) {

            if (substr($key,0,5)=="HTTP_") {

                $key=str_replace(" ","-",ucwords(strtolower(str_replace("_"," ",substr($key,5)))));
                $out[$key]=$value;

            }else if ($key == "CONTENT_TYPE") {

                $headers["Content-Type"] = $value;

            } else if ($key == "CONTENT_LENGTH") {

                $headers["Content-Length"] = $value;

            }
        }
        return $out;

    }

    /**
     * Function permettant de generer le header pour un serveur nginx
     * @return mixed
     */
    private function nginx_request_headers()
    {

        $headers = [];
        foreach ($_SERVER as $name => $value) {

            if (substr($name, 0, 5) == 'HTTP_') {

                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;

            } else if ($name == "CONTENT_TYPE") {

                $headers["Content-Type"] = $value;

            } else if ($name == "CONTENT_LENGTH") {

                $headers["Content-Length"] = $value;

            }

        }
        return $headers;
    }

}