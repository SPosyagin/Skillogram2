<?php

class Comment {
    
    public function getUserDataCommented($comment) {
        $stmt = DB::getConnection()->prepare('SELECT * FROM user WHERE id = ?');
        $stmt->execute([$comment['user_id']]);
        $user_data_commented = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $user_data_commented;

    }
    
    public function addComment(){
        $user_id = $_SESSION['user']['id'];
        $post_id = $_POST['post_id'];
        $added_at = date('Y-m-d H:i:s');
        $text = $_POST['comment'];
        
        if(!empty($_POST['comment'])){
            $insert = DB::getConnection()->prepare("INSERT INTO post_comment SET post_id = ?, user_id = ?, added_at = ?, text = ?");
            $insert->execute([$post_id, $user_id, $added_at, $text]);
        } 
        
    }
}