<?php
session_start();
require 'conexion.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo   = $conn->real_escape_string(trim($_POST['correo']));
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $res = $conn->query($sql);

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
            header("Location: usuarios.php");
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "El correo no está registrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/usuarios.css">
</head>
<body>

<div class="form-container">
    <h2>Iniciar Sesión</h2>
    <?php if ($error): ?><p class="error-msg" style="display:block;"><?= $error ?></p><?php endif; ?>

    <form action="login.php" method="POST">
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>
    <p><a href="registro.php">¿No tienes cuenta? Regístrate</a></p>
</div>

</body>
</html>