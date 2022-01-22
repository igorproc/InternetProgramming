<?php
session_name('clientId');
date_default_timezone_set('UTC');
session_set_cookie_params(60*60*24*7,'.nicotine.iny.su');
session_start([
    'cookie_lifetime' => 60*60*24*7
]);

function debug($bug){
    if($bug === false) return false;
    echo '<style>.bug{color: red;}</style>';
    echo '<h2 class="bug"><pre>';
    print_r($bug);
    echo '</pre></h2>';
} 
function user_session_login($id, $email, $password){
    global $_SESSION;
    $_SESSION['user'] = [
        'id' => $id,
        'email' => $email,
        'password' => $password
    ];
    return $_SESSION['user'];
}
function user_session_logout(){
    global $_SESSION;
    $_SESSION['user'] = [];
    header('Location: https://nicotine.iny.su/');
    return true;
}
function is_auth(){
    global $_SESSION;
    if ($_SESSION['user']['id']) return true;
    else return false;
}

require_once('config.php');
require_once('db.php');
require_once('router.php');
?>