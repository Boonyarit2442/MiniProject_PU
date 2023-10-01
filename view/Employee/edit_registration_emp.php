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
?>
<div class="d-flex justify-content-center align-content-center pt-2">
    <div class="container_reg">
        <header>เอกสารพนักงาน</header>
        <form action="../../controler/employeeController.php" method="POST">
            <div class="form-detail-emp">
                <div class="detail-emp">
<<<<<<< HEAD
                    <!--<div><img src="https://rare-gallery.com/thumbs/128750-cute-girl-hd-4k.jpg" alt="" width="95"
                            height="123 "></div>-->
                    <span class="title">แก้ไขข้อมูลพนักงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label> ID พนักงาน</label>
                            <input type="text" value="<?=$edit[0]['ID_EMP']?> " disabled>
                            <input type="hidden" value="<?=$edit[0]['ID_EMP']?>" name="ID" id="ID"> 
=======
                    <div><img src="https://rare-gallery.com/thumbs/128750-cute-girl-hd-4k.jpg" alt="" width="95"
                            height="123 "></div>
                    <span class="title">ข้อมูลพนักงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label> ID พนักงาน</label>
                            <input type="text" name="ID" id="ID" value="<?=$edit[0]['ID_EMP']?> " disabled>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                        </div>
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
<<<<<<< HEAD
                            <?php
                                $bd = date_create($edit[0]['B_DAY']);
                                $formattedBD = date_format($bd, "Y-m-d");
                            ?>
                            <input type="date" name="B_DAY" id="B_DAY" value="<?= $formattedBD ?>">
=======
                            <input type="date" name="B_DAY" id="B_DAY" value="<?=$edit[0]['B_DAY']?>">
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                        </div>
                        <div class="input-field">
                            <label>เพศ</label>
                            <select name="SEX" id="SEX" >
<<<<<<< HEAD
                                <option value="M" <?php echo ($edit[0]['SEX'] === 'M') ? 'selected' : ''; ?>>ชาย</option>
                                <option value="F" <?php echo ($edit[0]['SEX'] === 'F') ? 'selected' : ''; ?>>หญิง</option>
=======
                                <option value="male">ชาย</option>
                                <option value="female">หญิง</option>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
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
<<<<<<< HEAD
                                <option value="Thai" <?php echo ($edit[0]['NATIONALITY'] === 'Thai') ? 'selected' : ''; ?>>ไทย</option>
                                <option value="American" <?php echo ($edit[0]['NATIONALITY'] === 'American') ? 'selected' : ''; ?>>อเมริกัน</option>
=======
                                <option value="thai">ไทย</option>
                                <option value="american">อเมริกัน</option>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                            </select>
                        </div>
                        <div class="input-field">
                            <label>เลขบัตรประชาชน</label>
                            <input type="text" name="ID_POS" id="ID_POS" value="<?=$edit[0]['ID_POS']?>"> 
                        </div>
                        <div class="input-field">
                            <label>แผนก</label>
                            <select name="DEPNO" id="DEPNO">
                            <?php for ($i=0; $i < count($Dep); $i++) { ?>
<<<<<<< HEAD
                                <option value="<?=$Dep[$i]['ID_DEP']?>" <?php if ($Dep[$i]['ID_DEP'] == $edit[0]['DEPNO']) echo 'selected'; ?>><?=$Dep[$i]['NAME_DEP']?> </option>
=======
                                <option value="<?=$Dep[$i]['ID_DEP']?>"><?=$Dep[$i]['NAME_DEP']?></option>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>ตำเเหน่ง</label>
                            <select name="PSTNO" id="PSTNO">
                            <?php for ($i=0; $i < count($Pst); $i++) { ?>
<<<<<<< HEAD
                                <option value="<?=$Pst[$i]['ID_PST']?>" <?php if ($Pst[$i]['ID_PST'] == $edit[0]['PSTNO']) echo 'selected'; ?>><?=$Pst[$i]['NAME_PST']?></option>
=======
                                <option value="<?=$Pst[$i]['ID_PST']?>"><?=$Pst[$i]['NAME_PST']?></option>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                            <?php } ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>เงินเดือน</label>
                            <input type="text" name="SAL" id="SAL" value="<?=$edit[0]['SAL']?>">
                        </div>
                        <div class="input-field">
                            <label>วันที่เริ่มทำงาน</label>
<<<<<<< HEAD
                            <?php
                                $startDate = date_create($edit[0]['STARTDATE']);
                                $formattedStartDate = date_format($startDate, "Y-m-d");
                            ?>
                            <input type="date" name="STARTDATE" id="STARTDATE" value="<?= $formattedStartDate ?>">
                        </div>
                        <div class="input-field">
                            <label>วันที่สิ้นสุดการทำงาน</label>
                            <?php
                                $endDate = date_create($edit[0]['ENDDATE']);
                                $formattedEndDate = date_format($endDate, "Y-m-d");
                            ?>
                            <input type="date" name="ENDDATE" id="ENDDATE" value="<?= $formattedEndDate ?>">
=======
                            <input type="date" name="STARTDATE" id="STARTDATE">
                        </div>
                        <div class="input-field">
                            <label>วันที่สิ้นสุดการทำงาน</label>
                            <input type="date" name="ENDDATE" id="ENDDATE">
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                        </div>
                        <div class="input-field">
                            <label>ที่อยู่</label>
                            <textarea id="ADDRESS" name="ADDRESS" rows="6" cols="50" value="<?=$edit[0]['ADDRESS']?>"></textarea>
                        </div>
                    </div>

                    <div class="btn-all">
                        <button class="btn-submit" value="EDIT" name = "_method">
                            <div>ตกลง</div>
                        </button>  
                        <button class="btn-cansal">
                            <div>ยกเลิก</div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>