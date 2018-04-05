<?php
require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;
define('SECRET_KEY', 'testqazi');
if (isset($_COOKIE['access-token'])){
    echo '<pre>';
    print_r(getallheaders());
    echo '</pre>';
    $token = $_COOKIE['access-token'];
    try{
        $payload = JWT::decode($token, SECRET_KEY, ['HS256']);
        echo 'you are logged in';
        echo '<pre>';
        print_r($payload);
    }catch (Exception $exception){
        print_r($exception->getMessage());
    }
}else{
    echo "you are not signed in... <br /> redirecting to login page...";
    $url = '/test-token';
//    header("Location: http://".$_SERVER['HTTP_HOST'].$url);
}
