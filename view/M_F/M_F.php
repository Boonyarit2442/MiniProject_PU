<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basefeature</title>
    <!-- Use one version of Bootstrap and jQuery -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./M_F.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php 
        require_once('../../layout/_layout.php');
        require_once('../../controler/Base_features.php');
    ?>


    <section class="feature">
        <div class="feature-con">
            <div class="feature-text">คุณสมบัติพื้นฐาน</div>
            <button class="add-feature" type="submit" data-bs-toggle="modal"
                data-bs-target="#CreateModal">+คุณสมบัติ</button>
        </div>
    </section>
    <!-- Create Position -->
    <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="CreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateModalLabel">เพิ่มคุณสมบัติ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body w-100 h-100">
                    <form action="../../controler/Base_features.php" method="POST">
                        <div class="">
                            <!--from create data -->
                            <div>
                                <label for="pos-text">ชื่อคุณสมบัติ</label><br>
                                <input type="text" name="NAME_FEAT" id="NAME_FEAT"><br>
                            </div><br>
                            <div>
                                <input type="submit" value="ADD" name="_method" style="margin-top:5px">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter -->
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

    <section class="filter">
        <nav class="filter-bar">
            <div class="pos-con">
                <label for="pos-text" style="margin-right: 350px;">คุณสมบัติ</label>

                <div class="combo-pos">
                    <select name="FEAT" id="FEAT"
                        style="width:250px;height:40px;text-align: center; margin-right: 130px;">
                        <option value="all">ทั้งหมด</option>
                        <?php for ($i = 0; $i < $Data[$i]; $i++) { ?>
                            <option value="<?= $Data[$i]['ID_FEAT'] ?>">
                                <?= $Data[$i]['NAME_FEAT'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <button
                        style="background-color:#3e91ff;color:#fff;border:none;border-radius:7px;font-size:16px;padding:10px;width: 100px; margin-left: 50px; "
                        onclick="filter_Table()"> Filter </button>
                </div>
            </div>
        </nav>
    </section>
    <script>

        function filter_Table() {
            var Dep_Value = document.getElementById('FEAT');
            var data_all = <?php echo json_encode($Data); ?>;
            var showsdata = document.getElementById("showsdata");
            var columns_data = ['ID_FEAT', 'NAME_FEAT'];

            showsdata.innerHTML = null;


            for (let i = 0; i < data_all.length; i++) {
                if (Dep_Value.value == "all") {
                    for (let i = 0; i < data_all.length; i++) {
                        var tr = document.createElement("tr");
                        for (let k = 0; k < columns_data.length; k++) {
                            var td = document.createElement("td");
                            td.innerHTML = data_all[i][columns_data[k]];
                            tr.appendChild(td);
                        }
                        var td = document.createElement("td");
                        var button_col_1 = document.createElement("button");
                        var button_col_2 = document.createElement("button");
                        var image_col_1 = document.createElement("img");
                        var image_col_2 = document.createElement("img");

                        button_col_1.setAttribute("onclick", "editAlert('" + data_all[i][columns_data[0]] + "')")
                        button_col_1.style = "border : 0; padding: 0;";
                        button_col_2.setAttribute("onclick", "deleteAlert('" + data_all[i][columns_data[0]] + "')")
                        button_col_2.style = "border : 0; padding: 0;";


                        image_col_1.width = "22";
                        image_col_1.height = "22";
                        image_col_1.src = "https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
                        button_col_1.appendChild(image_col_1);
                        image_col_2.width = "22";
                        image_col_2.height = "22";
                        image_col_2.src = "https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
                        button_col_2.appendChild(image_col_2);
                        td.appendChild(button_col_1);
                        td.appendChild(button_col_2);
                        tr.appendChild(td);
                        showsdata.appendChild(tr);

                    }
                    break;
                }
                else if (data_all[i]['ID_FEAT'] == Dep_Value.value) {
                    for (let i = 0; i < data_all.length; i++) {

                        var tr = document.createElement("tr");
                        // Fillter SQL
                        if (data_all[i]['ID_FEAT'] == Dep_Value.value) {
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


            }

        }
    </script>
    <!-- Table -->
    <div class="container ">
        <table class="table table-striped mt-4 bg-light">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ชื่อคุณสมบัติ</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody id="showsdata">
                <?php for ($i = 0; $i < count($Data); $i++) { ?>
                    <tr>
                        <td>
                            <?= $Data[$i]['ID_FEAT'] ?>
                        </td>
                        <td>
                            <?= $Data[$i]['NAME_FEAT'] ?>
                        </td>
                        <td>

                            <button onclick="editAlert('<?= $Data[$i]['ID_FEAT'] ?>')" style="border : 0; padding: 0;">
                                <img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22">
                            </button>
                            <button onclick="deleteAlert('<?= $Data[$i]['ID_FEAT'] ?>')"
                                style="border : 0; padding: 0;"><img
                                    src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22"
                                    height="22"></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        function deleteAlert(FeatId) {
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
                    deletedep(FeatId);
                }
            });
        }

        function deletedep(FeatId) {
            const formData = new FormData();
            formData.append('_method', 'DELETE');
            formData.append('KEY', FeatId);
            fetch('../../controler/Base_features.php', {
                method: 'POST',
                body: formData,
            }).then(response => {
                window.location.reload();
            })
        }

        function editAlert(FeatId) {
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
                    window.location.href = 'M_F_edit.php?id=' + FeatId;
                }
            });
        }

    </script>

</body>

</html>