<?php
require("./config.php");

if (isset($_POST["enviar"])) {
    // Recibir los datos del formulario
    $placa = $_POST["placa"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $color = $_POST["color"];
    $id_cliente = intval($_POST["cliente"]);

    // Validar los campos del formulario
    if (empty($placa) || empty($marca) || empty($modelo) || empty($color) || empty($id_cliente)) {
        echo "Por favor complete todos los campos.";
    } else {
        // Insertar los datos en la tabla "vehiculos"
        $sql = "INSERT INTO vehiculos (placa, marca, modelo, color, id_cliente) VALUES ('$placa', '$marca', '$modelo', '$color', '$id_cliente')";
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
</head>

<body>
    <h2>Registrar Vehiculo</h2>
    <form method="post" action="">
        <label>Placa:</label>
        <input type="text" name="placa" required><br><br>
        <label>Marca:</label>
        <input type="text" name="marca" required><br><br>
        <label>Modelo:</label>
        <input type="text" name="modelo" required><br><br>
        <label>Color:</label>
        <input type="text" name="color" required><br><br>
        <label>Cliente:</label>
        <select name="cliente">
            <option value="">Seleccionar cliente</option>
            <?php
            // Obtener los dueños registrados en la base de datos
            $sql = "SELECT * FROM clientes";
            $resultado = mysqli_query($conn, $sql);
            while ($cliente = mysqli_fetch_array($resultado)) {
                echo "<option value='" . $cliente['id_cliente'] . "'>" . $cliente['id_cliente'] . "</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" name="enviar" value="Registrar">
    </form>
</body>

</html>