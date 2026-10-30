<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
require 'conexion.php';

$res = $conn->query("SELECT id, nombre, correo, fecha_registro FROM usuarios");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="css/usuarios.css">
</head>
<body>

<h2>Panel de Gestión de Usuarios</h2>
<p>Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?> | <a href="logout.php">Cerrar Sesión</a></p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha Registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $res->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td><?= htmlspecialchars($row['correo']) ?></td>
            <td><?= $row['fecha_registro'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> | 
                <a href="eliminar.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>