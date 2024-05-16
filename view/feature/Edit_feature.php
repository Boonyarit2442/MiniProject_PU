<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--===== CSS =====-->
    <link rel="stylesheet" href="./edit.css">
    <title>Registration</title>
</head>

<body>
    <?php
    require_once("../../layout/_layout.php");
    require_once('../../controler/Feature.php');
    $PositionId = $_GET['pstid'];
    $Order = $_GET['order'];
    ?>
</body>

<div class="d-flex justify-content-center align-content-center pt-2"
    style="background-color: rgb(232, 232, 232);height:900px ;">
    <div class="container_reg" style="height:450px ; margin-top: 100px;">
        <header style="margin-left: 15px;">แก้ไขข้อมูลคุณสมบัติ</header>
        <form action="../../controler/Feature.php" method="POST" style="height : 200px">
            <div class="form-detail-emp">
                <div class="detail-emp">
                    <div class="combo-pos" style="margin-left: 15px;">
                        <label>ชื่อตำแหน่งที่ต้องการแก้ไข</label><br>
                        <select name="NAME_PST" id="NAME_PST">
                            <?php for ($i = 0; $i < count($SelectPst); $i++) { ?>
                                <option value="<?= $SelectPst[$i]['NAME_PST'] ?>" <?php if ($SelectPst[$i]['ID_PST'] == $edit[0]['ID_PST'])
                                      echo 'selected'; ?>>
                                    <?= $SelectPst[$i]['NAME_PST'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="combo-pos" style="margin-left: 15px;">
                        <label>ชื่อคุณสมบัติที่ต้องแก้ไข</label><br>
                        <select name="NAME_FEAT" id="NAME_FEAT">
                            <?php for ($i = 0; $i < count($SelectFeat); $i++) { ?>
                                <option value="<?= $SelectFeat[$i]['NAME_FEAT'] ?>" <?php if ($SelectFeat[$i]['ID_FEAT'] == $edit[0]['ID_FEAT'])
                                      echo 'selected'; ?>>
                                    <?= $SelectFeat[$i]['NAME_FEAT'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-field" style="margin-left: 15px;">
                        <label>รายละเอียด</label><br>
                        <textarea id="DETEL" name="DETEL" rows="6" cols="40" style="margin: top 5px"><?= $edit[0]['DETEL'] ?></textarea></div><br>
                    </div>
                    <div class="btn-all justify-content-center align-content-center">
                    <input type="hidden" name="ORDER_FP" id="ORDER_FP" value="<?=$Order?>">
                        <button class="btn-submit" value="EDIT" name="_method">
                            <div>ตกลง</div>
                        </button>
                        <button class="btn-cansal" value="CANCEL" name="_method">
                            <div>ยกเลิก</div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</html>