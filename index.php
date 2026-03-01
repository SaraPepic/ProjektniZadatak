<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="bs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL CRUD</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h1 class="text-center mb-4">User Management System</h1>

    <!-- ================== FORMA ================== -->
    <div class="card shadow p-4 mb-5">
        <h4>Dodaj novog korisnika</h4>

        <form action="create.php" method="POST" class="row g-3">

            <div class="col-md-4">
                <label class="form-label">Ime</label>
                <input type="text" name="ime" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Prezime</label>
                <input type="text" name="prezime" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    Dodaj korisnika
                </button>
            </div>

        </form>
    </div>

    <!-- ================== TABELA ================== -->
    <div class="card shadow p-4">
        <h4>Lista korisnika</h4>

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Email</th>
                    <th>Datum</th>
                    <th>Akcija</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM users ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['ime']}</td>
                        <td>{$row['prezime']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a href='update.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>Nema korisnika</td></tr>";
            }

            ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>