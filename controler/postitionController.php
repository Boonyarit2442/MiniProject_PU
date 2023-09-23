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
       }elseif($_POST['_method']==="EDIT"){
        update($conn,$_POST);
        //echo json_encode($_POST);
       }elseif($_POST['_method']==="DELETE"){
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
        $stmt = $conn->prepare("SELECT * FROM POSITION");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    } 
    return $result; 
}
//fuction for Create data
function create($conn, $data){
    $ID = $data['ID_PST'];
    $NAME = $data['NAME_PST'];
    $JOB_DETEL = $data['JOB_DETEL'];
    try {
        $stmt = $conn->prepare("INSERT INTO POSITION (ID_PST, NAME_PST, JOB_DETEL) VALUES (:ID, :NAME, :JOBDETEL)");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':NAME', $NAME, PDO::PARAM_STR);
        $stmt->bindParam(':JOB_DETEL', $JOB_DETEL, PDO::PARAM_STR); 
        $stmt->execute();
       echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Postion/position.php'</script>";
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
//function for update data
function update($conn,$data){
    $ID = $data['ID_PST'];
    $NAME = $data['NAME_PST'];
    $JOB_DETEL = $data['JOB_DETEL'];
try {
    $stmt = $conn->prepare("UPDATE POSITION SET  NAME_PST = ? , JOB_DETEL = ? WHERE ID_PST = ?");
    $stmt->bindParam(1, $NAME, PDO::PARAM_STR_CHAR);
    $stmt->bindParam(2, $JOB_DETEL, PDO::PARAM_STR_CHAR);
    $stmt->bindParam(3, $ID, PDO::PARAM_STR_CHAR);
    $stmt->execute();
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Postion/position.php'</script>";

    
} catch(PDOException $e){
    echo $e->getMessage()." ".$e->getLine();
}
}
//fuction for delete data
function delete($conn, $data){
    $ID = $data['KYE'];
   try {
    $stmt = $conn->prepare("DELETE FROM POSITION WHERE ID_PST = :ID");
    $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
    $stmt->execute();
   } catch (PDOException $e) {
        $e->getMessage();
   } 
   echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Postion/position.php'</script>";
}
?>