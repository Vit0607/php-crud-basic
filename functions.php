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
        echo '<div class="alert alert-' . $key . ' text-dark" role="alert"><strong>Уведомление!</strong> ' . $_SESSION[$key] . '</div>';
    }
    unset($_SESSION[$key]);
}

function redirect_to($path) {
    header('Location: ' . '/' . $path);
};