<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link CSS -->
    <link rel="stylesheet" href="style_List.css">

    <title>Document</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php') ?>
    <?php require_once('../../controler/List_REQ.php'); ?>
    <div class="menu-bar container d-flex justify-content-between align-items-center " style="margin-top: 30px;">
        <h2 class="text-primary">ยื่นขอพนักงาน</h2>
        <div class="d-flex flex-row justify-content-center align-items-center">
            <span class="me-2">status</span>
            <select name='YesNO' class="me-2" onchange="test(this)">
                <option value="2">ทั้งหมด</option>
                <option value="อนุมัติ">อนุญาติแล้ว</option>
                <option value="ไม่อนุมัติ">ไม่อนุญาติ</option>
                <option value="รออนุมัติ">รออนุญาติ</option>
            </select>
            <form action="#" method="POST" id="formsearch">
                <input type="search" name="searchName" id="searchName">
                <input type="submit" name="_method" value="search">
            </form>
            <script>
            function test(e) {
                var jsondata = <?php echo json_encode($Data); ?>;
                for (let k = 0; k < jsondata.length; k++) {
                    jsondata[k]['STATUS'] = (jsondata[k]['STATUS'] == '1') ? "อนุมัติ" : (jsondata[k]['STATUS'] ==
                        '0') ? "ไม่อนุมัติ" : "รออนุมัติ";
                }
                var ShowTbody = document.getElementById("ShowTbody");
                var variab = ['ID_REQ', 'DAYS', 'NAME_DEP', 'NAME_PST', 'STATUS'];
                ShowTbody.innerHTML = null;
                for (let i = 0; i < jsondata.length; i++) {
                    if (e.value == '2') {
                        var tr = document.createElement("tr");
                        for (let j = 0; j < variab.length; j++) {
                            var td = document.createElement("td");
                            td.innerHTML = jsondata[i][variab[j]];
                            tr.appendChild(td);
                        }
                        var td = document.createElement("td");
                        var a = document.createElement("a");
                        a.innerHTML = `<i class="fa-solid fa-eye"></i>`;
                        a.href =
                            `http://203.188.54.9/~u6411800010/view/List_of_requests/Detail_List.php?KEY_INFO=${jsondata[i]['ID_REQ']}`
                        td.appendChild(a);
                        tr.appendChild(td);
                        ShowTbody.appendChild(tr);
                    } else if (jsondata[i]['STATUS'] == e.value) {
                        var tr = document.createElement("tr");
                        for (let j = 0; j < variab.length; j++) {
                            var td = document.createElement("td");
                            td.innerHTML = jsondata[i][variab[j]];
                            tr.appendChild(td);
                        }
                        var td = document.createElement("td");
                        var a = document.createElement("a");
                        a.innerHTML = `<i class="fa-solid fa-eye"></i>`;
                        a.href =
                            `http://203.188.54.9/~u6411800010/view/List_of_requests/Detail_List.php?KEY_INFO=${jsondata[i]['ID_REQ']}`
                        td.appendChild(a);
                        tr.appendChild(td);
                        ShowTbody.appendChild(tr);
                    }
                }
            }
            </script>
            <a class="btn btn-warning " href="ADD_REQ1.php" role="button" style="width: 150px; margin-left: 15px;">
                +เพิ่มคำร้องขอ</a>
        </div>
    </div>
    <!-- Table -->
    <div class="container">
        <table class="table table-striped mt-4 bg-light">
            <thead>
                <tr>
                    <th scope="col">รหัส</th>
                    <th scope="col">ว/ด/ป ที่บันทึก</th>
                    <th scope="col">ชื่อผู้ร้องขอ</th>
                    <th scope="col">ตำแหน่ง</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">ข้อมูลเพิ่มเติม</th>
                </tr>
            </thead>
            <tbody id="ShowTbody">
                <?php for ($i = 0; $i < count($Data); $i++) {  ?>
                <tr>
                    <td>
                        <?php echo $Data[$i]['ID_REQ']; ?>
                    </td>
                    <td>
                        <?php echo $Data[$i]['DAYS']; ?>
                    </td>
                    <td>
                        <?php echo $Data[$i]['NAME']; ?>
                    </td>
                    <td>
                        <?php echo $Data[$i]['NAME_PST']; ?>
                    </td>
                    <td>
                        <?php echo ($Data[$i]['STATUS']=='1')? "อนุมัติ":(($Data[$i]['STATUS']=='0')?"ไม่อนุมัติ":"รออนุมัติ"); ?>
                    </td>
                    <td>
                        <a
                            href=<?php echo "http://203.188.54.9/~u6411800010/view/List_of_requests/Detail_List.php?KEY_INFO=".$Data[$i]['ID_REQ'] ?>>
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>