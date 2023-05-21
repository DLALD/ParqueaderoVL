<?php
require("./config.php");

$id = $_GET["id"];

$consulta = mysqli_query($conn, "SELECT * FROM vehiculos WHERE id = $id");
if (mysqli_num_rows($consulta) > 0) {
    while ($fila = mysqli_fetch_assoc($consulta)) {
        $vistaplaca = $fila["placa"];
        $vistamarca = $fila["marca"];
        $vistamodelo = $fila["modelo"];
        $vistacolor = $fila["color"];
        $vistacliente = $fila["id_cliente"];
    }
}

if (isset($_POST["guardar"])) {
    $placa = $_POST["placa"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $color = $_POST["color"];
    $cliente = intval($_POST["cliente"]);

    $update = mysqli_query($conn, "UPDATE vehiculos SET placa = '$placa', marca = '$marca', modelo = '$modelo', color = '$color', id_cliente = '$cliente' WHERE id = $id");
    if ($update) {
        echo "<script>window.alert('Datos actualizados correctamente');</script>";
        echo "<script>window.location = 'lista_clientes_vehiculos.php?id=" . $id . "';</script>";
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
    <title>Editar vehículo | <?php echo $id; ?></title>
    <!-- Agrega los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #858584;
        }
    </style>
</head>

<body>
    <div class="container">
    <Center><h2>Editar Informacion del vehiculo </h2></Center>
        <form action="" method="post">
            <div class="form-group">
                <label for="placa">Placa:</label>
                <input type="text" name="placa" class="form-control" value="<?php echo $vistaplaca; ?>" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" class="form-control" value="<?php echo $vistamarca; ?>" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" class="form-control" value="<?php echo $vistamodelo; ?>" required>
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" name="color" class="form-control" value="<?php echo $vistacolor; ?>" required>
            </div>
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <select name="cliente" id="cliente" class="form-control">
                    <option value="">Seleccionar cliente</option>
                    <?php
                    // Obtener los dueños registrados en la base de datos
                    $sql = "SELECT * FROM clientes";
                    $resultado = mysqli_query($conn, $sql);
                    $seleccionado = "";
                    while ($cliente = mysqli_fetch_array($resultado)) {
                        if ($cliente["id_cliente"] == $vistacliente) {
                            $seleccionado = "selected";
                        } else {
                            $seleccionado = "";
                        }
                        echo "<option value='" . $cliente['id_cliente'] . "' " . $seleccionado . ">" . $cliente['nombre'] . " " . $cliente['apellido'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
            <a href="index.html" class="btn btn-secondary">Volver al inicio</a> <!-- Botón "Volver al inicio" -->
            <a href="lista_clientes_vehiculos.php" class="btn btn-secondary">Volver a la lista</a> <!-- Botón "Volver a la lista" -->
        </form>
    </div>

    <!-- Agrega los scripts de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
