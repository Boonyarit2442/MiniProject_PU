
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--===== CSS =====-->
    <link rel="stylesheet" href="styles_reg_rit.css">
    <title>Registration</title>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
               -webkit-appearance: none;
                margin: 0;
        }
 
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
<?php 
require_once("../../layout/_layout.php"); 
require_once('../../controler/employeeController.php');
if (!isset($_SESSION['id'])){
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/index.php'</script>";
}
?>
<div class="d-flex justify-content-center align-content-center pt-2">
    <div class="container_reg">
        <header>เพิ่มข้อมูลพนักงาน</header>
        <!-- Alert Error -->
        <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger container mt-3" role="alert" style="width: 100%;">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <form action="#" method="POST">
            <div class="form-detail-emp">
                <div class="detail-emp">
                    <!--<div><img src="https://rare-gallery.com/thumbs/128750-cute-girl-hd-4k.jpg" alt="" width="95"
                            height="123 "></div>-->
                    <span class="title"></span>
                    <div class="fields">
                        <div class="input-field">
                            <label> ID พนักงาน</label>
                            <input type="text" name="ID" id="ID" value=<?php echo $idgen[0]['AUTOID']?> readonly>
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
                                <option value="M">ชาย</option>
                                <option value="F">หญิง</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>อีเมล</label>
                            <input type="email" name="EMAIL" id="EMAIL">
                        </div>
                        <div class="input-field">
                            <label>เบอร์โทร <label style="color : red;" id="error_tel">*</label></label>
                            <input type="number" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189 && event.keyCode !== 190" oninput="if(value.length>10){value=value.slice(0,10);$('#error_tel').hide();}else if(value.length<10){$('#error_tel').show();}" name="TEL" id="TEL">
                        </div>
                        <div class="input-field">
                            <label>สัญชาติ</label>
                            <select name="NATIONALITY" id="NATIONALITY">
                                <option value="Thai">ไทย</option>
                                <option value="American">อเมริกัน</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>เลขบัตรประชาชน <label style="color : red;" id="error_ssn">*</label></label>
                            <input type="number" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189 && event.keyCode !== 190" oninput="if(value.length>13){value=value.slice(0,13);$('#error_ssn').hide();}else if(value.length<13){$('#error_ssn').show();}" name="ID_POS" id="ID_POS">
                        </div>
                        <div class="input-field">
                            <label>แผนก</label>
                            <select name="DEPNO" id="DEPNO" onchange="UPPOS(this)">
                            <option value="">เลือกแผนก</option>
                            <?php for ($i=0; $i < count($Dep); $i++) { ?>
                                <option value="<?=$Dep[$i]['ID_DEP']?>"><?=$Dep[$i]['NAME_DEP']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>ตำเเหน่ง</label>
                            <select name="PSTNO" id="PSTNO" onchange="UPTABLE(this)">
                                <option value="">เลือกตำแหน่ง</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>เงินเดือน <label style="color : red;" id="error_sel">*</label></label>
                            <input type="number" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189 && event.keyCode !== 190" oninput="if(value.length>8){value=value.slice(0,8);}else{if(value.length>0){$('#error_sel').hide();}else{$('#error_sel').show();}}" name="SAL" id="SAL">
                        </div>
                        <div class="input-field">
                            <label>วันที่เริ่มทำงาน</label>
                            <input type="date" name="STARTDATE" id="STARTDATE">
                        </div>
                        <div class="input-field">
                            <label>หัวหน้า</label>
                            <input type="text" name="LEAD" id="LEAD">
                        </div>
                        <div class="input-field">
                            <label>Username</label>
                            <input type="text" name="USER" id="USER">
                        </div>
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="PASSWORD" id="PASSWORD">
                        </div>
                        <div class="input-field">
                            <label>ที่อยู่</label>
                            <textarea id="ADDRESS" name="ADDRESS" rows="6" cols="50"></textarea>
                        </div>
                        
                    </div>

                    <div class="btn-all justify-content-center align-content-center">
                        <!--<button class="btn-submit" value="ADD" name="_method">
                            <div>ตกลง</div>
                        </button>  -->
                        <button class="btn-submit" value="ADD_V2" name="_method">
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