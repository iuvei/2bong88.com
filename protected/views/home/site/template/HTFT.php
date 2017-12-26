
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>HT/FT</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/table_w.css?v=201409050447" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css?v=201408260510" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript">
var REFRESH_INTERVAL = 60000;
var REFRESH_COUNTDOWN = 720; //60;
var RES_REFRESH = "Tải Lại";
var RES_PLEASE_WAIT = "Xin vui lòng chờ đợi";
var PAGE_MARKET = "t";
var RES_NormalSort="Lựa chọn bình thường";
var RES_SortByTime="Chọn Lựa Theo Thời Gian";
</script>
<script language="JavaScript" type="text/javascript" src="js/jquery.min.js?v=201206260354"></script>
<script language="JavaScript" type="text/javascript" src="js/getDataClass.js?v=201206270324"></script>
<script language="JavaScript" type="text/javascript" src="js/ajaxData.js?v=201302271550"></script>
<script language="JavaScript" type="text/javascript" src="js/MultiSport_Def.js?v=201409230524"></script>
<script language="JavaScript" type="text/javascript" src="js/OddsUtils.js?v=201408260510"></script>
<script language="JavaScript" type="text/javascript" src="js/OddsKeeper.js?v=201406160646"></script>
<!--<script language="JavaScript" type="text/javascript" src="js/odds/HTFT_Def.js?v=201109160917"></script>-->
<script language="JavaScript" type="text/javascript" src="js/HTFT.js?v=201405280618"></script>
<script language="JavaScript" type="text/javascript" src="js/DivLauncher.js?v=201310290839"></script>
<script language="JavaScript" type="text/javascript" src="js/streaming.js?v=201408260510"></script>
<script language="JavaScript" type="text/javascript" src="js/common.js?v=201409020504"></script>
<script language="JavaScript" type="text/javascript">
  SelMainMarket = parseInt("0", 10);
</script>
</head>

<body id="HTFT" onload="refreshData();checkHasParlay('t','1');">
<iframe name='DataFrame' src="" style="display: none"></iframe>
<div class="titleBar">
    <div class="title">Half Time/Full Time</div>
    <div class="right">
        <a id="b_SwitchToParlay" href="javascript:SwitchToParlay('1');" class="button mark" style="display:none" title="Cá cược tổng hợp"><span>Cá cược tổng hợp</span></a>
        <div id="selLeagueType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selLeagueType',event);return false;" onclick="onClickSelecter('selLeagueType');" class="button select icon">
<input type="hidden" name="selLeagueType" id="selLeagueType" value="0" />
<span  id="selLeagueType_Txt" title='Tất Cả Trận Đấu'><div id="selLeagueType_Icon" class="icon_All"></div></span>
<ul id="selLeagueType_menu" class="submenu">
<li  title='Tất Cả Trận Đấu' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'0',true);changeLeagueType(0);"><div class="icon_All"></div>Tất Cả Trận Đấu</li>
<li  title='Các Trận Đấu Chính' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'1',true);changeLeagueType(1);"><div class="icon_Main"></div>Các Trận Đấu Chính</li>
</ul>
</div>

        <!--<a id="aSorter" href="javascript:setRefreshSort();" class="button"><span id="t_Order"><div id="aSorter_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('aSorter',event);return false;" onclick="onClickSelecter('aSorter');" class="button select icon">
<input type="hidden" name="aSorter" id="aSorter" value="0" />
<span  id="aSorter_Txt" title='Lựa chọn bình thường'><div id="aSorter_Icon" class="icon_NO"></div></span>
<ul id="aSorter_menu" class="submenu">
<li  title='Chọn Lựa Theo Thời Gian' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);"><div class="icon_ST"></div>Chọn Lựa Theo Thời Gian</li>
<li  title='Lựa chọn bình thường' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);"><div class="icon_NO"></div>Lựa chọn bình thường</li>
</ul>
</div>
</span></a>-->
        <div id="aSorter_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('aSorter',event);return false;" onclick="onClickSelecter('aSorter');" class="button select icon">
<input type="hidden" name="aSorter" id="aSorter" value="0" />
<span  id="aSorter_Txt" title='Lựa chọn bình thường'><div id="aSorter_Icon" class="icon_NO"></div></span>
<ul id="aSorter_menu" class="submenu">
<li  title='Chọn Lựa Theo Thời Gian' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);"><div class="icon_ST"></div>Chọn Lựa Theo Thời Gian</li>
<li  title='Lựa chọn bình thường' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);"><div class="icon_NO"></div>Lựa chọn bình thường</li>
</ul>
</div>

        <a href="javascript:openLeague(640,'Chọn Giải Đấu','t','1','16','0','HTFT');" class="button selectLeague" title="Chọn Giải Đấu">
        	<span>
            <div id="League_New" class="displayOff">
              <div id="SelLeagueIcon">
                <div class="icon">
                </div>
              </div>
              <div class="events">
                <div class="normal">(</div><div id="CustSelL" class="selected"></div><div id="AllSelL" class="normal"></div><div class="normal">/</div><div id="TotalLeagueCnt" class="normal"></div><div class="normal">)</div>
              </div>
              Giải</div>
            <div id="League_Old">
              Chọn Giải Đấu</div>
            </span>
        </a>
        <a href="javascript:refreshData();" id="btnRefresh_D" class="button disable"><span><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></span></a>
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
			<div class="tabbox"><div class="tabbox_F" id="oTableContainer"></div></div>
</div>
			<div id="TrNoInfo"  style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;">Không có trận đấu nào vào lúc này.</td>
                </tr>
            </table>
            </div>
			<div id="BetList" align="center"><img src="http://gtr-1-1.bongstatic.com/template/sportsbook/public/images/layout/loading.gif" vspace="2" /></div>


<form action="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/HTFTData" target="DataFrame" name="DataForm" style="display: none">
	<input type="hidden" name="Market" value="t" />
	<input type="hidden" name="Sport" value="1">
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
    <input type="hidden" name="DT" value="" />
	<input type="hidden" name="Game" value="0" />
    <input type="hidden" name="OrderBy" value="0" />
	<input type="hidden" name="key" value="" />
    <input type="hidden" name="MainLeague" value="0" />
	<input type="hidden" name="r" value="site/HTFTData" />
    <input type="hidden" name="Page" value="HTFT" />
</form>

<div id="PopDiv" style="display: none">
	<div class="popupW">
        <div id="PopTitle" class="popupWTitle">
        	<span>
                <div class="popWIcon"></div>
                <div id="PopTitleText" class="popWTitleContain"></div>
                <div id="PopCloser" class="popWClose" title="ĐÓNG"></div>
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
</body>
</html>
