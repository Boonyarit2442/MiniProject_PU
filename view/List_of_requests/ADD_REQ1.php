<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link CSS -->
    <link rel="stylesheet" href="style_Detail_List.css">

    <title>Detail of requests</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php') ?>
    <?php require_once('../../controler/ADD_REQController.php') ?>
    <!-- Bar Menu -->
    <!-- Alert Error -->
    <?php if(isset($_GET['error'])){ ?>
                      <div class="alert alert-danger container mt-3" role="alert" style="width: 100%;">
                          <?php echo $_GET['error']; ?>
                      </div>
                    <?php } ?>
    <!-- bar1 -->
    <form action="#" method="POST">
        <div class="bar-menu container d-flex justify-content-between align-items-center mt-4">
            <div>
                <div>เลขที่เอกสาร</div>
                <input type="text" style="background-color: #9f9f9f" name="ID_DOC" value=<?php echo $KYE_DOC[0]['AUTOID'] ?> readonly>
            </div>
            <div>
                <div>ผู้บันทึก</div>
                <input type="text" style="width: 400px; background-color: #9f9f9f" name="NAME_EMP_show" value=<?php echo $_SESSION['id'] ?> readonly>
                <input type="hidden" style="width: 400px; background-color: #9f9f9f" name="NAME_EMP" value=<?php echo $_SESSION['ID_EMP'] ?> readonly>
            </div>
            <div>
                <div>วันที่เอกสาร</div>

                <input type="date" style="width: 200px;background-color: #9f9f9f" name="DATE_DOC" value=<?php echo date('Y-m-d') ?> readonly>
            </div>
            <div>
                <div>ลักษณะการว่าจ้างงาน</div>
                <select name="employment" id="employment">
                    <option value="tem">ชั่วคราว</option>
                    <option value="full">ตลอดเวลา</option>
                </select>
            </div>
        </div>


        <!-- bar2 -->
        <div class="bar-menu container d-flex justify-content-evenly align-items-center ">
            <div>
                <div>แผนก</div>
                <select name="department" id="department" onchange="UPPOS(this)">
                    <option value="">เลือกแผนก</option>
                    <?php for ($i = 0; $i < count($DEP); $i++) { ?>
                        <option value=<?php echo $DEP[$i]['ID_DEP'] ?>><?php echo $DEP[$i]['NAME_DEP'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <div>ตำแหน่งงานที่ร้องขอ</div>
                <select name="position" id="position" onchange="UPTABLE(this)">
                    <option value="">เลือกตำแหน่ง</option>
                </select>
            </div>

            <div>
                <div>จำนวนคนที่ร้องขอ</div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="number-input">
                        <!--<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"
                            style="width: 30px;"></button>-->
                        <input class="quantity" min="0" name="quantity" value="0" type="number">
                        <!--<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                            class="plus"></button>-->
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
                        <th scope="col">ชื่อคูณสมบัติ</th>
                        <th scope="col">รายละเอียด</th>
                    </tr>
                </thead>
                <tbody id="ShowFeat">
                </tbody>
            </table>
        </div>
        <!-- รายระเอียดงาน/เหตุผลที่ร้องขอ  -->
        <div class="container">
            <div>
                <label>รายละเอียดงาน / เหตุผลที่ร้องขอ</label>
            </div>
            <div class="text-area">
                <textarea id="address" name="address" rows="10" cols="50"></textarea>
            </div>
        </div>
        <div class="container d-flex justify-content-evenly">
            <button type="reset" class="btn btn-danger me-5">ยกเลิก</button>
            <input type="submit"  class="btn btn-success"id="ADD" value="ADD" name="_method">
        </div>
    </form>
    <script>
        function UPPOS(e) {
            var info = <?php echo json_encode($POS) ?>;
            var pos = document.getElementById('position');
            pos.innerHTML = null;
            for (let i = 0; i < info.length; i++) {
                if (e.value == info[i]['P_DEPNO']) {
                    var op = document.createElement('option');
                    op.innerHTML = info[i]['NAME_PST'];
                    op.value = info[i]['ID_PST']
                    pos.appendChild(op);
                }
            }
        }
        function UPTABLE(e) {
            var info = <?php echo json_encode($FEAT) ?>;
            var tableShow = document.getElementById('ShowFeat');
            tableShow.innerHTML = null;
            for (let i = 0; i < info.length; i++) {
                if (e.value == info[i]['ID_PST']) {
                    var tr = document.createElement('tr');
                    var td1 = document.createElement('td');
                    var td2 = document.createElement('td');
                    td1.innerHTML = info[i]['NAME_FEAT']
                    tr.appendChild(td1);
                    td2.innerHTML = info[i]['DETEL']
                    tr.appendChild(td2);
                    tableShow.appendChild(tr);
                }
            }
        }

        const test = () => {
            swal({
                title: "คุณแน่ใจใช่หรือไม่?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var b = document.getElementById('ADD');
                    b.click();
                    swal("ส่งคะแนน", {
                        icon: "success",
                    }).then(() => {
                        var a = document.createElement("a");
                        a.href =
                            'http://203.188.54.9/~u6411800010/view/List_of_requests/List.php';
                        a.click();
                    });
                }
            })
        }
    </script>
</body>

</html>