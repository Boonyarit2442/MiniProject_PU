<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Department</title>
    <link rel="stylesheet" href="Depstyle.css">

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
    <section class="filter">
        <nav class="filter-bar">
            <div class="filter-con">
                <input class="search-bar" type="text" id="search" placeholder="ค้นหา..." size="60" />
                <button class="search-bth" type="submit">SEARCH</button>
                <div class="combo">
                    <label for="pos-text">แผนก</label><br>
                    <select name="_method" value="COMBOBOX" id="departmentFilter">
                        <option>
                        <?php foreach ($Data as $row): ?>
                            <option >
                                <?=$row['ID_DEP'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </nav>
    </section>
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
                            <a data-toggle="modal" data-bs-toggle="modal" data-bs-target="#<?= "EditModel_" . $i ?>"
                                id="edit_<?= $i ?>"><img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                                    width="22" height="22">
                            </a>
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
                                            <form action="../../controler/DepartmentController.php" method="POST">

                                                <!--from Edit data -->

                                                <div>
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



</body>

</html>