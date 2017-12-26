<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Hạn mức được cấp <?php echo $username ?></title>
    <link href="/assets/stylesheets/agent/Agent.css?20141215" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Popup.css?20141215" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/CreditTransfer.css?20141215" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="page_popup">
        <table width="95%" align="center" cellpadding="0" cellspacing="1" border="0">
            <tr>
                <td>
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
                <td>
                    <table cellpadding="0" cellspacing="1" class="tblPop c" width="100%">
                        <tr class="bg_eb2">
                            <td class="r b" style="width: 35%;">USD:</td>
                            <td class="l">
                                <input style="padding-left: 5px; text-align: right; width: 130px;" type="text" id="txtamout" value="<?php echo $amount ?>" onkeypress="return OnkeyUpAmt(event);" maxlength="14" />
                            </td>
                        </tr>
                        <tr class="bg_eb2">
                            <td></td>
                            <td align="left">
                                <input type="button" value="Xác nhận" onclick="UpdCredit();" class="btn" />&nbsp;
                                <input type="button" value="Hủy" onclick="parent.ageWnd.close();" class="btn" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <input id="custid" value="<?php echo $custId ?>" type="hidden" />
        <input id="roleId" value="{RoleId}" type="hidden" />
		<input id="typePage" value="<?php echo $typePage ?>" type="hidden" />
    </div>
    <script type="text/javascript" src="/assets/js/bet/Core.js"></script>
    <script type="text/javascript" src="/assets/js/bet/CreditTransfer.js?v=<?php echo time(); ?>"></script>
</body>

</html>
<script type="text/javascript">
    var _page = {
        'lblConfirmClosed': 'Tài khoản của bạn đã bị khóa, bạn buộc phải đăng xuất .Vui lòng liên hệ với cấp trên của bạn để được hỗ trợ',
        'lblconfirmclosesubacc': 'Tài khoản phụ không được cấp phép'
    };
</script>