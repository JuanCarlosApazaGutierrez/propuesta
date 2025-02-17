<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "asproseg_bd_suscripciones"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$fullName = $_POST['fullName'];
$ci = $_POST['ci'];
$birthdate = $_POST['birthdate'];
$address = $_POST['address'];
$city = $_POST['city'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$position = $_POST['position'];
$company = $_POST['company'];

$sql = "INSERT INTO asproseg_bd_registros_info (fullName, ci, birthdate, address, city, email, phone, position, company) 
        VALUES ('$fullName', '$ci', '$birthdate', '$address', '$city', '$email', '$phone', '$position', '$company')";

if ($conn->query($sql) === TRUE) {
    echo "registro guardado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
