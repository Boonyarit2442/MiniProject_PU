<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Day_Chose = getDay_Chose($conn,$_GET);
        $CountDay = CountOFDay($conn,$_GET);
        $statusready = Check_date_selectedAll($conn,$_GET);
        echo set_DateSelected($conn,$_GET);
        break;
    case 'POST':
        if($_POST['_method']=="DAY_SELECTED"){
            Update_Dayselect($conn,$_POST,$_GET);
            echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/select_DayINTV/Select_recDayINTV.php'</script>";
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(array("message" => "Method not allowed."));
}
function getDay_Chose($conn,$KYE){
    $sql="select DAY_CHOOSE from MEMBER_INTERVIEW 
    join DAY_CHOOSE on MEMBER_INTERVIEW.ID_INTV = DAY_CHOOSE.INTV
    where EMP_INTV = '".$_SESSION['ID_EMP']."' and ID_INTV = (select ID_INVIEW from INTERVIEW where REC = '".$KYE['KEY_INFO']."')";
try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
} 
function Update_Dayselect($conn,$KEY,$GET){
    $sql = "UPDATE MEMBER_INTERVIEW SET DAY_INTERVIEW = TO_DATE('".$KEY['DAY_SELECTED']." 00:00:00', 'DD-MM-YYYY HH24:MI:SS') WHERE EMP_INTV = '".$KEY['ID_EMP']."' and ID_INTV = (select ID_INVIEW from INTERVIEW where REC = '".$GET['KEY_INFO']."')";
    /*echo $sql;
    echo "<br>";*/
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }
    set_DateSelected($conn,$GET);
}

function CountOFDay($conn,$KEY){
    $sql="select DAY_INTERVIEW as DAY,count(*) as count from (SELECT * FROM MEMBER_INTERVIEW WHERE ID_INTV = (select ID_INVIEW from INTERVIEW where REC = '".$KEY['KEY_INFO']."') AND MEMBER_INTERVIEW.DAY_INTERVIEW IS NOT NULL) group by DAY_INTERVIEW";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e){
        echo $e->getMessage();
    }
    return $result;
}

function Check_date_selectedAll($conn,$KEY){
    $sql= "select case 
    when 1 in (select case when count(*) = 0 then '1' else '0' end as status from MEMBER_INTERVIEW where DAY_INTERVIEW is null and ID_INTV = (select ID_INVIEW from INTERVIEW where REC = '".$KEY['KEY_INFO']."'))
        then case
            when (  
                    /*CHECK COUNT DATE = max  > 1 ? */
                    select count(*) 
                    from(
                        /*get date of popula(max) opreple*/
                        select DAY_INTERVIEW,COUNT(*) 
                        from MEMBER_INTERVIEW 
                        where ID_INTV = (select ID_INVIEW from INTERVIEW where REC = '".$KEY['KEY_INFO']."') 
                        GROUP BY DAY_INTERVIEW 
                        HAVING COUNT(*) = 
                            (
                            /*COUNT DATE MAX*/
                            SELECT MAX(NUM1) 
                            FROM 
                                (
                                select DAY_INTERVIEW,COUNT(*) AS NUM1 
                                from MEMBER_INTERVIEW where ID_INTV = (select ID_INVIEW from INTERVIEW where REC = '".$KEY['KEY_INFO']."') 
                                group by DAY_INTERVIEW 
                                ORDER BY NUM1 DESC
                                )
                            )
                        )
                ) = 1
            then '1'
            else '-1'
            end 
        else '0' 
        end as DAY1
from MEMBER_INTERVIEW where ID_INTV = (select ID_INVIEW from INTERVIEW where REC = '".$KEY['KEY_INFO']."') group by 0";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchall(pdo::FETCH_ASSOC);
    } catch (pdoexception $e){
        echo $e->getmessage();
    }
    return (int)$result[0]['DAY1'];
}

function GET_dayselectedAll($conn,$KEY){
$sql ="select DAY_INTERVIEW,COUNT(*) 
from MEMBER_INTERVIEW 
where ID_INTV = (select ID_INVIEW from INTERVIEW where REC = '".$KEY['KEY_INFO']."') 
GROUP BY DAY_INTERVIEW 
HAVING COUNT(*) = 
                (
                /*COUNT DATE MAX*/
                SELECT MAX(NUM1) 
                FROM 
                (
                    select DAY_INTERVIEW,COUNT(*) AS NUM1 
                    from MEMBER_INTERVIEW where ID_INTV = (select ID_INVIEW from INTERVIEW where REC = '".$KEY['KEY_INFO']."') 
                    group by DAY_INTERVIEW 
                    ORDER BY NUM1 DESC
                )
)";
switch (Check_date_selectedAll($conn,$KEY)) {
    case '0':
        return 0;
        break;
    case '-1':
        return -1;
        break;
    case '1':
        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchall(pdo::FETCH_ASSOC);
        } catch (pdoexception $e){
            echo $e->getmessage();
        }
        return $result[0]['DAY_INTERVIEW'];
        break;
    default:
        break;
}

}
function set_DateSelected($conn,$KEY){
    if(!(GET_dayselectedAll($conn,$KEY)==0 || GET_dayselectedAll($conn,$KEY)==-1)){
    $sql = "UPDATE INTERVIEW SET DAY_SELECT = TO_DATE('".date("Y-m-d", strtotime(GET_dayselectedAll($conn,$KEY)))." 00:00:00', 'YYYY-MM-DD HH24:MI:SS') where ID_INVIEW = (select ID_INVIEW from INTERVIEW where REC = '".$KEY['KEY_INFO']."')";
    /*echo $sql;
    echo "<br>";*/
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (pdoexception $e){
        echo $e->getmessage();
    }
}
}
?>