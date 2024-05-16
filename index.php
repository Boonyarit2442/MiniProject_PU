<?php
$server = "203.188.54.7";
$db_username = "inno094";
$db_password = "P06D245";
$sid = "database";
$port = 1521;
$Data;
try {
  $conn = new PDO("oci:dbname=203.188.54.7/database;charset=UTF8", $db_username, $db_password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Success";
} catch (PDOException $e) {
  die("Database connection failed: " . $e->getMessage());
}
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
  case 'GET':
    $Data = getAll($conn);
    $Data_NEWMP_2 = getNEMP($conn);
    break;
  case 'POST':
    if ($_POST['_method'] === "ADD") {
      create($conn, $_POST);
    } elseif ($_POST['_method'] === "EDIT") {
      update($conn, $_POST);
      //echo json_encode($_POST);
    } elseif ($_POST['_method'] === "DELETE") {
      delete($conn, $_POST);
    }
    break;
  default:
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Method not allowed."));
}
function getAll($conn)
{
  try {
    $stmt = $conn->prepare("SELECT * FROM RECTUITMENT JOIN REQUIRED_EMP ON REQ_REC = ID_REQ JOIN POSITION ON PST_REQ = ID_PST");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $result;
}

function getNEMP($conn){
  
  try {
    $stmt = $conn->prepare("SELECT * FROM NEW_EMP WHERE STATUS = '2'");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $result;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="view/Findjob/findJob.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&display=swap" rel="stylesheet" />
    <style>
    body {
        font-family: "Kanit", sans-serif;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="#">
                <text-bold class="text-light fw-bold fs-2">Area</text-bold>
                <teext-y class="text-warning fw-bold ms-2">113</teext-y>
            </a>
            <div>
                <a class="me-3 btn btn-warning" href="http://203.188.54.9/~u6411800010">หางาน</a>
                <div class="d-inline">
                    <a class="btn btn-warning"
                        href="http://203.188.54.9/~u6411800010/view/Login/kongwarit.php">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-between mt-5">
        <h1 class="">ตำแหน่งที่รับสมัคร</h1>
    </div>
    <div class="container mt-5">
        <div id="exc" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div>
                        <?php for ($i = 0; $i < count($Data); $i++) {
              if ($Data[$i]['STATUS_REC'] == 'ปิด') {
                continue;
              } ?>
                        <div class="card card-body d-inline-block text-center ms-1 mt-2" style="width: 12vw">
                            <h4 class="card-title">
                                <?php echo $Data[$i]['NAME_PST'] ?>
                            </h4>
                            <p class="card-text" style="width: 100%;height: 200px;">
                                <br>
                                <?php echo "รับจำนวน :" . $Data[$i]['NUM_REQ'] ?><br>
                                <?php echo "เงินเดือน :" . $Data[$i]['SALSTART'] . " - " . $Data[$i]['SLAEND'] ?>
                                <br>
                            </p>
                            <a class="btn btn-danger"
                                href=<?php echo "http://203.188.54.9/~u6411800010/view/Findjob/DetelJob.php?KYE_INFO=".$Data[$i]['ID_REC'] ?>>Detel</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--<button class="carousel-control-prev" type="button" data-bs-target="#exc" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#exc" data-bs-slide="next">
      <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
      </button>-->
        </div>
        <!--<ol class="carousel-indicators mb-5 pb-5">
      <li data-bs-target="#exc" data-bs-slide-to="0" class="bg-dark" aria-current="true" aria-label="First slide"></li>
      <li data-bs-target="#exc" data-bs-slide-to="1" class="bg-dark" aria-label="Second slide"></li>
      <li data-bs-target="#exc" data-bs-slide-to="2" class="bg-dark" aria-label="Third slide"></li>
    </ol>-->
        <div>
          <h1 class="mt-5">ผู้ที่ผ่านการัสมภาษ</h1>
          <div class="container mt-3">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">สถานะ</th>
                    </tr>
                </thead>
                <tbody id="showsdata">
                    <?php for ($i = 0; $i < count($Data_NEWMP_2); $i++) { ?>
                    <tr>
                        
                        <td>
                            <?= $Data_NEWMP_2[$i]['NAME_NEMP'] . " " . $Data_NEWMP_2[$i]['LNAME_NEMP'] ?>
                        </td>
                        <td>
                          <?php switch ($Data_NEWMP_2[$i]['STATUS']) {
                              case '1':
                                  echo 'ผ่านคัดเลือก';
                                  break;
                              case '0':
                                  echo 'ไม่ผ่านคัดเลือก';
                                  break;
                              case '-1':
                                  echo 'รอคัดเลือก';
                                  break;
                              case '2':
                                  echo 'รับเข้าทำงาน';
                                  break;
                              case '3':
                                  echo 'ไม่รับเข้าทำงาน';
                                  break;
                              default:
                                  echo 'ไม่มีสถานะ';
                                  break;
                             } ?> 
                        </td>
                    </tr>
                        
                    <?php  }?>
                </tbody>
            </table>
          </div>  
        </div>
    </div>
</body>

</html>