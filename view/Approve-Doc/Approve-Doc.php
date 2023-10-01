<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Approve-Doc</title>
  <link rel="stylesheet" href="./Approve-Doc.css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr@4/dist/flatpickr.min.js"></script>
</head>

<body>
  <?php
  require_once('../../layout/_layout.php');
  ?>

  <div class="feature-con">
    <div class="feature-text">เอกสารในแผนก : <label for="" style="color:#000">IT</label></div>
  </div>
  <div class="filter-con">
    <div class="status">
      <label for="">สถานะ</label><br>
      <div class="combo-status">
        <select name="position" id="position">
          <option value="It">ผ่าน</option>
          <option value="Programmer">ไม่ผ่าน</option>
          <option value="Hr">รออนุมัติ</option>
        </select>
      </div>
    </div>
    <div class="date">
      <label for="">วันที่</label><br>
      <input class="date-box" type="date">
    </div>
    <label class="count" for="">รวม X คน</label>
  </div>

  <div class="container-xxl">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col"><input type="checkbox" /></th>
          <th scope="col">ชื่อผู้ขออนุมัติ</th>
          <th scope="col">วันที่ร้องขอเอกสาร</th>
          <th scope="col">ลักษณะการว่าจ้างงาน</th>
          <th scope="col">ตำแหน่งที่ร้องขอ</th>
          <th scope="col">จำนวนที่ร้องขอ</th>
          <th scope="col">สถานะ</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox" /></td>
          <td>ปวีร์ มูฮำหมัด</td>
          <td>01/02/2045</td>
          <td>ชั่วคราว</td>
          <td>การตลาด</td>
          <td>2</td>
          <td>รออนุมัติ</td>
          <td>
            <button onclick="openDocPopup()" style="border : 0; padding: 0;">
              <img src="https://cdn-icons-png.flaticon.com/128/901/901533.png" width="22" height="22"></button>
            <!-- Popup Doc -->
            <div class="Doc-popup" id="Doc-popup">
              <h2>รายละเอียดข้อมูลอนุมัติพนักงาน</h2>
              <div class="container">
                <div class="row">
                  <div class="col d-flex align-items-start">
                    <label for="">เลขที่เอกสาร : <label for="">CAWD-383</label></label>
                  </div>
                  <div class="col d-flex align-items-start">
                    <label for="">วันที่เอกสาร : <label for="">19/09/2027</label></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col d-flex align-items-start">
                    <label for="">รหัสผู้บันทึก : <label for="">EMP001</label></label>
                  </div>
                  <div class="col d-flex align-items-start">
                    <label for="">ชื่อผู้บันทึก : <label for="">ปวีร์ มูฮำหมัด</label></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col d-flex align-items-start">
                    <label for="">ตำแหน่งที่ร้องขอ : <label for="">CPE199</label></label>
                  </div>
                  <div class="col d-flex align-items-start">
                    <label for="">ชื่อตำแหน่ง : <label for="">ฝ่ายบุคคล</label></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col d-flex align-items-start">
                    <label for="">ลักษณะการว่าจ้าง : <label for="">พนักงาน</label></label>
                  </div>
                  <div class="col d-flex align-items-start">
                    <label for="">จำนวนที่ร้องขอ : <label for="">100 <label for="">คน</label></label></label>
                  </div>
                </div>
                <div class="row">
                  <label for="">ความสามารถที่ต้องการ : <label for="">เขียนภาษา
                      JS,Html,CSS,C/C++/C#,Nodejs,PM,Phython,Ruby,Carbon</label></label>
                </div>
              </div>
              <button class="deny-btn" onclick="closeDocPopup()" type="button">ยกเลิก</button>
            </div>
            <!--  -->
            <button onclick="openRejPopup()" style="border : 0; padding: 0;">
              <img src="https://cdn-icons-png.flaticon.com/128/1828/1828665.png" width="22" height="22"></button>
            <!-- Popup Reject -->
            <div class="Rej-popup" id="Rej-popup">
              <h2>กรุณาใส่เหตุผลที่ยกเลิก</h2>
              <textarea class="textarea" name="textarea" id="myTextarea" cols="60" rows="8"></textarea><br>
              <button class="deny-btn" onclick="closeRejPopup()" type="button">ยกเลิก</button>
              <button class="confirm-btn" onclick="showRejSwal()()" type="button">ยืนยัน</button>
            </div>
            <!--  -->
            <button onclick="openConPopup()" style="border : 0; padding: 0;">
              <img src="https://cdn-icons-png.flaticon.com/128/190/190411.png" width="22" height="22"></button>
            <!-- Popup อนุมัติใส่ข้อมูลประกาศ -->
            <div class="Con-popup" id="Con-popup">
              <h2>กรุณาใส่ข้อมูลที่จะประกาศ</h2>
              <label for="" style="margin-top:20px;margin-right:5px;font-weight:bold">วันที่ประกาศหมดอายุ</label>
              <input type="date">
              <label for="" style="margin-top:20px;margin-right:5px;font-weight:bold">เงินเริ่มต้น</label>
              <input type="text">
              <label for="" style="margin-top:20px;margin-right:5px;font-weight:bold">เงินมากสุด</label>
              <input type="text"><br>
              <label for="" style="margin-top:20px;font-weight:bold">รายละเอียดที่ประกาศ</label>
              <textarea class="textarea" name="textarea" id="myTextarea" cols="90" rows="8"></textarea><br>
              <button class="deny-btn" onclick="closeConPopup()" type="button">ยกเลิก</button>
              <button class="confirm-btn" onclick="showConfirmSwal()" type="button">ยืนยัน</button>
            </div>
            <!--  -->
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

=======
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Approve-Doc</title>
    <link rel="stylesheet" href="./Approve-Doc.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4/dist/flatpickr.min.js"></script>
  </head>
  <body>
    <?php 
    require_once('../../layout/_layout.php');
    ?>

    <div class="feature-con">
        <div class="feature-text">เอกสารในแผนก : <label for="" style="color:#000">IT</label></div>
    </div>
    <div class="filter-con">
        <div class="status">
            <label for="">สถานะ</label><br>
            <div class="combo-status">
            <select name="position" id="position">
              <option value="It">ผ่าน</option>
              <option value="Programmer">ไม่ผ่าน</option>
              <option value="Hr">รออนุมัติ</option>
            </select>
          </div>
        </div>
        <div class="date">
            <label for="">วันที่</label><br>
            <input class="date-box" type="date">
        </div>
        <label class="count" for="">รวม  X  คน</label>
    </div>

    <div class="container-xxl">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col"><input type="checkbox" /></th>
            <th scope="col">ชื่อผู้ขออนุมัติ</th>
            <th scope="col">วันที่ร้องขอเอกสาร</th>
            <th scope="col">ลักษณะการว่าจ้างงาน</th>
            <th scope="col">ตำแหน่งที่ร้องขอ</th>
            <th scope="col">จำนวนที่ร้องขอ</th>
            <th scope="col">สถานะ</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody> 
            <tr>
                <td><input type="checkbox" /></td>
                <td>ปวีร์ มูฮำหมัด</td>
                <td>01/02/2045</td>
                <td>ชั่วคราว</td>
                <td>การตลาด</td>
                <td>2</td>
                <td>รออนุมัติ</td>
                <td>
                  <button onclick="openDocPopup()" type="submit" class="doc-btn" style="border : 0; padding: 0;">
                  <img src="https://cdn-icons-png.flaticon.com/128/901/901533.png" width="22" height="22"></button>
                    <!-- Popup Doc -->
                    <div class="Doc-popup" id="Doc-popup">
                      <h2>รายละเอียดข้อมูลอนุมัติพนักงาน</h2>
                      <div class="container">
                        <div class="row">
                          <div class="col d-flex align-items-start">
                            <label for="">เลขที่เอกสาร : <label for="">CAWD-383</label></label>
                          </div>
                          <div class="col d-flex align-items-start">
                            <label for="">วันที่เอกสาร : <label for="">19/09/2027</label></label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col d-flex align-items-start">
                            <label for="">รหัสผู้บันทึก : <label for="">EMP001</label></label>
                          </div>
                          <div class="col d-flex align-items-start">
                            <label for="">ชื่อผู้บันทึก : <label for="">ปวีร์ มูฮำหมัด</label></label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col d-flex align-items-start">
                            <label for="">ตำแหน่งที่ร้องขอ : <label for="">CPE199</label></label>
                          </div>
                          <div class="col d-flex align-items-start">
                            <label for="">ชื่อตำแหน่ง : <label for="">ฝ่ายบุคคล</label></label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col d-flex align-items-start">
                            <label for="">ลักษณะการว่าจ้าง : <label for="">พนักงาน</label></label>
                          </div>
                          <div class="col d-flex align-items-start">
                            <label for="">จำนวนที่ร้องขอ : <label for="">100 <label for="">คน</label></label></label>
                          </div>
                        </div>
                        <div class="row">
                          <label for="">ความสามารถที่ต้องการ : <label for="">เขียนภาษา JS,Html,CSS,C/C++/C#,Nodejs,PM,Phython,Ruby,Carbon</label></label>
                        </div>
                      </div>
                      <button class="deny-btn" onclick="closeDocPopup()" type="button">ยกเลิก</button>
                    </div>
                    <!--  -->
                  <button onclick="openRejPopup()" id="reject-btn" id="rej-btn" style="border : 0; padding: 0;">
                  <img src="https://cdn-icons-png.flaticon.com/128/1828/1828665.png" width="22" height="22"></button>
                    <!-- Popup Reject -->
                    <div class="Rej-popup" id="Rej-popup">
                      <h2>กรุณาใส่เหตุผลที่ยกเลิก</h2>
                      <textarea class="textarea" name="textarea" id="myTextarea" cols="60" rows="8"></textarea><br>
                      <button class="deny-btn" onclick="closeRejPopup()" type="button">ยกเลิก</button>
                      <button class="confirm-btn" onclick="showRejSwal()()" type="button">ยืนยัน</button>
                    </div>
                    <!--  -->
                  <button onclick="openConPopup()" id="approve-btn" id="con-btn" style="border : 0; padding: 0;">
                  <img src="https://cdn-icons-png.flaticon.com/128/190/190411.png" width="22" height="22"></button>
                    <!-- Popup อนุมัติใส่ข้อมูลประกาศ -->
                    <div class="Con-popup" id="Con-popup">
                      <h2>กรุณาใส่ข้อมูลที่จะประกาศ</h2>
                      <label for="" style="margin-top:20px;margin-right:5px;font-weight:bold">วันที่ประกาศหมดอายุ</label>
                      <input type="date">
                      <label for="" style="margin-top:20px;margin-right:5px;font-weight:bold">เงินเริ่มต้น</label>
                      <input type="text">
                      <label for="" style="margin-top:20px;margin-right:5px;font-weight:bold">เงินมากสุด</label>
                      <input type="text"><br>
                      <label for="" style="margin-top:20px;font-weight:bold">รายละเอียดที่ประกาศ</label>
                      <textarea class="textarea" name="textarea" id="myTextarea" cols="90" rows="8"></textarea><br>
                      <button class="deny-btn" onclick="closeConPopup()" type="button">ยกเลิก</button>
                      <button class="confirm-btn" onclick="showConfirmSwal()" type="button">ยืนยัน</button>
                    </div>
                    <!--  -->
                </td>
            </tr>
        </tbody>
    </table>
    </div>
  </body>
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
</html>

<script>

  let DocPopup = document.getElementById("Doc-popup");
  function openDocPopup() {
    DocPopup.classList.add("open-Doc-popup");
  }
  function closeDocPopup() {
    DocPopup.classList.remove("open-Doc-popup");
  }

  let RejPopup = document.getElementById("Rej-popup");
  function openRejPopup() {
    RejPopup.classList.add("open-Rej-popup");
  }
  function closeRejPopup() {
    RejPopup.classList.remove("open-Rej-popup");
  }

  let ConPopup = document.getElementById("Con-popup");
  function openConPopup() {
    ConPopup.classList.add("open-Con-popup");
  }
  function closeConPopup() {
    ConPopup.classList.remove("open-Con-popup");
  }

  function showConfirmSwal() {
    Swal.fire({
      title: 'คุณต้องการยืนยันใช่หรือไม่?',
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'ยกเลิก',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ยืนยัน'
    }).then((result) => {
<<<<<<< HEAD
      if (result.isConfirmed) {
        Swal.fire(
          'อนุมัติสำเร็จ',
          '',
          'success'
        )
      }
    })
  }
=======
    if (result.isConfirmed) {
      Swal.fire(
        'อนุมัติสำเร็จ',
        '',
        'success'
      )
    }
  })
}
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91

  function showRejSwal() {
    Swal.fire({
      title: 'เอกสารไม่ถูกอนุมัติ',
      icon: 'error',
    })
<<<<<<< HEAD
  }
=======
}
>>>>>>> 68cf1bd199690421e439c3c3a0b2b30bc9753e91
</script>