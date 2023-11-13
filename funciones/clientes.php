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
        echo "<table>";
        echo "<tr><th>Nombre y Apellido</th><th>Correo Electrónico</th><th>Método de Pago</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            // Aquí puedes acceder a los campos específicos del cliente
            $nomyape = $row['NomyApe'];
            $correo = $row['Correo'];
            $metododepago = $row['MetodoDePago'];

            // Muestra los datos del cliente en una fila de la tabla
            echo "<tr>";
            echo "<td>$nomyape</td>";
            echo "<td>$correo</td>";
            echo "<td>$metododepago</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Error al obtener los datos de la base de datos.";
    }
} else {
    echo "No se proporcionó un ID de producto válido.";
}

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>
