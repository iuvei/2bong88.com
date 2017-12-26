
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>EDIT PROFILE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="/assets/stylesheets/agent/Agent.css?06" rel="stylesheet"
        type="text/css" />
           <link href="/assets/stylesheets/agent/ContextualCostomer.css"  rel="stylesheet" type="text/css" />
            <link href="/assets/stylesheets/agent/ErrorMsg.css"  rel="stylesheet" type="text/css" />
    
    <link href="/assets/stylesheets/agent/LoginOption.css"
        rel="stylesheet" type="text/css" />

</head>
<body>
<div class="row-fluid">
    <div id="header_main" class="span36">
       EDIT PROFILE</div>
</div>
    

<div id="tab_menu">
    <div id="tab_menu_m">
        <a id="loginTabId" class="tab_menu01AC" style="cursor: default;">Login option</a>
    </div>
    <div id="tab_menu_L">
        <a id="profileId" class="tab_menu02" target="main" href="javascript:;">
            Profile picture </a>
    </div>
</div>
<div id="leftpane">
    <div style="padding-left: 20px; padding-top: 10px; width: 700px; border: 1px solid #D8D8D8;">
       <link href="/assets/stylesheets/agent/ErrorMsg.css?20150304" rel="stylesheet" type="text/css" /><script src="/assets/js/bet/ErrorMsg.js?20150304" type="text/javascript"></script><table border="0" cellpadding="0" cellspacing="0" width="100%" id="diverrmsg" style="display: none;"><tr><td id="msg_1_1" class="emsg_1_1">&nbsp;</td><td id="msg_1_2" class="emsg_1_2">&nbsp;</td><td id="msg_1_3" class="emsg_1_3">&nbsp;</td></tr><tr><td id="msg_2_1" valign="top" class="emsg_2_1">&nbsp;</td><td valign="top" id="spmsgerr" class="msgerr"></td><td id="msg_2_2" class="emsg_2_2">&nbsp;</td></tr><tr><td id="msg_3_1" class="emsg_3_1">&nbsp;</td><td id="msg_3_2" class="emsg_3_2">&nbsp;</td><td id="msg_3_3" class="emsg_3_3">&nbsp;</td></tr></table>
        <div class="bg">
            <div class="clear">
            </div>
            <div class="floatleft nicknameblock">
                <div class="floatleft nicknamebox">
                    <div class="fontblack">
                        <b>Nickname</b></div>
                    <div class="mt5">
                        <input type="text" style="width:130px" id="textNickName" title="Nickname must be unique, only alphabet or numeric and should have at least a minimum of 5 characters and maximum of 15 characters." autocomplete="off" value="<?php echo $user->nickname ?>"  maxlength="15" />
                    </div>
                </div>
                <div class="floatleft loginoptions" style="width: 260px">
                    <div>
                        <label style="font-weight:bold;">
                            <input type="radio" name="username" id="chkUserName" />
                            Username or nickname</label></div>
                    <div class="mt5">
                        <label style="font-weight:bold;">
                            <input type="radio" name="username" id="chkNickName" />
                            Nickname only (Recommended)</label></div>
                </div>
                <div class="clear">
                </div>
                <div class="note">
                    <div class='mt3'>- You are not allowed to change your nickname afterward.</div>
<div class='mt3'>- Your nickname will not be disclosed to any person.</div>
<div class='mt3'>- This feature is not offered for sub-account.</div>
                </div>
            </div>
            <div class="clear">
            </div>
            <div class="floatleft">
                <div class="bg_arrow float_l">
                    <div id="loading" class="loading" style="display: none; margin-top: 10px; margin-left: 5px">
                    </div>
                    <div id="msgError" class="error" style="display: none;">
                    </div>
                </div>
                <div class="arrow float_l">
                </div>
            </div>
            <div class="clear">
            </div>
            <div class="btnLeft">
                <button id="submitId" class="btnRight" type="button" onclick="return loginOption.updatingLoginOption();">Submit</button>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/bet/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="/assets/js/bet/LoginOption.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
    var resources =
                  {
                      _notAuthorized: "You are not authorized on this function"
                  };

    var nickname = "<?php echo $user->nickname ?>";
    var isLoginByNicknameOnly = "False";
    var msgNicknameValid = "Nickname must be unique, only alphabet or numeric and should have at least a minimum of 5 characters and maximum of 15 characters.";
    window.rootUrl = '/';

    var _isInternal = 'False';
    var _isSubAcc = 'False';

    if (nickname.length > 0) {
        $('#textNickName').prop('disabled', 'disabled');
    }

    if (isLoginByNicknameOnly == 'True') {
        $('#chkNickName').prop('checked', 'true');
    }
    else {
        $('#chkUserName').prop('checked', 'true');
    }
</script>

    <input id="RootURL" name="RootURL" type="hidden" value="/" />
</body>
</html>

<script src="/assets/js/bet/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var domain;

    jQuery(document).ready(function () {
        domain = location.protocol + '//' + location.host + jQuery('#RootURL').val();
    });

    function ShowMsgs(msg, success) {
        if (success) {
            $('#spmsgerr').addClass("msgscc");
            $('#msg_1_1').addClass("succ_1_1");
            $('#msg_1_2').addClass("succ_1_2");
            $('#msg_1_3').addClass("succ_1_3");
            $('#msg_2_1').addClass("succ_2_1");
            $('#msg_2_2').addClass("succ_2_2");
            $('#msg_3_1').addClass("succ_3_1");
            $('#msg_3_2').addClass("succ_3_2");
            $('#msg_3_3').addClass("succ_3_3");
        }
        else {
            $('#spmsgerr').addClass("msgerr");
            $('#msg_1_1').addClass("emsg_1_1");
            $('#msg_1_2').addClass("emsg_1_2");
            $('#msg_1_3').addClass("emsg_1_3");
            $('#msg_2_1').addClass("emsg_2_1");
            $('#msg_2_2').addClass("emsg_2_2");
            $('#msg_3_1').addClass("emsg_3_1");
            $('#msg_3_2').addClass("emsg_3_2");
            $('#msg_3_3').addClass("emsg_3_3");
        }

        $("#spmsgerr").text(msg);
        $("#diverrmsg").css({ display: '' });
    }

    function HideMsg() {
        $("#diverrmsg").css({ display: 'none' });
    }


    function DisableButtonById(id) {
        $("#" + id).attr("disabled", "disabled");
        $("#" + id).addClass("btn2");
    }

    function EnableButtonById(id) {
        $("#" + id).removeAttr("disabled");
        $("#" + id).removeClass("btn2");
    }

</script>

