<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    
    if ($usuario === 'Administrador' && $contrasena === 'Admin.123') {
        $_SESSION['usuario'] = $usuario;
        header("Location: menuAdministrador.php");
        exit();
    }

    
    if ($usuario === 'Empleado' && $contrasena === 'Empleado.123') {
        $_SESSION['usuario'] = $usuario;
        header("Location: menuEmpleado.php");
        exit();
    }

    
    echo '<p style="color: red;">Usuario o contraseña incorrectos</p>';
}
?>
