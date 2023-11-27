<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
$rol = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floreria consulta empleados</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f1c1; /* Fondo amarillo claro */
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #8db986; /* Línea de borde verde menta */
        }

        th {
            background-color: #eaeaea;  /* Color verde menta */
            color: #1c2130;
        }

        tr:nth-child(even) {
            background-color: #eaeaea; /* Color de fondo gris claro para filas pares */
        }

        tr:hover {
            background-color: #d6aeeb;  /* Color de fondo gris más oscuro al pasar el ratón */
        }
    </style>
</head>
<body>
    <header>
    <div class="header">
            <?php
            $menuURL = ($rol === 'Administrador') ? 'menuAdministrador.php' : 'menuEmpleado.php';
            ?>
            <a href="<?php echo $menuURL; ?>"><h2>Volver al Menú</h2></a>
            <div class="logo"><h1>Floreria Jackelin</h1></div>
            <a href="logout.php"><h2>Cerrar Sesión</h2></a>
        </div>
        <h1>Consultar empleados</h1>
    </header>

    <?php
    $servername = "localhost";
    $dbname = "Floreria";
    $username = "Administrador";
    $password = "Admin.123";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Empleados";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<table>";
        echo "<tr><th>ID empleado</th><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th><th>Telefono</th><th>Activo</th><th>Correo</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Id_empleado'] . "</td>";
            echo "<td>" . $row['Nombre'] . "</td>";
            echo "<td>" . $row['apellido_paterno'] . "</td>";
            echo "<td>" . $row['apellido_materno'] . "</td>";
            echo "<td>" . $row['Telefono'] . "</td>";
            echo "<td>" . $row['Activo'] . "</td>";
            echo "<td>" . $row['Correo'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        mysqli_free_result($result);
    } else {
        echo "<p>Error en la consulta: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
