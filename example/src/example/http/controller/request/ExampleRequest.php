<?php
namespace example\http\controller\request;

use example\http\controller\response\ExampleResponse;
use framework\http\controller\request\HTTPRequest;

class ExampleRequest extends HTTPRequest
{
    
    /**
     * @param ExampleResponse $aResponse
     */
    public function __construct( ExampleResponse $aResponse )
    {
        parent::__construct( $aResponse );
    }

    public function execute()
    {
        //Your code
    }
}