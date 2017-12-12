<?php

if (isset($_POST['num'])) {
    $num = $_POST['num'];
    $query = DB::getConnection()->prepare("
            SELECT *, post.id AS post_id 
            FROM post 
            JOIN user ON user.id = post.user_id
            ORDER BY post.id DESC
            LIMIT ?, 5
        ");
    $query = execute([$num]);
    $post = $query->fetch(PDO::FETCH_ASSOC);

//Вытаскиваем из таблицы 5 комментариев начиная с $num


    if ($result !== 0) {
        while ($post = $posts->fetch(PDO::FETCH_ASSOC)) {
            //если стоит лайк то присваивает стиль актив
            if (in_array($post['post_id'], $post_id)) {
                $like_status = 'active';
            } else {
                $like_status = '';
            }

            require 'html/post_form.php';

            if ($post['post_id'] % 5 == 0) {                 //Выводит рекламу после каждого 5го поста
                $advs = $this->getAdvertising();

                while ($adv = $advs->fetchAll(PDO::FETCH_ASSOC)) {
                    $rand = array_rand($adv, 1);
                    $adv = $adv[$rand];
                    require 'html/advertising_form.php';
                }
            }
        }
    }
}