<?php
namespace demo\functional;

use framework\environment\Env;

abstract class App
{
    
    /**
     * 
     * @param string $urn
     * @return string
     */
    static public function pathView( string $urn = '' ): string
    {
        return Env::path( "/src/demo/views/{$urn}" ); 
    }
    
    /**
     * 
     * @return string
     */
    static public function urlCurrent(): string
    {
        $urn = ( isset( $_GET[ 'urn' ] ) && !empty( $_GET[ 'urn' ] ) ) ? $_GET[ 'urn' ] : 'home';
        return self::urlBase().$urn;
    }

    /**
     * 
     * @return string
     */
    static public function urlBase(): string
    {
        return Env::urlbase();
    }
   
    /**
     * 
     * @return string
     */
    static public function urnCurrent(): string
    {
        return ( isset( $_GET[ 'urn' ] ) && !empty( $_GET[ 'urn' ] ) ) ? $_GET[ 'urn' ] : 'home';
    }

    /**
     * 
     * @return array
     */
    static public function menuItems(): array
    {
        $appUrlBase = App::urlBase();
        return 
        [
            'home' =>
            [
                'path' => App::pathView( 'pages/home.php' ),
                'url' => "{$appUrlBase}home",
                'label' => "Inicio"
            ],
            'demo' =>
            [
                'path' => App::pathView( 'pages/demo.php' ),
                'url' => "{$appUrlBase}demo?attr1=xyz&attr2=lmn",
                'label' => "Demo"
            ],
            'routes' =>
            [
                'path' => App::pathView( 'pages/routes.php' ),
                'url' => "{$appUrlBase}routes",
                'label' => "Routes"
            ]
        ];
    }
    
    /**
     * 
     * @return string
     */
    static public function siteTitle(): string
    {
        return "Framework HTTP > Demo";
    }
    
}