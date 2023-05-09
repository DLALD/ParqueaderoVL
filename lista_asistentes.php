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
</head>

<body>
    <div class="container">
        <h2>Lista de Asistentes</h2>
       

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Salario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($asistente = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $asistente["nombre"]; ?></td>
                        <td><?php echo $asistente["apellido"]; ?></td>
                        <td><?php echo $asistente["telefono"]; ?></td>
                        <td><?php echo $asistente["correo"]; ?></td>
                        <td><?php echo $asistente["salario"]; ?></td>
                        <td>
                            <a href="editar_asistentes.php?id=<?php echo $asistente['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href='index.html' class='btn btn-secondary'>Volver</a>
        <a href="registrar_asistente.php" class="btn btn-primary ">Registrar Asistente</a> <!-- Botón "Registrar Asistente" -->
       
    </div>

    <!-- Agregar los scripts de JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
