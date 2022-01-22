<?php
    //todo add middleware
    $email = $_POST['email'];
    $password = $_POST['password'];

    /**
     * 1. find email in base
     * 2. check corectionaly password
     */

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die('incorrect email');
    if (!$password) die('incorrect password');

    $query = "SELECT * FROM users WHERE email = :email";
    $var = [
        ':email' => $email
    ];
    $user = dbGetOne($query, $var);

    if (md5($password) !== $user['password']) die('incorrect input password or email');

    user_session_login($user['id'], $email, $password);
    header('Location: https://nicotine.iny.su/');
?>