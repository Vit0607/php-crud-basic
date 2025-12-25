<?php
session_start();
require 'functions.php';

$result = edit_info($_POST['user_id'], $_POST['username'], $_POST['job_title'], $_POST['phone'], $_POST['address']);
set_flash_message('success', 'Профиль успешно обновлён');
redirect_to('page_profile.php');
exit;