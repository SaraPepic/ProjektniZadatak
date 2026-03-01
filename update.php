<?php
include "config.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ime = trim($_POST['ime']);
    $prezime = trim($_POST['prezime']);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("UPDATE users SET ime=?, prezime=?, email=? WHERE id=?");
    $stmt->bind_param("sssi", $ime, $prezime, $email, $id);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="bs">
<head>
    <meta charset="UTF-8">
    <title>Edit korisnika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3>Uredi korisnika</h3>

        <form method="POST" class="row g-3">

            <div class="col-md-4">
                <label class="form-label">Ime</label>
                <input type="text" name="ime" class="form-control" value="<?= $row['ime'] ?>" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Prezime</label>
                <input type="text" name="prezime" class="form-control" value="<?= $row['prezime'] ?>" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" required>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-success">Sačuvaj</button>
                <a href="index.php" class="btn btn-secondary">Nazad</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>