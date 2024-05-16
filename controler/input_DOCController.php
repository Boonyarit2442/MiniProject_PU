<?php
require_once('ConnectDB.php');
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $data = $conn->query(
        "SELECT * 
        FROM 
        RECTUITMENT 
        join REQUIRED_EMP on REQ_REC = ID_REQ
        join POSITION on PST_REQ = ID_PST
        join DEPENTMENT on POSITION.P_DEPNO = ID_DEP
        where ID_REC = '" . $_GET['KEY_INFO'] . "'"
    )->fetchAll(PDO::FETCH_ASSOC);


}
function FEAT($conn, $KEY)
{
    $FEAD = $conn->query("SELECT NAME_FEAT,DETEL,ID_FEAT from LIST_FEATUREAS_POSITION join BASE_FEATUREAS on BASE_FEATUREAS.ID_FEAT = id_featureas where ID_POSITION ='" . $KEY[0]['ID_PST'] . "'")->fetchALL(PDO::FETCH_ASSOC);
    return $FEAD;
}
?>