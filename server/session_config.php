<?php
$is_localhost = in_array(
    strtolower(explode(':', $_SERVER['HTTP_HOST'])[0]),
    ['localhost', '127.0.0.1']
);

if (!$is_localhost && (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on')) {
    header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], true, 301);
    exit;
}

$host   = strtolower(preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? ''));
$domain = ($host === 'localhost' || $host === '127.0.0.1') ? '' : $host;

session_set_cookie_params([
    'lifetime' => 0,
    'path'     => '/',
    'domain'   => $domain,
    'secure'   => true,
    'httponly' => true,
    'samesite' => 'Lax'
]);

session_start();