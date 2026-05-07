<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['id'])) {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="silverCord.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="modal-overlay">
            <div class="modal-box">
                <h3>Acceso Restringido</h3>
                <p>Debes iniciar sesión para acceder a esta página.</p>
                <button class="buttons" onclick="window.location.href=\'iniciarSesion.php\'">Iniciar Sesión</button>
            </div>
        </div>
    </body>
    </html>';
    exit();
}

// Verificar plan premium
$sqlPlan = "SELECT id FROM tarjetas WHERE id_usuario = '{$_SESSION['id']}'";
$resPlan = $conn->query($sqlPlan);
if (!$resPlan || $resPlan->num_rows === 0) {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="silverCord.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="modal-overlay">
            <div class="modal-box">
                <h3>Plan Premium Requerido</h3>
                <p>Necesitas una suscripción activa para acceder a esta función.</p>
                <button class="buttons" onclick="window.location.href=\'registrarTarjeta.php\'">Suscribirse</button>
            </div>
        </div>
    </body>
    </html>';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $conn->real_escape_string($_POST['id']);
    $nombre = $conn->real_escape_string($_POST['nombres']);
    $apellidos = $conn->real_escape_string($_POST['apellidos']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', correo='$correo', contrasena='$contrasena' WHERE id='$id'";

    if ($conn->query($sql)) {
        $exito = "Cuenta actualizada correctamente.";
    } else {
        $error = "Error al actualizar la cuenta.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cuenta</title>
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
        <form action="actualizarRegistro.php" method="POST">
            <section class="form-registro">
                <h4>Actualizar Cuenta:</h4>
                <?php if (isset($error)) echo "<p style='color:var(--primary-red)'>$error</p>"; ?>
                <?php if (isset($exito)) echo "<p style='color:#4CAF50'>$exito</p>"; ?>
                <input class="controls" type="number" name="id" placeholder="ID del usuario a actualizar:">
                <input class="controls" type="text" name="nombres" placeholder="Nuevo nombre:">
                <input class="controls" type="text" name="apellidos" placeholder="Nuevos apellidos:">
                <input class="controls" type="email" name="correo" placeholder="Nuevo correo:">
                <input class="controls" type="password" name="contrasena" placeholder="Nueva contraseña:">
                <p>Estoy de acuerdo con <a href="terminos.php">Terminos y Condiciones</a></p>
                <input class="buttons" type="submit" value="Actualizar">
                <p><a href="registros.php">Ver registros</a></p>
            </section>
        </form>
    </div>
</body>
</html>