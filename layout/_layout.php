<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
  <!--<script src="bar.js"></script>-->
</head>

<body style="height: 60px;">  
<!-- navigater Bar -->
<style>
#menu__toggle {
    opacity: 0;
  }
  #menu__toggle:checked + .menu__btn > span {
    transform: rotate(45deg);
  }
  #menu__toggle:checked + .menu__btn > span::before {
    top: 0;
    transform: rotate(0deg);
  }
  #menu__toggle:checked + .menu__btn > span::after {
    top: 0;
    transform: rotate(90deg);
  }
  #menu__toggle:checked ~ .menu__box {
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
  .menu__btn > span,
  .menu__btn > span::before,
  .menu__btn > span::after {
    display: block;
    position: absolute;
    width: 100%;
    height: 2px;
    background-color: #fff;
    transition-duration: .25s;
  }
  .menu__btn > span::before {
    content: '';
    top: -8px;
  }
  .menu__btn > span::after {
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

  .nav-item > div {
    margin-left: 10px;
    border-radius: 0.4rem;
  }
  .nav-item > a{
    margin-left: 10px;
  }
</style>
  <nav class="navbar navbar-expand-sm bg-primary ">
    <div class="container-fluid " >
      <!-- Hamburger Menu -->
      <div class="hamburger-menu">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
          <span></span>
        </label>
        <ul class="menu__box">
          <li><a class="menu__item" href="#">Home</a></li>
          <li><a class="menu__item" href="#">About</a></li>
          <li><a class="menu__item" href="#">Team</a></li>
          <li><a class="menu__item" href="#">Contact</a></li>
          <li><a class="menu__item" href="#">Twitter</a></li>
        </ul>
      </div>
      <!-- Links -->
      <ul class="navbar-nav d-flex align-items-center ">
        <li class="nav-item">
          <div class="nav-link bg-light " href="#">Link 2</div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="controler/logout.php"><img class="icon-logout" src="https://cdn-icons-png.flaticon.com/128/11638/11638572.png" width="27" height="32"></a>
        </li>
      </ul>
    </div>
  </nav>

</body>

</html>