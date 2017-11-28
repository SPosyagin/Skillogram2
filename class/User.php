<?php

class User {

    private static function getUserData() {
        $stmt = DB::getConnection()->prepare('SELECT * FROM user WHERE login = ?');
        $stmt->execute([@$_REQUEST['login']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $user;
    }
    
    public function authorize() {

        $login = @$_REQUEST['login'];
        $password = @$_REQUEST['password'];

        if (empty($login) || empty($password)) {
            $_SESSION['message'][0] = '<center>Заполните все поля</center>';
        } else {
            $user = self::getUserData();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
                setcookie('last_login', $_REQUEST['login'], time() + 86400, '/');
                header('Location: index.php?act=home');
                exit;
            } else {
                $_SESSION['message'][] = '<center>Неверный логин или пароль!</center>';
            }
        }
    }

    public function signUp() {

        if (!empty($_FILES)) {
            if (!file_exists('assets/img/avatar')) { //проверемя есть ли директория, если нет то создаем
                mkdir('assets/img/avatar', 0777, true);
            }
            if ($_FILES['images'] && file_exists($_FILES['images']['tmp_name'])) {
                $filename = $_FILES['images']['name']; //photo003.png
                $tmp = explode('.', $filename);       // ['photo003', 'png']
                $extension = end($tmp);
                $allowed_extension = ['png', 'jpeg', 'jpg', 'gif']; // задаем допустимые расширения

                if (!in_array($extension, $allowed_extension)) { //проверка допустимых расширений
                    die('Невозможно загрузить файл с таким расширением');
                }
                $destination = 'assets/img/avatar/' . mt_rand(1000, 9999) . '.' . $extension; //название
                if (!file_exists('assets/img/avatar/' . $destination)) {
                    move_uploaded_file($_FILES['images']['tmp_name'], $destination);
                }
            }
        }
//если получен логин, пароль и аватар, то записываем данные в бд и в сессию, следовательно входим на сайт
        if (!empty($_REQUEST['login']) && !empty($_REQUEST['password']) && !empty($destination)) {
            $login = $_REQUEST['login'];
            $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
            
            try {
                $result = DB::getConnection()->prepare('INSERT INTO user SET login = ?, password = ?, avatar = ?');
                $result->execute([$login, $password, $destination]);
                
                $_SESSION['user'] = $login;
                $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
                setcookie('last_login', $_REQUEST['login'], time() + 86400, '/');
                
                exit;
                header('Location: index.php?act=home');
            } catch (Exception $e) {
                $_SESSION['message'][] = '<center>Ошибка: Логин занят</center>';
            }
            
        } else {
            $_SESSION['message'][] = '<center>Заполните все поля</center>';
        }
    }
//счетчик просмотров
    public function countView() {
        $this->counter = isset($_SESSION['counter']) ? $_SESSION['counter'] : 0;
        $this->counter++;
        $counter = $this->counter;
        $_SESSION['counter'] = $counter;
    }

}
