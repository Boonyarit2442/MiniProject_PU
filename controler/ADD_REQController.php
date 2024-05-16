<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $KYE_DOC = AutoGenID($conn, 'Q', 'ID_REQ', 'REQUIRED_EMP');
        $DEP = getDEP($conn);
        $POS = getPOS($conn);
        $FEAT = getFEAT($conn);
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
        echo json_encode(array("message" => "Method not allowed."));
}

function create($conn, $data)
{
    $CheckInsert = true;
    $Check_ID_Dupli = true;

    $ID = $data['ID_DOC'];
    $NAME_EMP = $data['NAME_EMP'];
    $day = $data['DATE_DOC'];
    $type = $data['employment'];
    $pos = $data['position'];
    $count = $data['quantity'];
    $detel = $data['address'];

    $REQ_ALL = $conn->prepare("SELECT * FROM REQUIRED_EMP");
    $REQ_ALL->execute();
    $REQ_ALL = $REQ_ALL->fetchAll(PDO::FETCH_ASSOC);
    for($i=0;$i<count($REQ_ALL);$i++){
        if($REQ_ALL[$i]['ID_REQ'] == $data['ID_DOC']){
            $CheckInsert = false;
            $Check_ID_Dupli = false;
            echo "<script>window.location = 'ADD_REQ1.php?error= Please refresh the screen because the document ID is duplicate.'</script>";
            break;
        }
    }
    if($Check_ID_Dupli){
        if(empty($data['employment']) || empty($data['department']) || empty($data['address']) || $data['quantity'] == 0){
            if(empty($data['employment']) || empty($data['department']) || empty($data['address'])){
                $CheckInsert = false;
                echo "<script>window.location = 'ADD_REQ1.php?error= Please fill out the information completely.'</script>";
            }elseif($data['quantity'] == 0){
                $CheckInsert = false;
                echo "<script>window.location = 'ADD_REQ1.php?error= Please select at least one person.'</script>";
            }
        }
    }
    if($CheckInsert){
        try {
            $temp = "INSERT INTO REQUIRED_EMP (ID_REQ, DAYSAMVE_REQ, DETEL_REQ, TYPE_REQ, NUM_REQ, GET_REQ, PST_REQ, EMP_EMP, STATUS, WAYNOT) VALUES ('$ID', TO_DATE('$day', 'YYYY-MM-DD'), '$detel', '$type', '$count', '0', '$pos', '$NAME_EMP', '-1', NULL)";
            $stmt = $conn->prepare($temp);
            $stmt->execute();
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/List_of_requests/List.php'</script>";
    
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}

function getPOS($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM POSITION");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function getDEP($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM DEPENTMENT");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function getFEAT($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * from LIST_FEATUREAS_POSITION join POSITION on ID_POSITION = ID_PST JOIN BASE_FEATUREAS ON ID_FEATUREAS = ID_FEAT");
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


?>