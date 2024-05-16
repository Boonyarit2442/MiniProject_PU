<?php
/*ยังไม่เสร็จ */
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {
            create($conn, $_POST);
        } elseif ($_POST['_method'] === "EDIT") {
            update($conn, $_POST);
        } elseif ($_POST['_method'] === "DELETE") {
            delete($conn, $_POST);
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}
function getAll($conn)
{
    try {
        $stmt = $conn->prepare("select ID_REQ,DAYSAMVE_REQ,DETEL_REQ,TYPE_REQ,NUM_REQ,NAME_PST from REQUIRED_EMP REQ join POSITION POS on REQ.PST_REQ = POS.ID_PST;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_decode($result);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
?>