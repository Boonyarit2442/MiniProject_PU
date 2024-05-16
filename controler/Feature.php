<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Namedep = getnameDep($conn);
        $NamePst = getNamePst($conn);
        $Table = getTable($conn);
        $SelectDep = getNameDepAll($conn);
        $SelectPst = getNameSelectPst($conn);
        $SelectFeat = getNameFeatAll($conn);
        if (isset($_GET['pstid'])) {
            $positionId = $_GET['pstid'];
            $Order = $_GET['order'];
            $Idpst = getIDpst($conn, $positionId);
            $edit = getSingle($conn, $Idpst, $Order);
        }
        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {

            $count = generateID($conn);
            $FeatID_list = getFeatid($conn);
            $positionID = getPSTid($conn);
            $DetailFeat = $_POST['DETEL'];
            generateDep($conn, $count, $positionID, $FeatID_list, $DetailFeat);

        } elseif ($_POST['_method'] === "EDIT") {
            $Order = $_POST['ORDER_FP'];
            $FeatID_list = getFeatid($conn);
            $positionID = getPSTid($conn);
            $DetailFeat = $_POST['DETEL'];
            update($conn, $Order, $FeatID_list, $positionID, $DetailFeat);

        } elseif ($_POST['_method'] === "DELETE") {
            $ORDER = $_POST['ORDER'];
            $Namepst = $_POST['PSTID'];
            $Idpst = getPstupdate($conn, $Namepst);
            delete($conn, $ORDER);
        } elseif ($_POST['_method'] === "search") {
            $Table = null;
            $Table = search($conn);
            $Namedep = getnameDep($conn);
        } elseif ($_POST['_method'] === "CANCEL") {

            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/feature/feature.php'</script>";
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}


function search($conn)
{
    $searchName = $_POST['searchName'];
    $PDEP = $_SESSION['DEP'];
    $sql = "SELECT ORDER_FP,NAME_PST,NAME_FEAT,DETEL from LIST_FEATUREAS_POSITION  
    JOIN POSITION  on ID_POSITION =ID_PST 
    JOIN  BASE_FEATUREAS  on ID_FEATUREAS = ID_FEAT 
    WHERE  (POSITION.P_DEPNO = '" . $PDEP . "') and(
    UPPER(NAME_PST) like UPPER('%$searchName%') or 
    UPPER(NAME_FEAT) like UPPER('%$searchName%') or
    UPPER(DETEL) like UPPER('%$searchName%')) ";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function getPstupdate($conn, $position)
{
    try {
        $stmt = $conn->prepare("SELECT ID_PST from POSITION where NAME_PST ='" . $position . "'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function getfeatupdate($conn, $NameFeat)
{
    try {
        $stmt = $conn->prepare("SELECT ID_FEAT from BASE_FETUREAS where NAME_FEAT ='" . $NameFeat . "'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;

}

function getNamepstAll($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * from POSITION");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;

}
function getNameFeatAll($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * from BASE_FEATUREAS");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;

}
function getNameDepAll($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * from Depentment");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;

}

function getNameSelectPst($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * from POSITION where P_DEPNO ='" . $_SESSION['DEP'] . "'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;

}
function getNameDep($conn)
{
    try {
        $stmt = $conn->prepare("SELECT NAME_DEP from Depentment where ID_DEP ='" . $_SESSION['DEP'] . "'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result[0]['NAME_DEP'];


}
function getNamePst($conn)
{
    try {
        $stmt = $conn->prepare("SELECT NAME_PST from POSITION where ID_PST ='" . $_SESSION['PST'] . "'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result[0]['NAME_PST'];

}
function getTable($conn)
{
    try {
        $stmt = $conn->prepare("SELECT L.ORDER_FP,P.NAME_PST,B.NAME_FEAT,L.DETEL,P.ID_PST from LIST_FEATUREAS_POSITION L 
        JOIN POSITION P  on ID_POSITION =ID_PST
        JOIN  BASE_FEATUREAS B on ID_FEATUREAS = ID_FEAT 
        WHERE P_DEPNO = '" . $_SESSION['DEP'] . "'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function getPSTid($conn)
{
    try {
        $stmt = $conn->prepare("SELECT ID_PST FROM POSITION WHERE NAME_PST = '" . $_POST['NAME_PST'] . "'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        return false;
    }

}
function getFeatid($conn)
{
    try {
        $stmt = $conn->prepare("SELECT ID_FEAT FROM BASE_FEATUREAS WHERE NAME_FEAT = '" . $_POST['NAME_FEAT'] . "'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function generateDep($conn, $count, $positionID, $FeatID, $DetailFeat)
{
    $CheckInsert = TRUE;
    $text = "";
    try {
        $stmt = $conn->prepare("SELECT * from LIST_FEATUREAS_POSITION");
        $stmt->execute();
        $data_all_pos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($data_all_pos); $i++) {
            if ($_POST['NAME_PST'] === "all" || $_POST['NAME_FEAT'] === "all" || empty($_POST['DETEL'])) {
                $CheckInsert = FALSE;
                $text = "กรุณากรอกข้อมูลหรือกรุณาเลือกตำแหน่งกับคุณสมบัติ";
                break;
            } elseif ($data_all_pos[$i]['ID_POSITION'] == $positionID[0]['ID_PST']) {
                if ($data_all_pos[$i]['ID_FEATUREAS'] == $FeatID[0]['ID_FEAT']) {
                    $CheckInsert = FALSE;
                    $text = "ตำแหน่ง " . $_POST['NAME_PST'] . " มีชือคุณสมบัติ " . $_POST['NAME_FEAT'] . "อยู่แล้ว";
                    break;
                }
            }
        }

        if ($CheckInsert) {
            $stmt = $conn->prepare("INSERT INTO LIST_FEATUREAS_POSITION (ORDER_FP,ID_POSITION,ID_FEATUREAS,DETEL) VALUES('" . $count . "',:Id_Pst,:Id_feat,:Detail_feat)");
            $stmt->bindParam(':Id_Pst', $positionID[0]['ID_PST'], PDO::PARAM_STR);
            $stmt->bindParam(':Id_feat', $FeatID[0]['ID_FEAT'], PDO::PARAM_STR);
            $stmt->bindParam(':Detail_feat', $DetailFeat, PDO::PARAM_STR);
            $stmt->execute();
            $text = "เพิ่มแผนกเสร็จสิ้น";
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/feature/feature.php'</script>";
        }
        if (!empty($text)) {
            $message = urlencode($text); // Encode the message for safe URL use
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/feature/feature.php?message=$message'</script>";
        } else {
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/feature/feature.php'</script>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function update($conn, $Order, $feat, $pos, $Detail)
{

    $CheckInsert = TRUE;
    $text = "";

    try {
        $stmt = $conn->prepare("SELECT * from LIST_FEATUREAS_POSITION");
        $stmt->execute();
        $data_all_pos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($data_all_pos); $i++) {
            if ($_POST['NAME_PST'] === "all" || $_POST['NAME_FEAT'] === "all" || empty($_POST['DETEL'])) {
                $CheckInsert = FALSE;
                $text = "กรุณากรอกข้อมูลหรือกรุณาเลือกตำแหน่งกับคุณสมบัติ";
                break;
            } elseif ($data_all_pos[$i]['ID_POSITION'] == $pos[0]['ID_PST']) {
                if ($data_all_pos[$i]['ID_FEATUREAS'] == $feat[0]['ID_FEAT']) {
                    $CheckInsert = FALSE;
                    $text = "ตำแหน่ง " . $_POST['NAME_PST'] . " มีชือคุณสมบัติ " . $_POST['NAME_FEAT'] . "อยู่แล้ว";
                    break;
                }
            }
        }

        if ($CheckInsert) {
            $stmt = $conn->prepare("UPDATE LIST_FEATUREAS_POSITION SET  ID_POSITION = :ID_POS ,ID_FEATUREAS = :ID_FEAT, DETEL = :DETAIL WHERE ORDER_FP ='" . $Order . "'");
            $stmt->bindParam(':ID_POS', $pos[0]['ID_PST'], PDO::PARAM_STR);
            $stmt->bindParam(':ID_FEAT', $feat[0]['ID_FEAT'], PDO::PARAM_STR);
            $stmt->bindParam(':DETAIL', $Detail, PDO::PARAM_STR);
            $stmt->execute();
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/feature/feature.php'</script>";
            $text = "เพิ่มแผนกเสร็จสิ้น";
        }

        if (!empty($text)) {
            $message = urlencode($text); // Encode the message for safe URL use
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/feature/feature.php?message=$message'</script>";
        } else {
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/feature/feature.php'</script>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
function delete($conn, $ORDER)
{
    try {
        $stmt = $conn->prepare("DELETE FROM LIST_FEATUREAS_POSITION WHERE ORDER_FP = '" . $ORDER . "'");
        $stmt->execute();
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
    }
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/feature/feature.php'</script>";
}



function generateID($conn)
{
    try {
        $stmt = $conn->prepare("SELECT MAX(ORDER_FP) AS ORDER_FP FROM LIST_FEATUREAS_POSITION");
        $stmt->execute();
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);



    } catch (PDOException $e) {
        echo '' . $e->getMessage();
    }
    return $info[0]['ORDER_FP'] + 1;

}


function getIDpst($conn, $positionId)
{

    try {
        $stmt = $conn->prepare("SELECT ID_PST FROM POSITION WHERE NAME_PST = :ID");
        $stmt->bindParam(':ID', $positionId, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function getSingle($conn, $Idpst, $Order)
{

    try {
        $stmt = $conn->prepare("SELECT * FROM  LIST_FEATUREAS_POSITION 
         JOIN POSITION   on ID_POSITION =ID_PST
         JOIN  BASE_FEATUREAS  on ID_FEATUREAS = ID_FEAT  
         WHERE ID_POSITION = :ID AND ORDER_FP = '" . $Order . "'");
        $stmt->bindParam(':ID', $Idpst[0]['ID_PST'], PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}





?>