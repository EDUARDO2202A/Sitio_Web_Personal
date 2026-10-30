<?php
require 'conexion.php';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = $conn->real_escape_string(trim($_POST['nombre']));
    $correo   = $conn->real_escape_string(trim($_POST['correo']));
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nombre, correo, password) VALUES ('$nombre', '$correo', '$password')";

    if ($conn->query($sql)) {
        header("Location: login.php?registro=ok");
        exit();
    } else {
        $mensaje = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/usuarios.css">
</head>
<body>

<div class="form-container">
    <h2>Registrarse</h2>
    <?php if ($mensaje): ?><p class="error-msg" style="display:block;"><?= $mensaje ?></p><?php endif; ?>

    <form id="formRegistro" action="registro.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="password" name="password" id="password" placeholder="Contraseña" required>
        <input type="password" id="re_password" placeholder="Confirmar contraseña" required>
        <p id="errorPass" class="error-msg">Las contraseñas no coinciden.</p>
        <button type="submit">Registrar</button>
    </form>
    <p><a href="login.php">¿Ya tienes cuenta? Inicia sesión</a></p>
</div>

<script>
document.getElementById('formRegistro').addEventListener('submit', function(e) {
    const pass = document.getElementById('password').value;
    const rePass = document.getElementById('re_password').value;
    const error = document.getElementById('errorPass');

    if (pass !== rePass) {
        e.preventDefault();
        error.style.display = 'block';
    } else {
        error.style.display = 'none';
    }
});
</script>

</body>
</html>