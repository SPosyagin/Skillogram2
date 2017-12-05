<?php

class Likes {
    public $like = [];

    public function addLike() {
        $user_id = $_SESSION['user']['id'];
        $post_id = $_POST['post_id'];

// проверяем в таблице с лайками есть ли строка от этого пользователя у этого поста, если есть то лайк уже стоит        
        $stmt = DB::getConnection()->prepare("SELECT * FROM likes WHERE post_id = {$post_id}");
        $stmt->execute();

        while ($likes = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($_SESSION['user']['id'] == $likes['user_id'] && $post_id == $likes['post_id']) {  
//если строка найдена, выводим сообщение
                $mes = 'Вы уже лайкнули этот пост';
                echo $mes;
                break;
            }
        }
//если сообщения не было, то добавляем запись в таблицу с лайками и +1 в таблицу пост
        if (empty($mes)) {
            $insert = DB::getConnection()->prepare("INSERT INTO likes SET post_id = ?, user_id = ?, count_likes = ?");
            $bind = [$post_id, $user_id, 1];
            $insert->execute($bind);

            $count = DB::getConnection()->prepare("UPDATE post SET count_like = count_like + 1  WHERE id = ? ");
            $count->execute([$post_id]);
        }
    }


    public function checkLike(){
        $user_id = $_SESSION['user']['id'];
        $query = DB::getConnection()->query("SELECT post_id FROM likes WHERE user_id = $user_id");
        $likes = $query->fetchAll(PDO::FETCH_ASSOC);
               
       return $likes;
}
}