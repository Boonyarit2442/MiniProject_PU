<?php
require_once('../../controler/DATA_NEW_EMP.php');
$BASEFEAT = $conn->query("SELECT ID_FEAT FROM BASE_FEATUREAS")->fetchALL(PDO::FETCH_ASSOC);
$temp = array_keys($_POST);
$rit = array();
//echo json_encode($_POST);
for ($i = 0; $i < count($BASEFEAT); $i++) {
    //$rit = str_split($BASEFEAT[$i]['ID_FEAT'], 4);
    array_push($rit, explode(" ", $BASEFEAT[$i]['ID_FEAT'])[0]);
}

$CheckInsert = true;

$New_ALL = $conn->prepare("SELECT * FROM  NEW_EMP");
$New_ALL->execute();
$New_ALL = $New_ALL->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    for($i=0;$i<count($New_ALL);$i++){
        if(empty($_POST['ID_POS']) || empty($_POST['name']) || empty($_POST['Lname']) || empty($_POST['SEX']) || empty($_POST['NOTIONALITY']) || empty($_POST['RELIGION']) || 
        empty($_POST['BLOOD_GROUP']) || empty($_POST['B_DAY']) || empty($_POST['EMAIL']) || empty($_POST['ID_POS']) || empty($_POST['PHONE']) || empty($_POST['ADDRESS']) || 
        empty($_POST['DEPARTMENT']) || empty($_POST['POSITION']) || empty($_POST['SAL']) ){
            $CheckInsert = false;
            echo "<script>window.location = 'Input_Doc_NewEmp.php?KEY_INFO=".$_GET['KEY_INFO']."&error= Please fill out the information completely.'</script>";
            break;
        }elseif(strlen($_POST['ID_POS']) != 13 || strlen($_POST['PHONE']) != 10){
            $CheckInsert = false;
            if(strlen($_POST['ID_POS']) != 13){
                echo "<script>window.location = 'Input_Doc_NewEmp.php?KEY_INFO=".$_GET['KEY_INFO']."&error= This ssn not equal to 13.'</script>";
                break;
            }else{
                echo "<script>window.location = 'Input_Doc_NewEmp.php?KEY_INFO=".$_GET['KEY_INFO']."&error= This tel not equal to 10.'</script>";
                break;
            }  
        }elseif(strtoupper($New_ALL[$i]['NAME_NEMP']) == strtoupper($_POST['name']) && strtoupper($New_ALL[$i]['LNAME_NEMP']) == strtoupper($_POST['Lname'])){
            $CheckInsert = false;
            echo "<script>window.location = 'Input_Doc_NewEmp.php?KEY_INFO=".$_GET['KEY_INFO']."&error= This name or lname is already.'</script>";
            break;
        }elseif(strtoupper($New_ALL[$i]['EMAIL']) == strtoupper($_POST['EMAIL'])){
            $CheckInsert = false;
            echo "<script>window.location = 'Input_Doc_NewEmp.php?KEY_INFO=".$_GET['KEY_INFO']."&error= This email already has information.'</script>";
            break;
        }
    }
    
    if($CheckInsert){
        try {
            $str = "INSERT INTO NEW_EMP (
            ID_NEMP, 
            NAME_NEMP, 
            LNAME_NEMP, 
            DAY_NEMP, 
            SEX_NEMP, 
            BDAY_NEMP, 
            NOTIONALITY_NEMP, 
            ADDRESS, 
            EMAIL, 
            RELIGION_NEMP, 
            STATUS, 
            PHONE, 
            BLOOD_GROUP, 
            ABOUT_YOU,
            SALREQ,
            ID_POS)
        VALUES(
            '" . $trest . "', 
            '" . $_POST['name'] . "', 
            '" . $_POST['Lname'] . "', 
            TO_DATE('" . date("m-d-Y") . "', 'MM-DD-YYYY'),
            '" . $_POST['SEX'] . "',
            TO_DATE('" . date("m-d-Y") . "', 'MM-DD-YYYY'), 
            '" . $_POST['NOTIONALITY'] . "',
            '" . $_POST['ADDRESS'] . "', 
            '" . $_POST['EMAIL'] . "',
            '" . $_POST['RELIGION'] . "',
            '-1',
            '" . $_POST['PHONE'] . "',
            '" . $_POST['BLOOD_GROUP'] . "',
            '" . $_POST['ABOUT_YOU'] . "',
            '" . $_POST['SAL'] . "',
            '" . $_POST['ID_POS']."'
            )";
            $insert_stmt = $conn->prepare($str);
            $insert_stmt->execute();
            $sql = "INSERT into LIS_NEMP_REC (ORDER1, REC, NEMP) values((select max(ORDER1)+1 from LIS_NEMP_REC),'" . $_POST['KYE'] . "','" . $trest . "')";
            $insert_REC_DEP = $conn->prepare($sql);
            $insert_REC_DEP->execute();
            for ($j = 0; $j < count($rit); $j++) {
                for ($i = 0; $i < count($_POST); $i++) {
                    if ($_POST[$temp[$i]] == $rit[$j]) {
                        $srt = "INSERT INTO LIST_FEATUREAS_NEMP (ORDER_FN, NEMP, FEAT) VALUES ((select COALESCE(max(ORDER_FN)+1,0) from LIST_FEATUREAS_NEMP), '" . $trest . "', '" . $_POST[$temp[$i]] . "')";
                        $stmt = $conn->prepare($srt);
                        $stmt->execute();
                    }
                }
            }
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        header('Location: http://203.188.54.9/~u6411800010/index.php');
    }
    
}
?>