<?php
require("./config.php");

if (isset($_POST["enviar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    // Validar los campos del formulario
    if (empty($nombre) || empty($apellido) || empty($telefono) || empty($correo)) {
        echo "Por favor complete todos los campos.";
    } else {
        // Insertar los datos en la tabla "vehiculos"
        $sql = "INSERT INTO clientes (nombre, apellido, telefono, correo) VALUES ('$nombre', '$apellido', '$telefono', '$correo')";
        if (mysqli_query($conn, $sql)) {
            echo "Cliente registrado correctamente.";
            echo "<a href='registrar_vehiculo.php'>Registrar vehículo</a>";
        } else {
            echo "Error al registrar el vehículo: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar cliente</title>

    <style>
        label {
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="nombre">
            Nombre: <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
        </label>
        <label for="apellido">
            Apellido: <input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
        </label>
        <label for="telefono">
            Teléfono: <input type="tel" name="telefono" id="telefono" placeholder="Teléfono" required>
        </label>
        <label for="correo">
            Correo: <input type="email" name="correo" id="correo" placeholder="Correo" required>
        </label>

        <input type="submit" name="enviar" value="Registrar datos del cliente">
        <a href="index.html">Volver al inicio</a> <!-- Botón "Volver al inicio" -->
    </form>
</body>
</html>