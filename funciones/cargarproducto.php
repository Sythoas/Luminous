<?php
include('abrir_conexion.php'); 
$datos_guardados_exitosamente = false;
// Obtén los datos del formulario
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
$estilos = isset($_POST['estilo']) ? $_POST['estilo'] : array(); // Inicializa como un array vacío
$metopago = isset($_POST['metopago']) ? $_POST['metopago'] : '';

$estilos_string = implode(", ", $estilos);
// Inserta los datos en la tabla 'clientes'
$sql = "INSERT INTO clientes (NomyApe, Correo, MetodoDePago) VALUES ('$nombre', '$email', '$metopago')";
$sql2 = "INSERT INTO productos (Caracteristicas, Comentarios) VALUES ('$estilos_string', '$comment')";

if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE) {
    $datos_guardados_exitosamente = true;
    echo "Los datos se han insertado correctamente en ambas tablas";
} else {
    echo "Error al insertar los datos: " . $conn->error;
}
if ($datos_guardados_exitosamente) {
    // Redirige al usuario a la página principal con un mensaje
    header("Location: /LUMINOUS/index.html?mensaje=pedido_guardado");
    exit; //salir del script para evitar que se siga ejecutando
} else {
    // Si hay un error al guardar los datos, puedes mostrar un mensaje de error
    header("Location: /LUMINOUS/pedido.html?mensaje=no_guardado");
    exit; //salir del script para evitar que se siga ejecutando
}
// Cierra la conexión
$conn->close();
?>