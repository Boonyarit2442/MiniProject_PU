<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deep Info</title>
    <link rel="stylesheet" href="ShowGrap.css">
</head>

<body>
    <?php require_once('../../layout/_layout.php'); ?>
    <?php require_once('../../controler/ShowGrapController.php');?>
    <script>
        var test = [];
    </script>
    <div class="container mt-3" style="background-color: #D6EAF8;">
        <div class="d-flex py-3 w-75">
            <div class="">
                <div class="box1 " style="padding: 10px;">
                    <div class="text-center fs-3">จำนวนประกาศ</div>
                    <div class="text-center fs-1 mt-3"><?php echo $Num_Rec[0]['NUM'] ?></div>
                </div>
                <div class="box1 mt-4" style="padding: 10px;">
                    <div class="text-center fs-3">จำนวนผู้สมัคร</div>
                    <div class="text-center fs-1 mt-3"><?php echo $Num_NEMP[0]['NUM'] ?></div>
                </div>
            </div>
            <div class=" m-2 boxOnePerSen">
                <div>
                    <div class="text-center">เปอร์เซ็นผู้สมัคร</div>
                    <canvas id="PaiCheat_depPersen"></canvas>
                </div>
            </div>
            <div class="m-2 boxOnePerSen" style="width:30vw; height:100%;">
                <div>
                    <div class="text-center" id="Div_bar_PosCount">จำนวนผู้สมัคร</div>
                    <canvas id="Bar_Depcount"></canvas>
                </div>
            </div>

        </div>
        <div class="d-flex boxOnePerSen ">
            <div class="mt-2">เลือกแผนก</div>
            <select class="ms-4 form-select" name="Sclect_Dep" id="Sclect_Dep"
                style="width: 200px; border-radius: 23px;" onchange="select_Pst(this)">
                <option value="">Select Dep</option>
                <?php for($i = 0 ;$i<count($Dep);$i++){?>
                <option value=<?php echo $Dep[$i]['ID_DEP'] ?>><?php echo $Dep[$i]['NAME_DEP'] ?></option>
                <?php } ?>
            </select>
            <script>

            </script>
            <select class="ms-4 form-select" style="width: 200px; border-radius: 23px;" name="Sclect_PST"
                id="Sclect_PST" onchange="Get_FeatOfPos(this)">
                <option>Select Pst</option>
            </select>
        </div>
        <div class="d-flex">
            <div>
                <div class="table-responsive boxOnePerSen" style="width: 39vw;">
                    <div class="text-center">ความสามารถ</div>
                    <canvas id="H_Bar_feat"></canvas>
                </div>

            </div>
            <div class="">
                <div class="box_long d-flex justify-content-around align-items-center bg-info text-light"
                    style="padding: 10px;">
                    <span class="fs-3">Avg Salary Req</span>
                    <span class="fs-1 " id="ASAL"></span>
                </div>
                <div class="d-flex">
                    <div class="box_even text-center" style="padding: 2px;">
                        <div class="fs-3">Min</div>
                        <div class="fs-2" id="MINSAL"></div>
                    </div>
                    <div class="box_even text-center " style="padding: 2px;">
                        <div class="fs-3">Max</div>
                        <div class="fs-2 " id="MAXSAL"></div>
                    </div>
                </div>
                <div class="box_long d-flex justify-content-around align-items-center bg-warning text-light"
                    style="padding: 10px;">
                    <span class="fs-3">Avg Age Req</span>
                    <span class="fs-1" id="AAGE"></span>
                </div>
                <div class="d-flex">
                    <div class="box_even text-center " style="padding: 2px;">
                        <div class="fs-3">Min</div>
                        <div class="fs-2" id="MINAGE"></div>
                    </div>
                    <div class="box_even text-center " style="padding: 2px;">
                        <div class="fs-3">Max</div>
                        <div class="fs-2" id="MAXAGE"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function select_Pst(self) {
        $.ajax({
            type: "POST",
            url: "http://203.188.54.9/~u6411800010/controler/ShowG_ajax.php",
            data: {
                "value": $('#Sclect_Dep').val(),
                "_method": 'Dep'
            },
            success: function(response) {
                $('#Sclect_PST').empty();
                $('#Sclect_PST').append(response);
            }
        });
    }

    function Get_FeatOfPos(self) {
        $.ajax({
            type: "Post",
            url: "http://203.188.54.9/~u6411800010/controler/ShowG_ajax.php",
            data: {
                "_method": "FEAT",
                "KYE": self.value
            },
            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                H_Bar_feat.data['labels']=[];
                H_Bar_feat.data['datasets'][0].data=[];
                data[0].forEach((item, index) => {
                    H_Bar_feat.data['labels'].push(item['DETEL']);
                    H_Bar_feat.data['datasets'][0].data.push(item['COUNT(*)']);
                });
                H_Bar_feat.update();
                console.log(data[1][0]);
                $('#ASAL')[0].innerHTML = data[1][0]['AVGSAL'];
                $('#AAGE')[0].innerHTML = data[1][0]['AVGAGE'];
                $('#MINSAL')[0].innerHTML = data[1][0]['MINSAL'];
                $('#MAXSAL')[0].innerHTML = data[1][0]['MAX_SAL'];
                $('#MAXAGE')[0].innerHTML = data[1][0]['MAXAGE'];
                $('#MINAGE')[0].innerHTML = data[1][0]['MINAGE'];
            }
        });
    }
    var H_Bar_feat = new Chart($('#H_Bar_feat'), {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Easy as',
                data: [],
            }],
        },
        options: {
            indexAxis: 'y', // <-- here
            responsive: true
        }
    });

    new Chart($('#PaiCheat_depPersen'), {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($Pai[0]); ?>,
            datasets: [{
                label: 'My First Dataset',
                data: <?php echo json_encode($Pai[1]); ?>,
                hoverOffset: 4
            }]
        },
    });
    new Chart($('#Bar_Depcount'), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($Pai[0]); ?>,
            datasets: [{
                label: '# of Votes',
                data: <?php echo json_encode($Pai[0]); ?>,
                borderWidth: 1
            }]
        },

    });
    new Chart($('#Bar_Depcount_EMP'), {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange', 'Red', 'Blue', 'Yellow', 'Green',
                'Purple', 'Orange'
            ],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },

    });
    </script>
</body>

</html>