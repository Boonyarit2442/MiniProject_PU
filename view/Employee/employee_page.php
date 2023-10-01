<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>

    <!-- Link CSS-->
    <link rel="stylesheet" href="styles_emp_1.css">

    <!-- Link Sweetalert2" -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php 
    require_once('../../layout/_layout.php');
    require_once('../../controler/employeeController.php');
    ?>
    <!-- ตำแหน่ง และ serth -->
    <div class="container ">
        <div class="row">
            <div class="col col-7 ">
                <h2 class=" mt-2 mb-2">พนักงานบริษัท</h2>
            </div>
            <div class="col ps-0 pe-0"></div>
            <div class="col ps-0 ">
                <a class="btn btn-warning mt-2" href="registration_emp.php" role="button">+ เพิ่มพนักงาน</a>
            </div>
        </div>
        <div class="container ">
            <div class="row">
                <div class="col ps-0 pe-5 col-7">
                    <label></label>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="col ps-0">
                    <label class="fw-bold">แผนก</label>
                    <div class="dropdown ">
                        <button class="btn btn-secondary dropdown-toggle bg-primary" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown button
                        </button>
                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col ps-0 ">
                    <label class="fw-bold">ตำแหน่ง</label>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle bg-primary" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown button
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table -->
    <div class="container ">
        <table class="table table-striped mt-4 bg-light">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </th>
                    <th scope="col">ID</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">อีเมล-แอดเดรส</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">ตำแหน่ง</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
            <?php for ($i=0; $i < count($Data); $i++) { ?>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </td>
                    <td><?=$Data[$i]['ID_EMP']?></td>
                    <td><?=$Data[$i]['NAME']." ".$Data[$i]['L_NAME']?></td>
                    <td><?=$Data[$i]['EMAIL']?></td>
                    <td><?=$Data[$i]['NAME_DEP']?></td>
                    <td><?=$Data[$i]['NAME_PST']?></td>
                    <td>
                        <button onclick="editAlert()"  style="border : 0; padding: 0;"> 
                            <img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22">
                        </button>
                        <button onclick="deleteAlert()"  style="border : 0; padding: 0;"><img src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22" height="22"></button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteAlert(employeeId){      
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success ms-3',
                cancelButton: 'btn btn-danger '
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'แน่ใจหรือไหม?',
              text: "หากคุณกดยืนยันจะไม่สามารถย้อนกลับมาแก้ไขได้อีก!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'ยืนยัน',
              cancelButtonText: 'ยกเลิก',
              reverseButtons: true
            }).then((result) => {
              if (result.isConfirmed) {
                deleteEmployee(employeeId);
              } 
            });
        }

        function deleteEmployee(employeeId) {
        // Send an AJAX request to your PHP script to delete the employee
        $.ajax({
            type: 'POST',
            url: '../../controler/employeeController.php', // Replace with the actual URL of your delete script
            data: { _method: 'DELETE', KYE: employeeId },
            success: function (response) {
                // Handle success response if needed
                // You can also reload the page to update the employee list
                window.location.reload();
            },
            error: function (xhr, status, error) {
                // Handle error response if needed
                console.error(xhr.responseText);
            }
        });
    }

    function editAlert(){      
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success ms-3',
                cancelButton: 'btn btn-danger '
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'ต้องการแก้ไขใช่หรือไม่?',
              text: "หากต้องการแก้ไข กดยืนยันได้เลยนะจ๊ะ",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'ยืนยัน',
              cancelButtonText: 'ยกเลิก',
              reverseButtons: true
            }).then((result) => {
              if (result.isConfirmed) {
                
              } 
        });
    }
    </script>

</body>

</html>