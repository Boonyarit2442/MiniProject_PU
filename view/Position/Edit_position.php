<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--===== CSS =====-->
    <link rel="stylesheet" href="edit_pos_style.css">
    <title>Registration</title>
</head>

<body>
    <?php
    require_once("../../layout/_layout.php");
    require_once('../../controler/postitionController.php');
        
    $positionId = $_GET['id'];

    ?>
</body>

<div class="d-flex justify-content-center align-content-center pt-2" style="background-color: rgb(232, 232, 232);height:900px">
    <div class="container_reg" style="height:500px ; margin-top: 100px;" >
        <header>แก้ไขข้อมูลตำแหน่ง</header>
        <!-- Alert Error -->
        <?php if(isset($_GET['error'])){ ?>
          <div class="alert alert-danger container mt-3" role="alert" style="width: 100%;">
              <?php echo $_GET['error']; ?>
        </div>
        <?php } ?>
        <form action="#" method="POST" style="height : 200px">
            <div class="form-detail-emp">
                <div class="detail-emp">
                    <div class="fields">
                        <div class="input-field">
                            <label>แผนก</label>
                            <select name="NAME_DEP" id="NAME_DEP">
                            <?php for ($i=0; $i < count($Dep); $i++) { ?>
                                <option value="<?=$Dep[$i]['ID_DEP']?>" <?php if ($Dep[$i]['ID_DEP'] == $edit[0]['P_DEPNO']) echo 'selected'; ?>><?=$Dep[$i]['NAME_DEP']?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>ชื่อสิทธิ</label>
                            <select name="NAME_PERM" id="NAME_PERM">
                                <?php for ($i = 0; $i < count($Perm); $i++) { ?>
                                    <option value="<?= $Perm[$i]['ID_PERM'] ?>" <?php if ($Perm[$i]['ID_PERM'] == $edit[0]['PERNO'])
                                        echo 'selected'; ?>>
                                        <?= $Perm[$i]['NAME_PERM'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>รายละเอียดงาน</label>
                            <textarea id="JOB_DETEL" name="JOB_DETEL" rows="6" cols="50"><?= $edit[0]['JOB_DETEL'] ?></textarea>
                        </div>
                    </div>
                   
                    <div class="input-field">
                            <label>ชื่อตำแหน่ง</label><br>
                            
                            <input type="text" name="NAME_PST" id="NAME_PST" value="<?=$edit[0]['NAME_PST']?>">
                        </div>
                    <div class="btn-all justify-content-center align-content-center">
                        <input type="hidden" name="ID_PST" id="ID_PST" value="<?=$positionId?>">
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