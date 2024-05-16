<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADD score NewEmployee</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php'); ?>
    <?php require_once('../../controler/Select_DEPNEMPController.php'); ?>
    <h3 class="text-center mt-5">โปรดประกาศ</h3>
    <div class="container mt-5">
        <!--วนรอบก้อนนี้ได้ กาด เลย-->
        <?php for ($i = 0; $i < count($Data); $i++) { ?>
            <div class="card p-1 m-2 d-inline-block" style="width: 18rem; z-index: 0;">
                <div class="d-flex justify-content-center">
                </div>
                <div class="card-body text-center">
                    <h3 class="card-title text-center">
                        <span>
                            <?php echo $Data[$i]['DAY_SELECT'] ?>
                        </span>
                    </h3>
                    <span>ตำแหน่ง :</span>
                    <span>
                        <?php echo $Data[$i]['NAME_PST'] ?>
                    </span>
                    <p class="card-text text-center" style=" width: 100%; height: 200px">
                        <span>เหตุผลที่ร้องขอ :</span>
                        <br>
                        <?php echo $Data[$i]['DETEL_REQ'] ?>
                    </p>
                    <a href=<?php echo "Select_Nemp.php?KEY_INFO=" . $Data[$i]['ID_INVIEW'] ?>
                        class="btn btn-secondary">ดูผู้สมัคร</a>
                </div>
            </div>
        <?php } ?>
        <!--วนรอบก้อนนี้ได้ กาด เลย-->

    </div>
</body>

</html>