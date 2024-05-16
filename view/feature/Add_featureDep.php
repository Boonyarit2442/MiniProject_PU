<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feature</title>
  <link rel="stylesheet" href="./feature.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php
  require_once('../../layout/_layout.php');
  require_once('../../controler/Feature.php');

  ?>

  <section class="feature">
    <div class="feature-con">
      <div class="feature-text">เพิ่มคุณสมบัติตำแหน่ง :</div>
      <button class="add-feature" type="submit" data-bs-toggle="modal" data-bs-target="#CreateModal">+
        คุณสมบัติ</button>
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
          <form action="../../controler/Feature.php" method="POST">
            <div class="">
              <div>
                <div>
                  <label for="dep-text" style="margin-top: 5px;">ตำแหน่งที่ต้องการเพิ่ม</label><br>
                  <select name="NAME_PST" id="NAME_PST"
                    style="width:250px;height:40px;text-align: center; margin-right: 100px;">
                    <option value="all">ทั้งหมด</option>
                    <?php foreach ($SelectPst as $result) { ?>
                      <option value="<?php echo $result['NAME_PST']; ?>">
                        <?php echo $result['NAME_PST']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div><br>
                <div>
                  <label for="pos-text">ชื่อคุณสมบัติ</label><br>
                  <input type="text" name="NAME_FEAT" id="NAME_FEAT" style="margin-left:5px"><br>
                </div><br>
                <div> <textarea id="DETEL" name="DETEL" rows="6" cols="50" style="margin: top 5px"></textarea></div><br>
              </div>
            </div>
            <input type="submit" value="ADD" name="_method" style="margin-top:5px">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--------------------------------------------------------------->
  <section class="filter">
    <nav class="filter-bar">


      <div class="filter-con">
        <input class="search-bar" type="text" id="search" placeholder="ค้นหาคุณสมบัติ..." size="60" />

        <div class="pos-con">
          <label for="pos-text">ตำแหน่ง</label>
          <div class="combo-pos">
            <select name="position" id="position">
              <option value="It">IT</option>
              <option value="Programmer">Programer</option>
              <option value="Hr">HR</option>
              <option value="Manager">Manager</option>
            </select>
          </div>
        </div>
        <button class="search-bth" type="submit">SEARCH</button>
      </div>
    </nav>
  </section>
  <!--------------------------------------------------------------->
  <div class="container-xxl">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col" style="margin-left: 10px;">ลำดับ</th>
          <th scope="col">ชื่อคุณสมบัติพื้นฐาน</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i = 0; $i < count($Table); $i++) { ?>
        <tr>
          <td style="margin-left: 10px;">
            <?= $i+1 ?>
          </td>
          <td>
            <?= $Table[$i]['NAME_FEAT'] ?>
          </td>
          <td>
            <a data-toggle="modal" data-bs-toggle="modal" data-bs-target="#<?= "EditModel_" . $i ?>"
              id="edit_<?= $i ?>"><img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22"
                height="22">
            </a>
            <!-- edit Position -->
              <div class="modal fade" id="<?= "EditModel_" . $i ?>" tabindex="-1" aria-labelledby="EditModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="<?= "EditModel_" . $i ?>Label">แก้ไขตำแหน่ง</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body w-100 h-100">
                      <form action="../../controler/Feature.php" method="POST">
                        <div>
                          <div>
                            <label for="dep-text" style="margin-left:10px">ชื่อคุณสมบัติ</label><label for="pos-text"
                              style="margin-left:160px">รายละเอียดคุณสมบัติ</label><br>
                            <input type="text" name="ID_PST" id="ID_PST" value="<?= $Table[$i]['ID_FEAT'] ?>"
                              style="margin-left:10px">
                            <input type="text" name="JOB_DETEL" id="JOB_DETEL" value="<?= $Table[$i]['NAME_FEAT'] ?>"
                              style="margin-left:35px">
                          </div>
                          <button class="cancel-btn" type="submit"
                            style="background-color:red;color:#fff;border:none;border-radius:3px;font-size:16px;padding:10px 30px;margin-top:20px;margin-left:110px">ยกเลิก</button>
                          <button class="submit-btn" type="submit"
                            style="background-color:#3e91ff;color:#fff;border:none;border-radius:3px;font-size:16px;padding:10px 30px;margin-top:20px;margin-left:30px">ยืนยัน</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-------------------------------------->
              <div>
                <form action="../../controler/Feature.php" method="POST">
                  <a href="../../controler/postitionController.php" name="_method" value="DELETE"><img
                      src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22" height="22">
                  </a>
                  <input type="hidden" name="KYE" id="KYE" value="<?= $Table[$i]['ID_FEAT'] ?>">
                </form>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- sweetalert2 -->
  <button id="showModalSubmitButton"
    style="background-color:#3e91ff;color:#fff;border:none;border-radius:3px;font-size:16px;padding:10px 30px;margin-top:20px;margin-left:30px">ใส่ตรงยืนยันในเพิ่มและแก้ไข</button>
  <!--  -->
</body>

</html>

<script>
  // Select the button element by its id
  const showModalSubmitButton = document.getElementById('showModalSubmitButton');

  // Attach a click event listener to the button
  showModalSubmitButton.addEventListener('click', () => {
    Swal.fire({
      title: 'Do you want to save the changes?',
      icon: 'warning',
      showDenyButton: true,
      confirmButtonText: 'Save',
      denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        Swal.fire('Saved!', '', 'success');
      } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info');
      }
    });
  });

</script>