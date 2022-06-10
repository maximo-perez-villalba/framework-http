<?php
use framework\environment\Env;
use framework\http\controller\request\HTTPRequest;

$request = HTTPRequest::current();

$url = $_SERVER[ 'REQUEST_SCHEME' ].'://'.$_SERVER[ 'HTTP_HOST' ].$_SERVER[ 'REQUEST_URI' ];

?>
<div class="container-fluid">
	<div class="row" style="display: flex; min-height: 90vh;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
                    <div class="list-group">
                   	<?php foreach ( $tests as $id => $test ) : $activeItem = ( $id == $testCurrent ) ? 'active' : '' ?>
                        <a href="<?= $test[ 'url' ] ?>" class="list-group-item list-group-item-action <?= $activeItem ?>" aria-current="true">
                        	<?= $test[ 'label' ] ?>
                        </a>
                   	<?php endforeach; ?>
                    </div>    				
				</div>
				<div class="col-md-9 d-flex flex-column">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>URL</th>
                                <td><?= $url ?></td>
                            </tr>
                            <tr>
                                <th>File</th>
                                <td><?= $_SERVER[ 'SCRIPT_NAME' ] ?></td>
                            </tr>
                            <tr>
                                <th>Parameters</th>
                                <td>
                                	<table class="table table-secondary table-sm table-borderless">
                                		<thead>
                                			<tr>
                                				<td scope="col" style="min-width:10%;"></td>
                                				<td scope="col"></td>
                                			</tr>
                                		</thead>                                		
                                	<?php foreach ( $_REQUEST as $name=>$value ) :?>
                                		<tr>
                                            <th><?= $name ?></th>
                                            <td><?= $value ?></td>
                                		</tr>
                                	<?php endforeach; ?>
                                	</table>
                                </td>
                            </tr>
                            <tr>
                                <th>Request</th>
                                <td><?= get_class( $request ) ?></td>
                            </tr>
                            <tr>
                                <th>View</th>
                                <td><?= $request->response()->pathTemplate() ?></td>
                            </tr>
                        </tbody>
                    </table>    				
				</div>
			</div>
			<br>
			<br>
		</div>
	</div>
</div>  
