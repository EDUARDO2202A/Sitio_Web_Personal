<?php
session_start();
if (!isset($_SESSION['usuario_id'])) { header("Location: login.php"); exit(); }
require 'conexion.php';

$id = $_GET['id'] ?? null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string(trim($_POST['nombre']));
    $correo = $conn->real_escape_string(trim($_POST['correo']));

    $conn->query("UPDATE usuarios SET nombre='$nombre', correo='$correo' WHERE id=$id");
    header("Location: usuarios.php");
    exit();
}

$user = $conn->query("SELECT * FROM usuarios WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/usuarios.css">
</head>
<body>

<div class="form-container">
    <h2>Editar Usuario</h2>
    <form action="editar.php?id=<?= $id ?>" method="POST">
        <input type="text" name="nombre" value="<?= htmlspecialchars($user['nombre']) ?>" required>
        <input type="email" name="correo" value="<?= htmlspecialchars($user['correo']) ?>" required>
        <button type="submit">Guardar Cambios</button>
    </form>
</div>

</body>
</html>