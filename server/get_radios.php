<?php
require_once 'conexion.php';

header('Content-Type: application/json');

$stmt = $pdo->query('SELECT id, nombre, logo_url, stream_url FROM emisoras WHERE activa = 1');
$emisoras = $stmt->fetchAll();

// ¿Y si la BD devuelve datos corruptos que json_encode no puede procesar?
$json = json_encode($emisoras);
if ($json === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al procesar los datos']);
    exit;
}

echo $json;