<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        $Dep = getDep($conn);
        $Pst = getPst($conn);
        $edit = getSingle($conn);
        break;
    case 'POST':
       if($_POST['_method']==="ADD"){
        create($conn, $_POST);
       }elseif($_POST['_method']==="EDIT"){
        update($conn,$_POST);
        //echo json_encode($_POST);
       }elseif($_POST['_method']==="DELETE"){
        delete($conn,$_POST);
        }elseif($_POST['_method']==="SEARCH"){
        search($conn,$_POST);
       } 
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}

function getSingle($conn){
    if (isset($_GET['id'])) {
        $employeeId = $_GET['id'];
    }
    try {
         $stmt = $conn->prepare("SELECT * FROM EMPLOYEE WHERE ID_EMP = ?");
         $stmt->bindParam(1, $employeeId, PDO::PARAM_STR);
         $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     } catch (PDOException $e) {
         echo $e->getMessage(); 
     } 
     return $result; 
 }

function getPst($conn){
    try {
         $pst = $conn->prepare("SELECT * FROM POSITION");
         $pst->execute();
         $result = $pst->fetchAll(PDO::FETCH_ASSOC);
     } catch (PDOException $e) {
         echo $e->getMessage(); 
     } 
     return $result; 
 }

function getDep($conn){
    try {
         $Depe = $conn->prepare("SELECT * FROM DEPENTMENT");
         $Depe->execute();
         $Depe = $Depe->fetchAll(PDO::FETCH_ASSOC);
     } catch (PDOException $e) {
         echo $e->getMessage(); 
     } 
     return $Depe; 
 }

//function for select ALL data
function getAll($conn){
   try {
        $EMP = $conn->prepare("SELECT * FROM EMPLOYEE,DEPENTMENT,POSITION WHERE EMPLOYEE.PSTNO=POSITION.ID_PST AND EMPLOYEE.DEPNO=DEPENTMENT.ID_DEP");
        $EMP->execute();
        $EMP = $EMP->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    } 
    return $EMP; 
}
//fuction for Create data
function create($conn, $data){
    $ID = $data['ID'];
    $NAME = $data['NAME'];
    $LNAME = $data['LNAME'];
    $SEX = $data['SEX'];
    $EMAIL = $data['EMAIL'];
    $B_DAY =  date("m-d-Y", strtotime($data['B_DAY']));
    $NATIONALITY = $data['NATIONALITY'];
    $STARTDATE = date("m-d-Y", strtotime($data['STARTDATE']));
    $ENDDATE = date("m-d-Y", strtotime($data['ENDDATE']));
    $DEPNO = $data['DEPNO'];
    $PSTNO = $data['PSTNO'];
    $SAL = $data['SAL'];
    $ADDRESS = $data['ADDRESS'];
    $TEL = $data['TEL'];
    $ID_POS = $data['ID_POS'];
    try {
        $stmt = $conn->prepare("INSERT INTO EMPLOYEE (ID_EMP, NAME, L_NAME, SEX, EMAIL, B_DAY, NATIONALITY, STARTDATE, ENDDATE, DEPNO, PSTNO, SAL, ADDRESS, TEL, ID_POS) 
        VALUES (:ID, :NAME, :L_NAME, :SEX, :EMAIL, TO_DATE(:B_DAY, 'MM-DD-YYYY'), :NATIONALITY, TO_DATE(:STARTDATE, 'MM-DD-YYYY'), TO_DATE(:ENDDATE, 'MM-DD-YYYY'), :DEPNO, :PSTNO, :SAL, :ADDRESS, :TEL, :ID_POS)");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':NAME', $NAME, PDO::PARAM_STR);
        $stmt->bindParam(':L_NAME', $LNAME, PDO::PARAM_STR);
        $stmt->bindParam(':SEX', $SEX, PDO::PARAM_STR);
        $stmt->bindParam(':EMAIL', $EMAIL, PDO::PARAM_STR);
        $stmt->bindParam(':B_DAY', $B_DAY, PDO::PARAM_STR); 
        $stmt->bindParam(':NATIONALITY', $NATIONALITY, PDO::PARAM_STR);
        $stmt->bindParam(':STARTDATE', $STARTDATE, PDO::PARAM_STR);
        $stmt->bindParam(':ENDDATE', $ENDDATE, PDO::PARAM_STR);
        $stmt->bindParam(':DEPNO', $DEPNO, PDO::PARAM_STR); 
        $stmt->bindParam(':PSTNO', $PSTNO, PDO::PARAM_STR);
        $stmt->bindParam(':SAL', $SAL, PDO::PARAM_STR); 
        $stmt->bindParam(':ADDRESS', $ADDRESS, PDO::PARAM_STR);
        $stmt->bindParam(':TEL', $TEL, PDO::PARAM_STR);   
        $stmt->bindParam(':ID_POS', $ID_POS, PDO::PARAM_STR);
        $stmt->execute();
       echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
//function for update data
function update($conn,$data){
    $ID_POS = $data['ID_POS'];
    $NAME = $data['NAME'];
    $LNAME = $data['LNAME'];
    $SEX = $data['SEX'];
    $EMAIL = $data['EMAIL'];
    $B_DAY = $data['B_DAY'];
    $NATIONALITY = $data['NATIONALITY'];
    $DATE_START = $data['DATE_START'];
    $DEPNO = $data['DEPNO'];
    $ID_LEAD = $data['ID_LEAD'];
    $PSTNO = $data['PSTNO'];
    $SAL = $data['SAL'];
    $PERMIS = $data['PERMIS'];
    $USER_ID = $data['USER_ID'];
    $PASSWORD = $data['PASSWORD'];
    $ADDRESS = $data['ADDRESS'];
    $TEL = $data['TEL'];
try {
    $stmt = $conn->prepare("UPDATE EMPLOYEE 
    SET  ID_POS = ? , NAME = ? , LNAME = ?  , SEX = ? , EMAIL = ? , 
    B_DAY = ? , NATIONALITY = ? , DATE_START = ? , DEPNO = ? , ID_LEAD = ? , 
    PSTNO = ? , SAL = ? , PERMIS = ? , USER_ID = ? ,PASSWORD = ? , ADDRESS = ? ,
    TEL = ? 
    WHERE ID_EMP = ?");
    $stmt->bindParam(1, $ID_POS, PDO::PARAM_STR);
    $stmt->bindParam(2, $NAME, PDO::PARAM_STR);
    $stmt->bindParam(3, $LNAME, PDO::PARAM_STR);
    $stmt->bindParam(4, $SEX, PDO::PARAM_STR);
    $stmt->bindParam(5, $EMAIL, PDO::PARAM_STR);
    $stmt->bindParam(6, $B_DAY, PDO::PARAM_STR); 
    $stmt->bindParam(7, $NATIONALITY, PDO::PARAM_STR);
    $stmt->bindParam(8, $DATE_START, PDO::PARAM_STR);
    $stmt->bindParam(9, $DEPNO, PDO::PARAM_STR); 
    $stmt->bindParam(10, $ID_LEAD, PDO::PARAM_STR);
    $stmt->bindParam(11, $PSTNO, PDO::PARAM_STR);
    $stmt->bindParam(12, $SAL, PDO::PARAM_STR); 
    $stmt->bindParam(13, $PERMIS, PDO::PARAM_STR);
    $stmt->bindParam(14, $USER_ID, PDO::PARAM_STR); 
    $stmt->bindParam(15, $PASSWORD, PDO::PARAM_STR);
    $stmt->bindParam(16, $ADDRESS, PDO::PARAM_STR);
    $stmt->bindParam(17, $TEL, PDO::PARAM_STR);  
    $stmt->execute();
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";

    
} catch(PDOException $e){
    echo $e->getMessage()." ".$e->getLine();
}
}
//fuction for delete data
function delete($conn, $data){
    $ID = $data['KYE'];
   try {
    $stmt = $conn->prepare("DELETE FROM EMPLOYEE WHERE ID_EMP = :ID");
    $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
    $stmt->execute();
   } catch (PDOException $e) {
        $e->getMessage();
   } 
   echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
}

//Search
function search($conn,$data){
    $name = isset($_GET['q']) ? $_GET['q'] : '';
    $DEPNO = $data['DEPNO'];
    $PSTNO = $data['PSTNO'];
    try {
        $stmt = $conn->prepare("SELECT * FROM EMPLOYEE,DEPENTMENT,POSITION WHERE (EMPLOYEE.PSTNO=POSITION.ID_PST AND EMPLOYEE.DEPNO=DEPENTMENT.ID_DEP) 
        AND (EMPLOYEE.NAME LIKE :name OR EMPLOYEE.LNAME LIKE :name OR EMPLOYEE.PSTNO LIKE :pstno OR EMPLOYEE.DEPNO LIKE :depno)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':depno', $DEPNO, PDO::PARAM_STR);
        $stmt->bindParam(':pstno', $PSTNO, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
     } catch (PDOException $e) {
         echo $e->getMessage(); 
     } 
     echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
 }
?>