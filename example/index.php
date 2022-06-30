<?php
include_once( 'vendor/autoload.php' );

use framework\environment\Env;
use framework\http\controller\request\HTTPRequestsRoutes;

Env::init( '/app-config.php' );
HTTPRequestsRoutes::start( '/routes-config.php' );
HTTPRequestsRoutes::executeCurrentRequest();
HTTPRequestsRoutes::executeCurrentResponse();
?>