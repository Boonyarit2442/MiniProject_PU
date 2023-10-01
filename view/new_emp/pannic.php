<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .form-select {
      background-color: #007bff;
      color: #fff;
    }
  </style>
</head>

<body onload="loadDoc()" onload="search()" class="">
  <?php require_once("../../layout/_layout.php"); ?>
  <div class="container mt-5">
    <h1 style="font-size:30px">
      <p style="color:blue">ข้อมูลผู้สมัคร</p>
    </h1>
    <div class="d-flex justify-content-end">

      <div class="d-flex align-items-center">
        <div class="me-3">
          <select class="form-select" id="sel_search">
            <option value="" selected disabled> แผนกที่สมัคร </option>
            <option value="name">ชื่อ</option>
            <option value="student_surname">นามสกุล</option>
            <option value="student_branch">สาขา</option>
          </select>
        </div>
        <div class="me-3">
          <select class="form-select" name="select">
            <option value="" selected disabled> แผนกที่สมัคร </option>
            <option value="name">ผ่าน</option>
            <option value="student_surname">ไม่ผ่าน</option>
            <option value="student_branch">รอ</option>
          </select>
        </div>
        <div class="me-3">
          <select class="form-select" name="select">
            <option value="name">ผ่าน</option>
            <option value="student_surname">ไม่ผ่าน</option>
            <option value="student_branch">รอ</option>
          </select>
        </div>
        <div class="d-flex">
          <form class="w-500 me-3" role="search">
            <div class="d-flex">
              <input style="margin-bottom:10px" type="text" id="txt_search" class="form-control"
                placeholder="ค้นหาผู้สมัคร...">
            </div>
          </form>
          <button onload="search()" type="submit" name="submit" class="btn btn-success">search</button>
        </div>
      </div>

    </div>
    <script>
      function search() {
        $.ajax({
          type: "post",
          dataType: "json",
          url: "http://203.188.54.9/~u6411800010/controler/DATA_NEW_EMP.php",
          data: {
            keyword: $('#txt_search').val(),
            type: $("#sel_search").val()
          }, success: function (response) {
            console.log("good", response)
          }, error: function (err) {
            console.log("bad", err)
          }
        })
      }
      function loadDoc() {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            for (i = 0; i < data.length; i++) {
              document.getElementById('info').innerHTML += `
                  <tr>
                    <th>${i + 1}</th>
                    <td>${data[i].NAME_NEMP} ${data[i].LNAME_NEMP}</td>
                    <td>${data[i].EMAIL}</td>
                    <td>${data[i].ID_POS}</td>
                    <td>
                    <a href="#">
                        <img
                        src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                        width="22"
                        height="22"
                      />
                        </a></td>
                  </tr>`;
            }
          }
        }
        xhttp.open("GET", 'http://203.188.54.9/~u6411800010/controler/DATA_NEW_EMP.php', true);
        xhttp.send();
      }
    </script>
    <main>




  </div>

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ลำดับที่</th>
          <th scope="col">ชื่อ-นามสกุล</th>
          <th scope="col">อีเมล-แอดเดรส</th>
          <th scope="col">แผนกที่สมัคร</th>
          <th scope="col">ตำแหน่งที่สมัคร</th>
          <th scope="col">สถานะ</th>
          <th scope="col">บุ๊คกิ้ง</th>
        </tr>
      </thead>
      <tbody id="info">
        <!-- ข้อมูลผู้สมัครจะถูกแสดงที่นี่ -->
      </tbody>
    </table>
  </div>
  </main>

</body>

</html>