<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Details Appicant</title>

    <!-- Link CSS -->

    <!-- Link Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php
    require_once('../../layout/_layout.php');
    require_once('../../controler/ConnectDB.php');

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $detail_stmt = $conn->prepare('SELECT * FROM NEW_EMP WHERE ID_NEMP = :id');
        $detail_stmt->bindParam(':id', $id);
        $detail_stmt->execute();
        $row = $detail_stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <!-- Title & Images -->
    <h3 class="text-dark text-center mt-4">ประวัติผู้สมัคร</h3>
    <div class="container mb-3 mt-3 text-center">
        <img src="https://anistudy.com/home/images/lms/school_manager.png" class="m-2" width="130vw" alt="" />
    </div>
    <!-- Form All -->
    <form action="" method="post">
        <div class="container w-50">
            <!-- ประวัติส่วนตัว -->
            <div class="ms-5 ps-4">
                <div>
                    <label for="ID_POS">รหัสบัตรประชาชน</label>
                    <input type="text" class="ms-5" style="width: 20vw; height: 3vh"
                        value="<?php echo $row['ID_POS']; ?>" readonly />
                </div>
                <div class="mt-3">
                    <label for="Name" class="p-0">ชื่อ</label>
                    <input type="text" class="ms-3" style="width: 15vw; height: 3vh"
                        value="<?php echo $row['NAME_NEMP']; ?>" readonly />
                    <label for="Name" class="ms-3">นามสกุล</label>
                    <input type="text" class="ms-3" style="width: 15vw; height: 3vh"
                        value="<?php echo $row['LNAME_NEMP']; ?>" readonly />
                </div>

                <div class="mt-3">

                    <span>
                        <label for="SEX">เพศ</label>
                        <input type="text" style="width: 3vw" class="ms-2" value="<?php echo $row['SEX_NEMP']; ?>"
                            readonly>
                        <label for="B_DAY" class="ms-4">วันเกิด</label>
                        <input type="text" class="ms-2" value="<?php echo $row['BDAY_NEMP']; ?>" readonly>
                        <label for="B_DAY" class="ms-4">วันที่สมัคร</label>
                        <input type="text" class="ms-2" value="<?php echo $row['DAY_NEMP']; ?>" readonly>
                    </span>
                    <div class="mt-3">
                        <label for="Tel-Num">เบอร์โทรศัพท์</label>
                        <input type="text" name="tel" id="tel" class="ms-4" value="<?php echo $row['PHONE']; ?>"
                            readonly>
                        <label for="EMAIL" class="ms-4">อีเมล</label>
                        <input type="text" name="EMAIL" id="EMAIL" style="width: 350px;"
                            value="<?php echo $row['EMAIL']; ?>" readonly>
                    </div>

                    <div class="mt-3">
                        <label for="Nation">สัญชาติ</label>
                        <input type="text" style="width: 150px" class="ms-2"
                            value="<?php echo $row['RELIGION_NEMP']; ?>" readonly>
                        <label for="NOTIONALITY" class="ms-2">ศาสนา</label>
                        <input type="text" style="width: 150px" name="NOTIONALITY" id="NOTIONALITY"
                            value="<?php echo $row['NOTIONALITY_NEMP']; ?>" readonly>
                        <label for="Blood" class="">กรุ๊บเลือด</label>
                        <input type="text" style="width: 150px" name="BLOOD_GROUP" id="Blood"
                            value="<?php echo $row['BLOOD_GROUP']; ?>" readonly>


                    </div>
                </div>
                <div class="mt-3">
                    <label for="ADDRESS">ที่อยู่</label>
                    <br />
                    <textarea name="ARDESS" id="ARDESS" class="mt-2" cols="80" rows="5" style="resize: none;"
                        readonly><?php echo $row['ADDRESS']; ?></textarea>
                </div>
                <!-- คุณสมบัติพื้นฐาน -->
                <div>
                    <h4 class="mt-3">คุณสมบัติพื้นฐาน</h3>
                </div>
                <!-- Table -->
                <?php
                    $data = $conn->query("SELECT NAME_FEAT,DETEL FROM LIST_FEATUREAS_NEMP
                    join BASE_FEATUREAS on FEAT = ID_FEAT
                    join NEW_EMP on NEMP = ID_NEMP
                    join LIST_FEATUREAS_POSITION on FEAT = LIST_FEATUREAS_POSITION.ID_FEATUREAS
                    where NEMP = '".$row['ID_NEMP']."' and LIST_FEATUREAS_POSITION.ID_POSITION = (select ID_PST from LIS_NEMP_REC
                    join RECTUITMENT on rec = id_rec
                    join REQUIRED_EMP on RECTUITMENT.REQ_REC = REQUIRED_EMP.ID_REQ
                    join POSITION on PST_REQ = id_PST
                    where NEMP = '".$row['ID_NEMP']."')")->fetchALL(PDO::FETCH_ASSOC); 
                ?>

                <div class="container ps-0">
                    <table class="table table-striped mt-4  bg-light">
                        <thead>
                            <tr>
                                <th scope="col">ชื่อคุณสมบัติที่มี</th>
                                <th scope="col">รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for ($i = 0; $i < count($data); $i++) {?>
                            <tr>
                                <td><?php echo $data[$i]['NAME_FEAT']?></td>
                                <td><?php echo $data[$i]['DETEL']?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- เกี่ยวกับคุณ -->
                <div class="mt-4">
                    <h4>เกี่ยวกับคุณ</h3>
                </div>
                <div class="mt-3">
                    <label for="">คำอธิบายเพิ่มเติมที่เกี่ยวกับคุณ</label>
                    <br />
                    <textarea name="ABOUT_YOU" id="ABOUT_YOU" class="mt-2" cols="80" rows="5"
                        style="resize: none;"><?php echo $row['ABOUT_YOU']; ?></textarea>

                </div>
            </div>
        </div>
    </form>
    <!-- Button Cansal & Aaccept -->
    <!-- Button Cansal & Aaccept -->
    <div class="container">
        <div class="button d-flex justify-content-center align-items-center mt-4">
            <a href="http://203.188.54.9/~u6411800010/view/Schedule_an_interview_date/detail_interview.php">
                <button type="button" class="btn  btn-danger mb-5" style="width:150px;">ยกเลิก</button>
            </a>
            <button onclick="clickalert()" type="button" class="btn  btn-primary ms-4 mb-5"
                style="width:150px;">ยืนยัน</button>
        </div>
    </div>

    <script>
    function clickalert() {
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
                    () => {
                        var a = document.createElement('a');
                        a.href = 'http://203.188.54.9/~u6411800010/view/new_emp/pannic.php';
                        a.click();
                    }
                )
            }
        })
    }
    </script>

</body>

</html>