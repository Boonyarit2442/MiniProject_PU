<?php
require_once('ConnectDB.php');

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        $Pass = getPass($conn);
        $Data_REQ = getDataREQ($conn);
        break;
    case 'POST':
        if($_POST['_method']==="ACCEPT"){
            Accecept_NEMP($conn, $_POST);
        }elseif($_POST['_method']==="REJECT"){
            Reject_NEMP($conn, $_POST);
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}

function Accecept_NEMP($conn,$data){
    $data_req = getDataREQ($conn);

    try {
        
        $status_nemp = $conn->prepare("UPDATE NEW_EMP SET STATUS = 2 WHERE ID_NEMP = '".$data['id']."'");
        $status_nemp->execute();
        $req_get = $conn->prepare("UPDATE REQUIRED_EMP SET GET_REQ = ".($data_req[0]['GET_REQ']+1)." WHERE ID_REQ = '".$data_req[0]['ID_REQ']."'");
        $req_get->execute();
        $data_req = getDataREQ($conn);
        if($data_req[0]['NUM_REQ'] == $data_req[0]['GET_REQ'] ){
            getData($conn);
        }
        echo "<script>window.location = 'summaryofinterview.php?KEY_INFO=".$_GET['KEY_INFO']."'</script>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getData($conn){

    try {
        $o_p = $conn->prepare("UPDATE RECTUITMENT SET STATUS_REC = 'ปิด' WHERE ID_REC = (
            SELECT ID_REC FROM RECTUITMENT
            WHERE ID_REC =(select REC from INTERVIEW where ID_INVIEW ='".$_GET['KEY_INFO']."'))");
        $o_p->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function Reject_NEMP($conn, $data){
    //$data_req = getDataREQ($conn);
    try {
        $status_nemp = $conn->prepare("UPDATE NEW_EMP SET STATUS = 2 WHERE ID_NEMP = '".$data['id']."'");
        $status_nemp->execute();
        echo "<script>window.location = 'summaryofinterview.php?KEY_INFO=".$_GET['KEY_INFO']."'</script>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getDataREQ($conn){
    try {
        $req_data = $conn->prepare("SELECT * FROM REQUIRED_EMP
        WHERE ID_REQ = (SELECT REQ_REC FROM RECTUITMENT
        WHERE ID_REC =(select REC from INTERVIEW where ID_INVIEW ='".$_GET['KEY_INFO']."'))");
        $req_data->execute();
        $result = $req_data->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}

function getPass($conn)
{
    try {
        $pst = $conn->prepare("SELECT * FROM SCORE_NEMP sn JOIN new_emp ne ON sn.nemp_intv = ne.id_nemp JOIN employee emp ON emp.id_emp = sn.emp_intv where sn.Y_N = 1");
        $pst->execute();
        $result = $pst->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}


function getAll($conn)
{
    $id = $_SESSION['ID_EMP'];
    $sql = "SELECT NEMP_INTV,NAME_NEMP,LNAME_NEMP,TECHINCAL,LEANING,CREATER,HUM_RELA,Y_N,ID_NEMP,STATUS FROM
    (SELECT SN.NEMP_INTV,avg(sn.TECHINCAL) AS TECHINCAL,avg(sn.LEANING) AS LEANING,avg(sn.CREATER) AS CREATER , AVG(sn.HUM_RELA) AS HUM_RELA  ,AVG(Y_N) AS Y_N
    FROM SCORE_NEMP sn 
    JOIN new_emp ne ON sn.nemp_intv = ne.id_nemp 
    JOIN Lis_NEMP_REC on NEMP_INTV = NEMP 
    where rec = (select REC from INTERVIEW where ID_INVIEW ='" . $_GET['KEY_INFO'] . "') group by sn.NEMP_INTV)
    JOIN new_emp ne ON nemp_intv = id_nemp";
    try {
        $pst = $conn->prepare($sql);
        $pst->execute();
        $result = $pst->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}

function getDetail($conn, $id)
{
    $sql = "select score_nemp.TECHINCAL,score_nemp.LEANING,score_nemp.CREATER,score_nemp.HUM_RELA,ID_EMP,Y_N,NAME,NEMP_INTV
from score_nemp
join LIS_NEMP_REC on nemp_intv =nemp
join EMPLOYEE on emp_intv = ID_EMP
where rec = (select REC from INTERVIEW where ID_INVIEW ='" . $_GET['KEY_INFO'] . "') AND NEMP_INTV = '" . $id . "'";
    try {
        $pst = $conn->prepare($sql);
        $pst->execute();
        $result = $pst->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
?>