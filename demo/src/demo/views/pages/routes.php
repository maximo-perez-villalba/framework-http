<?php
use demo\functional\App;
use framework\environment\Env;
?>
<div class="container-fluid">
	<div class="row" style="display: flex; min-height: 90vh;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<?php include_once( App::pathView( '/blocks/sidebar-navigation.php' ) );?>
				</div>
				<div class="col-md-9 d-flex flex-column">
					<h3>HTTP Request Map</h3>
					<hr>
					<div>
						<?php show_source( Env::path( '/http-requests.php' ) ) ?>
					</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<?php include_once( App::pathView( '/blocks/process-detail.php' ) );?>			
				</div>
			</div>
		</div>
	</div>
</div>