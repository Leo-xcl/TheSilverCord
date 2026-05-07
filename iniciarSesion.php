<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];
            header('Location: index.php');
            exit();
        }
    }
    $error = "Correo o contraseña incorrectos";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="silverCord.css">
    <link rel="stylesheet" href="formularios.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="silverCord.js" defer></script>
</head>
<body>
    <?php require 'sidebar.php'; ?>
    <div class="contenido">
        <form action="iniciarSesion.php" method="POST">
            <section class="form-registro">
                <h4>Iniciar Sesion:</h4>
                <?php if (isset($error)) echo "<p style='color:var(--primary-red)'>$error</p>"; ?>
                <input class="controls" type="email" name="correo" placeholder="Ingrese su Correo Electronico:">
                <input class="controls" type="password" name="contrasena" id="contrasena" placeholder="Ingrese su Contraseña:">
                <div class="show-pass">
                    <input type="checkbox" id="verContrasena" onclick="togglePass()">
                    <label for="verContrasena">Mostrar contraseña</label>
                </div>
                <p>Estoy de acuerdo con <a href="terminos.php">Terminos y Condiciones</a></p>
                <input class="buttons" type="submit" value="Enviar">
                <p><a href="registrar.php">¿No tienes cuenta?</a></p>
            </section>
        </form>
    </div>
    <script>
    function togglePass() {
        const input = document.getElementById('contrasena');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
    </script>
</body>
</html>