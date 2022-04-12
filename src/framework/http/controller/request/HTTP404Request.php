<?php
namespace framework\http\controller\request;

use framework\http\controller\response\HTTP404Response;

class HTTP404Request extends HTTPRequest
{
    
    /**
     * 
     */
    public function __construct()
    {
        $this->response = new HTTP404Response();
    }
    
    /**
     * {@inheritDoc}
     * @see \ecommerce\framework\HTTPRequest::execute()
     */
    public function execute()
    {
    }
}
