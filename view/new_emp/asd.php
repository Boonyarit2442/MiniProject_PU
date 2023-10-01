<?php
require_once('../../controler/ConnectDB.php');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
   
    $data = $conn->query('SELECT * FROM NEW_EMP')->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'This is POST';
} else {
    http_response_code(405);
}
?>
