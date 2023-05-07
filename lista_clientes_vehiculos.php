<?php
require("./config.php");

// Obtener la lista de clientes y sus vehículos registrados
$sql = "SELECT clientes.id_cliente, clientes.nombre, clientes.apellido, vehiculos.placa, vehiculos.marca, vehiculos.modelo, vehiculos.color, vehiculos.puesto, vehiculos.id
        FROM clientes
        INNER JOIN vehiculos ON clientes.id_cliente = vehiculos.id_cliente";
$resultado = mysqli_query($conn, $sql);

// Verificar si hay registros encontrados
if (mysqli_num_rows($resultado) > 0) {
    echo "<h2>Lista de clientes y vehículos registrados:</h2>";
    echo "<table>";
    echo "<thead>";
    echo "<tr><th>Nombre</th><th>Apellido</th><th>Placa</th><th>Marca</th><th>Modelo</th><th>Color</th><th>Puesto</th><th>Editar cliente</th><th>Editar vehículo</th></tr>";
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
        echo "<td>" . $fila["puesto"] . "</td>";
        echo "<td>" . "<a href='editar_cliente.php?id=" . $fila["id_cliente"] . "'>Editar</a>" . "</td>";
        echo "<td>" . "<a href='editar_vehiculo.php?id=" . $fila["id"] . "'>Editar</a>" . "</td>";
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
