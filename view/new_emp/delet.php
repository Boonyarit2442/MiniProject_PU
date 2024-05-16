<?php
require_once('../../controler/ConnectDB.php');

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id)) {
    $id = $data->id;

    $delete_stmt = $conn->prepare('DELETE FROM NEW_EMP WHERE ID_NEMP = :id');
    $delete_stmt->bindParam(':id', $id);
    if ($delete_stmt->execute()) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false));
    }
} else {
    echo json_encode(array('success' => false));
}
?>
