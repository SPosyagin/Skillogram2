<?php

require 'common.php';

if(!empty($_SESSION['user'])){
    require 'html/header.php';
} else {
    require 'html/header_start.php'; //Если пользователь не авторизован, то выводить упрощенный header
}

$content = '';

$act = !empty($_REQUEST['act']) ? $_REQUEST['act'] : 'login';

$filename = './action/' . basename($act) . '.php';
if (!file_exists($filename)){
    $filename = './action/404.php';
}
try {
    ob_start();
    require($filename);
    $content = ob_get_clean();
} catch (Exception $e) {
    $content = 'Ошибка: ' . $e->getMessage() . ',код ' . $e->getCode();
}  
require('template.php');
