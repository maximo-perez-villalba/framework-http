<?php use demo\functional\App; ?>
<div class="list-group">
<?php foreach ( App::menuItems() as $id => $item ) : $activeItem = ( $id == App::urnCurrent() ) ? 'active' : '' ?>
    <a href="<?= $item[ 'url' ] ?>" class="list-group-item list-group-item-action <?= $activeItem ?>" aria-current="true">
    	<?= $item[ 'label' ] ?>
    </a>
<?php endforeach; ?>
</div>    				
