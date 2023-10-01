<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link CSS -->
    <link rel="stylesheet" href="style_Sched_Boss.css">

     <!-- Link Sweetalert2 -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Scheddule with boss</title>
</head>
<body>
    <?php require_once('../../layout/_layout.php') ?>
    <!-- Bar Day -->
    <div class="wrapper">
        <div class="bar-day d-flex flex-column align-items-end">
            <button type="button" class="btn btn-primary" style="width:150px;">เพิ่มวัน</button>
            <input type="date">
            <input type="date">
            <input type="date">
            <input type="date"> 
        </div>
    </div>
    <div class="menu-bar container d-flex justify-content-between align-items-center " style="margin-top: 30px;">
        <h2 class="text-primary">ยื่นขอพนักงาน</h2>
    </div>
    <!-- Bar Menu -->
    <div class="bar-day container d-flex flex-row justify-content-between align-items-center">
        <div class="align-self-end">
            <input class="form-control me-3" type="search" placeholder="ค้นหา" aria-label="Search" style="width: 500px;">
        </div>
        <div>
            <div>ลักษณะการว่าจ้างงาน</div>
            <select name="employment" id="employment">
               <option value="tem">ชั่วคราว</option>
               <option value="full">ตลอดเวลา</option>
            </select>
        </div>
        <div>
            <div>ลักษณะการว่าจ้างงาน</div>
            <select name="employment" id="employment">
               <option value="tem">ชั่วคราว</option>
               <option value="full">ตลอดเวลา</option>
            </select>
        </div>
        <div class="align-self-end">
            <button class="btn btn-outline-success" type="submit" >Search</button>
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
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">อีเมล-แอดเดรส</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">ตำแหน่ง</th>
                    <th scope="col">ID</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </td>
                    <td>Larry the Bird</td>
                    <td>Jin</td>
                    <td>@twitter</td>
                    <td>Larry the Bird</td>
                    <td>Jin</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Button Cansal & Aaccept -->
    <div class="container">
        <div class="button d-flex justify-content-center align-items-center mt-5">
            <a href="http://203.188.54.9/~u6411800010/view/Schedule_an_interview_date/detail_interview.php">
                <button type="button" class="btn  btn-danger" style="width:150px;">ยกเลิก</button>
            </a>
            <button onclick="clickalert()" type="button" class="btn  btn-primary ms-4" style="width:150px;">ยืนยัน</button>
        </div>
    </div>

    <script>
        function clickalert(){      
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
                swalWithBootstrapButtons.fire(
                  'ยืนยันสำเร็จ!',
                  '',
                  'success'
                ).then(
                    () =>{var a = document.createElement('a');
                         a.href='http://203.188.54.9/~u6411800010/view/Schedule_an_interview_date/detail_interview.php';
                         a.click();}
                )
              } 
            })
        }
    </script>

</body>
</html>