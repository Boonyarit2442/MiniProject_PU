<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        break;
    case 'POST':
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_decode(array("message" => "Method not allowed."));
}
function getAll($conn)
{
    $str = "SELECT * from INTERVIEW 
join RECTUITMENT on INTERVIEW.REC = RECTUITMENT.ID_REC 
join REQUIRED_EMP on RECTUITMENT.REQ_REC = REQUIRED_EMP.ID_REQ 
join POSITION on REQUIRED_EMP.PST_REQ = POSITION.ID_PST";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
?>