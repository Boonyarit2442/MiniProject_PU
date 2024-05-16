<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--===== CSS =====-->
    <link rel="stylesheet" href="./edit_dep_style.css">
    <title>Registration</title>
</head>

<body>
    <?php
    require_once("../../layout/_layout.php");
    require_once('../../controler/DepartmentController.php');
    $DepartmentId = $_GET['id'];
    ?>
</body>

<div class="d-flex justify-content-center align-content-center pt-2" style="background-color: rgb(232, 232, 232);height:900px">
    <div class="container_reg" style="height:450px ; margin-top: 100px;" >
        <header style="margin-left: 15px;">แก้ไขข้อมูลแผนก</header>
        <!-- Alert Error -->
        <?php if(isset($_GET['error'])){ ?>
          <div class="alert alert-danger container mt-3" role="alert" style="width: 100%;">
              <?php echo $_GET['error']; ?>
        </div>
        <?php } ?>
        <form action="#" method="POST" style="height : 200px">
            <div class="form-detail-emp">
                <div class="detail-emp">

                        <div class="input-field"style="margin-left: 15px;" >
                            <label>ชื่อแผนกต้องการเพิ่ม</label><br>
                            <input type="text" name="NAME_DEP" id="NAME_DEP" value="<?=$edit[0]['NAME_DEP']?>">
                        </div>
                        <div class="input-field" style="margin-left: 15px;">
                            <label>รหัสพนักงาน-หัวหน้าแผนก</label><br>
                            <input type="text" name="EMP_LEAD" id="EMP_LEAD" value="<?=$edit[0]['EMP_LEAD']?>">
                        </div>
                        <input type="hidden" name="ID_DEP" id="ID_DEP" value="<?=$DepartmentId?>">
                    <div class="btn-all justify-content-center align-content-center">

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