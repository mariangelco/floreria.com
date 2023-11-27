<?php
$servername = "localhost";
$dbname = "Floreria";
$username = "Administrador";
$password = "Admin.123";

// Crear una conexión
$con = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $idprov = $_POST['idprov'];
    $tel = $_POST['tel']; 
    $correo = $_POST['correo'];

    $sql = "UPDATE Proveedores SET Telefono ='$tel', correo = '$correo' WHERE Id_proveedor = '$idprov'";

    if (mysqli_query($con, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Floreria actualizar proveedor</title>
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
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
            margin: 16px 0 8px;
            color: #1c2130; /* Texto azul oscuro */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
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
            width: 100%;
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
        <a href="menuAdministrador.php">Volver al Menú</a>
        <div class="logo">Floreria Jackelin</div>
        <a href="logout.php">Cerrar Sesión</a>
    </div>

    <div class="content">
    
    <form action="updproveedores.php" method="post">
    <h2>Actualizar proveedor </h2>

            <label for="idprov">Id proveedor:</label>
            <input type="text" name="idprov" required><br><br>
            
            <label for="tel">Nuevo número de teléfono:</label>
            <input type="text" name="tel" required><br><br>   
            
            <label for="correo">Nuevo correo:</label>
            <input type="text" name="correo" required><br><br>       
            
            <button type="submit" name="submit">Actualizar proveedor</button>

        <?php
            // Agrega esta sección PHP para manejar la notificación
            if (isset($_POST['submit'])) {
                echo '<p class="success-message">Registro modificado correctamente</p>';
            }
        ?>
    </form>
</body>
</html>
