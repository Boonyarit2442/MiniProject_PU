<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    .form-select {
        background-color: #007bff;
        color: #fff;
    }

    #Delete {
        background-color: red;
        color: #fff;
    }
    </style>
</head>

<body>

    <?php
    require_once("../../layout/_layout.php");
    require_once('../../controler/DATA_NEW_EMP.php');
    ?>

    <div class="container mt-5">
        <h1 style="font-size: 30px">
            <p style="color: blue">ข้อมูลผู้สมัคร</p>
        </h1>
        <div class="d-flex justify-content-end">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <!-- Filter -->
                    <label class="mb-1">คุณสมบัติ</label>
                    <select class="form-select" id="Feat" style="text-align: center;">
                        <option value="all" selected>ทั้งหมด</option>
                        <?php for($i=0;$i < $Base_Feat[$i] ;$i++){ ?>
                            <option value="<?=$Base_Feat[$i]['ID_FEAT']?>"><?=$Base_Feat[$i]['NAME_FEAT']?></option>
                        <?php }?>
                    </select>
                </div>
                <button type="button" onclick="filter_Table()" class="btn btn-success mt-4 me-3">Filter</button>

                <!--div class="me-3">
                    <label class="mb-1"></label>
                    <select class="form-select" id="sel_search" onchange="search(this.value)">
                        <option value="" selected disabled>ชื่อ</option>
                        <option value="student_surname">ตำแหน่ง</option>
                        <option value="student_department">แผนก</option>
                    </select>
                </div>
                <div class="d-flex align-items-center">
                    <form class="w-500 me-3" role="search" onsubmit="return false;">
                        <label class="mb-1"></label>
                        <div class="d-flex ">
                            <input style="" type="text" id="txt_search" class="form-control"
                                placeholder="ค้นหาผู้สมัคร...">
                        </div>
                    </form>
                    <button onclick="search()" class="btn btn-success mt-4">search</button>
                </div-->
            </div>
        </div>
        <!-- Table -->
        <div class="container mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ชื่อ-นามสกุล</th>
                        <th scope="col">ประกาศที่สมัคร</th>
                        <th scope="col">เงินเดือนที่ร้องขอ</th>
                        <th scope="col">ตำแหน่งที่สมัคร</th>
                        <th scope="col">คุณสมบัติ</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">ข้อมูล / ลบ</th>
                    </tr>
                </thead>
                <tbody id="showsdata">
                    <?php for ($i = 0; $i < count($Data); $i++) { ?>
                    <tr>
                        <td>
                            <?= $Data[$i]['ID_NEMP'] ?>
                        </td>
                        <td>
                            <?= $Data[$i]['NAME_NEMP'] . " " . $Data[$i]['LNAME_NEMP'] ?>
                        </td>
                        <td>
                            <?= $Data[$i]['ID_REC'] ?>
                        </td>
                        <td>
                            <?= $Data[$i]['SALREQ'] ?>
                        </td>
                        <td>
                            <?= $Data[$i]['NAME_PST'] ?>
                        </td>
                        <td>
                            <?php
                                $NEMP_Name_Feat = getNEMP_Name_Feat($conn,$Data[$i]['ID_NEMP']);
                                $Temp_Feat = "";
                                if(empty($NEMP_Name_Feat[0]['ID_NEMP'])){
                                    echo " ";
                                }elseif($Data[$i]['ID_NEMP'] == $NEMP_Name_Feat[0]['ID_NEMP']){
                                    for($j=0 ; $j < count($NEMP_Name_Feat);$j++){
                                        if($j>0){$Temp_Feat = $Temp_Feat ." , ". $NEMP_Name_Feat[$j]['NAME_FEAT'];}
                                        else{$Temp_Feat = $Temp_Feat . $NEMP_Name_Feat[$j]['NAME_FEAT'];}
                                    }
                                    echo $Temp_Feat;
                                }
                            ?>

                        </td>
                        <td>
                           <?php switch ($Data[$i]['STATUS']) {
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
                        <td>
                            <form action="detail_new_emp.php" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $Data[$i]['ID_NEMP']; ?>">
                                <button type="submit" name="Detail" value="submit" style="border: 0; padding: 0;">
                                    <img src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png" width="22"
                                        height="22" alt="Detail Icon" />
                                </button>
                            </form>
                            <button onclick="deleteAlert('<?= $Data[$i]['ID_NEMP'] ?>')"
                                style="border: 0; padding: 0;">
                                <img src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png" width="22"
                                    height="22" alt="Delete Icon">
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        function test(){
            var i = "Hello World";
            var d = "<?php echo "dddd"?>";
            $.ajax({
                    type:"GET",
                    dataType:"json",
                    url:"pannic.php?order="+d
            });
            //console.log("<?php //if(isset($_GET['order']))echo json_encode($_GET['order'])?>");
        }
        function filter_Table(){
            var Feat_Filter = document.getElementById('Feat');
            //console.log(Feat_Value.value+"");

            var data_feature_all = <?php echo json_encode($Base_Feat); ?>;
            var data_nemp_all = <?php echo json_encode($Data); ?>;
            var data_feat_nemp_all = <?php echo json_encode($Data_Feat_EMP);?>;

            var showsdata = document.getElementById("showsdata");
            var columns_data = ['ID_NEMP','NAME_NEMP','ID_REC','SALREQ','NAME_PST','NAME_FEAT','STATUS'];

            showsdata.innerHTML = null;

            //for(let i=0 ; i < data_nemp_all.length ; i++){
                if(Feat_Filter.value == 'all'){
                    
                    for(let j=0;j<data_nemp_all.length;j++){
                        var tr = document.createElement("tr");

                        for (let k = 0; k < columns_data.length; k++) {
                            var td = document.createElement("td");
                            
                            var count_num1 = 0;
                            var count_num2 = 0;
                            var temp_str = "";
                            if(columns_data[k]=='NAME_FEAT'){
                                var checkInsert = true;
                                for(let d=0; d<data_feat_nemp_all.length;d++){
                                    var br = document.createElement("br");
                                    if(data_nemp_all[j]['ID_NEMP']== data_feat_nemp_all[d]['ID_NEMP']){
                                        checkInsert = false;
                                        if(count_num2 > count_num1){
                                            temp_str = temp_str +  " , " + data_feat_nemp_all[d]['NAME_FEAT'];
                                            
                                        }else{
                                            temp_str = temp_str + data_feat_nemp_all[d]['NAME_FEAT'];
                                        }
                                        count_num2++;
                                        td.innerHTML = temp_str;
                                    }
                                }
                                if(checkInsert){
                                    td.innerHTML = " ";
                                    tr.appendChild(td);
                                }else{
                                    tr.appendChild(td);
                                }

                                continue;
                            }

                            if(columns_data[k]=='NAME_NEMP'){
                                td.innerHTML = data_nemp_all[j][columns_data[k]]+" "+data_nemp_all[j]['LNAME_NEMP'];
                                tr.appendChild(td);
                                continue;
                            }

                            if(columns_data[k] == 'STATUS'){
                                if(data_nemp_all[j][columns_data[k]] == 1){
                                    td.innerHTML = "ผ่าน";
                                    tr.appendChild(td);
                                    continue;
                                }else if(data_nemp_all[j][columns_data[k]] == 0){
                                    td.innerHTML = "ไม่ผ่าน";
                                    tr.appendChild(td);
                                    continue;
                                }else{
                                    td.innerHTML = "รอคัดเลือก";
                                    tr.appendChild(td);
                                    continue;
                                }
                            }

                            td.innerHTML = data_nemp_all[j][columns_data[k]];
                            tr.appendChild(td);
                        }
                        // Valiable
                        var td = document.createElement("td");
                        var form = document.createElement("form");
                        var input_vali = document.createElement("input");

                        var button_col_1 = document.createElement("button");
                        var button_col_2 = document.createElement("button");
                        var image_col_1 = document.createElement("img");
                        var image_col_2 = document.createElement("img");
                        
                        // Form setAttribute
                        form.setAttribute("action","detail_new_emp.php");
                        form.setAttribute("method","post");
                        form.setAttribute("style","display: inline;");
                        
                        // input setAttribute
                        input_vali.setAttribute("type","hidden");
                        input_vali.setAttribute("name","id");
                        input_vali.setAttribute("value",""+data_nemp_all[j][columns_data[0]]+"");

                        // Button 
                        button_col_1.setAttribute("type","submit");
                        button_col_1.setAttribute("name","Detail");
                        button_col_1.setAttribute("value","submit");
                        button_col_1.setAttribute("style","border: 0; padding: 0;");
                        // Button2 *Add Attribute"onclick()"
                        button_col_2.setAttribute("onclick","deleteAlert('"+data_nemp_all[j][columns_data[0]]+"')")
                        button_col_2.style = "border : 0; padding: 0;";

                        // Image setAttribute
                        // image1
                        image_col_1.src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
                        image_col_1.width ="22";
                        image_col_1.height ="22";
                        image_col_1.alt="Detail Icon";
                        // image2
                        image_col_2.src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
                        image_col_2.width ="22";
                        image_col_2.height ="22";
                        image_col_1.alt="Delete Icon";

                        // Merger
                        form.appendChild(input_vali);
                        button_col_1.appendChild(image_col_1);
                        form.appendChild(button_col_1);
                        td.appendChild(form);

                        button_col_2.appendChild(image_col_2);
                        td.appendChild(button_col_2);

                        // Fill Table
                        tr.appendChild(td);
                        showsdata.appendChild(tr);
                    }
                    

                }else{
                    /*for(let i=0 < i < data_feature_all.length;i++){
                        if(data_feature_all[i]['ID_FEAT'] == Feat_Filter.value){
                            for(let j=0 ; j<data_nemp_all.length ; j++){

                            }
                        }
                    }*/
                    
                    for(let i=0 ; i < data_nemp_all.length;i++){
                        for(let j=0 ; j<data_feat_nemp_all.length ; j++){
                            if(data_nemp_all[i]['ID_NEMP'] == data_feat_nemp_all[j]['ID_NEMP'] && data_feat_nemp_all[j]['ID_FEAT'] == Feat_Filter.value){
                                //----------------------------
                                var tr = document.createElement("tr");

                                for (let k = 0; k < columns_data.length; k++) {
                                    var td = document.createElement("td");

                                    var count_num1 = 0;
                                    var count_num2 = 0;
                                    var temp_str = "";
                                    if(columns_data[k]=='NAME_FEAT'){
                                        var checkInsert = true;
                                        for(let d=0; d<data_feat_nemp_all.length;d++){
                                            var br = document.createElement("br");
                                            if(data_nemp_all[i]['ID_NEMP']== data_feat_nemp_all[d]['ID_NEMP']){
                                                checkInsert = false;
                                                if(count_num2 > count_num1){
                                                    temp_str = temp_str +  " , " + data_feat_nemp_all[d]['NAME_FEAT'];

                                                }else{
                                                    temp_str = temp_str + data_feat_nemp_all[d]['NAME_FEAT'];
                                                }
                                                count_num2++;
                                                td.innerHTML = temp_str;
                                            }
                                        }
                                        if(checkInsert){
                                            td.innerHTML = " ";
                                            tr.appendChild(td);
                                        }else{
                                            tr.appendChild(td);
                                        }
                                    
                                        continue;
                                    }
                                
                                    if(columns_data[k]=='NAME_NEMP'){
                                        td.innerHTML = data_nemp_all[i][columns_data[k]]+" "+data_nemp_all[i]['LNAME_NEMP'];
                                        tr.appendChild(td);
                                        continue;
                                    }
                                
                                    if(columns_data[k] == 'STATUS'){
                                        if(data_nemp_all[i][columns_data[k]] == 1){
                                            td.innerHTML = "ผ่าน";
                                            tr.appendChild(td);
                                            continue;
                                        }else if(data_nemp_all[i][columns_data[k]] == 0){
                                            td.innerHTML = "ไม่ผ่าน";
                                            tr.appendChild(td);
                                            continue;
                                        }else{
                                            td.innerHTML = "รอคัดเลือก";
                                            tr.appendChild(td);
                                            continue;
                                        }
                                    }
                                
                                    td.innerHTML = data_nemp_all[i][columns_data[k]];
                                    tr.appendChild(td);
                                }
                                // Valiable
                                var td = document.createElement("td");
                                var form = document.createElement("form");
                                var input_vali = document.createElement("input");
                            
                                var button_col_1 = document.createElement("button");
                                var button_col_2 = document.createElement("button");
                                var image_col_1 = document.createElement("img");
                                var image_col_2 = document.createElement("img");

                                // Form setAttribute
                                form.setAttribute("action","detail_new_emp.php");
                                form.setAttribute("method","post");
                                form.setAttribute("style","display: inline;");

                                // input setAttribute
                                input_vali.setAttribute("type","hidden");
                                input_vali.setAttribute("name","id");
                                input_vali.setAttribute("value",""+data_nemp_all[i][columns_data[0]]+"");
                            
                                // Button 
                                button_col_1.setAttribute("type","submit");
                                button_col_1.setAttribute("name","Detail");
                                button_col_1.setAttribute("value","submit");
                                button_col_1.setAttribute("style","border: 0; padding: 0;");
                                // Button2 *Add Attribute"onclick()"
                                button_col_2.setAttribute("onclick","deleteAlert('"+data_nemp_all[i][columns_data[0]]+"')")
                                button_col_2.style = "border : 0; padding: 0;";
                            
                                // Image setAttribute
                                // image1
                                image_col_1.src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png";
                                image_col_1.width ="22";
                                image_col_1.height ="22";
                                image_col_1.alt="Detail Icon";
                                // image2
                                image_col_2.src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png";
                                image_col_2.width ="22";
                                image_col_2.height ="22";
                                image_col_1.alt="Delete Icon";
                            
                                // Merger
                                form.appendChild(input_vali);
                                button_col_1.appendChild(image_col_1);
                                form.appendChild(button_col_1);
                                td.appendChild(form);
                            
                                button_col_2.appendChild(image_col_2);
                                td.appendChild(button_col_2);
                            
                                // Fill Table
                                tr.appendChild(td);
                                showsdata.appendChild(tr);
                                //----------------------------
                            }
                        }
                    }
                    
                    //showsdata.innerHTML = null;
                }
                //break;
            //}

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    function deleteAlert(employeeId) {
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

    function deleteEmp(employeeId) {

        const formData = new FormData();
        formData.append('_method', 'DELETE');
        formData.append('KYE', employeeId);
        fetch('../../controler/DATA_NEW_EMP.php', {
            method: 'POST',
            body: formData,
        }).then(response => {
            Swal.fire('ลบข้อมูลสำเร็จ!', '', 'success');

            // รอ 2 วินาที (2000 มิลลิวินาที) ก่อนที่จะทำงานใน setTimeout
            setTimeout(() => {
                window.location = 'pannic.php';
            }, 1500);
        });
    }

    function search() {
        const searchTerm = document.getElementById('txt_search').value.toLowerCase();
        const searchBy = document.getElementById('sel_search').value;
        const rows = document.getElementById('info').getElementsByTagName('tr');

        for (let row of rows) {
            const name = row.cells[1].textContent.toLowerCase();
            const position = row.cells[4].textContent.toLowerCase();
            const department = row.cells[3].textContent.toLowerCase();

            let dataToSearch = '';
            if (searchBy === 'student_surname') {
                dataToSearch = position;
            } else if (searchBy === 'student_department') {
                dataToSearch = department;
            } else {
                dataToSearch = name;
            }

            if (dataToSearch.startsWith(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }
    </script>

</body>

</html>