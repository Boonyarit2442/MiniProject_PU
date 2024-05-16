<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Give_Score</title>
</head>

<body>
    <?php require_once('../../layout/_layout.php'); ?>
    <?php require_once('../../controler/GiveScore_Controller.php'); ?>

    <div class="container d-flex justify-content-between mt-5">
        <h2>ให้คะแนนสัมภาษณ์</h2>
        <span class="fs-3">
            <?php echo $Data[0]['NAME_NEMP'] . " " . $Data[0]['LNAME_NEMP'] ?>
        </span>
    </div>
    <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-danger container mt-3" role="alert" style="width: 1000px;">
            <?php echo $_GET['error']; ?>
        </div>
    <?php } ?>
    <div class="container-fluid rounded-3 p-3 mt-4" style="width: 1000px; height: 450px; background-color: #cdcdcd">
        <div class="container-fluid rounded-3 my-3 d-flex justify-content-between" style="width: 100%; height: 40px">
            <span class="fs-4">คะแนน</span>
            <div class="d-flex justify-content-between mt-2">
                <span class="ms-5 me-3">1</span>
                <span class="ms-5 me-3">2</span>
                <span class="ms-5 me-3">3</span>
                <span class="ms-5 me-3">4</span>
                <span class="ms-5 me-3">5</span>
                <span class="ms-5 me-3">6</span>
                <span class="ms-5 me-3">7</span>
                <span class="ms-5 me-3">8</span>
                <span class="ms-5 me-3">9</span>
                <span class="ms-5 me-3">10</span>
            </div>
        </div>

        <div class="container-fluid rounded-3 my-3 pt-2 d-flex justify-content-between"
            style="width: 100%; height: 40px; background-color: #fff">
            <span class="">คะแนนด้านเทคนิค :</span>
            <span>
                <form action="#" class="me-2" method="POST">
                    <!--<input type="hidden" name="tecic" value="null">-->
                    <input class="ms-5 me-2" type="radio" name="tecnic" id="tecic" value="1">
                    <input class="ms-5 me-2" type="radio" name="tecnic" id="tecic" value="2">
                    <input class="ms-5 me-2" type="radio" name="tecnic" id="tecic" value="3">
                    <input class="ms-5 me-2" type="radio" name="tecnic" id="tecic" value="4">
                    <input class="ms-5 me-2" type="radio" name="tecnic" id="tecic" value="5">
                    <input class="ms-5 me-2" type="radio" name="tecnic" id="tecic" value="6">
                    <input class="ms-5 me-2" type="radio" name="tecnic" id="tecic" value="7">
                    <input class="ms-5 me-2" type="radio" name="tecnic" id="tecic" value="8">
                    <input class="ms-5 me-2" type="radio" name="tecnic" id="tecic" value="9">
                    <input class="ms-5 me-2" type="radio" name="tecnic" id="tecic" value="10">
            </span>
        </div>
        <div class="container-fluid rounded-3 my-3 pt-2 d-flex justify-content-between"
            style="width: 100%; height: 40px; background-color: #fff">
            <span class="">คะแนนด้านการเรียนรู้ :</span>
            <span>
                <input class="ms-5 me-2" type="radio" name="leaning" id="leaning" value="1">
                <input class="ms-5 me-2" type="radio" name="leaning" id="leaning" value="2">
                <input class="ms-5 me-2" type="radio" name="leaning" id="leaning" value="3">
                <input class="ms-5 me-2" type="radio" name="leaning" id="leaning" value="4">
                <input class="ms-5 me-2" type="radio" name="leaning" id="leaning" value="5">
                <input class="ms-5 me-2" type="radio" name="leaning" id="leaning" value="6">
                <input class="ms-5 me-2" type="radio" name="leaning" id="leaning" value="7">
                <input class="ms-5 me-2" type="radio" name="leaning" id="leaning" value="8">
                <input class="ms-5 me-2" type="radio" name="leaning" id="leaning" value="9">
                <input class="ms-5 me-3" type="radio" name="leaning" id="leaning" value="10">
            </span>
        </div>
        <div class="container-fluid rounded-3 my-3 pt-2 d-flex justify-content-between"
            style="width: 100%; height: 40px; background-color: #fff">
            <span class="">คะแนนความคิดสร้างสรรค์ : </span>
            <span>
                <input class="ms-5 me-2" type="radio" name="create" id="create" value="1">
                <input class="ms-5 me-2" type="radio" name="create" id="create" value="2">
                <input class="ms-5 me-2" type="radio" name="create" id="create" value="3">
                <input class="ms-5 me-2" type="radio" name="create" id="create" value="4">
                <input class="ms-5 me-2" type="radio" name="create" id="create" value="5">
                <input class="ms-5 me-2" type="radio" name="create" id="create" value="6">
                <input class="ms-5 me-2" type="radio" name="create" id="create" value="7">
                <input class="ms-5 me-2" type="radio" name="create" id="create" value="8">
                <input class="ms-5 me-2" type="radio" name="create" id="create" value="9">
                <input class="ms-5 me-3" type="radio" name="create" id="create" value="10">
            </span>
        </div>
        <div class="container-fluid rounded-3 my-3 pt-2 d-flex justify-content-between"
            style="width: 100%; height: 40px; background-color: #fff">
            <span class="">คะแนนมนุษยสัมพันธ์ :</span>
            <span>
                <input class="ms-5 me-2" type="radio" name="HumRela" id="HumRela" value="1">
                <input class="ms-5 me-2" type="radio" name="HumRela" id="HumRela" value="2">
                <input class="ms-5 me-2" type="radio" name="HumRela" id="HumRela" value="3">
                <input class="ms-5 me-2" type="radio" name="HumRela" id="HumRela" value="4">
                <input class="ms-5 me-2" type="radio" name="HumRela" id="HumRela" value="5">
                <input class="ms-5 me-2" type="radio" name="HumRela" id="HumRela" value="6">
                <input class="ms-5 me-2" type="radio" name="HumRela" id="HumRela" value="7">
                <input class="ms-5 me-2" type="radio" name="HumRela" id="HumRela" value="8">
                <input class="ms-5 me-2" type="radio" name="HumRela" id="HumRela" value="9">
                <input class="ms-5 me-3" type="radio" name="HumRela" id="HumRela" value="10">
            </span>
        </div>
        <div class="container-fluid rounded-3 my-3 pt-2 d-flex justify-content-between"
            style="width: 100%; height: 40px; background-color: #fff">
            <span class="">คะแนนการถามตอบ :</span>
            <span>
                <input class="ms-5 me-2" type="radio" name="Ask" id="Ask" value="1">
                <input class="ms-5 me-2" type="radio" name="Ask" id="Ask" value="2">
                <input class="ms-5 me-2" type="radio" name="Ask" id="Ask" value="3">
                <input class="ms-5 me-2" type="radio" name="Ask" id="Ask" value="4">
                <input class="ms-5 me-2" type="radio" name="Ask" id="Ask" value="5">
                <input class="ms-5 me-2" type="radio" name="Ask" id="Ask" value="6">
                <input class="ms-5 me-2" type="radio" name="Ask" id="Ask" value="7">
                <input class="ms-5 me-2" type="radio" name="Ask" id="Ask" value="8">
                <input class="ms-5 me-2" type="radio" name="Ask" id="Ask" value="9">
                <input class="ms-5 me-3" type="radio" name="Ask" id="Ask" value="10">
            </span>
        </div>
        <div class="container d-flex justify-content-evenly">
            <button type="button" class="btn btn-danger " name="_method" value="cancel_button" onclick="ok_cancel1()">ปฏิเสธ</button>
            <script>
                const ok_submit1 = () => {
                    swal({
                        title: "คุณแน่ใจใช่หรือไม่?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal("ส่งคะแนน", {
                                icon: "success",
                            }).then(() => {
                                document.getElementById("ok_submit").click();
                            });
                        } else {}
                    })
                }
                const ok_cancel1 = () => {
                    swal({
                        title: "คุณแน่ใจใช่หรือไม่?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal("ส่งคะแนน", {
                                icon: "success",
                            }).then(() => {
                                document.getElementById("ok_cancel").click(); 
                            });
                        } else {}
                    })
                }
            </script>
            <button type="button" class="btn btn-success" name="_method" value="submit_button" onclick="ok_submit1()">ยอมรับ</button>
            <!--<input type="submit" name="_method" value="submit_button">-->
        </div> 
        <button type="submit" id="ok_submit" name="_method" value="submit_button" style="visibility: hidden;"></button>
        <button type="submit" id="ok_cancel" name="_method" value="cancel_button" style="visibility: hidden;"></button>
    </div>
    </form>
</body>

</html>