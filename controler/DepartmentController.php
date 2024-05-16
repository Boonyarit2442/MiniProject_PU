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
            $iddep= generateID($conn, 'D', 'ID_DEP', 'DEPENTMENT');
            generateDep($conn,$_POST,$iddep);

            //$iddep= generateID($conn, 'D', 'ID_DEP', 'DEPENTMENT');
            //create($conn, $_POST, $iddep);
        } elseif ($_POST['_method'] === "EDIT") { 
            update($conn, $_POST);
        } elseif ($_POST['_method'] === "DELETE") {
            delete($conn, $_POST);
        }elseif($_POST['_method']==="CANCEL"){
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Department/Department.php'</script>";
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
        $stmt = $conn->prepare("SELECT * FROM DEPENTMENT");
        $stmt->execute();
        $data_all_dep = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($data_all_dep); $i++) {
            if (empty($data['NAME_DEP'])) {
                $CheckInsert = FALSE;
                $text = "กรุณากรอกข้อมูล";
                break;
            } elseif (strtoupper($data_all_dep[$i]['NAME_DEP']) == strtoupper($data['NAME_DEP'])) {
                $CheckInsert = FALSE;
                $text = "ชื่อคุณแผนก '".$data['NAME_DEP']."' มีอยู่แล้วกรุณากรอกชื่ออื่น";
                break;
            }
        }

        if ($CheckInsert) {
            $stmt = $conn->prepare("INSERT INTO DEPENTMENT VALUES ('" . $idgen . "','" . $data['NAME_DEP'] ."','".$data['EMP_LEAD']."')");
            $stmt->execute();
            $text = "เพิ่มแผนกเสร็จสิ้น";
        }

        if (!empty($text)) {
            $message = urlencode($text); // Encode the message for safe URL use
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Department/Department.php?message=$message'</script>";
        } else {
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Department/Department.php'</script>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//function for select ALL data
function getAll($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM  DEPENTMENT ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
}

function getSingle($conn){

    if (isset($_GET['id'])) {
        $positionId = $_GET['id'];
    }
    try {
         $stmt = $conn->prepare("SELECT * FROM DEPENTMENT WHERE ID_DEP = :ID");
         $stmt->bindParam(':ID', $positionId, PDO::PARAM_STR);
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
 


function create($conn, $data,$ID)
{
   
    $NAME = $data['NAME_DEP'];
    $EMP_LEAD = $data['EMP_LEAD'];
    try {
        $stmt = $conn->prepare("INSERT INTO DEPENTMENT (ID_DEP, NAME_DEP, EMP_LEAD) VALUES (:ID, :NAME,:EMP_LEAD)");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':NAME', $NAME, PDO::PARAM_STR);
        $stmt->bindParam(':EMP_LEAD', $EMP_LEAD, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Department/Department.php'</script>";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//function for update data
function update($conn, $data)
{
    $ID=$data['ID_DEP'];
    $NAME = $data['NAME_DEP'];
    $EMP_LEAD = $data['EMP_LEAD'];
    try {
        $stmt = $conn->prepare("UPDATE DEPENTMENT SET NAME_DEP = :NAME_DEP, EMP_LEAD = :EMP_LEAD WHERE ID_DEP = :ID_DEP");
        $stmt->bindParam(':ID_DEP', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':NAME_DEP', $NAME, PDO::PARAM_STR);
        $stmt->bindParam(':EMP_LEAD', $EMP_LEAD, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Department/Department.php'</script>";
    } catch (PDOException $e) {
        echo "Error updating data: " . $e->getMessage();
    }
}


//function for delete data

function delete($conn, $data)
{
    $ID = $data['KEY']; // Use the correct data key 'KEY' to get the department ID
    try {
        $stmt = $conn->prepare("DELETE FROM DEPENTMENT WHERE ID_DEP = :ID");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Department/Department.php'</script>";
    //header("Location : ../view/Position/position.php");
}

?>