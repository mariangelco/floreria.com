<?php
// Cierra la sesión
session_start();
session_unset();
session_destroy();

// Redirige al formulario de inicio de sesión
header("Location: index.html");
exit();
?>
