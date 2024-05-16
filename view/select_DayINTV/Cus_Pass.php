<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="style_detail_interview.css">

    <!-- Link Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Details interview</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php') ?>
    <?php require_once('../../controler/detail_interviewController.php') ?>
    <?php require_once('../../controler/Cus_passController.php') ?>
    <!-- Bar Menu -->
    <div class="menu-bar container d-flex justify-content-between align-items-center " style="margin-top: 30px;">
        <h2 class="text-primary">ข้อมูลผู้มีสิทธิ์สัมภาษณ์</h2>
        <div class="d-flex flex-row justify-content-center align-items-center">
            <input class="form-control me-3" type="search" placeholder="ค้นหา" aria-label="Search"
                style="width: 600px;">
            <button class="btn btn-outline-success" type="submit" style="width: 100px;">Search</button>
        </div>
    </div>
    <!-- Table -->
    <div class="container ">
        <table class="table table-striped mt-4 bg-light">
            <thead>
                <tr>
                    <th scope="col">รหัส</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">นามสกุล</th>
                    <th scope="col">เพศ</th>
                    <th scope="col">เงินเดือนที่ต้องการ</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i < count($Data) ; $i++) { ?>
                <tr>
                    <td><?php echo $Data[$i]['ID_NEMP'] ?></td>
                    <td><?php echo $Data[$i]['NAME_NEMP'] ?></td>
                    <td><?php echo $Data[$i]['LNAME_NEMP'] ?></td>
                    <td><?php echo $Data[$i]['SEX_NEMP'] ?></td>
                    <td><?php echo $Data[$i]['SALREQ'] ?></td>
                    <td><?php echo $Data[$i]['EMAIL'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <footer>
        <!-- Button Cansal & Aaccept -->
        <?php //if(checkstatus($conn,$_GET['KEY_INFO'])){?>
        <div class="container">
            <div class="button d-flex justify-content-center align-items-center mt-5">
                <?php $status = check_AddedDate($conn,$_SESSION['ID_EMP'],$_GET['KEY_INFO']) ;if(!$status['STATUS_ADDED']){?>
                <a
                    href=<?php echo "http://203.188.54.9/~u6411800010/view/select_DayINTV/selectDayCaranda.php?KEY_INFO=".$_GET['KEY_INFO'] ?>><button
                        type="button" class="btn  btn btn-success ms-4"
                        style="width:150px;height:50px;">เลือกวันสัมภาษณ์</button></a>
                <?php } else{?>
                <div class="container">
                    <div class="alert alert-danger text-center" role="alert">
                        เลือกวัน <?php echo date("d M Y", strtotime($status['DAY_INTERVIEW'])) ?> ไปแล้ว
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php  //}else { ?>
        <!--<div class="container">
            <div class="alert alert-danger" role="alert">
                รอวันนัดสัมภาษณ์
            </div>
        </div>-->
        <?php //} ?>
    </footer>

</body>

</html>