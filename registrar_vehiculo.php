<?php
$host = "localhost";
$port = "3306";
$username = "root";
$password = "";
$dbname = "parqueadero";

// Conexión a la base de datos
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa.";

// Recibir los datos del formulario
$placa = $_POST["placa"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$color = $_POST["color"];
$id_cliente = $_POST["cliente"];

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

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
