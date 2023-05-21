<?php
require("./config.php");

$id = $_GET["id"];

// Eliminar el vehículo de la base de datos
$eliminar = mysqli_query($conn, "DELETE FROM vehiculos WHERE id = $id");
if ($eliminar) {
    echo "<script>window.alert('Vehículo eliminado correctamente');</script>";
    echo "<script>window.location = 'lista_clientes_vehiculos.php';</script>";
} else {
    echo "Error al eliminar el vehículo";
}
?>
