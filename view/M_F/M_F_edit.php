<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--===== CSS =====-->
    <link rel="stylesheet" href="./M_F_edit.css">
    <title>Registration</title>
</head>

<body>
    <?php
    require_once("../../layout/_layout.php");
    require_once('../../controler/Base_features.php');
    $FeatureId = $_GET['id'];
    ?>
</body>

<div class="d-flex justify-content-center align-content-center pt-2" style="background-color: rgb(232, 232, 232);height:900px">
    <div class="container_reg" style="height:450px ; margin-top: 100px;" >
        <header style="margin-left: 15px;">แก้ไขข้อมูลคุณสมบัติ</header>
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
                            <label>ชื่อคุณสมบัติที่ต้องการแก้ไข</label><br>
                            <input type="text" name="NAME_FEAT" id="NAME_FEAT" value="<?=$edit[0]['NAME_FEAT']?>">
                        </div>
                        <input type="hidden" name="ID_FEAT" id="ID_FEAT" value="<?=$FeatureId?>">
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