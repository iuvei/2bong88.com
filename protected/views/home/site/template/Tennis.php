<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tennis</title>
<link href="/css/table_w.css?v=201502050407" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css?v=201412230650" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript">
var REFRESH_INTERVAL_L = 20000;
var REFRESH_INTERVAL_D = 60000;
var REFRESH_COUNTDOWN = 720; //60;
var RES_REFRESH = "Refresh";
var RES_PLEASE_WAIT = "Please Wait";
var RES_ODD = "O";
var RES_EVEN = "E";
var RES_UNDER = "u";
var RES_LIVE = "Live";
var PAGE_MARKET="t";
var RES_POINTS3="Pts";
var RES_TIEBREAK3="Tiebreak";
var RES_POINTS5="Pts";
var RES_TIEBREAK5="Tiebreak";
var RES_ADVANTAGE_HINT="Advantage";
var RES_POINTS_HINT="Points";
var RES_TIEBREAK_HINT="Tiebreak";
var RES_NormalSort="Normal Sorting";
var RES_SortByTime="Sort by Time";
var RES_MORE_UNDER="Under";
var RES_MORE_OVER="Over";
var RES_MORE_ODD="Odd";
var RES_MORE_EVEN="Even";
var RES_MORE_YES="Yes";
var RES_MORE_NO="No";
var RES_MORE_NOTIEBREAK="No Tiebreak";
var RES_MORE_NEITHER="Neither";
var RES_MORE_EXACTLY="Exactly";
var RES_MORE_TIE = "Tie";
</script>
<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js?v=201206260354"></script>
<script language="JavaScript" type="text/javascript" src="js/getDataClass.js?v=201206270324"></script>
<script language="JavaScript" type="text/javascript" src="js/ajaxData.js?v=201302271550"></script>
<script language="JavaScript" type="text/javascript" src="js/MultiSport_Def.js?v=201412230650"></script>
<script language="JavaScript" type="text/javascript" src="js/OddsUtils.js?v=201502061011"></script>
<script language="JavaScript" type="text/javascript" src="/js/OddsKeeper.js?v=201412300417"></script>
<!--<script language="JavaScript" type="text/javascript" src="commJS/odds/Tennis_Def.js?v=201205311342"></script>-->
<script language="JavaScript" type="text/javascript" src="js/Tennis.js?v=<?php echo time(); ?>"></script>
<script language="JavaScript" type="text/javascript" src="js/DivLauncher.js?v=201310290839"></script>
<script language="JavaScript" type="text/javascript" src="js/LiveScore.js?v=201408260510"></script>
<script language="JavaScript" type="text/javascript" src="js/streaming.js?v=201501130542"></script>
<script language="JavaScript" type="text/javascript" src="js/common.js?v=201502050407"></script>
<script language="JavaScript" type="text/javascript" src="js/more.js?v=201501120537"></script>
</head>

<body id="Tennis" onload="OverWriteFormSubmit();refreshAll();checkHasParlay('t','5');">
<iframe name='DataFrame_L' src="" style="display: none"></iframe>
<iframe name='DataFrame_D' src="" style="display: none"></iframe>
<div class="titleBar">
    <div class="title">
	<?php 

		switch($sport)
		{
		
			case 5: echo "Tennis / Today ";
			break;
			case 4: echo "Ice Hockey / Today";
			break;
			case 7: echo "Snooker/Pool / Today ";
			break;
			case 10: echo "Golf / Today ";
			break;
			default: echo "Tennis / Today ";
		
		}

	?>
	
	</div>
    <div class="right">
        <a id="b_SwitchToParlay" href="javascript:SwitchToParlay('5');" class="button mark" style="display:none" title="Parlay"><span>Parlay</span></a>
        <!--<div id="selLeagueType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selLeagueType',event);return false;" onclick="onClickSelecter('selLeagueType');" class="button select icon">
<input type="hidden" name="selLeagueType" id="selLeagueType" value="0" />
<span  id="selLeagueType_Txt" title='All Markets'><div id="selLeagueType_Icon" class="icon_All"></div></span>
<ul id="selLeagueType_menu" class="submenu">
<li  title='All Markets' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'0',true);changeLeagueType(0);"><div class="icon_All"></div>All Markets</li>
<li  title='Main Markets' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'1',true);changeLeagueType(1);"><div class="icon_Main"></div>Main Markets</li>
</ul>
</div>
-->
        <!--<a id="aSorter" href="javascript:setRefreshSort();" class="button"><span id="t_Order"><div id="aSorter_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('aSorter',event);return false;" onclick="onClickSelecter('aSorter');" class="button select icon">
<input type="hidden" name="aSorter" id="aSorter" value="0" />
<span  id="aSorter_Txt" title='Normal Sorting'><div id="aSorter_Icon" class="icon_NO"></div></span>
<ul id="aSorter_menu" class="submenu">
<li  title='Sort by Time' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);"><div class="icon_ST"></div>Sort by Time</li>
<li  title='Normal Sorting' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);"><div class="icon_NO"></div>Normal Sorting</li>
</ul>
</div>
</span></a>-->
        <div id="aSorter_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('aSorter',event);return false;" onclick="onClickSelecter('aSorter');" class="button select icon">
<input type="hidden" name="aSorter" id="aSorter" value="0" />
<span  id="aSorter_Txt" title='Normal Sorting'><div id="aSorter_Icon" class="icon_NO"></div></span>
<ul id="aSorter_menu" class="submenu">
<li  title='Sort by Time' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);"><div class="icon_ST"></div>Sort by Time</li>
<li  title='Normal Sorting' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);"><div class="icon_NO"></div>Normal Sorting</li>
</ul>
</div>

        <a href="javascript:openLeague(640,'Select League','t','5','1,2,3,20,1301,1303,1305,1306','0','Tennis');" class="button selectLeague" title="Select League">
        	<span>
            <div id="League_New" class="displayOff">
              <div id="SelLeagueIcon">
                <div class="icon">
                </div>
              </div>
              <div class="events">
                <div class="normal">(</div><div id="CustSelL" class="selected"></div><div id="AllSelL" class="normal"></div><div class="normal">/</div><div id="TotalLeagueCnt" class="normal"></div><div class="normal">)</div>
              </div>
              Leagues</div>
            <div id="League_Old">
              Select League</div>
            </span>
        </a>
        
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




	<div id='OddsTr' style="display: none">
		<div id="divSelectDate" class="board" style="display:none">
              <ul class="panelInfo">
                <li><span class="title" onclick="selectDate(this,'');" style="cursor:pointer;color:{{spnSelectDate_Color_0}}">{{lbl_all}}</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_1}}');" style="cursor:pointer;color:{{spnSelectDate_Color_1}}">{{day_1}} {{month_1}}({{week_1}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_2}}');" style="cursor:pointer;color:{{spnSelectDate_Color_2}}">{{day_2}} {{month_2}}({{week_2}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_3}}');" style="cursor:pointer;color:{{spnSelectDate_Color_3}}">{{day_3}} {{month_3}}({{week_3}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_4}}');" style="cursor:pointer;color:{{spnSelectDate_Color_4}}">{{day_4}} {{month_4}}({{week_4}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_5}}');" style="cursor:pointer;color:{{spnSelectDate_Color_5}}">{{day_5}} {{month_5}}({{week_5}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_6}}');" style="cursor:pointer;color:{{spnSelectDate_Color_6}}">{{day_6}} {{month_6}}({{week_6}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_7}}');" style="cursor:pointer;color:{{spnSelectDate_Color_7}}">{{day_7}} {{month_7}}({{week_7}})</span></li>
              </ul>
            </div>
			<div class="tabbox">
				<div class="tabbox_F" id="oTableContainer_L"></div>
				<div class="tabbox_F" id="oTableContainer_D"></div>
			</div>
</div>
			<div id="TrNoInfo"  style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;">There are no games available at the moment.</td>
                </tr>
            </table>
            </div>
			<div id="BetList" align="center"><img src="/images/loading.gif" vspace="2" /></div>
		</td>


<form action="/index.php?r=site/TennisData" target="DataFrame_L" name="DataForm_L" style="display: none">
	<input type="hidden" name="Sport" value="<?php echo $sport ?>" />
	<input type="hidden" name="Market" value="l" />
	<input type="hidden" name="DT" value="" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="Game" value="0" />
    <input type="hidden" name="OrderBy" value="0" />
	<input type="hidden" name="OddsType" value="4" />
    <input type="hidden" name="MainLeague" value="0" />
	<input type="hidden" name="key" value="" />
</form>

<form action="/index.php?r=site/TennisData" target="DataFrame_D" name="DataForm_D" style="display: none">
	<input type="hidden" name="Sport" value="<?php echo $sport ?>" />
	<input type="hidden" name="Market" value="t" />
	<input type="hidden" name="DT" value="" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="Game" value="0" />
    <input type="hidden" name="OrderBy" value="0" />
	<input type="hidden" name="OddsType" value="4" />
    <input type="hidden" name="MainLeague" value="0" />
	<input type="hidden" name="key" value="" />
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
<div id="Tennis_More" style="display:none"></div>
</body>
</html>
