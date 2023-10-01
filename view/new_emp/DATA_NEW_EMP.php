<?php
require_once('../../controler/ConnectDB.php');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $data = $conn->query('SELECT * FROM NEW_EMP')->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลที่ส่งมาจากแอพพลิเคชัน เช่น JSON
    $requestData = json_decode(file_get_contents("pannic.php"), true);

    // ตรวจสอบว่าเป็นการเพิ่มหรือลบข้อมูล
    if (isset($requestData['action']) && $requestData['action'] == 'add') {
        // ดึงข้อมูลที่ต้องการเพิ่มจาก $requestData และเพิ่มลงในฐานข้อมูล
        $name = $requestData['name'];
        $email = $requestData['email'];
        // เพิ่มข้อมูลลงในฐานข้อมูล
        $sql = "INSERT INTO NEW_EMP (NAME_NEMP, EMAIL) VALUES (:name, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            echo 'เพิ่มข้อมูลเรียบร้อยแล้ว';
        } else {
            echo 'เกิดข้อผิดพลาดในการเพิ่มข้อมูล';
        }
    } elseif (isset($requestData['action']) && $requestData['action'] == 'delete') {
        // รับ ID ที่ต้องการลบ
        $id = $requestData['id'];
        // ลบข้อมูลจากฐานข้อมูล
        $sql = "DELETE FROM NEW_EMP WHERE Id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo 'ลบข้อมูลเรียบร้อยแล้ว';
        } else {
            echo 'เกิดข้อผิดพลาดในการลบข้อมูล';
        }
    } else {
        echo 'ไม่ระบุการกระทำ (action)';
    }
} else {
    http_response_code(405);
}
?>
