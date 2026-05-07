<?php
session_start();
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RTSC</title> 
    <link rel="stylesheet" href="silverCord.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

<?php require 'sidebar.php'; ?>

<h1 class="titulo">Record</h1> 
<h2 class="subtitulo">The Silver Cord</h2>

<img src="Recursos/logoPagina.png" alt="logo" class="logo">

<audio id="miAudio" loop>
    <source src="Recursos/A sight to behold.mp3" type="audio/mpeg">
</audio>

<button id="miBoton" onclick="toggleAudio()" class="boton">Reproducir</button>

<script>
function toggleAudio() {
    var audio = document.getElementById("miAudio");
    var boton = document.getElementById("miBoton");
    if (audio.paused) {
        audio.play();
        boton.innerText = "Pausar";
    } else {
        audio.pause();
        boton.innerText = "Reproducir";
    }
}
</script>

<script src="silverCord.js" defer></script>

<h3 class="tituloTabla">Los mejores albums</h3>

<table class="tabla" id="tablaAlbums">
<tr>
    <th>ID</th>
    <th>Artista/Banda</th>
    <th>Album</th>
    <th>Portada</th>
</tr>
<?php
$sql = "SELECT * FROM albums";
$resultado = $conn->query($sql);
while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
        <td>{$fila['id']}</td>
        <td>{$fila['artista']}</td>
        <td>{$fila['nombre']}</td>
        <td><img src='{$fila['portada']}' width='200' height='200'></td>
    </tr>";
}
?>
</table>

<h4 class="artistas"><b>Artistas Recomendados</b></h4>
<ul class="listaArtistas">
    <li><a href="https://open.spotify.com/artist/1Qp56T7n950O3EGMsSl81D" target="_blank">Ghost</a></li>
    <li><a href="https://open.spotify.com/artist/0GDGKpJFhVpcjIGF8N6Ewt" target="_blank">Gojira</a></li>
    <li><a href="https://open.spotify.com/artist/7o6cOczXTB8ioTAAJTbESf" target="_blank">Jinjer</a></li>
    <li><a href="https://open.spotify.com/artist/17yuYtUWBys2RUW9ylcqUV" target="_blank">Devotee</a></li>
    <li><a href="https://open.spotify.com/artist/32p4BTeuqA9NLUBmaUW31f" target="_blank">Subvision</a></li>
    <li><a href="https://open.spotify.com/artist/5TWakwpOctfXseCIG1lQWa" target="_blank">Repugnant</a></li>
    <li><a href="https://open.spotify.com/artist/6vXYoy8ouRVib302zxaxFF" target="_blank">Lorna Shore</a></li>
    <li><a href="https://open.spotify.com/artist/70Dq7XQ95jLPUfMoVbcnuS" target="_blank">Magna Carta Cartel</a></li>
</ul>
</body>
</html>