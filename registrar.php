<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, apellidos, correo, contrasena) VALUES ('$nombre', '$apellidos', '$correo', '$contrasena')";
    
    if ($conn->query($sql)) {
        header('Location: iniciarSesion.php');
        exit();
    } else {
        $error = "Este correo ya está registrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cuenta</title>
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
        <form action="registrar.php" method="POST">
            <section class="form-registro">
                <h4>Registrar Cuenta:</h4>
                <?php if (isset($error)) echo "<p style='color:var(--primary-red)'>$error</p>"; ?>
                <input class="controls" type="text" name="nombres" placeholder="Ingrese su Nombre:">
                <input class="controls" type="text" name="apellidos" placeholder="Ingrese sus Apellidos:">
                <input class="controls" type="email" name="correo" placeholder="Ingrese su Correo Electronico:">
                <input class="controls" type="password" name="contrasena" id="contrasena" placeholder="Ingrese su Contraseña:">
                <div class="show-pass">
                    <input type="checkbox" id="verContrasena" onclick="togglePass()">
                    <label for="verContrasena">Mostrar contraseña</label>
                </div>
                <p>Estoy de acuerdo con <a href="terminos.php">Terminos y Condiciones</a></p>
                <input class="buttons" type="submit" value="Registrar">
                <p><a href="iniciarSesion.php">¿Ya tiene cuenta?</a></p>
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