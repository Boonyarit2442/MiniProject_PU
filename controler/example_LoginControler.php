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
        $stmt = $conn->prepare("SELECT * FROM LOGIN");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        echo $e->getMessage(); 
    } 
    return $result; 
}
//fuction for Create data
function create($conn, $data){
    $ID = $data['NAME_ID'];
    $USER = $data['USER1'];
    $PASSWORD = $data['PASSWORD'];
    try {
        $stmt = $conn->prepare("INSERT INTO LOGIN (NAME_ID, USER1, PASSWORD) VALUES (:ID, :USER1, :PASSWORD)");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':USER1', $USER, PDO::PARAM_STR);
        $stmt->bindParam(':PASSWORD', $PASSWORD, PDO::PARAM_STR); 
        $stmt->execute();
       echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/example/example_Login.php'</script>";
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
//function for update data
function update($conn,$data){
    $ID = $data['NAME_ID'];
    $USER = $data['USER1'];
    $PASSWROD = $data['PASSWORD'];
try {
    $stmt = $conn->prepare("UPDATE LOGIN SET  USER1 = ? , PASSWORD = ? WHERE NAME_ID = ?");
    $stmt->bindParam(1, $USER, PDO::PARAM_STR_CHAR);
    $stmt->bindParam(2, $PASSWROD, PDO::PARAM_STR_CHAR);
    $stmt->bindParam(3, $ID, PDO::PARAM_STR_CHAR);
    $stmt->execute();
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/example/example_Login.php'</script>";

    
} catch(PDOException $e){
    echo $e->getMessage()." ".$e->getLine();
}
}
//fuction for delete data
function delete($conn, $data){
    $ID = $data['KYE'];
   try {
    $stmt = $conn->prepare("DELETE FROM LOGIN WHERE NAME_ID = :ID");
    $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
    $stmt->execute();
   } catch (PDOException $e) {
        $e->getMessage();
   } 
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/example/example_Login.php'</script>";
}

?>