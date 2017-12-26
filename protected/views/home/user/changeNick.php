
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="overflow-x:hidden">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/css/infocss.css?v=201411250956" rel="stylesheet" type="text/css" />
<link href="/css/table_w.css?v=201503170547" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201503170547" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
body{background-attachment:fixed;}
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
.style1 {color: #333333}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
    
    function callSubmit()
    {
        if( document.getElementById("txtNickname").value ==''){
            alert(document.getElementById("hidNickname").value);
            return false;
        }
        if( document.getElementById("txtNickname").value.length <5 ||document.getElementById("txtNickname").value.length >15){
            alert(document.getElementById("hidErrLength").value);
            return false;
        }
        document.getElementById("hidSubmit").value = "YES";
        return true;
       
        
    }
    
    function changeNickName()
    {
       if(callSubmit())
       {
          document.getElementById('form1').submit();
       }      
        
    }
    
</script>
</head>
<body onload="document.getElementById('txtNickname').focus();">
<form id="form1" name="form1" method="post" onsubmit="return callSubmit();" action="">
<div class="titleBar">
    <div class="title">Nickname</div>
    <div class="right">
       
    </div>
</div>
    <div class="tabbox">
	  <div class="tabbox_F boxStyle">
	    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="formList">
            <tr>
                <td>
                	<table border="0" cellpadding="0" cellspacing="0" align="center">
                      <tr>
                        <td><label>Nickname</label></td>
                        <td><input id="txtNickname" type="text" <?php echo $user->nickname==""?"":"disabled" ?> name="txtNickname" value="<?php echo $user->nickname ?>" /></td>
                      </tr>
                    </table>
                </td>
            </tr>
          <tr>
            <td>
			<span class="error"> <?php echo $message ?></span>
            <span class="color01">Please choose your favorite Nickname. You may also use this to login to the website.</span>
            <div class="note">
                <div class="noteBorder">
                    <div class="title"><span>Note</span></div>
                    <div class="content"><strong>Once you choose your nickname, you can NOT change it in the future.</strong><br/>
Minimum of 5 and maximum of 15 characters, only alphabet and numeric.</div> 
                </div>
            </div>
            <!--Please choose your favorite Nickname. You may also use this to login to the website.-->
            </td>
          </tr> 
          <tr>
            <td height="50">
            <div class="right" style="float:right;">
            <a id="btnConfirm" name="btnConfirm" class="button mark" onclick ="changeNickName();"><span>Submit</span></a>
            <a id="btnReset" name="btnReset" class="button" onclick="javascript:form1.reset();"><span>Reset</span></a>
            <!--input id="btnConfirm" name="btnConfirm" enabled type="submit" value="Submit">
            <input type="reset" name="btnReset" value=Reset id="btnReset"-->
            </div>
            </td>
          </tr>
        </table>
        <input id="hidSubmit" name="hidSubmit" type="hidden" />
        <input type="hidden" id="hidNickname" name="hidNickname" value="Please Enter Nickname" />
        <input type="hidden" id="hidErrLength" name="hidErrLength" value="Number of character can not be less than 5 or greater than 15" />
        
      </div>
    </div>
</form>
</body>
</html>
