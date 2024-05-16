<?php
require_once('../../controler/ConnectDB.php');

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        break;
    case 'POST':
       if($_POST['_method']==="DELETE"){
        delete($conn, $_POST);
        }break;
    default:
        http_response_code(405); 
        echo json_encode(array("message" => "Method not allowed."));
}
function getAll($conn){
    try {
         $EMP = $conn->prepare("SELECT * FROM NEW_EMP");
         $EMP->execute();
         $EMP = $EMP->fetchAll(PDO::FETCH_ASSOC); 
     } catch (PDOException $e) {
         echo $e->getMessage(); 
     } 
     return $EMP; 
 }
 //fuction f
function delete($conn, $data){
    $ID = $data['KYE'];
   try {
    $stmt = $conn->prepare("DELETE FROM NEW_EMP WHERE ID_NEMP = :ID");
    $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
    $stmt->execute();
   } catch (PDOException $e) {
        $e->getMessage();
   } 

   echo "<script>window.location = 'pannic.php'</script>";
}?>
