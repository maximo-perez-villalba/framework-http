<?php
namespace demo\controllers\requests;

use framework\http\controller\request\HTTPRequest;
use demo\controllers\responses\DemoResponse;

class DemoRequest extends HTTPRequest
{
    
    /**
     * 
     */
    public function __construct()
    {
        $this->response = new DemoResponse();
    }

    /**
     * 
     * {@inheritDoc}
     * @see \framework\http\controller\request\HTTPRequest::execute()
     */
    public function execute()
    {
        /*
         * Aquí escribir el código de su aplicación, sistema, modulo o componente.
         * 
         * En este punto el servidor HTTP escucho la url asociada al presente 
         * request delegándole el proceso de ejecución.  
         * 
         * Notas:
         * 1. Si necesita cambiar o redireccionar la respuesta por defecto:
         *   
         *      $this->response = new CustomResponse();
         *      
         * 
         * 2. Para tener disponible el presente resquest dentro de los archivos
         * templates (pages or blocks) escribir el siguiente código:
         * 
         *      $resquest = HTTPRequestsRoutes::currentHTTPRequest();
         * 
         * 
         * 3. Para acceder a los parametros recibidos con la solicitud:
         * 
         *      $attr1 = $this->parameter( 'attr1' );
         * 
         * 
         * 4. Para acceder a las cookies recibidas con la solicitud:
         * 
         *      $cookieId = $this->cookie( 'id' );
         * 
         */
    }
}