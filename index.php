<?php
require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;
define('SECRET_KEY', 'testqazi');
$exp = time() + (60);
$payload = [
  'iat' => time(),
  'iss' => 'olivecliq.com',
  'exp' => $exp,
  'userId' => 3999
];
$token = JWT::encode($payload, SECRET_KEY);
setcookie('access-token', $token, $exp);
header("Authorization: Bearer {$token}");
echo $token;
