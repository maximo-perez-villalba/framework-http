<?php
namespace demo\controllers\requests;

use demo\controllers\responses\RoutesResponse;
use framework\http\controller\request\HTTPRequest;

class RoutesRequest extends HTTPRequest
{
    
    public function __construct()
    {
        $this->response = new RoutesResponse();
    }
    
    public function execute()
    {}
}

