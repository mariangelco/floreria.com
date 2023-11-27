<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
$rol = $_SESSION['usuario'];

$servername = "localhost";
$dbname = "Floreria";
$username = "Administrador";
$password = "Admin.123";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $idemp = $_POST['idemp'];
    $idprod = $_POST['idprod'];
    $fecha = $_POST['fecha'];
    $impven = $_POST['impven'];
    

    $sql = "INSERT INTO Venta_empleado (id_empleado,id_producto, fecha, importe_venta) VALUES ('$idemp','$idprod', '$fecha','$impven')";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error al insertar registro: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Floreria ingresar venta de empleado</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f1c1; /* Fondo amarillo claro */
            margin: 0;
            padding: 0;
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

        form {
            background-color: #eaeaea; /* Color gris claro */
            padding: 10px; /* Reducir el padding para hacerlo más compacto */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px; /* Ajustar el ancho máximo según tus necesidades */
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #8db986; /* Texto verde menta */
            margin-top: 0; /* Elimina el margen superior predeterminado */
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 8px 0; /* Reducir el margen inferior del label */
            color: #1c2130; /* Texto azul oscuro */
        }

        input {
            width: calc(100% - 20px); /* Ajustar el ancho para tener en cuenta el padding */
            padding: 10px;
            margin-bottom: 8px; /* Reducir el margen inferior del input */
            box-sizing: border-box;
            border: 1px solid #8db986; /* Borde verde claro */
            border-radius: 3px;
            background-color: #f1f1c1; /* Fondo amarillo claro */
            color: #1c2130; /* Texto azul oscuro */
        }

        button {
            background-color: #8db986; /* Color verde menta */
            color: #1c2130; /* Texto azul oscuro */
            padding: 12px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: calc(100% - 20px); /* Ajustar el ancho para tener en cuenta el padding */
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #d6aeeb; /* Color lavanda más oscuro al pasar el ratón */
        }

        .success-message {
            color: #4caf50; /* Color verde */
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
    <?php
    $menuURL = ($rol === 'Administrador') ? 'menuAdministrador.php' : 'menuEmpleado.php';
    ?>
    <a href="<?php echo $menuURL; ?>">Volver al Menú</a>
    <div class="logo">Floreria Jackelin</div>
        <a href="logout.php">Cerrar Sesión</a>
</div>

    <div class="content">
        <form action="insertventa_empleado.php" method="post">
            <h2>Insertar una venta de empleado</h2>

            <label for="idemp">ID empleado:</label>
            <input type="text" name="idemp" required>

            <label for="idprod">ID Producto:</label>
            <input type="text" name="idprod" required>
            
            <label for="fecha">Día de la venta (Año-mes-día):</label>
            <input type="text" name="fecha" required> 
            
            <label for="impven">Importe de venta:</label>
            <input type="text" name="impven" required>

            <input type="submit" name="submit" value="Insertar venta de empleado">

            <?php
                // Agrega esta sección PHP para manejar la notificación
                if (isset($_POST['submit'])) {
                    echo '<p class="success-message">Registro ingresado correctamente</p>';
                }
            ?>
        </form>
    </div>
</body>
</html>
