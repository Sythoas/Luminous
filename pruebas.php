<?php
include('abrir_conexion.php');
// Obtén los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$estilos = $_POST['estilo'];
$metopago = $_POST['metopago'];

$estilos_string = implode(", ", $estilos);


// Inserta los datos en la base de datos
$sql = "INSERT INTO clientes (NomyApe, Correo, MetodoDePago) VALUES ('$nombre', '$email', '$metopago')";
$sql2 = "INSERT INTO productos (Caracteristicas, Comentarios) VALUES ('$estilos_string', '$comment')";

if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
    echo "Los datos se han insertado correctamente en ambas tablas";
} else {
    echo "Error al insertar los datos: " . $conn->error;
}

// Cierra la conexión
$conn->close();
?>


<?php



include('abrir_conexion.php'); // Asegúrate de que este archivo esté en el mismo directorio

// Obtén los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$estilos = $_POST['estilo'];
$metopago = $_POST['metopago'];

$estilos_string = implode(", ", $estilos);

// Inserta los datos en la tabla 'clientes'
$sql_clientes = "INSERT INTO clientes (NomyApe, Correo, MetodoDePago) VALUES ('$nombre', '$email', '$metopago')";
if ($conn->query($sql_clientes) === TRUE) {
    $last_insert_id = $conn->insert_id;
    // Inserta los datos en la tabla 'productos'
    $sql_productos = "INSERT INTO productos (Caracteristicas, Comentarios, ClienteID) VALUES ('$estilos_string', '$comment', $last_insert_id)";
    if ($conn->query($sql_productos) === TRUE) {
        echo "Los datos se han insertado correctamente en ambas tablas";
    } else {
        echo "Error al insertar los datos en la tabla 'productos': " . $conn->error;
    }
} else {
    echo "Error al insertar los datos en la tabla 'clientes': " . $conn->error;
}

// Cierra la conexión
$conn->close();
?>


// Verifica si hay un mensaje de confirmación en la URL
        const urlParams = new URLSearchParams(window.location.search);
        const mensaje = urlParams.get('mensaje');

        if (mensaje === 'pedido_guardado') {
            // Muestra el mensaje de confirmación
            const mensajeDiv = document.getElementById('mensaje-confirmacion');
            mensajeDiv.textContent = '¡Pedido guardado correctamente!';
            mensajeDiv.style.color = 'green';

            // Agrega un botón para cerrar el mensaje
            const cerrarBoton = document.createElement('button');
            cerrarBoton.textContent = 'Cerrar';
            cerrarBoton.addEventListener('click', () => {
                mensajeDiv.style.display = 'none'; // Oculta el mensaje
                // También puedes eliminarlo del DOM si prefieres:
                // mensajeDiv.remove();
            });
            mensajeDiv.appendChild(cerrarBoton);
        }


<?php
    include('includes/abrir_conexion.php');
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    // Obtener el horario actual
    $horaActual = date('H:i:s');
    //select c.id_colectivo, c.colectivo, c.cara, h.horario, h.id_horario from colectivos c join horarios h on c.id_colectivo=h.id_colectivo where h.horario >= ? ORDER BY h.horario LIMIT 3;

    //SELECT * FROM register WHERE TImeBus >= ? ORDER BY TImeBus LIMIT 3

    $sql = "select c.id_colectivo, c.colectivo, c.cara, h.horario, h.id_horario from colectivos c join horarios h on c.id_colectivo=h.id_colectivo where h.horario >= ? ORDER BY h.horario LIMIT 3;";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $horaActual);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo ',' . $row['cara'];
        }
    } else {
        echo "No se encontraron resultados.";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/productos.css">
</head>
<body>
    <?php
        include('abrir_conexion.php'); // Asegúrate de que este archivo incluya la conexión a tu base de datos

        $sql = "SELECT id_Producto, Caracteristicas, Comentarios, Precio FROM productos;";
        $result = mysqli_query($conn, $sql); // Ejecuta la consulta

        if ($result) {
            // Si la consulta fue exitosa, muestra los datos en una tabla
            echo "<table>";
            echo "<tr><th>ID Producto</th><th>Características</th><th>Comentarios</th><th>Precio</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_Producto'] . "</td>";
                echo "<td>" . $row['Caracteristicas'] . "</td>";
                echo "<td>" . $row['Comentarios'] . "</td>";
                echo "<td>" . $row['Precio'] . "</td>";
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
</body>
</html>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/productos.css">
</head>
<body>
    <?php
        include('abrir_conexion.php'); // Asegúrate de que este archivo incluya la conexión a tu base de datos

        $sql = "SELECT id_Producto, Caracteristicas, Comentarios, Precio FROM productos;";
        $result = mysqli_query($conn, $sql); // Ejecuta la consulta

        if ($result) {
            // Si la consulta fue exitosa, muestra los datos en una tabla
            echo "<table>";
            echo "<tr><th></th><th>Características</th><th>Comentarios</th><th>Precio</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><button onclick=\"alert('Funcionalidad del botón aquí');\">" . $row['id_Producto'] . "</button></td>";
                echo "<td>" . $row['Caracteristicas'] . "</td>";
                echo "<td>" . $row['Comentarios'] . "</td>";
                echo "<td>" . $row['Precio'] . "</td>";
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
</body>
</html>

<?php
    include('admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="LUMINOUS/img/favicon-16x16.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luminous</title>
    <link rel="stylesheet" type="text/css" href="/LUMINOUS/css/productos.css">
</head>
<?php
    // clientes.php
    // Asegúrate de incluir la conexión a la base de datos aquí
    include('abrir_conexion.php');
    if (isset($_POST['product_id'])) {
        // Obtén el ID del producto enviado desde el botón
        $product_id = $_POST['product_id'];

        // Realiza una consulta a la base de datos utilizando el ID
        $sql = "SELECT NomyApe, Correo, MetodoDePago FROM clientes WHERE id_Cliente = $product_id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Procesa los resultados de la consulta (por ejemplo, muestra los datos)
            while ($row = mysqli_fetch_assoc($result)) {
                // Aquí puedes acceder a los campos específicos del cliente
                $nomyape = $row['NomyApe'];
                $correo = $row['Correo'];
                $metododepago = $row['MetodoDePago'];

                // Muestra los datos del cliente
                echo "<h2>Datos del Cliente (ID Producto: $product_id)</h2>";
                echo "<p><strong>Nombre y Apellido:</strong> $nomyape</p>";
                echo "<p><strong>Correo Electrónico:</strong> $correo</p>";
                echo "<p><strong>Método de Pago:</strong> $metododepago</p>";
            }
        } else {
            echo "Error al obtener los datos de la base de datos.";
        }
    } else {
        echo "No se proporcionó un ID de producto válido.";
    }
    // Cierra la conexión a la base de datos
    mysqli_close($conn);
?>

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
            echo "<tr><th></th><th>Características</th><th>Comentarios</th><th>Precio</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><form action=\"/LUMINOUS/funciones/clientes.php\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"product_id\" value=\"" . $row['id_Producto'] . "\">";
                echo "<button type=\"submit\">Cliente</button>";
                echo "</form></td>";
                echo "<td>" . $row['Caracteristicas'] . "</td>";
                echo "<td>" . $row['Comentarios'] . "</td>";
                echo "<td>" . $row['Precio'] . "</td>";
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
</body>
</html>


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
</body>
</html>
