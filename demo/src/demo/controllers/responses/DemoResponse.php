<?php
namespace demo\controllers\responses;

use framework\http\controller\response\HTTPResponse;

class DemoResponse extends HTTPResponse
{
    
    /**
     * 
     */
    public function __construct()
    {
        $this->pathTemplate = 'pages/demo.php';
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \ecommerce\framework\HTTPRequest::execute()
     */
    public function execute()
    {
    }
}