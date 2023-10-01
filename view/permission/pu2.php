<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>

  
</head>

<body style="height: 60px;">
  <!-- navigater Bar -->

<?php require_once('../../layout/_layout.php')?>





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
  <style>
    #menu__toggle {
      opacity: 0;
    }

    #menu__toggle:checked+.menu__btn>span {
      transform: rotate(45deg);
    }

    #menu__toggle:checked+.menu__btn>span::before {
      top: 0;
      transform: rotate(0deg);
    }

    #menu__toggle:checked+.menu__btn>span::after {
      top: 0;
      transform: rotate(90deg);
    }

    #menu__toggle:checked~.menu__box {
      left: 0 !important;
    }

    .menu__btn {
      position: relative;
      top: 15px;
      left: 20px;
      width: 26px;
      height: 26px;
      cursor: pointer;
      z-index: 1;
    }

    .menu__btn>span,
    .menu__btn>span::before,
    .menu__btn>span::after {
      display: block;
      position: absolute;
      width: 100%;
      height: 2px;
      background-color: #fff;
      transition-duration: .25s;
    }

    .menu__btn>span::before {
      content: '';
      top: -8px;
    }

    .menu__btn>span::after {
      content: '';
      top: 8px;
    }

    .menu__box {
      display: block;
      position: fixed;
      top: 0;
      left: -100%;
      width: 300px;
      height: 100%;
      margin: 0;
      padding: 80px 0;
      list-style: none;
      background-color: #3E91FF;
      /*box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);*/
      transition-duration: .25s;
    }

    .menu__item {
      display: block;
      padding: 12px 24px;
      color: #fff;
      font-family: 'Roboto', sans-serif;
      font-size: 20px;
      font-weight: 600;
      text-decoration: none;
      transition-duration: .25s;
    }

    .menu__item:hover {
      color: #fff;
      background-color: #043AA3;
    }

    .nav-item>div {
      margin-left: 10px;
      border-radius: 0.4rem;
    }

    .nav-item>a {
      margin-left: 10px;
    }
  </style>





  <div class="container">
    <span style="font-size:30px"><span style="color:blue">การจัดการสิทธ์การเข้าถึง</span></span>&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;<span style="font-size:30px"><span style="color:blue">นาย พรภูเบศ
        น้ำดอกไม้</span></span><br><br><br>

  </div>
  <main>
    <div class="container">

      <h1 style="font-size:30px">
        <p style="color:blue">ตั้งชื่อสิทธิ์การใช้งาน</p>
      </h1>
      <header class="py-3 mb-3 border-bottom">


        <div class="d-flex align-items-center">
          <form class="w-100 me-3" role="search">
            <input type="search" class="form-control" placeholder="..." aria-label="Search">
          </form>


        </div>
      </header>
    </div>
    <div class="container">

      <table class="table">
        <thead>
          <tr>
            <td><input type="checkbox"></td>
            <th scope="col">ชื่อเเผนก </th>


          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="checkbox"></td>
            <td>ข้อมูลผู้สมัคร</td>


          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>ข้อมูลองค์กร</td>


          </tr>

          <tr>
            <td><input type="checkbox"></td>
            <td>ยื่นขอพนักงาน</td>


          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>อนุมัติเอกสาร</td>


          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>บุ๊คกิ้งวันสัมภาษณ์</td>


          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>ตะเเนนการสัมภาษณ์</td>


          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>สรุปรายงานการสอบ</td>


          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>เเดชบอร์ด</td>


          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>จัดการสิทธิ๋พนักงาน</td>


          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>จัดการโครงสร้าง</td>


          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>โพสข่าวสาร</td>


          </tr>


        </tbody>
      </table>
      <button type="button" class="btn btn-warning">ยืนยัน</button>

    </div>







  </main>



</body>

</html>