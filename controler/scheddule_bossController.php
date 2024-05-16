<?php 
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
$Data = [];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        break;
    case 'POST':
    if($_POST['_method']=='Send_Day'){
        $Data = getAll($conn);
        send_day($conn,$_POST,$Data);
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Schedule_an_interview_date/Select_InterDate.php'</script>";
    }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_decode(array("message" => "Method not allowed."));
}

function getAll($conn){
    $sql = "select ID_EMP,NAME,L_NAME,EMAIL,NAME_PST,NAME_DEP,NAME_PERM from EMPLOYEE 
join POSITION on PSTNO = POSITION.ID_PST
join DEPENTMENT on POSITION.P_DEPNO = DEPENTMENT.ID_DEP
join PERMISSION on POSITION.PERNO = PERMISSION.ID_PERM";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}

function send_day($conn,$Data,$count){
    $databuff = array();
    $dataEMPbuff = array();
for ($i=0; $i <  count($count); $i++) { 
    if(isset($Data[$i])){
        array_push($databuff,$Data[$i]);
    }
    if(isset($Data['ID_EMP_INTV_'.$i])){
        array_push($dataEMPbuff,$Data['ID_EMP_INTV_'.$i]);
    }
}
/*echo json_encode($Data);
    echo "<br>";
echo json_encode($databuff);
    echo "<br>";
echo json_encode($dataEMPbuff);
    echo "<br>";*/
//add Member intv
for($i=0; $i < count($dataEMPbuff) ; $i++){
    $sql = "INSERT INTO MEMBER_INTERVIEW (ORDER_MEMBINTV, ID_INTV, EMP_INTV) VALUES ('".$i."',(select ID_INVIEW from INTERVIEW where REC = '".$Data['KEY']."') , '".$dataEMPbuff[$i]."')";
    /*echo $sql;
    echo "<br>";*/
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
//add DAY
for($i=0; $i < count($databuff) ; $i++){
    $sql = "INSERT INTO DAY_CHOOSE (ORDER_INTV, INTV, DAY_CHOOSE) VALUES ('".$i."',(select ID_INVIEW from INTERVIEW where REC = '".$Data['KEY']."'), TO_DATE('".$databuff[$i]."', 'YYYY-MM-DD'))";
    /*echo $sql;
    echo "<br>";*/
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

}
?>