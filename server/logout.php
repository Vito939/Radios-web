<?php
/**
 * Cierra la sesión del usuario y redirige a la página de inicio de sesión.
 */
session_start();
$_SESSION = [];
session_destroy();
header("Location: ../login.php");
exit();