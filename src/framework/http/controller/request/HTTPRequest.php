<?php
namespace framework\http\controller\request;

use framework\http\controller\response\HTTPResponse;
use ErrorException;

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
     * Este método trabaja coordinado con la re-escritura de URI en el archivo .htaccess.
     *  
     * RewriteEngine On
     * RewriteCond %{REQUEST_URI} !index\.php$
     * RewriteRule (.*) index.php?urn=$1
     * 
     * @see /.htaccess file. 
     * @throws ErrorException
     */
    static public function invoke()
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
        
        /*
         * Corrige re-escritura URI de parametros en el método http get. 
         */
        if ( isset( $_SERVER[ 'REQUEST_URI' ] ) )
        {
            $queryParameters =  parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_QUERY );
            if( isset( $queryParameters ) )
            {
                $parameters =  explode( '&' , $queryParameters );
                foreach ( $parameters as $param )
                {
                    list( $key, $value ) =  explode( '=' , $param );
                    $_REQUEST[ $key ] = $_GET[ $key ] = $value;
                }
            }
        }
        
        /*
         * Por defecto HTTPRequest::invoke llama al método execute.
         * La llamada por defecto a execute puede ser redirigida a otro metodo a través de  
         * la agregación del parametro __callMethod en el http post method.
         */
        if ( isset( $_POST[ '__callMethod' ] ) )
        {
            $method = $_POST[ '__callMethod' ];
            if( method_exists( self::current() , $method ) )
            {
                self::current()->$method();
            }
            else 
            {
                $classname = get_class( self::current() );
                throw new ErrorException( "Error: The method '{$method}' don't exist in {$classname}." );
            }
        }
        else 
        {
            self::current()->execute();
        }
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
     * @param string $id
     * @param string $context (default NULL).
     * @return string|NULL
     */
    static public function sessionGet( string $id, string $context = NULL ): ?string
    {
        if ( session_status() == PHP_SESSION_ACTIVE )
        {
            $context = $context ?? basename( static::class );
            if ( isset( $_SESSION[ $context ] ) ) 
            {
                return $_SESSION[ $context ][ $id ] ?? NULL;
            }            
        }
        return NULL;
    }
    
    /**
     * 
     * @param string $id
     * @param string $value
     * @param string $context (default NULL)
     */
    static public function sessionSet( string $id, string $value, string $context = NULL )
    {
        if ( session_status() == PHP_SESSION_ACTIVE )
        {
            $context = $context ?? basename( static::class );
            if ( isset( $_SESSION[ $context ] ) )
            {
                $_SESSION[ $context ] = [];
            }
            $_SESSION[ $context ][ $id ] = $value;
        }
    }
    
    /**
     * 
     * @return string
     */
    static public function sessionDump(): string
    {
        $dump = '';
        if ( session_status() == PHP_SESSION_ACTIVE )
        {
            $dump = print_r( $_SESSION, TRUE );
        }
        elseif ( session_status() == PHP_SESSION_DISABLED )
        {
            $dump = 'Session disabled';
        }
        elseif ( session_status() == PHP_SESSION_NONE )
        {
            $dump = 'Session not started';
        }
        return $dump;
    }
    
    /**
     * 
     */
    abstract public function execute();
    
}