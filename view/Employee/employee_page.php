<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="styles_emp.css">
    <!--link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"-->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>-->

</head>

<body>
    <?php require_once('../../layout/_layout.php')?>
    <!-- ตำแหน่ง และ serth -->
    <div class="container ">
        <div class="row">
            <div class="col col-7 ">
                <h2 class=" mt-2 mb-2">พนักงานบริษัท</h2>
            </div>
            <div class="col ps-0 pe-0"></div>
            <div class="col ps-0 " >
                <a class="btn btn-warning mt-2" href="#" role="button">+ เพิ่มพนักงาน</a>
            </div>
        </div>
        <div class="container  ">
            <div class="row">
                <div class="col ps-0 pe-5 col-7">
                    <label></label>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="col ps-0">
                    <label class="fw-bold">แผนก</label>
                    <div class="dropdown ">
                        <button class="btn btn-secondary dropdown-toggle bg-primary" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown button
                        </button>
                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col ps-0 ">
                    <label class="fw-bold">ตำแหน่ง</label>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle bg-primary" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown button
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
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
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">อีเมล-แอดเดรส</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">ตำแหน่ง</th>
                    <th scope="col">ID</th>
                    <th scope="col">action</th>
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
                    <td>Otto</td>
                    <td>
                        <a href="#">
                            <img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22">
                        </a>
                        <a href="#">
                            <img src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22" height="22">
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
                    <td>Thornton</td>
                    <td>
                        <a href="#">
                            <img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22">
                        </a>
                        <a href="#">
                            <img src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22" height="22">
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
                    <td>Jin</td>
                    <td>
                        <a href="#">
                            <img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>