<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Login',
);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->pageTitle; ?></title>
<link href="http://gtr-1-1.bongstatic.com/template/bong88/public/css/newlogin.css?v=201409101059" rel="stylesheet" type="text/css" />
<link href="http://gtr-1-1.bongstatic.com/template/bong88/public/css/colorbox/colorbox.css?v=201304210435" rel="stylesheet" type="text/css" />
<link href="/css/custom.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongstatic.com/commJS/common.js?v=201409020504"></script>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongstatic.com/commJS/Auth.js?v=201402110710"></script>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongstatic.com/commJS/jquery.min.js?v=201206260354"></script>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongstatic.com/commJS/ping.js?v=201301020620"></script>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongstatic.com/commJS/jquery.colorbox-min.js?v=201304230727"></script>

<!-- nivo-slider -->

</head>

<body onLoad="">

  <div class="header">
  <div class="container" style="width:974px;"><span href="#" class="logo"></span>
      <div class="loginPanel">
        
       
				
<!-- START langMenu for iPad -->

	<ul id="ipadlangmenu"  class="langMenu" style="display:none;">
		<li lang='en' class=''>English</li>
<li lang='ch' class=''>繁體中文</li>
<li lang='jp' class=''>日本語</li>
<li lang='vn' class='selected'>Tiếng Việt</li>

	</ul>
<!-- END langMenu for iPad -->
				
        
      <!-- end .header --></div></div>
      </div>
      <div class="container">    
    <div class="content">
    
		<div class="form-register">
		
			<form method="post" id="register-form">
				<div class="row">
				
					<p><?php echo $message ?></p>
				
				</div>
				<div class="row">
					<span class="titleInput">Username</span>
					<input id="txtID" name="regForm[username]" type="text" maxlength="20" size="10" />
				</div>
				<div class="row">
					<span class="titleInput">Password</span>
					<input id="password" name="regForm[password]" type="password" maxlength="20" size="10" />
				</div>
				<div class="row">
					<span class="titleInput">Email</span>
					<input id="" name="regForm[email]" type="text" maxlength="200" size="10" />
				</div>
				<div class="row">
					<span class="titleInput">E-Bank</span>
					<select name="regForm[ToBankName]">
						<option value="WMZ">Webmoney</option>
						<option value="PM">PerfectMoney</option>
						<option value="BTC">Bitcoin</option>
					</select>
				</div>
				<div class="row">
					<span class="titleInput">Bank's Account number</span>
					<input id="" name="regForm[ToAccount]" type="text" maxlength="100" size="10" />
				</div>
				<div class="row">
					<span class="titleInput">Full Name</span>
					<input id="" name="regForm[fullName]" type="text" maxlength="200" size="10" />
				</div>
				<div class="row">
					<span class="titleInput">Verify Code</span>
					<input id="" name="regForm[verifyCode]" type="text" maxlength="20" size="10" />
					<?php $this->widget('CCaptcha',array('captchaAction'=>'site/captcha','showRefreshButton'=>false,'clickableImage'=>true)); ?>
					
				</div>
				<div class="row">
					
					<input type="submit" name="submit" value="Register"/>
				</div>
			</form>
		
		</div>
	
	</div>
    <div class="contactBar">Customer service, Please contact. <span class="detail"><strong>Skype: </strong><a href="skype://cs.ibetpm">cs.ibetpm</a><strong>Yahoo Messenger: </strong><a href="mailto:cs.ibetpm@Yahoo.com">cs.ibetpm@Yahoo.com</a><strong>Email: </strong><a href="mailto:cs.ibetpm@gmail.com">cs.ibetpm@gmail.com</a></span>

    </div>
    <div class="footer">
      <p>&copy; Copyright 2010-2014. ibetpm.com. All Rights Reserved. </p>
      <!-- end .footer --></div>
    <!-- end .container --></div>



</body>
</html>
