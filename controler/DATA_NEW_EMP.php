<?php
require_once('ConnectDB.php');
$trest = AutoGenID($conn, 'N', 'ID_NEMP', 'NEW_EMP');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        $Data_ALL = getAllV2($conn);
        $Base_Feat = getFeatAll($conn);
        $Data_Feat_EMP = getFeatEMP($conn);
        //$NEMP_Feat = getNEMP_Feat($conn);
        break;
    case 'POST':
        if (isset($_POST['_method']) && $_POST['_method'] === "DELETE") {
            delete($conn, $_POST);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(array("message" => "Method not allowed."));
}

function getFeatEMP($conn){
    try {
        $Feat_EMP = $conn->prepare("SELECT * FROM LIST_FEATUREAS_NEMP
        FULL JOIN NEW_EMP on LIST_FEATUREAS_NEMP.NEMP = NEW_EMP.ID_NEMP
        FULL JOIN BASE_FEATUREAS on LIST_FEATUREAS_NEMP.FEAT = BASE_FEATUREAS.ID_FEAT
        WHERE NEW_EMP.ID_NEMP is not null and BASE_FEATUREAS.NAME_FEAT is not null ");
        $Feat_EMP->execute();
        $Feat_EMP = $Feat_EMP->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $Feat_EMP;
}

function getNEMP_Feat($conn)
{
    try {
        $EMP = $conn->prepare("SELECT * FROM LIST_FEATUREAS_NEMP
        JOIN NEW_EMP on LIST_FEATUREAS_NEMP.NEMP = NEW_EMP.ID_NEMP
        JOIN BASE_FEATUREAS on LIST_FEATUREAS_NEMP.FEAT = BASE_FEATUREAS.ID_FEAT");
        $EMP->execute();
        $EMP = $EMP->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $EMP;
}

function getNEMP_Name_Feat($conn, $id)
{
    try {
        $EMP = $conn->prepare("SELECT * FROM LIST_FEATUREAS_NEMP
        JOIN NEW_EMP on LIST_FEATUREAS_NEMP.NEMP = NEW_EMP.ID_NEMP
        JOIN BASE_FEATUREAS on LIST_FEATUREAS_NEMP.FEAT = BASE_FEATUREAS.ID_FEAT
        WHERE NEW_EMP.ID_NEMP = '$id'");
        $EMP->execute();
        $EMP = $EMP->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $EMP;
}
// Get Base Feature
function getFeatAll($conn)
{
    try {
        $Feature = $conn->prepare("SELECT * FROM BASE_FEATUREAS");
        $Feature->execute();
        $Feature = $Feature->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $Feature;
}

function getAllV2($conn)
{
    try {
        $EMP = $conn->prepare("SELECT * FROM LIST_FEATUREAS_NEMP
        FULL OUTER JOIN NEW_EMP on LIST_FEATUREAS_NEMP.NEMP = NEW_EMP.ID_NEMP
        FULL OUTER JOIN BASE_FEATUREAS on LIST_FEATUREAS_NEMP.FEAT = BASE_FEATUREAS.ID_FEAT
        WHERE NEW_EMP.ID_NEMP is not NULL");
        $EMP->execute();
        $EMP = $EMP->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $EMP;
}

function getAll($conn)
{
    try {
        $EMP = $conn->prepare("SELECT ID_NEMP,NAME_NEMP,LNAME_NEMP,NAME_PST,SALREQ,ID_REC,new_emp.STATUS from new_emp 
join LIS_NEMP_REC on ID_NEMP = LIS_NEMP_REC.NEMP
join RECTUITMENT on REC = RECTUITMENT.ID_REC
join REQUIRED_EMP on REQ_REC = REQUIRED_EMP.ID_REQ
join POSITION on REQUIRED_EMP.PST_REQ = POSITION.ID_PST");
        $EMP->execute();
        $EMP = $EMP->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $EMP;
}
//fuction f
function delete($conn, $data)
{
    $ID = $data['KYE'];
    try {
        $stmt = $conn->prepare("DELETE FROM NEW_EMP WHERE ID_NEMP = :ID");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }
    echo "<script>window.location = 'pannic.php'</script>";
}
function AutoGenID($conn, $char, $col, $tablename)
{
    try {
        $stmt = $conn->prepare("SELECT CONCAT('" . $char . "',LPAD(SUBSTR(MAX(" . $col . "),2,4)+1,3,0)) as AUTOID FROM " . $tablename);
        $stmt->execute();
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        return $info['AUTOID'];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null; // หรือค่าที่เหมาะสมที่จะบอกว่ามีข้อผิดพลาดในการดึงข้อมูล
    }
}
?>