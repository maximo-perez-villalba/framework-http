<div class="list-group">
<?php foreach ( $tests as $id => $test ) : $activeItem = ( $id == $testCurrent ) ? 'active' : '' ?>
    <a href="<?= $test[ 'url' ] ?>" class="list-group-item list-group-item-action <?= $activeItem ?>" aria-current="true">
    	<?= $test[ 'label' ] ?>
    </a>
<?php endforeach; ?>
</div>    				
