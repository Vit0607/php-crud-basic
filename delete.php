<?php
session_start();
require 'functions.php';

var_dump($_SESSION);

$user_id = $_GET['id'];

check_the_editing_rights($user_id);

$is_user_deleted = delete($user_id);

if ($is_user_deleted) {
    set_flash_message('success', 'Пользователь удалён');
}

if ($_SESSION['user']['id'] === $user_id) {
    logout();
    exit;
}

redirect_to('users.php');