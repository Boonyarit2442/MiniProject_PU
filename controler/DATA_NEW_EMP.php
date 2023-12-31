<?php
require_once('ConnectDB.php');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $data = $conn->query('SELECT * FROM NEW_EMP')->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    $items_arr['result'] = array();

    $keyword = $_POST['keyword'];
    $type = $_POST['type'];

    if($type == "name") {
        $type = "fullname";
    } else if($type == "type") {
        $type = "level_type";
    }

    $query = "SELECT * FROM NEW_EMP WHERE `$type` LIKE '%$keyword%' ";
    $stmt = $db->prepare($query);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        array_push($items_arr['result'], $row);
    }
    echo json_encode($items_arr);
    http_response_code(200);


}
?>