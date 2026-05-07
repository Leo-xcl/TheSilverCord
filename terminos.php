<?php
session_start();
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Legal</title>
    <link rel="stylesheet" href="silverCord.css">
    <link rel="stylesheet" href="terminos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="silverCord.js" defer></script>
</head>
<body>
    <?php require 'sidebar.php'; ?>
    <div class="contenido">
        <div class="legal-container">

            <h1 class="legal-titulo">Información Legal</h1>
            <p class="legal-fecha">Última actualización: Mayo 2026</p>

            <section class="legal-seccion">
                <h2>1. Términos de Uso</h2>
                <p>Al acceder y utilizar Record: The Silver Cord, aceptas cumplir con los presentes términos. Esta plataforma es un proyecto académico cuyo propósito es la catalogación y registro de álbumes musicales. El contenido publicado debe corresponder a álbumes y artistas reales. El usuario es responsable de la veracidad de la información que registra. Nos reservamos el derecho de eliminar cualquier contenido que no cumpla con este criterio.</p>
            </section>

            <section class="legal-seccion">
                <h2>2. Privacidad y Datos</h2>
                <p>Los datos personales proporcionados durante el registro — nombre, apellidos y correo electrónico — son almacenados únicamente con fines de identificación dentro del sistema. Las contraseñas son encriptadas antes de ser guardadas y nunca se almacenan en texto plano. No compartimos tu información con terceros bajo ninguna circunstancia.</p>
            </section>

            <section class="legal-seccion">
                <h2>3. Plan de Suscripción</h2>
                <p>El plan Premium de The Silver Cord ++ es una funcionalidad de carácter demostrativo desarrollada con fines académicos. Los datos de tarjeta de crédito ingresados son almacenados en la base de datos del sistema pero no son procesados por ninguna pasarela de pago real. No se realizan cargos de ningún tipo. Te recomendamos no ingresar datos reales de tarjetas bancarias.</p>
            </section>

            <section class="legal-seccion">
                <h2>4. Propiedad Intelectual</h2>
                <p>Los álbumes, artistas y portadas registrados en esta plataforma son propiedad de sus respectivos autores, discográficas y representantes. Record: The Silver Cord no tiene afiliación oficial con ningún artista, banda o sello discográfico mencionado. El uso de nombres e imágenes es estrictamente referencial y sin fines comerciales.</p>
            </section>

            <section class="legal-seccion">
                <h2>5. Limitación de Responsabilidad</h2>
                <p>Esta plataforma se ofrece tal como está, sin garantías de disponibilidad continua. Al tratarse de un entorno de desarrollo local, el acceso y funcionamiento del sistema dependen de la infraestructura del usuario. No nos hacemos responsables por pérdida de datos derivada del uso incorrecto del sistema.</p>
            </section>

            <section class="legal-seccion">
                <h2>6. Contacto</h2>
                <p>
                Para cualquier duda, consulta o solicitud relacionada con estos términos puedes contactarnos a través del correo: 
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=soporteSilverCord@gmail.com" target="_blank">
                    soporteSilverCord@gmail.com
                </a>
                </p>
            </section>

        </div>
    </div>
</body>
</html>