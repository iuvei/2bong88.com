
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
    <script language="JavaScript" type="text/javascript" src="/js/jquery.min.js?v=201206260354"></script>
    <script language="JavaScript" type="text/javascript" src="/js/common.js?v=201409020504"></script>
    <script language="JavaScript" type="text/javascript" src="/js/UserProfile.js?v=201409020504"></script>
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
					<a id="mCSPriority" href="javascript:;" class="navon ">
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
		<div class="title">Preferences</div>
	</div>
    <!--<form id="frmPreferences" name="frmPreferences" method="post" action="UserProfile_Preferences.aspx">-->
	<div class="tabbox boxStyle formArea">
		
		<div class="row">
			<div class="title">Language</div>
			<div id="DefaultLanguage_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('DefaultLanguage',event);return false;" onclick="onClickSelecter('DefaultLanguage');" class="button select">
<input type="hidden" name="DefaultLanguage" id="DefaultLanguage" value="en" />
<span  id="DefaultLanguage_Txt" title='English'>English</span>
<ul id="DefaultLanguage_menu" class="submenu">
<li  title='English' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('DefaultLanguage',this,'en',false);">English</li>
<li  title='繁體中文' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('DefaultLanguage',this,'ch',false);">繁體中文</li>
<li  title='日本語' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('DefaultLanguage',this,'jp',false);">日本語</li>
<li  title='Tiếng Việt' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('DefaultLanguage',this,'vn',false);">Tiếng Việt</li>
</ul>
</div>

			<div class="iconOdds help" onclick="showHelp('langHelp');" title=" Help">
				<div id="langHelp" class="hint" style="visibility: hidden;">Select your prefered default language.</div>
			</div>
		</div>
		<div class="row" id="OddsTypeRow" style="display: ;">
			<div class="title">Odds Type</div>
            <div id="OddsType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('OddsType',event);return false;" onclick="onClickSelecter('OddsType');" class="button select">
<input type="hidden" name="OddsType" id="OddsType" value="4" />
<span  id="OddsType_Txt" title='MY'>MY</span>
<ul id="OddsType_menu" class="submenu">
<li  title='Dec' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('OddsType',this,'1',false);">Dec</li>
<li  title='HK' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('OddsType',this,'2',false);">HK</li>
<li  title='MY' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('OddsType',this,'4',false);">MY</li>
</ul>
</div>

			<div class="iconOdds help" onclick="showHelp('otHelp');" title=" Help">
				<div id="otHelp" class="hint" style="visibility: hidden;">Select your prefered default odds type display.</div>
			</div>
		</div>
		<div class="row">
			<div class="title">Page Type</div>
			<div id="LayoutMode_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('LayoutMode',event);return false;" onclick="onClickSelecter('LayoutMode');" class="button select">
<input type="hidden" name="LayoutMode" id="LayoutMode" value="2" />
<span  id="LayoutMode_Txt" title='Double Line'>Double Line</span>
<ul id="LayoutMode_menu" class="submenu">
<li  title='Single Line' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('LayoutMode',this,'1',false);">Single Line</li>
<li  title='Double Line' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('LayoutMode',this,'2',false);">Double Line</li>
<li  title='Full Time' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('LayoutMode',this,'3',false);">Full Time</li>
<li  title='Half Time' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('LayoutMode',this,'4',false);">Half Time</li>
</ul>
</div>

			<div class="iconOdds help" onclick="showHelp('ptHelp');" title=" Help">
				<div id="ptHelp" class="hint" style="visibility: hidden;">Select your prefered default page type display in both today and early market page.</div>
			</div>
		</div>
		<div class="row">
			<div class="title">Default Stake</div>
            <div id="BetStake_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('BetStake',event);return false;" onclick="onClickSelecter('BetStake');" class="button select">
<input type="hidden" name="BetStake" id="BetStake" value="-1" />
<span  id="BetStake_Txt" title='Disable'>Disable</span>
<ul id="BetStake_menu" class="submenu">
<li  title='Last Bet' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('BetStake',this,'0',false);SwitchUssInput('c');">Last Bet</li>
<li  title='Customise' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('BetStake',this,'',false);SwitchUssInput('o');">Customise</li>
<li  title='Disable' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('BetStake',this,'-1',false);SwitchUssInput('c');">Disable</li>
</ul>
</div>

			<div id="uusSet" class="textInput" style="display:none">UT <input type="text" id="uus" maxlength="10" value="" onKeyup="addCommas(removeCommas(document.getElementById('uus').value));" onKeyPress="return validateOnKP(this, event,this.selectionStart);"></div>
			<div class="iconOdds help" onclick="showHelp('stHelp');" title=" Help">
				<div id="stHelp" class="hint" style="visibility: hidden;">Enable system to automatically input your customise stake and last bet stake.</div>
			</div>
		</div>
        <!--
		<div class="row">
			<div class="title">Express Betting</div>
			{{ExpressBetting_Selecter}}
			<div class="textInput">UUS <input type="text"></div>
			<div class="textInput">UUS <input type="text"></div>
			<div class="iconOdds help">
				<div class="hint" style="visibility: visible;">...(Please provide the discription)</div>
			</div>
		</div>
        -->
		<div class="row">
			<div class="title">Accept Better Odds</div>
			<div id="BetterOdds_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('BetterOdds',event);return false;" onclick="onClickSelecter('BetterOdds');" class="button select">
<input type="hidden" name="BetterOdds" id="BetterOdds" value="1" />
<span  id="BetterOdds_Txt" title='Enable'>Enable</span>
<ul id="BetterOdds_menu" class="submenu">
<li  title='Enable' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('BetterOdds',this,'1',false);">Enable</li>
<li  title='Disable' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('BetterOdds',this,'0',false);">Disable</li>
</ul>
</div>

			<div class="iconOdds help" onclick="showHelp('boHelp');" title=" Help">
				<div id="boHelp" class="hint" style="visibility: hidden;">Allow system to accept better odds if odds fluctuate while you process the bet.</div>
			</div>
		</div>
		<!--<div class="row">
			<div class="title">{{lbl_ShowBanner}}</div>
			{{ShowBanner_Selecter}}
			<div class="iconOdds help" onclick="showHelp('sbHelp');" title=" Help">
				<div id="sbHelp" class="hint" style="visibility: hidden;">{{lbl_ShowBanner_Help}}</div>
			</div>
		</div>-->
        <div class="row">
			<div class="title">Auto Refresh Odds</div>
			<div id="AutoRefresh_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('AutoRefresh',event);return false;" onclick="onClickSelecter('AutoRefresh');" class="button select">
<input type="hidden" name="AutoRefresh" id="AutoRefresh" value="0" />
<span  id="AutoRefresh_Txt" title='Disable'>Disable</span>
<ul id="AutoRefresh_menu" class="submenu">
<li  title='Enable' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('AutoRefresh',this,'1',false);">Enable</li>
<li  title='Disable' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('AutoRefresh',this,'0',false);">Disable</li>
</ul>
</div>

			<div class="iconOdds help" onclick="showHelp('arHelp');" title=" Help">
				<div id="arHelp" class="hint" style="visibility: hidden;">Enable auto refresh odds to automatically refresh the odds displayed in your bet menu.</div>
			</div>
		</div>
        <div class="row">
			<div class="title">Show Score Map</div>
			<div id="ShowScoreMap_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('ShowScoreMap',event);return false;" onclick="onClickSelecter('ShowScoreMap');" class="button select">
<input type="hidden" name="ShowScoreMap" id="ShowScoreMap" value="0" />
<span  id="ShowScoreMap_Txt" title='Disable'>Disable</span>
<ul id="ShowScoreMap_menu" class="submenu">
<li  title='Enable' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('ShowScoreMap',this,'1',false);">Enable</li>
<li  title='Disable' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('ShowScoreMap',this,'0',false);">Disable</li>
</ul>
</div>

			<div class="iconOdds help" onclick="showHelp('smHelp');" title=" Help">
				<div id="smHelp" class="hint" style="visibility: hidden;">Enable system to automatically show score map while placing bet.</div>
			</div>
        <div class="row">
			<div class="title">Default Events Sorting</div>
			<div id="OddsSort_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('OddsSort',event);return false;" onclick="onClickSelecter('OddsSort');" class="button select">
<input type="hidden" name="OddsSort" id="OddsSort" value="1" />
<span  id="OddsSort_Txt" title='Normal Sorting'>Normal Sorting</span>
<ul id="OddsSort_menu" class="submenu">
<li  title='Normal Sorting' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('OddsSort',this,'1',false);">Normal Sorting</li>
<li  title='Sort by Time' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('OddsSort',this,'2',false);">Sort by Time</li>
</ul>
</div>

			<div class="iconOdds help" onclick="showHelp('osHelp');" title=" Help">
				<div id="osHelp" class="hint" style="visibility: hidden;">Select your prefered default events sorting display.</div>
			</div>
		</div>
		<div class="row"  style="display:none">
			<div class="title">Show Live Casino</div>
			<div id="ShowLiveCasino_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('ShowLiveCasino',event);return false;" onclick="onClickSelecter('ShowLiveCasino');" class="button select">
<input type="hidden" name="ShowLiveCasino" id="ShowLiveCasino" value="1" />
<span  id="ShowLiveCasino_Txt" title='Enable'>Enable</span>
<ul id="ShowLiveCasino_menu" class="submenu">
<li  title='Enable' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('ShowLiveCasino',this,'1',false);">Enable</li>
<li  title='Disable' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('ShowLiveCasino',this,'0',false);">Disable</li>
</ul>
</div>

			<div class="iconOdds help" onclick="showHelp('lcHelp');" title=" Help">
				<div id="lcHelp" class="hint" style="visibility: hidden;">Enable system to automatically show live casino events in live market page.</div>
			</div>
		</div>
        <div class="row">
            <div class="title">Market Type</div>
			<div id="MarketType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('MarketType',event);return false;" onclick="onClickSelecter('MarketType');" class="button select">
<input type="hidden" name="MarketType" id="MarketType" value="0" />
<span  id="MarketType_Txt" title='All Markets'>All Markets</span>
<ul id="MarketType_menu" class="submenu">
<li  title='All Markets' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('MarketType',this,'0',false);">All Markets</li>
<li  title='Main Markets' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('MarketType',this,'1',false);">Main Markets</li>
</ul>
</div>

			<div class="iconOdds help" onclick="showHelp('mtHelp');" title=" Help">
				<div id="mtHelp" class="hint" style="visibility: hidden;">Select your prefered market.</div>
			</div>
        </div>
		<div class="row" id="ValidateDiv" style="visibility: hidden;">
			<div class="title">Validation</div>	
			<input id="txtCode" type="text" maxlength="4" name="txtCode" style="position: relative;width: 95px;top: -5px;"/>		
			<img id="validateCode" width="52px" height="19" title=" Refresh" onclick="this.src='login_code.aspx?'+(new Date().getTime());" alt=""  src="login_code.aspx?1"/>			
		</div>		
		<div class="btnArea">
			<a href="#" class="button mark" onclick ="return callPreferencesSubmit('YES');" title=" Submit"><span>Submit</span></a>            
			<!--<a href="#" class="button" onclick="return callPreferencesSubmit('NO');" title=" {{lbl_Reset}}"><span>{{lbl_Reset}}</span></a>-->
            <a href="#" class="button" onclick="RestorePreferences();" title=" Restore to original system default priority"><span>Restore</span></a>
		</div>
	</div>
    <input id="hidSubmit" name="hidSubmit" type="hidden" />
    <input id="hidBetStakeNotNullMessage" name="hidBetStakeNotNullMessage" type="hidden" value="Please enter the amount"/>
    <input id="hidBetStakeNotNumericMessage" name="hidBetStakeNotNumericMessage" type="hidden" value="The amount must be numeric"/>
    <input id="hidBetStakeMoreThenZeroMessage" name="hidBetStakeMoreThenZeroMessage" type="hidden" value="The amount must be greater than zero"/>
    <input id="hidBetSatkeNumbericValueMessage" name="hidBetSatkeNumbericValueMessage" type="hidden" value="Please enter numeric value (without decimal point)" />
    <input id="hiderrlogin_enter_valid" name="hiderrlogin_enter_valid" type="hidden" value="Please enter validation "/>
    </div>
    <!--</form>-->
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
