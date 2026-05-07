<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "silvercord";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

mysqli_report(MYSQLI_REPORT_OFF);
?>