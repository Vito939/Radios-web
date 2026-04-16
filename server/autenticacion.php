<?php
session_start();
require_once 'conexion.php';

$accion = $_POST['accion'] ?? '';

if ($accion === 'registro') {
    registrar();
} elseif ($accion === 'login') {
    iniciar_sesion();
} else {
    header('location : ../index.php');
    exit;
}

//Registro
function registrar () {
    global $pdo;

    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    //validaciones basicas
    if (empty($nombre) || empty($correo) || empty($password)) {
        volver_con_error('../registro.php', 'Todos los campos son obligatorios');
    }

    if ($password !== $password2) {
        volver_con_error('../registro.php', 'Las contraseñas no coinciden');
    }

    if (strlen($password) < 8) {
        volver_con_error('../registro.php', 'La contraseña debe tener al menos 8 caracteres');
    }

    // Verificar si el correo ya existe
    $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE correo = ?');
    $stmt->execute([$correo]);

    if ($stmt->fetch()) {
        volver_con_error('../registro.php', 'Este correo ya está registrado.');
    }
    // Guardar usuario
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO usuarios (nombre, correo, password_hash) VALUES (?, ?, ?)');
    $stmt->execute([$nombre, $correo, $hash]);

    // Iniciar sesión automáticamente tras registrarse
    $_SESSION['usuario_id'] = $pdo->lastInsertId();
    $_SESSION['nombre']     = $nombre;

    header('Location: ../index.php');
    exit;
}

function iniciar_sesion() {
    global $pdo;

    $correo = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($correo) || empty($password)) {
        volver_con_error('../login.php', 'Todos los campos son obligatorios');
    }

    $stmt = $pdo->prepare('SELECT id, nombre, password_hash FROM usuarios WHERE correo = ?');
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch();

    //Mensaje para no existe y contraseña incorrecta
    if (!$usuario || !password_verify($password, $usuario['password_hash'])) {
        volver_con_error('../login.php', 'Correo o contraseña incorrectos');
    }

    // Iniciar sesión
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['nombre'] = $usuario['nombre'];
    header('Location: ../index.php');
    exit;
}

//funcion para redirigir con mensaje de error
function volver_con_error($pagina, $mensaje) {
    $_SESSION['error'] = $mensaje;
    header('Location: ' . $pagina);
    exit;
}