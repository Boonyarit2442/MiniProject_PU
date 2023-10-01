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

<body>
    <?php
    require_once('../../layout/_layout.php');
    ?>
    <section class="feature">
        <div class="feature-con">
            <label class="feature-text">สรุปคะแนนให้สัมภาษณ์</label>
            <div>
                <label class="feature-label" for="">จำนวนที่รับ X </label>
                <label class="feature-label" for="">จำนวนคนที่ผ่าน X </label>
                <button class="add-feature" type="submit">คัดผู้สมัคร</button>
            </div>
        </div>
    </section>

    <section class="filter">
        <nav class="filter-bar">


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
        </nav>
    </section>

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
                <tr>
                    <td>1</td>
                    <td>ปวีร์ มูฮำหมัด</td>
                    <td>8</td>
                    <td>6</td>
                    <td>9</td>
                    <td>7</td>
                    <td scope="summary-pass">ผ่าน</td>
                    <td><button onclick="openSummaryPopup()" style="border : 0; padding: 0;">
                            <img src="https://media.discordapp.net/attachments/1140271828389081238/1158034383941419088/view_1.png?ex=651ac710&is=65197590&hm=a1c02fb91fe3bd237f065dceebc7c5ee3a1539d8b2d13836380950b886a51ced&=&width=468&height=468"
                                width="22" height="22"></button>
                        <!-- Popup Summary -->
                        <div class="summary-popup" id="summary-popup">
                            <button onclick=closeSummaryPopup() style="border:none;margin-left:900px"><img
                                    src="https://cdn.discordapp.com/attachments/1140271828389081238/1158034383660404777/close.png?ex=651ac710&is=65197590&hm=22bad3f1603dbbd2f8a59d3daa72e7479e46a6a0dd484b464518c7bfe8586011&"
                                    width="30px" height="30px"></button>
                            <div class="h-con">
                                <label style="font-size:30px;font-weight:bold;padding-left: 20px">นาย ปวีร์
                                    มูฮำหมัด</label>
                                <label style="font-size:30px;font-weight:bold;padding-right: 20px">สรุปผล : <label
                                        style="color:#04c200">ผ่าน</label></label>
                            </div>
                            <div class="summary-con">
                                <div class="card"
                                    style="width:350px;border:none;background-color:#eaeaea;margin-right:10px">
                                    <div class="card-body">
                                        <div class="card-h-text">ผู้สัมภาษณ์</div>
                                        <div class="card-info-text">คะแนนสําหรับด้านเทคนิค :</div>
                                        <div class="card-info-text">คะแนนสําหรับด้านการเรียนรู้ :</div>
                                        <div class="card-info-text">คะแนนสําหรับความสร้างสรรค์ :</div>
                                        <div class="card-info-text">คะแนนสําหรับด้านเทคนิค :</div>
                                        <div class="card-status-text">สถานะ</div>
                                    </div>
                                </div>
                                <div class="overflow-scroll" style="white-space:nowrap;overflow-y:hidden;width:540px;">
                                    <!-- วนรอบ card โชว์คะแนนที่กรรมการให้ -->
                                    <div class="card d-inline-block"
                                        style="width:160px;border:none;background-color:#eaeaea">
                                        <div class="card-body">
                                            <div class="card-h-text">กรรมการ 1</div>
                                            <div class="card-con-bg">
                                                <div class="card-score-text">7</div>
                                                <div class="card-score-text">7</div>
                                                <div class="card-score-text">7</div>
                                                <div class="card-score-text">7</div>
                                                <div class="card-status-text">ผ่าน</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="card d-inline-block"
                                        style="width:160px;border:none;background-color:#eaeaea">
                                        <div class="card-body">
                                            <div class="card-h-text">กรรมการ 2</div>
                                            <div class="card-con-bg">
                                                <div class="card-score-text">9</div>
                                                <div class="card-score-text">5</div>
                                                <div class="card-score-text">3</div>
                                                <div class="card-score-text">4</div>
                                                <div class="card-status-text">ไม่ผ่าน</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card d-inline-block"
                                        style="width:160px;border:none;background-color:#eaeaea">
                                        <div class="card-body">
                                            <div class="card-h-text">กรรมการ 3</div>
                                            <div class="card-con-bg">
                                                <div class="card-score-text">7</div>
                                                <div class="card-score-text">5</div>
                                                <div class="card-score-text">6</div>
                                                <div class="card-score-text">5</div>
                                                <div class="card-status-text">ไม่ผ่าน</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card d-inline-block"
                                        style="width:160px;border:none;background-color:#eaeaea">
                                        <div class="card-body">
                                            <div class="card-h-text">กรรมการ 4</div>
                                            <div class="card-con-bg">
                                                <div class="card-score-text">9</div>
                                                <div class="card-score-text">8</div>
                                                <div class="card-score-text">9</div>
                                                <div class="card-score-text">7</div>
                                                <div class="card-status-text">ผ่าน</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card d-inline-block"
                                        style="width:160px;border:none;background-color:#eaeaea">
                                        <div class="card-body">
                                            <div class="card-h-text">กรรมการ 5</div>
                                            <div class="card-con-bg">
                                                <div class="card-score-text">9</div>
                                                <div class="card-score-text">9</div>
                                                <div class="card-score-text">9</div>
                                                <div class="card-score-text">9</div>
                                                <div class="card-status-text">ผ่าน</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card d-inline-block"
                                        style="width:160px;border:none;background-color:#eaeaea">
                                        <div class="card-body">
                                            <div class="card-h-text">กรรมการ 6</div>
                                            <div class="card-con-bg">
                                                <div class="card-score-text">6</div>
                                                <div class="card-score-text">8</div>
                                                <div class="card-score-text">9</div>
                                                <div class="card-score-text">10</div>
                                                <div class="card-status-text">ผ่าน</div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!------------------->
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>ปวีร์ มูฮำหมัด</td>
                    <td>2</td>
                    <td>4</td>
                    <td>3</td>
                    <td>1</td>
                    <td scope="summary-fail">ไม่ผ่าน</td>
                    <td><button onclick="" type="submit" class="view-btn" style="border : 0; padding: 0;">
                            <img src="https://images-ext-1.discordapp.net/external/cDIlEV7SDIY8xHgWMaEdfabCoV9J0tzrpw8dyrxf9Ig/https/cdn-icons-png.flaticon.com/128/709/709612.png"
                                width="22" height="22"></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>

<script>
    let SummaryPopup = document.getElementById("summary-popup");
    function openSummaryPopup() {
        SummaryPopup.classList.add("open-summary-popup");
    }
    function closeSummaryPopup() {
        SummaryPopup.classList.remove("open-summary-popup");
    }
</script>