<?php
session_start();

var_dump($_POST);


$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
$sql = "SELECT * FROM users WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (isset($user['email'])) {
    $_SESSION['error'] = 'Этот эл. адрес уже занят другим пользователем.';

    header('Location: /page_register.php');
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

var_dump($hashed_password);

$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email, 'password' => $hashed_password]);

$_SESSION['success'] = 'Регистрация успешна';

header('Location: /page_login.php');