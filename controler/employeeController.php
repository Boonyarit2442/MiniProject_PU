<?php
require_once('ConnectDB.php');

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Test1 = getTest($conn);
        $Data = getAll($conn);
        $Dep = getDep($conn);
        $Pst = getPst($conn);
        $edit = getSingle($conn);
        $idgen = AutoGenID($conn,'E','ID_EMP','EMPLOYEE');
        break;
    case 'POST':
       if($_POST['_method']==="ADD"){
        create($conn, $_POST);
       }elseif($_POST['_method']==="EDIT"){
        //update($conn,$_POST);
        Checkname_lname($conn,$_POST,"EDIT");

        //echo json_encode($_POST['STARTDATE']);
       }elseif($_POST['_method']==="DELETE"){
        delete($conn,$_POST);
        }elseif($_POST['_method']==="SEARCH"){
        search($conn,$_POST);
       }elseif($_POST['_method']==="CANCEL"){
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
       } elseif($_POST['_method']==="ADD_V2"){
        Checkname_lname($conn,$_POST,"ADD_V2");
        //$Test = Checkname_lname($conn,$_POST);
        //echo $Test;
       }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}

// Check Name || Lname
function Checkname_lname($conn,$data,$Add_OR_Ediit){
    $CheckUpate = TRUE;
    $CheckInsert = TRUE;

    $ID = $data['ID'];
    $NAME = $data['NAME'];
    $LNAME = $data['LNAME'];
    $SEX = $data['SEX'];
    $EMAIL = $data['EMAIL'];
    $B_DAY =  date("m-d-Y", strtotime($data['B_DAY']));
    $NATIONALITY = $data['NATIONALITY'];
    $STARTDATE = date("m-d-Y", strtotime($data['STARTDATE']));
    $DEPNO = $data['DEPNO'];
    $PSTNO = $data['PSTNO'];
    $SAL = $data['SAL'];
    $ADDRESS = $data['ADDRESS'];
    $TEL = $data['TEL'];
    $ID_POS = $data['ID_POS'];
    $LEAD = $data['LEAD'];
    $USER = $data['USER'];
    $PASSWORD = $data['PASSWORD'];

    try{
        $EMP_ALL = $conn->prepare("SELECT ID_EMP , NAME , L_NAME , EMAIL , USER_ID , PASSWORD FROM EMPLOYEE");
        $EMP_ALL->execute();
        $EMP_ALL = $EMP_ALL->fetchAll(PDO::FETCH_ASSOC);
        if($Add_OR_Ediit == "ADD_V2"){
            for($i=0 ; $i < count($EMP_ALL); $i++){
                if($EMP_ALL[$i]['ID_EMP'] == $data['ID']){
                    $CheckInsert = FALSE;
                    echo "<script>window.location = 'registration_emp.php'</script>";
                    break;
                }elseif(strtoupper($EMP_ALL[$i]['NAME']) == strtoupper($data['NAME']) && strtoupper($EMP_ALL[$i]['L_NAME']) == strtoupper($data['LNAME'])){
                    $CheckInsert = FALSE;
                    echo "<script>window.location = 'registration_emp.php?error= This employee already has information.'</script>";
                    break;
                }elseif(empty($data['ID']) || empty($data['NAME']) || empty($data['LNAME']) || empty($data['SEX']) || empty($data['EMAIL']) || 
                empty($data['B_DAY']) || empty($data['NATIONALITY']) || empty($data['STARTDATE']) || empty($data['DEPNO']) || empty($data['PSTNO']) || 
                empty($data['SAL']) || empty($data['ADDRESS']) || empty($data['TEL']) || empty($data['ID_POS']) || empty($data['LEAD']) || 
                empty($data['USER']) || empty($data['PASSWORD'])){
                    $CheckInsert = FALSE;
                    echo "<script>window.location = 'registration_emp.php?error= Please fill out the information completely.'</script>";
                    break;
                }elseif(strlen($data['ID_POS']) != 13 || strlen($data['TEL']) != 10){
                    $CheckInsert = false;
                    if(strlen($_POST['ID_POS']) != 13){
                        echo "<script>window.location = 'registration_emp.php?error= This ssn not equal to 13.'</script>";
                        break;
                    }else{
                        echo "<script>window.location = 'registration_emp.php?error= This tel not equal to 10.'</script>";
                        break;
                    } 
                }elseif($EMP_ALL[$i]['EMAIL'] == $data['EMAIL']){
                    $CheckInsert = FALSE;
                    echo "<script>window.location = 'registration_emp.php?error= This email already has information.'</script>";
                    break;
                }elseif($EMP_ALL[$i]['USER_ID']== $data['USER']){
                    $CheckInsert = FALSE;
                    echo "<script>window.location = 'registration_emp.php?error= This user id is already.'</script>";
                    break;
                }
            }
            if($CheckInsert){
                $stmt = $conn->prepare("INSERT INTO EMPLOYEE (ID_EMP, NAME, L_NAME, SEX, EMAIL, B_DAY, NATIONALITY, STARTDATE, DEPNO, PSTNO, SAL, ADDRESS, TEL, ID_POS,ID_LEAD,USER_ID,PASSWORD) 
                VALUES (:ID, :NAME, :L_NAME, :SEX, :EMAIL, TO_DATE(:B_DAY, 'MM-DD-YYYY'), :NATIONALITY, TO_DATE(:STARTDATE, 'MM-DD-YYYY'), :DEPNO, :PSTNO, :SAL, :ADDRESS, :TEL, :ID_POS,:ID_LEAD,:USER_ID,:PASSWORD)");
                $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
                $stmt->bindParam(':NAME', $NAME, PDO::PARAM_STR);
                $stmt->bindParam(':L_NAME', $LNAME, PDO::PARAM_STR);
                $stmt->bindParam(':SEX', $SEX, PDO::PARAM_STR);
                $stmt->bindParam(':EMAIL', $EMAIL, PDO::PARAM_STR);
                $stmt->bindParam(':B_DAY', $B_DAY, PDO::PARAM_STR); 
                $stmt->bindParam(':NATIONALITY', $NATIONALITY, PDO::PARAM_STR);
                $stmt->bindParam(':STARTDATE', $STARTDATE, PDO::PARAM_STR);
                $stmt->bindParam(':DEPNO', $DEPNO, PDO::PARAM_STR); 
                $stmt->bindParam(':PSTNO', $PSTNO, PDO::PARAM_STR);
                $stmt->bindParam(':SAL', $SAL, PDO::PARAM_STR); 
                $stmt->bindParam(':ADDRESS', $ADDRESS, PDO::PARAM_STR);
                $stmt->bindParam(':TEL', $TEL, PDO::PARAM_STR);   
                $stmt->bindParam(':ID_POS', $ID_POS, PDO::PARAM_STR);
                $stmt->bindParam(':ID_LEAD', $LEAD, PDO::PARAM_STR);   
                $stmt->bindParam(':USER_ID', $USER, PDO::PARAM_STR);
                $stmt->bindParam(':PASSWORD', $PASSWORD, PDO::PARAM_STR);
                $stmt->execute();
                echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
            }
        }elseif($Add_OR_Ediit == "EDIT"){
            $EMP_EDIT = $conn->prepare("SELECT NAME , L_NAME , EMAIL , USER_ID , PASSWORD FROM EMPLOYEE WHERE ID_EMP = '".$_GET['id']."'");
            $EMP_EDIT->execute();
            $EMP_EDIT = $EMP_EDIT->fetchAll(PDO::FETCH_ASSOC);

            if($EMP_EDIT[0]['NAME'] != $data['NAME'] || $EMP_EDIT[0]['L_NAME'] != $data['LNAME']){
                if(empty($data['NAME']) || empty($data['LNAME'])){
                    $CheckUpate = FALSE;
                    echo "<script>window.location = 'edit_registration_emp.php?id=".$_GET['id']."&error= Please fill out the information completely.'</script>";
                }else{
                    for($j=0 ; $j < count($EMP_ALL); $j++){
                        if(strtoupper($EMP_ALL[$j]['NAME']) == strtoupper($data['NAME']) && strtoupper($EMP_ALL[$j]['L_NAME']) == strtoupper($data['LNAME'])){
                            $CheckUpate = FALSE;
                            echo "<script>window.location = 'edit_registration_emp.php?id=".$_GET['id']."&error= This name or lname already has information.'</script>";
                        }
                    }
                }
            }elseif(strlen($data['ID_POS']) != 13 || strlen($data['TEL']) != 10){
                $CheckInsert = false;
                if(strlen($_POST['ID_POS']) != 13){
                    echo "<script>window.location = 'edit_registration_emp.php?id=".$_GET['id']."&error= This ssn not equal to 13.'</script>";
                    
                }else{
                    echo "<script>window.location = 'edit_registration_emp.php?id=".$_GET['id']."&error= This tel not equal to 10.'</script>";
                    
                } 
            }elseif(empty($data['ID']) || empty($data['NAME']) || empty($data['LNAME']) || empty($data['SEX']) || empty($data['EMAIL']) || 
            empty($data['B_DAY']) || empty($data['NATIONALITY']) || empty($data['STARTDATE']) || empty($data['DEPNO']) || empty($data['PSTNO']) || 
            empty($data['SAL']) || empty($data['ADDRESS']) || empty($data['TEL']) || empty($data['ID_POS']) || empty($data['LEAD']) || 
            empty($data['USER']) || empty($data['PASSWORD'])){
                $CheckUpate = FALSE;
                echo "<script>window.location = 'edit_registration_emp.php?id=".$_GET['id']."&error= Please fill out the information completely.'</script>";
            }elseif($EMP_EDIT[0]['EMAIL'] != $data['EMAIL']){
                for($j=0 ; $j < count($EMP_ALL); $j++){
                    if($EMP_ALL[$j]['EMAIL'] == $data['EMAIL']){
                        $CheckUpate = FALSE;
                        echo "<script>window.location = 'edit_registration_emp.php?id=".$_GET['id']."&error= This email already has information.'</script>";
                    }
                }
            }elseif($EMP_EDIT[0]['USER_ID'] != $data['USER']){
                for($j=0 ; $j < count($EMP_ALL); $j++){
                    if($EMP_ALL[$j]['USER_ID']== $data['USER']){
                        $CheckUpate = FALSE;
                        echo "<script>window.location = 'edit_registration_emp.php?id=".$_GET['id']."&error= This user id is already.'</script>";
                        break;
                    }
                }
            }
            if($CheckUpate){
                $stmt = $conn->prepare("UPDATE EMPLOYEE 
                SET  ID_EMP = ? , NAME = ? , L_NAME = ?  , SEX = ? , EMAIL = ? , 
                B_DAY = TO_DATE(?, 'MM-DD-YYYY') , NATIONALITY = ? , STARTDATE = TO_DATE(?, 'MM-DD-YYYY') , DEPNO = ? , 
                PSTNO = ? , SAL = ? , ADDRESS = ? , TEL = ? , ID_POS = ? ,ID_LEAD = ? ,USER_ID = ? ,PASSWORD = ?
                WHERE ID_EMP = ?");
                $stmt->bindParam(1, $ID, PDO::PARAM_STR);
                $stmt->bindParam(2, $NAME, PDO::PARAM_STR);
                $stmt->bindParam(3, $LNAME, PDO::PARAM_STR);
                $stmt->bindParam(4, $SEX, PDO::PARAM_STR);
                $stmt->bindParam(5, $EMAIL, PDO::PARAM_STR);
                $stmt->bindParam(6, $B_DAY, PDO::PARAM_STR); 
                $stmt->bindParam(7, $NATIONALITY, PDO::PARAM_STR);
                $stmt->bindParam(8, $STARTDATE, PDO::PARAM_STR);
                $stmt->bindParam(9, $DEPNO, PDO::PARAM_STR); 
                $stmt->bindParam(10, $PSTNO, PDO::PARAM_STR);
                $stmt->bindParam(11, $SAL, PDO::PARAM_STR); 
                $stmt->bindParam(12, $ADDRESS, PDO::PARAM_STR);
                $stmt->bindParam(13, $TEL, PDO::PARAM_STR);   
                $stmt->bindParam(14, $ID_POS, PDO::PARAM_STR);
                $stmt->bindParam(15, $LEAD, PDO::PARAM_STR);   
                $stmt->bindParam(16, $USER, PDO::PARAM_STR);
                $stmt->bindParam(17, $PASSWORD, PDO::PARAM_STR);
                $stmt->bindParam(18, $ID, PDO::PARAM_STR);
                $stmt->execute();
                echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
            }
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

// Test2
function getSpecificData($conn,$depart,$position){
    try {
        $EMPT2 = $conn->prepare("SELECT *
        FROM EMPLOYEE E
        LEFT JOIN POSITION P ON E.PSTNO = P.ID_PST 
        LEFT JOIN DEPENTMENT D ON D.ID_DEP=E.DEPNO
        WHERE DEPNO = '$depart' and PSTNO = '$position' ");
        $EMPT2->execute();
        $EMPT2 = $EMPT2->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    } 
    return $EMPT2; 
}

// Test
function getTest($conn,$depart='D000',$position='P000'){
    try {
        $EMPT = $conn->prepare("SELECT *
        FROM EMPLOYEE E
        LEFT JOIN POSITION P ON E.PSTNO = P.ID_PST 
        LEFT JOIN DEPENTMENT D ON D.ID_DEP=E.DEPNO
        WHERE DEPNO = '$depart' and PSTNO = '$position' ");
        $EMPT->execute();
        $EMPT = $EMPT->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    } 
    return $EMPT; 
}

function AutoGenID($conn, $char, $col, $tablename)
{
    $stmt = $conn->prepare("SELECT CONCAT('" . $char . "',LPAD(SUBSTR(MAX(" . $col . "),2,4)+1,3,0)) as AUTOID FROM " . $tablename);
    $stmt->execute();
    $info = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $info;
}
function getSingle($conn){
    if (isset($_GET['id'])) {
        $employeeId = $_GET['id'];
    }
    try {
         $stmt = $conn->prepare("SELECT * FROM EMPLOYEE WHERE ID_EMP = :ID");
         $stmt->bindParam(':ID', $employeeId, PDO::PARAM_STR);
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
        $EMP = $conn->prepare("SELECT *
        FROM EMPLOYEE E
        LEFT JOIN POSITION P ON E.PSTNO = P.ID_PST 
        LEFT JOIN DEPENTMENT D ON D.ID_DEP=E.DEPNO
        ");
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
    $DEPNO = $data['DEPNO'];
    $PSTNO = $data['PSTNO'];
    $SAL = $data['SAL'];
    $ADDRESS = $data['ADDRESS'];
    $TEL = $data['TEL'];
    $ID_POS = $data['ID_POS'];
    $LEAD = $data['LEAD'];
    $USER = $data['USER'];
    $PASSWORD = $data['PASSWORD'];
    try {
        $stmt = $conn->prepare("INSERT INTO EMPLOYEE (ID_EMP, NAME, L_NAME, SEX, EMAIL, B_DAY, NATIONALITY, STARTDATE, DEPNO, PSTNO, SAL, ADDRESS, TEL, ID_POS,ID_LEAD,USER_ID,PASSWORD) 
        VALUES (:ID, :NAME, :L_NAME, :SEX, :EMAIL, TO_DATE(:B_DAY, 'MM-DD-YYYY'), :NATIONALITY, TO_DATE(:STARTDATE, 'MM-DD-YYYY'), :DEPNO, :PSTNO, :SAL, :ADDRESS, :TEL, :ID_POS,:ID_LEAD,:USER_ID,:PASSWORD)");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':NAME', $NAME, PDO::PARAM_STR);
        $stmt->bindParam(':L_NAME', $LNAME, PDO::PARAM_STR);
        $stmt->bindParam(':SEX', $SEX, PDO::PARAM_STR);
        $stmt->bindParam(':EMAIL', $EMAIL, PDO::PARAM_STR);
        $stmt->bindParam(':B_DAY', $B_DAY, PDO::PARAM_STR); 
        $stmt->bindParam(':NATIONALITY', $NATIONALITY, PDO::PARAM_STR);
        $stmt->bindParam(':STARTDATE', $STARTDATE, PDO::PARAM_STR);
        $stmt->bindParam(':DEPNO', $DEPNO, PDO::PARAM_STR); 
        $stmt->bindParam(':PSTNO', $PSTNO, PDO::PARAM_STR);
        $stmt->bindParam(':SAL', $SAL, PDO::PARAM_STR); 
        $stmt->bindParam(':ADDRESS', $ADDRESS, PDO::PARAM_STR);
        $stmt->bindParam(':TEL', $TEL, PDO::PARAM_STR);   
        $stmt->bindParam(':ID_POS', $ID_POS, PDO::PARAM_STR);
        $stmt->bindParam(':ID_LEAD', $LEAD, PDO::PARAM_STR);   
        $stmt->bindParam(':USER_ID', $USER, PDO::PARAM_STR);
        $stmt->bindParam(':PASSWORD', $PASSWORD, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
//function for update data
function update($conn,$data){
    $ID = $data['ID'];
    $NAME = $data['NAME'];
    $LNAME = $data['LNAME'];
    $SEX = $data['SEX'];
    $EMAIL = $data['EMAIL'];
    $B_DAY =  date("m-d-Y", strtotime($data['B_DAY']));
    $NATIONALITY = $data['NATIONALITY'];
    $STARTDATE = date("m-d-Y", strtotime($data['STARTDATE']));
    $DEPNO = $data['DEPNO'];
    $PSTNO = $data['PSTNO'];
    $SAL = $data['SAL'];
    $ADDRESS = $data['ADDRESS'];
    $TEL = $data['TEL'];
    $ID_POS = $data['ID_POS'];
    $LEAD = $data['LEAD'];
    $USER = $data['USER'];
    $PASSWORD = $data['PASSWORD'];
try {
    $stmt = $conn->prepare("UPDATE EMPLOYEE 
    SET  ID_EMP = ? , NAME = ? , L_NAME = ?  , SEX = ? , EMAIL = ? , 
    B_DAY = TO_DATE(?, 'MM-DD-YYYY') , NATIONALITY = ? , STARTDATE = TO_DATE(?, 'MM-DD-YYYY') , DEPNO = ? , 
    PSTNO = ? , SAL = ? , ADDRESS = ? , TEL = ? , ID_POS = ? ,ID_LEAD = ? ,USER_ID = ? ,PASSWORD = ?
    WHERE ID_EMP = ?");
    $stmt->bindParam(1, $ID, PDO::PARAM_STR);
    $stmt->bindParam(2, $NAME, PDO::PARAM_STR);
    $stmt->bindParam(3, $LNAME, PDO::PARAM_STR);
    $stmt->bindParam(4, $SEX, PDO::PARAM_STR);
    $stmt->bindParam(5, $EMAIL, PDO::PARAM_STR);
    $stmt->bindParam(6, $B_DAY, PDO::PARAM_STR); 
    $stmt->bindParam(7, $NATIONALITY, PDO::PARAM_STR);
    $stmt->bindParam(8, $STARTDATE, PDO::PARAM_STR);
    $stmt->bindParam(9, $DEPNO, PDO::PARAM_STR); 
    $stmt->bindParam(10, $PSTNO, PDO::PARAM_STR);
    $stmt->bindParam(11, $SAL, PDO::PARAM_STR); 
    $stmt->bindParam(12, $ADDRESS, PDO::PARAM_STR);
    $stmt->bindParam(13, $TEL, PDO::PARAM_STR);   
    $stmt->bindParam(14, $ID_POS, PDO::PARAM_STR);
    $stmt->bindParam(15, $LEAD, PDO::PARAM_STR);   
    $stmt->bindParam(16, $USER, PDO::PARAM_STR);
    $stmt->bindParam(17, $PASSWORD, PDO::PARAM_STR);
    $stmt->bindParam(18, $ID, PDO::PARAM_STR);
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