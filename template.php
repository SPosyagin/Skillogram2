<?php
if(!empty($_SESSION['user'])){
    require 'html/header.php';
} else {
    require 'html/header_start.php'; //Если пользователь не авторизован, то выводить упрощенный header
}
?>
    <body>
              
        <?php echo $content; ?>
        
        <?php if(!empty($_SESSION['message'])): ?>  
            <?php foreach ($_SESSION['message'] as $message): ?>
                <div style="background-color:#ffaaaa; padding: 10px; margin-bottom: 10px;">
                    <?php echo $message;?>
                </div>
            <?php endforeach; ?>
            <?php unset ($_SESSION['message']); ?>
        <?php endif; ?>
        
        <?php require 'html/footer.php' ?>
    </body>