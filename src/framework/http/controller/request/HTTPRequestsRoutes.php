<?php
namespace framework\http\controller\request;

use framework\environment\Env;
use ErrorException;

abstract class HTTPRequestsRoutes
{
    
    /**
     * 
     * @var array
     */
    static private $routes = [];
 
    /**
     * 
     * @var HTTPRequest
     */
    static private $currentHTTPRequest = NULL;
    
    /**
     * 
     * @return HTTPRequest|NULL
     */
    static public function currentHTTPRequest(): ?HTTPRequest
    {
        return self::$currentHTTPRequest;
    }
    
     /**
      * 
      * @param string $pathConfig
      */
    static public function load( string $pathConfig )
    {
        $fullPathConfig = Env::path( $pathConfig );
        if ( file_exists( $fullPathConfig ) )
        {
            /*
             * Carga el archivo con el mapa de solicitudes.
             */
            $routes = [];
            include_once( Env::path( $pathConfig ) );
            self::$routes = $routes;
        }
    }

    /**
     * 
     * @param string $urn
     * @return HTTPRequest
     */
    static public function get( string $urn ): HTTPRequest
    {
        if ( isset( self::$routes[ $urn ] ) )
        {
            $requestClassname = self::$routes[ $urn ];
            if( class_exists( $requestClassname ) )
            {
                return new $requestClassname();
            }
        }
        return new HTTP404Request();
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
    static public function start()
    {
        if( isset( $_GET[ 'urn' ] ) )
        {
            self::$currentHTTPRequest = self::get( "/{$_GET[ 'urn' ]}" );
        }
        else
        {
            self::$currentHTTPRequest = new HTTP404Request();
        }
        
        /*
         * Corrige re-escritura URI de parametros en el método http get.
         */
        if ( isset( $_SERVER[ 'REQUEST_URI' ] ) )
        {
            $queryParameters =  parse_url( $_SERVER[ 'REQUEST_URI' ], PHP_URL_QUERY );
            if( isset( $queryParameters ) )
            {
                $parameters = [];
                if( str_contains( $queryParameters, '&' ) )
                {
                    $parameters =  explode( '&' , $queryParameters );
                }
                else 
                {
                    $parameters = [ $queryParameters ];
                }
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
            self::currentHTTPRequest()->executeCallMethod( $_POST[ '__callMethod' ] );
        }
        else
        {
            self::currentHTTPRequest()->execute();
        }
    }
    
}

