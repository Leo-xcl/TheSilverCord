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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Registros</title>
    <link rel="stylesheet" href="silverCord.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="silverCord.js" defer></script>
</head>
<body>
    <?php require 'sidebar.php'; ?>

    <h3 class="tituloTabla">Tabla de Registros</h3>

    <table class="tabla" id="tablaRegistros">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Artista</th>
            <th>Album</th>
            <th>Fecha</th>
        </tr>
        <?php
        $sql = "SELECT registros.id, usuarios.nombre, usuarios.apellidos, 
                albums.artista, albums.nombre AS album, registros.fecha
                FROM registros
                JOIN usuarios ON registros.id_usuario = usuarios.id
                JOIN albums ON registros.id_album = albums.id
                ORDER BY registros.fecha DESC";
        $resultado = $conn->query($sql);
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['nombre']} {$fila['apellidos']}</td>
                <td>{$fila['artista']}</td>
                <td>{$fila['album']}</td>
                <td>{$fila['fecha']}</td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>