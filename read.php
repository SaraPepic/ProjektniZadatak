<?php
include "config.php";

$sql = "SELECT * FROM users ORDER BY created_at DESC";
$result = $conn->query($sql);
?>