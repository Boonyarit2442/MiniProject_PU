<?php 
require_once('ConnectDB.php');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $Num_Rec = Num_rec($conn);
        $Num_NEMP = Num_NEMP($conn);
        $Pai = tarnf_Data($conn);
        $Dep = Dep($conn);
        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {
            echo "rit";
        } 
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_decode(array("message" => "Method not allowed."));
}
function Num_rec($conn){
    $sql = "SELECT count(*) as NUM from RECTUITMENT";
    try {
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);   
        return $data;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function Num_NEMP($conn){
    $sql = "SELECT COUNT(*) AS NUM FROM NEW_EMP";
    try {
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);   
        return $data;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function Pai($conn){
$sql = "select NAME_PST,Count(*) as NUM from NEW_EMP
join LIS_NEMP_REC on ID_NEMP = LIS_NEMP_REC.NEMP
join RECTUITMENT on REC = RECTUITMENT.ID_REC
join REQUIRED_EMP on REQ_REC = REQUIRED_EMP.ID_REQ
join POSITION on PST_REQ = ID_PST
group by NAME_PST ORDER By NUM desc";
    try {
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);   
        return $data;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function tarnf_Data($conn){
    $data = Pai($conn);
    $datatemp = array();
    $datatemp_C = array();
    $big = array();
    for($i=0 ; $i < count($data) ; $i++){
        array_push($datatemp,$data[$i]['NAME_PST']);
        array_push($datatemp_C,$data[$i]['NUM']);
    }
    array_push($big,$datatemp);
    array_push($big,$datatemp_C);
    return $big;
}

function Dep($conn){
$sql = "select ID_DEP,NAME_DEP from DEPENTMENT where ID_DEP in
(select ID_DEP from NEW_EMP
join LIS_NEMP_REC on ID_NEMP = LIS_NEMP_REC.NEMP
join RECTUITMENT on REC = RECTUITMENT.ID_REC
join REQUIRED_EMP on REQ_REC = REQUIRED_EMP.ID_REQ
join POSITION on PST_REQ = ID_PST
join DEPENTMENT on POSITION.P_DEPNO = DEPENTMENT.ID_DEP group by ID_DEP)    ";
    try {
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);   
        return $data;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>