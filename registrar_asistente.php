<?php
require("./config.php");

if (isset($_POST["registrar"])) {
    // Recibir los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["Cedula"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $salario = $_POST["salario"];

    // Validar los campos del formulario
    if (empty($nombre) || empty($apellido) || empty($cedula) || empty($telefono) || empty($correo) || empty($salario)) {
        echo "Por favor complete todos los campos.";
    } else {
        // Insertar los datos en la tabla "asistentes"
        $sql = "INSERT INTO asistentes (nombre, apellido, Cedula, telefono, correo, salario) VALUES ('$nombre', '$apellido', '$cedula', '$telefono', '$correo', '$salario')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Asistente Administrativo registrado correctamente.');</script>";
        } else {
            echo "<script>alert('Error al registrar el Asistente Administrativo.');</script>" . mysqli_error($conn);
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
    <title>Registrar Asistente</title>
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
       <center> <h2>Registrar Asistente</h2></center>
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
                <label for="Cedula">Cédula:</label>
                <input type="text" class="form-control" id="Cedula" name="Cedula" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="number" class="form-control" id="salario" name="salario" required>
            </div>
            <button type="submit" class="btn btn-primary" name="registrar">Registrar Asistente</button>
            <a href="index.html" class="btn btn-secondary">Volver al inicio</a> <!-- Botón "Volver al inicio" -->
            <?php
            if (isset($_POST["registrar"])) {
            echo "<a href='lista_asistentes.php' class='btn btn-info'>Ver lista</a>"; // Botón "lista_asistentes"
        }
        ?>
        
        </form>
    </div>

    <!-- Agregar los scripts de JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"</script>
</body>

</html>
