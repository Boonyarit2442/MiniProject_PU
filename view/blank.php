<!DOCTYPE html>
<html lang='en'>
    <header>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Page</title>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            h1{
                font-size: 100px;
            }
        </style>
    </header>
    <body>
        <?php
        require_once('../layout/_layout.php');
        ?>
        <div style="">
            <div>
                <marquee direction = "right" scrollamount="15">
                    <div class="" style="margin-top: 7cm; font: size 100px;"><h1>ยินดีต้อนรับคุณ <?=$_SESSION['id']?> เข้าสู่ระบบ</h1></div>
                </marquee>
            </div>
            <div>
                <marquee direction = "right" scrollamount="15">
                    <img src="https://scontent.fbkk22-2.fna.fbcdn.net/v/t1.18169-9/24300931_2410027535888213_537945056421705264_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=ad2b24&_nc_eui2=AeFq_TvBsrJ4DJjk6hFtT-NEf_4mtte6Fo9__ia217oWjx6k8R9H9Ej3etiAcXTOqIcZsW_F1pOLKfoTrqxi-too&_nc_ohc=P914SOh0o6cAX-yhmyJ&_nc_oc=AQlqaU04_DIkG7vb1Ck0wR2nOoGjgkHesBEaB0kVkB4_AHI6GtGUVOaIdmWi0EEHliGxZYiK3DBaijC8rkjWts8Q&_nc_ht=scontent.fbkk22-2.fna&oh=00_AfBq8Kh984E2XXIx-sUDBV1-GqoB4Q2h2CHyI35UEdNgmA&oe=6549F64D" 
                    alt="" style="wigth:500px;height:500px">
                    <img src="https://scontent.fbkk22-2.fna.fbcdn.net/v/t1.18169-9/13138830_832799786824977_9059909421305642353_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=f9d7a1&_nc_eui2=AeHS7gGXDqFqwVvxq1C52tbzZ7QFARkHvFRntAUBGQe8VAeD38TKcS1heYmjqG_6ECK5XkWKCxiIBCJiiy59AAc-&_nc_ohc=DLH27ZsvrJYAX_ws-CB&_nc_ht=scontent.fbkk22-2.fna&oh=00_AfAFvXNfybu3ED-zvV3XdUfdG7kSIE1Ru-x_BRZI7SSeOw&oe=6549F139" 
                    alt="" style="wigth:500px;height:500px">
                    <img src=" https://scontent.fbkk22-7.fna.fbcdn.net/v/t1.18169-9/12974292_995998757152414_4026904382047557666_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeH4rnyi_0fwEIoBf5SleA_jD1kfTiOAQFEPWR9OI4BAUcNdPquj_BGPSJnThR55CQtXkx6EDvShgcV04YrSMTll&_nc_ohc=5kgvp6KVjYcAX9PjaHm&_nc_ht=scontent.fbkk22-7.fna&oh=00_AfDzFjqvv2ms-64V2agA_vHvMmVIheO-vubzp9yRBtr1oA&oe=6549F553"
                    alt="" style="wigth:500px;height:500px">
                    <img src=" https://scontent.fbkk22-3.fna.fbcdn.net/v/t1.18169-9/394875_480158528697125_1268062472_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=de6eea&_nc_eui2=AeFBbIzH71fNy14QLOsyMTPdH1YJz8Qfu1MfVgnPxB-7U7silad9vNMggkjYxj7RtXLaeg-BFcmAdnG2j2ei2hFI&_nc_ohc=3u7I3ZvEQaUAX_c291d&_nc_ht=scontent.fbkk22-3.fna&oh=00_AfARK8hpRk0qbF-mtFnxguce8zTum1-iKHAemDM--cX-rw&oe=6549CEF5"
                    alt="" style="wigth:500px;height:500px">
                    <img src="https://scontent.fbkk22-8.fna.fbcdn.net/v/t1.6435-9/53507051_1754102824690892_4894442269781786624_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeGlI15-wK0Ba3VE7j5nY-DEGNa08kjMD2IY1rTySMwPYnc8b62kI6TcN1kcgCqk6B9HdvU417N7ddO-7-4OAzQC&_nc_ohc=5ISCQXif3ekAX-2cdi1&_nc_ht=scontent.fbkk22-8.fna&oh=00_AfD5YP0HJfVYanAY_6IhGcYmaslmAJcNQdpXpZIqcFRxSg&oe=6549F0E1"
                    alt="" style="wigth:500px;height:500px">
                    <img src="https://scontent.fbkk22-3.fna.fbcdn.net/v/t31.18172-8/18238572_687188968129864_7732863723730047654_o.jpg?_nc_cat=111&ccb=1-7&_nc_sid=7a1959&_nc_eui2=AeH-B-6KEOsjRtStGsxhd_ix9SAPq8vDH3H1IA-ry8MfcRbm4rD3Bt0gK3AX8xRrkEAA7lRLJOtlsDP0RijwhMQF&_nc_ohc=sbb2M2AJcd8AX_hzH9K&_nc_ht=scontent.fbkk22-3.fna&oh=00_AfCwe4nS_ye_Y2dimtgPtslcPAVTaqrqCdSo-11Dwc0uXA&oe=6549E555"
                    alt="" style="wigth:500px;height:500px">
                    <img src="https://scontent.fbkk22-8.fna.fbcdn.net/v/t1.6435-9/83645256_2503738666420025_276986340749344768_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeFza475abgafaeIHEqj5F_XypIqX81-jC3KkipfzX6MLfR5_e4m1tfY4SqfKPg9bLapOkP-SnK_107GTuzUDrWZ&_nc_ohc=KPvGfedw_p8AX815ksy&_nc_ht=scontent.fbkk22-8.fna&oh=00_AfDkosobdom-nRVjs0vLkBO6RmQay6wuRjTXmGrgJ0JzsA&oe=6549E302"
                    alt="" style="wigth:500px;height:500px">
                    <img src="https://scontent.fbkk29-4.fna.fbcdn.net/v/t39.30808-6/324657251_1201527174120076_205164471615237855_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeH_YKe886kVNS6_YL_EKBUYT43Gq_Vtt-FPjcar9W234fN-R6jezDCWEfNlIDfakhg0THDC7el0On_Q3dZQ3HRb&_nc_ohc=EwN5GYyfCYIAX-MIduY&_nc_ht=scontent.fbkk29-4.fna&oh=00_AfAjoRV2a70LZajeKdMyg3n-vtN_w03dWAQHLIVc4qWulw&oe=654AFD75" 
                    alt="" style="wigth:500px;height:500px">
                    <img src="https://scontent.fbkk22-6.fna.fbcdn.net/v/t39.30808-6/331065128_872214244057102_9073436703260500666_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5614bc&_nc_eui2=AeFeHKfIvS5on-zxKvlHXWckLM71Z0ayFQMszvVnRrIVA8_hN-WuZeOuVkiZKROYCV0Nft9s1MMcXyfKYYpjkG2F&_nc_ohc=2vkdp7iYB00AX9l6Fj1&_nc_ht=scontent.fbkk22-6.fna&oh=00_AfA69d-Hq5o1AJvNHTqtGzCdOW-tGF3bJsvWoHa5AeEGlA&oe=65282F07" 
                    alt="" style="wigth:500px;height:500px">
                    <img src="1.jpeg" alt="" style="wigth:500px;height:500px">
                </marquee>
            </div>
        </div>
    </body>
</html>
