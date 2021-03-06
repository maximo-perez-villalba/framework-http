<?php
namespace framework\http\controller\request;

use framework\environment\Env;

/**
 * 
 * 
 * @author Máximo Perez Villalba 
 * 
 */
abstract class HTTPRequestsRoutes
{
    
    /**
     * @var array
     */
    static private $routes = [];
    
    /**
     * @var string
     */
    static private $currentURN = NULL;
    
    /**
     * @var HTTPRequest
     */
    static private $currentHTTPRequest = NULL;
    
    /**
     * @return string|NULL
     */
    static public function currentURN(): ?string
    {
        return self::$currentURN;
    }
    
    /**
     * @return HTTPRequest|NULL
     */
    static public function currentHTTPRequest(): ?HTTPRequest
    {
        return self::$currentHTTPRequest;
    }
    
    /**
     * Retorna la solicitud asociada a la URN. Si no encuentra la URN, redirige 
     * la ejecución a una solicitud con código HTTP 404 page not found.
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
     * RewriteRule ^(.+)$ index.php?urn=$1
     *
     * @see /.htaccess file.
     * 
     * @param string $pathConfig
     */
    static public function start( string $pathConfig )
    {
        self::load( $pathConfig );
        self::setCurrentRequest();
    }
    
    /**
     * Carga el archivo con el mapa de solicitudes.
     * 
     * @param string $pathConfig
     */
    static private function load( string $pathConfig )
    {
        $fullPathConfig = Env::path( $pathConfig );
        if ( file_exists( $fullPathConfig ) )
        {
            $routes = [];
            include_once( Env::path( $pathConfig ) );
            self::$routes = $routes;
        }
    }
    
    /**
     * Lee y configura la URN de la solicitud actual.
     */
    static private function setCurrentRequest()
    {
        self::$currentURN = '/';
        if( isset( $_GET[ 'urn' ] ) )
        {
            self::$currentURN .= $_GET[ 'urn' ];
        }
        self::$currentHTTPRequest = self::get( self::currentURN() );
        self::fixRequestURIParameters();
    }

    /**
     * La sobreescritura configurada en el archivo .htaccess borra los parametros de 
     * la solicitud en las peticiones de tipo GET.
     * El método corrige este problema, cargando en $_GET los parametros 
     * obtenidos desde el valor de la variable $_SERVER[ 'REQUEST_URI' ]. 
     */
    static private function fixRequestURIParameters()
    {
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
    }
    
    /**
     * Para que el framework detecte que debe ejecutar un método alternativo,
     * se debe enviar con la solicitud un parametro con nombre __callMethod con el
     * nombre del método a ejecutar alternativamente. Solo funciona con las solicitudes 
     * de tipo(método) POST. 
     */
    static public function executeCurrentRequest()
    {
        if ( isset( $_POST[ '__callMethod' ] ) )
        {
            self::currentHTTPRequest()->executeCallMethod( $_POST[ '__callMethod' ] );
        }
        else
        {
            self::currentHTTPRequest()->execute();
        }
    }
    
    /**
     * 
     */
    static public function executeCurrentResponse()
    {
        self::currentHTTPRequest()->response()->execute();
    }
}

