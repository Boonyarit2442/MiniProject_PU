<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--===== CSS =====-->
    <link rel="stylesheet" href="styles_reg_rit.css">
    <title>Registration</title>
</head>

<body>
<?php 
require_once("../../layout/_layout.php"); 
require_once('../../controler/employeeController.php');
if (empty($_GET)) {
    // no data passed by get
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/view/Employee/employee_page.php'</script>";
}
if (!isset($_SESSION['id'])){
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/index.php'</script>";
}
?>
<div class="d-flex justify-content-center align-content-center pt-2">
    <div class="container_reg">
        <header>เอกสารพนักงาน</header>
        <!--form action="../../controler/employeeController.php" method="POST"-->
        <form action="#" method="POST">
            <div class="form-detail-emp">
                <div class="detail-emp">
                    <!--<div><img src="https://rare-gallery.com/thumbs/128750-cute-girl-hd-4k.jpg" alt="" width="95"
                            height="123 "></div>-->
                    <span class="title">แก้ไขข้อมูลพนักงาน</span>
                    <!-- Alert Error -->
                    <?php if(isset($_GET['error'])){ ?>
                      <div class="alert alert-danger container mt-3" role="alert" style="width: 100%;">
                          <?php echo $_GET['error']; ?>
                      </div>
                    <?php } ?>
                    <div class="fields">
                        <div class="input-field">
                            <label> ID พนักงาน</label>
                            <input type="text" value="<?=$edit[0]['ID_EMP']?>" name="ID" id="ID" readonly>
                        </div>
                        <?php $edit[0]['ID_EMP']?>
                        <div class="input-field">
                            <label>ชื่อ</label>
                            <input type="text" name="NAME" id="NAME" value="<?=$edit[0]['NAME']?>">
                        </div>
                        <div class="input-field">
                            <label>นามสกุล</label>
                            <input type="text" name="LNAME" id="LNAME" value="<?=$edit[0]['L_NAME']?>">
                        </div>
                        <div class="input-field">
                            <label>วันเกิด</label>
                            <?php
                                $bd = date_create($edit[0]['B_DAY']);
                                $formattedBD = date_format($bd, "Y-m-d");
                            ?>
                            <input type="date" name="B_DAY" id="B_DAY" value="<?= $formattedBD ?>">
                        </div>
                        <div class="input-field">
                            <label>เพศ</label>
                            <select name="SEX" id="SEX" >
                                <option value="M" <?php echo ($edit[0]['SEX'] === 'M') ? 'selected' : ''; ?>>ชาย</option>
                                <option value="F" <?php echo ($edit[0]['SEX'] === 'F') ? 'selected' : ''; ?>>หญิง</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>อีเมล</label>
                            <input type="text" name="EMAIL" id="EMAIL" value="<?=$edit[0]['EMAIL']?>">
                        </div>
                        <div class="input-field">
                            <label>เบอร์โทร</label>
                            <input type="text" name="TEL" id="TEL" value="<?=$edit[0]['TEL']?>">
                        </div>
                        <div class="input-field">
                            <label>สัญชาติ</label>
                            <select name="NATIONALITY" id="NATIONALITY">
                                <option value="Thai" <?php echo ($edit[0]['NATIONALITY'] === 'Thai') ? 'selected' : ''; ?>>ไทย</option>
                                <option value="American" <?php echo ($edit[0]['NATIONALITY'] === 'American') ? 'selected' : ''; ?>>อเมริกัน</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>เลขบัตรประชาชน</label>
                            <input type="text" name="ID_POS" id="ID_POS" value="<?=$edit[0]['ID_POS']?>"> 
                        </div>
                        <div class="input-field">
                            <label>แผนก</label>
                            <select name="DEPNO" id="DEPNO" onchange="UPPOS(this)">
                            <?php for ($i=0; $i < count($Dep); $i++) { ?>
                                <option value="<?=$Dep[$i]['ID_DEP']?>" <?php if ($Dep[$i]['ID_DEP'] == $edit[0]['DEPNO']) echo 'selected'; ?>><?=$Dep[$i]['NAME_DEP']?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>ตำเเหน่ง</label>
                            <select name="PSTNO" id="PSTNO" onchange="UPTABLE(this)">
                            <?php for ($i=0; $i < count($Pst); $i++) { ?>
                                <option value="" <?php if ($Pst[$i]['ID_PST'] == $edit[0]['PSTNO']) echo 'selected'; ?>><?=$Pst[$i]['NAME_PST']?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>เงินเดือน</label>
                            <input type="text" name="SAL" id="SAL" value="<?=$edit[0]['SAL']?>">
                        </div>
                        <div class="input-field">
                            <label>วันที่เริ่มทำงาน</label>
                            <?php
                                $startDate = date_create($edit[0]['STARTDATE']);
                                $formattedStartDate = date_format($startDate, "Y-m-d");
                            ?>
                            <input type="date" name="STARTDATE" id="STARTDATE" value="<?= $formattedStartDate ?>">
                        </div>
                        <div class="input-field">
                            <label>หัวหน้า</label>
                            <input type="text" name="LEAD" id="LEAD" value="<?=$edit[0]['ID_LEAD']?>">
                        </div>
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" name="USER" id="USER" value="<?=$edit[0]['USER_ID']?>">
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="PASSWORD" id="PASSWORD" value="<?=$edit[0]['PASSWORD']?>">
                        </div>
                        <div class="input-field">
                            <label>ที่อยู่</label>
                            <textarea id="ADDRESS" name="ADDRESS" rows="6" cols="50" ><?=$edit[0]['ADDRESS']?></textarea>
                        </div>
                    </div>

                    <div class="btn-all justify-content-center align-content-center">
                        <button class="btn-submit" value="EDIT" name = "_method">
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
<script>
    function UPPOS(e) {
            var info = <?php echo json_encode($Pst) ?>;
            var pos = document.getElementById('PSTNO');
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
</script>
</body>

</html>