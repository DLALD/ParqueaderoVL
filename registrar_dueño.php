<?php
require("./config.php");

if (isset($_POST["registrar"])) {
    // Recibir los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    // Validar los campos del formulario
    if (empty($nombre) || empty($apellido) || empty($cedula) || empty($telefono) || empty($correo)) {
        echo "Por favor complete todos los campos.";
    } else {
        // Insertar los datos en la tabla "dueños"
        $sql = "INSERT INTO dueños (nombre, apellido, cedula, telefono, correo) VALUES ('$nombre', '$apellido', '$cedula', '$telefono', '$correo')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Dueño registrado correctamente.');</script>";
        } else {
            echo "<script>alert('Error al registrar el Dueño.');</script>" . mysqli_error($conn);
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
    <title>Registrar Dueño</title>
    <!-- Agregar enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #E7830D;
        }
    </style>
</head>


<body>
    
    <div class="container">
        <h2>Registrar Dueño</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" class="form-control" id="cedula" name="cedula" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <button type="submit" class="btn btn-primary" name="registrar">Registrar Dueño</button>
            <a href="index.html" class="btn btn-secondary">Volver al inicio</a> <!-- Botón "Volver al inicio" -->
            <?php
            if (isset($_POST["registrar"])) {
                echo "<a href='lista_dueño.php' class='btn btn-info'>Ver lista de dueños</a>"; // Enlace a la lista de dueños
            }
            ?>
        </form>
    </div>

    <!-- Agregar los scripts de JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

