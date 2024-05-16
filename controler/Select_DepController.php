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
    $str = "SELECT INTERVIEW.ID_INVIEW,INTERVIEW.DAY_SELECT,POSITION.NAME_PST,REQUIRED_EMP.DETEL_REQ from INTERVIEW 
    join RECTUITMENT on INTERVIEW.REC = RECTUITMENT.ID_REC 
    join REQUIRED_EMP on RECTUITMENT.REQ_REC = REQUIRED_EMP.ID_REQ 
    join POSITION on REQUIRED_EMP.PST_REQ = POSITION.ID_PST
    join MEMBER_INTERVIEW on INTERVIEW.ID_INVIEW = MEMBER_INTERVIEW.ID_INTV
    where EMP_INTV = '".$_SESSION['ID_EMP']."'";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}

function check_NempNOscore($conn,$Data){

}function check_have_selectedNEMP($conn, $key)
{
    $sql = "select count(*) as num from LIS_NEMP_REC
    join NEW_EMP on nemp = id_nemp
    where rec =(select rec from INTERVIEW where ID_INVIEW = '".$key."') and STATUS = 1";
    // echo $sql;
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