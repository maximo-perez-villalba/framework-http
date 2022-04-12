<?php
namespace framework\http\controller\response;

use ecommerce\app\Env;

abstract class HTTPResponse
{
 
    /**
     * 
     * @var string
     */
    protected $pathTemplate = '';
    
    /**
     * 
     * @return string
     */
    public function pathTemplate(): string
    {
        return $this->pathTemplate;  
    }
    
    /**
     * 
     * @return string
     */
    public function fullPathTemplate(): string
    {
        return Env::path( $this->pathTemplate );
    }
    
    /**
     * 
     */
    abstract public function execute();
}