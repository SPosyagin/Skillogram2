<html>
<head>
	<meta http-equiv="content-type" content="text/html"; charset="utf-8">
	<title>Skillogram</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/scripts.js"></script>
</head>

<body link="black" vlink="black">
    <div id="allheader">
        <div id="logo">
            <a href="index.php?act=home"><img src="assets/img/p_logo.png" height="70px" />
        </div>
        <div id="header">
            <ul id="menu">
                        <li><a href='index.php?act=home'>Лента |</a> </li>
                        <li><a href="index.php?act=add_post">Добавить запись |</a></li>
                        <li><a href="index.php?act=info">О проекте |</a></li>
                        <li><a href="index.php?act=contact">Контакты |</a></li>
                        <li><a href='index.php?act=logout'>Выйти</a> </li>
            </ul>
        </div>
        <div id="search">
            <form action="index.php" method="get">
                <input type="hidden" name="act" value="home">
                <input type="text" name="search" placeholder="Поиск..." value="<?=@$_REQUEST['search'];?>">
            <input type="submit" value="Ok">
            </form>
        </div>
    </div>
       
    <?php if(!empty($_SESSION['user'])): ?>
		<div id="login">
			<form method="post">
				<?php echo 'Вы вошли под именем: ' . @$_SESSION['user']['login']; ?> 
			</form>
		</div>
    <?php endif; ?>