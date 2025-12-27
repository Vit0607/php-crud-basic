<?php
session_start();
require 'functions.php';

$current_user_email = get_curr_user()['email'];

// var_dump($_SESSION);
// var_dump($_POST);
// exit;

$id = $_POST['id'];
$email = $_POST['email'];
$password = $_POST['password'];

$users = get_all_users();

foreach($users as $user) {
    if ($user['email'] === $email && $user['email'] !== $current_user_email) {
        set_flash_message('danger', 'Email не свободен');
        redirect_to('security.php?id=' . $id);
        exit;
    }
}

edit_credentials($id, $email, $password);

if (is_admin(get_curr_user()) === false) {
    $_SESSION['user']['email'] = $email;
}

set_flash_message('success', 'Профиль успешно обновлён');

var_dump($id);

redirect_to('page_profile.php?id=' . $id);