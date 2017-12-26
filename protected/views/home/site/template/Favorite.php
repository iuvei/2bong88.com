
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Favorite</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/table_w.css?v=201502050407" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css?v=201412230650" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript">
var REFRESH_INTERVAL_L = 30000;
var REFRESH_INTERVAL_D = 70000;
var REFRESH_COUNTDOWN = 720; //60;
var RES_REFRESH = "Refresh";
var RES_PLEASE_WAIT = "Please Wait";
var RES_UNDER = "u";
var RES_LIVE = "Live";
var PAGE_MARKET="t";
var RES_DRAW="Draw";
var RES_MORE="More Bet Types";
var RES_DOMAIN = "bong88.com";
var RES_NonFavoriteMsg = "My Favorite list is empty. You will be redirected to the Today's Event Page.";
</script>
<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js?v=201206260354"></script>
<script language="JavaScript" type="text/javascript" src="/js/getDataClass.js?v=201206270324"></script>
<script language="JavaScript" type="text/javascript" src="/js/ajaxData.js?v=201302271550"></script>
<script language="JavaScript" type="text/javascript" src="/js/MultiSport_Def.js?v=201412230650"></script>
<script language="JavaScript" type="text/javascript" src="/js/cookie.js?v=200803031653"></script>
<script language="JavaScript" type="text/javascript" src="/js/OddsUtils.js?v=201502061011"></script>
<script language="JavaScript" type="text/javascript" src="/js/more.js?v=201502130346"></script>
<script language="JavaScript" type="text/javascript" src="/js/OddsKeeper.js?v=201412300417"></script>
<!--<script language="JavaScript" type="text/javascript" src="commJS/odds/Favorite_Def.js?v=20090329"></script>-->
<!--<script language="JavaScript" type="text/javascript" src="commJS/odds/Favorite.js?v=20090204"></script>-->
<script language="JavaScript" type="text/javascript" src="/js/UnderOver.js?v=<?php echo time() ?>"></script>
<script language="JavaScript" type="text/javascript" src="/js/DivLauncher.js?v=201308291802"></script>
<script language="JavaScript" type="text/javascript" src="/js/common.js?v=201502240614"></script>
<script language="JavaScript" type="text/javascript" src="/js/streaming.js?v=201501130542"></script>
<!--<script language="javascript">
function initialFavoriteDisstyle() {
	var oDisstyle = document.getElementById("disstyle");
	switch (window.top.DisplayMode) {
		case "1":
			oDisstyle.options[0].selected = true;
			oDisstyle.removeChild(oDisstyle.options[3]);
			oDisstyle.removeChild(oDisstyle.options[2]);
			break;
		case "1F":
			oDisstyle.options[2].selected = true;
			oDisstyle.removeChild(oDisstyle.options[1]);
			oDisstyle.removeChild(oDisstyle.options[0]);
			break;
		case "1H":
			oDisstyle.options[3].selected = true;
			oDisstyle.removeChild(oDisstyle.options[1]);
			oDisstyle.removeChild(oDisstyle.options[0]);
			break;
		default:
			oDisstyle.options[1].selected = true;
			oDisstyle.removeChild(oDisstyle.options[3]);
			oDisstyle.removeChild(oDisstyle.options[2]);
			break;	
	}
}

</script>-->

</head>

<body id="Favorite" onload="initialDisstyle('3');refreshAll();">
<iframe name='DataFrame_L' src="" style="display: none"></iframe>
<iframe name='DataFrame_D' src="" style="display: none"></iframe>
<iframe name='fav' id='fav' src="" style="display: none"></iframe>
<div class="titleBar">
    <div class="title">My Favorite</div>
    <div class="right">
         <div id="disstyle_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('disstyle',event);return false;" onclick="onClickSelecter('disstyle');" class="button select icon">
<input type="hidden" name="disstyle" id="disstyle" value="3" />
<span  id="disstyle_Txt" title='Double Line'><div id="disstyle_Icon" class="icon_DL"></div></span>
<ul id="disstyle_menu" class="submenu">
<li  title='Single Line' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1',true);changeDisplayMode('1','bong88.com'); parent.focus();"><div class="icon_SL"></div>Single Line</li>
<li  title='Double Line' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'3',true);changeDisplayMode('3','bong88.com'); parent.focus();"><div class="icon_DL"></div>Double Line</li>
<li  title='Full Time' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1F',true);changeDisplayMode('1F','bong88.com'); parent.focus();"><div class="icon_FT"></div>Full Time</li>
<li  title='Half Time' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1H',true);changeDisplayMode('1H','bong88.com'); parent.focus();"><div class="icon_HT"></div>Half Time</li>
</ul>
</div>

        
        <div id="selOddsType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selOddsType',event);return false;" onclick="onClickSelecter('selOddsType');" class="button select icon">
<input type="hidden" name="selOddsType" id="selOddsType" value="4" />
<span  id="selOddsType_Txt" title='Malay Odds'><div id="selOddsType_Icon" class="icon_MY"></div></span>
<ul id="selOddsType_menu" class="submenu">
<li  title='Hong Kong Odds' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'2',true);changeOddsType(2);"><div class="icon_HK"></div>Hong Kong Odds</li>
<li  title='Decimal Odds' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'1',true);changeOddsType(1);"><div class="icon_Dec"></div>Decimal Odds</li>
<li  title='Malay Odds' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'4',true);changeOddsType(4);"><div class="icon_MY"></div>Malay Odds</li>
</ul>
</div>

        
        <a href="javascript:refreshData_D();" id="btnRefresh_D" class="button disable"><span><div class="icon-refresh" title="Please Wait"></div></span></a>
        <a href="javascript:refreshData_L();" id="btnRefresh_L" class="button disable" style="display:none"><span><div class="icon-refresh" title="Please Wait"></div></span></a>
    </div>
</div>

<!--改版預計刪除 Start-->
<div style="display:none">
			<span id="tdSelPeriod" style="display:none">
				<select id="selPeriod" onchange="changePeriod(this.options[this.selectedIndex].value); parent.focus();" class="select_Line" style="font-size: 11px; color: #FF0000;">
					<option value="1">{{lbl_10before}}</option>
					<option value="2">{{lbl_10after}}</option>
					<option value="0">{{lbl_allMatches}}</option>
				</select>
			</span>
</div>
<!--改版預計刪除 End-->


	<div id='OddsTr' style="display: none">
		<div class="tabbox">
				<div class="tabbox_F" id="oTableContainer_L"></div>
				<div class="tabbox_F" id="oTableContainer_D"></div>
			</div>
		</div>
        
		<div id="TrNoInfo" style="display: none">
  <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
      <td align="center" class="tabtitle" style="border-radius: 0;">Please add games into favorite list.</td>
    </tr>
  </table>
</div>
			<div id="BetList" align="center"><img src="/images/layout/loading.gif" vspace="2" /></div>


<form action="/index.php?r=site/FavoriteData" target="DataFrame_L" name="DataForm_L" style="display: none">
	<input type="hidden" name="Market" value="l" />
	<input type="hidden" name="Sport" value="1" />
	<input type="hidden" name="DT" value="" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="OrderBy" value="0" />
	<input type="hidden" name="Game" value="0" />
	<input type="hidden" name="OddsType" value="4" />
	<input type="hidden" name="key" value="" />
	<input type="hidden" name="r" value="site/FavoriteData" />
</form>

<form action="/index.php?r=site/FavoriteData" target="DataFrame_D" name="DataForm_D" style="display: none">
	<input type="hidden" name="Market" value="t" />
	<input type="hidden" name="Sport" value="1" />
	<input type="hidden" name="DT" value="" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="OrderBy" value="0" />
	<input type="hidden" name="Game" value="0" />
	<input type="hidden" name="OddsType" value="4" />
	<input type="hidden" name="key" value="" />
	<input type="hidden" name="r" value="site/FavoriteData" />
</form>

<form name="MoreForm" action="UnderOverPop.aspx" target="PopFrame" style="display: none">
	<input type="hidden" name="MatchId" />
	<input type="hidden" name="LeagueName" />
	<input type="hidden" name="HomeName" />
	<input type="hidden" name="AwayName" />
	<input type="hidden" name="isParlay" />
	<input type="hidden" name="Market" value ="f" />
</form>

<div id="PopDiv" style="display: none">
	<div class="popupW">
        <div id="PopTitle" class="popupWTitle">
        	<span>
                <div class="popWIcon"></div>
                <div id="PopTitleText" class="popWTitleContain"></div>
                <div id="PopCloser" class="popWClose" title="Close"></div>
            </span>
        </div>
        <div id="oPopContainer" class="popWContain">
        </div>
    </div>
</div>

<iframe name='PopFrame' id='PopFrame' src="" style="display: none" onload="document.getElementById('oPopContainer').innerHTML=this.contentWindow.document.body.innerHTML;"></iframe>
<div id="cm-nav" style="display:none">
    <ul class="cm-nav">
        <li><a href="#L">Large View</a></li>
        <li><a href="#S">Small View</a></li>
    </ul>
</div>
<div id="Soccer_More" style="display:none"></div>
</body>
</html>

