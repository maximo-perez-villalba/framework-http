<?php 
$map = 
[
    '/404' => framework\http\controller\request\HTTP404Request::class,
    '/' => demo\controllers\requests\HomeRequest::class,
    '/home' => demo\controllers\requests\HomeRequest::class,
    '/demo' => demo\controllers\requests\DemoRequest::class,
    '/routes' => demo\controllers\requests\RoutesRequest::class
]
?>