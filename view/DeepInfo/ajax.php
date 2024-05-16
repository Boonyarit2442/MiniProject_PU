<?php 
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        echo "rit0";
        break;
    case 'POST':
        if($_POST['_method']=="Dep"){
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_decode(array("message" => "Method not allowed."));
}
function Select_Pst(){

}
?>