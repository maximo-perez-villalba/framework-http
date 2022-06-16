<?php
use demo\functional\App;
use framework\environment\Env;
use framework\http\controller\request\HTTPRequestsRoutes;

$requestsRoutes = ( new ReflectionClass( HTTPRequestsRoutes::class ) )->getFileName();
?>
<div class="container-fluid">
	<div class="row" style="display: flex; min-height: 90vh;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<?php include_once( App::pathView( '/blocks/sidebar-navigation.php' ) );?>
				</div>
				<div class="col-md-9 d-flex flex-column">
					<h3>Requests Routes</h3>
					<hr>
					<div class="accordion accordion-flush" id="processListItems">					
						<?php
						  print blockAccordionItem( itemTitle( 'Configuration', '/http-requests-routes.php' ) , show_source( Env::path( '/http-requests-routes.php' ), TRUE ));
						  print blockAccordionItem( itemTitle( 'Routes', HTTPRequestsRoutes::class ), show_source( $requestsRoutes, TRUE ) ); 
						?>
					</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<?php include_once( App::pathView( '/blocks/process-detail.php' ) );?>			
				</div>
			</div>
		</div>
	</div>
</div>