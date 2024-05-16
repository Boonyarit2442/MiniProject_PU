<?php
/*ยังไม่เสร้จ */
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $Data = getAll($conn);
        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {
            create($conn, $_POST);
        } elseif ($_POST['_method'] === "EDIT") {
            update($conn, $_POST);
        } elseif ($_POST['_method'] === "DELETE") {
            delete($conn, $_POST);
        }elseif ($_POST['_method'] === "submit_button"){
            /*echo json_encode($_POST)."<br>";
            echo json_encode($_GET)."<br>";*/
            add_score($conn,$_POST,1);
            //echo json_encode($_POST);
        }elseif ($_POST['_method'] === "cancel_button"){
            add_score($conn,$_POST,0);
            //echo json_encode($_POST);
        }  
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_decode(array("message" => "Method not allowed."));
}

function add_score($conn,$data,$yes_no){
    echo json_encode($data)."<br>";

    if( empty($data['tecnic']) || empty($data['leaning']) || empty($data['create'])  || empty($data['HumRela'])  || empty($data['Ask'])  ){
        echo "<script>window.location = 'Give_Score.php?KEY_INFO=" . $_GET['KEY_INFO'] . "&KEY_SEND=" . $_GET['KEY_SEND'] . "&KEY_NEMP=".$_GET['KEY_NEMP']."&error= Please select all points.'</script>";
    }else{
        try{
            $str = "INSERT INTO SCORE_NEMP VALUES((select COALESCE(MAX(ORDER_SCORE)+1, 0) from SCORE_NEMP),".$data['tecnic'].",".$data['leaning'].",".$data['create'].",".$data['HumRela'].",
                    $yes_no,".$data['Ask'].",'".$_SESSION['ID_EMP']."','".$_GET['KEY_NEMP']."')";
            echo $str."<br>";
            $stmt = $conn->prepare($str);
            $stmt->execute();
            echo "<script>window.location = 'Select_Nemp.php?KEY_INFO=" . $_GET['KEY_SEND'] . "&KEY_SEND=" . $_GET['KEY_SEND'] . "'</script>";
        //echo "1_".json_encode($date) ;
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

function getAll($conn)
{
    $str = "SELECT * from NEW_EMP where ID_NEMP ='" . $_GET['KEY_INFO'] . "'";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function create($conn, $data)
{
    $str = "";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function GO()
{
    echo "window.location = 'Select_Nemp.php?KEY_INFO=" . $_GET['KEY_SEND'] . "&KEY_SEND=" . $_GET['KEY_SEND'] . "'";
}

function check_EMP_ME_AddedScore($conn){
    $str = "select case when count(*) >= 1 then '1' else '0' end as status  from (select EMP_INTV,NEMP_INTV from score_nemp where EMP_INTV = '".$_SESSION['ID_EMP']."' and NEMP_INTV = '".$_GET['KEY_NEMP']."')";
    //echo $str."<br>";
    try {
        $stmt = $conn->prepare($str);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result[0]['STATUS'];
}

?>