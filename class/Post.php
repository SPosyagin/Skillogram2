<?php

class Post {
    
    public $posts = [];
    

    public function getPost() {
        
        $posts = $this->searchPosts();
        
        while($post = $posts->fetch(PDO::FETCH_ASSOC)):
            require 'html/post_form.php';
        
            if($post['post_id'] % 5 == 0) {                 //Выводит рекламу после каждого 5го поста
                $advs = $this->getAdvertising();
                
                while($adv = $advs->fetchAll(PDO::FETCH_ASSOC)):
                      $rand = array_rand($adv, 1);
                      $adv = $adv[$rand];
                      require 'html/advertising_form.php';
                endwhile;
            }
        endwhile;}
    
    public function AddPost() {
        
        if (!empty($_FILES)) {
            if (!file_exists('assets/img/img_down')) { //проверемя есть ли директория, если нет то создаем
            mkdir('assets/img/img_down', 0777, true);
            }
            if ($_FILES['images'] && file_exists($_FILES['images']['tmp_name'])) {
            $filename = $_FILES['images']['name']; //photo003.png
            $tmp = explode('.', $filename);       // ['photo003', 'png']
            $extension = end($tmp);
            $allowed_extension = ['png', 'jpeg', 'jpg', 'gif']; // задаем допустимые расширения

                if (!in_array($extension, $allowed_extension)) { //проверка допустимых расширений
                    die ('Невозможно загрузить файл с таким расширением');
                }
            $destination = 'assets/img/img_down/' . mt_rand(1000,9999). '.' . $extension; //название
            
                if (!file_exists('assets/img/img_down/' . $destination)) {
                move_uploaded_file($_FILES['images']['tmp_name'], $destination);
                }
            }
        }
        
        if (!empty($_SESSION['user']['login']) && !empty($_POST['texts']) && !empty($_POST['hashtag'])){
            $username = $_SESSION['user']['login'];
            $text = $_POST['texts'];
            $hashtag = $_POST['hashtag'];
            try {
                $result = DB::getConnection()->query('INSERT INTO post SET 
                    user_id = "' . $_SESSION['user']['id'] . '",
                    added_at = "' . date('Y-m-d H:i:s') . '",
                    content = "' . $destination . '", 
                    count_like = "' . mt_rand(0, 1000) . '",
                    comment = "' . $text . '",
                    hash_tag = "' . $hashtag . '"
                ');
                $_SESSION['message'][0] = '<center>Пост загружен!</center>';
            } catch (Exception $e) { 
                echo 'Error';
            }
        } else {
            $_SESSION['message'][0] = '<center>Заполните все поля</center>';
        }   
    }
    
    public function searchPosts() {
        if (!empty($_REQUEST['search'])) {
            $where = 'WHERE post.comment LIKE ? OR user.login LIKE ?';
            $search = '%' . $_REQUEST['search'] . '%';
            $bind = [$search, $search];
        } else {
            $where = '';
            $bind = [];
        }
        
        $query = DB::getConnection()->prepare("
            SELECT *, post.id AS post_id 
            FROM post 
            JOIN user ON user.id = post.user_id
            {$where}
            ORDER BY post.id DESC
            LIMIT 0, 20
        ");
        
        $query->execute($bind);
        
        return $query;
    }
    
    public function getAdvertising() {
        $adv = DB::getConnection()->query("
            SELECT *
            FROM advertising 
            ORDER BY id DESC
            ");
        
        return $adv;
    }
}
