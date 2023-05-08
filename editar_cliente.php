<?php
require("./config.php");

$id = $_GET["id"];

$consulta = mysqli_query($conn, "SELECT * FROM clientes WHERE id_cliente = $id");
if (mysqli_num_rows($consulta) > 0) {
    while ($fila = mysqli_fetch_assoc($consulta)) {
        $vistanombre = $fila["nombre"];
        $vistapellido = $fila["apellido"];
        $vistatel = $fila["telefono"];
        $vistacorreo = $fila["correo"];
    }
}

if (isset($_POST["guardar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    $update = mysqli_query($conn, "UPDATE clientes SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', correo = '$correo' WHERE id_cliente = $id");
    if ($update) {
        echo "<script>window.alert('Datos actualizados correctamente');</script>";
        echo "<script>window.location = 'editar_cliente.php?id=" . $id . "';</script>";
    } else {
        echo "Error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente | <?php echo $id; ?></title>

    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        label {
            display: block;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" value="<?php echo $vistanombre; ?>" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" value="<?php echo $vistapellido; ?>" name="apellido" id="apellido" class="form-control" placeholder="Apellido" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" value="<?php echo $vistatel; ?>" name="telefono" id="telefono" class="form-control" placeholder="Teléfono" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" value="<?php echo $vistacorreo; ?>" name="correo" id="correo" class="form-control" placeholder="Correo" required>
            </div>

            <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
            <a href="index.html" class="btn btn-secondary">Volver al inicio</a> <!-- Botón "Volver al inicio" -->
            <a href="lista_clientes_vehiculos.php" class="btn btn-info">Volver a la lista</a> <!-- Botón "Volver a la lista" -->
        </form>
        </div>

<!-- Agrega los scripts de Bootstrap al final del archivo -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
