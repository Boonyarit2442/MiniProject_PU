<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
$select_name;
$select_id;
switch ($method) {
    case 'GET':
        
        $select_name=getName($conn);
        $select_id=getID($conn);
        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {
            $idgen = generateID($conn, 'P', 'ID_PERM', 'PERMISSION');
            generatePerm($conn,$_POST, $idgen);
            //create($conn);
        } elseif ($_POST['_method'] === "EDIT") { 
            update($conn, $_POST);
        } elseif ($_POST['_method'] === "DELETE") {
            delete($conn, $_POST);
        }
        break;

        default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}

// Generate Permission
function generatePerm($conn,$data, $id_perm) {
    $Check_empty_box = TRUE;
    $stmt = $conn->prepare("SELECT * FROM PERMISSION");
    $stmt->execute();
    $data_all_perm = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for($i=0;$i < count($data_all_perm);$i++){
        
        if(empty($data['NAME_PERM'])){
            $Check_empty_box = FALSE ;
            echo "<script>window.location = 'pu2.php?error= Please enter the rights name.'</script>";
            break;
        }elseif(strtoupper($data_all_perm[$i]['NAME_PERM']) == strtoupper($data['NAME_PERM'])){
            $Check_empty_box = FALSE ;
            echo "<script>window.location = 'pu2.php?error= This permission already has information.'</script>";
            echo strtoupper($data_all_perm[$i]['NAME_PERM']).' & '.strtoupper($data['NAME_PERM']);
            break;
        }
    }
    if($Check_empty_box){
        if($data['NUM_PERM'] == 0){
            echo "<script>window.location = 'pu2.php?error= Please select at least one option from below.'</script>";
        }else{
            $stmt = $conn->prepare("INSERT INTO PERMISSION  VALUES ( '".$id_perm."' , '".$data['NAME_PERM']."', '".$data['NUM_PERM']."' )");
            $stmt->execute();
            echo "<script>window.location = 'pu2.php'</script>";
        }
    }

}

//function for select ALL data
function getName($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM PERMISSION");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function getID($conn)
{
    try {
        $stmt = $conn->prepare("SELECT ID_PERM FROM PERMISSION");
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
function create($conn)
{
    // Extract data from POST
    $name_perm = $_POST['NAME_PERM'];
    $num_perm = $_POST['NUM_PERM'];

    $id_perm = generateID($conn, 'P', 'ID_PERM', 'PERMISSION');

    try {
        $stmt = $conn->prepare("INSERT INTO PERMISSION (ID_PERM, NAME_PERM, NUM_PERM) VALUES (:id_perm, :name_perm, :num_perm)");
        $stmt->bindParam(':id_perm', $id_perm, PDO::PARAM_STR);
        $stmt->bindParam(':name_perm', $name_perm, PDO::PARAM_STR);
        $stmt->bindParam(':num_perm', $num_perm, PDO::PARAM_STR);
        $stmt->execute();
      
    } catch (PDOException $e) {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Error creating permission: " . $e->getMessage()));
    }
}

//function for update data

function getPermissionById($conn, $permissionId)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM PERMISSION WHERE ID_PERM = :id");
        $stmt->bindParam(':id', $permissionId , PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        // Handle any errors here
        return null;
    }
}
function update($conn, $data)
{
    
    $id_perm = $_POST['ID_PERM'];
    $name_perm = $_POST['NAME_PERM'];
    $num_perm = $_POST['NUM_PERM'];

    try {
        $stmt = $conn->prepare("UPDATE PERMISSION SET NAME_PERM = :NAME_PERM, NUM_PERM = :NUM_PERM WHERE ID_PERM = :ID_PERM");
        $stmt->bindParam(':ID_PERM', $id_perm, PDO::PARAM_STR);
        $stmt->bindParam(':NAME_PERM', $name_perm, PDO::PARAM_STR);
        $stmt->bindParam(':NUM_PERM', $num_perm, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/permission/pu.php'</script>";
       
    } catch (PDOException $e) {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Error updating data: " . $e->getMessage()));
    }
}


//function for delete data

function delete($conn, $data)
{
    $ID = $data['KEY']; // Use the correct data key 'KEY' to get the permission ID
    try {
        $stmt = $conn->prepare("DELETE FROM PERMISSION WHERE ID_PERM = :ID");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->execute();
        echo json_encode(array("message" => "Permission deleted successfully.")); // Respond with a success message
    } catch (PDOException $e) {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Error deleting permission: " . $e->getMessage()));
    }
}


?>