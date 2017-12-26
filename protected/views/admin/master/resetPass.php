<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Tùy chỉnh <?php echo $user->Username ?></title>
    <link href="/assets/stylesheets/agent/Agent.css?20141215" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/ResetPassword.css?20141215" rel="stylesheet" type="text/css" />
</head>

<body id="bdSearch">
    <div id="page_popup">
        <table width="350px" cellpadding="0" cellspacing="1" border="0">
            <tr>
                <td class="l">
                    <div id="header_main">Thay đổi mật khẩu <?php echo $user->Username ?></div>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <link href="/assets/stylesheets/agent/ErrorMsg.css?20141215" rel="stylesheet" type="text/css" />
                    <script src="/assets/js/bet/ErrorMsg.js?20141215" type="text/javascript"></script>
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
                </td>
            </tr>
            <tr>
                <td align="center">
                    <table width="100%" align="center" cellpadding="0" cellspacing="1" border="0" class="tblRpt">
                        <tr class="RptHeader">
                            <td colspan="2" align="center">Thay đổi mật khẩu</td>
                        </tr>
                        <tr class="bg_eb2">
                            <td class="r" style="width: 160px;">Mật Khẩu:</td>
                            <td id="td_pass" class="l">
                                <input type="password" id="password" name="pw" onkeyup="CheckPass(this,'spnNewPwdIcon');" /><span id="spnNewPwdIcon">&nbsp;</span>
                            </td>
                        </tr>
                        <tr class="bg_eb2">
                            <td class="r" style="width: 160px;">Xác nhận Mật Khẩu mới:</td>
                            <td id="td_confirmpass" class="l">
                                <input type="password" id="confirmPassword" name="cpw" onkeyup="CheckPass(this,'spnConfirmPwdIcon');" /><span id="spnConfirmPwdIcon">&nbsp;</span>
                            </td>
                        </tr>
                        <tr class="bg_eb2 c">
                            <td colspan="2">
                                <input type="submit" id="btnSubmit" value="Xác nhận" onclick="ChangePassword();" class="btn" />&nbsp;
                                <input type="button" id="btnCancel" value="Reset" onclick="Reset();" class="btn" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
    </div>
    <script src="/assets/js/bet/Core.js?20141215" type="text/javascript"></script>
    <script src="/assets/js/bet/AGEWnd.js?20141215" type="text/javascript"></script>
    <script src="/assets/js/bet/ResetPassword.js?v=<?php echo time(); ?>" type="text/javascript"></script>
</body>

</html>
<script type="text/javascript">
    var _page = {
		'pageType':"master",
        'role': '1',
        'errOldPassword': 'Vui lòng nhập  Mật Khẩu hiện tại',
        'errPasswordEmpty': 'Mật Khẩu không thể để trống!!!',
        'errConfirmPasswordEmpty': 'Mật khẩu xác nhận không thể trống',
        'errConfirm': 'Mật khẩu xác nhận không chính xác',
        'infoSuccess': 'Mật khẩu của bạn đã được thay đổi thành công.',
        'errWrongPasswordRule': 'Mật khẩu của bạn chưa đạt mức an toàn tối thiểu.',
        'errPasswordRequire': 'Mật khẩu phải gồm 6-10 ký tự, không có khoảng trắng và phải chứa it nhất 1 ký tự viết hoa, 1 ký tự viết thường, 1 ký tự số (ví dụ: 493abcDE, 59D7!4$h).\r\nLưu ý:  Mật khẩu có phân biệt chữ hoa và chữ thường.',
        'custId': <?php echo $user->Id ?>,
        'isSyncCasino': '2',
        'isPopup': true,
        'username': '<?php echo $user->Username ?>',
        'pwdDAccountName': 'Mật khẩu không được chứa tên đăng nhập hoặc tên riêng.'
    };
</script>