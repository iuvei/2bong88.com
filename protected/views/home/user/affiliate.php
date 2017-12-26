
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Preferences</title>
    <link href="http://gtr-1-1.bongcdn.com/template/sportsbook/public/css/TVstreaming.css?v=201409101105" rel="stylesheet" type="text/css" />
    <link href="http://gtr-1-1.bongcdn.com/template/sportsbook/public/css/table_w.css?v=201409050447" rel="stylesheet" type="text/css" />
    <link href="http://gtr-1-1.bongcdn.com/template/sportsbook/public/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
    <link href="http://gtr-1-1.bongcdn.com/template/sportsbook/public/css/global.css?v=201409101100" rel="stylesheet" type="text/css" />
    <link href="http://gtr-1-1.bongcdn.com/template/sportsbook/public/css/menu.css?v=201408080405" rel="stylesheet" type="text/css" />
    <link href="http://gtr-1-1.bongcdn.com/template/sportsbook/public/css/infocss.css?v=201409120949" rel="stylesheet" type="text/css" />
    <link href="http://gtr-1-1.bongcdn.com/template/sportsbook/public/css/oddsFamily.css?v=201408260510" rel="stylesheet" type="text/css" />
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
    <script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/jquery.min.js?v=201206260354"></script>
    <script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/common.js?v=201409020504"></script>
    <script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/UserProfile.js?v=201409020504"></script>
	<script type="text/javascript">
		var windowsHandle = new Array();
		function openWindowsHandle(winName ,Condition,msg, url , winpara ,iscallback,callbackfunc)
			{
			   if(!iscallback && userBrowser() == "Firefox")
			   {
				   setTimeout(function(){openWindowsHandle(winName,Condition,msg,url,winpara,true,callbackfunc)} ,1 );
				   return ;
			   }
				
				if (Condition) {
					var isNewOpen=false;
					if (windowsHandle[winName] == null || windowsHandle[winName].closed 
						   || (userBrowser()=="Safari" && windowsHandle[winName].length ==0)) {
						var strURL = url;
						if(winpara==null) winpara="";
						windowsHandle[winName] = window.open(strURL , winName, winpara);
						isNewOpen=true;
						if(windowsHandle[winName] ==null) alert(RES_BlockPopMsg);
					} else {
						windowsHandle[winName].focus();
					}
					if(callbackfunc!=null) callbackfunc(windowsHandle[winName],isNewOpen);
					
				} else {
					alert(msg);
				}
			}

		function OpenListPage(theURL, height, width)
		{
			var callback =  function(Handle,isNewOpen)
			{
				if(!isNewOpen)
				{
					Handle.location=theURL;
				}
			}
			
		   openWindowsHandle("UserInfoPop",
								   true,
								   "",
								   theURL,
								   "height="+height+", width="+width+", top=0, left=0, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no",                           
								   false,
								   callback);
		}
	
	</script>
</head>
<body onload="showmessage('');" id="">
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
					<a id="mchange_password" href="/index.php?r=user/changePass" class="navon ">
						<span>Change Password</span></a>
						<a id="mPreferences" href="/index.php?r=user/preferences"
							class="navon current"><span>Preferences</span>
						</a>
					<a id="mCSPriority" href="UserProfile_CSPriority.aspx" class="navon ">
						<span>Customise Sports Priority</span></a>
				</div>
			</div>
			<div class="leftBoxFoot">
			</div>
		</div>
	</div>
	<div class="userProfilePage left">
		<div class="container">
			
    <div class="titleBar">
		<div class="title">Affiliate</div>
	</div>
    <!--<form id="frmPreferences" name="frmPreferences" method="post" action="UserProfile_Preferences.aspx">-->
	<div class="tabbox boxStyle">
<p>Our affiliate program is the best way for web-site owners to earn additional money by linking their sites to Ibetpm.com. Also none website owners may earn from your affiliate program by using links on chat rooms, blogs, forums etc.</p>

<p><strong>Advantages of our partners program :</strong></p>

<ul>
	<li><strong>28%</strong>&nbsp;revenue share</li>
	<li>no formalities</li>
	<li>profit from your affiliation for lifetime</li>
</ul>
<br></br>
<p><strong>Simple rules :</strong></p>

<ol>
	<li>each user of Ibetpm.com can be an affiliate &ndash; you don&rsquo;t have to run a company, issue us invoices</li>
	<li>all you earn is all you get &ndash; there are no taxes we want you to pay</li>
	<li>your Ibetpm.com account will be provided with the earned commission each&nbsp;<strong>first day of next month</strong></li>
	<li>the earned commission you can withdraw or bet on our site without any limits</li>
	<li>one acquired client will generate profit for you for lifetime</li>
	<li><strong>the program starts after customer lost on bet</strong></li>
</ol>

<p><strong>How it works:</strong></p>

<ol>
	<li>you start with registering to Ibetpm.com</li>
	<li>on &quot;Preferences&quot; you will find&nbsp;<a href="http://www.Ibetpm.com/index.php?r=user/dataRef">Your data Reffer</a>&nbsp;for your choice</li>
	<li>after placing the link or banner on your website &ndash; it&rsquo;s ready</li>
	<li>each acquired client which will register coming from your site will be assigned to your affiliate program earnings</li>
	<li>we give you 28% of net profit generated for us by the client acquired by you</li>
	<li>for lifetime your account will be provided with the commission you earn each month clients acquired by you generate profit for us</li>
	<li>undecided slips in the previous month are counted for the next month turnover</li>
	<li>and after receiving payment you can withdraw it or bet on Ibetpm.com</li>
</ol>

<p>Stats and reports for our affiliate program are registered only by promotional materials from Ibetpm.com system, it means such a materials that were downloaded or linked/copied from our gallery and was added to &quot;your promotional materials&quot;.</p>

<p><strong>Attention!</strong><br />
Accounts opened from the same IP address as affiliates, indicating the close relation with the affiliate (family members) or even himself (in particular erasing cookies files, similar data entires, sessions, etc. indicating the coaxing) will be excluded from the affiliates account.<br />
Repeating attempts of such a coaxing will not be tolerated and will result in deleting of affiliate account.<br />
For more information send an e-mail to :&nbsp;<a href="mailto:affiliate@Ibetpm.com">affiliate@Ibetpm.com</a></p>

<p>&nbsp;</p>

    </div>
    <!--</form>-->
		</div>
	</div>
    <div id="footer">
        <div class="userProfileFooter">
            <span>&copy; Copyright 2010-2012. ibetpm.com. All Rights Reserved.</span>
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
