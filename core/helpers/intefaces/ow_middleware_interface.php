<?php

/**
 * Security script access
 */
defined('ROOT') OR exit('No direct script access allowed');

interface OW_Middleware_Interface{

    public function run(OW_Request $request, OW_Response $response, mixed $next): OW_Response;

}