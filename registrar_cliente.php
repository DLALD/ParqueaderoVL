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
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];

// Validar los campos del formulario
if (empty($nombre) || empty($apellido) || empty($correo) || empty($telefono)) {
    echo "Por favor complete todos los campos.";
} else {
    // Insertar los datos en la tabla "clientes"
    $sql = "INSERT INTO clientes (nombre, apellido, correo, telefono) VALUES ('$nombre', '$apellido', '$correo', '$telefono')";
    if (mysqli_query($conn, $sql)) {
        echo "Cliente registrado correctamente.";
    } else {
        echo "Error al registrar el cliente: " . mysqli_error($conn);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
