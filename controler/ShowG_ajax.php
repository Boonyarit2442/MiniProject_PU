<?php 
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        echo "rit0";
        break;
    case 'POST':
        if($_POST['_method']=="Dep"){
            $PST = Select_Pst($conn,$_POST['value']);
             echo  "<option>Select Pst</option>";
            for($i=0;$i<count($PST);$i++){ 
                
               echo "<option value=\"".$PST[$i]['ID_PST']."\">".$PST[$i]['NAME_PST']."</option>"; 
            } 
        }
        else if($_POST['_method']=="FEAT"){
            $data_all= array();
            $data = Get_countFeatOFrecAndPos($conn,$_POST['KYE']);
            array_push($data_all,$data);
            $data_sa = Get_SqlAndAug($conn,$_POST['KYE']);
            array_push($data_all,$data_sa);
            echo json_encode($data_all);
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_decode(array("message" => "Method not allowed."));
}
function Select_Pst($conn,$KEY){
    $sql = "select * from POSITION where P_DEPNO = '".$KEY."' and ID_PST in (select ID_PST from NEW_EMP
join LIS_NEMP_REC on ID_NEMP = LIS_NEMP_REC.NEMP
join RECTUITMENT on REC = RECTUITMENT.ID_REC
join REQUIRED_EMP on REQ_REC = REQUIRED_EMP.ID_REQ
join POSITION on PST_REQ = ID_PST
join DEPENTMENT on POSITION.P_DEPNO = DEPENTMENT.ID_DEP group by ID_PST)";
    try {
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);   
        return $data;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function Get_countFeatOFrecAndPos($conn,$KEY){
    $sql = "SELECT DETEL,COUNT(*) from LIST_FEATUREAS_NEMP 
join LIST_FEATUREAS_POSITION on FEAT = LIST_FEATUREAS_POSITION.ID_FEATUREAS 
where LIST_FEATUREAS_POSITION.ID_POSITION = '".$KEY."' group by DETEL order by COUNT(*)";
   try {
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);   
        return $data;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function Get_SqlAndAug($conn,$KEY){
    $sql = "select TO_CHAR(MAX(SALREQ),'9,999,999,999') MAX_SAL,TO_CHAR(AVG(SALREQ),'9,999,999,999.99') as AVGSAL,TO_CHAR(MIN(SALREQ),'9,999,999,999') AS MINSAL,MAX(AGE) AS MAXAGE,TO_CHAR(AVG(AGE),'9,999,999.99') AS AVGAGE,MIN(AGE) AS MINAGE from
(select NEMP,SALREQ,TO_CHAR(SYSDATE,'YY')-TO_CHAR(BDAY_NEMP,'YY') as Age
from LIS_NEMP_REC
join new_emp on new_emp.ID_NEMP = NEMP
join RECTUITMENT on REC = RECTUITMENT.ID_REC
join REQUIRED_EMP on RECTUITMENT.REQ_REC = REQUIRED_EMP.ID_REQ
join POSITION on REQUIRED_EMP.PST_REQ = POSITION.ID_PST
join LIST_FEATUREAS_POSITION on POSITION.ID_PST = LIST_FEATUREAS_POSITION.ID_POSITION
join BASE_FEATUREAS on LIST_FEATUREAS_POSITION.ID_FEATUREAS = ID_FEAT 
WHERE ID_PST = '".$KEY."')";
    try {
        $data = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);   
        return $data;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>