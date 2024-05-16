<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADD score NewEmployee</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php'); ?>
    <?php require_once('../../controler/Select_InterDateController.php'); ?>
    <?php require_once('../../controler/Cus_passController.php'); ?>
    <h3 class="text-center mt-5">บุ๊คกิ้งวันสัมภาษณ์</h3>
    <div class="container mt-5">
        <!--วนรอบก้อนนี้ได้ กาด เลย-->
        <?php for ($i = 0; $i < count($Data); $i++) {
            $Have = check_have_selectedNEMP($conn, $Data[$i]['ID_REC']);
            $status_selectedD = check_selectedDate($conn,$Data[$i]['ID_REC']);
            if (!($Have[0]['NUM'] > 0)) {
                continue;
            }
            ; ?>
        <div class="card p-1 m-2 d-inline-block" style="width: 18rem; z-index: 0;">
            <div class="d-flex justify-content-center">
            </div>
            <div class="card-body text-center">
                <h3 class="card-title text-center">
                    <span>
                        <?php echo $Data[$i]['NAME_PST'] ?>
                    </span>
                </h3>
                <span
                    class="fw-bold p-1 <?php echo ($Data[$i]['STATUS_INTV'] > 0) ? "text-success" : "text-danger"; ?> ">
                    <?php echo ($Data[$i]['STATUS_INTV'] > 0) ? "เลือกวันสัมภาษณ์แล้ว" : "ไม่ได้เลือกวันสัมภาษณ์"; ?>
                </span>
                <br>
                <span class="fw-bold p-1 <?php echo ($status_selectedD['A']) ? "text-success" : "text-danger"; ?> ">
                    <?php echo ($status_selectedD['A']) ? date("d M Y", strtotime($status_selectedD['DAY_SELECT'])) : " "; ?>
                </span>
                <br>
                <span class="fw-bold">วันที่ประกาศ :</span>
                <span>
                    <?php echo date("d M Y", strtotime($Data[$i]['DAY_REC'])) ?>
                </span>
                <br>
                <span class="fw-bold">วันที่สิ้นสุดประกาศ :</span>
                <span>
                    <?php echo date("d M Y", strtotime($Data[$i]['DAYEND_REQ'])) ?>
                </span>
                <br>
                <span class="fw-bold">ชื่อหัวหน้าแผนก</span>
                <br>
                <span>
                    <?php echo $Data[$i]['NAME'] ?>
                </span>
                <br>
                <p class="card-text text-center" style=" width: 100%; height: 200px">
                    <span class="fw-bold">เหตุผลที่ร้องขอ :</span>
                    <br>
                    <?php echo $Data[$i]['DETEL_REQ'] ?>
                </p>
                <span
                    class="fw-bold p-1 <?php echo (!checkstatus($conn, $Data[$i]['ID_REC'])) ? "bg-success" : "bg-danger"; ?> text-light">
                    <?php echo (!checkstatus($conn, $Data[$i]['ID_REC'])) ? "บุ๊คกิ้งแล้ว" : "ยังไม่บุ๊คกิ้ง"; ?>
                </span><br><br>
                <a href=<?php echo "detail_interview.php?KEY_INFO=" . $Data[$i]['ID_REC'] ?>
                    class="btn btn-secondary">ผู้ผ่านการคัดเลือก</a>
            </div>
        </div>
        <?php } ?>
        <!--วนรอบก้อนนี้ได้ กาด เลย-->

    </div>
</body>

</html>