<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="pu2.css">

</head>

<body style="height: 60px;">
  <?php require_once('../../layout/_layout.php') ?>
  <?php require_once('../../controler/Permission.php') ?>
  <nav class="navbar navbar-expand-sm  "></nav>

  <div class="container">

    <h1 style="font-size:30px">
      <p style="color:blue">ตั้งชื่อสิทธิ์การใช้งาน</p>
    </h1>
    <form action="#" method="POST" id="permissionForm">
      <div class="container w-50" style="margin-left: 310px;">

        <div class="">
          <div>
            <label for="ID_PST">ชื่อสิทธิ</label><br>
            <input type="text" name="NAME_PERM" id="NAME_PERM"><br>
          </div>
        </div>
      </div>

  </div>
  <!-- Alert Error -->
  <?php if(isset($_GET['error'])){ ?>
    <div class="alert alert-danger container mt-3" role="alert" style="width: 36%;">
        <?php echo $_GET['error']; ?>
    </div>
  <?php } ?>
  <!-- Table -->
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
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>ข้อมูลพนักงาน</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>ตำแหน่ง</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>แผนก</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>สิทธิ์การเข้าถึง</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>จัดการคุณสมบัติแผนก</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>ข้อมูลผู้สมัคร</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>ยื่นขอพนักงาน</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>คัดเลือกผู้เข้าสมัคร</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>บุ๊คกิ้งวันสัมภาษณ์</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>เลือกวันสัมภาษณ์</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>ให้คะแนนสัมภาษณ์</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>สรุปรายงานผลสอบ</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>อนุมัติเอกสาร</td>
        </tr>

        <tr>
          <td><input type="checkbox" name="Permiss[]" class="checkbox" value="1"></td>
          <td>จัดการเอกสาร</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="container d-flex justify-content-end w-50 " style="margin-right: 425px;">
    <input type="hidden" name="NUM_PERM" id="NUM_PERM" value="">
    <input type="submit" value="ADD" name="_method" style="margin-top:5px" class="mb-5" onclick="getValue()">
    </form>
  </div>
  </form>

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