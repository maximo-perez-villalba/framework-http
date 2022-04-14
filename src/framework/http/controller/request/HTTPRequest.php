<?php
namespace framework\http\controller\request;

use framework\http\controller\response\HTTPResponse;

abstract class HTTPRequest
{
    
    /**
     * 
     * @var HTTPRequest|NULL
     */
    static private $current;

    /**
     * 
     * @return HTTPRequest|NULL
     */
    static public function current() : ?HTTPRequest
    {
        return self::$current;
    }
    
    /**
     * 
     * Este método trabaja coordinado con la re-escritura de URI en el archivo .htaccess.
     *  
     * RewriteEngine On
     * RewriteCond %{REQUEST_URI} !index\.php$
     * RewriteRule (.*) index.php?urn=$1
     * 
     * @see /.htaccess
     * @return HTTPRequest
     */
    static public function invoke() : HTTPRequest
    {
        self::$current = NULL;
        if( isset( $_GET[ 'urn' ] ) )
        {
            $urn = '/'.$_GET[ 'urn' ];
            self::$current = HTTPRequestMap::get( $urn );
        }
        else
        {
            self::$current = new HTTP404Request();            
        }
        return self::$current;
    }
    
    /**
     * 
     * @var ecommerce\framework\HTTPResponse
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
        return $_POST[ $id ] ?? $_GET[ $id ];
    }
    
    /**
     * return $_COOKIE[ $id ] ?? NULL;
     * 
     * @param string $id
     * @return string|NULL
     */
    public function cookie( string $id ): ?string
    {
        return $_COOKIE[ $id ] ?? NULL;
    }

    /**
     * 
     * @param string $id
     * @param string $context (default NULL).
     * @return string|NULL
     */
    public function sessionGet( string $id, string $context = NULL ): ?string
    {
        if ( !empty( session_id() ) )
        {
            $context = $context ?? basename( static::class );
            return $_SESSION[ $context ][ $id ] ?? NULL;
        }
        return NULL;
    }
    
    /**
     * 
     */
    abstract public function execute();
    
}

