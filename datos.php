<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "suscripciones"; 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['name'];
$correo = $_POST['email'];

$sql = "INSERT INTO registros (nombre, correo) VALUES ('$nombre', '$correo')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro guardado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
