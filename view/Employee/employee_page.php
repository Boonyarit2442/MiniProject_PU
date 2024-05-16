<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>

    <!-- Link CSS-->
    <link rel="stylesheet" href="styles_emp_1.css">

    <!-- Link Sweetalert2" -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php 
    require_once('../../layout/_layout.php');
    require_once('../../controler/employeeController.php');
    //require_once('../../controler/permission/Permis.php');
    //empPermis($conn);
    ?>

    <!-- ตำแหน่ง และ serth -->
    <div class="container ">
        <div class="row">
            <div class="col col-7 ">
                <h2 class=" mt-2 mb-2">พนักงานบริษัท</h2>
            </div>
            <div class="col ps-0 pe-0"></div>
            <div class="col ps-0 ">
                <a class="btn btn-warning mt-2" href="registration_emp.php" role="button">+ เพิ่มพนักงาน</a>
            </div>
        </div>
        <div class="container ">
            <div class="row align-items-end">
                <div class="col ps-0 pe-5 col-7">
                    <label></label>
                    <form class="d-flex"></form>
                </div>
                <div class="col ps-0">
                    <label class="fw-bold">แผนก</label>
                    <div class="dropdown-depart" >
                        <select name="DEPNO" id="DEPNO" onchange="UPPOS(this)" style="width:150px;height:40px;text-align: center;">
                            <option value="all" >ทั้งหมด</option>
                            <?php for($i=0;$i < $Dep[$i] ;$i++){ ?>
                                <option value="<?=$Dep[$i]['ID_DEP']?>"><?=$Dep[$i]['NAME_DEP']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col ps-0 ">
                    <label class="fw-bold">ตำแหน่ง</label>
                    <div class="dropdown-position" >
                        <select name="PSTNO" id="PSTNO" style="width:150px;height:40px;text-align: center;">
                            <option value="all">ทั้งหมด</option>
                            <?php for($i=0;$i < $Pst[$i] ;$i++){ ?>
                                <option value="<?=$Pst[$i]['ID_PST']?>"><?=$Pst[$i]['NAME_PST']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col ps-0 ">
                    <button class="Filter_Button" onclick="filter_Table()" style="background-color: #4CAF50;border: none;color: white;border-radius: 0.25rem;width: 100px;height: 40px;"> Filter </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter -->
    <script>
        function filter_Table(){
            var Dep_Value = document.getElementById('DEPNO');
            var Pst_Value = document.getElementById('PSTNO');
            console.log( Dep_Value.value + " & " + Pst_Value.value);

            var data_all = <?php echo json_encode($Data); ?>;

            var showsdata = document.getElementById("showsdata");
            var columns_data = ['ID_EMP','NAME','EMAIL','NAME_DEP','NAME_PST'];

            showsdata.innerHTML = null;
            
            for(let i=0;i < data_all.length; i++){
                if(Dep_Value.value =="all" && Pst_Value.value =="all"){
                    for(let i=0; i < data_all.length; i++){
                        var tr = document.createElement("tr");

                        for(let k=0; k < columns_data.length;k++){
                            var td = document.createElement("td");
                            if(columns_data[k]=='NAME'){
                                td.innerHTML = data_all[i][columns_data[k]]+" "+data_all[i]['L_NAME'];
                                tr.appendChild(td);
                            }else{
                                td.innerHTML = data_all[i][columns_data[k]];
                                tr.appendChild(td);
                            }
                            
                        }
                        // Valiable
                        var td = document.createElement("td");
                        var button_col_1 = document.createElement("button");
                        var button_col_2 = document.createElement("button");
                        var image_col_1 = document.createElement("img");
                        var image_col_2 = document.createElement("img");
                        
                        
                        // Button *Add Attribute"onclick()"
                        button_col_1.setAttribute("onclick","editAlert('"+data_all[i][columns_data[0]]+"')")
                        button_col_1.style = "border : 0; padding: 0;";
                        button_col_2.setAttribute("onclick","deleteAlert('"+data_all[i][columns_data[0]]+"')")
                        button_col_2.style = "border : 0; padding: 0;";

                        // Add Image
                        image_col_1.width ="22";
                        image_col_1.height ="22";
                        image_col_1.src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
                        button_col_1.appendChild(image_col_1);
                        image_col_2.width ="22";
                        image_col_2.height ="22";
                        image_col_2.src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
                        button_col_2.appendChild(image_col_2);

                        // Fill Table
                        td.appendChild(button_col_1);
                        td.appendChild(button_col_2);
                        tr.appendChild(td);
                        showsdata.appendChild(tr);
                        
                    }
                    break;
                }
                else if(data_all[i]['ID_DEP'] == Dep_Value.value && data_all[i]['ID_PST']==Pst_Value.value){
                    for(let i=0; i < data_all.length; i++){

                        var tr = document.createElement("tr");                        

                        // Fillter SQL
                        if(data_all[i]['ID_DEP'] == Dep_Value.value && data_all[i]['ID_PST']==Pst_Value.value){
                            for(let k=0;k< columns_data.length;k++){
                                var td = document.createElement("td");
                                if(columns_data[k]=='NAME'){
                                    td.innerHTML = data_all[i][columns_data[k]]+" "+data_all[i]['L_NAME'];
                                    tr.appendChild(td);
                                }else{
                                    td.innerHTML = data_all[i][columns_data[k]];
                                    tr.appendChild(td);
                                }
                            }
                            // Valiable
                            var td = document.createElement("td");
                            var button_col_1 = document.createElement("button");
                            var button_col_2 = document.createElement("button");
                            var image_col_1 = document.createElement("img");
                            var image_col_2 = document.createElement("img");
                            
                            
                            // Button *Add Attribute"onclick()"
                            button_col_1.setAttribute("onclick","editAlert('"+data_all[i][columns_data[0]]+"')")
                            button_col_1.style = "border : 0; padding: 0;";
                            button_col_2.setAttribute("onclick","deleteAlert('"+data_all[i][columns_data[0]]+"')")
                            button_col_2.style = "border : 0; padding: 0;";

                            // Add Image
                            image_col_1.width ="22";
                            image_col_1.height ="22";
                            image_col_1.src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
                            button_col_1.appendChild(image_col_1);
                            image_col_2.width ="22";
                            image_col_2.height ="22";
                            image_col_2.src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
                            button_col_2.appendChild(image_col_2);

                            // Fill Table
                            td.appendChild(button_col_1);
                            td.appendChild(button_col_2);
                            tr.appendChild(td);
                            showsdata.appendChild(tr);
                        }
                    }
                }
                else if(data_all[i]['ID_DEP'] == Dep_Value.value && Pst_Value.value == "all"){
                    for(let i=0; i < data_all.length; i++){

                        var tr = document.createElement("tr");                        

                        // Fillter SQL
                        if(data_all[i]['ID_DEP'] == Dep_Value.value ){
                            for(let k=0;k< columns_data.length;k++){
                                var td = document.createElement("td");
                                if(columns_data[k]=='NAME'){
                                    td.innerHTML = data_all[i][columns_data[k]]+" "+data_all[i]['L_NAME'];
                                    tr.appendChild(td);
                                }else{
                                    td.innerHTML = data_all[i][columns_data[k]];
                                    tr.appendChild(td);
                                }
                            }
                            // Valiable
                            var td = document.createElement("td");
                            var button_col_1 = document.createElement("button");
                            var button_col_2 = document.createElement("button");
                            var image_col_1 = document.createElement("img");
                            var image_col_2 = document.createElement("img");
                            
                            
                            // Button *Add Attribute"onclick()"
                            button_col_1.setAttribute("onclick","editAlert('"+data_all[i][columns_data[0]]+"')")
                            button_col_1.style = "border : 0; padding: 0;";
                            button_col_2.setAttribute("onclick","deleteAlert('"+data_all[i][columns_data[0]]+"')")
                            button_col_2.style = "border : 0; padding: 0;";

                            // Add Image
                            image_col_1.width ="22";
                            image_col_1.height ="22";
                            image_col_1.src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
                            button_col_1.appendChild(image_col_1);
                            image_col_2.width ="22";
                            image_col_2.height ="22";
                            image_col_2.src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
                            button_col_2.appendChild(image_col_2);

                            // Fill Table
                            td.appendChild(button_col_1);
                            td.appendChild(button_col_2);
                            tr.appendChild(td);
                            showsdata.appendChild(tr);
                        }
                    }
                    break;
                }
                else if(Dep_Value.value == "all" && data_all[i]['ID_PST']==Pst_Value.value){
                    for(let i=0; i < data_all.length; i++){

                        var tr = document.createElement("tr");                        

                        // Fillter SQL
                        if(data_all[i]['ID_PST'] == Pst_Value.value ){
                            for(let k=0;k< columns_data.length;k++){
                                var td = document.createElement("td");
                                if(columns_data[k]=='NAME'){
                                    td.innerHTML = data_all[i][columns_data[k]]+" "+data_all[i]['L_NAME'];
                                    tr.appendChild(td);
                                }else{
                                    td.innerHTML = data_all[i][columns_data[k]];
                                    tr.appendChild(td);
                                }
                            }
                            // Valiable
                            var td = document.createElement("td");
                            var button_col_1 = document.createElement("button");
                            var button_col_2 = document.createElement("button");
                            var image_col_1 = document.createElement("img");
                            var image_col_2 = document.createElement("img");
                            
                            
                            // Button *Add Attribute"onclick()"
                            button_col_1.setAttribute("onclick","editAlert('"+data_all[i][columns_data[0]]+"')")
                            button_col_1.style = "border : 0; padding: 0;";
                            button_col_2.setAttribute("onclick","deleteAlert('"+data_all[i][columns_data[0]]+"')")
                            button_col_2.style = "border : 0; padding: 0;";

                            // Add Image
                            image_col_1.width ="22";
                            image_col_1.height ="22";
                            image_col_1.src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
                            button_col_1.appendChild(image_col_1);
                            image_col_2.width ="22";
                            image_col_2.height ="22";
                            image_col_2.src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
                            button_col_2.appendChild(image_col_2);

                            // Fill Table
                            td.appendChild(button_col_1);
                            td.appendChild(button_col_2);
                            tr.appendChild(td);
                            showsdata.appendChild(tr);
                        }
                    }
                    break;
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
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">อีเมล-แอดเดรส</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">ตำแหน่ง</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody id="showsdata">
            <?php for ($i=0; $i < count($Data); $i++) { ?>
                    <tr>
                        <td><?=$Data[$i]['ID_EMP']?></td>
                        <td><?=$Data[$i]['NAME']." ".$Data[$i]['L_NAME']?></td>
                        <td><?=$Data[$i]['EMAIL']?></td>
                        <td><?=$Data[$i]['NAME_DEP']?></td>
                        <td><?=$Data[$i]['NAME_PST']?></td>
                        <td>
                            <button onclick="editAlert('<?=$Data[$i]['ID_EMP']?>')"  style="border : 0; padding: 0;"> 
                                <img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22" height="22">
                            </button>
                            <button onclick="deleteAlert('<?=$Data[$i]['ID_EMP']?>')"  style="border : 0; padding: 0;"><img src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22" height="22"></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function UPPOS(e) {
            var info = <?php echo json_encode($Pst) ?>;
            var pos = document.getElementById('PSTNO');
            pos.innerHTML = null;
            for (let i = 0; i < info.length; i++) {
                if(i<1){
                    var op = document.createElement('option');
                    op.innerHTML = "ทั้งหมด";
                    op.value = "all";
                    pos.appendChild(op);
                }
                if (e.value == info[i]['P_DEPNO']) {
                    var op = document.createElement('option');  
                    op.innerHTML = info[i]['NAME_PST'];
                    op.value = info[i]['ID_PST'];
                    pos.appendChild(op);
                }else if(e.value == "all") {
                    pos.innerHTML = null;
                    var op = document.createElement('option');  
                    op.innerHTML = "ทั้งหมด";
                    op.className = "row-pst";
                    op.value = "all";
                    pos.appendChild(op);
                }
                /*if(e.value == "all"){
                    for(let k=0;k<info.length;k++){
                        var op = document.createElement('option');  
                        op.innerHTML = info[k]['NAME_PST'];
                        op.value = info[k]['ID_PST'];
                        pos.appendChild(op);
                    }
                }*/
            }
        }

        function deleteAlert(employeeId){      
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
                deleteEmp(employeeId);
              } 
            });
        }

        function deleteEmp(employeeId){
            const formData = new FormData();
                formData.append('_method', 'DELETE');
                formData.append('KYE', employeeId);
                fetch('../../controler/employeeController.php', {
                    method: 'POST',
                    body: formData,   
                }).then(response=>{
                    window.location.reload();
                })
        }
    
        function editAlert(employeeId){      
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
                    window.location.href = 'edit_registration_emp.php?id='+employeeId;
                  } 
            });
        }
    </script>

</body>

</html>