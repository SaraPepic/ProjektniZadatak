<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ime = trim($_POST['ime']);
    $prezime = trim($_POST['prezime']);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("INSERT INTO users (ime, prezime, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $ime, $prezime, $email);

    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
}
?>