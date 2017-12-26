
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Preferences</title>
    <link href="/css/TVstreaming.css?v=201409101105" rel="stylesheet" type="text/css" />
    <link href="/css/table_w.css?v=201409050447" rel="stylesheet" type="text/css" />
    <link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
    <link href="/css/global.css?v=201409101100" rel="stylesheet" type="text/css" />
    <link href="/css/menu.css?v=201408080405" rel="stylesheet" type="text/css" />
    <link href="/css/infocss.css?v=201409120949" rel="stylesheet" type="text/css" />
    <link href="/css/oddsFamily.css?v=201408260510" rel="stylesheet" type="text/css" />
	<link href="/css/custom.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <style type="text/css">
<!--
body {
	background-attachment:fixed;
	min-width: 800px;
}
.headerArea{
	width: 100%;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style1 {
	color: #333333
}
-->
</style>
    <script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongfx.com/commJS/jquery.min.js?v=201206260354"></script>
    <script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongfx.com/commJS/common.js?v=201409020504"></script>
    <script language="JavaScript" type="text/javascript" src="/js/UserProfile.js?v=201409020504"></script>

</head>
<body onload="showmessage('<?php echo $message ?>');document.getElementById('txtOldPW').focus();" id="Change_Password">
    <div class="headerArea">
        <div id="bong88logo">
        </div>
    </div>
	<div class="blueArea">
	</div>
	<div class="leftMenuArea left">
		<div class="leftMenuContainer">
			<div class="leftBoxTitle">
				<span class="icon-arrow"></span>Settings
			</div>
			<div id="subnavbg">
				<div id="subnav">
					<a id="mchange_password" href="/index.php?r=user/changePass" class="navon current">
						<span>Change Password</span></a> 
						<a id="mPreferences" href="/index.php?r=user/preferences"
							class="navon "><span>Preferences</span>
							</a>
					<a id="mCSPriority" href="javascript:void(0);" class="navon ">
						<span>Customise Sports Priority</span></a>
				</div>
			</div>
			<div class="leftBoxFoot">
			</div>
		</div>
	</div>
	<div class="userProfilePage left">
		<div class="container">
			
<form id="frmChangePW" name="frmChangePW" method="post" action="" autocomplete="off">
  <div class="titleBar">
    <div class="title">Change Password</div>
    <div class="right"> </div>
  </div>
 
  <div class="tabbox boxStyle">
    <div class="tabbox_F">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="formList">
        <tr>
          <td><label>Current Password</label></td>
          <td><input id="txtOldPW" name="txtOldPW"  size="20" type="password" /></td>
        </tr>
        <tr>
          <td><label>New Password</label></td>
          <td><input id="txtPW" name="txtPW" maxlength="11" size="20"  type="password" /></td>
        </tr>
        <tr>
          <td><label>Confirm New Password</label></td>
          <td><input id="txtConPW" name="txtConPW" maxlength="11" size="20"  type="password" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><span class="color01">* Must be at least 6 characters (10 max) long and is cAsE sEnSiTiVe.</span></td>
        </tr>
        <tr>
          <td colspan="2" height="50"><input id="expiry" name="expiry" type="hidden" value="" />
            <div class="right" style="float:right;"> <a id="btnChangePW" name="btnChangePW" class="button mark" onclick ="return callSubmit('YES');" Title=" Submit"><span>Submit</span></a> <a id="btnReset" name="btnReset" class="button" onclick="resetPW();" title=" Reset"><span>Reset</span></a> 
              <!--input id="btnChangePW" name="btnChangePW" type="submit" value=Submit onclick ="return callSubmit('YES')">
                <input type="reset" name="btnReset" value=Reset id="btnReset"--> 
               
            </div></td>
        </tr>
       
        </tbody>
      </table>
      <input id="hidSubmit" name="hidSubmit" type="hidden" />
      <input id="hidRemindSubmit" name="hidRemindSubmit" type="hidden" />
      <input id="hidLowerCaseOldPW" name="hidLowerCaseOldPW" type="hidden" />
      <input type="hidden" id="hidExDate" name="hidExDate" value="0" />
      <input id="hidEncryptSecCode" name="hidEncryptSecCode" type="hidden" />
      <input id="hidCheckSecRule" name="hidCheckSecRule" type="hidden" value="true" />
      <input id="hidChangeMode" name="hidChangeMode" type="hidden" value="" />
    </div>
    
  </div>
</form>
<input type="hidden" id="hidConPW" name="hidConPW" value="Please enter confirm new password!" />
<input type="hidden" id="hidPW" name="hidPW" value="Please enter new password" />
<input type="hidden" id="hidOldPW" name="hidOldPW" value="Please enter current password" />
<input type="hidden" id="hidPWdiff" name="hidPWdiff" value="New password and confirm new password not the same!" />
<input type="hidden" id="hidExecPW" name="hidExecPW" value="Must be at least 6 characters (10 max) long and is cAsE sEnSiTiVe." />
<input type="hidden" id="hidpwdnotsame" name="hidpwdnotsame" value="The new password can not be the same as the current password!" />
<input type="hidden" id="hidconfirm" name="hidconfirm" value="Change Security Code?" />
<input type="hidden" id="hidSpecialCharactersNewPassword" name="hidSpecialCharactersNewPassword" value="New Password : Special characters are not allowed" />
<input type="hidden" id="hidSpecialCharactersConfirmPassword" name="hidSpecialCharactersConfirmPassword" value="Confirm New Password : Special characters are not allowed" />
		</div>
	</div>
    <div id="footer">
        <div class="userProfileFooter">
            <span>&copy; Copyright 2010-2015. BONG88. All Rights Reserved.</span>
        </div>
    </div>
</body>
</html>
<script language="JavaScript" type="text/JavaScript">
    if (document.all) {
        var tags = document.all.tags("button")
        for (var i = 0; i < tags.length; i++)
            tags(i).outerHTML = tags(i).outerHTML.replace(">", " hidefocus=true>")
    }
</script>
