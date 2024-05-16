<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caranda</title>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>

</head>

<body>

    <head>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [{ // this object will be "parsed" into an Event Object
                    title: 'The Title', // a property!
                    start: '2023-10-01' // a property!  
                }],
            });
            calendar.render();
        });
        </script>
    </head>

    <?php require_once('../../layout/_layout.php'); ?>
    <?php require_once('../../controler/SelectDayCoarandaController.php'); ?>

    <div class="container w-50 mt-2">
        <div id='calendar'></div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <!--Button  -->
        <div class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">เลือกวันที่จะสัมภาษณ์</div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">เลือกวันที่จะสัมภาษณ์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
                <div class="modal-body">
                    <div>
                        <form action="#" method="POST">
                            <input type="submit" name="_method" value="DAY_SELECTED">
                            <script>
                            $('input:submit').hide();

                            function test() {
                                $('input:submit').click();
                            }
                            </script>
                            </script>
                            <input type="hidden" name="ID_EMP" value=<?php echo $_SESSION['ID_EMP'] ?>>
                            <p class="text-center">วันที่กรรมการทานอื่นเลือก</p>
                            <div class="container d-flex justify-content-center">
                                <table class="table text-center w-50 table-bordered" class >
                                    <thead>
                                        <tr>
                                            <th scope="col">DAY</th>
                                            <th scope="col">COUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for($i = 0 ;$i<count($CountDay);$i++){ ?>
                                        <tr>
                                            <td> <?php echo date("d M Y", strtotime($CountDay[$i]['DAY'])); ?></td>
                                            <td> <?php echo $CountDay[$i]['COUNT']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name=<?php echo "DAY_SELECTED" ?>
                                    aria-label="Default select example">
                                    <option selected value="NO">เลือกวันที่</option>
                                    <?php for ($i=0; $i < Count($Day_Chose); $i++) {?>
                                    <option value=<?php echo $Day_Chose[$i]['DAY_CHOOSE']; ?>>
                                        <?php echo date("d M Y", strtotime($Day_Chose[$i]['DAY_CHOOSE'])); ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="test()">ตกลง</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>