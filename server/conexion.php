<?php

// ¿En qué ambiente estamos?
// Cuando subas a producción, cambia 'development' por 'production'
define('APP_ENV', 'development');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'radiosweb');
define('DB_CHARSET', 'utf8mb4');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);

    if (APP_ENV === 'development') {
        die("Error de conexión: " . $e->getMessage());
    } else {
        die("Error interno del servidor.");
    }
}