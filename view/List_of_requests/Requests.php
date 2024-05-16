<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link CSS -->
    <link rel="stylesheet" href="style_Requests.css">

    <!-- Link Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Detail of requests</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php') ?>

    <!-- Bar Menu -->
    <!-- bar1 -->
    <div class="bar-menu container d-flex justify-content-between align-items-center mt-5">
        <div>
            <div>เลขที่เอกสาร</div>
            <input type="text">
        </div>
        <div>
            <div>ผู้บันทึก</div>
            <input type="text" style="width: 700px;">
        </div>
        <div>
            <div>วันที่เอกสาร</div>
            <input type="date" style="width: 250px;">
        </div>
        
    </div>
    <!-- bar2 -->
    <div class="bar-menu container d-flex justify-content-between align-items-center ">
        <div>
            <div>แผนก</div>
            <select name="department" id="department">
                <option value="IT">IT</option>
                <option value="EngCom">Eng.Computer</option>
            </select>
        </div>
        <div>
            <div>ตำแหน่งงานที่ร้องขอ</div>
            <select name="position" id="position">
                <option value="Programer">Programer</option>
            </select>
        </div>
        <div>
            <div>ลักษณะการว่าจ้างงาน</div>
            <select name="employment" id="employment">
                <option value="tem">ชั่วคราว</option>
                <option value="full">ตลอดเวลา</option>
            </select>
        </div>
        <div>
            <div>จำนวนคนที่ร้องขอ</div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="number-input">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus" style="width: 30px;"></button>
                    <input class="quantity" min="0" name="quantity" value="0" type="number">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                </div>
                <span class="label-count">คน</span>
            </div>
        </div>
    </div>
    <!-- Table -->
    <div class="container " style="width: 600px;">
        <table class="table table-striped mt-5 mb-5 bg-light">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </th>
                    <th scope="col">ชื่อคูณสมบัติ</th>
                    <th scope="col">รายละเอียด</th>
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
                </tr>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </td>
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
                </tr>
            </tbody>
        </table>
    </div>
    <!-- รายระเอียดงาน/เหตุผลที่ร้องขอ  -->
    <div class="container">
        <div>
            <label>รายละเอียดงาน / เหตุผลที่ร้องขอ</label>
        </div>
        <div class="text-area">
            <textarea id="address" name="address" rows="6" cols="50"></textarea>
        </div>
    </div>
    <!-- Button Cansal & Aaccept -->
    <div class="container">
        <div class="button d-flex justify-content-center align-items-center mt-5">
            <button type="button" class="btn  btn-danger" style="width:150px;">ยกเลิก</button>
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
                )
              } 
            })
        }
    </script>

</body>

</html>