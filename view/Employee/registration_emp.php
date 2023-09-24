<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!--===== CSS =====-->
    <link rel="stylesheet" href="styles_reg.css">

    <title>Reistration</title>
</head>

<body>
    <div class="container_reg">
        <header>เอกสารพนักงาน</header>

        <form action="#">
            <div class="form-detail-emp">
                <div class="detail-emp">
                    <div><img src="https://rare-gallery.com/thumbs/128750-cute-girl-hd-4k.jpg" alt="" width="95"
                            height="123 "></div>
                    <span class="title">ข้อมูลพนักงาน</span>
                    <div class="fields">
                        <div class="input-field">
                            <label> ID พนักงาน</label>
                            <input type="text">
                        </div>
                        <div class="input-field">
                            <label>ชื่อ</label>
                            <input type="text">
                        </div>
                        <div class="input-field">
                            <label>นามสกุล</label>
                            <input type="text">
                        </div>
                        <div class="input-field">
                            <label>วันเกิด</label>
                            <input type="date">
                        </div>
                        <div class="input-field">
                            <label>เพศ</label>
                            <select name="sex" id="sex" >
                                <option value="male">HEE</option>
                                <option value="male">ชาย</option>
                                <option value="female">หญิง</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>อีเมล</label>
                            <input type="text">
                        </div>
                        <div class="input-field">
                            <label>เบอร์โทร</label>
                            <input type="text">
                        </div>
                        <div class="input-field">
                            <label>สัญชาติ</label>
                            <select name="nation" id="nation">
                                <option value="thai">ไทย</option>
                                <option value="american">อเมริกากัน</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>เลขบัตรประชาชน</label>
                            <input type="text">
                        </div>
                        <div class="input-field">
                            <label>แผนก</label>
                            <select  name="department" id="department">
                                <option value="it">IT</option>
                                <option value="ec">Eng.Com</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>ตำเเหน่ง</label>
                            <select name="Position" id="Position">
                                <option value="god">พระเจ้า</option>
                                <option value="ceo">CEO</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>เงินเดือน</label>
                            <input type="text">
                        </div>
                        <div class="input-field">
                            <label>วันที่เริ่มทำงาน</label>
                            <input type="date">
                        </div>
                        <div class="input-field">
                            <label>วันที่สิ้นสุดการทำงาน</label>
                            <input type="date">
                        </div>
                        <div class="input-field">
                            <label>ที่อยู่</label>
                            <textarea id="address" name="address" rows="6" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="btn-all">
                        <button class="btn-submit">
                            <div>ตกลง</div>
                        </button>  
                        <button class="btn-cansal">
                            <div>ยกเลิก</div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>