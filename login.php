<?php
session_start();
require 'functions.php';

$email = $_POST['email'];
$password = $_POST['password'];

$is_user_logged_in = login($email, $password);

if ($is_user_logged_in == false) {
    redirect_to('page_login.php');
    exit;
}

redirect_to('users.php');