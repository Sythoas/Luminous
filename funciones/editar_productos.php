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
    // editar_producto.php

    // Incluye el archivo de conexión a la base de datos
    include('abrir_conexion.php');

    // Verifica si se envió un formulario de edición
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtén el ID del producto desde la URL (pasado como parámetro)
        $product_id = $_GET['id'];

        // Recupera los datos del formulario de edición (puedes agregar más campos según tus necesidades)
        $new_caracteristicas = $_POST['caracteristicas'];
        $new_comentarios = $_POST['comentarios'];
        $new_precio = $_POST['precio'];

        // Actualiza los datos del producto en la base de datos
        $update_sql = "UPDATE productos SET Caracteristicas = '$new_caracteristicas', Comentarios = '$new_comentarios', Precio = '$new_precio' WHERE id_Producto = $product_id";
        $update_result = mysqli_query($conn, $update_sql);

        if ($update_result) {
            echo "Datos actualizados correctamente.";
            header("Location: /LUMINOUS/funciones/productos.php?mensaje=actualizado");
        } else {
            echo "Error al actualizar los datos.";
            header("Location: /LUMINOUS/funciones/editar_productos.php?mensaje=no_actualizado");
        }
    } else {
        // Si no se envió el formulario, muestra los datos actuales del producto
        $product_id = $_GET['id'];
        $select_sql = "SELECT Caracteristicas, Comentarios, Precio FROM productos WHERE id_Producto = $product_id";
        $select_result = mysqli_query($conn, $select_sql);
        $row = mysqli_fetch_assoc($select_result);

        // Muestra el formulario de edición
        echo "<form action=\"/LUMINOUS/funciones/editar_productos.php?id=$product_id\" method=\"POST\">";
        echo "<table>"; // Abre la etiqueta de la tabla
        
        // Filas y celdas existentes
        echo "<tr><td>Características:</td><td><input type=\"text\" name=\"caracteristicas\" value=\"" . $row['Caracteristicas'] . "\"></td></tr>";
        echo "<tr><td>Comentarios:</td><td><input type=\"text\" name=\"comentarios\" value=\"" . $row['Comentarios'] . "\"></td></tr>";
        echo "<tr><td>Precio:</td><td><input type=\"text\" name=\"precio\" value=\"" . $row['Precio'] . "\"></td></tr>";
        
        // Celda con colspan para el botón
        echo "<tr><td colspan=\"2\"><button class=\"actualizar\" type=\"submit\">Actualizar</button></td></tr>";
        
        echo "</table>"; // Cierra la etiqueta de la tabla
        echo "</form>";
        
        
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conn);
?>
<script>
        // Verifica si hay un mensaje de confirmación en la URL
    const urlParams = new URLSearchParams(window.location.search);
    const mensaje = urlParams.get('mensaje');

    if (mensaje === 'no_actualizado') {
            // Muestra el mensaje de confirmación
            const confirmacion = confirm('No se pudo guardar el pedido, intentalo nuevamente');
    }
</script>

