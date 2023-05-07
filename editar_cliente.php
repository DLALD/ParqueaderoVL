<?php
require("./config.php");

$id = $_GET["id"];

$consulta = mysqli_query($conn, "SELECT * FROm clientes WHERE id_cliente = $id");
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
            Nombre: <input type="text" value="<?php echo $vistanombre; ?>" name="nombre" id="nombre" placeholder="Nombre" required>
        </label>
        <label for="apellido">
            Apellido: <input type="text" value="<?php echo $vistapellido; ?>" name="apellido" id="apellido" placeholder="Apellido" required>
        </label>
        <label for="telefono">
            Teléfono: <input type="tel" value="<?php echo $vistatel; ?>" name="telefono" id="telefono" placeholder="Teléfono" required>
        </label>
        <label for="correo">
            Correo: <input type="email" value="<?php echo $vistacorreo; ?>" name="correo" id="correo" placeholder="Correo" required>
        </label>

        <input type="submit" name="guardar" value="Guardar">
        <a href="index.html">Volver al inicio</a> <!-- Botón "Volver al inicio" -->
        <a href="lista_clientes_vehiculos.php">Volver a la lista</a> <!-- Botón "Volver a la lista" -->
    </form>
</body>

</html>