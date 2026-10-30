<?php

if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1') {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "sistema_usuarios";
} else {
  
    $host = "sql300.infinityfree.com"; // 
    $user = "if0_43107330";            
    $pass = "C6a6QD01JZ";           
    $db   = "if0_43107330_gestion_usuarios"; 
}

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>