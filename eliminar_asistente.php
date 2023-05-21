<?php
require("./config.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Verificar si el asistente existe en la base de datos
    $consulta = mysqli_query($conn, "SELECT * FROM asistentes WHERE id = $id");
    if (mysqli_num_rows($consulta) > 0) {
        // Eliminar el asistente de la base de datos
        $eliminar = mysqli_query($conn, "DELETE FROM asistentes WHERE id = $id");
        if ($eliminar) {
            echo "<script>window.alert('Asistente eliminado correctamente');</script>";
            echo "<script>window.location = 'lista_asistentes.php';</script>";
        } else {
            echo "Error al eliminar el asistente";
        }
    } else {
        echo "El asistente no existe en la base de datos";
    }
} else {
    echo "ID de asistente no especificado";
}
?>
