<?php require_once('../../controler/ConnectDB.php');?>
<?php require_once('../../layout/_layout.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Department</title>
    <!-- Use one version of Bootstrap and jQuery -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Test.css">
</head>

<body>
    <?php require_once('../../layout/_layout.php') ?>
    <?php require_once('../../controler/DepartmentController.php') ?>
    <!-- ตำแหน่ง และ serth -->

    <section class="feature">
        <div class="feature-con">
            <div class="feature-text">แผนก</div>
            <button class="add-feature" type="submit" data-bs-toggle="modal"
                data-bs-target="#CreateModal">+เพิ่มแผนก</button>
        </div>
    </section>
    <!-- Create Position -->
    <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">เพิ่มแผนก</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body w-100 h-100">
                    <form action="../../controler/DepartmentController.php" method="POST">
                        <div class="">
                            <!--from create data -->
                            <div>
                                <label for="ID_PST">รหัส</label><br>
                                <input type="text" name="ID_DEP" id="ID_DEP"><br>
                            </div>
                            <div>
                                <label for="pos-text">แผนก</label><br>
                                <input type="text" name="NAME_DEP" id="NAME_DEP"><br>
                            </div>
                            <div>
                                <label for="pos-text">หัวหน้าแผนก</label><br>
                                <input type="text" name="EMP_LEAD" id="EMP_LEAD"><br>
                            </div>
                            <div>
                                <input type="submit" value="ADD" name="_method" style="margin-top:5px">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>