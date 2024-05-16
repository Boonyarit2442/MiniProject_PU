<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doc</title>
    <link rel="stylesheet" href="Input_Doc_NewEmp.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body {
            font-family: "Kanit", sans-serif;
        }
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
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="http://203.188.54.9/~u6411800010">
                <text-bold class="text-light fw-bold fs-2">Area</text-bold>
                <teext-y class="text-warning fw-bold ms-2">113</teext-y>
            </a>
            <div>
                <a class="me-3 btn btn-warning" href="http://203.188.54.9/~u6411800010">หางาน
                </a>
            </div>
        </div>
    </nav>
    <?php require_once("../../controler/input_DOCController.php"); ?>
    <?php require_once("update.php"); ?>
    <h3 class="text-dark text-center mt-4">กรอกใบสมัคร</h3>
    <div class="container mb-3 mt-3 text-center">
        <img src="https://anistudy.com/home/images/lms/school_manager.png" class="m-2" width="130vw" alt="" />
    </div>
    <!-- Alert Error -->
    <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-danger container mt-3" role="alert" style="width: 43%;">
            <?php echo $_GET['error']; ?>
        </div>
    <?php } ?>
    <form action="#" method="post" accept-charset="UTF-8">
        <input type="hidden" name="KYE" value=<?php echo $_GET['KEY_INFO'] ?>>
        <div class="container w-50">
            <div class="ms-5 ps-4">
                <div>
                    <label for="ID_POS">รหัสบัตรประชาชน <label style="color : red;" id="error_ssn">*</label></label>
                    <input name="ID_POS" type="number" class="ms-5" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189 && event.keyCode !== 190" oninput="if(value.length>13){value=value.slice(0,13);$('#error_ssn').hide();}else if(value.length<13){$('#error_ssn').show();}" style="width: 20vw; height: 3vh" />
                </div>
                <div class="mt-3">
                    <label for="Name" class="p-0">ชื่อ</label>
                    <input name="name" type="text" class="ms-3" style="width: 15vw; height: 3vh" />
                    <label for="Name" class="ms-3">นามสกุล</label>
                    <input name="Lname" type="text" class="ms-3" style="width: 15vw; height: 3vh" />
                </div>

                <div class="mt-3">
                    <label for="SEX">เพศ</label>
                    <input type="radio" name="SEX" value="M" class="ms-4" />
                    <label for="SEX">ชาย</label>
                    <input type="radio" name="SEX" value="W" class="ms-3" />
                    <label for="SEX">หญิง</label>

                    <label for="NOTIONALITY">ศาสนา</label>
                    <select name="NOTIONALITY" id="NOTIONALITY" style="width: 100px" class="text-center ms-2">
                        <option value="พุทธ">พุทธ</option>
                        <option value="อิสลาม">อิสลาม</option>
                        <option value="คริส">คริส</option>
                    </select>
                    <label for="RELIGION" class="ms-4">เชื้อชาติ</label>
                    <select name="RELIGION" id="RELIGION" style="width: 100px" class="text-center ms-2">
                        <option value="ไทย">ไทย</option>
                        <option value="พม่า">พม่า</option>
                        <option value="กัมพูชา">กัมพูชา</option>
                    </select>
                </div>
                <div>
                    <label for="BLOOD_GROUP" class="mt-3">กรุ๊บเลือด</label>
                    <select name="BLOOD_GROUP" id="BLOOD_GROUP" style="width: 100px" class="text-center ms-2">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                    </select>
                    <label for="B_DAY">วันเกิด</label>
                    <input type="date" name="B_DAY" id="B_DAY" class="ms-3" style="width: 10vw" class="text-center" />
                </div>
                <div class="mt-3">
                    <label for="EMAIL">Email</label>
                    <input type="email" name="EMAIL" id="EMAIL" style="width: 15vw;height: 3vh" class="ms-2" />
                    <label for="PHONE">เบอร์โทรศัพท์ <label style="color : red;" id="error_tel">*</label></label>
                    <input type="number" name="PHONE" id="PHONE" class="ms-3" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189 && event.keyCode !== 190" oninput="if(value.length>10){value=value.slice(0,10);$('#error_tel').hide();}else if(value.length<10){$('#error_tel').show();}"  style="width: 15vw; height: 3vh" />
                </div>
                <div class="mt-3">
                    <label for="ADDRESS">ที่อยู่</label>
                    <br />
                    <textarea name="ADDRESS" id="ADDRESS" class="mt-2" cols="80" rows="5"></textarea>
                </div>
                <div class="mt-3">
                    <label for="ABOUT_YOU">เกี่ยวกับคุณ</label>
                    <br />
                    <textarea name="ABOUT_YOU" id="ABOUT_YOU" class="mt-2" cols="80" rows="2"></textarea>
                </div>
            </div>
            <div class="mt-3 d-flex ">
                <label for="DEPARTMENT" class="ms-2 me-2">แผนก</label>
                <input type="text" name="DEPARTMENT" id="DEPARTMENT" class="text-center"
                    value=<?php echo $data[0]['NAME_PST'] ?>>
                <label for="POSITION" class="ms-2 me-2 ">ตำแหน่ง</label>
                <input type="text" name="POSITION" class="text-center" value=<?php echo $data[0]['NAME_DEP'] ?>
                    id="POSITION">
                <label for="SAL" class="ms-2 me-2">เงินเดือนที่ต้องการ <label style="color : red;" id="error_sel">*</label></label>
                <input type="number" name="SAL" id="SAL" class="" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189 && event.keyCode !== 190" oninput="if(value.length>8){value=value.slice(0,8);}else{if(value.length>0){$('#error_sel').hide();}else{$('#error_sel').show();}}" style="width: 10vw; height: 3vh" />
            </div>
            <?php $FEAT = FEAT($conn, $data); ?>
            <div class="mt-3 text-center w-50 container">
                <div class="text-danger fw-bold">โปรดเลือกคุณสมบัติที่ตรงตามเงื่อนใข</div>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">
                            <th scope="col">คุณสมบัติ</th>
                            <th scope="col">รายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($FEAT); $i++) { ?>
                        <tr>
                            <th scope="row">
                                <input type="checkbox" name=<?php echo $FEAT[$i]['ID_FEAT'] ?>
                                    value=<?php echo $FEAT[$i]['ID_FEAT'] ?> />
                            </th>
                            <td>
                                <?php echo $FEAT[$i]['NAME_FEAT'] ?>
                            </td>
                            <td>
                                <?php echo $FEAT[$i]['DETEL'] ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-2 text-center">
                <button type="submit" name="submit">ยืนยัน</button>
                <button type="button" name="cansle">ยกเลิก</button>
            </div>
        </div>
    </form>
    <br />
    <br />
</body>

</html>