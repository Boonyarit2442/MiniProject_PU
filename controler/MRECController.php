<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);

        if (isset($_GET['KEY_INFO'])) {
            close($conn, $_GET);
        }
        else if (isset($_GET['KEY_OPEN'])) {
            open($conn, $_GET);
        }
        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {
            $temp = AutoGenID($conn, 'C', 'ID_REC', 'RECTUITMENT');
            create($conn, $_POST, $temp);
            updatestatus($conn, $_POST);
        } else if ($_POST['_method'] === "UPDATESTATUS") {
            updatestatus2($conn, $_POST);
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}


function getAll($conn)
{
    $STR = "SELECT * FROM RECTUITMENT 
JOIN REQUIRED_EMP ON REQ_REC = ID_REQ
JOIN POSITION ON PST_REQ = ID_PST";
    try {
        $stmt = $conn->prepare($STR);
        $stmt->execute();
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $e->getMessage();
    }
    return $result;
}
function close($conn, $data)
{
    $str = "UPDATE RECTUITMENT SET STATUS_REC = 'ปิด' where ID_REC = " . $data['KEY_INFO'] . "";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/REC/REC.php'</script>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
function open($conn, $data)
{
    $str = "UPDATE RECTUITMENT SET STATUS_REC = 'เปิด' where ID_REC = " . $data['KEY_OPEN'] . "";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/REC/REC.php'</script>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>