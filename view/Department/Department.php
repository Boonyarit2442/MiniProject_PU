<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Department</title>
    <link rel="stylesheet" href="Depstyle.css">
<<<<<<< HEAD
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
=======
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91

</head>

<body>
    <?php require_once('../../layout/_layout.php') ?>
    <?php require_once('../../controler/DepartmentController.php') ?>
    <!-- ตำแหน่ง และ serth -->

    <section class="feature">
        <div class="feature-con">
            <div class="feature-text">แผนก</div>
            <button class="add-feature" type="submit" data-bs-toggle="modal"
                data-bs-target="#CreateModal">+เพิ่มแผนก</button>
        </div>
    </section>
    <!-- Create Position -->
    <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">เพิ่มแผนก</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body w-100 h-100">
                    <form action="../../controler/DepartmentController.php" method="POST">
                        <div class="">
                            <!--from create data -->
                            <div>
                                <label for="ID_PST">รหัส</label><br>
                                <input type="text" name="ID_DEP" id="ID_DEP"><br>
                            </div>
                            <div>
                                <label for="pos-text">แผนก</label><br>
                                <input type="text" name="NAME_DEP" id="NAME_DEP"><br>
                            </div>
                            <div>
                                <label for="pos-text">หัวหน้าแผนก</label><br>
                                <input type="text" name="EMP_LEAD" id="EMP_LEAD"><br>
                            </div>
                            <div>
                                <input type="submit" value="ADD" name="_method" style="margin-top:5px">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter -->
<<<<<<< HEAD
    <!-- Filter -->
=======
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
    <section class="filter">
        <nav class="filter-bar">
            <div class="filter-con">
                <input class="search-bar" type="text" id="search" placeholder="ค้นหา..." size="60" />
                <button class="search-bth" type="submit">SEARCH</button>
                <div class="combo">
                    <label for="pos-text">แผนก</label><br>
                    <select name="_method" value="COMBOBOX" id="departmentFilter">
<<<<<<< HEAD
                        <option value="all">ทั้งหมด</option>
                        <?php
                        // Create an array to store unique department names
                        $uniqueDepartmentNames = array();
                        foreach ($Data as $row):
                            $departmentName = htmlspecialchars($row['NAME_DEP']);
                            // Check if the department name is not already in the unique list
                            if (!in_array($departmentName, $uniqueDepartmentNames)) {
                                echo '<option value="' . $departmentName . '">' . $departmentName . '</option>';
                                // Add the department name to the unique list
                                $uniqueDepartmentNames[] = $departmentName;
                            }
                        endforeach;
                        ?>
=======
                        <option>
                        <?php foreach ($Data as $row): ?>
                            <option >
                                <?=$row['ID_DEP'] ?>
                            </option>
                        <?php endforeach ?>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                    </select>
                </div>
            </div>
        </nav>
    </section>
<<<<<<< HEAD

=======
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
    <!-- Table -->
    <div class="container-xxl">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"><input type="checkbox" /></th>
                    <th scope="col">รหัสแผนก</th>
                    <th scope="col">ชื่อแผนก</th>
                    <th scope="col">รหัสหัวหน้าแผนก</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php for ($i = 0; $i < count($Data); $i++) { ?>
                    <tr>
                        <th scope="row"><input type="checkbox" /></th>
                        <td>
                            <?= $Data[$i]['ID_DEP'] ?>
                        </td>
                        <td>
                            <?= $Data[$i]['NAME_DEP'] ?>
                        </td>
                        <td>
                            <?= $Data[$i]['EMP_LEAD'] ?>
                        </td>
                        <td>
<<<<<<< HEAD
                            <a class="edit-icon" data-bs-toggle="modal" data-bs-target="#EditModel_0">
                                <img src="edit-icon.png" width="22" height="22">
                            </a>


=======
                            <a data-toggle="modal" data-bs-toggle="modal" data-bs-target="#<?= "EditModel_" . $i ?>"
                                id="edit_<?= $i ?>"><img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                                    width="22" height="22">
                            </a>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                            <!-- edit Position -->
                            <div class="modal fade" id="<?= "EditModel_" . $i ?>" tabindex="-1"
                                aria-labelledby="EditModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="<?= "EditModel_" . $i ?>Label">แก้ไขตำแหน่ง</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body w-100 h-100">
<<<<<<< HEAD
                                            <form action="../../controler/DepartmentController.php?action=edit"
                                                method="POST">
=======
                                            <form action="../../controler/DepartmentController.php" method="POST">
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91

                                                <!--from Edit data -->

                                                <div>
<<<<<<< HEAD
                                                    <label for="edit_ID_DEP"
                                                        style="margin-left:30px">รหัสตำแหน่ง</label><br>
                                                    <input type="text" name="edit_ID_DEP" id="edit_ID_DEP"
                                                        style="margin-left:30px" readonly><br>
                                                </div>
                                                <div>
                                                    <label for="edit_NAME_DEP"
                                                        style="margin-left:30px">ชื่อตำแหน่งที่ต้องการแก้ไข</label><br>
                                                    <input type="text" name="edit_NAME_DEP" id="edit_NAME_DEP"
                                                        style="margin-left:30px"><br>
                                                </div>
                                                <div>
                                                    <label for="edit_EMP_LEAD"
                                                        style="margin-left:30px">หัวหน้าแผนก</label><br>
                                                    <input type="text" name="edit_EMP_LEAD" id="edit_EMP_LEAD"
                                                        style="margin-left:30px">
=======
                                                    <label for="ID_DEP" style="margin-left:30px">รหัสตำแหน่ง</label><br>
                                                    <input type="text" name="ID_DEP" id="ID_DEP"
                                                        value="<?= $Data[$i]['ID_DEP'] ?>" style="margin-left:30px"><br>
                                                </div>
                                                <div>
                                                    <label for="NAME_DEP"
                                                        style="margin-left:30px">ชื่อตำแหน่งที่ต้องการแก้ไข</label><br>
                                                    <input type="text" name="NAME_DEP" id="NAME_DEP"
                                                        value="<?= $Data[$i]['NAME_DEP'] ?>" style="margin-left:30px"><br>
                                                </div>
                                                <div>
                                                    <label for="EMP_LEAD" style="margin-left:30px">หัวหน้าแผนก</label><br>
                                                    <input type="text" name="EMP_LEAD" id="EMP_LEAD"
                                                        value="<?= $Data[$i]['EMP_LEAD'] ?>" style="margin-left:30px">
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                                                </div>

                                                <div>

                                                    <input type="submit" value="EDIT" name="_method" style="margin-top:5px">

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <script>
<<<<<<< HEAD
        // Function to filter and update the table
        function filterTable(selectedDepartment) {
            // Send an AJAX request to your PHP script with the selected department
            $.ajax({
                url: '../../controler/DepartmentController.php',
                type: 'POST',
                data: {
                    _method: 'COMBOBOX',
                    selectedDepartment: selectedDepartment
                },
                success: function (data) {
                    // Replace the table content with the updated data
                    $('#tableBody').html(data);
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }

        // Attach an event listener to the select element
        $('#departmentFilter').on('change', function () {
            var selectedDepartment = $(this).val();
            filterTable(selectedDepartment);
        });

        // Initialize the table with all data when the page loads
        filterTable('all');
    </script>
    <script>
        function populateEditModal(idDep, nameDep, empLead) {
            $('#edit_ID_DEP').val(idDep);
            $('#edit_NAME_DEP').val(nameDep);
            $('#edit_EMP_LEAD').val(empLead);
        }
    </script>


=======
        const departmentFilter = document.getElementById("departmentFilter");
        const tableBody = document.getElementById("tableBody");
        const originalTable = tableBody.innerHTML; // Store the original table content

        departmentFilter.addEventListener("change", function () {
            const selectedDepartment = departmentFilter.value;
            const rows = tableBody.querySelectorAll("tr");

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const cell = row.cells[2]; // Assuming the department name is in the third cell (index 2).

                if (selectedDepartment === "" || cell.innerText === selectedDepartment) {
                    row.style.display = ""; // Show the row.
                } else {
                    row.style.display = "none"; // Hide the row.
                }
            }
        });

        // Reset the table to its original state when a different option is selected
        departmentFilter.addEventListener("change", function () {
            if (departmentFilter.value === "") {
                tableBody.innerHTML = originalTable;
            }
        });
    </script>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91



</body>

</html>