<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
            $Data = getAll($conn);
            $edit = getSingle($conn);
        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {

            $iddep= generateID($conn, 'F', 'ID_FEAT', 'Base_featureas');
            generateDep($conn,$_POST,$iddep);
        } elseif ($_POST['_method'] === "EDIT") { 
            update($conn, $_POST);
        } elseif ($_POST['_method'] === "DELETE") {
            delete($conn, $_POST);
        }elseif($_POST['_method']==="CANCEL"){
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/M_F/M_F.php'</script>";
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}

//
function generateDep($conn, $data, $idgen) {
    $CheckInsert = TRUE;
    $text = "";

    try {
        $stmt = $conn->prepare("SELECT * FROM Base_featureas");
        $stmt->execute();
        $data_all_feat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($data_all_feat); $i++) {
            if (empty($data['NAME_FEAT'])) {
                $CheckInsert = FALSE;
                $text = "กรุณากรอกข้อมูล";
                break;
            } elseif (strtoupper($data_all_feat[$i]['NAME_FEAT']) == strtoupper($data['NAME_FEAT'])) {
                $CheckInsert = FALSE;
                $text = "ชื่อคุณสมบัติ '".$data['NAME_FEAT']."' มีอยู่แล้วกรุณากรอกชื่ออื่น";
                break;
            }
        }

        if ($CheckInsert) {
            $stmt = $conn->prepare("INSERT INTO BASE_FEATUREAS VALUES ('" . $idgen . "','" . $data['NAME_FEAT'] . "')");
            $stmt->execute();
            $text = "เพิ่มคุณสมบัติเสร็จสิ้น";
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/M_F/M_F.php'</script>";
        }

        if (!empty($text)) {
            $message = urlencode($text); // Encode the message for safe URL use
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/M_F/M_F.php?message=$message'</script>";
        } else {
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/M_F/M_F.php'</script>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}




//function for select ALL data
function getAll($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM  BASE_FEATUREAS ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
}

function getSingle($conn){

    if (isset($_GET['id'])) {
        $featid = $_GET['id'];
    }
    try {
         $stmt = $conn->prepare("SELECT * FROM Base_featureas WHERE ID_FEAT = :ID");
         $stmt->bindParam(':ID',  $featid, PDO::PARAM_STR);
         $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     } catch (PDOException $e) {
         echo $e->getMessage(); 
     } 
     return $result; 
 }

 function generateID($conn, $char, $col, $tablename)
 {

     try {
         $stmt = $conn->prepare("SELECT CONCAT('" . $char . "', LPAD(SUBSTR(MAX(" . $col . "),2,4)+1,3,0)) as AUTOID FROM " . $tablename);
         $stmt->execute();
         $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $info[0]['AUTOID'];
     } catch (PDOException $e) {
         echo json_encode(array("message" => "Error generating ID: " . $e->getMessage()));
         exit;
     }
 }
 




//function for update data
function update($conn, $data)
{
    $ID=$data['ID_FEAT'];
    $NAME = $data['NAME_FEAT'];
    try {
        $stmt = $conn->prepare("UPDATE Base_featureas SET NAME_FEAT = :NAME_FEAT WHERE ID_FEAT = :ID_FEAT");
        $stmt->bindParam(':ID_FEAT', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':NAME_FEAT', $NAME, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/M_F/M_F.php'</script>";
    } catch (PDOException $e) {
        echo "Error updating data: " . $e->getMessage();
    }
}


//function for delete data

function delete($conn, $data)
{
    $ID = $data['KEY']; // Use the correct data key 'KEY' to get the department ID
    try {
        $stmt = $conn->prepare("DELETE FROM Base_featureas WHERE ID_FEAT = :ID");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/M_F/M_F.php'</script>";
    //header("Location : ../view/Position/position.php");
}

?>