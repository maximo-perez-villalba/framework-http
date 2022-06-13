<?php
use demo\functional\App;
$menuItems = App::menuItems();
$item = $menuItems[ App::urnCurrent() ];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= App::urlbase() ?>"><?= App::siteTitle() ?></a>
        <span class="navbar-text"><?= $item[ 'label' ] ?></span>            	
	</div>
</nav>