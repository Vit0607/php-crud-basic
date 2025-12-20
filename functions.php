<?php

function get_user_by_email($email) {
    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = "SELECT * FROM users WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function add_user($email, $password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email, 'password' => $hashed_password]);
    $lastId = $pdo->lastInsertId();

    return $lastId;
}

function set_flash_message($key, $message) {
    $_SESSION[$key] = $message;
}

function display_flash_message($key) {
    if (isset($_SESSION[$key])) {
        echo '<div class="alert alert-' . $key . ' text-dark" role="alert">' . $_SESSION[$key] . '</div>';
    }

    unset($_SESSION[$key]);
}

function redirect_to($path) {
    header('Location: ' . '/' . $path);
};

function login($email, $password) {
    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = "SELECT * FROM users WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (empty($user)) {
        set_flash_message('danger', 'Пользователь не найден!');

        return false;
    }

    if (password_verify($password, $user['password']) == false) {
        set_flash_message('danger', 'Неверный пароль!');

        return false;
    }

    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'],
        'role' =>$user['role']
    ];

    return true;
}

function is_not_logged_in() {
    if (isset($_SESSION['user'])) {
        return false;
    } 
    
    return true;  
}

function get_curr_user() {
    return $_SESSION['user'];
}

function is_admin($user) {
    if($user['role'] === 'admin') {
        return true;
    } 
    
    return false;
}


function get_all_users() {
    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = 'SELECT * FROM users';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

function is_equal($user, $current_user) {
    if ($user['id'] === $current_user['id']) {
        return true;
    } 
    
    return false;
}