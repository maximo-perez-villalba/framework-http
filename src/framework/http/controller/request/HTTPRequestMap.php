<?php
namespace framework\http\controller\request;

use framework\environment\Env;

abstract class HTTPRequestMap
{
    /**
     * 
     * @var array
     */
    static private $map = [];
    
     /**
      * 
      * @param string $pathConfig
      */
    static public function init( string $pathConfig )
    {
        $fullPathConfig = Env::path( $pathConfig );
        if ( file_exists( $fullPathConfig ) )
        {
            /*
             * Carga el archivo con el mapa de solicitudes.
             */
            $map = [];
            include_once( Env::path( $pathConfig ) );
            self::$map = $map;
        }
    }

    /**
     * 
     * @param string $urn
     * @return HTTPRequest
     */
    static public function get( string $urn ): HTTPRequest
    {
        if ( isset( self::$map[ $urn ] ) )
        {
            $requestClassname = self::$map[ $urn ];
            if( class_exists( $requestClassname ) )
            {
                return new $requestClassname();
            }
        }
        return new HTTP404Request();
    }
    
}

