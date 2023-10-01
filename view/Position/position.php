<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Position</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./posstyle.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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
          <form action="../../controler/postitionController.php" method="POST">
            <div class="">
              <!--from create data -->
              <div>
                <label for="ID_PST">รหัส</label><br>
                <input type="text" name="ID_PST" id="ID_PST"><br>
              </div>
              <div>
                <label for="pos-text">ตำแหน่ง</label><br>
                <select name="NAME_PST" id="position">
                  <option value="IT">IT</option>
                  <option value="Programmer">Programer</option>
                  <option value="HR">HR</option>
                  <option value="Manager">Manager</option>
                </select>
              </div>
              <div>
                <label for="JOB_DETEL">รายละเอียด</label><br>
                <input type="text" name="JOB_DETEL" id="JOB_DETEL"><br>
              </div>
              <div>
                <input type="submit" value="ADD" name="_method" style="margin-top:5px">
              </div>
            </div>
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
        <button class="search-bth" type="submit">SEARCH</button>

        <div class="combo">
          <label for="pos-text">ตำแหน่ง</label>
          <select name="position" id="position">
            <option value="It">IT</option>
            <option value="Programmer">Programer</option>
            <option value="Hr">HR</option>
            <option value="Manager">Manager</option>
          </select>
        </div>
      </div>
    </nav>
  </section>
  <div class="container-xxl">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col"><input type="checkbox" /></th>
          <th scope="col">รหัส</th>
          <th scope="col">ชื่อตำแหน่ง</th>
          <th scope="col">รายละเอียด</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i = 0; $i < count($Data); $i++) { ?>
        <tr>
          <th scope="row"><input type="checkbox" /></th>
          <td>
            <?= $Data[$i]['ID_PST'] ?>
          </td>
          <td>
            <?= $Data[$i]['NAME_PST'] ?>
          </td>
          <td>
            <?= $Data[$i]['JOB_DETEL'] ?>
          </td>
          <td>
            <a data-toggle="modal" data-bs-toggle="modal" data-bs-target="#<?= "EditModel_" . $i ?>" id="edit_<?= $i ?>"><img
                src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22">
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
                      <form action="../../controler/postitionController.php" method="POST">
                        <!--from Edit data -->
                        <div>
                          <label for="ID_PST">รหัส</label><br>
                          <input type="text" name="ID_PST" id="ID_PST" value="<?= $Data[$i]['ID_PST'] ?>"><br>
                        </div>
                        <div>
                          <label for="pos-text">ตำแหน่ง</label><br>
                          <select name="NAME_PST" id="position">
                            <option value="IT">IT</option>
                            <option value="Programmer">Programer</option>
                            <option value="HR">HR</option>
                            <option value="Manager">Manager</option>
                          </select>
                        </div>
                        <div>
                          <label for="JOB_DETEL">รายละเอียด</label><br>
                          <input type="text" name="JOB_DETEL" id="JOB_DETEL" value="<?= $Data[$i]['JOB_DETEL'] ?>"><br>
                        </div>
                        <div>
                          <input type="submit" value="EDIT" name="_method" style="margin-top:5px">
                        </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
    </div>
    <!-------------------------------------->
    <div>
      <form action="../../controler/postitionController.php" method="POST">
        <a href="../../controler/postitionController.php" name="_method" value="DELETE"><img
            src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22" height="22">
        </a>
        <input type="hidden" name="KYE" id="KYE" value="<?= $Data[$i]['ID_PST'] ?>">
      </form>
    </div>
    </td>
    </tr>
  <?php } ?>
  </tbody>
  </table>
  </div>
</body>

</html>