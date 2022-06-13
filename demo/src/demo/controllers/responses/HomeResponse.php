<?php
namespace demo\controllers\responses;

use framework\http\controller\response\HTTPResponse;

class HomeResponse extends HTTPResponse
{
    
    public function __construct()
    {
        $this->pathTemplate = 'pages/home.php';
    }

    /**
     * 
     * {@inheritDoc}
     * @see \framework\http\controller\response\HTTPResponse::execute()
     */
    public function execute()
    {
    }
}