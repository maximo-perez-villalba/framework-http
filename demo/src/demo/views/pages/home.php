<div class="container-fluid">
	<div class="row" style="display: flex; min-height: 90vh;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
                    <div class="list-group">
                   	<?php foreach ( $tests as $id => $test ) : $activeItem = ( $id == $exec ) ? 'active' : '' ?>
                        <a href="<?= $test[ 'url' ] ?>" class="list-group-item list-group-item-action <?= $activeItem ?>" aria-current="true">
                        	<?= $test[ 'label' ] ?>
                        </a>
                   	<?php endforeach; ?>
                    </div>    				
				</div>
				<div class="col-md-9 d-flex flex-column">
					<?php if ( $exec == 'home' ):
					       include( $currentPagePath );
					    else : ?>
    					<h4><?= $tests[ $exec ][ 'label' ] ?></h4>
    					<hr>
                        <ul class="nav nav-tabs" id="fichero-de-contenidos" role="tablist">
                          <li class="nav-item" role="presentation">
                            <a class="nav-link active" href="#" data-bs-target="#source-code" id="source-code-tab" data-bs-toggle="tab" role="tab" aria-controls="source-code" aria-selected="true">
                            	Source code
                            </a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a class="nav-link" href="#" data-bs-target="#output" id="output-tab" data-bs-toggle="tab" role="tab" aria-controls="output" aria-selected="true">
                            	Output
                            </a>
                          </li>
                        </ul>    					
                        <div class="tab-content p-4">
                            <div class="tab-pane active" id="source-code" role="tabpanel" aria-labelledby="source-code-tab">
                            	<?php show_source( $currentPagePath ); ?>
                            </div>
                            <div class="tab-pane" id="output" role="tabpanel" aria-labelledby="output-tab">
                            	<?php include( $currentPagePath ); ?>
                            </div>
                        </div>
					<?php endif; ?>
				</div>
			</div>
			<br>
			<br>
		</div>
	</div>
</div>  
