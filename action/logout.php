<?php   

setcookie('last_login',@$_REQUEST['login'], time() - 86400, '/');
session_unset();
session_destroy();
header('Location: index.php?act=login');
exit;

