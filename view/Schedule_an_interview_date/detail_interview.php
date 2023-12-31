<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="style_detail_interview.css">

     <!-- Link Sweetalert2 -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Details interview</title>
</head>
<body>
    <?php require_once('../../layout/_layout.php') ?>
    <!-- Bar Menu -->
    <div class="menu-bar container d-flex justify-content-between align-items-center " style="margin-top: 30px;">
        <h2 class="text-primary">ข้อมูลผู้มีสิทธิ์สัมภาษณ์</h2>
        <div class="d-flex flex-row justify-content-center align-items-center">
            <input class="form-control me-3" type="search" placeholder="ค้นหา" aria-label="Search" style="width: 600px;">
            <button class="btn btn-outline-success" type="submit" style="width: 100px;">Search</button>
        </div>
    </div>
    <!-- Table -->
    <div class="container ">
        <table class="table table-striped mt-4 bg-light">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </th>
                    <th scope="col">รหัส</th>
                    <th scope="col">ว/ด/ป ที่บันทึก</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">ตำแหน่ง</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>
                        <a href="http://203.188.54.9/~u6411800010/view/List_of_requests/Detail_List.php">
                            <img src="https://cdn-icons-png.flaticon.com/128/709/709612.png" width="22" height="22">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Jacob</td>
                    <td>
                         <a href="http://203.188.54.9/~u6411800010/view/List_of_requests/Detail_List.php">
                            <img src="https://cdn-icons-png.flaticon.com/128/709/709612.png" width="22" height="22">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="form-check ">
                            <input class="form-check-input " type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </td>
                    <td>Larry the Bird</td>
                    <td>Jin</td>
                    <td>@twitter</td>
                    <td>Larry the Bird</td>
                    <td>
                        <a href="http://203.188.54.9/~u6411800010/view/List_of_requests/Detail_List.php">
                            <img src="https://cdn-icons-png.flaticon.com/128/709/709612.png" width="22" height="22">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <footer>
        <!-- Button Cansal & Aaccept -->
        <div class="container">
            <div class="button d-flex justify-content-center align-items-center mt-5">
                <a href="http://203.188.54.9/~u6411800010/view/Schedule_an_interview_date/scheddule_boss.php"><button type="button" class="btn  btn btn-success ms-4" style="width:150px;height:50px;">นัดวันสัมภาษณ์</button></a>
            </div>
        </div>
    </footer>

</body>
</html>