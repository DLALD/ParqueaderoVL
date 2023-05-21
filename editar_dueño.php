<?php
require("./config.php");

$id = $_GET["id"];

// Verificar si el formulario ha sido enviado
if (isset($_POST["guardar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["Cedula"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    // Actualizar los datos del dueño en la base de datos
    $update = mysqli_query($conn, "UPDATE dueños SET nombre = '$nombre', apellido = '$apellido', Cedula = '$cedula', telefono = '$telefono', correo = '$correo' WHERE id = $id");
    if ($update) {
        echo "<script>window.alert('Datos actualizados correctamente');</script>";
        echo "<script>window.location = 'lista_dueño.php';</script>";
    } else {
        echo "Error al actualizar los datos";
    }
}

// Obtener los datos actuales del dueño de la base de datos
$consulta = mysqli_query($conn, "SELECT * FROM dueños WHERE id = $id");
if (mysqli_num_rows($consulta) > 0) {
    while ($fila = mysqli_fetch_assoc($consulta)) {
        $vistanombre = $fila["nombre"];
        $vistaapellido = $fila["apellido"];
        $vistacedula = $fila["Cedula"];
        $vistatelefono = $fila["telefono"];
        $vistacorreo = $fila["correo"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dueño | <?php echo $id; ?></title>
    <!-- Agregar enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        label {
            display: block;
            margin: 10px;
        }
    </style>
    <style>
        body {
            background-color: #858584;
        }
    </style>
</head>

<body>
    <div class="container">
        <Center><h2>Editar Informacion  </h2></Center>

        <form action="" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $vistanombre; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $vistaapellido; ?>" required>
            </div>
            <div class="form-group">
                <label for="Cedula">Cédula:</label>
                <input type="text" class="form-control" id="Cedula" name="Cedula" value="<?php echo $vistacedula; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $vistatelefono; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $vistacorreo; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
            <a href="lista_dueño.php" class="btn btn-secondary">Volver a la lista</a> <!-- Botón "Volver a la lista" -->
        </form>
    </div>

    <!-- Agregar los scripts de JavaScript de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
