<div class="sidebar" id="sidebar">
    <div class="header">
        <div class="menu-btn" id="menu-btn">
            <i class="bx bx-menu"> </i>
        </div>
        <div class="brand">
            <img src="Recursos/skull.svg" alt="logo">
            <span>L'Menu Sauvage</span>  
        </div>
    </div>
    
    <div class="menu-container">
        <div class="search">
            <i class='bx bx-search'></i>
            <input type="search" placeholder="Search">
        </div>
        <ul class="menu">
            <li class="menu-item menu-item-static">
                <a href="index.php" class="menu-link">
                    <i class="bx bx-home"></i>
                    <span>Pagina Principal</span>
                </a>
            </li>
            <li class="menu-item menu-item-static">
                <a href="iniciarSesion.php" class="menu-link">
                    <i class="bx bx-user"></i>
                    <span>Inicio de Sesión</span>
                </a>
            </li>
            <li class="menu-item menu-item-static">
                <a href="registros.php" class="menu-link">
                    <i class="bx bx-table"></i>
                    <span>Tabla de Registros</span>
                </a>
            </li>
            <li class="menu-item menu-item-dropdown">
                <a href="#" class="menu-link">
                    <i class="bx bx-disc"></i>
                    <span>Registro de Albums</span>
                    <i class="bx bx-chevron-down"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="registrarAlbums.php" class="sub-menu-link">Registrar Album</a></li>
                    <li><a href="actualizarAlbum.php" class="sub-menu-link">Actualizar Album</a></li>
                    <li><a href="borrarAlbum.php" class="sub-menu-link">Borrar Album</a></li>
                </ul>
            </li>
            <li class="menu-item menu-item-dropdown">
                <a href="#" class="menu-link">
                    <i class="bx bx-task"></i>
                    <span>Registros</span>
                    <i class="bx bx-chevron-down"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="registrar.php" class="sub-menu-link">Registrarse</a></li>
                    <li><a href="actualizarRegistro.php" class="sub-menu-link">Actualizar cuenta</a></li>
                    <li><a href="borrarRegistro.php" class="sub-menu-link">Borrar cuenta</a></li>
                </ul>
            </li>
            <li class="menu-item menu-item-static">
                <a href="registrarTarjeta.php" class="menu-link">
                    <i class="bx bx-credit-card-alt"></i>
                    <span>Suscripcion</span>
                </a>
            </li>
            <li class="menu-item menu-item-static">
                <a href="terminos.php" class="menu-link">
                    <i class="bx bx-copyright"></i>
                    <span>Información legal</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="footer">
        <ul class="menu">
            <li class="menu-item menu-item-static">
                <a href="#" class="menu-link">
                    <i class="bx bx-bell"></i>
                    <span>Notificaciones</span>
                </a>
            </li>
            <li class="menu-item menu-item-static">
                <a href="#" class="menu-link">
                    <i class="bx bx-cog"></i>
                    <span>Configuraciones</span>
                </a>
            </li>
        </ul>
                <div class="plan-badge">
            <?php
            if (isset($_SESSION['id'])) {
            $sqlPlan = "SELECT id FROM tarjetas WHERE id_usuario = '{$_SESSION['id']}'";
                $resPlan = $conn->query($sqlPlan);
                if ($resPlan && $resPlan->num_rows > 0) {
                    echo '<span class="badge-premium">✦ Premium</span>';
                } else {
                    echo '<span class="badge-free">Free</span>';
                }
            }else{
                echo '<span class="badge-free">Free</span>';
            }
            ?>
        </div>
        <div class="user">
            <div class="user-img">
                <img src="Recursos/user.png" alt="user">
            </div>
            <div class="user-data">
                <span class="name"><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Invitado'; ?></span>
                <span class="email"><?php echo isset($_SESSION['correo']) ? $_SESSION['correo'] : ''; ?></span>
            </div>
            <div class="user-icon" onclick="cerrarSesion()">
                <i class="bx bx-door-open"></i>
            </div>
        </div>
    </div>
    <script>
    function cerrarSesion() {
        if (confirm('¿Estás seguro que quieres cerrar sesión?')) {
            window.location.href = 'cerrarSesion.php';
        }
    }
    </script>
</div>