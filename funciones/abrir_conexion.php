<?php
// Conecta a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Luminous";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}
?>
