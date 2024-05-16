<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>interview</title>
</head>

<body>

    <?php require_once('../../layout/_layout.php'); ?>
    <?php require_once('../../controler/Select_NempControler.php'); ?>
    <div class="container-fluid d-flex justify-content-between mt-5 ms-2">
        <h3 class="text-primary">รายชื่อผู้เข้าสัมภาษณ์</h3>
    </div>
    <div class="container" id="Table_ShowList">
        <div class="container w-75">
            <div class="d-flex justify-content-end mb-3">
                <!--<form action="#" method="POST" class="mt-2">
          <label for="search">ค้นหา</label>
          <input type="search" id="search" name="search" />
          <input type="submit" value="search" namel="_method" />
        </form>-->
            </div>
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ชื่่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">เพศ</th>
                        <th scope="col">ศาสนา</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($Data); $i++) { ?>
                    <tr>
                        <th scope="row">
                            <?php echo $Data[$i]['ID_NEMP'] ?>
                        </th>
                        <td>
                            <?php echo $Data[$i]['NAME_NEMP'] ?>
                        </td>
                        <td>
                            <?php echo $Data[$i]['LNAME_NEMP'] ?>
                        </td>
                        <td>
                            <?php echo $Data[$i]['SEX_NEMP'] ?>
                        </td>
                        <td>
                            <?php echo $Data[$i]['NOTIONALITY_NEMP'] ?>
                        </td>
                        <td>

                            <?php 
                  //เจ้าของ USER ให้คะแนนหรือยัง หรือ ผู้สมัครมีชื่อในระบบหรือไม่
                  if(check_haveMeindatabase($conn,$Data[$i]['ID_NEMP'])){
                    if(check_EMP_ME_AddedScore($conn,$Data[$i]['ID_NEMP'])){
                      echo "คุณให้คะแนนสัมภาษณ์ไปแล้ว";
                    }else{
                    ?> <a href=<?php echo "Give_Score.php?KEY_INFO=".$Data[$i]['ID_NEMP']."&KEY_SEND=".$_GET['KEY_INFO']."&KEY_NEMP=" .$Data[$i]['ID_NEMP']?>><i
                                    class="fa-solid fa-pen-nib"></i></a> <?php 
                    }
                  }
                  else{
                    ?> <a href=<?php echo "Give_Score.php?KEY_INFO=".$Data[$i]['ID_NEMP']."&KEY_SEND=".$_GET['KEY_INFO']."&KEY_NEMP=" .$Data[$i]['ID_NEMP']?>><i
                                    class="fa-solid fa-pen-nib"></i></a> <?php 
                  }?>
                        </td>
                    </tr>
                    <?php  }?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>