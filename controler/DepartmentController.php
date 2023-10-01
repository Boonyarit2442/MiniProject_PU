<?php
require_once('ConnectDB.php');
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        $Data = getAll($conn);

        break;
    case 'POST':
        if ($_POST['_method'] === "ADD") {
            create($conn, $_POST);
        } elseif ($_POST['_method'] === "EDIT") { // Change this line
            // Handle the edit action
            update($conn, $_POST);
            // Redirect to the Department page or do any other necessary action
        } elseif ($_POST['_method'] === "DELETE") {
            delete($conn, $_POST);
        } elseif ($_POST['_method'] === "COMBOBOX") {
            // Get the selected department from the $_POST data
            $selectedDepartment = $_POST['selectedDepartment'];

            // Call the function with the selected department
            $Data = getDepname($conn, $selectedDepartment);
        }
        break;

    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed."));
}

//function for select ALL data
function getAll($conn)
{
    try {
        $stmt = $conn->prepare("SELECT * FROM DEPENTMENT");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $result;
}
function getDepname($conn, $selectedDepartment)
{
    try {
        if ($selectedDepartment === 'all') {
            $stmt = $conn->prepare("SELECT * FROM DEPENTMENT");
        } else {
            $stmt = $conn->prepare("SELECT * FROM DEPENTMENT WHERE NAME_DEP = :selectedDepartment");
            $stmt->bindParam(':selectedDepartment', $selectedDepartment, PDO::PARAM_STR);
        }
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Generate HTML for the table rows
        // Generate HTML for the table rows
        $output = '';
        foreach ($result as $i => $row) { // Use $i as the loop index
            $output .= '<tr>';
            $output .= '<th scope="row"><input type="checkbox" /></th>';
            $output .= '<td>' . $row['ID_DEP'] . '</td>';
            $output .= '<td>' . $row['NAME_DEP'] . '</td>';
            $output .= '<td>' . $row['EMP_LEAD'] . '</td>';
            $output .= '<td>';

            // Add edit button
            $output .= '<a data-toggle="modal" data-bs-toggle="modal" data-bs-target="#EditModel_' . $i . '"><img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22"></a>';

            // Add delete button
            $output .= '<a data-bs-toggle="modal" data-bs-target="#DeleteModel_' . $i . '"><img src="delete-icon.png" width="22" height="22"></a>';

            $output .= '</td>';
            $output .= '</tr>';
        }
        echo $output;


    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    function getUniqueDepnames($conn)
    {
        try {
            $stmt = $conn->prepare("SELECT DISTINCT NAME_DEP FROM DEPENTMENT");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $options = '';
            foreach ($result as $row) {
                $options .= '<option>' . $row['NAME_DEP'] . '</option>';
            }

            return $options;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}



//function for Create data
function create($conn, $data)
{
    $ID = $data['ID_DEP'];
    $NAME = $data['NAME_DEP'];
    $EMP_LEAD = $data['EMP_LEAD'];
    try {
        $stmt = $conn->prepare("INSERT INTO DEPENTMENT (ID_DEP, NAME_DEP, EMP_LEAD) VALUES (:ID, :NAME,:EMP_LEAD)");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->bindParam(':NAME', $NAME, PDO::PARAM_STR);
        $stmt->bindParam(':EMP_LEAD', $EMP_LEAD, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Department/Department.php'</script>";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//function for update data
function update($conn, $data)
{
    $ID = $data['ID_DEP'];
    $NAME = $data['NAME_DEP'];
    $EMP_LEAD = $data['EMP_LEAD'];
    try {
        $stmt = $conn->prepare("UPDATE DEPENTMENT SET NAME_DEP = ?, EMP_LEAD = ? WHERE ID_DEP = ?");
        $stmt->bindParam(1, $NAME, PDO::PARAM_STR);
        $stmt->bindParam(2, $EMP_LEAD, PDO::PARAM_STR);
        $stmt->bindParam(3, $ID, PDO::PARAM_STR);
        $stmt->execute();
        echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Department/Department.php'</script>";
    } catch (PDOException $e) {
        echo $e->getMessage() . " " . $e->getLine();
    }
}

//function for delete data
function delete($conn, $data)
{
    $ID = $data['KEY'];
    try {
        $stmt = $conn->prepare("DELETE FROM DEPENTMENT WHERE ID_DEP = :ID");
        $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Department/Department.php'</script>";
    //header("Location : ../view/Position/position.php");
}
?>