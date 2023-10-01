<?php
require_once('../../controler/ConnectDB.php');

if(isset($_POST['submit'])){
    header('Content-Type: text/html; charset=utf-8');
    $id = $_POST['id'] ?? rand(1, 100);
    $day = $_POST['day'] ?? "12/10/2023";
    $RACE = $_POST['RACE'] ?? "rsdf";
    $PATHDOC = $_POST['PATHDOC'] ?? "wqqe";
    $name = $_POST['name'];
    $Lname = $_POST['Lname'];
    $sex = $_POST['sex'];
    $bday = $_POST['B_DAY'];
    $NOTIONALITY = $_POST['NOTIONALITY']; 
    $ADDRESS = $_POST['ARDESS']; 
    $EMAIL = $_POST['EMPIL']; 
    $ID_POS = $_POST['ID_POS'];
    $RELIGION = $_POST['RELIGION'];

    $insert_stmt = $conn->prepare("INSERT INTO NEW_EMP(ID_NEMP, NAME_NEMP, LNAME_NEMP, DAY_NEMP, SEX_NEMP, BDAY_NEMP, NOTIONALITY_NEMP, RACE_NEMP, ADDRESS, EMAIL, ID_POS, PATHDOC_NEMP, RELIGION_NEMP) VALUES(:id, :name, :Lname, TO_DATE(:day, 'DD/MM/YYYY'), (:sex), TO_DATE(:bday, 'DD/MM/YYYY'), :NOTIONALITY, :RACE, :ADDRESS, :EMAIL, :ID_POS, :PATHDOC, :RELIGION)");

 
    $insert_stmt->bindParam(':id', $id);
    $insert_stmt->bindParam(':name', $name);
    $insert_stmt->bindParam(':Lname', $Lname);
    $insert_stmt->bindParam(':day', $day);
    $insert_stmt->bindParam(':sex', $sex);
    $insert_stmt->bindParam(':bday', $bday);
    $insert_stmt->bindParam(':NOTIONALITY', $NOTIONALITY);
    $insert_stmt->bindParam(':RACE', $RACE);
    $insert_stmt->bindParam(':ADDRESS', $ADDRESS);
    $insert_stmt->bindParam(':EMAIL', $EMAIL);
    $insert_stmt->bindParam(':ID_POS', $ID_POS);
    $insert_stmt->bindParam(':PATHDOC', $PATHDOC);
    $insert_stmt->bindParam(':RELIGION', $RELIGION);
 
    if ($insert_stmt->execute()) {
        $insertMsg = "INsert Success";
    } else {
        $insertMsg = "INsert Failed";
    }
 }
 
?>