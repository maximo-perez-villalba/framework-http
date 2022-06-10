<?php
use framework\environment\Env;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= Env::urlbase() ?>">Framework HTTP / Demo</a>
        <span class="navbar-text"><?= $tests[ $testCurrent ][ 'label' ] ?></span>            	
	</div>
</nav>