<?php
// Si está ejecutándose en tu PC local (XAMPP)
if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1') {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "sistema_usuarios";
} else {
    // Si está ejecutándose en el servidor en línea (InfinityFree)
    $host = "sql300.infinityfree.com"; // <-- Reemplaza con tu MySQL Hostname
    $user = "if0_43107330";            // <-- Reemplaza con tu MySQL Username
    $pass = "C6a6QD01JZ";           // <-- Reemplaza con tu MySQL Password
    $db   = "if0_43107330_gestion_usuarios";    // <-- Reemplaza con tu MySQL Database Name
}

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>