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
                    <span class="title">เพิ่มข้อมูลพนักงาน</span>
=======
                    <div><img src="https://rare-gallery.com/thumbs/128750-cute-girl-hd-4k.jpg" alt="" width="95"
                            height="123 "></div>
                    <span class="title">ข้อมูลพนักงาน</span>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                    <div class="fields">
                        <div class="input-field">
                            <label> ID พนักงาน</label>
                            <input type="text" name="ID" id="ID">
                        </div>
                        <div class="input-field">
                            <label>ชื่อ</label>
                            <input type="text" name="NAME" id="NAME">
                        </div>
                        <div class="input-field">
                            <label>นามสกุล</label>
                            <input type="text" name="LNAME" id="LNAME">
                        </div>
                        <div class="input-field">
                            <label>วันเกิด</label>
                            <input type="date" name="B_DAY" id="B_DAY">
                        </div>
                        <div class="input-field">
                            <label>เพศ</label>
                            <select name="SEX" id="SEX" >
<<<<<<< HEAD
                                <option value="M">ชาย</option>
                                <option value="F">หญิง</option>
=======
                                <option value="male">ชาย</option>
                                <option value="female">หญิง</option>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                            </select>
                        </div>
                        <div class="input-field">
                            <label>อีเมล</label>
                            <input type="text" name="EMAIL" id="EMAIL">
                        </div>
                        <div class="input-field">
                            <label>เบอร์โทร</label>
                            <input type="text" name="TEL" id="TEL">
                        </div>
                        <div class="input-field">
                            <label>สัญชาติ</label>
                            <select name="NATIONALITY" id="NATIONALITY">
<<<<<<< HEAD
                                <option value="Thai">ไทย</option>
                                <option value="American">อเมริกัน</option>
=======
                                <option value="thai">ไทย</option>
                                <option value="american">อเมริกัน</option>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
                            </select>
                        </div>
                        <div class="input-field">
                            <label>เลขบัตรประชาชน</label>
                            <input type="text" name="ID_POS" id="ID_POS">
                        </div>
                        <div class="input-field">
                            <label>แผนก</label>
                            <select name="DEPNO" id="DEPNO">
                            <?php for ($i=0; $i < count($Dep); $i++) { ?>
                                <option value="<?=$Dep[$i]['ID_DEP']?>"><?=$Dep[$i]['NAME_DEP']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>ตำเเหน่ง</label>
                            <select name="PSTNO" id="PSTNO">
                            <?php for ($i=0; $i < count($Pst); $i++) { ?>
                                <option value="<?=$Pst[$i]['ID_PST']?>"><?=$Pst[$i]['NAME_PST']?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>เงินเดือน</label>
                            <input type="text" name="SAL" id="SAL">
                        </div>
                        <div class="input-field">
                            <label>วันที่เริ่มทำงาน</label>
                            <input type="date" name="STARTDATE" id="STARTDATE">
                        </div>
                        <div class="input-field">
                            <label>วันที่สิ้นสุดการทำงาน</label>
                            <input type="date" name="ENDDATE" id="ENDDATE">
                        </div>
                        <div class="input-field">
                            <label>ที่อยู่</label>
                            <textarea id="ADDRESS" name="ADDRESS" rows="6" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="btn-all">
                        <button class="btn-submit" value="ADD" name="_method">
                            <div>ตกลง</div>
                        </button>  
                        <button class="btn-cansal" >
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