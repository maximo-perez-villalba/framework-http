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
    
}

