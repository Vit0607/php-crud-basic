<?php

function get_user_by_email($email) {
    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = "SELECT * FROM users WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function get_user_by_id($user_id) {
    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = "SELECT * FROM users WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $user_id]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function add_user($email, $password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = "INSERT INTO users (email, password, role) VALUES (:email, :password, :role)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $email, 'password' => $hashed_password, 'role' => 'user']);
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
    if($user['role'] == 'admin') {
        return true;
    } else {
        return false;
    }
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

function edit_info($user_id, $username, $job_title, $phone, $address) {
    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = 'UPDATE users SET username=:username, job_title=:job_title, phone=:phone, address=:address, phone2=:phone2 WHERE id=:id'; 
    $statement = $pdo->prepare($sql);
    $result = $statement->execute(['id' => $user_id, 'username' => $username, 'job_title' => $job_title, 'phone' => $phone, 'address' => $address, 'phone2' =>preg_replace('/[^\d\+]/', '', $phone) ]);
    return $result;
}

function set_status($user_id, $status) {
    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = 'UPDATE users SET status=:status WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $user_id, 'status' => $status]);
}

function upload_avatar($user_id, $image) {
    $file_extension = pathinfo($image['name'])['extension'];
    $file_name = pathinfo($image['name'])['filename'];
    $file = uniqid() . $file_name . '.' . $file_extension;

    $dir_name = 'img/demo/avatars/';

    $user_image_path = get_user_by_id($user_id)['image'];

    if(!empty($user_image_path)) {
        unlink($user_image_path);
    }

    move_uploaded_file($image['tmp_name'], $dir_name . $file);

    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = 'UPDATE users SET image=:image WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $user_id, 'image' => $dir_name . $file]);
}

function add_social_links($user_id, $vk, $telegram, $instagram) {
    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = 'UPDATE users SET vk=:vk, telegram=:telegram, instagram=:instagram WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $user_id, 'vk' => $vk, 'telegram' => $telegram, 'instagram' => $instagram]);
}

function is_user_author($logged_user_id, $edit_user_id) {
    if ($logged_user_id == $edit_user_id) {
        return true;
    } else {
        return false;
    }
}

function edit_credentials($user_id, $email, $password) {
    $pdo = new PDO('mysql:host=localhost;dbname=php-crud-basic', 'root', '');
    $sql = 'UPDATE users SET email=:email, password=:password WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $result = $statement->execute(['id' => $user_id, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);
    
    return $result;
}