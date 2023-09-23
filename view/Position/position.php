<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Position</title>
    <link rel="stylesheet" href="./posstyle.css" />
  </head>
  <body>
  <?php require_once('../../layout/_layout.php')?>
    <section class="feature">
      <div class="feature-con">
        <div class="feature-text">ตำแหน่ง</div>
        <div class="add-feature">+ เพิ่มตำแหน่ง</div>
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

    <section class="table">
      <div class="table-con">
        <table class="pos-table">
          <thead>
            <tr class="head">
              <th scope="col"><input type="checkbox" value="0" /></th>
              <th scope="col">รหัส</th>
              <th scope="col">ชื่อตำแหน่ง</th>
              <th scope="col">action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="row">
              <th scope="row"><input type="checkbox" value="1" /></th>
              <td>6411130000</td>
              <td>Programmer</td>
              <td>
                <img
                  class="icon-edit"
                  src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                  width="22"
                  height="22"
                />
                <img
                  class="icon-bin"
                  src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png"
                  width="22"
                  height="22"
                />
              </td>
            </tr>

            <tr class="row">
              <th scope="row"><input type="checkbox" value="2" /></th>
              <td>6411130001</td>
              <td>Developer</td>
              <td>
                <img
                  class="icon-edit"
                  src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                  width="22"
                  height="22"
                />
                <img
                  class="icon-bin"
                  src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png"
                  width="22"
                  height="22"
                />
              </td>
            </tr>
            <tr class="row">
              <th scope="row"><input type="checkbox" value="3" /></th>
              <td>6411130002</td>
              <td>HR</td>
              <td>
                <img
                  class="icon-edit"
                  src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                  width="22"
                  height="22"
                />
                <img
                  class="icon-bin"
                  src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png"
                  width="22"
                  height="22"
                />
              </td>
            </tr>
            <tr class="row">
              <th scope="row"><input type="checkbox" value="4" /></th>
              <td>6411130003</td>
              <td>IT</td>
              <td>
                <img
                  class="icon-edit"
                  src="https://cdn-icons-png.flaticon.com/128/1828/1828270.png"
                  width="22"
                  height="22"
                />
                <img
                  class="icon-bin"
                  src="https://cdn-icons-png.flaticon.com/128/2496/2496733.png"
                  width="22"
                  height="22"
                />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </body>
</html>
