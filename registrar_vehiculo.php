<?php
require("./config.php");

if (isset($_POST["enviar"])) {
    // Recibir los datos del formulario
    $placa = $_POST["placa"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $color = $_POST["color"];
    $puesto = $_POST["puesto"];
    $id_cliente = intval($_POST["cliente"]);

    // Validar los campos del formulario
    if (empty($placa) || empty($marca) || empty($modelo) || empty($color) || empty($puesto) || empty($id_cliente)) {
        echo "Por favor complete todos los campos.";
    } else {
        // Insertar los datos en la tabla "vehiculos"
        $sql = "INSERT INTO vehiculos (placa, marca, modelo, color, puesto, id_cliente) VALUES ('$placa', '$marca', '$modelo', '$color', '$puesto', '$id_cliente')";
        if (mysqli_query($conn, $sql)) {
            echo "Vehículo registrado correctamente.";
        } else {
            echo "Error al registrar el vehículo: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrar Vehiculo</title>
    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Registrar Vehiculo</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="placa">Placa:</label>
                <input type="text" class="form-control" name="placa" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" name="modelo" required>
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" name="color" required>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto:</label>
                <input type="text" class="form-control" name="puesto" required>
            </div>
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <select class="form-control" name="cliente">
                    <option value="">Seleccionar cliente</option>
                    <?php
                    // Obtener los dueños registrados en la base de datos
                    $sql = "SELECT * FROM clientes";
                    $resultado = mysqli_query($conn, $sql);
                    while ($cliente = mysqli_fetch_array($resultado)) {
                        echo "<option value='" . $cliente['id_cliente'] . "'>" . $cliente['nombre'] . " " . $cliente['apellido'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="enviar">Registrar Vehiculo</button>
            <a href="index.html" class="btn btn-secondary">Volver al inicio</a> <!-- Botón "Volver al inicio" -->
            <?php
        if (isset($_POST["enviar"])) {
            echo "<a href='lista_clientes_vehiculos.php'' class='btn btn-info'>Ir a la lista</a>"; // Botón "Registrar vehículo"
        }
        ?>
        </form>
    </div>

    <!-- Agrega los scripts de Bootstrap al final del archivo -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

