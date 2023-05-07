<?php
require("./config.php");

$id = $_GET["id"];

$consulta = mysqli_query($conn, "SELECT * FROm vehiculos WHERE id = $id");
if(mysqli_num_rows($consulta) > 0) {
    while($fila = mysqli_fetch_assoc($consulta)) {
        $vistaplaca = $fila["placa"];
        $vistamarca = $fila["marca"];
        $vistamodelo = $fila["modelo"];
        $vistacolor = $fila["color"];
        $vistapuesto = $fila["puesto"];
        $vistacliente = $fila["id_cliente"];
    }
}

if (isset($_POST["guardar"])) {
    $placa = $_POST["placa"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $color = $_POST["color"];
    $puesto = $_POST["puesto"];
    $cliente = intval($_POST["cliente"]);

    $update = mysqli_query($conn, "UPDATE vehiculos SET placa = '$placa', marca = '$marca', modelo = '$modelo', color = '$color', puesto = '$puesto', id_cliente = '$cliente' WHERE id = $id");
    if($update) {
        echo "<script>window.alert('Datos actualizados correctamente');</script>";
        echo "<script>window.location = 'editar_vehiculo.php?id=".$id."';</script>";
       
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

    <script>
        let selector =document.querySelector("#cliente");

    </script>
</head>

<body>
    <form action="" method="post">

        <label>Placa:</label>
        <input type="text" name="placa" value="<?php echo $vistaplaca; ?>" required><br><br>
        <label>Marca:</label>
        <input type="text" name="marca" value="<?php echo $vistamarca; ?>" required><br><br>
        <label>Modelo:</label>
        <input type="text" name="modelo" value="<?php echo $vistamodelo; ?>" required><br><br>
        <label>Color:</label>
        <input type="text" name="color" value="<?php echo $vistacolor; ?>" required><br><br>
        <label>Puesto:</label>
        <input type="text" name="puesto" value="<?php echo $vistapuesto; ?>" required><br><br>
        <label>Cliente:</label>
        <select name="cliente" id="cliente>
            <option value="">Seleccionar cliente</option>
            <?php
            // Obtener los dueños registrados en la base de datos
            $sql = "SELECT * FROM clientes";
            $resultado = mysqli_query($conn, $sql);
            $seleccionado = "";
            while ($cliente = mysqli_fetch_array($resultado)) {
                if($cliente["id_cliente"] == $vistacliente) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo "<option value='" . $cliente['id_cliente'] . "' ".$seleccionado.">" . $cliente['nombre'] . " " . $cliente['apellido'] . "</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" name="guardar" value="Guardar">
        <a href="index.html">Volver al inicio</a> <!-- Botón "Volver al inicio" -->
        <a href="lista_clientes_vehiculos.php">Volver a la lista</a> <!-- Botón "Volver a la lista" -->
    </form>
</body>

</html>