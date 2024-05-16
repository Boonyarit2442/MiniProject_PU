<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REC</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php'); ?>
    <?php require_once('../../controler/MRECController.php'); ?>
    <div class="mt-3 ms-3 text-primary">
        <h2>จัดการประกาศ</h2>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">วันที่ประกาศ</th>
                    <th scope="col">เลขที่เอกสาร</th>
                    <th scope="col">ตำแหน่งที่ร้องขอ</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">open/close</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($Data); $i++) { ?>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <?php echo $Data[$i]['DAY_REC'] ?>
                        </td>
                        <td>
                            <?php echo $Data[$i]['ID_REC'] ?>
                        </td>
                        <td>
                            <?php echo $Data[$i]['NAME_PST'] ?>
                        </td>
                        <td>
                            <?php echo $Data[$i]['NUM_REQ'] ?>
                        </td>
                        <td>
                            <?php echo $Data[$i]['STATUS_REC'] ?>
                        </td>
                        <td>
                            <a href=<?php echo "../../controler/MRECController.php?KEY_INFO='" . $Data[$i]['ID_REC']."'" ?>>
                                <i class="fa-solid fa-circle-xmark fs-4 text-danger"></i>
                            </a>
                            <a href=<?php echo "../../controler/MRECController.php?KEY_OPEN='" . $Data[$i]['ID_REC']."'" ?>>
                                <i class="fa-solid fa-circle-check fs-4 text-success"></i>
                            </a>
                        </td>
                        <td>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>