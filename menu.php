<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Verifica el rol del usuario
$rol = $_SESSION['usuario'];

// Si es administrador, muestra el menú de administrador
if ($rol === 'Administrador') {
    echo '<header>
            <div class="header">
                <a href="menuAdministrador.php"><h2>Volver al Menú</h2></a>
                <div class="logo"><h1>Floreria Jackelin</h1></div>
                <a href="logout.php"><h2>Cerrar Sesión</h2></a>
            </div>
            <h2>¿Qué acción desea realizar hoy?</h2>
        </header>';
    
    echo '<nav>
            <ul>
                <li><a href="consulta.php">Consultar una tabla</a></li>
                <li><a href="inserta.php">Agregar un nuevo registro</a></li>
                <li><a href="actualiza.php">Actualizar un registro</a></li>
                <li><a href="elimina.php">Eliminar un registro</a></li>
            </ul>
        </nav>';
}
// Si es empleado, muestra el menú de empleado
elseif ($rol === 'Empleado') {
    echo '<header>
            <div class="header">
                <a href="menuEmpleado.php"><h2>Volver al Menú</h2></a>
                <div class="logo"><h1>Floreria Jackelin</h1></div>
                <a href="logout.php"><h2>Cerrar Sesión</h2></a>
            </div>
            <h2>¿Qué acción desea realizar hoy?</h2>
        </header>';
    
    echo '<nav>
            <ul>
                <li><a href="consulta.php">Consultar una tabla</a></li>
                <li><a href="inserta.php">Agregar un nuevo registro</a></li>
                <li><a href="actualiza.php">Actualizar un registro</a></li>
            </ul>
        </nav>';
}
// Si el rol no es reconocido, redirige a la página de inicio de sesión
else {
    header("Location: login.php");
    exit();
}
?>
