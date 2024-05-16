<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feature</title>
  <link rel="stylesheet" href="./feature.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body style="background-color: rgb(234,234,234);">
  <?php
  require_once('../../layout/_layout.php');
  require_once('../../controler/Feature.php');

  ?>

  <section class="feature">
    <div class="feature-con">
      <div class="feature-text">จัดการคุณสมบัติแผนก : <label for="" style="color:#000">
          <?= $Namedep ?>
        </label></div>
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
                  <select name="NAME_FEAT" id="NAME_FEAT"
                    style="width:250px;height:40px;text-align: center; margin-right: 100px;">
                    <option value="all">ทั้งหมด</option>
                    <?php foreach ($SelectFeat as $result) { ?>
                      <option value="<?php echo $result['NAME_FEAT']; ?>">
                        <?php echo $result['NAME_FEAT']; ?>
                      </option>
                    <?php } ?>
                  </select>
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
  <script>
    // Get the message from the URL query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');

    // Display the message using SweetAlert2 (Swal)
    if (message) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: decodeURIComponent(message), // Decode the URL-encoded message
        });
    }
</script>
  <!--------------------------------------------------------------->
  <section class="filter">
    <nav class="filter-bar">
      <div class="filter-con">
        <form action="#" method="POST" id="formsearch">
          <input type="search" name="searchName" id="searchName">
          <input type="submit" name="_method" value="search">
        </form>
    </nav>
  </section>
  <!--------------------------------------------------------------->
  <div class="container-xxl">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ชื่อตำแหน่ง</th>
          <th scope="col">ชื่อคุณสมบัติ</th>
          <th scope="col">รายละเอียดคุณสมบัติ</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="showdata">
        <?php for ($i = 0; $i < count($Table); $i++) { ?>
        <tr>
          <td>
            <?= $Table[$i]['NAME_PST'] ?>
          </td>
          <td>
            <?= $Table[$i]['NAME_FEAT'] ?>
          </td>
          <td>
            <?= $Table[$i]['DETEL'] ?>
          </td>
          <td>
            <button onclick="editAlert('<?= $Table[$i]['ORDER_FP'] ?>','<?= $Table[$i]['NAME_PST'] ?>')"
              style="border : 0; padding: 0;">
              <img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22">
            </button>
            <button onclick="deleteAlert('<?= $Table[$i]['ORDER_FP'] ?>')" style="border : 0; padding: 0;"><img
                src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22" height="22"></button>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <script>
    function editAlert(Order, PstId) {
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
          const editUrl = `Edit_feature.php?pstid=${PstId}&order=${Order}`;// เพิ่มพารามิเตอร์เพิ่มเติมตามต้องการ window.location.href = editUrl;
          window.location.href = editUrl;
        }
      });
    }

    function deleteAlert(Order) {
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
          deleteList(Order);
        }
      });
    }


    function deleteList(Order) {
      const formData = new FormData();
      formData.append('_method', 'DELETE');
      formData.append('ORDER', Order);
      fetch('../../controler/Feature.php', {
        method: 'POST',
        body: formData,
      }).then(response => {
        window.location.reload();
      })
    }

  </script>


</body>

</html>