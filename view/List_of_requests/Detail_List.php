<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link CSS -->
    <link rel="stylesheet" href="style_Detail_List.css">

    <title>Detail of requests</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php') ?>
    <?php require_once('../../controler/List_REQ.php') ?>
    <!-- Bar Menu -->
    <style>
        input,textarea{
            background-color: #eaeaea;
        }
    </style>
    <!-- bar1 -->
    <div class="bar-menu container d-flex justify-content-between align-items-center mt-5">
        <div>
            <div>เลขที่เอกสาร</div>
            <input type="text" value=<?php echo $_GET['KEY_INFO'] ?> readonly>
        </div>
        <div>
            <div>ผู้บันทึก</div>
            <input type="text" style="width: 400px;" value=<?php echo $Data1[0]['NAME']; ?> readonly>
        </div>
        <div>
            <div>วันที่เอกสาร</div>
            <input type="date" style="width: 200px;" readonly>
        </div>
        <div>
            <div>ลักษณะการว่าจ้างงาน</div>
            <input type="text" name="" id="" value=<?php echo $Data1[0]['TYPE_REQ'] ?> readonly>
        </div>
    </div>
    <!-- bar2 -->
    <div class="bar-menu container d-flex justify-content-between align-items-center " readonly>
        <div>
            <div>แผนก</div>
            <input type="text" name="" id="" value=<?php echo $Data1[0]['NAME_DEP'] ?> readonly>
        </div>
        <div>
            <div>ตำแหน่งงานที่ร้องขอ</div>
            <input type="text" name="" id="" value=<?php echo $Data1[0]['NAME_PST'] ?> readonly>
        </div>
        <div>
            <div>จำนวนคนที่ร้องขอ</div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="number-input">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"
                        style="width: 30px;"></button>
                    <input class="quantity" min="0" name="quantity" value=<?php echo $Data1[0]['NUM_REQ'] ?>
                        type="number" readonly>
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
                <span class="label-count">คน</span>
            </div>
        </div>
        <div>
            <div>จำนวนคนที่ได้รับ</div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="number-input">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"
                        style="width: 30px;"></button>
                    <input class="quantity" min="0" name="quantity" value=<?php echo $Data1[0]['GET_REQ'] ?>
                        type="number" readonly>
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                </div>
                <span class="label-count">คน</span>
            </div>
        </div>
        <div>
            <div>สเตตัสเอกสาร</div>
            <input type="text" value=<?php echo $Data1[0]['STATUS'] ?>
                style="text-align: center;background-color: rgb(252, 252, 71);cursor: context-menu;" readonly>
        </div>
    </div>
    <!-- Table -->
    <div class="container " style="width: 600px;">
        <table class="table table-striped mt-5 mb-5 bg-light">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate" readonly>
                        </div>
                    </th>
                    <th scope="col">ชื่อคูณสมบัติ</th>
                    <th scope="col">รายละเอียด</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" id="flexCheckIndeterminate">
                        </div>
                    </td>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </td>
                    <td>Larry the Bird</td>
                    <td>Jin</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- รายระเอียดงาน/เหตุผลที่ร้องขอ  -->
    <div class="container">
        <div>
            <label>รายละเอียดงาน / เหตุผลที่ร้องขอ</label>
        </div>
        <div class="text-area">
            <textarea id="address"  name="address" rows="6"
                cols="50" readonly></textarea>
                <script>
                    document.getElementById('address').innerHTML = "<?php echo $Data1[0]['DETEL_REQ'] ?>";
                </script>
        </div>
    </div>

</body>

</html>