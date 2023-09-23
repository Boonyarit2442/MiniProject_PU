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
  </body>
</html>
