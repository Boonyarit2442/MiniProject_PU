<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        break;
    case 'POST':
       if($_POST['_method']==="ADD"){
        create($conn, $_POST);
       } elseif($_POST['_method']==="EDIT"){
        update($conn,$_POST);
       } elseif($_POST['_method']==="DELETE"){
        delete($conn,$_POST);
       } 
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}

//function for select ALL data
function getAll($conn){
   try {
        $stmt = $conn->prepare("SELECT * FROM DEPENTMENT");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    } 
    return $result; 
}
//function for Create data
function create($conn, $data){
    $ID = $data['ID_DEP'];
    $NAME = $data['NAME_DEP'];
    $EMP_LEAD = $data['EMP_LEAD'];
    try {
        $stmt = $conn->prepare("INSERT INTO EMPLOYEE (ID_EMP
        ,NAME
        ,L_NAME
        ,B_DAY
        ,SEX
        ,SAL
        ,ADDRESS
        ,EMAIL
        ,ID_POS
        ,NATIONALITY
        ,ID_LEAD
        ,USER_ID
        ,PASSWORD
        ,PERMIS(FK PERMISSION.ID_PERM)) VALUES (:ID, :NAME,:EMP_LEAD)");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':NAME', $NAME, PDO::PARAM_STR);
        $stmt->bindParam(':EMP_LEAD', $EMP_LEAD, PDO::PARAM_STR); 
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//function for update data
function update($conn,$data){
    $ID = $data['ID_DEP'];
    $NAME = $data['NAME_DEP'];
    $EMP_LEAD = $data['EMP_LEAD'];
    try {
        $stmt = $conn->prepare("UPDATE EMPLOYEE SET NAME_DEP = :NAME, EMP_LEAD = :EMP_LEAD WHERE ID_DEP = :ID");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':NAME', $NAME, PDO::PARAM_STR);
        $stmt->bindParam(':EMP_LEAD', $EMP_LEAD, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
    } catch(PDOException $e){
        echo $e->getMessage()." ".$e->getLine();
    }
}

//function for delete data
function delete($conn, $data){
    $ID = $data['KEY'];
    try {
        $stmt = $conn->prepare("DELETE FROM EMPLOYEE WHERE ID_DEP = :ID");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    } 
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
   //header("Location : ../view/Position/position.php");
}
?>
