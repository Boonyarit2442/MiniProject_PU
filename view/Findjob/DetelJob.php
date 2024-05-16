<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deteljob</title>
    <link rel="stylesheet" href="DetelJob.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Kanit', sans-serif;
    }
    </style>
</head>

<body>
    <?php require_once("../../controler/DetelJobController.php"); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="http://203.188.54.9/~u6411800010/">
                <text-bold class="text-light fw-bold fs-2 ">Area</text-bold>
                <teext-y class="text-warning fw-bold ms-2">113</teext-y>
            </a>
            <div>
                <a class="me-3 btn btn-warning" href="http://203.188.54.9/~u6411800010/">หางาน</a>
            </div>
        </div>
    </nav>

    <div class="container mb-3 mt-3">
        <img src="https://anistudy.com/home/images/lms/school_manager.png" class="m-2" width="130vw" alt="">
    </div>
    <div class="container">
        <div class="blockposition p-3">
            <div class="container d-flex justify-content-between">
                <h5 class="NameDep fs-2 fw-bold ms-4">
                    <?php echo $data[0]['NAME_PST'] ?>
                </h5>
                <p>สิ้นสุด
                    <?php echo $data[0]['DAYEND_REQ'] ?>
                </p>
            </div>
            <div class="container">
                <i class="fa-solid fa-location-dot fs-3 mt-2 d-inline-block text-danger"></i>
                <p class="d-inline-block ms-2 fw-bold">สถานที่ปฏิบัติงาน</p>
                <p class="d-inline-block ms-5 text-muted">นิคมอุตสาหกรรมอัญธานี กรุงเทพมหานคร</p>
            </div>
            <div class="container">
                <i class="fa-solid fa-sack-dollar fs-3 mt-2 d-inline-block text-danger"></i>
                <p class="d-inline-block ms-2 fw-bold">เงินเดือน</p>
                <p class="d-inline-block ms-5 text-muted">
                    <?php echo $data[0]['SALSTART'] ?>-
                    <?php echo $data[0]['SLAEND'] ?> บาท
                </p>
            </div>
            <div class="container mt-2">
                <i class="fa-solid fa-people-group fs-3 mt-2 d-inline-block text-danger"></i>
                <p class="d-inline-block ms-2 fw-bold">รับจำนวน</p>
                <p class="d-inline-block ms-5 text-muted">
                    <?php echo $data[0]['NUM_REQ'] ?>
                </p>
            </div>
            <div class="container d-flex justify-content-end">
                <a class="btn btn-danger fs-3"
                    href=<?php echo  "http://203.188.54.9/~u6411800010/view/Findjob/Input_Doc_NewEmp.php?KEY_INFO=".$_GET['KYE_INFO']?>>สมัครงาน</a>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <b>รายละเอียดงาน</b> <br>
        <?php echo $data[0]['DETEL_REC'] ?>
        <br><b>คุณสมบัติ</b> <br>
        <?php $FEAT = FEAT($conn, $data); ?>
        <div class="container w-50 ">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($FEAT); $i++) { ?>
                    <tr>
                        <td>
                            <?php echo $FEAT[$i]['NAME_FEAT'] ?>
                        </td>
                        <td>
                            <?php echo $FEAT[$i]['DETEL'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <p>
            <b>รายละเอียดเพิ่มเติม</b>
            <br>
            <?php echo $data[0]['JOB_DETEL'] ?>
        </p>
    </div>

</body>
</body>

</html>