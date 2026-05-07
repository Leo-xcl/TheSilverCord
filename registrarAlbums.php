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
    $artista = $conn->real_escape_string($_POST['artista']);
    $album = $conn->real_escape_string($_POST['album']);
    $portada = $conn->real_escape_string($_POST['portada']);
    $id_usuario = $_SESSION['id'];

    $sql = "INSERT INTO albums (artista, nombre, portada) VALUES ('$artista', '$album', '$portada')";
    
    if ($conn->query($sql)) {
        $id_album = $conn->insert_id;
        $sqlRegistro = "INSERT INTO registros (id_album, id_usuario) VALUES ('$id_album', '$id_usuario')";
        $conn->query($sqlRegistro);
        header('Location: index.php');
        exit();
    } else {
        $error = "Error al registrar el álbum.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Album</title>
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
        <form action="registrarAlbums.php" method="POST">
            <section class="form-registro">
                <h4>Registrar Album:</h4>
                <?php if (isset($error)) echo "<p style='color:var(--primary-red)'>$error</p>"; ?>
                <input class="controls" type="text" name="artista" placeholder="Ingresa el nombre del artista/banda:">
                <input class="controls" type="text" name="album" placeholder="Ingresa el nombre del album:">
                <input class="controls" type="text" name="portada" placeholder="Ingresa la dirección de la portada:">
                <p>Estoy de acuerdo con <a href="terminos.php">Terminos y Condiciones</a></p>
                <input class="buttons" type="submit" value="Registrar">
                <p><a href="index.php">Ver albums</a></p>
            </section>
        </form>
    </div>
</body>
</html> 