<?php
require_once 'conexion.php';

header('Content-Type: application/json');

$stmt = $pdo->query('SELECT id, nombre, logo_url, stream_url FROM emisoras WHERE activa = 1');
$emisoras = $stmt->fetchAll();

echo json_encode($emisoras);