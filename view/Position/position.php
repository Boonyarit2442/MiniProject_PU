<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Position</title>
  <link rel="stylesheet" href="./posstyle.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="">
  <?php
  require_once('../../layout/_layout.php');
  require_once('../../controler/postitionController.php');
  ?>

  <section class="feature">
    <div class="feature-con">
      <div class="feature-text">ตำแหน่ง</div>
      <button class="add-feature" type="submit" data-bs-toggle="modal" data-bs-target="#CreateModal">+
        เพิ่มตำแหน่ง</button>
    </div>
  </section>

  <!-- Create Position -->
  <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="CreateModalLabel">เพิ่มตำแหน่ง</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body w-100 h-100">
          <form action="#" method="POST">
            <div class="">
              <div>
                <div>
                  <label for="dep-text">แผนกที่ต้องการสังกัด</label><br>
                  <select name="NAME_DEP" id="NAME_DEP">
                    <option value="">-Choose-</option>
                    <?php foreach ($Depname as $results) { ?>
                      <option value="<?php echo $results['NAME_DEP']; ?>">
                        <?php echo $results['NAME_DEP']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div><br>
                <div>
                  <label for="pos-text">ชื่อสิท</label><br>
                  <select name="NAME_PERM" id="NAME_PERM">
                    <option value="">-Choose-</option>
                    <?php foreach ($Perm as $results) { ?>
                      <option value="<?php echo $results['NAME_PERM']; ?>">
                        <?php echo $results['NAME_PERM']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div><br>
                <div> <textarea id="JOB_DETEL" name="JOB_DETEL" rows="6" cols="50"></textarea><br></div>
                <div>
                  <label for="pos-text">ชื่อตำแหน่งที่ต้องการเพิ่ม</label><br>
                  <input type="text" name="NAME_PST" id="NAME_PST" style="margin-left:5px">
                </div>
              </div>
            </div>
            <input type="submit" value="ADD" name="_method" style="margin-top:5px">
          </form>
        </div>
      </div>
    </div>
  </div>
  <section class="filter">
    <nav class="filter-bar">
      <div class="pos-con">
        <label for="pos-text" style="margin-right: 315px;">แผนก</label>
        <label for="pos-text">ตำแหน่ง</label>
        <div class="combo-pos">
          <select name="DEPNO" id="DEPNO" onchange="UPPOS(this)"
            style="width:250px;height:40px;text-align: center; margin-right: 100px;">
            <option value="all">ทั้งหมด</option>
            <?php for ($i = 0; $i < $Dep[$i]; $i++) { ?>
              <option value="<?= $Dep[$i]['ID_DEP'] ?>">
                <?= $Dep[$i]['NAME_DEP'] ?>
              </option>
            <?php } ?>
          </select>

          <select name="PSTNO" id="PSTNO" style="width:250px;height:40px;text-align: center; margin-right: 100px;">
            <option value="all">ทั้งหมด</option>
            <?php for ($i = 0; $i < $Pst[$i]; $i++) { ?>
              <option value="<?= $Pst[$i]['ID_PST'] ?>">
                <?= $Pst[$i]['NAME_PST'] ?>
              </option>
            <?php } ?>
          </select>
          <button style="background-color:#3e91ff;color:#fff;border:none;border-radius:7px;font-size:16px;padding:10px;width: 100px;" onclick="filter_Table()"> Filter </button>
        </div>
      </div>
    </nav>
  </section>

  </div>
  <script>
    function filter_Table() {
      var Dep_Value = document.getElementById('DEPNO');
      var Pst_Value = document.getElementById('PSTNO');
      console.log(Dep_Value.value + " & " + Pst_Value.value);

      var data_all = <?php echo json_encode($Data); ?>;
      var data_pst = <?php echo json_encode($Pst); ?>

      var showsdata = document.getElementById("showsdata");
      var columns_data = ['ID_PST', 'NAME_PST', 'NAME_DEP', 'JOB_DETEL'];

      showsdata.innerHTML = null;


      for (let i = 0; i < data_all.length; i++) {
        if (Dep_Value.value == "all" && Pst_Value.value == "all") {
          for (let i = 0; i < data_all.length; i++) {
            var tr = document.createElement("tr");

            for (let k = 0; k < columns_data.length; k++) {
              var td = document.createElement("td");
              td.innerHTML = data_all[i][columns_data[k]];
              tr.appendChild(td);
            }
            // Valiable
            var td = document.createElement("td");
            var button_col_1 = document.createElement("button");
            var button_col_2 = document.createElement("button");
            var image_col_1 = document.createElement("img");
            var image_col_2 = document.createElement("img");


            // Button *Add Attribute"onclick()"
            button_col_1.setAttribute("onclick", "editAlert('" + data_all[i][columns_data[0]] + "')")
            button_col_1.style = "border : 0; padding: 0;";
            button_col_2.setAttribute("onclick", "deleteAlert('" + data_all[i][columns_data[0]] + "')")
            button_col_2.style = "border : 0; padding: 0;";

            // Add Image
            image_col_1.width = "22";
            image_col_1.height = "22";
            image_col_1.src = "https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
            button_col_1.appendChild(image_col_1);
            image_col_2.width = "22";
            image_col_2.height = "22";
            image_col_2.src = "https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
            button_col_2.appendChild(image_col_2);

            // Fill Table
            td.appendChild(button_col_1);
            td.appendChild(button_col_2);
            tr.appendChild(td);
            showsdata.appendChild(tr);

          }
          break;
        }
        else if (data_all[i]['ID_DEP'] == Dep_Value.value && data_all[i]['ID_PST'] == Pst_Value.value) {
          for (let i = 0; i < data_all.length; i++) {

            var tr = document.createElement("tr");

            // Fillter SQL
            if (data_all[i]['ID_DEP'] == Dep_Value.value && data_all[i]['ID_PST'] == Pst_Value.value) {
              for (let k = 0; k < columns_data.length; k++) {
                var td = document.createElement("td");

                td.innerHTML = data_all[i][columns_data[k]];
                tr.appendChild(td);

              }
              // Valiable
              var td = document.createElement("td");
              var button_col_1 = document.createElement("button");
              var button_col_2 = document.createElement("button");
              var image_col_1 = document.createElement("img");
              var image_col_2 = document.createElement("img");


              // Button *Add Attribute"onclick()"
              button_col_1.setAttribute("onclick", "editAlert('" + data_all[i][columns_data[0]] + "')")
              button_col_1.style = "border : 0; padding: 0;";
              button_col_2.setAttribute("onclick", "deleteAlert('" + data_all[i][columns_data[0]] + "')")
              button_col_2.style = "border : 0; padding: 0;";

              // Add Image
              image_col_1.width = "22";
              image_col_1.height = "22";
              image_col_1.src = "https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
              button_col_1.appendChild(image_col_1);
              image_col_2.width = "22";
              image_col_2.height = "22";
              image_col_2.src = "https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
              button_col_2.appendChild(image_col_2);

              // Fill Table
              td.appendChild(button_col_1);
              td.appendChild(button_col_2);
              tr.appendChild(td);
              showsdata.appendChild(tr);
            }
          }
        }
        else if (data_all[i]['ID_DEP'] == Dep_Value.value && Pst_Value.value == "all") {
          for (let i = 0; i < data_all.length; i++) {

            var tr = document.createElement("tr");

            // Fillter SQL
            if (data_all[i]['ID_DEP'] == Dep_Value.value) {
              for (let k = 0; k < columns_data.length; k++) {
                var td = document.createElement("td");

                td.innerHTML = data_all[i][columns_data[k]];
                tr.appendChild(td);

              }
              // Valiable
              var td = document.createElement("td");
              var button_col_1 = document.createElement("button");
              var button_col_2 = document.createElement("button");
              var image_col_1 = document.createElement("img");
              var image_col_2 = document.createElement("img");


              // Button *Add Attribute"onclick()"
              button_col_1.setAttribute("onclick", "editAlert('" + data_all[i][columns_data[0]] + "')")
              button_col_1.style = "border : 0; padding: 0;";
              button_col_2.setAttribute("onclick", "deleteAlert('" + data_all[i][columns_data[0]] + "')")
              button_col_2.style = "border : 0; padding: 0;";

              // Add Image
              image_col_1.width = "22";
              image_col_1.height = "22";
              image_col_1.src = "https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
              button_col_1.appendChild(image_col_1);
              image_col_2.width = "22";
              image_col_2.height = "22";
              image_col_2.src = "https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
              button_col_2.appendChild(image_col_2);

              // Fill Table
              td.appendChild(button_col_1);
              td.appendChild(button_col_2);
              tr.appendChild(td);
              showsdata.appendChild(tr);
            }
          }
          break;
        }
        else if (Dep_Value.value == "all" && data_all[i]['ID_PST'] == Pst_Value.value) {
          for (let i = 0; i < data_all.length; i++) {

            var tr = document.createElement("tr");

            // Fillter SQL
            if (data_all[i]['ID_PST'] == Pst_Value.value) {
              for (let k = 0; k < columns_data.length; k++) {
                var td = document.createElement("td");

                td.innerHTML = data_all[i][columns_data[k]];
                tr.appendChild(td);

              }
              // Valiable
              var td = document.createElement("td");
              var button_col_1 = document.createElement("button");
              var button_col_2 = document.createElement("button");
              var image_col_1 = document.createElement("img");
              var image_col_2 = document.createElement("img");


              // Button *Add Attribute"onclick()"
              button_col_1.setAttribute("onclick", "editAlert('" + data_all[i][columns_data[0]] + "')")
              button_col_1.style = "border : 0; padding: 0;";
              button_col_2.setAttribute("onclick", "deleteAlert('" + data_all[i][columns_data[0]] + "')")
              button_col_2.style = "border : 0; padding: 0;";

              // Add Image
              image_col_1.width = "22";
              image_col_1.height = "22";
              image_col_1.src = "https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
              button_col_1.appendChild(image_col_1);
              image_col_2.width = "22";
              image_col_2.height = "22";
              image_col_2.src = "https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
              button_col_2.appendChild(image_col_2);

              // Fill Table
              td.appendChild(button_col_1);
              td.appendChild(button_col_2);
              tr.appendChild(td);
              showsdata.appendChild(tr);
            }
          }
          break;
        }
      }

    }
  </script>
  <!-- Alert Error -->
  <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-danger container mt-3" role="alert" style="width: 100%;">
            <?php echo $_GET['error']; ?>
        </div>
    <?php } ?>
  <!-- Table -->
  <div class="container ">
    <table class="table table-striped mt-4 bg-light">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ชื่อตำแหน่ง</th>
          <th scope="col">ชื่อแผนก</th>
          <th scope="col">รายละเอียดงาน</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody id="showsdata">
        <?php for ($i = 0; $i < count($Data); $i++) { ?>
          <tr>
            <td>
              <?= $Data[$i]['ID_PST'] ?>
            </td>
            <td>
              <?= $Data[$i]['NAME_PST'] ?>
            </td>
            <td>
              <?= $Data[$i]['NAME_DEP'] ?>
            </td>
            <td>
              <?= $Data[$i]['JOB_DETEL'] ?>
            </td>
            <td>
              
              <button onclick="editAlert('<?= $Data[$i]['ID_PST'] ?>')" style="border : 0; padding: 0;">
                <img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22">
              </button>
              <button onclick="deleteAlert('<?= $Data[$i]['ID_PST'] ?>')" style="border : 0; padding: 0;"><img
                  src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22" height="22"></button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script>
    function UPPOS(e) {
      var info = <?php echo json_encode($Pst) ?>;
      var pos = document.getElementById('PSTNO');
      pos.innerHTML = null;
      for (let i = 0; i < info.length; i++) {
        if (i < 1) {
          var op = document.createElement('option');
          op.innerHTML = "ทั้งหมด";
          op.value = "all";
          pos.appendChild(op);
        }
        if (e.value == info[i]['P_DEPNO']) {
          var op = document.createElement('option');
          op.innerHTML = info[i]['NAME_PST'];
          op.value = info[i]['ID_PST'];
          pos.appendChild(op);
        } else if (e.value == "all") {
          pos.innerHTML = null;
          var op = document.createElement('option');
          op.innerHTML = "ทั้งหมด";
          op.className = "row-pst";
          op.value = "all";
          pos.appendChild(op);
        }
        if (e.value == "all") {
          for (let k = 0; k < info.length; k++) {
            var op = document.createElement('option');
            op.innerHTML = info[k]['NAME_PST'];
            op.value = info[k]['ID_PST'];
            pos.appendChild(op);
          }
        }
      }
    }

    function deleteAlert(PositionId) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success ms-3',
          cancelButton: 'btn btn-danger '
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'แน่ใจหรือไหม?',
        text: "หากคุณกดยืนยันจะไม่สามารถย้อนกลับมาแก้ไขได้อีก!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          deletePost(PositionId);
        }
      });
    }

    function deletePost(PositionId) {
      const formData = new FormData();
      formData.append('_method', 'DELETE');
      formData.append('KYE', PositionId);
      fetch('../../controler/postitionController.php', {
        method: 'POST',
        body: formData,
      }).then(response => {
        window.location.reload();
      })
    }


    function editAlert(PositionId){      
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success ms-3',
                cancelButton: 'btn btn-danger '
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'ต้องการแก้ไขใช่หรือไม่?',
              text: "หากต้องการแก้ไข กดยืนยันได้เลยนะจ๊ะ",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'ยืนยัน',
              cancelButtonText: 'ยกเลิก',
              reverseButtons: true
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'Edit_position.php?id='+PositionId;
              } 
        });
    }

  </script>




</body>

</html>