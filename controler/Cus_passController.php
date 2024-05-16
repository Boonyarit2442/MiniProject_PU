<?php 

function check_AddedDate($conn,$KEY,$INFO){
    $sql = "select  DAY_INTERVIEW,
case
    when DAY_INTERVIEW is not null then '1' else '0' 
end as status_Added
from MEMBER_INTERVIEW where EMP_INTV = '".$KEY."' and ID_INTV = (select ID_INVIEW from INTERVIEW where REC = '".$INFO."')";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result[0];
}

function check_selectedDate($conn,$KEY){
    $sql = "select DAY_SELECT,case when DAY_SELECT is not null then '1' else '0' end as A from INTERVIEW where REC = '".$KEY."'";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result[0];
}

?>