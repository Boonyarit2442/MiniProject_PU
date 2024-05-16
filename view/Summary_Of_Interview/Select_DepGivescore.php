<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADD score NewEmployee</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php'); ?>
    <?php require_once('../../controler/Select_DepController.php'); ?>
    <h3 class="text-center mt-5">สรุปคะแนนให้สัมภาษณ์</h3>
    <div class="container mt-5">
        <!--วนรอบก้อนนี้ได้ กาด เลย-->
        <?php for ($i = 0; $i < count($Data); $i++) {
            $have = check_have_selectedNEMP($conn, $Data[$i]['ID_INVIEW']); ?>
            <div class="card p-1 m-2 d-inline-block" style="width: 18rem; z-index: 0;">
                <div class="d-flex justify-content-center">
                </div>
                <div class="card-body text-center">
                    <h3 class="card-title text-center">
                        <span>
                            <?php echo (isset($Data[$i]['DAY_SELECT'])) ? $Data[$i]['DAY_SELECT'] : "ยังไม่มีวันสัมภาษณ์"; ?>
                        </span>
                    </h3>
                    <span>ตำแหน่ง :</span>
                    <span>
                        <?php echo $Data[$i]['NAME_PST']; ?>
                    </span>
                    <span>
                        <?php echo (isset($have)) ? "<br>จำนวนคนค่านการคัดเลือก : " . $have[0]['NUM'] : "0"; ?>
                    </span>
                    <p class="card-text text-center" style=" width: 100%; height: 200px">
                        <span>เหตุผลที่ร้องขอ :</span>
                        <br>
                        <?php echo $Data[$i]['DETEL_REQ'] ?>
                    </p>
                    <a href=<?php echo "summaryofinterview.php?KEY_INFO=" . $Data[$i]['ID_INVIEW'] ?>
                        class="btn btn-secondary">ดูผู้สมัคร</a>
                </div>
            </div>
        <?php } ?>
        <!--วนรอบก้อนนี้ได้ กาด เลย-->

    </div>
</body>

</html>