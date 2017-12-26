<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Mật Khẩu</title>
    <link href="/assets/stylesheets/agent/Agent.css?20150304" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="page_main" onkeydown="age.DoEnter(event, 'ChangePassword()')">
        <div id="header_main">Mật Khẩu&nbsp;|&nbsp;<a id="linkChangeSC" name="linkChangeSC" href="javascript:GotoSCPage()">Mã bảo mật</a></div>
        <br />
        <div style="width: 370px">
            <link href="/assets/stylesheets/agent/ErrorMsg.css?20150304" rel="stylesheet" type="text/css" />
            <script src="/assets/js/bet/ErrorMsg.js?20150304" type="text/javascript"></script>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="diverrmsg" style="display: none;">
                <tr>
                    <td id="msg_1_1" class="emsg_1_1">&nbsp;</td>
                    <td id="msg_1_2" class="emsg_1_2">&nbsp;</td>
                    <td id="msg_1_3" class="emsg_1_3">&nbsp;</td>
                </tr>
                <tr>
                    <td id="msg_2_1" valign="top" class="emsg_2_1">&nbsp;</td>
                    <td valign="top" id="spmsgerr" class="msgerr"></td>
                    <td id="msg_2_2" class="emsg_2_2">&nbsp;</td>
                </tr>
                <tr>
                    <td id="msg_3_1" class="emsg_3_1">&nbsp;</td>
                    <td id="msg_3_2" class="emsg_3_2">&nbsp;</td>
                    <td id="msg_3_3" class="emsg_3_3">&nbsp;</td>
                </tr>
            </table>
        </div>
        <table width="370" border="0" cellpadding="0" cellspacing="1" class="tblRpt">
            <tr>
                <td colspan="2" class="RptHeader bg_eb">Thay đổi mật khẩu</td>
            </tr>
            <tr class="bg_eb">
                <td>Mật Khẩu hiện tại</td>
                <td class="l">
                    <input id="txtOldPwd" type="password" name="txtOldPwd" />
                </td>
            </tr>
            <tr class="bg_eb">
                <td class="l" width="40%">Mật Khẩu</td>
                <td class="l">
                    <input id="txtNewPwd" onkeyup="return CheckPass(this,'spnNewPwdIcon');" type="password" name="txtNewPwd" /><span id="spnNewPwdIcon">&nbsp;</span></td>
            </tr>
            <tr class="bg_eb">
                <td class="l">Xác nhận Mật Khẩu mới</td>
                <td class="l">
                    <input id="txtConfirmPwd" onkeyup="return CheckPass(this,'spnConfirmPwdIcon');" type="password" name="txtConfirmPwd" /><span id="spnConfirmPwdIcon">&nbsp;</span></td>
            </tr>
            <tr>
                <td class="bg_eb c" colspan="2">
                    <input type="button" value="Xác nhận" onclick="ChangePassword();" class="btn" />&nbsp;
                    <input type="reset" value="Reset" onclick="Reset();" class="btn" />
                </td>
            </tr>
        </table>
    </div>
</body>
<script src="/assets/js/bet/Core.js?20150304" type="text/javascript"></script>
<script src="/assets/js/bet/ChangePassword.js?20152703" type="text/javascript"></script>

</html>
<script type="text/javascript">
    var _page = {
        'alertInputOldPwd': 'Vui lòng nhập  Mật Khẩu hiện tại',
        'alertPasswordEmpty': 'Mật Khẩu không thể để trống!!!',
        'alertErrorConfirm': 'Mật khẩu xác nhận không chính xác',
        'alertPasswordRequire': 'Mật khẩu phải gồm ít nhất 8 ký tự, không có khoảng trắng và phải có ít nhất 3 ký tự sau đây:\r\n\r\n - Ký tự viết hoa [A-Z]\r\n - Ký tự viết thường [a-z]\r\n - Ký tự số [0-9]\r\n - Ký tự đặc biệt (!,@,#,...)\r\nVí dụ : 59D7!4$h, 493abcDE\r\n\r\nLưu ý : Mật khẩu có phân biệt chữ hoa và chữ thường.',
        'alertPasswordSucc': 'Mật khẩu của bạn đã được thay đổi thành công.',
        'alertWrongPasswordRule': 'Mật khẩu của bạn chưa đạt mức an toàn tối thiểu.',
        'pwdOldHint': 'Mật khẩu mới phải khác với mật khẩu đang sử dụng.',
        'pwdDAccountName': 'Mật khẩu không được chứa tên đăng nhập hoặc tên riêng.',
        'isNewSC': false
    };
</script>