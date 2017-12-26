<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Thay đổi Mã bảo mật</title>
    <link href="/assets/stylesheets/agent/Agent.css?20150304" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="page_main" onkeydown="age.DoEnter(event, 'ChangeSecCode()')">
        <div id="header_main"><a id="linkChangePwd" name="linkChangePwd" href="javascript:GotoPwdPage()">Mật Khẩu</a>&nbsp;|&nbsp;Mã bảo mật</div>
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
                <td colspan="2" class="RptHeader bg_eb">Thay đổi Mã bảo mật</td>
            </tr>
            <tr class="bg_eb">
                <td class="l" width="40%">Mã bảo mật cũ</td>
                <td class="l">
                    <input id="inputSecCode" type="password" name="inputSecCode" autocomplete="off" />
                </td>
            </tr>
            <tr class="bg_eb">
                <td class="l" width="40%">Mã bảo mật</td>
                <td class="l">
                    <input id="txtSecCode" onkeyup="return CheckSecCode(this,'spnSecCodeIcon');" type="password" name="txtSecCode" autocomplete="off" /><span id="spnSecCodeIcon">&nbsp;</span></td>
            </tr>
            <tr class="bg_eb">
                <td class="l">Xác nhận Mã bảo mật</td>
                <td class="l">
                    <input id="txtConfirmSecCode" onkeyup="return CheckSecCode(this,'spnConfirmSecCodeIcon');" type="password" name="txtConfirmSecCode" autocomplete="off" /><span id="spnConfirmSecCodeIcon">&nbsp;</span></td>
            </tr>
            <tr>
                <td class="bg_eb c" colspan="2">
                    <input type="button" value="Xác nhận" onclick="ChangeSecCode();" class="btn" />&nbsp;
                    <input type="reset" value="Reset" onclick="Reset();" class="btn" />
                </td>
            </tr>
        </table>
    </div>
</body>
<script src="/assets/js/bet/Core.js?20150304" type="text/javascript"></script>
<script src="/assets/js/bet/Sha1.js?20150304" type="text/javascript"></script>
<script src="/assets/js/bet/Sha256.js?20150304" type="text/javascript"></script>
<script src="/assets/js/bet/ChangeSecurityCode.js?20150304" type="text/javascript"></script>

</html>
<script type="text/javascript">
    var _page = {
        'alertSecCodeEmpty': 'Mã bảo mật phải có giá trị, không thể trống',
        'alertErrorSecCodeConfirm': 'Mã bảo mật xác nhận không chính xác.',
        'alertRequiredSecCode': 'Mã bảo mật phải:\r\n\r\n    * Chỉ toàn ký tự số.\r\n    * Là số có 6 ký tự số kết hợp từ [0-9].\r\n    * Có ít nhất 2 ký tự khác nhau trong Mã bảo mật.\r\n    * Không phải là số gồm những ký tự tăng dần hoặc giảm dần từ trái sang phải.\r\nVí dụ: không cho phép 123456, 456789, 765432, v.v.',
        'alertSecCodeSucc': 'Mã bảo mật đã được thay đổi thành công.',
        'alertSecCodeWrongRule': 'Mã bảo mật do bạn cung cấp không thỏa quy tắc đặt ra.',
        'alertSameSecCode': 'Mã bảo mật mới phải khác với Mã bảo mật hiện tại.',
        'alertOldSecCodeEmpty': 'Vui lòng nhập Mã bảo mật hiện tại',
        'custid': null,
        'username': null,
        'lblLearnMore': 'Vui lòng tìm hiểu thêm tại đây',
        'language': 'vi-VN',
        'alreadyHasSecCode': true,
        'securityCodeToken': 'e909bb116d03',
        'securitySalt': 'f521452f36999c74b9467895d58c9a87'
    };
</script>