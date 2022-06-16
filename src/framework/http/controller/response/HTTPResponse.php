<?php
namespace framework\http\controller\response;

use framework\environment\Env;

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
     */
    abstract public function execute();
}