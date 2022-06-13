<?php use demo\functional\App; ?>
<div class="container-fluid">
	<div class="row" style="display: flex; min-height: 90vh;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<?php include_once( App::pathView( '/blocks/sidebar-navigation.php' ) );?>
				</div>
				<div class="col-md-9 d-flex flex-column">
					<?php include_once( App::pathView( '/blocks/process-detail.php' ) );?>
				</div>
			</div>
			<br>
			<br>
		</div>
	</div>
</div>  
