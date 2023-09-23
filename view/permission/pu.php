<!DOCTYPE html>
<html>
<head>
   
    <style>
      table {
          border-collapse: collapse;
          width: 100%;
      }
      th {
          text-align: center;
          background-color: #ffc107;
          color: #000000;
      }
      td,
      th {
          border: 1px solid #868583;
          padding: 12px;
      }
      tr:nth-child(even) {
          background-color: #ececec;
      }
  </style>
</head>
<body>
   <?php require_once('../../layout/_layout.php')?>
    <nav class="navbar navbar-expand-sm  "></nav>
 
        <main>
          <div class="container">
        
            <h1 style="font-size:30px"><p style="color:blue">การจัดการสิทธ์การเข้าถึง</p></h1>
            <header class="py-3 mb-3 border-bottom">
              
            
                  <div class="d-flex align-items-center">
                    <form class="w-100 me-3" role="search">
                      <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>
            
                    
                    </div>
                  </div>
                </div>
                
              </header>
           
        </main>
        <div class="container">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          เลือกเเผนก
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">1</a></li>
              <li><a class="dropdown-item" href="#">2</a></li>
              <li><a class="dropdown-item" href="#">3</a></li>
            </ul>
            
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            เลือกตำเเหน่ง
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><a class="dropdown-item" href="#">2</a></li>
                  <li><a class="dropdown-item" href="#">3</a></li>
                </ul>
                <button type="button" class="btn btn-primary">search</button>
            </div>
            <br><br>
          </div>
          <div class="container">
        
            <table class="table">
                <thead>
                  <tr>
                    <td><input type="checkbox" /></td>
                    <th scope="col">ชื่อ-นามสกุล </th>
                    <th scope="col">เเผนก</th>
                    <th scope="col">ตำเเหน่ง</th>
                    <th scope="col">ชื่อสิทธ์</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="checkbox" /></td>
                    <td>พรภูเบศ น้ำดอกไม้</td>
                    <td>บุคคล</td>
                    <td>หัวหน้าฝ่ายบุคคล</td>
                    <td>None</td>
                    <th scope="col">action</th>
                  </tr>
                  <tr>
                    <td><input type="checkbox" /></td>
                    <td>ปวีร์ มูฮำหมัด</td>
                    <td>การตลาด</td>
                    <td>หัวหน้าฝ่ายการตลาด</td>
                    <td>leader</td>
                    <th scope="col">action</th>
                  </tr>
                  
                  <tr>
                    <td><input type="checkbox" /></td>
                    <td>ปรรนิก เมียงมาก</td>
                    <td>ไอที</td>
                    <td>หัวหน้าฝ่ายไอที</td>
                    <td>leader</td>
                    <th scope="col">action</th>
                  </tr>
                  <tr>
                    <td><input type="checkbox" /></td>
                    <td>ปรรนิก เมียงมาก</td>
                    <td>ไอที</td>
                    <td>หัวหน้าฝ่ายไอที</td>
                    <td>leader</td>
                    <th scope="col">action</th>
                  </tr>
                  <tr>
                    <td><input type="checkbox" /></td>
                    <td>ปรรนิก เมียงมาก</td>
                    <td>ไอที</td>
                    <td>หัวหน้าฝ่ายไอที</td>
                    <td>leader</td>
                    <th scope="col">action</th>
                  </tr>
                  <tr>
                    <td><input type="checkbox" /></td>
                    <td>ปรรนิก เมียงมาก</td>
                    <td>ไอที</td>
                    <td>หัวหน้าฝ่ายไอที</td>
                    <td>leader</td>
                    <th scope="col">action</th>
                  </tr>
                  
                  
                </tbody>
              </table>
                    
                    </div>
                  </div>
          
        
        
      </main>
      
</body>

</html>