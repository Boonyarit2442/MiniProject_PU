<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        $DEP = GETDEP($conn);
        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {
            echo json_encode($_POST);
            $temp = AutoGenID($conn, 'C', 'ID_REC', 'RECTUITMENT');
            create($conn, $_POST, $temp);
            updatestatus($conn, $_POST);
            create_INTV($conn,$temp,AutoGenID($conn, 'V', 'ID_INVIEW', 'INTERVIEW'));
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Approve-Doc/Approve-Doc.php'</script>";
        } else if ($_POST['_method'] === "UPDATESTATUS") {
            updatestatus2($conn, $_POST);
        } else if ($_POST['_method'] === "search") {
            $Data = search($conn, $_POST);
        } else if ($_POST['_method'] === "UPDATE_NUM") {
            echo json_encode($_POST);
            UPDATE_NUM($conn, $_POST);
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}
function getAll($conn)
{
    $str = "SELECT NAME,TO_CHAR(DAYSAMVE_REQ, 'dd MON yyyy', 'NLS_CALENDAR=''THAI BUDDHA'' NLS_DATE_LANGUAGE=THAI') as DAYSAMVE_REQ,TYPE_REQ,NAME_PST,NUM_REQ,STATUS,NAME_DEP,ID_REQ,L_NAME,DETEL_REQ from REQUIRED_EMP 
join EMPLOYEE on emp_emp = id_emp 
join POSITION on pst_req = id_pst 
join DEPENTMENT on EMPLOYEE.DEPNO = DEPENTMENT.ID_DEP 
WHERE id_dep ='" . $_SESSION['DEP'] . "' order by STATUS";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function GETDEP($conn){
    $sql = "select * from DEPENTMENT where ID_DEP = '".$_SESSION['DEP']."'";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function AutoGenID($conn, $char, $col, $tablename)
{
    $stmt = $conn->prepare("SELECT CONCAT('" . $char . "',LPAD(SUBSTR(MAX(" . $col . "),2,4)+1,3,0)) as AUTOID FROM " . $tablename);
    $stmt->execute();
    $info = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $info;
}
function create($conn, $data, $id)
{
    $str = "INSERT INTO RECTUITMENT (ID_REC, DETEL_REC, DAY_REC, REQ_REC, SALSTART, SLAEND, DAYEND_REQ,STATUS_REC) VALUES ('" . $id[0]['AUTOID'] . "', '" . $data['Detel'] . "', TO_DATE('" . date('Y-m-d') . "', 'YYYY-MM-DD'), '" . $data['ID_DOC'] . "', '" . $data['SALstart'] . "', '" . $data['SALend'] . "', TO_DATE('" . $data['DAYEND'] . "', 'YYYY-MM-DD'),'เปิด')";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function create_INTV($conn, $rec,$Intv){
    echo json_encode($Intv);
    echo json_encode($rec);
    $sql = "INSERT INTO INTERVIEW (ID_INVIEW, REC) VALUES ('".$Intv[0]['AUTOID']."', '".$rec[0]['AUTOID']."')";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function updatestatus($conn,$data)
{
        $updatestatus = "UPDATE REQUIRED_EMP SET STATUS = '1' where ID_REQ = '" . $data['ID_DOC'] . "'";
    try {
        $stmt = $conn->prepare($updatestatus);
       $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
function updatestatus2($conn, $data)
{
    $updatestatus = "UPDATE REQUIRED_EMP SET STATUS = '0',WAYNOT = '" . $data['WAYNOT'] . "' where ID_REQ = '" . $data['ID_DOC'] . "'";
    echo $updatestatus;
    try {
        $stmt = $conn->prepare($updatestatus);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Approve-Doc/Approve-Doc.php'</script>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function search($conn, $data)
{
    $sql = "SELECT NAME, DAYSAMVE_REQ, TYPE_REQ, NAME_PST, NUM_REQ, STATUS, NAME_DEP, ID_REQ, L_NAME, DETEL_REQ ,ID_DEP
from REQUIRED_EMP 
join EMPLOYEE on emp_emp = id_emp
join POSITION on pst_req = id_pst 
join DEPENTMENT on EMPLOYEE.DEPNO = DEPENTMENT.ID_DEP 
WHERE 
(ID_DEP = '" . $_SESSION['DEP'] . "') and
(NAME like '%" . $data['searchName'] . "%' or 
UPPER(DAYSAMVE_REQ) like UPPER('%" . $data['searchName'] . "%') or 
UPPER(TYPE_REQ) like UPPER('%" . $data['searchName'] . "%') or
UPPER(NAME_PST) like UPPER('%" . $data['searchName'] . "%') or 
UPPER(NUM_REQ) like UPPER('%" . $data['searchName'] . "%') or 
UPPER(STATUS) like UPPER('%" . $data['searchName'] . "%') or 
UPPER(NAME_DEP) like UPPER('%" . $data['searchName'] . "%') or 
UPPER(ID_REQ) like UPPER('%" . $data['searchName'] . "%') or 
UPPER(L_NAME) like UPPER('%" . $data['searchName'] . "%') or 
UPPER(DETEL_REQ) like UPPER('%" . $data['searchName'] . "%')) order by STATUS";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function UPDATE_NUM($conn, $data)
{
    $sql = "UPDATE REQUIRED_EMP set NUM_REQ = '" . $data['Num'] . "' WHERE ID_REQ = '" . $data['Index_Doc'] . "'";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Approve-Doc/Approve-Doc.php'</script>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>