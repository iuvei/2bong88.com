
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign in</title>
<link href="/css/newlogin.css?v=201502100732" rel="stylesheet" type="text/css" />
<link href="/css/appDownload.css?v=201405220620" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="js/common.js?v=201502050407"></script>

<script language="JavaScript" type="text/javascript" src="js/jquery.min.js?v=201206260354"></script>

<script language="JavaScript" type="text/javascript" src="js/jquery.colorbox-min.js?v=201304230727"></script>
<script type="text/javascript">


    var error_username = "Please enter username";
    var error_password = "Please enter password";
    var error_validation = "Please enter validation ";
    var topFrameTimeOut;
    // Changed language
    function changeLan(selValue) {
        document.frmChangeLang.hidSelLang.value = selValue;
        document.frmLogin.hidubmit.value = '';
        document.frmChangeLang.submit();
    }
    function makeSelectItemByValue(selectId, sOptionValue) {
        var oSelect = document.getElementById(selectId);
        for (index = 0; index < oSelect.length; index++) {
            if (oSelect[index].value == sOptionValue) {
                oSelect[index].selected = true;
                break;
            }
        }
    }
    var i = 0;
    function reloadValidatecode() {
        i++;
        document.getElementById('validateCode').src = 'login_code.aspx?' + i;
    }

    function AutoRefreshHeadPage() {
       return;
    }
	function fxn(a, b) {
    if (a.keyCode == 13) {
        if (b == "D") {
            document.getElementById('frmLogin').submit();
        } else {
            document.getElementById('frmLogin').submit();
        }
    }
}


</script>

<script>
    $(document).ready(function () {
        // langMenu for iPad
        // is Pad
        if (CheckIsIpad()) {
            $("body").addClass("isPad");
            $("#notipadlangmenu").hide();
            $("#ipadlangmenu").show();
            $(".langMenu li").click(function () {
                changeLan($(this).attr("lang"));
                $(this).addClass("selected");
            })
        }
        document.getElementById('IsSSL').value = (window.location.protocol == 'https:' ? '1' : '0');
        AutoRefreshHeadPage();
        
         
    });
</script>
<?php if($errors!=null){ ?>
	<script>
	
		<?php 
			foreach($errors as $error)
			{
				foreach($error as $s)
				{
					?>
					alert("<?php echo $s ?>");
				<?php }
			}
		?>
	
	</script>
<?php }?>
<!-- nivo-slider -->
<link href="/css/nivo-slider.css?v=201309170928" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('#slider').nivoSlider({
            effect: 'boxRandom',
            pauseTime: 6000
        });
    });
</script>
<style type ="text/css">
    .logoDemo {
	background-image:url(./template/bong88/public/images/layout/logo_bong88_DM.png?v=20140502);
	background-repeat:no-repeat;
	float:left;
	width:190px;
	height:55px;
	margin-top:6px;
	margin-left:5px;
    }
</style>
</head>

<body onLoad="document.getElementById('txtID').focus();">
<form id="frmLogin" name="frmLogin" method="post" action="" onKeyPress="return fxn(event,'D');">
  <div class="header">
  <div class="container" style="width:974px;"><span href="#" class="logo"></span>
      <div class="loginPanel">
        
        <div id="notipadlangmenu" class="loginRow" >
                    <span class="titleInput">
                    Language</span>
                    <div class="langFormPos">
                        <div class="langForm">
                            <span>
                                <label>
          <select id="selLang" name="selLang" onChange="changeLan(this[this.selectedIndex].value);">
            
            <option  value="en">English</option>
            
            <option  value="ch">繁體中文</option>
            
            <option  value="jp">日本語</option>
            
            <option  value="vn">Tiếng Việt</option>
            
          </select>
          <script language="javascript" type="text/javascript">              makeSelectItemByValue('selLang', 'en');</script> 
        </label>
                            </span>
                        </div>
                    </div>
                </div>
				
<!-- START langMenu for iPad -->
	<ul id="ipadlangmenu"  class="langMenu" style="display:none;">
		<li lang='en' class='selected'>English</li>
<li lang='ch' class=''>繁體中文</li>
<li lang='jp' class=''>日本語</li>
<li lang='vn' class=''>Tiếng Việt</li>

	</ul>
<!-- END langMenu for iPad -->
				
                 <div class="loginRow">
        <span class="titleInput">Username</span>
        <input id="txtID" name="LoginForm[username]" type="text" maxlength="20" size="10" />
        <span class="titleInput">Password</span>
        <input id="txtPW" name="LoginForm[password]" type="password" maxlength="12" size="10" />
        <span id="txtDisplay" style="display:none">   
        <span class="titleInput"> Validation</span>
        <input id="txtCode" name="txtCode" type="text" maxlength="5" size="5" value="8374"/>
        </span>
             
        <label>
          <input id="hidubmit" name="hidubmit" type="hidden" />
          <input id = "IEVerison" type=hidden name="IEVerison" value="0" />
          <input type="hidden" id="detecResTime" name="detecResTime" value="" />
<input id="IsSSL" name="IsSSL" type="hidden" />
<input id="PF" name="PF" type="hidden" value="Default" />
        </label>
        <div class="loginBtnPos">
                    	<a href="#" class="button" onclick="javascript: document.getElementById('frmLogin').submit();"><span>Go</span></a>
                    </div>
        <!--<a href="#" class="button login" onclick="return(callSubmit());"><span>Go</span></a>--></div>
      <!-- end .header --></div></div>
      </div>
      <div class="container">    
     <div class="content">
      <div class="mainImg">
      	<div id="slider" class="nivoSlider">
            

<a><img src='/images/add/ad_IronFist.jpg?v=20150204001' /></a>
<a><img src='/images/add/ad_E-Sports.jpg?v=20140917002' /></a>
<a><img src='/images/add/ad_smartphoneInterface.jpg' /></a>

        </div>
      </div>
      <!-- end .content --></div>
     
      
    <div class="contactBar">Customer service, please contact. <span class="detail"><strong>Skype: </strong><a href="skype://bong88.csd">bong88.csd</a><strong>Yahoo Messenger: </strong><a href="mailto:bong88csd@Yahoo.com">bong88csd@Yahoo.com</a><strong>Email: </strong><a href="mailto:csd@bong88.com">csd@bong88.com</a></span>

    </div>
    <div class="footer">
      <p>&copy; Copyright 2010-2015. BONG88. All Rights Reserved. </p>
      <!-- end .footer --></div>
    <!-- end .container --></div>
</form>
<form id="frmChangeLang" name="frmChangeLang" method="post" action="login888.aspx">
  <input id="hidSelLang" name="hidSelLang" type="hidden" />
</form>
</body>
</html>
