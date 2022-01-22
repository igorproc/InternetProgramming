<?php
function is_ssl() {
	if ( isset( $_SERVER['HTTPS'] ) ) {
		if ( 'on' == strtolower( $_SERVER['HTTPS'] ) ) {
			return true;
		}

		if ( '1' == $_SERVER['HTTPS'] ) {
			return true;
		}
	} elseif ( isset($_SERVER['SERVER_PORT'] ) && ( '443' == $_SERVER['SERVER_PORT'] ) ) {
		return true;
	}
	return false;
}
function appGetSsl() {
    if( is_ssl() ){
        $ssl = 'https://';
    }
    else {
        $ssl = 'http://';
    }
    return $ssl;
}
function appGetDomain() {
    return $_SERVER['HTTP_HOST'];
}
function appGetUrl() {
    $result = '';
    $default_port = 80;
    if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
    
        $result .= 'https://';
        $default_port = 443;
    } 
    else {
    $result .= 'https://';
    }
    $result .= $_SERVER['SERVER_NAME'];
    if ($_SERVER['SERVER_PORT'] != $default_port) {
        $result .= ':'.$_SERVER['SERVER_PORT'];
    }
    $result .= $_SERVER['REQUEST_URI'];

    return $result;
}


$config['db'] = [
    'host' => 'localhost',
    'dbname' => 'cc38255_nicotine',
    'user' => 'cc38255_nicotine',
    'password' => '8KeYcG2H',
];
$config['ssl'] = appGetSsl();
$config['domain'] = appGetDomain();
?>