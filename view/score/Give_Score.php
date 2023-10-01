<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Give_Score</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet" />
  <!--<script src="bar.js"></script>-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    body {
      font-family: "Kanit", sans-serif;
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-between mt-5">
    <h2>ให้คะแนนสัมภาษณ์</h2>
    <span>ชื่อ-นามสกุล</span>
  </div>
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
      <button type="reset" class="btn btn-danger me-5">ยกเลิก</button>
      <script>
        const test = () => {
          swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
            .then((willDelete) => {
              if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success",
                }).then(() => {
                  var a = document.createElement("a");
                  a.href = 'Select_dep.html';
                  a.click();
                });
              } else {
                swal("Your imaginary file is safe!");
              }
            })
        }
      </script>
      <button type="button" class="btn btn-success" onclick="test()">ยืนยัน</button>
      </form>
    </div>
  </div>

</body>

</html>