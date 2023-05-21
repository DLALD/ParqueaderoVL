<?php
require("./config.php");

$id = $_GET["id"];

// Verificar si el cliente tiene vehículos asociados antes de eliminarlo
$consultaVehiculos = mysqli_query($conn, "SELECT * FROM vehiculos WHERE id_cliente = $id");
if (mysqli_num_rows($consultaVehiculos) > 0) {
    echo "<script>window.alert('No se puede eliminar el cliente. Tiene vehículos asociados.');</script>";
    echo "<script>window.location = 'lista_clientes_vehiculos.php';</script>";
    exit;
}

// Eliminar el cliente de la base de datos
$eliminar = mysqli_query($conn, "DELETE FROM clientes WHERE id_cliente = $id");
if ($eliminar) {
    echo "<script>window.alert('Cliente eliminado correctamente');</script>";
    echo "<script>window.location = 'lista_clientes_vehiculos.php';</script>";
} else {
    echo "Error al eliminar el cliente";
}
?>
