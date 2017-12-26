
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mix Parlay</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="/css/table_w.css?v=201502050407" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css?v=201412230650" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript">
var REFRESH_INTERVAL = 60000;
var REFRESH_INTERVAL_L = 20000;
var REFRESH_INTERVAL_D = REFRESH_INTERVAL;
var RES_LIVE = "Live";
var REFRESH_COUNTDOWN = 720; //60;
var RES_REFRESH = "Refresh";
var RES_PLEASE_WAIT = "Please Wait";
var RES_ODD = "O";
var RES_EVEN = "E";
var RES_UNDER = "u";
var RES_MORE = "More Bet Types";
var SPORT_TYPE = "1";
var RES_DRAW = "Draw";
var PAGE_MARKET = "t";
var RES_NoParlayMsg = "There are not enough matches (at least 2 matches) to place for Mix Parlay";
var RES_DAY = new Array(8);
RES_DAY[0] = "All";
RES_DAY[1] = "11 Feb(Wed)";
RES_DAY[2] = "12 Feb(Thu)";
RES_DAY[3] = "13 Feb(Fri)";
RES_DAY[4] = "14 Feb(Sat)";
RES_DAY[5] = "15 Feb(Sun)";
RES_DAY[6] = "16 Feb(Mon)";
RES_DAY[7] = "17 Feb(Tue)";
RES_2selections = "2 Selections";
RES_Allselections="All Selections";
var RES_POINTS3="Pts";
var RES_TIEBREAK3="Tiebreak";
var RES_POINTS5="Pts";
var RES_TIEBREAK5="Tiebreak";
var RES_ADVANTAGE_HINT="Advantage";
var RES_POINTS_HINT="Points";
var RES_TIEBREAK_HINT="Tiebreak";
var RES_MORE_UNDER = "Under";
var RES_MORE_OVER = "Over";
var RES_MORE_ODD = "Odd";
var RES_MORE_EVEN = "Even";
var RES_MORE_YES = "Yes";
var RES_MORE_NO = "No";
var RES_MORE_NOTIEBREAK = "No Tiebreak";
var RES_MORE_NEITHER = "Neither";
var RES_MORE_EXACTLY = "Exactly";
var RES_MORE_TIE = "Tie";
</script>
<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js?v=201206260354"></script>
<script language="JavaScript" type="text/javascript" src="/js/getDataClass.js?v=201206270324"></script>
<script language="JavaScript" type="text/javascript" src="/js/ajaxData.js?v=201302271550"></script>
<script language="JavaScript" type="text/javascript" src="/js/MultiSport_Def.js?v=201412230650"></script>
<script language="JavaScript" type="text/javascript" src="/js/cookie.js?v=200803031653"></script>
<script language="JavaScript" type="text/javascript" src="/js/OddsUtils.js?v=201502061011"></script>
<script language="JavaScript" type="text/javascript" src="/js/more.js?v=201501120537"></script>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/OddsKeeper.js?v=201412300417"></script>
<!--<script language="JavaScript" type="text/javascript" src="commJS/odds/SportsMixParlay_Def.js?v=201205230900"></script>-->
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/odds/SportsMixParlay.js?v=201412230650"></script>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/DivLauncher.js?v=201310290839"></script>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/LiveScore.js?v=201408260510"></script>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/streaming.js?v=201501130542"></script>
<script language="JavaScript" type="text/javascript" src="/js/common.js?v=201502050407"></script>
</head>

<body id="MixParlay" onload="OverWriteFormSubmit();refreshAll();">
<iframe name='DataFrame_D' src="" style="display:none"></iframe>
<iframe name='DataFrame_L' src="" style="display: none"></iframe>
<div class="titleBar">
    <div class="title">Mix Parlay</div>
    <div class="right">
        <!--<a id="t_Order" href="javascript:setRefreshSort();" class="button"><span id="aSorter">Sort by Time</span></a>-->
        <!--{{Label_OrderBy}}-->
        <a href="javascript:openLeague(640,'Select League','t','0','','1','SportsMixParlay');" class="button selectLeague" title="Select League">
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

        <a id="btn_filterCombo" href="javascript:filterCombo();" class="button mark" title="2 Selections"><span id="selections">2 Selections</span></a>              
        <a id="t_Order" href="javascript:returnSport();" class="button mark" title="Today"><span>Today</span></a>        
		<a href="MixParlayHelp.aspx?r_sport=1" target="MixParlayHelp" class="button" title="Help"><span>Help</span></a>
		<a href="javascript:refreshData_D();" id="btnRefresh_D" class="button disable" style="display:none" title="Please Wait"><span><div class="icon-refresh"></div>Please Wait</span></a>
		<a href="javascript:refreshData_L();" id="btnRefresh_L" class="button disable" style="display:none" title="Please Wait"><span><div class="icon-refresh"></div>Please Wait</span></a>
    </div>
</div>

<div class="board" id="menu" style="display:none">
	<ul class="panelInfo checkbox" id="DateContainer" style="display:none">
	</ul>
	<ul class="panelInfo checkbox" id="SportsContainer"></ul>
</div>

		<div class="tabbox">
			    <div id='OddsTr_L' style="display:none">
			        <div class="tabbox_F" id="oTableContainer_1_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_2_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_32_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_3_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_4_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_5_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_6_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_7_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_8_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_9_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_10_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_11_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_12_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_13_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_14_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_15_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_16_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_17_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_18_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_19_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_20_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_21_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_22_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_23_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_24_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_25_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_26_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_27_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_28_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_29_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_30_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_31_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_33_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_34_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_35_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_36_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_37_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_38_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_39_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_40_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_41_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_42_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_43_L" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_99_L" style="display:none"></div>
			    </div>
			    <div id='OddsTr' style="display:none">			    
				    <div class="tabbox_F" id="oTableContainer_1" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_2" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_32" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_3" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_4" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_5" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_6" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_7" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_8" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_9" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_10" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_11" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_12" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_13" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_14" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_15" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_16" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_17" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_18" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_19" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_20" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_21" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_22" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_23" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_24" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_25" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_26" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_27" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_28" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_29" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_30" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_31" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_33" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_34" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_35" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_36" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_37" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_38" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_39" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_40" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_41" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_42" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_43" style="display:none"></div>
				    <div class="tabbox_F" id="oTableContainer_99" style="display:none"></div>
				</div> 		
			</div>

            <div id="TrNoInfo"  style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;">There are not enough matches (at least 2 matches) to place for Mix Parlay</td>
                </tr>
            </table>
            </div>
			<div id="TrFilterInfo" style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;">Please re-filter the sport</td>
                </tr>
            </table>
            </div>
			<div id="BetList" align="center"><img src="/images/loading.gif" vspace="2" /></div>


<form action="/index.php?r=site/SportsMixParlayData" target="DataFrame_D" name="DataForm_D" style="display: none">
	<input type="hidden" name="Market" value="d"/>
	<input type="hidden" name="DT" value="{{r_dt}}" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="Sport" value="<?php echo $sport ?>" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="Game" value="0" />
	<input type="hidden" name="OddsType" value="4" />
	<input type="hidden" name="Combo" value="3" />
	<input type="hidden" name="Page" value="SPORTSMIXPARLAY" />
	<input type="hidden" name="key" value="" />
</form>

<form action="/index.php?r=site/SportsMixParlayData" target="DataFrame_L" name="DataForm_L" style="display: none">
	<input type="hidden" name="Market" value="l"/>
	<input type="hidden" name="DT" value="{{r_dt}}" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="Sport" value="<?php echo $sport ?>" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="Game" value="0" />
	<input type="hidden" name="OddsType" value="4" />
	<input type="hidden" name="Combo" value="3" />
	<input type="hidden" name="Page" value="SPORTSMIXPARLAY" />
	<input type="hidden" name="key" value="" />
</form>

<form action="MixParlayPop.aspx" target="PopFrame" name="MoreForm" style="display: none">
	<input type="hidden" name="MatchId" value="" />
	<input type="hidden" name="HomeName" value="" />
	<input type="hidden" name="AwayName" value="" />
	<input type="hidden" name="Sport" value="<?php echo $sport ?>" />
	<input type="hidden" name="Market" value="d" />
	
	<input type="hidden" name="OddsType" value="4" />
</form>

<form action="mixcom/BetProcess.aspx" target="leftFrame" name="BetForm" style="display: none">
	<input type="hidden" name="MId" value="" />
	<input type="hidden" name="OddsId" value="" />
	<input type="hidden" name="Team" value="" />
	<input type="hidden" name="Odds" value="" />
	<input type="hidden" name="Sport" value="<?php echo $sport ?>" />
	<input type="hidden" name="OddsType" value="4" />
	<input type="hidden" name="Sport" value="1" />
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
<div id="Tennis_More" style="display:none"></div>
</body>
</html>
