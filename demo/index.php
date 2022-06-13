<?php
include_once( dirname( __DIR__ ).'/vendor/autoload.php' );

use demo\functional\App;
use framework\environment\Env;
use framework\http\controller\request\HTTPRequest;
use framework\http\controller\request\HTTPRequestMap;

Env::init( '/app-config.php' );
HTTPRequestMap::init( '/http-requests.php' );
HTTPRequest::invoke();
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
	<?php include_once ( App::pathView( HTTPRequest::current()->response()->pathTemplate() ) ); ?>
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