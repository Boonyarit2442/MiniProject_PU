<?php
$server         = "203.188.54.7";
$db_username    = "inno094";
$db_password    = "P06D245";
$service_name   = "";
$sid            = "database";
$port           = 1521;
$dbtns          = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $server)(PORT = $port)) (CONNECT_DATA = (SERVICE_NAME = $service_name) (SID = $sid)))";
$Data;
try{
    $conn = new PDO("oci:dbname=".$dbtns, $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Success";
}catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

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
       } 
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}


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
       echo "<script>window.location = 'http://203.188.54.9/~u6411800010'</script>";
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function update($conn,$data){
    $ID = $data['NAME_ID'];
    $USER = $data['USER1'];
    echo "rit";
try {
    $stmt = $conn->prepare("UPDATE LOGIN SET USER1 = :USER WHERE NAME_ID = :ID1");
    $stmt->bindParam(':USER', $USER, PDO::PARAM_STR);
    $stmt->bindParam(':ID1', $ID, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();
    echo http_response_code(202);
    
} catch(PDOException $e){
    echo $e->getMessage();
}

}

function delete($conn, $ssn){
    $stmt = $conn->prepare("DELETE FROM employee WHERE ssn = :ssn");
    $stmt->bindParam(':ssn', $ssn, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Employee deleted."));
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Unable to delete Employee."));
    }
}

?>