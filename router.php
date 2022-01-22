<?php
function router($args){
    switch($args){
        default:
            // echo 'ok';
            break;
        case 'login':
            require_once('login.php');
            break;
        case 'register':
            require_once('register.php');
            break;
        case 'logout':
            user_session_logout();
        case 'private':
            if(is_auth()) echo 'secret inf0';
            else echo 'maksim studnev';
            break;
    }
}
router($_GET['act']);
?>