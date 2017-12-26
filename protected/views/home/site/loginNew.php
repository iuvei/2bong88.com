
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sign in</title>
    
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background: url(/images/bg_wang.gif) repeat-x 0 -34px #f3f3f3;
        }

        ul, form {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        img {
            border: 0;
        }

        .clear {
            clear: both;
        }

        .main {
            width: 476px;
            height: 267px;
            margin: 0 auto;
            margin-top: 168px;
            background: url(/images/bg_wang2.gif);
        }

        .festival  .main {
            width: 476px;
            height: 267px;
            margin: 0 auto;
            margin-top: 168px;
            background: url(/images/bg_wang2_newyear.gif);
        }
           
        /*.main {
            width: 476px;
            height: 268px;
            margin: 0 auto;
            margin-top: 168px;
            background: url(DomainNames/3IN1BET/NewYear_2014.jpg);
        }*/
         .login {
            margin-left: 160px;
            padding-top: 30px;
        }

            .login li {
                font: 700 12px/28px Tahoma;
                text-shadow: white 0px 1px 0px;
                color: #333;
                margin: 16px 10px;
            }

                .login li span {
                    width: 100px;
                    display: block;
                    float: left;
                    text-align: right;
                }

        .input1 {
            background: #ffffcd;
            width: 165px;
            height: 28px;
            border: 1px solid #879eb0!important;
            border-radius: 5px!important;
            color: #000;
            font: 700 12px/26px Tahoma;
            text-align: center;
            margin: 0;
            padding: 0!important;
        }

        .input2 {
            background: #ffffcd;
            border: 1px solid #879eb0;
            border-radius: 5px;
            width: 86px;
            vertical-align: middle;
            height: 26px;
            color: #000;
            font: 700 12px/26px Tahoma;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .input3 {
            background: url(/images/inp_wang4.gif);
            width: 92px;
            height: 30px;
            border: 0;
            color: #fff;
            font: 700 14px/30px Tahoma;
            text-align: center;
            margin: 0;
            padding: 0;
            cursor: pointer;
        }

            .input3:hover {
                background: url(/images/inp_wang4.gif) 0 -30px;
            }

        .top {
            height: 28px;
            padding: 6px 37px 0 0;
            color: #000;
            font-weight: 700;
            text-align: right;
        }

            .top span {
                float: right;
                font: normal 12px/22px Tahoma;
                margin-top: 3px;
            }

            .top b {
                font-weight: 100;
                text-shadow: white 0px 1px 0px;
            }

            .top select {
                font: normal 11px Tahoma;
            }

            .top img {
                vertical-align: middle;
                margin-top: -5px;
            }

        .flag_en {
            background: url(/images/main.png) 0 -65px;
            width: 22px;
            margin-left: 5px;
            height: 17px;
        }

        .flag_cn {
            background: url(/images/main.png) -24px -65px;
            width: 22px;
            margin-left: 5px;
            height: 17px;
        }

        .flag_th {
            background: url(/images/main.png) -52px -65px;
            width: 22px;
            margin-left: 5px;
            height: 17px;
        }

        .flag_vn {
            background: url(/images/main.png) -78px -65px;
            width: 22px;
            margin-left: 5px;
            height: 17px;
        }

        .flag_id {
            background: url(/images/main.png) 0 -85px;
            width: 22px;
            margin-left: 5px;
            height: 17px;
            margin-top: 3px;
        }
        .flag_pt {
            background: url(/images/main.png) -24px -85px;
            width: 22px;
            margin-left: 5px;
            height: 17px;
            margin-top: 1px;
        }

        .flag_es {
            background: url(/images/main.png) -52px -85px;
            width: 22px;
            margin-left: 5px;
            height: 17px;
            margin-top: 1px;
        }

         .flag_kr {
            background: url(/images/main.png) -78px -85px;
            width: 22px;
            margin-left: 5px;
            height: 17px;
            margin-top: 1px;
        }
    </style>
    
</head>

<body>
    <div class="main">
        <form action="" method="post">
            <div class="login">
                <div class="top">
                    <span>
                        <span id="flag_class" class="flag_en"></span>
                        <b id="lang">Language</b>
                        <select id="ddl_language" onchange="ChangeLanguage(this.value)">
                            <option value="en-US" selected="selected">English</option>
                            <option value="zh-CN">中文(简体)</option>
                            <option value="zh-TW">中文(繁体)</option>
                            <option value="ko-KR">한국어</option>
                            <option value="th-TH">ไทย</option>
                            <option value="vi-VN">Tiếng Việt</option>
                            <option value="id-ID">Indonesia</option>
                            <option value="pt-PT">Português</option>
                            <option value="es-ES">Español</option>
                        </select>
                    </span>
                </div>
                <ul>
                    <li><span id="usernameSpan">Name：</span>
                        <input type="text" name="LoginForm[username]" id="UserName" class="input1" /></li>
                    <li><span id="passwordSpan">Password：</span>
                        <input type="password" name="LoginForm[password]" id="Password" class="input1" /></li>
                    <li style="margin-left: 150px">
                        <input type="submit" name="button" id="sub" value="Login" class="input3" />
                    </li>
                </ul>
            </div>
            <input type="hidden" value="103" />
        </form>
    </div>
    <script type="text/javascript" language="javascript">
        var lIndex = { "en-US": 0, "zh-CN": 1, "th-TH": 2, "vi-VN": 3, "zh-TW": 4, "id-ID": 5, "pt-PT": 6, "es-ES": 7, "ko-KR": 8 };
        var flag = ['flag_en', 'flag_cn', 'flag_th', 'flag_vn', 'flag_cn', 'flag_id', 'flag_pt', 'flag_es', 'flag_kr'];
        var lan = [
            ["Language", "Name：", "Password：", "Validation：", "Login", "Join Now !"],
            ["语言", "用户名：", "密码：", "验证码：", "登录", "注册会员 !"],
            ["ภาษา", "ชื่อ：", "รหัสผ่าน：", "รหัส：", "ล็อกอิน：", "สมัครสมาชิกตอนนี้ !"],
            ["ngôn ngữ", "Tên truy cập：", "Mật khẩu：", "Mã số：", "Đăng nhập", "Đăng ký ngay !"],
            ["語言", "用戶名：", "密碼：", "驗證碼：", "登錄", "註冊會員 !"],
            ["Bahasa", "Nama：", "Kata sandi：", "Pengesahan：", "Masuk", "Gabung Sekarang !"],
            ["Idioma", "Nome：", "Senha：", "Validação：", "Login", "Junte-se Agora !"],
            ["Lenguage", "Nombre：", "Contraseña：", "Validation：", "Ingresar", "Entra ahora !"],
            ["언어", "사용자 이름：", "비밀번호：", "확인：", "로그인", "회원가입!"]
        ];

        function changelang(l) {
            v = lIndex[l];
            document.getElementById("flag_class").className = flag[v];
            document.getElementById("lang").innerHTML = lan[v][0];
            document.getElementById("usernameSpan").innerHTML = lan[v][1];
            document.getElementById("passwordSpan").innerHTML = lan[v][2];
            document.getElementById("sub").value = lan[v][4];
        }

        function langload() {
            var lang = 'en-US';
            var arr = document.cookie.match(new RegExp("(^| )language=([^;]*)(;|$)"));
            if (arr != null) {
                lang = unescape(arr[2]);
            } else {
                var exp = new Date();
                exp.setFullYear(exp.getFullYear() + 1);
                document.cookie = "language=zh-CN;expires=" + exp.toGMTString();
            }
            document.getElementById("ddl_language").value = lang;
            changelang(lang);
        }
    </script>
    <div class="container">    
    
     
      
    <div  class="contactBar"><center><font style="background-color: #c4c4c4">Customer service, please contact. <span class="detail"><strong>Skype: </strong><a href="skype://vib365csd">vib365csd</a> <strong>Yahoo Messenger: </strong><a href="mailto:vib365csd@Yahoo.com">vib365csd@Yahoo.com</a> <strong>Email: </strong><a href="mailto:vib365csd@gmail.com">vib365csd@gmail.com</a></span>

  
   
    </div>
    <!-- end .container --></div>
</body>
</html>
