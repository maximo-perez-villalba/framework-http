<?php
namespace demo\controllers\responses;

use framework\http\controller\response\HTTPResponse;

class RoutesResponse extends HTTPResponse
{
    
    public function __construct()
    {
        $this->pathTemplate = 'pages/routes.php';
    }
    
    public function execute()
    {}
}

