<?php require_once("controler/indexControler.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body >
<style>
    html, body, div#Table_table {
        margin: 0;
        height: 100%;
    }
</style>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CreateModal" >
  ADD
</button>

<!-- Modal -->
<div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CreateModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body w-100 h-100">
        <form action="controler/indexControler.php" method="POST">
            <div class="">

<!--from create data -->
                <div>
                    <label for="NAME_ID">ID</label>
                    <input type="text" name="NAME_ID" id="NAME_ID"><br>
                </div>
                <div>
                    <label for="USER1">User</label>
                    <input type="text" name="USER1" id="USER1"><br>
                </div>
                <div>
                    <label for="PASSWORD">password</label>
                    <input type="text" name="PASSWORD" id="PASSWOES"><br>
                </div>
                <div>
                    <input type="submit" value="submit" name="submit">
                </div>

            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body w-100 h-100">
        <form action="controler/indexControler.php" method="POST">
            <div class="">

<!--from Edit data -->
                <div>
                    <label for="NAME_ID">ID</label>
                    <input type="text" name="NAME_ID" id="NAME_ID" value="edit"><br>
                </div>
                <div>
                    <label for="USER1">User</label>
                    <input type="text" name="USER1" id="USER1"><br>
                </div>
                <div>
                    <label for="PASSWORD">password</label>
                    <input type="text" name="PASSWORD" id="PASSWOES"><br>
                </div>
                <div>
                    <input type="submit" value="submit" name="submit">
                </div>

            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container">

<div class="d-flex justify-content-center align-items-center mt-5">
    <div id="Table_table" class=" w-100">
<!--table Show Data-->
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">USER</th>
                <th scope="col">PASSWRD</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php for ($i=0; $i < count($Data); $i++) { ?> 
            <tr >
                <td scope="row" ><?=$i?></td>
                <td><?=$Data[$i]['NAME_ID']?></td>
                <td><?=$Data[$i]['USER1']?></td>
                <td><?=$Data[$i]['PASSWORD']?></td>
                <td><button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#EditModal">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
</div>
        </div>
</body>
</html>