<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_decode(array("message" => "Method not allowed."));
}
function getAll($conn)
{
    $sql = "SELECT * from LIS_NEMP_REC
    join RECTUITMENT on REC = ID_REC
    join NEW_EMP on NEMP = ID_NEMP
    where REC ='" . $_GET['KEY_INFO'] . "' and status = 1 order by status";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function checkstatus($conn,$key){
    $sql = "select ID_INVIEW,case when ID_INVIEW in (SELECT INTV from DAY_Choose group by INTV)then '0' else '1' end as DAY_CHOOSE from INTERVIEW where ID_INVIEW = (select ID_INVIEW from INTERVIEW where REC = '".$key."')";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result[0]['DAY_CHOOSE'];
}

?>