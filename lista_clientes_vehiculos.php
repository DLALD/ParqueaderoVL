
<html>

<head>
    <title>Lista de clientes y vehículos</title>
    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Lista de clientes y vehículos registrados:</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                    <th>Puesto</th>
                    <th>Editar cliente</th>
                    <th>Editar vehículo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("./config.php");

                // Obtener la lista de clientes y sus vehículos registrados
                $sql = "SELECT clientes.id_cliente, clientes.nombre, clientes.apellido, vehiculos.placa, vehiculos.marca, vehiculos.modelo, vehiculos.color, vehiculos.puesto, vehiculos.id
                        FROM clientes
                        INNER JOIN vehiculos ON clientes.id_cliente = vehiculos.id_cliente";
                $resultado = mysqli_query($conn, $sql);

                // Verificar si hay registros encontrados
                if (mysqli_num_rows($resultado) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["apellido"] . "</td>";
                        echo "<td>" . $fila["placa"] . "</td>";
                        echo "<td>" . $fila["marca"] . "</td>";
                        echo "<td>" . $fila["modelo"] . "</td>";
                        echo "<td>" . $fila["color"] . "</td>";
                        echo "<td>" . $fila["puesto"] . "</td>";
                        echo "<td>" . "<a href='editar_cliente.php?id=" . $fila["id_cliente"] . "' class='btn btn-primary'>Editar</a>" . "</td>";
                        echo "<td>" . "<a href='editar_vehiculo.php?id=" . $fila["id"] . "' class='btn btn-primary'>Editar</a>" . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No se encontraron registros de clientes y vehículos.</td></tr>";
                }

                // Cerrar la conexión a la base de datos
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <br>
        <a href='index.html' class='btn btn-secondary'>Volver</a>
    </div>

    <!-- Agrega los scripts de Bootstrap al final del archivo -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>