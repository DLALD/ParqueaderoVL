<?php
require("./config.php");

// Obtener la lista de clientes y sus vehículos registrados
$sql = "SELECT c.nombre, c.apellido, v.placa, v.marca, v.modelo, v.color
        FROM clientes c
        INNER JOIN vehiculos v ON c.id_cliente = v.id_cliente";
$resultado = mysqli_query($conn, $sql);

// Verificar si hay registros encontrados
if (mysqli_num_rows($resultado) > 0) {
    echo "<h2>Lista de clientes y vehículos registrados:</h2>";
    echo "<table>";
    echo "<thead>";
    echo "<tr><th>Nombre</th><th>Apellido</th><th>Placa</th><th>Marca</th><th>Modelo</th><th>Color</th></tr>";
    echo "</thead>";
    echo "<tbody>";

    // Recorrer los resultados y mostrar los datos en la tabla
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["apellido"] . "</td>";
        echo "<td>" . $fila["placa"] . "</td>";
        echo "<td>" . $fila["marca"] . "</td>";
        echo "<td>" . $fila["modelo"] . "</td>";
        echo "<td>" . $fila["color"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "No se encontraron registros de clientes y vehículos.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
