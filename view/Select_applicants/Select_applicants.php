<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Link Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php require_once('../../layout/_layout.php'); ?>

    <!-- Content Bar -->
    <div class="container w-75">
        <div class="content-bar mt-4">
            <div>
                <h2 class="text-primary">คะแนนผู้เข้าสัมภาษณ์</h2>
            </div>
            <div class="d-flex  justify-content-between mt-3">
                <div class="bar d-flex align-items-center">
                    <input type="text " placeholder="ค้นหาข้อมูลผู้สมัคร..."
                        style="width : 600px; height:40px; margin-right:15px;">
                    <button type="button" class="btn btn-primary" style="width : 90px;">ค้นหา</button>
                </div>
                <select name="filter-score" id="filter-score">
                    <option value="ASC">คะแนนเฉลี่ย น้อย-มาก</option>
                    <option value="DESC">คะแนนเฉลี่ย มาก-น้อย</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Table -->
    <div class="container ">
        <table class="table table-striped mt-5 mb-5 bg-light">
            <thead>
                <tr>
                    <th scope="col">ลำดับที่</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">ด้านเทคนิค</th>
                    <th scope="col">ความคิดสร้างสรรค์</th>
                    <th scope="col">มนุษย์สัมพันธ์</th>
                    <th scope="col">การเรียนรู้สิ่งใหม่ๆ</th>
                    <th scope="col">คะแนนเฉลี่ยรวม</th>
                    <th scope="col">ผลสรุป</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td class="d-flex justify-content-center align-items-center">
                        <!-- Button trigger modal -->
                        <!-- Button2 Cancel -->
                        <button type="button" class="p-0 " data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border : 0;">
                            <img src="https://cdn-icons-png.flaticon.com/128/1828/1828843.png" alt="" style="width:22px;height:22px;">
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label" >กรุณากรอกรายละเอียด :</label>
                                                <textarea class="form-control" id="message-text" style="resize: none; height:300px;"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="button" class="btn btn-primary">ยืนยัน</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button2 Accepet -->
                        <button type="button" onclick="clickalert()" class="p-0 ms-2" style="border : 0;">
                            <img src="https://cdn-icons-png.flaticon.com/128/4315/4315445.png" alt="" style="width:22px;height:22px;">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td class="d-flex justify-content-center align-items-center">
                        <!-- Button trigger modal -->
                        <!-- Button2 Cancel -->
                        <button type="button" class="p-0 " data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border : 0;">
                            <img src="https://cdn-icons-png.flaticon.com/128/1828/1828843.png" alt="" style="width:22px;height:22px;">
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label" >กรุณากรอกรายละเอียด :</label>
                                                <textarea class="form-control" id="message-text" style="resize: none; height:300px;"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="button" class="btn btn-primary">ยืนยัน</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button2 Accepet -->
                        <button type="button" onclick="clickalert()" class="p-0 ms-2" style="border : 0;">
                            <img src="https://cdn-icons-png.flaticon.com/128/4315/4315445.png" alt="" style="width:22px;height:22px;">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Larry the Bird</td>
                    <td>Jin</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td class="d-flex justify-content-center align-items-center">
                        <!-- Button trigger modal -->
                        <!-- Button2 Cancel -->
                        <button type="button" class="p-0 " data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border : 0;">
                            <img src="https://cdn-icons-png.flaticon.com/128/1828/1828843.png" alt="" style="width:22px;height:22px;">
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label" >กรุณากรอกรายละเอียด :</label>
                                                <textarea class="form-control" id="message-text" style="resize: none; height:300px;"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">ยกเลิก</button>
                                        <button type="button" class="btn btn-primary">ยืนยัน</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button2 Accepet -->
                        <button type="button" onclick="clickalert()" class="p-0 ms-2" style="border : 0;">
                            <img src="https://cdn-icons-png.flaticon.com/128/4315/4315445.png" alt="" style="width:22px;height:22px;">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
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
                         a.href='http://203.188.54.9/~u6411800010/view/Select_applicants/Select_applicants.php';
                         a.click();}
                )
              } 
            })
        }
    </script>
</body>

</html>