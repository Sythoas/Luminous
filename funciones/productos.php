<?php
    include('admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/LUMINOUS/css/productos.css">
</head>
<body>
    <?php
        include('abrir_conexion.php'); // Asegúrate de que este archivo incluya la conexión a tu base de datos

        $sql = "SELECT id_Producto, Caracteristicas, Comentarios, Precio FROM productos;";
        $result = mysqli_query($conn, $sql); // Ejecuta la consulta

        if ($result) {
            // Si la consulta fue exitosa, muestra los datos en una tabla
            echo "<table>";
            echo "<tr><th></th><th>Características</th><th>Comentarios</th><th>Precio</th><th>Acciones</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><form action=\"/LUMINOUS/funciones/clientes.php\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"product_id\" value=\"" . $row['id_Producto'] . "\">";
                echo "<button type=\"submit\">Cliente</button>";
                echo "</form></td>";
                echo "<td>" . $row['Caracteristicas'] . "</td>";
                echo "<td>" . $row['Comentarios'] . "</td>";
                echo "<td>" . $row['Precio'] . "</td>";
                echo "<td><a class=\"editar\" href=\"/LUMINOUS/funciones/editar_productos.php?id=" . $row['id_Producto'] . "\">Editar</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            // Si hubo un error en la consulta, muestra un mensaje de error
            echo "Error al obtener los datos de la base de datos.";
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conn);
    ?>
    <script>
        // Verifica si hay un mensaje de confirmación en la URL
    const urlParams = new URLSearchParams(window.location.search);
    const mensaje = urlParams.get('mensaje');

    if (mensaje === 'actualizado') {
            // Muestra el mensaje de confirmación
            const confirmacion = confirm('Se logró actualizar');
    }
    </script>
</body>
</html>
