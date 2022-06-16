<?php
include_once( dirname( __DIR__ ).'/vendor/autoload.php' );

use demo\functional\App;
use framework\environment\Env;
use framework\http\controller\request\HTTPRequest;
use framework\http\controller\request\HTTPRequestsRoutes;

Env::init( '/app-config.php' );
HTTPRequestsRoutes::load( '/http-requests-routes.php' );
HTTPRequestsRoutes::start();

include_once( App::pathView( '/custom-functions.php' ) );
?>
<!DOCTYPE html>
<html lang="es">
	<?php include_once( App::pathView( '/blocks/html-head.php' ) );  ?>
  <body>
  	<div class="container-fluid">
  		<div class="row">
			<?php include_once ( App::pathView( '/blocks/top-navbar.php' ) ); ?>
		</div>
    </div>
    <br>
	<br>
    <br>
	<?php include_once ( App::pathView( HTTPRequestsRoutes::currentHTTPRequest()->response()->pathTemplate() ) ); ?>
    <br>
    <br>
 	<div class="container-fluid">
		<div class="row">
			<?php include_once ( App::pathView( '/blocks/html-footer.php' ) ); ?>
		</div>
	</div>
	<?php include_once ( App::pathView( '/blocks/html-footer-scripts.php' ) ); ?>
  </body>
</html>