<?php
require("./config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Dueños</title>
    <!-- Agregar enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #E7830D;
        }
        table {
            background-color: #FFFCF9;
        }
        th {
            background-color: #343A40;
            color: white;
        }
        td {
            background-color: #F8F9FA;
            text-align: center; /* Centrar el contenido de las celdas */
        }
    </style>
    <style>
        td {
            background-color: #F8F9FA;
            text-align: center; /* Centrar el contenido de las celdas */
        }
    </style>
</head>

<body>
    <div class="container">
        <center><h2>Listado de Dueños</h2></center>
        <table class="table table-bordered">
            <thead class="thead-dark text-center">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Editar </th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consultar los datos de los dueños
                $sql = "SELECT * FROM dueños";
                $resultado = mysqli_query($conn, $sql);

                // Verificar si se encontraron resultados
                if (mysqli_num_rows($resultado) > 0) {
                    // Recorrer los resultados y mostrar los datos
                    while ($dueño = mysqli_fetch_assoc($resultado)) {
                        $id = $dueño['id'];
                        $nombre = $dueño['nombre'];
                        $apellido = $dueño['apellido'];
                        $cedula = $dueño['Cedula'];
                        $telefono = $dueño['telefono'];
                        $correo = $dueño['correo'];

                        // Imprimir cada fila de la tabla
                        echo "<tr>";
                        echo "<td>" . $nombre . "</td>";
                        echo "<td>" . $apellido . "</td>";
                        echo "<td>" . $cedula . "</td>";
                        echo "<td>" . $telefono . "</td>";
                        echo "<td>" . $correo . "</td>";
                        echo "<td>";
                        echo "<a href='editar_dueño.php?id=".$id."'><img src='icons/edit.png' alt='Editar'></a>"; // Enlace para editar con icono
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Mostrar mensaje si no se encontraron dueños en la base de datos
                    echo "<tr><td colspan='6'>No se encontraron dueños en la base de datos.</td></tr>";
                }

                // Cerrar la conexión a la base de datos
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <a href='index.html' class='btn btn-secondary'>Volver</a>
       
    </div>

    <!-- Agregar los scripts de JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
