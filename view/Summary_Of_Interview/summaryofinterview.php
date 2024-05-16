<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Summary Of Interview</title>
    <link rel="stylesheet" href="./summaryofinterview.css" />

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body onload="Check_Acc_Work()">
    <?php
    require_once('../../layout/_layout.php');
    require_once('../../controler/summaryController.php');
    ?>
    <section class="feature">
        <div class="feature-con">
            <label class="feature-text">สรุปคะแนนให้สัมภาษณ์</label>
            <div>
                <label class="feature-label" for="">จำนวนที่ต้องการรับ :
                    <?= $Data_REQ[0]['NUM_REQ'] ?>
                </label>
                <label class="feature-label" for="" style="/*visibility: hidden;*/">จำนวนคนที่รับแล้ว :
                    <?= $Data_REQ[0]['GET_REQ'] ?>
                </label>
                <button class="add-feature" type="submit">คัดผู้สมัคร</button>
            </div>
        </div>
    </section>

    <section class="filter">
        <!--nav class="filter-bar">
            <div class="filter-con">
                <div>
                    <input class="search-bar" type="text" id="search" placeholder="ค้นหาคุณสมบัติ..." size="60" />
                    <button class="search-bth" type="submit">SEARCH</button>
                </div>

                <div class="sort-con">
                    <div class="combo-sort">
                        <select name="sort" id="sort">
                            <option value="highTolow">คะแนนเฉลี่ย มาก - น้อย</option>
                            <option value="lowTohigh">คะแนนเฉลี่ย น้อย - มาก</option>
                        </select>
                    </div>
                </div>
            </div>
        </nav-->
    </section>
    <?php //echo json_encode($Data[0]) ?>
    <div class="container-xxl">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">ด้านเทคนิค</th>
                    <th scope="col">ความคิดสร้างสรรค์</th>
                    <th scope="col">มนุษย์สัมพันธ์</th>
                    <th scope="col">การเรียนรู้สิ่งใหม่ๆ</th>
                    <th scope="col">ผลสรุป</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($Data); $i++) { ?>
                <tr>
                    <td>
                        <?= $i + 1 ?>
                    </td>
                    <td>
                        <?= $Data[$i]['NAME_NEMP'] . ' ' . $Data[$i]['LNAME_NEMP'] ?>
                    </td>
                    <td>
                        <?= round((float)$Data[$i]['TECHINCAL'],2) ?>
                    </td>
                    <td>
                        <?= round((float)$Data[$i]['LEANING'],2) ?>
                    </td>
                    <td>
                        <?= round((float)$Data[$i]['CREATER'],2) ?>
                    </td>
                    <td>
                        <?= round((float)$Data[$i]['HUM_RELA'],2) ?>
                    </td>
                    <td scope="summary-pass">
                        <?= ($Data[$i]['Y_N'] == '1') ? 'ผ่าน' : 'ไม่ผ่าน' ?>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <a data-bs-toggle="modal" data-bs-target=<?php echo "#score_".$i; ?>>
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id=<?php echo "score_".$i; ?> data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">รายละเอียดคะแนน</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="summary-con">
                                            <div class="card"
                                                style="width:350px;border:none;background-color:#eaeaea;margin-right:10px">
                                                <div class="card-body">
                                                    <div class="card-h-text">ผู้สัมภาษณ์</div>
                                                    <div class="card-info-text">คะแนนสําหรับด้านเทคนิค :</div>
                                                    <div class="card-info-text">คะแนนสําหรับด้านการเรียนรู้ :</div>
                                                    <div class="card-info-text">คะแนนสําหรับความสร้างสรรค์ :</div>
                                                    <div class="card-info-text">คะแนนสําหรับมนุษย์สัมพันธ์ :</div>
                                                    <div class="card-status-text">สถานะ</div>
                                                </div>
                                            </div>

                                            <div class="overflow-scroll"
                                                style="white-space:nowrap;overflow-y:hidden;width:540px;">
                                                <!-- วนรอบ card โชว์คะแนนที่กรรมการให้ -->
                                                <?php $data2 = getDetail($conn, $Data[$i]['NEMP_INTV']); ?>
                                                <?php for ($j = 0; $j < count($data2); $j++) { ?>
                                                <div class="card d-inline-block"
                                                    style="width:160px;border:none;background-color:#eaeaea">
                                                    <div class="card-body">
                                                        <div class="card-h-text">
                                                            <?= $data2[$j]['NAME'] ?>
                                                        </div>
                                                        <div class="card-con-bg">
                                                            <div class="card-score-text">
                                                                <?= $data2[$j]['TECHINCAL'] ?>
                                                            </div>
                                                            <div class="card-score-text mt-3">
                                                                <?= $data2[$j]['LEANING'] ?>
                                                            </div>
                                                            <div class="card-score-text mt-5">
                                                                <?= $data2[$j]['CREATER'] ?>
                                                            </div>
                                                            <div class="card-score-text mt-4">
                                                                <?= $data2[$j]['HUM_RELA'] ?>
                                                            </div>
                                                            <div class="card-status-text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>

                                                <!--  -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span>
                            <!-- Button trigger modal -->
                            <button type="button " id="<?= $Data[$i]['ID_NEMP']?>" class="border-0"
                                data-bs-toggle="modal" data-bs-target="#exampleModal<?= $i?>">
                                <img src="https://cdn-icons-png.flaticon.com/128/2822/2822676.png" width="22"
                                    height="22">
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $i?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                ตัดสินใจรับพนักงานใหม่หรือไหม?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label class="mb-4"
                                                style="color:red;">หากตัดเลือกไปแล้วจะไม่สามารถย้อนกลับมาแก้ไขได้อีก!!!</label>
                                            <form action="#" method="POST" class="mb-2">
                                                <input type="hidden" name="id" value="<?= $Data[$i]['ID_NEMP']?>">
                                                <button type="button" class="btn btn-danger me-3" name="_method"
                                                    value="REJECT" style="width: 100px">ไม่รับ</button>
                                                <button type="submit" class="btn btn-success" name="_method"
                                                    value="ACCEPT" style="width: 100px">รับ</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div id="overlay"></div>
</body>

</html>

<script>
function Check_Acc_Work() {
    var Data_All = <?= json_encode($Data);?>;
    var Data_REQ = <?= json_encode($Data_REQ);?>;
    var Count_NEMP = <?= count($Data) ?>;

    if (Data_REQ[0]['NUM_REQ'] == Data_REQ[0]['GET_REQ']) {
        for (i = 0; i < Count_NEMP; i++) {
            var Acc_Work = document.getElementById("" + Data_All[i]['ID_NEMP']);
            Acc_Work.style = "visibility: hidden;";
        }
    } else {
        for (i = 0; i < Count_NEMP; i++) {
            if (Data_All[i]['STATUS'] == 2 || Data_All[i]['STATUS'] == 3) {
                var nemp = document.getElementById("" + Data_All[i]['ID_NEMP']);
                nemp.style = "visibility: hidden;";
            }
        }
    }

}

let SummaryPopup = document.getElementById("summary-popup");

function openSummaryPopup() {
    SummaryPopup.classList.add("open-summary-popup");
    document.getElementById("overlay").style.display = "block";

}

function closeSummaryPopup() {
    SummaryPopup.classList.remove("open-summary-popup");
    document.getElementById("overlay").style.display = "none";
}
</script>