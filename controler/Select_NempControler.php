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
        } elseif ($_POST['_method'] === "EDIT") {
            update($conn, $_POST);
        } elseif ($_POST['_method'] === "DELETE") {
            delete($conn, $_POST);
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_decode(array("message" => "Method not allowed."));
}

function getAll($conn)
{
    $str = "SELECT * from INTERVIEW join LIS_NEMP_REC on LIS_NEMP_REC.REC = INTERVIEW.REC join NEW_EMP on nemp = NEW_EMP.ID_NEMP where ID_INVIEW ='" . $_GET['KEY_INFO'] . "' and STATUS = 1";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function check_EMP_ME_AddedScore($conn,$key){
    //give 1 no 0
    $str = "select case when count(*) >= 1 then '1' else '0' end azs status  from (select EMP_INTV,NEMP_INTV from score_nemp where EMP_INTV = '".$_SESSION['ID_EMP']."' and NEMP_INTV = '".$key."')";
    //echo $str."<br>";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result[0]['STATUS'];
}

function check_haveMeindatabase($conn,$key){
    // have 1 no 0 
    $str = "select case when count(*) >= 1 then '1' else '0' end as status from SCORE_NEMP where NEMP_INTV = '".$key."'";
    //echo $str."<br>";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result[0]['STATUS'];
}
/*function checkNUllscore($conn1 = $conn,$key)
{
    $str = "SELECT * from SCORE_NEMP where NEMP_INTV like '".$key."'";
    try {
        $stmt = $conn1->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}*/
?>