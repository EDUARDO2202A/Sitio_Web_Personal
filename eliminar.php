<?php
session_start();
if (!isset($_SESSION['usuario_id'])) { header("Location: login.php"); exit(); }
require 'conexion.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $conn->query("DELETE FROM usuarios WHERE id = $id");
}
header("Location: usuarios.php");
exit();
?>