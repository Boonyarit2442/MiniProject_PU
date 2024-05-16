<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link CSS -->
    <link rel="stylesheet" href="style_Sched_Boss.css">

    <!-- Link Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Scheddule with boss</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php') ?>
    <?php require_once('../../controler/scheddule_bossController.php') ?>
    <!-- Bar Day -->
    <div class="wrapper">
        <div class="bar-day d-flex flex-column align-items-end" id="DateTable">
            <div class="d-flex justify-content-start">
                <button type="button" class="btn btn-primary me-1" id="AddDay">เพิ่มวัน</button>
                <button type="button" class="btn btn-danger" id="rmDay">ลบ</button>
            </div>
            <input type="date" id='dateC_0' >
        </div>
    </div>
    <script>
    $('#rmDay').click(() => {
        $('#DateTable').children('input:last-child').remove();
    })
    $('#AddDay').click(() => {
        var num = $('#DateTable').children('input').length;
        $('#DateTable').append("<input type=\"date\" id='dateC_" + num + "'>");
    })
    </script>
    <div class="menu-bar container d-flex justify-content-between align-items-center " style="margin-top: 30px;">
        <h2 class="text-primary">นัดวันสัมภาษณ์</h2>
    </div>
    <div class="container ">
        <table class="table table-striped mt-4 bg-light" id="TableShowEmp ">
            <thead>
                <tr>
                    <th scope="col">select</th>
                    <th scope="col">ID</th>
                    <th scope="col">ชื่อ + นามสกุล</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">ตำแหน่ง</th>
                    <th scope="col">สิทธิ์การเข้าถึง</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i < count($Data) ; $i++) { ?>
                <tr>
                    <td><input type="checkbox" name=<?php echo "ID_EMP_INTV_".$i ?>
                            value=<?php echo $Data[$i]['ID_EMP'] ?>></td>
                    <td><?php echo $Data[$i]['ID_EMP'] ?></td>
                    <td><?php echo $Data[$i]['NAME']." ".$Data[$i]['L_NAME'] ?></td>
                    <td><?php echo $Data[$i]['EMAIL'] ?></td>
                    <td><?php echo $Data[$i]['NAME_PST'] ?></td>
                    <td><?php echo $Data[$i]['NAME_DEP'] ?></td>
                    <td><?php echo $Data[$i]['NAME_PERM'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Bar Menu -->
    <!-- Button Cansal & Aaccept -->
    <div class="container">
        <div class="button d-flex justify-content-center align-items-center mt-5" id="rit">
            <a href="http://203.188.54.9/~u6411800010/view/Schedule_an_interview_date/detail_interview.php">
                <button type="button" class="btn  btn-danger" style="width:150px;">ยกเลิก</button>
            </a>
            <button onclick="clickalert()" type="button" class="btn  btn-primary ms-4"
                style="width:150px;">ยืนยัน</button>
        </div>
    </div>

    <script>
    var Form = document.createElement("form");
    Form.setAttribute("method", "POST");
    Form.setAttribute("Action", "");
    Form.setAttribute("id", "FormT");
    $('body').append(Form);
    $('#FormT').hide();


    function clickalert() {


        var dateChose = [];
        for (let i = 0; i < $('#DateTable').children('input').length; i++) {
            if ($('#dateC_' + i).val()) {
                dateChose.push($('#dateC_' + i).val());
            } else {
                continue;
            }
        }
        //check is empty
        if (dateChose.length < 1) {
            swal({
                title: "กรอกวันที่",
                text: "กรุณากรอก วันที่ ให้ครบถ้วน",
                icon: "warning",
                button: "ตกลง",
                dangerMode: true,
            });
        } else {
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
                    swalWithBootstrapButtons.fire(
                        'ยืนยันสำเร็จ!',
                        '',
                        'success'
                    ).then(
                        () => {
                            for (let i = 0; i < $('tbody')[0]['children'].length; i++) {
                                $('#FormT').append($('tbody')[0]['children'][i]['cells'][0]['children'][0]);
                            }
                            var i = 0;
                            var input1 = document.createElement('input');
                            input1.setAttribute("name", "KEY");
                            input1.setAttribute("value", <?php echo "'".$_GET['KEY_INFO']."'" ?>);
                            $('#FormT').append(input1);
                            var input2 = document.createElement('input');
                            input2.setAttribute("name", "_method");
                            input2.setAttribute("value", "Send_Day");
                            $('#FormT').append(input2);
                            dateChose.forEach((e) => {
                                var input = document.createElement('input');
                                input.setAttribute("name", i);
                                input.setAttribute("value", e);
                                $('#FormT').append(input);
                                i++;
                            })
                            Form.submit();
                        }
                    )
                }
            })
        }
    }
    console.log($('#FormT')[0]['children']);
    </script>

</body>

</html>