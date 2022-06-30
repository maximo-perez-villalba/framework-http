<?php
namespace example\http\controller\request;

use example\http\controller\response\ExampleResponse;
use framework\http\controller\request\HTTPRequest;

class ExampleRequest extends HTTPRequest
{
    
    public function __construct()
    {
        $this->response = new ExampleResponse();
    }

    public function execute()
    {
        //Your code
    }
}