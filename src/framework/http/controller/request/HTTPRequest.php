<?php
namespace framework\http\controller\request;

use framework\http\controller\response\HTTPResponse;
use ErrorException;

/**
 * 
 * @author Máximo Perez Villalba
 *
 */
abstract class HTTPRequest
{
    
    /**
     * 
     * @var HTTPResponse
     */
    protected $response = null;
    
    /**
     * 
     * @param HTTPResponse $response
     * @return HTTPResponse|NULL
     */
    public function response() : ?HTTPResponse
    {
        return $this->response;
    }

    /**
     * return $_POST[ $id ] ?? $_GET[ $id ];
     * 
     * @param string $id
     * @return string|NULL
     */
    public function parameter( string $id ): ?string
    {
        $parameter = NULL;
        if ( isset( $_POST[ $id ] ) )
        {
            $parameter = $_POST[ $id ];
        }
        elseif ( isset( $_GET[ $id ] ) )
        {
            $parameter = $_GET[ $id ];
        }
        return $parameter;
    }
    
    /**
     * return $_COOKIE[ $id ] ?? NULL;
     * 
     * @param string $id
     * @return string|NULL
     */
    public function cookie( string $id ): ?string
    {
        if ( isset( $_COOKIE[ $id ] ) )
        {
            return $_COOKIE[ $id ];
        }
        return NULL;
    }
    
    /**
     * 
     */
    abstract public function execute();

    /**
     * 
     * @param string $method
     * @throws ErrorException
     */
    public function executeCallMethod( string $method )
    {
        if( method_exists( $this , $method ) )
        {
            $this->$method();
        }
        else
        {
            $classname = get_class( $this );
            throw new ErrorException( "Error: The method '{$method}' don't exist in {$classname}." );
        }
    }
}