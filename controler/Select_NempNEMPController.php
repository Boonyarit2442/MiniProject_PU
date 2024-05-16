<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {
            create($conn, $_POST);
        } elseif ($_POST['_method'] === "NOPASS") {
            UPStatusNO($conn, $_POST);
        } elseif ($_POST['_method'] === "PASS") {
            UPStatusYESS($conn, $_POST);
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_decode(array("message" => "Method not allowed."));
}

function getAll($conn)
{
    $str = "SELECT * from LIS_NEMP_REC
    join RECTUITMENT on REC = ID_REC
    join NEW_EMP on NEMP = ID_NEMP
    where REC ='" . $_GET['KEY_INFO'] . "' order by status";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function UPStatusNO($conn, $kye)
{
    $sql = "UPDATE NEW_EMP SET STATUS = '0' where ID_NEMP = '" . $kye['ID_NUM'] . "'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Fillter_NEMP/Select_NempNEMP.php?KEY_INFO=" . $_GET['KEY_INFO'] . "'</script>";
}
function UPStatusYESS($conn, $kye)
{
    $sql = "UPDATE NEW_EMP SET STATUS = '1' where ID_NEMP = '" . $kye['ID_NUM'] . "'";
    $stmt = $conn->prepare($sql);
    echo $kye['ID_NUM'];
    $stmt->execute();
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Fillter_NEMP/Select_NempNEMP.php?KEY_INFO=" . $_GET['KEY_INFO'] . "'</script>";
}

?>