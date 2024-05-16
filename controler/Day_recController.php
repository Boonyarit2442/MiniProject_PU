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
    $sql = "SELECT ID_REC,NAME_PST,DAY_REC,DAYEND_REQ,DETEL_REQ,EMPLOYEE.NAME,
    case
        when  ID_REC not in (SELECT rec FROM (select * from INTERVIEW) WHERE DAY_SELECT IS NULL) then '1' else '0'
    end as STATUS_INTV
FROM RECTUITMENT 
    JOIN REQUIRED_EMP ON REQ_REC = ID_REQ 
    JOIN POSITION ON PST_REQ = ID_PST
    JOIN DEPENTMENT on P_DEPNO = DEPENTMENT.ID_DEP
    JOIN EMPLOYEE on DEPENTMENT.EMP_LEAD = EMPLOYEE.ID_EMP 
where ID_REC in (select rec from LIS_NEMP_REC) and 
     1 in (select status from LIS_NEMP_REC JOIN NEW_EMP on NEMP = ID_NEMP)
ORDER by STATUS_INTV";
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
function check_myself($conn,$compar){
$sql = "select rec from INTERVIEW where ID_INVIEW in (select ID_INTV from MEMBER_INTERVIEW where EMP_INTV = '".$_SESSION['ID_EMP']."')";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
   for($i=0;$i< count($result);$i++){
        if($result[$i]['REC']==$compar){
            return 1;
        }
   }
   return 0;
}
function check_have_selectedNEMP($conn, $key)
{
    $sql = "select count(*) as num from LIS_NEMP_REC
    join NEW_EMP on nemp = id_nemp
    where rec = '" . $key . "' and STATUS = 1";
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