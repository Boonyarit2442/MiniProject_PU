<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Position</title>
    <link rel="stylesheet" href="./posstyle.css" />
  </head>
  <body class="">
    <?php require_once('../../layout/_layout.php')?>
    
    <section class="feature">
      <div class="feature-con">
        <div class="feature-text">ตำแหน่ง</div>
        <button class="add-feature" type="submit">+ เพิ่มตำแหน่ง</button>
      </div>
    </section>

    <section class="filter">
      <nav class="filter-bar">
        <div class="filter-con">
          <input
            class="search-bar"
            type="text"
            id="search"
            placeholder="ค้นหาคุณสมบัติ..."
            size="60"
          />
          <button class="search-bth" type="submit">SEARCH</button>

          <div class="combo">
            <label for="pos-text">ตำแหน่ง</label>
            <select name="position" id="position">
              <option value="It">IT</option>
              <option value="Programmer">Programer</option>
              <option value="Hr">HR</option>
              <option value="Manager">Manager</option>
            </select>
          </div>
        </div>
      </nav>
    </section>
    <div class="container-xxl">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col"><input type="checkbox" /></th>
            <th scope="col">รหัส</th>
            <th scope="col">ชื่อตำแหน่ง</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"><input type="checkbox" /></th>
            <td>6411130001</td>
            <td>Developer</td>
            <td>
              <a href="#"><img
                src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                width="22"
                height="22"
              /></a>
              <a href="#"><img
                src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png"
                width="22"
                height="22"
              /></a>
            </td>
          </tr>
          <tr>
            <th scope="row"><input type="checkbox" /></th>
            <td>6411130002</td>
            <td>IT</td>
            <td>
            <a href="#"><img
                src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                width="22"
                height="22"
              /></a>
              <a href="#"><img
                src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png"
                width="22"
                height="22"
              /></a>
            </td>
          </tr>
          <tr>
            <th scope="row"><input type="checkbox" /></th>
            <td>6411130003</td>
            <td>HR</td>
            <td>
            <a href="#"><img
                src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                width="22"
                height="22"
              /></a>
              <a href="#"><img
                src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png"
                width="22"
                height="22"
              /></a>
            </td>
          </tr>
          <tr>
            <th scope="row"><input type="checkbox" /></th>
            <td>6411130004</td>
            <td>Programer</td>
            <td>
            <a href="#"><img
                src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                width="22"
                height="22"
              /></a>
              <a href="#"><img
                src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png"
                width="22"
                height="22"
              /></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>
