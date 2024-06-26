<?php

session_start();
if (!isset($_SESSION['id'])) {
    echo "<script>window.location = 'http://203.188.54.9/~u6411800010/index.php'</script>";
}
require_once('/home/u6411800010/public_html/controler/ConnectDB.php');
//require_once('../controler/ConnectDB.php');

$id = $_SESSION['ID_EMP'];
$dep = $_SESSION['DEP'];
$pst = $_SESSION['PST'];
$sql = "SELECT * FROM EMPLOYEE E
        LEFT JOIN DEPENTMENT D ON E.DEPNO = D.ID_DEP
        LEFT JOIN POSITION P ON P.ID_PST = E.PSTNO
        LEFT JOIN PERMISSION PER ON PER.ID_PERM = P.PERNO
        WHERE E.ID_EMP = :ID AND E.DEPNO = :DEPNO AND E.PSTNO = :PSTNO";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':ID', $id, PDO::PARAM_STR);
$stmt->bindParam(':DEPNO', $dep, PDO::PARAM_STR);
$stmt->bindParam(':PSTNO', $pst, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!empty($result) && isset($result[0])) {
    $perm = $result[0]["NUM_PERM"];
} else {
    // Handle the case where $result is empty or doesn't have an element at index 0
    $perm = null; // or assign a default value
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--<script src="bar.js"></script>-->
    <style>
    body {
        font-family: "Kanit", sans-serif;
    }
    </style>
</head>

<body style="height: 60px;">
    <style>
    #menu__toggle {
        opacity: 0;
    }

    #menu__toggle:checked+.menu__btn>span {
        transform: rotate(45deg);
    }

    #menu__toggle:checked+.menu__btn>span::before {
        top: 0;
        transform: rotate(0deg);
    }

    #menu__toggle:checked+.menu__btn>span::after {
        top: 0;
        transform: rotate(90deg);
    }

    #menu__toggle:checked~.menu__box {
        left: 0 !important;
    }

    .menu__btn {
        position: relative;
        top: 15px;
        left: 20px;
        width: 26px;
        height: 26px;
        cursor: pointer;
        z-index: 1;
    }

    .menu__btn>span,
    .menu__btn>span::before,
    .menu__btn>span::after {
        display: block;
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: #fff;
        transition-duration: .25s;
    }

    .menu__btn>span::before {
        content: '';
        top: -8px;
    }

    .menu__btn>span::after {
        content: '';
        top: 8px;
    }

    .menu__box {
        display: block;
        position: fixed;
        top: 0;
        left: -100%;
        width: 300px;
        height: 100%;
        margin: 0;
        padding: 80px 0;
        list-style: none;
        background-color: #3E91FF;
        /*box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);*/
        transition-duration: .25s;
    }

    .menu__item {
        display: block;
        padding: 12px 24px;
        color: #fff;
        font-family: 'Roboto', sans-serif;
        font-size: 20px;
        font-weight: 600;
        text-decoration: none;
        transition-duration: .25s;
    }

    .menu__item:hover {
        color: #fff;
        background-color: #043AA3;
    }

    .nav-item>div {
        margin-left: 10px;
        border-radius: 0.4rem;
    }

    .nav-item>a {
        margin-left: 10px;
    }
    </style>
    <nav class="navbar navbar-expand-sm bg-primary " style="z-index: 800;">
        <div class="container-fluid ">
            <!-- Hamburger Menu -->
            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox" />
                <label class="menu__btn" style="z-index: 10;" for="menu__toggle">
                    <span></span>
                </label>
                <ul class="menu__box">
                    <?php if (substr($perm, 0, 4) >= 1) { ?>
                    <hr>
                    <li>
                        <a href="#" class="nav-link text-light dropdown-toggle" data-bs-toggle="collapse"
                            data-bs-target="#collapse_EMP">
                            <i class="fa-solid fa-user me-2"></i>
                            <span class="d-inline fw-bold">ข้อมูลองค์กร</span>
                        </a>

                        <div id="collapse_EMP" class="collapse">
                            <ul class="nav d-block ms-3">
                                <?php if (substr($perm, 0, 1) == 1) { ?>
                                <li class="nav-item ms-3">
                                    <a href="http://203.188.54.9/~u6411800010/view/Employee/employee_page.php"
                                        class="nav-link text-light">
                                        <span>ข้อมูลพนักงาน</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (substr($perm, 1, 1) == 1) { ?>
                                <li class="nav-item ms-3">
                                    <a href="http://203.188.54.9/~u6411800010/view/Position/position.php"
                                        class="nav-link text-light">
                                        <span>ตำแหน่ง</span>
                                    </a>
                                </li>
                                <?php } else { ?>
                                <?php } ?>
                                <?php if (substr($perm, 2, 1) == 1) { ?>
                                <li class="nav-item ms-3">
                                    <a href="http://203.188.54.9/~u6411800010/view/Department/Department.php"
                                        class="nav-link text-light">
                                        <span>แผนก</span>
                                    </a>
                                </li>
                                <?php } else { ?>
                                <?php } ?>
                                <?php if (substr($perm, 3, 1) == 1) { ?>
                                <li class="nav-item ms-3"><a
                                        href="http://203.188.54.9/~u6411800010/view/permission/pu.php"
                                        class="nav-link text-light">
                                        <span>สิทธิ์การเข้าถึง</span>
                                    </a>
                                </li>
                                <?php } else { ?>
                                <?php } ?>
                                <?php if (substr($perm, 4, 1) == 1) { ?>
                                <li class="nav-item ms-3"><a
                                        href="http://203.188.54.9/~u6411800010/view/feature/feature.php"
                                        class="nav-link text-light">
                                        <span>จัดการคุณสมบัติแผนก</span>
                                    </a>
                                </li>
                                <?php } else { ?>
                                <?php } ?>
                                <?php if (substr($perm, 14, 1) == 1) { ?>
                                <li class="nav-item ms-3"><a href="http://203.188.54.9/~u6411800010/view/M_F/M_F.php"
                                        class="nav-link text-light">
                                        <span>จัดการคุณสมบัติทั้งหมด</span>
                                    </a>
                                </li>
                                <?php } else { ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if (substr($perm, 5, 1) == 1) { ?>
                    <hr>
                    <li>
                        <a href="http://203.188.54.9/~u6411800010/view/new_emp/pannic.php">
                            <i class="fa-solid fa-user-plus ms-3 text-light"></i>
                            <span class="fw-bold d-inline ms-1 text-light">ข้อมูลผู้สมัคร</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (substr($perm, 6, 1) == 1) { ?>
                    <hr>
                    <li class="mt-2">
                        <a href="http://203.188.54.9/~u6411800010/view/List_of_requests/List.php">
                            <i class="fa-solid fa-id-card-clip ms-3 me-2 text-light"></i>
                            <span class="fw-bold d-inline text-light">ยื่นขอพนักงาน</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (substr($perm, 7, 11) >= 1) { ?>
                    <hr>
                    <li>
                        <a href="#" class="nav-link text-light dropdown-toggle" data-bs-toggle="collapse"
                            data-bs-target="#collapse_INTV">
                            <i class="fa-regular fa-calendar-days me-2 text-light"></i>
                            <span class="d-inline fw-bold">สัมภาษณ์</span>
                        </a>
                        <div id="collapse_INTV" class="collapse">
                            <ul class="nav d-block ms-3">
                                <?php if (substr($perm, 7, 1) == 1) { ?>
                                <li class="nav-item ms-3"><a
                                        href="http://203.188.54.9/~u6411800010/view/Fillter_NEMP/Select_RECNEMP.php"
                                        class="nav-link text-light">คัดเลือกผู้เข้าสมัคร</a></li>
                                <?php } ?>
                                <?php if (substr($perm, 8, 1) == 1) { ?>
                                <li class="nav-item ms-3"><a
                                        href="http://203.188.54.9/~u6411800010/view/Schedule_an_interview_date/Select_InterDate.php"
                                        class="nav-link text-light">บุ๊คกิ้งวันสัมภาษณ์</a>
                                </li>
                                <?php } ?>
                                <?php if (substr($perm, 9, 1) == 1) { ?>
                                <li class="nav-item ms-3"><a
                                        href="http://203.188.54.9/~u6411800010/view/select_DayINTV/Select_recDayINTV.php"
                                        class="nav-link text-light">เลือกวันสัมภาษณ์</a></li>
                                <?php } ?>
                                <?php if (substr($perm, 10, 1) == 1) { ?>
                                <li class="nav-item ms-3"><a
                                        href="http://203.188.54.9/~u6411800010/view/score/Select_Dep.php"
                                        class="nav-link text-light">ให้คะแนนสัมภาษณ์</a></li>
                                <?php } ?>
                                <?php if (substr($perm, 11, 1) == 1) { ?>
                                <li class="nav-item ms-3 "><a href="http://203.188.54.9/~u6411800010/view/Summary_Of_Interview/Select_DepGivescore.php
                " class="nav-link text-light">สรุปรายงานผลทดสอบ</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if (substr($perm, 12, 13) >= 1) { ?>
                    <hr>
                    <li>
                        <a href="#" class="nav-link text-light dropdown-toggle" data-bs-toggle="collapse"
                            data-bs-target="#collapse_REC">
                            <i class="fa-solid fa-address-card me-2"></i>
                            <span class="d-inline fw-bold">ประกาศ</span>
                        </a>
                        <div id="collapse_REC" class="collapse">
                            <ul class="nav d-block ms-3">
                                <?php if (substr($perm, 12, 1) == 1) { ?>
                                <li class="nav-item ms-3"><a
                                        href="http://203.188.54.9/~u6411800010/view/Approve-Doc/Approve-Doc.php"
                                        class="nav-link text-light">อนุมัติเอกสาร</a></li>
                                <?php } ?>
                                <?php if (substr($perm, 13, 1) == 1) { ?>
                                <li class="nav-item ms-3"><a href="http://203.188.54.9/~u6411800010/view/REC/REC.php"
                                        class="nav-link text-light">จัดการประกาศ</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <hr>

                    <li>
                        <a href="http://203.188.54.9/~u6411800010/view/DeepInfo/ShowGrap.php"
                            class="nav-link text-light">
                            <i class="fa-solid fa-chart-line me-2"></i>
                            <span class="d-inline fw-bold">ข้อมูลเชิงลึก</span>
                        </a>
                    </li>
                    <?php } ?>
                    <hr>
            </div>
            </ul>
            <!-- Links -->
            <ul class="navbar-nav d-flex align-items-center ">
                <li><a class="nav-item btn btn-light" href="../blank.php">
                        <?php echo $_SESSION['id']; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://203.188.54.9/~u6411800010/controler/logout.php"><img
                            class="icon-logout" src="https://cdn-icons-png.flaticon.com/128/11638/11638572.png"
                            width="27" height="32"></a>
                </li>
            </ul>
        </div>
    </nav>

</body>

</html>