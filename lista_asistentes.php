<?php
require("./config.php");

// Obtener la lista de asistentes de la base de datos
$sql = "SELECT * FROM asistentes";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asistentes</title>
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
</head>

<body>
    <div class="container">
        <h2>Lista de Asistentes</h2>

        <table class="table table-bordered">
            <thead class="thead-dark text-center">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Salario</th>
                    <th>Editar Información</th>
                    <th>Eliminar Asistente</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($asistente = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $asistente["nombre"]; ?></td>
                        <td><?php echo $asistente["apellido"]; ?></td>
                        <td><?php echo $asistente["Cedula"]; ?></td>
                        <td><?php echo $asistente["telefono"]; ?></td>
                        <td><?php echo $asistente["correo"]; ?></td>
                        <td><?php echo $asistente["salario"]; ?></td>
                        <td>
                        <a href="editar_asistentes.php?id=<?php echo $asistente['id']; ?>"><img src='icons/edit.png' alt='Editar'></a>
                                             

                        <td>
                            <a href="eliminar_asistente.php?id=<?php echo $asistente['id']; ?>"><img src='icons/delete.png' alt='Eliminar'></a></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.html" class="btn btn-secondary">Volver</a>
        <a href="registrar_asistente.php" class="btn btn-primary">Registrar Asistente</a> <!-- Botón "Registrar Asistente" -->
    </div>

    <!-- Agregar los scripts de JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
