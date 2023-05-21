<?php
require("./config.php");

$id = $_GET["id"];

$consulta = mysqli_query($conn, "SELECT * FROM asistentes WHERE id = $id");
if (mysqli_num_rows($consulta) > 0) {
    while ($fila = mysqli_fetch_assoc($consulta)) {
        $nombre = $fila["nombre"];
        $apellido = $fila["apellido"];
        $cedula = $fila["Cedula"];
        $telefono = $fila["telefono"];
        $correo = $fila["correo"];
        $salario = $fila["salario"];
    }
}

if (isset($_POST["guardar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["Cedula"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $salario = $_POST["salario"];

    $update = mysqli_query($conn, "UPDATE asistentes SET nombre = '$nombre', apellido = '$apellido', Cedula = '$cedula', telefono = '$telefono', correo = '$correo', salario = '$salario' WHERE id = $id");
    if ($update) {
        echo "<script>window.alert('Datos actualizados correctamente');</script>";
        echo "<script>window.location = 'lista_asistentes.php?id=" . $id . "';</script>";
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
    <title>Editar Asistente | <?php echo $id; ?></title>
    <!-- Agregar los estilos de Bootstrap -->
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
    <Center><h2>Editar Asistente</h2></Center>
        <form action="" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" name="apellido" value="<?php echo $apellido; ?>" required>
            </div>
            <div class="form-group">
                <label for="Cedula">Cédula:</label>
                <input type="text" class="form-control" name="Cedula" value="<?php echo $cedula; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" name="correo" value="<?php echo $correo; ?>" required>
            </div>
            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="text" class="form-control" name="salario" value="<?php echo $salario; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
            <a href="lista_asistentes.php" class="btn btn-secondary">Volver a la lista</a>
        </form>
    </div>

    <!-- Agregar los scripts de JavaScript de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
