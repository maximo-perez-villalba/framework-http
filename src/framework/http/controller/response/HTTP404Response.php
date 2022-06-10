<?php
namespace framework\http\controller\response;

class HTTP404Response extends HTTPResponse
{

    /**
     * 
     */
    public function __construct()
    {
        $this->pathTemplate = 'pages/404.php';
    }
    
    /**
     * {@inheritDoc}
     * @see \ecommerce\framework\HTTPResponse::execute()
     */
    public function execute()
    {
    }
}