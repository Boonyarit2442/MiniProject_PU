<?php
$server         = "203.188.54.7";
$db_username    = "inno094";
$db_password    = "P06D245";
$service_name   = "";
$sid            = "database";
$port           = 1521;
$dbtns          = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $server)(PORT = $port)) (CONNECT_DATA = (SERVICE_NAME = $service_name) (SID = $sid)))";
$Data;
try{
    $conn = new PDO("oci:dbname=".$dbtns, $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Success";
}catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}?>