<?php
require_once('ConnectDB.php');
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $str ="SELECT * 
        FROM 
        RECTUITMENT 
        join REQUIRED_EMP on REQ_REC = ID_REQ
        join POSITION on PST_REQ = ID_PST
        where ID_REC = '" . $_GET['KYE_INFO'] . "'"; 
    $data = $conn->query($str)->fetchAll(PDO::FETCH_ASSOC);
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
}
function FEAT($conn, $KEY)
{
    $FEAD = $conn->query("SELECT NAME_FEAT,DETEL from LIST_FEATUREAS_POSITION join BASE_FEATUREAS on BASE_FEATUREAS.ID_FEAT = id_featureas where ID_POSITION ='" . $KEY[0]['ID_PST'] . "'")->fetchALL(PDO::FETCH_ASSOC);
    return $FEAD;
}
?>