<?php
 if($model->getErrors()!=null)
 {
	
		foreach($model->getErrors() as $errors)
		{
			foreach($errors as $error)
			{
				echo '<script>alert("'.$error.'");</script>';
			}
		}
	 
 }

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Sign In</title>
    <link href="/assets/stylesheets/agent/SignIn.Moon.css?20141218" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="table_main">
        <h1>Login</h1>
        <div id="center">
            <form method="post" name="fLogin" action=''>
                <table border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="25" align="right" style="color: #FF0000;">&nbsp;</td>
                        <td height="25" align="right" style="color: #FF0000;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="5%" height="10" align="right" style="color: #FF0000;">&nbsp;</td>
                                    <td width="95%" height="10" align="left" valign="top" style="color: #FF0000;">
                                        <div id="errmsg" class="errmsg"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width="1" align="right" valign="middle"></td>
                        <td height="25" align="left" valign="middle">
                            <table width="100%" border="0" cellpadding="1" cellspacing="0">
                                <tr>
                                    <td height="25" align="right" valign="middle">
                                        <div id="spnLanguage" class="language"></div>
                                    </td>
                                    <td align="left" valign="middle">
                                        <select id="selLanguage" onchange="SelectLanguage(this.value)">
                                            <option value="0">English</option>
                                            <option value="1">繁體中文</option>
                                            <option value="4">简体中文</option>
                                            <option value="2">日本語</option>
                                            <option value="3">ภาษาไทย</option>
                                            <option value="5">한국어</option>
                                            <option value="6">Tiếng Việt</option>
                                        </select>
                                        <input type="hidden" value="en-US" id="hidLanguage" name="hidLanguage" />
                                    </td>
                                    <td><span id="spnUserName" style="font-weight: bold;"></span></td>
                                    <td align="left" valign="middle">
                                        <input name="LoginFormAdmin[username]" type="text" id="txtUserName" value="" />
                                    </td>
                                    <td><span id="spnPassWord" style="font-weight: bold;"></span></td>
                                    <td height="25" align="left" valign="middle">
                                        <div id="div1">
                                            <input name="LoginFormAdmin[password]" id="txtPassWord" type="password" />
                                        </div>
                                        
                                    </td>
                                    
                                    <td align="right" valign="middle"><span><input id="btnLogin" type="button" class="buttonsite" value="Login" onclick="return DoLogin()" /></span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="middle"></td>
                        <td align="right" valign="middle">
                            <div id="divBrowser" class="text_brow">Recommended Browsers:</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" valign="middle"></td>
                    </tr>
                </table>
            </form>
            <p>&nbsp;</p>
        </div>
    </div>
</body>

</html>
<script src="/assets/js/bet/Core.js?20141218" type="text/javascript"></script>
<script type="text/javascript">
    var _page = {
        'language': 0,
        'ip': '',
        '__utms': 'F797E5A68C7A38AC76799C78BF528F',
        'domain': 'b88ag.com',
        'captcha': '1124'
    };
	function DoLogin()
	{
		var errObj = "Vui lòng điền tên đăng nhập và mật khẩu";
		if ($('txtUserName').value == "") {
			$("errmsg").innerHTML = errObj;
			$('txtUserName').focus();
			return false;
		}
		if ($('txtPassWord').value == "") {
			$("errmsg").innerHTML = errObj;
			$('txtPassWord').focus();
			return false;
		}
		
		document.fLogin.submit();

		return true;
	}
</script>