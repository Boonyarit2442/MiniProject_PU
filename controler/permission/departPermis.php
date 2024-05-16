<?php
require_once("http://203.188.54.9/~u6411800010/controler/ConnectDB.php");
    
$id = $_SESSION['ID_EMP'];
$dep = $_SESSION['DEP']; 
$pst = $_SESSION['PST'];

$sql = "SELECT COUNT(*) FROM roles r
        JOIN role_permissions rp ON r.id = rp.role_id
        JOIN permissions p ON rp.permission_id = p.id
        WHERE r.name = :userRole
        AND p.name = :permissionName";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':userRole', $userRole, PDO::PARAM_STR);
$stmt->bindParam(':permissionName', $permissionName, PDO::PARAM_STR);
$stmt->execute();      

if ($stmt->fetchColumn() > 0) {
    // ผู้ใช้มีสิทธิ์
    echo "คุณมีสิทธิ์ในการเข้าถึง $permissionName";
} else {
    // ผู้ใช้ไม่มีสิทธิ์
    echo "คุณไม่มีสิทธิ์ในการเข้าถึง $permissionName";
}
?>