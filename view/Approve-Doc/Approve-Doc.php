<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Approve-Doc</title>
    <link rel="stylesheet" href="./Approve-Doc.css" />

</head>

<body>
    <?php require_once('../../layout/_layout.php'); ?>
    <?php require_once('../../controler/Approve-DocController.php'); ?>
    <div class="container d-flex justify-content-between mt-4">
        <div class="feature-text">เอกสารในแผนก : <label for="" style="color:#000">
                <?php echo $DEP[0]['NAME_DEP']; ?>
            </label>
        </div>
        <div class="d-flex flex-row justify-content-center align-items-center">

            <span class="me-2">status</span>
            <select name='YesNO' class="me-2" onchange="test(this)">
                <option value="2">ทั้งหมด</option>
                <option value="อนุมัติ">อนุญาติแล้ว</option>
                <option value="ไม่อนุมัติ">ไม่อนุญาติ</option>
                <option value="รออนุมัติ">รออนุญาติ</option>
            </select>
            <form action="" method="POST" id="formsearch">
                <input type="search" name="searchName" id="searchName">
                <input type="submit" name="_method" value="search">
            </form>

        </div>
    </div>
    <div class="container-xxl">

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ชื่อผู้ขออนุมัติ</th>
                    <th scope="col">วันที่ร้องขอเอกสาร</th>
                    <th scope="col">ลักษณะการว่าจ้างงาน</th>
                    <th scope="col">ตำแหน่งที่ร้องขอ</th>
                    <th scope="col">จำนวนที่ร้องขอ</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="ShowTbody">
                <?php for ($i = 0; $i < count($Data); $i++) { ?>
                <tr aria-readonly="11">
                    <td>
                        <?php echo $Data[$i]['NAME'] ?>
                    </td>
                    <td>
                        <?php echo $Data[$i]['DAYSAMVE_REQ'] ?>
                    </td>
                    <td>
                        <?php echo $Data[$i]['TYPE_REQ'] ?>
                    </td>
                    <td>
                        <?php echo $Data[$i]['NAME_PST'] ?>
                    </td>
                    <td>
                        <?php echo $Data[$i]['NUM_REQ'] ?>
                    </td>
                    <td>
                        <?php echo ($Data[$i]['STATUS']=='1')? "อนุมัติ":(($Data[$i]['STATUS']=='0')?"ไม่อนุมัติ":"รออนุมัติ"); ?>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <a type="button" class="text-dark" data-bs-toggle="modal" id=<?php echo "BINFO_".$i ?>
                            data-bs-target=<?php echo "#INFO_".$i ?>><i class="fa-solid fa-file-invoice fs-4"></i></a>

                        <!-- Modal -->
                        <div class="modal fade" id=<?php echo "INFO_".$i ?> data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">info REQ</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <span>เลขที่เอกสาร :
                                            <?php echo $Data[$i]['ID_REQ'] ?>
                                        </span>
                                        <br>
                                        <span>ชื่อผู้บันทึก :
                                            <?php echo $Data[$i]['NAME']. " " .$Data[0]['L_NAME'] ?>
                                        </span>
                                        <br>
                                        <span>ตำแหน่งที่ร้องขอ :
                                            <?php echo $Data[$i]['NAME_PST'] ?>
                                        </span>
                                        <br>
                                        <span>ลักษณะการว่าจ้างงาน :
                                            <?php echo $Data[$i]['TYPE_REQ'] ?>
                                        </span>
                                        <br>
                                        <?php  if(!($Data[$i]['STATUS']=='1' || $Data[$i]['STATUS']=='0') ){?>
                                        <div>
                                            <form action="" method="POST">
                                                <input type="hidden" name="Index_Doc" id="Index_Doc"
                                                    value=<?php echo $Data[$i]['ID_REQ'] ?>>
                                                <input type="text" name="Num" id="Num"
                                                    value=<?php echo $Data[$i]['NUM_REQ'] ?>>
                                                <input type="hidden" value="UPDATE_NUM" name="_method">
                                                <input type="submit" value="UPDATE">
                                            </form>
                                        </div><?php }else{?>
                                        <span>จำนวนที่ร้องขอ :
                                            <?php echo $Data[$i]['NUM_REQ'] ?>
                                        </span>
                                        <?php } ?>
                                        <br>
                                        <span>รายละเอียดที่ร้องขอ :
                                            <?php echo $Data[$i]['DETEL_REQ'] ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button trigger modal NO -->
                        <?php  if($Data[$i]['STATUS']=='1' || $Data[$i]['STATUS']=='0' ){continue;} ?>
                        <a type="button" class="text-danger fs-4" data-bs-toggle="modal" id=<?php echo "BNO_".$i ?>
                            data-bs-target=<?php echo "#NO_" . $i ?>>
                            <i class="fa-solid fa-circle-xmark"></i> </a>

                        <!-- Modal -->
                        <div class="modal fade" id=<?php echo "NO_" . $i ?> data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="staticBackdropLabel">กรุณากรอเหตุผล</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../../controler/Approve-DocController.php" method="POST">
                                            <input type="hidden" name="ID_DOC" value=<?php echo $Data[$i]['ID_REQ'] ?>>
                                            <textarea class="textarea" name="WAYNOT" id="myTextarea" cols="40"
                                                rows="8"></textarea><br>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="UPDATESTATUS" name="_method">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal YES-->
                        <a type="button" class="text-success fs-4" data-bs-toggle="modal" id=<?php echo "BYSS_".$i ?>
                            data-bs-target=<?php echo "#GO_" . $i ?>>
                            <i class="fa-solid fa-circle-check"></i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id=<?php echo "GO_" . $i ?> data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">กรอกประกาศรับสมัคร</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../../controler/Approve-DocController.php" method="POST">
                                            <div class="d-flex mt-3">
                                                <input type="hidden" name="ID_DOC"
                                                    value=<?php echo $Data[$i]['ID_REQ'] ?>>
                                                <label for="">วันสิ้นสุดการรับสมัคร</label>
                                                <input type="date" class="ms-3" name="DAYEND">
                                            </div>
                                            <div class="d-flex mt-3">
                                                <label for="">เงินเริ่มต้น</label>
                                                <input type="number" class="ms-3" name="SALstart">
                                            </div>
                                            <div class="d-flex mt-3 text-center">
                                                <label for="number">เงินมากสุด</label>
                                                <input type="number" class="ms-3" name="SALend"><br>
                                            </div>
                                            <div class="mt-3">
                                                <label for="">รายละเอียดที่ประกาศ</label>
                                                <textarea class="textarea" name="Detel" id="myTextarea" cols="40"
                                                    rows="8"></textarea><br>
                                            </div>
                                            <div>
                                                <input type="submit" class="btn btn-success" value="ADD" name="_method">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
    var BINFOICON = [];
    var BNOICON = [];
    var BYSSICON = [];
    var jsondata = <?php echo json_encode($Data); ?>;
    for (let k = 0; k < jsondata.length; k++) {
        jsondata[k]['STATUS'] = (jsondata[k]['STATUS'] == '1') ? "อนุมัติ" : (jsondata[k]['STATUS'] ==
            '0') ? "ไม่อนุมัติ" : "รออนุมัติ";
        BINFOICON.push($('#BINFO_' + k)[0]);
        BNOICON.push($('#BNO_' + k)[0])
        BYSSICON.push($('#BYSS_' + k)[0])
    }

    function test(e) {

        var ShowTbody = document.getElementById("ShowTbody");
        var variab = ['NAME', 'DAYSAMVE_REQ', 'TYPE_REQ', 'NAME_PST', 'NUM_REQ', 'STATUS'];
        ShowTbody.innerHTML = null;
        console.log(BINFOICON);
        console.log(BNOICON);
        console.log(BYSSICON);
        for (let i = 0; i < jsondata.length; i++) {
            if (e.value == 2) {
                var tr = document.createElement("tr");
                for (let j = 0; j < variab.length; j++) {
                    var td = document.createElement("td");
                    td.innerHTML = jsondata[i][variab[j]];
                    tr.appendChild(td);
                }
                var td = document.createElement("td");
                td.appendChild(BINFOICON[i]);
                if (jsondata[i]['STATUS'] == "รออนุมัติ") {
                    td.appendChild(BNOICON[i]);
                    td.appendChild(BYSSICON[i]);
                }
                tr.appendChild(td);
                ShowTbody.appendChild(tr);
            } else if (e.value == "รออนุมัติ") {
                var tr = document.createElement("tr");
                for (let j = 0; j < variab.length; j++) {
                    var td = document.createElement("td");
                    td.innerHTML = jsondata[i][variab[j]];
                    tr.appendChild(td);
                }
                var td = document.createElement("td");
                td.appendChild(BINFOICON[i]);
                td.appendChild(BNOICON[i]);
                td.appendChild(BYSSICON[i]);
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
                td.appendChild(BINFOICON[i]);
                tr.appendChild(td);
                ShowTbody.appendChild(tr);
            }
        }
    }
    </script>
</body>

</html>
