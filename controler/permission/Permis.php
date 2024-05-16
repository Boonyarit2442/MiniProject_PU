<?php
/*require_once('../ConnectDB.php');
$id = $_SESSION['ID_EMP'];
$dep = $_SESSION['DEP']; 
$pst = $_SESSION['PST'];
$temp = "SELECT * FROM EMPLOYEE WHERE ID_EMP=:id AND DEPNO=:dep AND PSTNO=:pst";
$temp2 = $conn->prepare($temp);
$temp2->bindParam(':id', $id, PDO::PARAM_STR);
$temp2->bindParam(':dep', $dep, PDO::PARAM_STR);
$temp2->bindParam(':pst', $pst, PDO::PARAM_STR);
$temp2->execute();
$res=$temp2->fetchAll(PDO::FETCH_ASSOC);
$permis = $res['PERMIS'];*/

function empPermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PSTNO = :PSTNO AND PER.NUM_PERM LIKE '1%'";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function posPermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PSTNO = :PSTNO AND PER.NUM_PERM LIKE '_1%'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function depPermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '__1%'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function perPermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '___1%'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function managePropDepPermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '____1%'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function applicantPermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '_____1%'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function applyPermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '______1%'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function selectRegisPermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '_______1%'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function bookingPermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '%1_____'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function selectDatePermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '%1____'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function giveScorePermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '%1___'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function resultScorePermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '%1__'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function approvePermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '%1_'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}

function manageDocPermis($conn){
    $id = $_SESSION['ID_EMP'];
    $dep = $_SESSION['DEP']; 
    $pst = $_SESSION['PST'];
    $sql = "SELECT * FROM EMPLOYEE E
            LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
            LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
            LEFT JOIN PERMISSION PER ON PER.ID_PERM = E.PERMIS
            WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PST = :PSTNO AND PER.NUM_PERM LIKE '%1'";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $id, PDO::PARAM_STR);
    $stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
    $stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
    $stmt->execute();      
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo "<script>
        window.location = 'http://203.188.54.9/~u6411800010/view/blank.php';
        alert('คุณไม่มีสิทธิ์');
        </script>";
    }
}
?>