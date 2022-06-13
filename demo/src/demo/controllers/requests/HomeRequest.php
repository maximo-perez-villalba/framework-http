<?php
namespace demo\controllers\requests;

use demo\controllers\responses\HomeResponse;
use framework\http\controller\request\HTTPRequest;

class HomeRequest extends HTTPRequest
{
    
    public function __construct()
    {
        $this->response = new HomeResponse();
    }

    /**
     * 
     * {@inheritDoc}
     * @see \framework\http\controller\request\HTTPRequest::execute()
     */
    public function execute()
    {}
}