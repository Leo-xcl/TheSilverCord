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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombres']);
    $apellidos = $conn->real_escape_string($_POST['apellidos']);
    $numero = $conn->real_escape_string($_POST['numero']);
    $vencimiento = $conn->real_escape_string($_POST['vencimiento']);
    $cvv = $conn->real_escape_string($_POST['numeroSeguridad']);
    $id_usuario = $_SESSION['id'];

    $sql = "INSERT INTO tarjetas (nombre, apellidos, numero, vencimiento, cvv, id_usuario) 
            VALUES ('$nombre', '$apellidos', '$numero', '$vencimiento', '$cvv', '$id_usuario')";

    if ($conn->query($sql)) {
        $exito = "Suscripción registrada correctamente.";
    } else {
        $error = "Error al registrar la suscripción.";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Tarjeta</title>
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
        <form action="registrarTarjeta.php" method="POST">
            <section class="form-registro">
                <h4>Suscripcion a The Silver Cord ++:</h4>
                <?php if (isset($error)) echo "<p style='color:var(--primary-red)'>$error</p>"; ?>
                <?php if (isset($exito)) echo "<p style='color:#4CAF50'>$exito</p>"; ?>
                <div class="tarjetas-logos">
                    <i class='bx bxl-visa'></i>
                    <i class='bx bxl-mastercard'></i>
                </div>
                <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre:">
                <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus Apellidos:">
                <input class="controls" type="text" name="numero" id="numero" placeholder="Ingrese su Numero de Tarjeta">
                <input class="controls" type="text" name="vencimiento" id="vencimiento" placeholder="MM/YY">
                <input class="controls" type="text" name="numeroSeguridad" id="numeroSeguridad" placeholder="Ingrese su Numero de Seguridad">
                <p>Estoy de acuerdo con <a href="terminos.php">Terminos y Condiciones</a></p>
                <input class="buttons" type="submit" value="Suscribirse">
                <p><a href="registros.php">Ver registros</a></p>
            </section>
        </form>
    </div>
    <script>
    document.getElementById('numero').addEventListener('input', function() {
        let val = this.value.replace(/\D/g, '').slice(0, 16);
        this.value = val.match(/.{1,4}/g)?.join('-') || val;
    });
    document.getElementById('vencimiento').addEventListener('input', function() {
        let val = this.value.replace(/\D/g, '').slice(0, 4);
        if (val.length >= 3) val = val.slice(0,2) + '/' + val.slice(2);
        this.value = val;
    });
    document.getElementById('numeroSeguridad').addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 3);
    });
    </script>
</body>
</html>