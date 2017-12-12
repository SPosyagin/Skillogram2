<?php

class Likes {
    public $like = [];

    public function getLikesCount(){
        $post_id = $_POST['post_id'];
        $query = DB::getConnection()->prepare("SELECT count_like FROM post WHERE id = ?");
        $query->execute([$post_id]);
        $likes_count = $query->fetch(PDO::FETCH_ASSOC);
        $num = $likes_count['count_like'];
        return $num;
    }

        public function addLike() {
        $user_id = $_SESSION['user']['id'];
        $post_id = $_POST['post_id'];

// проверяем в таблице с лайками есть ли строка от этого пользователя у этого поста, если есть то удаляем        
        $stmt = DB::getConnection()->prepare("SELECT COUNT(*) FROM likes WHERE post_id = ? AND user_id = ?");
        $stmt->execute([$post_id, $user_id]);
        $has_liked = (bool)$stmt->fetchColumn();
        
        if ($has_liked) {
            $rmv = DB::getConnection()->prepare("DELETE FROM likes WHERE post_id = ? AND user_id = ?");
            $rmv->execute([$post_id, $user_id]);
            
            $count = DB::getConnection()->prepare("UPDATE post SET count_like = count_like - 1 WHERE id = ? ");
            $count->execute([$post_id]);
            
        } else {
        
        // Если сообщения не было, то добавляем запись в таблицу с лайками и +1 в таблицу пост
        $insert = DB::getConnection()->prepare("INSERT INTO likes SET post_id = ?, user_id = ?");
        $insert->execute([$post_id, $user_id]);

        $count = DB::getConnection()->prepare("UPDATE post SET count_like = count_like + 1 WHERE id = ? ");
        $count->execute([$post_id]);
        }
        
        return $this->getLikesCount($post_id);
    }


    public function checkLike(){
        $user_id = $_SESSION['user']['id'];
        $query = DB::getConnection()->prepare("SELECT post_id FROM likes WHERE user_id = ?");
        $query->execute([$user_id]);
        $likes = $query->fetchAll(PDO::FETCH_ASSOC);
               
       return $likes;
}
}