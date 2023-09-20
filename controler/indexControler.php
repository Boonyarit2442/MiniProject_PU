<?php
$server         = "203.188.54.7";
$db_username    = "inno094";
$db_password    = "P06D245";
$service_name   = "";
$sid            = "database";
$port           = 1521;
$dbtns          = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $server)(PORT = $port)) (CONNECT_DATA = (SERVICE_NAME = $service_name) (SID = $sid)))";

try{
    $conn = new PDO("oci:dbname=".$dbtns, $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Success";
}catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Handle GET requests
        if (isset($_GET['ssn'])) {
            // Retrieve a single book by ID
            $id = $_GET['ssn'];
            get($conn, $ssn);
        } else {
            // Retrieve all books
            getAll($conn);
        }
        break;

    case 'POST':
        // Handle POST requests
        create($conn, $_POST);
        break;

    case 'PUT':
        // Handle PUT requests
        parse_str(file_get_contents("php://input"), $put_vars);
        $id = $_GET['ssn'];
        update($conn, $ssn, $put_vars);
        break;

    case 'DELETE':
        // Handle DELETE requests
        $id = $_GET['ssn'];
        delete($conn, $ssn);
        break;

    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}
function getAll($conn)
{
    $stmt = $conn->prepare("SELECT * FROM LOGIN");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo json_encode($result); 
    
}

function get($conn, $ssn)
{
    $stmt = $conn->prepare("SELECT * FROM employee WHERE ssn = :ssn");
    $stmt->bindParam(':ssn', $ssn, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        http_response_code(404); // Not Found
        echo json_encode(array("message" => "Employee not found."));
    } else {
        echo json_encode($result);
    }
}

function create($conn, $data)
{
    $fname = $data['fname'];
    $lname = $data['lname'];

    $stmt = $conn->prepare("INSERT INTO employee (fname, lname) VALUES (:fname, :lname)");
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);

    if ($stmt->execute()) {
        http_response_code(201); // Created
        echo json_encode(array("message" => "Employee created."));
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Unable to create employee."));
    }
}

function update($conn, $ssn, $data)
{
    $fname = $data['fname'];
    $lname = $data['lname'];

    $stmt = $conn->prepare("UPDATE employee SET fname = :fname, lname = :lname WHERE ssn = :ssn");
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':ssn', $ssn, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Employee updated."));
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Unable to update employee."));
    }
}

function delete($conn, $ssn)
{
    $stmt = $conn->prepare("DELETE FROM employee WHERE ssn = :ssn");
    $stmt->bindParam(':ssn', $ssn, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(array("message" => "Employee deleted."));
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Unable to delete Employee."));
    }
}

?>