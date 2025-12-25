<?php
session_start();
require 'functions.php';

if (is_not_logged_in() && !is_admin(get_curr_user())) {
    redirect_to('login.php');
}

$email = $_POST['email'];
$password = $_POST['password'];
$user = get_user_by_email($email);

if (!empty($user)) {
    set_flash_message('danger', 'Email не свободен!');
    redirect_to('create_user.php');
    exit;
}

$last_user_id = add_user($email, $password);

edit_info($last_user_id, $_POST['username'], $_POST['job_title'], $_POST['phone'], $_POST['address']);

set_status($last_user_id, $_POST['status']);

$image = $_FILES['image'];
upload_avatar($last_user_id, $image);

add_social_links($last_user_id, $_POST['vk'], $_POST['telegram'], $_POST['instagram']);

exit;

set_flash_message('success', 'Пользователь добавлен!');

redirect_to('users.php');