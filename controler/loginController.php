<?php

include 'ConnectDB.php';
session_start();
if (isset($_SESSION['username']) || isset($_SESSION['id']))
    header('location: ../../view/blank.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM EMPLOYEE WHERE USER_ID = :1 AND PASSWORD = :2";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':1', $username, PDO::PARAM_STR);
    $stmt->bindParam(':2', $password, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();

    if ($result) {
        $_SESSION['id'] = $result['NAME'];
        $_SESSION['ID_EMP'] = $result['ID_EMP'];
        $_SESSION['DEP'] = $result['DEPNO'];
        $_SESSION['PST'] = $result['PSTNO'];
        $_SESSION["username"] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
        header("Location: ../blank.php");
        exit;
    } else {

    }
}
?>