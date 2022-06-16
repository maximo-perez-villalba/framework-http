<?php
/*
 * Listado de URNs que definen el API de comunicación de la aplicación, sistema, módulo o componente.
 * 
 * @var $routes array[ string, string ]. Matriz [ urn => request classnane ]. 
 */
$routes = 
[
    '/404' => framework\http\controller\request\HTTP404Request::class,
    '/' => demo\controllers\requests\HomeRequest::class,
    '/home' => demo\controllers\requests\HomeRequest::class,
    '/demo' => demo\controllers\requests\DemoRequest::class,
    '/routes' => demo\controllers\requests\RoutesRequest::class
]
?>