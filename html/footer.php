<div id='footer'>
    <?php
        echo '&copyCopyright ';
        echo date('Y');
    ?> 
    
    <?php if(!empty($_SESSION['user'])): ?>
    <?php echo 'Просмотрено страниц: ' . $_SESSION['counter']; ?>
    <?php endif; ?>
</div>

<?php
$counter = new User;
$counter->countView();

