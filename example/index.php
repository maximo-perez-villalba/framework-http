<?php
include_once( 'vendor/autoload.php' );

use framework\environment\Env;
use framework\http\controller\request\HTTPRequestsRoutes;

Env::init( '/app-config.php' );
HTTPRequestsRoutes::load( '/routes-config.php' );
HTTPRequestsRoutes::start();
DemoApp::start();
HTTPRequestsRoutes::currentHTTPRequest()->response()->execute();
?>