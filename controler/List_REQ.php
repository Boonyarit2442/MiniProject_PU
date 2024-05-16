<?php
/*เสร็จ */
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        if (isset($_GET['KEY_INFO'])) {
            $Data1 = SomegetAll($conn, $_GET);
        }
        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {
            create($conn, $_POST);
        } elseif ($_POST['_method'] === "EDIT") {
            update($conn, $_POST);
        } elseif ($_POST['_method'] === "DELETE") {
            delete($conn, $_POST);
        } elseif ($_POST['_method'] === "search") {
            $Data = null;
            $Data = search($conn, $_POST);
            //echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/List_of_requests/List.php'</script>";

        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_decode(array("message" => "Method not allowed."));
}
function getAll($conn)
{
    try {
        $stmt = $conn->prepare("select ID_REQ,TO_CHAR(DAYSAMVE_REQ, 'dd MON yyyy', 'NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI') as DAYS,NAME_PST,STATUS,NAME_DEP,EMP_LEAD,WAYNOT,NAME from required_emp join POSITION on pst_req = id_pst join DEPENTMENT on P_DEPNO = ID_DEP join EMPLOYEE on EMP_EMP = ID_EMP order by DAYS desc");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}

function SomegetAll($conn, $data)
{
    $str = "SELECT * from required_emp join POSITION on pst_req = id_pst join DEPENTMENT on P_DEPNO = ID_DEP join EMPLOYEE on EMP_EMP = ID_EMP where ID_REQ ='" . $data['KEY_INFO'] . "'";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "<br>";
        $e->getMessage();
    }
}
function search($conn, $data)
{
    //$Y_N = $data['YesNO'];
    $searchName = $data['searchName'];
    $sql = "select ID_REQ,TO_CHAR(DAYSAMVE_REQ, 'dd MON yyyy', 'NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI') as DAYS,NAME_PST,STATUS,NAME_DEP,EMP_LEAD,WAYNOT,NAME 
from 
required_emp 
join POSITION on pst_req = id_pst 
join DEPENTMENT on P_DEPNO = ID_DEP  
join EMPLOYEE on EMP_EMP = ID_EMP
where 
UPPER(ID_REQ) like UPPER('%$searchName%') or 
UPPER(TO_CHAR(DAYSAMVE_REQ, 'dd MON yyyy', 'NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI')) like UPPER('%$searchName%')or
UPPER(NAME_PST) like UPPER('%$searchName%') or
UPPER(NAME) like UPPER('%$searchName%') or
UPPER(EMP_LEAD) like UPPER('%$searchName%') or
UPPER(WAYNOT) like UPPER('%$searchName%') or
UPPER(EMP_EMP) like UPPER('%$searchName%') or STATUS  = '$searchName' order by DAYS desc";
    // บัค อนุญาติ ไม่อนุญาติ ่
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;

}
?>