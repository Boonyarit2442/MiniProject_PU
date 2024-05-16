<?php
require_once('ConnectDB.php');

if (isset($_GET['search'])) {
    $searchText = "%" . $_GET['search'] . "%";
    $Data = searchDepartments($conn, $searchText);
} else {
    $Data = getAll($conn);
}

// Generate the table HTML
$tableHTML = '<table class="table table-striped table-hover">
<thead>
    <tr>
        <th scope="col"><input type="checkbox" /></th>
        <th scope="col">รหัส</th>
        <th scope="col">ชื่อตำแหน่ง</th>
        <th scope="col">รายละเอียด</th>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody id="table-body">';

foreach ($Data as $row) {
    $tableHTML .= '<tr>';
    $tableHTML .= '<th scope="row"><input type="checkbox" /></th>';
    $tableHTML .= '<td>' . $row['ID_DEP'] . '</td>';
    $tableHTML .= '<td>' . $row['NAME_DEP'] . '</td>';
    $tableHTML .= '<td>' . $row['EMP_LEAD'] . '</td>';
    $tableHTML .= '<td>';
    $tableHTML .= '<a data-toggle="modal" data-bs-toggle="modal" data-bs-target="#EditModel_' . $i . '" id="edit_' . $i . '"><img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22"></a>';
    // ... Rest of your code for edit and delete buttons
    $tableHTML .= '</td>';
    $tableHTML .= '</tr>';
}

$tableHTML .= '</tbody></table>';

echo $tableHTML;
?>