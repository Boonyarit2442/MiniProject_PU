<?php include ('../../controler/ConnectDB.php');
$sql = "SELECT * FROM NEW_EMP";
$query = $conn->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0){
    foreach($result as $res){
        echo $res->ID_NEMP."<br>";
    }
}
echo "หรรม";
?>