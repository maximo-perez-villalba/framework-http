<?php
namespace demo\controllers\requests;

use framework\http\controller\request\HTTPRequest;
use demo\controllers\responses\DemoResponse;

class DemoRequest extends HTTPRequest
{
    
    /**
     * 
     */
    public function __construct()
    {
        $this->response = new DemoResponse();
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \ecommerce\framework\HTTPRequest::execute()
     */
    public function execute()
    {}
}