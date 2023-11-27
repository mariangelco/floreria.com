<?php
session_start();

// Verifica si el usuario está autenticado y es un empleado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'Empleado') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú empleado</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f1c1;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #8db986;
            color: #1c2130;
            padding: 10px;
            text-align: center;
        }
        
        .header {
            background-color: #8db986; /* Color verde menta */
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header a {
            text-decoration: none;
            color: #1c2130; /* Texto azul oscuro */
            margin: 0 10px;
            font-weight: bold;
        }

        .header a:hover {
            color: #d6aeeb; /* Color lavanda más oscuro al pasar el ratón */
        }

        .logo {
            color: #1c2130; /* Texto azul oscuro */
            font-size: 24px;
            font-weight: bold;
        }

        .content {
            display: flex;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 50px); /* Restar la altura del encabezado */
        }

        nav {
            background-color:#eaeaea;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            margin: 20px auto;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            display: block;
            padding: 10px;
            background-color: #8db986;
            color: #1c2130;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #d6aeeb; 
        }
    </style>
</head>

<body>
    
    <header>
    <div class="header">
        <a href="menuEmpleado.php"><h2>Empleado</h2></a>
        <div class="logo"><h1>   Floreria Jackelin</h1></div>
        <a href="logout.php"><h2>Cerrar Sesión</h2></a>
    </div>
        <h2>¿Qué acción desea realizar hoy?</h2>
    </header>

    <nav>
        <ul>
            <li><a href="consulta.php">Consultar una tabla</a></li>
            <li><a href="inserta.php">Agregar un nuevo registro</a></li>
            <li><a href="actualiza.php">Actualizar un registro</a></li>
            
        </ul>
    </nav>
</body>

</html>
