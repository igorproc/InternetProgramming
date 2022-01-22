<?php
    //todo add middleware
    $email = $_POST['email'];
    $password = $_POST['password'];

    /** 
     * 1.check uniqe email
     * 2.if not add to database
     * 3.register
    */
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die('incorrect email');
    if (!$password) die('incorrect password');

    $query = "SELECT * FROM users WHERE email = :email";
    $var = [
        ':email' => $email
    ];
    $user = dbGetOne($query, $var);
    if ($user['id']) die('user was registred');

    $query_insert = "INSERT INTO users (id, email, password) VALUES (NULL, :email, :password)";
    $var_insert = [
        ':email' => $email,
        ':password' => md5($password)
    ];
    $id = dbAddOne($query_insert, $var_insert);
    if(!$id) die('something went wrong');

    user_session_login($id, $email, $password);

    //todo user dashboard
    header('Location: https://nicotine.iny.su/');
?>