<?php require_once("../../controler/example_LoginControler.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExsampleCode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</head>

<body>
    <style>
        html,
        body,
        div#Table_table {
            margin: 0;
            height: 100%;
        }
    </style>


    <!-- Modal fro create -->
    <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body w-100 h-100">
                    <form action="../../controler/example_LoginControler.php" method="POST">
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
                                <input type="submit" value="ADD" name="_method">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
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
                        <?php for ($i = 0; $i < count($Data); $i++) { ?>
                            <tr>
                                <td scope="row">
                                    <?= $i ?>
                                </td>
                                <td>
                                    <?= $Data[$i]['NAME_ID'] ?>
                                </td>
                                <td>
                                    <?= $Data[$i]['USER1'] ?>
                                </td>
                                <td>
                                    <?= $Data[$i]['PASSWORD'] ?>
                                </td>
                                <td><button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#<?= "EditModel_" . $i ?>" id="edit_<?= $i ?>">Edit</button></td>
                                <!-- Modal edit -->
                                <div class="modal fade" id="<?= "EditModel_" . $i ?>" tabindex="-1"
                                    aria-labelledby="EditModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="<?= "EditModel_" . $i ?>Label">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body w-100 h-100">
                                                <form action="../../controler/example_LoginControler.php" method="POST">
                                                    <div>
                                                        <!--from Edit data -->
                                                        <div id="INPUT_IDEDIT">
                                                            <label for="NAME_ID">ID</label>
                                                            <input type="text" name="NAME_ID" id="NAME_ID"
                                                                value="<?= $Data[$i]['NAME_ID'] ?>"><br>
                                                        </div>
                                                        <div>
                                                            <label for="USER1">User</label>
                                                            <input type="text" name="USER1" id="USER1"
                                                                value="<?= $Data[$i]['USER1'] ?>"><br>
                                                        </div>
                                                        <div>
                                                            <label for="PASSWORD">password</label>
                                                            <input type="text" name="PASSWORD" id="PASSWOES"
                                                                value="<?= $Data[$i]['PASSWORD'] ?>"><br>
                                                        </div>
                                                        <div>
                                                            <input type="submit" value="EDIT" name="_method">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="../../controler/example_LoginControler.php" method="POST">
                                    <input type="hidden" name="KYE" id="KYE" value="<?= $Data[$i]['NAME_ID'] ?>"><br>
                                    <td><input type="submit" value="DELETE" name="_method" class="btn btn-danger"></td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- button for click add -->
    <div class="container">
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#CreateModal">ADD</button>
        </div>
    </div>

</body>

</html>