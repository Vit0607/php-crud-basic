<?php
session_start();
require 'functions.php';

set_status($_POST['id'], $_POST['status']);

set_flash_message('success', 'Профиль успешно обновлён');

redirect_to('page_profile.php?id=' . $_POST['id']);