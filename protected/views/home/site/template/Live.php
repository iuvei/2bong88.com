
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Live</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/table_w.css?v=201502050407" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css?v=201412230650" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript">
    var REFRESH_INTERVAL = 60000;
    var REFRESH_COUNTDOWN = 720; //60;
    var RES_REFRESH = "Refresh";
    var RES_PLEASE_WAIT = "Please Wait";
    var RES_ODD = "O";
    var RES_EVEN = "E";
    var RES_UNDER = "u";
    var RES_OVER = "O";
    var RES_LOW = "L";
    var RES_DOMAIN = "bong88.com";
    var RES_DRAW = "Draw";
    var RES_Game_No = "No.";
    var RES_MORE = "More Bet Types";
    var RES_2nd = "2nd";
    var RES_3rd = "3rd";
    var RES_NOMOREBET = "No More Bet";
    var RES_POINTS3 = "Pts";
    var RES_TIEBREAK3 = "Tiebreak";
    var RES_POINTS5 = "Pts";
    var RES_TIEBREAK5 = "Tiebreak";
    var RES_ADVANTAGE_HINT = "Advantage";
    var RES_POINTS_HINT = "Points";
    var RES_TIEBREAK_HINT = "Tiebreak";
    var RES_B90 = "Number Wheel";
    //var RES_Seconds="Seconds";
    var RES_BingoGameStart = "Game Start:";
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
    var MoreLauncher;
    var PAGE_MARKET = "l";
    function popBingoSeq(MatchId, SelFrom) {
        var oDiv;
        var oDragger;
        var oCloser;

        if (MoreLauncher != null) {
            MoreLauncher.close();
        }

        if (PopLauncher == null) {

            PopLauncher = new DivLauncher(document.getElementById("PopDiv"), document.getElementById("PopTitle"), document.getElementById("PopCloser"));
        }

        document.getElementById("oMoreContainer").innerHTML = "";

        document.BingoSeqForm.MatchId.value = MatchId;
        document.BingoSeqForm.SelFrom.value = SelFrom;
        document.BingoSeqForm.submit();

        oDiv = document.getElementById("MoreDiv");
        oDragger = document.getElementById("MoreTitle");
        oCloser = document.getElementById("MoreCloser");
        var Sender = document.getElementById("BingoPos_" + MatchId);
        MoreLauncher = new DivLauncher(oDiv, oDragger, oCloser);
        var evt = getEvent();
        var iX = evt.clientX - 220;
        if (iX < 10) iX = 10;
        var iY = evt.clientY + 25;
        if (PopLauncher == null) {
            PopLauncher = new DivLauncher(document.getElementById("PopDiv"), document.getElementById("PopTitle"), document.getElementById("PopCloser"));
        }

        PopLauncher.beforeOpen = function (obj) { if (MoreLauncher != null) MoreLauncher.close(); return true; };
        PopLauncher.close();

        MoreLauncher.open(iX, iY);


    }

    function RefpopBingoSeq() {
        document.BingoSeqForm.submit();
    }    
</script>
<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js?v=201206260354"></script>
<script language="JavaScript" type="text/javascript" src="/js/getDataClass.js?v=201206270324"></script>
<script language="JavaScript" type="text/javascript" src="/js/ajaxData.js?v=201302271550"></script>
<script language="JavaScript" type="text/javascript" src="/js/MultiSport_Def.js?v=<?php echo time(); ?>"></script>
<script language="JavaScript" type="text/javascript" src="/js/cookie.js?v=200803031653"></script>
<script language="JavaScript" type="text/javascript" src="/js/OddsUtils.js?v=<?php echo time(); ?>"></script>
<script language="JavaScript" type="text/javascript" src="/js/more.js?v=201501120537"></script>
<script language="JavaScript" type="text/javascript" src="/js/OddsKeeper.js?v=201412300417"></script>

<script language="JavaScript" type="text/javascript" src="/js/Live.js?v=<?php echo time(); ?>"></script>
<script language="JavaScript" type="text/javascript" src="/js/DivLauncher.js?v=201310290839"></script>
<script language="JavaScript" type="text/javascript" src="/js/common.js?v=201502050407"></script>
<script language="JavaScript" type="text/javascript" src="/js/LiveScore.js?v=201408260510"></script>
<script language="JavaScript" type="text/javascript" src="/js/streaming.js?v=201501130542"></script>
<script language="JavaScript" type="text/javascript">
  SelMainMarket = parseInt("0", 10);
</script></head>

<body id="Live" onload="OverWriteFormSubmit();initialDisstyle(); refreshData();checkHasParlay('l','0');showLiveSport('162',parent.leftFrame.showLiveCasino);">
<iframe name='DataFrame' src="" style="display: none"></iframe>
<div class="titleBar">
    <div class="title">Live</div>
    <div class="right">
        <a id="b_SwitchToParlay" href="javascript:SwitchToParlay('0');" class="button mark" style="display:none" title="Parlay"><span>Parlay</span></a>
        <div id="selLeagueType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selLeagueType',event);return false;" onclick="onClickSelecter('selLeagueType');" class="button select icon">
<input type="hidden" name="selLeagueType" id="selLeagueType" value="0" />
<span  id="selLeagueType_Txt" title='All Markets'><div id="selLeagueType_Icon" class="icon_All"></div></span>
<ul id="selLeagueType_menu" class="submenu">
<li  title='All Markets' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'0',true);changeLeagueType(0);"><div class="icon_All"></div>All Markets</li>
<li  title='Main Markets' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'1',true);changeLeagueType(1);"><div class="icon_Main"></div>Main Markets</li>
</ul>
</div>

        <a href="javascript:openLeague(640,'Select League','l','0','','0','Live');" class="button selectLeague" title="Select League">
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

        
        <input type="hidden" id="CanBetNumberMsg" name="CanBetNumberMsg" value="Your account is not able to play Number Game. Please contact your upline to enable Number Game for you." />
        
            <div id="selOddsType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selOddsType',event);return false;" onclick="onClickSelecter('selOddsType');" class="button select icon">
<input type="hidden" name="selOddsType" id="selOddsType" value="4" />
<span  id="selOddsType_Txt" title='Malay Odds'><div id="selOddsType_Icon" class="icon_MY"></div></span>
<ul id="selOddsType_menu" class="submenu">
<li  title='Hong Kong Odds' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'2',true);changeOddsType(2);"><div class="icon_HK"></div>Hong Kong Odds</li>
<li  title='Decimal Odds' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'1',true);changeOddsType(1);"><div class="icon_Dec"></div>Decimal Odds</li>
<li  title='Malay Odds' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'4',true);changeOddsType(4);"><div class="icon_MY"></div>Malay Odds</li>
</ul>
</div>

        
        <a href="#" id="btnRefresh_L"  target="_self"  class="button disable" onclick="refreshData();"><span><div class="icon-refresh" title="Please Wait"></div></span></a>
    </div>
</div>

        
        

			    <div class="tabbox" id="miniLiveCasino" style="border: solid 1px #C8C8C8; margin-bottom:8px; background-color:#FFFFFF;padding:4px;;display:none;">
			      <iframe id="miniLiveCasinoFrame" src="http://LC88.bong88.com/LiveCasinoWebPortal/CasinoLobby.aspx?o=HHYsza3vwXa6NKOEHStwKsQ0bn11Tf8641Xa9hty6vtGbc1GB8BQP%2bOzPti6OXiFrAGHfRDbyoky8MCJJOP9JBLAKFLDbJM1%2bIp2EvR5CERezOUeYpG5jaQ9C4dFYSMuqUuDrJ9ZhmpzuBmIfYeYmf8%2bY%2beRZYDFIJbhrG6i88q3ydEslDeC3w%3d%3d&mode=1" height="250" frameborder="0" scrolling="no" width="774"></iframe>
			    </div>
                <script language="JavaScript" type="text/javascript">
                    if (CheckIsIpad()) {
                        $("#miniLiveCasino").empty();
                        $("#miniLiveCasino").hide();
                    }
				</script> 

<!-- BEGIN LiveCasinoMSG>-->
            <div class="Casino small"  style="margin-bottom:8px;display: none;">
                <div class="main">
                  <div class="Title">Product Upgrade</div>
                  <div class="content">
                    <!--en-->
                    <div class="box">Product upgrade in progress, stay tuned. Thank you for your support.
                      <div class="on">Similar game : <a href="javascript:parent.topFrame.OpenCasino()">Casino</a></div>
                    </div>    
                    <!--cs-->    
                    <div class="box">产品正在升级中，请耐心等待! 谢谢！
                      <div class="on">类似游戏 : <a href="javascript:parent.topFrame.OpenCasino();">娱乐城</a></div>
                    </div>
                  </div>
                </div>
            </div>
<!-- END LiveCasinoMSG>-->
	<div id='OddsTr' style="display: none">
			<div class="tabbox">
			    <div class="tabbox_F" id="oTableContainer_161" style="display:none"></div><div class="tabbox_F" id="oTableContainer_1" style="display:none"></div><div class="tabbox_F" id="oTableContainer_2" style="display:none"></div><div class="tabbox_F" id="oTableContainer_32" style="display:none"></div><div class="tabbox_F" id="oTableContainer_3" style="display:none"></div><div class="tabbox_F" id="oTableContainer_4" style="display:none"></div><div class="tabbox_F" id="oTableContainer_5" style="display:none"></div><div class="tabbox_F" id="oTableContainer_6" style="display:none"></div><div class="tabbox_F" id="oTableContainer_7" style="display:none"></div><div class="tabbox_F" id="oTableContainer_8" style="display:none"></div><div class="tabbox_F" id="oTableContainer_9" style="display:none"></div><div class="tabbox_F" id="oTableContainer_10" style="display:none"></div><div class="tabbox_F" id="oTableContainer_11" style="display:none"></div><div class="tabbox_F" id="oTableContainer_12" style="display:none"></div><div class="tabbox_F" id="oTableContainer_14" style="display:none"></div><div class="tabbox_F" id="oTableContainer_15" style="display:none"></div><div class="tabbox_F" id="oTableContainer_16" style="display:none"></div><div class="tabbox_F" id="oTableContainer_17" style="display:none"></div><div class="tabbox_F" id="oTableContainer_18" style="display:none"></div><div class="tabbox_F" id="oTableContainer_19" style="display:none"></div><div class="tabbox_F" id="oTableContainer_20" style="display:none"></div><div class="tabbox_F" id="oTableContainer_21" style="display:none"></div><div class="tabbox_F" id="oTableContainer_22" style="display:none"></div><div class="tabbox_F" id="oTableContainer_23" style="display:none"></div><div class="tabbox_F" id="oTableContainer_24" style="display:none"></div><div class="tabbox_F" id="oTableContainer_25" style="display:none"></div><div class="tabbox_F" id="oTableContainer_26" style="display:none"></div><div class="tabbox_F" id="oTableContainer_27" style="display:none"></div><div class="tabbox_F" id="oTableContainer_28" style="display:none"></div><div class="tabbox_F" id="oTableContainer_29" style="display:none"></div><div class="tabbox_F" id="oTableContainer_30" style="display:none"></div><div class="tabbox_F" id="oTableContainer_31" style="display:none"></div><div class="tabbox_F" id="oTableContainer_33" style="display:none"></div><div class="tabbox_F" id="oTableContainer_34" style="display:none"></div><div class="tabbox_F" id="oTableContainer_35" style="display:none"></div><div class="tabbox_F" id="oTableContainer_36" style="display:none"></div><div class="tabbox_F" id="oTableContainer_37" style="display:none"></div><div class="tabbox_F" id="oTableContainer_38" style="display:none"></div><div class="tabbox_F" id="oTableContainer_39" style="display:none"></div><div class="tabbox_F" id="oTableContainer_40" style="display:none"></div><div class="tabbox_F" id="oTableContainer_41" style="display:none"></div><div class="tabbox_F" id="oTableContainer_42" style="display:none"></div><div class="tabbox_F" id="oTableContainer_43" style="display:none"></div><div class="tabbox_F" id="oTableContainer_99" style="display:none"></div>
				
			</div>
		</div>
			<div id="TrNoInfo" style="display: none">
             <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;">There are no games available at the moment.</td>
                </tr>
            </table></div>
			<div id="BetList" align="center"><img src="/images/loading.gif" vspace="2" /></div>

<form action="/index.php?r=site/liveData" target="DataFrame" name="DataForm" style="display: none">
	<input type="hidden" name="Market" value="l"/>
	<input type="hidden" name="Sport" value="0" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="Game" value="0" />
	<input type="hidden" name="OddsType" value="4" />
    <input type="hidden" name="MainLeague" value="0" />
	<input type="hidden" name="Page" value="LIVE" />
	<input type="hidden" name="<?php echo $key[0] ?>" value="<?php echo $key[1] ?>" />
	<input type="hidden" name="key" value="" />
</form>
<form name="MoreForm" action="UnderOverPop.aspx" target="PopFrame" style="display: none">
  <input type="hidden" name="MatchId" />
  <input type="hidden" name="LeagueName" />
  <input type="hidden" name="HomeName" />
  <input type="hidden" name="AwayName" />
  <input type="hidden" name="isParlay" />
  <input type="hidden" name="Market" value="l"/>
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

<div id="MoreDiv" style="display: none">
	<div class="popupW">
        <div id="MoreTitle" class="popupWTitle">
        	<span>
                <div class="popWIcon"></div>
                <div class="popWTitleContain">Kickoff Sequence</div>
                <div id="MoreCloser" class="popWClose" title="Close"></div>
                <a id="BingobtnRefresh" class="btnIcon black right" onclick="this.className='btnIcon black right disable';RefpopBingoSeq();" title="Refresh"><span class="icon-refresh"></span></a>
            </span>
        </div>
        <div id="oMoreContainer" class="popWContain">
        </div>
    </div>
</div>

<iframe name='PopFrame' id='PopFrame' src="" style="display: none" onload="document.getElementById('oPopContainer').innerHTML=this.contentWindow.document.body.innerHTML;OverWriteFormSubmit();"></iframe>
<iframe id='FrameMore' name="FrameMore" style="display: none" onload="document.getElementById('oMoreContainer').innerHTML=this.contentWindow.document.body.innerHTML;document.getElementById('BingobtnRefresh').className='btnIcon black right';"></iframe>
<form name="BingoSeqForm" action="ResultPopBingo.aspx" target="FrameMore" style="display: none">
	<input type="hidden" name="MatchId" />
	<input type="hidden" name="SelFrom" />
</form>
<div id="cm-nav" style="display:none">
    <ul class="cm-nav">
        <li><a href="#L">Large View</a></li>
        <li><a href="#S">Small View</a></li>
    </ul>
</div>
<div id="Tennis_More" style="display:none"></div>
<div id="Soccer_More" style="display:none"></div>
</body>
</html>
