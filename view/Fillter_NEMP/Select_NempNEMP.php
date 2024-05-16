<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>interview</title>
</head>

<body>

    <?php require_once('../../layout/_layout.php'); ?>
    <?php require_once('../../controler/Select_NempNEMPController.php'); ?>
    <div class="container-fluid d-flex justify-content-between mt-5 ms-2">
        <h3 class="text-primary">รายชื่อผู้เข้าสัมภาษณ์</h3>
    </div>
    <div class="container" id="Table_ShowList">
        <div class="container w-75">
            <div class="d-flex justify-content-end mb-3">
                <form action="#" method="POST" class="mt-2">
                    <label for="search">ค้นหา</label>
                    <input type="search" id="search" name="search" />
                    <input type="submit" value="search" namel="_method" />
                </form>
            </div>
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ชื่่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">เพศ</th>
                        <th scope="col">ศาสนา</th>
                        <th scope="col">สเตดัส</th>
                        <th scope="col">Info</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($Data); $i++) { ?>
                        <tr>
                            <th scope="row">
                                <?php echo $Data[$i]['ID_NEMP'] ?>
                            </th>
                            <td>
                                <?php echo $Data[$i]['NAME_NEMP'] ?>
                            </td>
                            <td>
                                <?php echo $Data[$i]['LNAME_NEMP'] ?>
                            </td>
                            <td>
                                <?php echo $Data[$i]['SEX_NEMP'] ?>
                            </td>
                            <td>
                                <?php echo $Data[$i]['NOTIONALITY_NEMP'] ?>
                            </td>
                            <td>
                                <?php
                                if ($Data[$i]['STATUS'] == '1') {
                                    echo "ผ่านการคัดเลือก";
                                } else if ($Data[$i]['STATUS'] == '0') {
                                    echo "ไม่ผ่านการคัดเลือก";
                                } else if ($Data[$i]['STATUS'] == '2') {
                                    echo "ผ่านการสัมภาษณ์";
                                } else if ($Data[$i]['STATUS'] == '3') {
                                    echo "ไม่ผ่านการสัมภาษณ์";
                                } else {
                                    echo "รอคัดเลือก";
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Button trigger modal -->

                                <form action="detail_new_emp.php" method="POST" id="detel_1" class="d-inline-block">
                                    <input type="hidden" name="id" value=<?php echo $Data[$i]['ID_NEMP'] ?>>
                                    <button type="submit" style="border:none; background-color: transparent;" id="BF_1"> <i
                                            class="fa-solid fa-file-invoice fs-4"></i> </button>
                                </form>

                                <!-- Button trigger modal NO -->
                                <?php if (!($Data[$i]['STATUS'] == '-1')) {
                                    continue;
                                } ?>
                                <form action="" method="POST" id=<?php echo "F_" . $Data[$i]['ID_NEMP'] ?>
                                    class="d-inline-block">
                                    <input type="hidden" name="ID_NUM" value=<?php echo $Data[$i]['ID_NEMP'] ?>>
                                    <input type="hidden" name="_method" value="NOPASS">
                                </form>
                            </td>
                            <td>
                                <button type="button" class="text-danger"
                                    style="border:none; background-color: transparent;" onclick="submit_<?php echo $i ?>()">
                                    <i class="fa-solid fa-circle-xmark fs-4"></i> </button>
                                <script>
                                    function submit_<?php echo $i ?>() {
                                        swal({
                                            title: "ผ่าน",
                                            text: "ผ่านสำเร็จ",
                                            icon: "success",
                                        }).then(() => {
                                            $('<?php echo "#F_" . $Data[$i]['ID_NEMP'] ?>').submit();
                                        });
                                    }
                                </script>
                                <form action="" method="POST" id=<?php echo "T_" . $Data[$i]['ID_NEMP'] ?>
                                    class="d-inline-block">
                                    <input type="hidden" name="ID_NUM" value=<?php echo $Data[$i]['ID_NEMP'] ?>>
                                    <input type="hidden" name="_method" value="PASS">
                                </form>
                                <!-- Button trigger modal YES-->
                                <button type="button" class="text-success" data-bs-toggle="modal"
                                    style="border:none; background-color: transparent;"
                                    onclick="Tsubmit_<?php echo $i ?>()">
                                    <i class="fa-solid fa-circle-check fs-4"></i>
                                </button>
                                <script>
                                    function Tsubmit_<?php echo $i ?>() {
                                        swal({
                                            title: "ผ่าน",
                                            text: "ผ่านสำเร็จ",
                                            icon: "success",
                                        }).then(() => {
                                            $('<?php echo "#T_" . $Data[$i]['ID_NEMP'] ?>').submit();
                                        });
                                    }
                                </script>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>