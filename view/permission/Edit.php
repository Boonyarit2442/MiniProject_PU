<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="pu2.css">

</head>

<body style="height: 60px;">
    <?php
    require_once('../../layout/_layout.php');
    require_once('../../controler/Permission.php');

    $editPermissionId = $_GET['edit']; // Retrieve the ID_PERM from the URL parameter
    $editPermission = getPermissionById($conn, $editPermissionId);
    
    ?>


    <div class="container">
        <h1 style="font-size: 30px">
            <p style="color: blue">ตั้งชื่อสิทธิ์การใช้งาน</p>
        </h1>
        <form action="../../controler/Permission.php" method="POST" id="permissionForm">
            <div class="container w-50" style="margin-left: 310px;">
                <div>
                    <label for="NAME_PERM">ชื่อสิทธิ</label><br>
                    <input type="text" name="NAME_PERM" id="NAME_PERM"
                        value="<?= isset($editPermission) ? $editPermission['NAME_PERM'] : '' ?>"><br>
                </div>
            </div>
            <!-- Rest of the form -->
    </div>

    <div class="container  d-flex justify-content-center">
        <table class="table w-50">
            <thead>
                <tr>
                    <td></td>
                    <th scope="col">หน้า features</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][0] === '1') ? 'checked' : ''; ?>></td>
                    <td>ข้อมูลพนักงาน</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][1] === '1') ? 'checked' : ''; ?>></td>
                    <td>ตำแหน่ง</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][2] === '1') ? 'checked' : ''; ?>></td>
                    <td>แผนก</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][3] === '1') ? 'checked' : ''; ?>></td>
                    <td>สิทธิ์การเข้าถึง</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][4] === '1') ? 'checked' : ''; ?>></td>
                    <td>จัดการคุณสมบัติแผนก</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][5] === '1') ? 'checked' : ''; ?>></td>
                    <td>ข้อมูลผู้สมัคร</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][6] === '1') ? 'checked' : ''; ?>></td>
                    <td>ยื่นขอพนักงาน</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][7] === '1') ? 'checked' : ''; ?>></td>
                    <td>คัดเลือกผู้เข้าสมัคร</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][8] === '1') ? 'checked' : ''; ?>></td>
                    <td>บุ๊คกิ้งวันสัมภาษณ์</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][9] === '1') ? 'checked' : ''; ?>></td>
                    <td>เลือกวันสัมภาษณ์</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][10] === '1') ? 'checked' : ''; ?>></td>
                    <td>ให้คะแนนสัมภาษณ์</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][11] === '1') ? 'checked' : ''; ?>></td>
                    <td>สรุปรายงานผลสอบ</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][12] === '1') ? 'checked' : ''; ?>></td>
                    <td>อนุมัติเอกสาร</td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1" <?php echo ($editPermission && $editPermission['NUM_PERM'][13] === '1') ? 'checked' : ''; ?>></td>
                    <td>จัดการเอกสาร</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container d-flex justify-content-end w-50 " style="margin-right: 425px;">
        <input type="hidden" name="NUM_PERM" id="NUM_PERM" value="">
        <input type="hidden" name="ID_PERM" id="ID_PERM" value="<?=$editPermissionId?>">
        <input type="submit" value="EDIT" name="_method" style="margin-top:5px" class="mb-5" onclick="getValue()">
        </form>
    </div>

    <script>
        function getValue() {
            var tmp = "";
            const num = ['0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'];
            var e = document.getElementsByClassName('checkbox');
            for (var i = 0; e[i]; ++i) {
                if (e[i].checked) {
                    num[i] = e[i].value;
                } else {
                    num[i] = "0";
                }
            }
            for (var a = 0; num[a]; a++) {
                tmp += num[a];
            }

            // Set the value of NUM_PERM input field
            document.getElementById('NUM_PERM').value = tmp;
        }
    </script>

</body>

</html>