<!DOCTYPE html>
<html lang="en">

<head>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        .form-select {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
    <header class="p-3 bg-Primary text-light">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-light text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              
            </ul>
    
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
              <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
    
            <div class="text-end">
                <button type="button" class="btn btn-warning">6411130048</button>
              <button type="button" class="btn btn-warning">admin</button>
            </div>           
          </div>
        </div>
      </header>
      
      <body onload="loadDoc()"  onload="search()" class="">
      <div class="container">
        
            <h1 style="font-size:30px"><p style="color:blue">ข้อมูลผู้สมัคร</p></h1>

                  <div class="d-flex align-items-center">
                    <form class="w-500 me-3" role="search">
                      <input style="margin-bottom:10px"type="text" id="txt_search"class="form-control"  placeholder="ค้นหาผู้สมัคร...">
                    </form>
                    <div class="d-flex align-items-center">
                        <form class="w-500 me-3" role="search">
                        <input style="margin-bottom:10px" type="text" class="form-control" placeholder="ค้นหาคุณสมบัติผู้สมัคร...">
                         
                        </form>
                        </div>
                    
                    </div> 
        <script>
          function search(){
            $.ajax({
              type:"post",
              dataType:"json",
              url:"http://203.188.54.9/~u6411800010/controler/DATA_NEW_EMP.php",
              data:{
                keyword: $('#txt_search').val(),
                type:$("#sel_search").val()
              },success:function(response){
                console.log("good",response)
              },error:function(err){
                console.log("bad",err)
              }
            })
          }
          function loadDoc() {
        let xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let data = JSON.parse(this.responseText);
                console.log(data);
                for(i=0;i<data.length;i++){
                  document.getElementById('info').innerHTML +=`
                  <tr>
                    <th>${i+1}</th>
                    <td>${data[i].NAME_NEMP} ${data[i].LNAME_NEMP}</td>
                    <td>${data[i].EMAIL}</td>
                    <td>${data[i].ID_POS}</td>
                    <td>
                    <a href="#">
                        <img
                        src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                        width="22"
                        height="22"
                      />
                        </a></td>
                  </tr>`;
                }
            }
        }
        xhttp.open("GET", 'http://203.188.54.9/~u6411800010/controler/DATA_NEW_EMP.php', true);
        xhttp.send();
    }
        </script>
        <main>
        <div class="d-flex align-items-center">
    <div class="me-3">
        <select class="form-select" id="sel_search">
            <option value="" selected disabled> แผนกที่สมัคร </option>
            <option value="name" >ชื่อ</option>
            <option value="student_surname" >นามสกุล</option>
            <option value="student_branch" >สาขา</option>
        </select>
    </div>
    <div class="me-3">
        <select class="form-select" name="select" >
        <option value="" selected disabled> แผนกที่สมัคร </option>
            <option value="name" >ผ่าน</option>
            <option value="student_surname" >ไม่ผ่าน</option>
            <option value="student_branch" >รอ</option>
        </select>
    </div>
    <div class="me-3">
        <select class="form-select" name="select" >
        <option value="name" >ผ่าน</option>
            <option value="student_surname" >ไม่ผ่าน</option>
            <option value="student_branch" >รอ</option>
        </select>
    </div>
    <div>
        <button onload="search()" type="submit" name="submit" class="btn btn-success">search</button>
    </div>
</div>


            
        </div>

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">อีเมล-แอดเดรส</th>
                        <th scope="col">แผนกที่สมัคร</th>
                        <th scope="col">ตำแหน่งที่สมัคร</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">บุ๊คกิ้ง</th>
                    </tr>
                </thead>
                <tbody id="info">
                    <!-- ข้อมูลผู้สมัครจะถูกแสดงที่นี่ -->
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>
