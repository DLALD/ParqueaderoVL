<?php
require("./config.php");

$mensaje = ""; // Variable para almacenar el mensaje de registro

if (isset($_POST["enviar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    // Validar los campos del formulario
    if (empty($nombre) || empty($apellido) || empty($cedula) || empty($telefono) || empty($correo)) {
        $mensaje = "Por favor complete todos los campos.";
    } else {
        // Insertar los datos en la tabla "clientes"
        $sql = "INSERT INTO clientes (nombre, apellido, cedula, telefono, correo) VALUES ('$nombre', '$apellido', '$cedula', '$telefono', '$correo')";
        if (mysqli_query($conn, $sql)) {
            $mensaje = "Cliente registrado correctamente.";
        } else {
            $mensaje = "Error al registrar el cliente: " . mysqli_error($conn);
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

    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #E7830D;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="mt-4 mb-4">Registrar cliente</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="cedula">Cédula:</label>
                        <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cédula" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo" required>
                    </div>

                    <input type="submit" class="btn btn-primary" name="enviar" value="Registrar cliente">
                    <a href="index.html" class="btn btn-secondary">Volver al inicio</a> <!-- Botón "Volver al inicio" -->
                    <?php
        if (!empty($mensaje)) {
            echo "<script>alert('$mensaje');</script>";
        }
        ?>
          <?php
        if (isset($_POST["enviar"])) {
            echo "<a href='registrar_vehiculo.php' class='btn btn-info'>Registrar vehículo</a>"; // Botón "Registrar vehículo"
        }
        ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Agrega los scripts de Bootstrap al final del archivo -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
