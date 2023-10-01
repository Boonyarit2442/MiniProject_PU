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
        <button class="add-feature" type="submit" data-bs-toggle="modal" data-bs-target="#CreateModal">+ เพิ่มตำแหน่ง</button>
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
                            <div>
                                <label for="dep-text">แผนกที่ต้องการสังกัด</label><label for="pos-text" style="margin-left:120px">ชื่อตำแหน่งที่ต้องการแก้ไข</label><br>
                                <select name="NAME_PST" id="position">
                                  <option value="IT" >IT</option>
                                  <option value="Programmer" >Programer</option>
                                  <option value="HR" >HR</option>
                                  <option value="Manager" >Manager</option>
                                </select>
                                <input type="text" name="ID_PST" id="ID_PST" value="<?=$Data[$i]['ID_PST']?>" style="margin-left:5px"><br>
                            </div>
                            <button class="cancel-btn" type="submit" style="background-color:red;color:#fff;border:none;border-radius:3px;font-size:16px;padding:10px 30px;margin-top:20px;margin-left:110px">ยกเลิก</button>
                            <button class="submit-btn" type="submit" style="background-color:#3e91ff;color:#fff;border:none;border-radius:3px;font-size:16px;padding:10px 30px;margin-top:20px;margin-left:30px">ยืนยัน</button>
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
          <input
            class="search-bar"
            type="text"
            id="search"
            placeholder="ค้นหาคุณสมบัติ..."
            size="60"
          />
          <div class="dep-con">
          <label for="dep-text">แผนก</label>         
          <div class="combo-dep">
            <select name="department" id="department">
              <option value="It">IT</option>
              <option value="Programmer">Programer</option>
              <option value="Hr">HR</option>
              <option value="Manager">Manager</option>
            </select>
          </div>
          </div>

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
            <th scope="col"><input type="checkbox" /></th>
            <th scope="col">รหัส</th>
            <th scope="col">ชื่อตำแหน่ง</th>
            <th scope="col">แผนก</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <count($Data); $i++) { ?>
          <tr>
            <th scope="row"><input type="checkbox" /></th>
            <td><?=$Data[$i]['ID_PST']?></td>
            <td><?=$Data[$i]['NAME_PST']?></td>
            <td><?=$Data[$i]['JOB_DETEL']?></td>
            <td>
              <a data-toggle="modal" data-bs-toggle="modal" data-bs-target="#<?="EditModel_".$i?>" id="edit_<?=$i?>"><img
                src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                width="22"
                height="22">
              </a>
              <!-- edit Position -->
              <div class="modal fade" id="<?="EditModel_".$i?>" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="<?="EditModel_".$i?>Label">แก้ไขตำแหน่ง</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body w-100 h-100">
                      <form action="../../controler/postitionController.php" method="POST">
                        <div>
                        <!--from Edit data -->
                          <div>
                                <label for="dep-text">แผนกที่ต้องการสังกัด</label><label for="pos-text" style="margin-left:120px">ชื่อตำแหน่งที่ต้องการแก้ไข</label><br>
                                <select name="NAME_PST" id="position">
                                  <option value="IT" >IT</option>
                                  <option value="Programmer" >Programer</option>
                                  <option value="HR" >HR</option>
                                  <option value="Manager" >Manager</option>
                                </select>
                                <input type="text" name="ID_PST" id="ID_PST" value="<?=$Data[$i]['ID_PST']?>" style="margin-left:5px"><br>
                            </div>
                            <button class="cancel-btn" type="submit" style="background-color:red;color:#fff;border:none;border-radius:3px;font-size:16px;padding:10px 30px;margin-top:20px;margin-left:110px">ยกเลิก</button>
                            <button class="submit-btn" type="submit" style="background-color:#3e91ff;color:#fff;border:none;border-radius:3px;font-size:16px;padding:10px 30px;margin-top:20px;margin-left:30px">ยืนยัน</button>
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
                  src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png"
                  width="22"
                  height="22">
                </a>
                <input type="hidden" name="KYE" id="KYE" value="<?=$Data[$i]['ID_PST']?>">
              </form>
              </div>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- sweetalert2 -->
    <button id="showModalSubmitButton" style="background-color:#3e91ff;color:#fff;border:none;border-radius:3px;font-size:16px;padding:10px 30px;margin-top:20px;margin-left:30px">ใส่ตรงยืนยันในเพิ่มและแก้ไข</button>
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
