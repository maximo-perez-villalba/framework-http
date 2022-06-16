<?php
namespace demo\controllers\responses;

use framework\http\controller\response\HTTPResponse;

class DemoResponse extends HTTPResponse
{
    
    public function __construct()
    {
        $this->pathTemplate = 'pages/demo.php';
    }

    /**
     * 
     * {@inheritDoc}
     * @see \framework\http\controller\response\HTTPResponse::execute()
     */
    public function execute()
    {
        /*
         * Aquí escribir el código para preparar los datos 
         * que va a necesitar el template asociado.
         *
         *
         * Nota:
         * Para tener disponible el presente response dentro de los archivos
         * templates (pages or blocks) escribir el siguiente código:
         * 
         * $response = HTTPRequestsRoutes::currentHTTPRequest()->response();
         */
    }
}