<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Department</title>
  <!-- Use one version of Bootstrap and jQuery -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <?php require_once('../../layout/_layout.php') ?>
  <?php require_once('../../controler/Permission.php') ?>
  <nav class="navbar navbar-expand-sm  "></nav>

  <main>
    <div class="container">

      <h1 style="font-size:30px">
        <p style="color:blue">การจัดการสิทธ์การเข้าถึง</p>
      </h1>

    </div>

  </main>

  <div class="container " style="width: 600px;">
    <div class="container d-flex flex-row-reverse ">
      <a href="http://203.188.54.9/~u6411800010/view/permission/pu2.php">
        <button class="btn btn-primary" type="submit" data-bs-toggle="modal">+เพิ่มสิทธิ</button>
      </a>
    </div>
    <table class="table table-striped mt-5 mb-5 bg-light" table-loa>
      <thead>
        <tr>
          <th scope="col">ชื่อสิทธิ</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i = 0; $i < count($select_name); $i++) { ?>
          <tr> 
  
            <td>
              <?= $select_name[$i]['NAME_PERM'] ?>
            </td>
            <td>
              <a
                href="http://203.188.54.9/~u6411800010/view/permission/Edit.php? edit=<?= $select_name[$i]['ID_PERM'] ?>&name=<?= urlencode($select_name[$i]['NAME_PERM']) ?>">
                <img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22">
              </a>


              <a href="#" class="delete-permission" data-id="<?= $select_name[$i]['ID_PERM'] ?>"> 
                <img src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22" height="22">
              </a>

            </td>
            <?php

        } ?>
        </tr>
      </tbody>
    </table>
  </div>
  <script>
    $(document).ready(function () {
      // Function to delete a department
      function deletePermission(PermissionID) {
        $.ajax({
          type: "POST",
          url: "../../controler/Permission.php",
          data: {
            _method: "DELETE", // Specify the delete method
            KEY: PermissionID // Pass the permission ID to delete
          },
          success: function () {
            // Reload the page after successful deletion
            location.reload();
          },
          error: function (xhr, status, error) {
            console.error(error);
          }
        });
      }

      // Listen for click on delete buttons
      $(".delete-permission").click(function (event) {
        event.preventDefault(); // Prevent the default link behavior
        var PermissionID = $(this).data("id"); // Get the department ID from data-id attribute
        var confirmDelete = confirm("Are you sure you want to delete this Permission?"); // Change this message
        if (confirmDelete) {
          // Call the deleteDepartment function if the user confirms
          deletePermission(PermissionID);
        }
      });

    });
  </script>



</body>

</html>