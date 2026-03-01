<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php_mysql_backend";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Konekcija nije uspjela: " . $conn->connect_error);
}
?>