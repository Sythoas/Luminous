<?php
include('abrir_conexion.php');

$Nombre = $_POST['nombre'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$estilos = $_POST['estilo'];
$metopago = $_POST['metopago'];

$estilos_string = implode(", ", $estilos);


// Inserta los datos en la base de datos
$sql = "INSERT INTO clientes (NomyApe, Correo, MetodoDePago) VALUES ('$nombre', '$email', '$metopago')";
$sql2 = "INSERT INTO productos (Caracteristicas, Comentarios) VALUES ('$estilos_string', '$comment')";

if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
    echo "Los datos se han insertado correctamente en ambas tablas";
} else {
    echo "Error al insertar los datos: " . $conn->error;
}

// Cierra la conexión
$conn->close();
?>
