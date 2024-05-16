<?php
$server = "203.188.54.7";
$db_username = "inno094";
$db_password = "P06D245";
$sid = "database";
$port = 1521;
$Data;
try {
    $conn = new PDO("oci:dbname=203.188.54.7/database;charset=UTF8", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Success";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
} ?>