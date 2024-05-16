<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
$Data ;
switch ($method) {
    case 'GET':
        $Perm = getPerm($conn);
        $Data = getAll($conn);
        $Pst = getPST($conn);
        $Depname = getnameDep($conn);
        $Dep = getDep($conn);
        $Job = getJob($conn);
        $edit = getSingle($conn);

        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {
            //echo $_POST['NAME_DEP'];
            $positionID = generateID($conn, 'P', 'ID_PST', 'POSITION');
            $departmentID = getIDDep($conn);
            $permissionID = getIDPerm($conn);
            generatePos($conn,$_POST,$positionID,$departmentID,$permissionID);

            /*$jobdetail = $_POST['JOB_DETEL'];
            $positionName = $_POST['NAME_PST'];
            $departmentID = getIDDep($conn);
            $permissionID = getIDPerm($conn);
            $positionID = generateID($conn, 'P', 'ID_PST', 'POSITION');
            create($conn, $positionID, $positionName, $departmentID, $permissionID, $jobdetail);*/

        } elseif ($_POST['_method'] === "EDIT") {
            Check_User_Error($conn,$_POST);
            //$edit = getSingle($conn);
            //update($conn, $_POST,$edit);
        } elseif ($_POST['_method'] === "DELETE") {
            delete($conn, $_POST);
        }
        elseif($_POST['_method']==="CANCEL"){
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Position/position.php'</script>";
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}

function Check_User_Error($conn,$data){
    $CheckUpdate = true;

    $Id_pos= $_GET['id'];
    $NAME = $data['NAME_PST'];
    $Permiss = $data['NAME_PERM'];
    $DEPART = $data['NAME_DEP'];
    $JOB_DETEL = $data['JOB_DETEL'];

    // Data Position All
    $Pos_ALL = $conn->prepare("SELECT * FROM  POSITION P 
          JOIN DEPENTMENT D ON P.P_DEPNO = D.ID_DEP 
          JOIN PERMISSION M ON P.PERNO = M.ID_PERM 
        ");
    $Pos_ALL->execute();
    $Pos_ALL = $Pos_ALL->fetchAll(PDO::FETCH_ASSOC);
    
    // Data Position Edit
    $Pos_EDIT = $conn->prepare("SELECT * FROM  POSITION P 
          JOIN DEPENTMENT D ON P.P_DEPNO = D.ID_DEP 
          JOIN PERMISSION M ON P.PERNO = M.ID_PERM 
          WHERE ID_PST = '".$_GET['id']."'
        ");
    $Pos_EDIT->execute();
    $Pos_EDIT = $Pos_EDIT->fetchAll(PDO::FETCH_ASSOC);

    //$Pos_EDIT = $conn->prepare("SELECT * FROM EMPLOYEE JOIN POSITION on EMPLOYEE.PSTNO = POSITION.ID_PST WHERE ")
    if(empty($data['NAME_PST'])){  
        $CheckUpdate = false;
        echo "<script>window.location = 'Edit_position.php?id=".$_GET['id']."&error= Please fill out the information completely.'</script>";
    }elseif($Pos_EDIT[0]['NAME_PST'] != $data['NAME_PST']){
        for($i=0;$i < count($Pos_ALL);$i++){
            if(strtoupper($Pos_ALL[$i]['NAME_PST']) == strtoupper($data['NAME_PST'])){
                $CheckUpdate = false;
                echo "<script>window.location = 'Edit_position.php?id=".$_GET['id']."&error= This position already has information.'</script>";
            }
        }
    }
    if($CheckUpdate){
        $stmt = $conn->prepare("UPDATE POSITION SET NAME_PST = :NAME_PST, PERNO = :PERMIS , P_DEPNO=:DEPNO , JOB_DETEL = :JOB_DETEL WHERE ID_PST = :ID");
        $stmt->bindParam(':NAME_PST', $NAME, PDO::PARAM_STR);
        $stmt->bindParam(':DEPNO', $DEPART, PDO::PARAM_STR);
        $stmt->bindParam(':PERMIS', $Permiss, PDO::PARAM_STR);
        $stmt->bindParam(':JOB_DETEL', $JOB_DETEL, PDO::PARAM_STR);
        $stmt->bindParam(':ID', $Id_pos, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Position/position.php'</script>";
    }
}

function generatePos($conn,$data,$idgen,$depID,$perID){
    $CheckInsert = TRUE ;
    try{
            if(empty($data['NAME_DEP']) || empty($data['NAME_PERM']) || empty($data['JOB_DETEL']) || empty($data['NAME_PST'])){
                $CheckInsert = FALSE ;
                echo "<script>window.location = 'position.php?error= Please fill out the information completely.'</script>";
            }else {
                $stmt = $conn->prepare("SELECT POSITION.NAME_PST , DEPENTMENT.NAME_DEP FROM POSITION JOIN DEPENTMENT on POSITION.P_DEPNO = DEPENTMENT.ID_DEP WHERE DEPENTMENT.NAME_DEP = '".$data['NAME_DEP']."'");
                $stmt->execute();
                $data_where_pos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                for($i=0 ; $i < count($data_where_pos);$i++){
                    if(strtoupper($data_where_pos[$i]['NAME_PST']) == strtoupper($data['NAME_PST'])){
                        $CheckInsert = FALSE ;
                        echo "<script>window.location = 'position.php?error= This position already has information.'</script>";
                        break;
                    }
                }
            }
            /*elseif(strtoupper($data_all_pos[$i]['NAME_DEP']) == strtoupper($data['NAME_PST'])){
                $CheckInsert = FALSE ;
                echo "<script>window.location = 'position.php?error= This department already has information.'</script>";
            }*/
        
        if($CheckInsert){
            $stmt = $conn->prepare("INSERT INTO POSITION VALUES ('".$idgen."','".$data['NAME_PST']."','".$depID[0]['ID_DEP']."','".$data['JOB_DETEL']."','".$perID[0]['ID_PERM']."')");
            $stmt->execute();
            echo "<script>window.location = 'position.php'</script>";
        }
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

function getAll($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM  POSITION P 
          JOIN DEPENTMENT D ON P.P_DEPNO = D.ID_DEP 
          JOIN PERMISSION M ON P.PERNO = M.ID_PERM 
        ");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}

function getSingle($conn){

    if (isset($_GET['id'])) {
        $positionId = $_GET['id'];
    }
    try {
         $stmt = $conn->prepare("SELECT * FROM POSITION WHERE ID_PST = :ID");
         $stmt->bindParam(':ID', $positionId, PDO::PARAM_STR);
         $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     } catch (PDOException $e) {
         echo $e->getMessage(); 
     } 
     return $result; 
 }

function getPST($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM POSITION ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
        return array(); // Return an empty array in case of an error
    }
}
function getJob($conn)
{
    try {
        $stmt = $conn->prepare("SELECT JOB_DETEL FROM POSITION ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
        return array(); // Return an empty array in case of an error
    }
}

function getDep($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM DEPENTMENT");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
        return array(); // Return an empty array in case of an error
    }
}

function getnameDep($conn)
{
    try {
        $stmt = $conn->prepare("SELECT DISTINCT NAME_DEP FROM DEPENTMENT");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
        return array(); // Return an empty array in case of an error
    }
}



function getPSTdep($conn, $Iddep)
{
    try {
        $stmt = $conn->prepare("SELECT DISTINCT NAME_PST FROM POSTION JOIN DEPENTMENT ON POSITION.DEPNO=DEPENTMENT.ID_DEP WHERE P_DEPNO ='" . $Iddep . "'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
        return array(); // Return an empty array in case of an error
    }
}


function getPerm($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM PERMISSION");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
        return array(); // Return an empty array in case of an error
    }
}


//----------------------------------------------------------------------------------------
function getIDDep($conn)
{
    $sql = "SELECT ID_DEP FROM DEPENTMENT  WHERE NAME_DEP ='" . $_POST['NAME_DEP'] . "'";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
        return false; // Return false to indicate an error
    }
}

function getIDPerm($conn)
{
    $sql = "SELECT ID_PERM FROM PERMISSION   WHERE NAME_PERM ='" . $_POST['NAME_PERM'] . "'";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
        return false; // Return false to indicate an error
    }
}
//----------------------------------------------------------------------------------------


function create($conn, $positionID, $positionName, $departmentID, $permissionID, $jobdetail)
{
    try {
        $stmt = $conn->prepare("INSERT INTO POSITION (ID_PST, NAME_PST, P_DEPNO, PERNO,JOB_DETEL) VALUES (:id_pst, :NAME_PST, :P_DEPNO, :PERNO,:JOB_DETAIL)");
        $stmt->bindParam(':id_pst', $positionID, PDO::PARAM_STR);
        $stmt->bindParam(':NAME_PST', $positionName, PDO::PARAM_STR);
        $stmt->bindParam(':P_DEPNO', $departmentID[0]['ID_DEP'], PDO::PARAM_STR);
        $stmt->bindParam(':PERNO', $permissionID[0]['ID_PERM'], PDO::PARAM_STR);
        $stmt->bindParam(':JOB_DETAIL', $jobdetail, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Position/position.php'</script>";
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
    }
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

function update($conn, $data)
{
    $Id_pos= $data['ID_PST'];
    $NAME = $data['NAME_PST'];
    $Permiss = $data['NAME_PERM'];
    $DEPART = $data['NAME_DEP'];
    $JOB_DETEL = $data['JOB_DETEL'];

    try {
        $stmt = $conn->prepare("UPDATE POSITION SET NAME_PST = :NAME_PST, PERNO = :PERMIS , P_DEPNO=:DEPNO , JOB_DETEL = :JOB_DETEL WHERE ID_PST = :ID");
        $stmt->bindParam(':NAME_PST', $NAME, PDO::PARAM_STR);
        $stmt->bindParam(':DEPNO', $DEPART, PDO::PARAM_STR);
        $stmt->bindParam(':PERMIS', $Permiss, PDO::PARAM_STR);
        $stmt->bindParam(':JOB_DETEL', $JOB_DETEL, PDO::PARAM_STR);
        $stmt->bindParam(':ID', $Id_pos, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Position/position.php'</script>";
        exit;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
    }
}

function delete($conn, $data)
{
    $ID = $data['KYE'];
    try {
        $stmt = $conn->prepare("DELETE FROM POSITION WHERE ID_PST = :ID");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->execute();

        exit;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Database Error: " . $e->getMessage();
    }
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Position/position.php'</script>";
}


?>