
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UnderOver</title>
<link href="/css/table_w.css?v=201409050447" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css?v=201408260510" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript">
var REFRESH_INTERVAL_L = 20000;
var REFRESH_INTERVAL_D = 60000;
var REFRESH_COUNTDOWN = 720; //60;
var RES_REFRESH = "Tải Lại";
var RES_PLEASE_WAIT = "Xin vui lòng chờ đợi";
var RES_UNDER = "u";
var RES_LIVE = "Trực tiếp";
var PAGE_MARKET="t";
var RES_DRAW="Hòa";
var RES_MORE="More Bet Types";
var RES_DOMAIN = "bong88.com";
var RES_NOW = "Now";
var RES_NormalSort="Lựa chọn bình thường";
var RES_SortByTime="Chọn Lựa Theo Thời Gian";

var DisableCasino = "true";
var SyncCasino = "true";
function alertCasionMsg() {
	if (DisableCasino == "false" && SyncCasino == "true") {
		window.top.leftFrame.OpenCasino("HHYsza3vwXaB6s78wW23eJvQuHxGwF3HIQ3PMOkjed8A1%2bwyrSSKS5TzTVtGcGXQPsAwVpVli4K69w6p7USjXr4fufmNE2ZG9m3coPEVXjChxGfP%2fw9ezcKCexSEAS2ZItzwN9VvI5%2b4kGxN5U4D9FpND54WpT4NlcKrLrv0%2bBLG6X2Ih5xXFw%3d%3d");
	} else {
		alert("Tài khoản của bạn không thể cược sòng bac. Vui lòng liên hệ chúng tôi để được trợ giúp.");
	}
}
function openCasinoBingo(){
    closePopup();
    window.top.leftFrame.OpenTraditionalBingo("HHYsza3vwXaB6s78wW23eJvQuHxGwF3HIQ3PMOkjed8A1%2bwyrSSKS5TzTVtGcGXQPsAwVpVli4K69w6p7USjXr4fufmNE2ZG9m3coPEVXjChxGfP%2fw9ezcKCexSEAS2ZItzwN9VvI5%2b4kGxN5U4D9FpND54WpT4NlcKrLrv0%2bBLG6X2Ih5xXFw%3d%3d");
}

</script>
<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/js/getDataClass.js?v=201206270324"></script>
<script language="JavaScript" type="text/javascript" src="/js/ajaxData.js?v=201302271550"></script>
<script language="JavaScript" type="text/javascript" src="/js/MultiSport_Def.js?v=201409230524"></script>
<script language="JavaScript" type="text/javascript" src="/js/cookie.js?v=200803031653"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/OddsUtils.js?v=<?php echo time(); ?>"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/more.js?v=201409240440"></script>
<script language="JavaScript" type="text/javascript" src="/js/OddsKeeper.js?v=201406160646"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/UnderOver.js?v=<?php echo time(); ?>"></script>
<script language="JavaScript" type="text/javascript" src="/js/DivLauncher.js?v=201310290839"></script>
<script language="JavaScript" type="text/javascript" src="/js/ieupdate.js?v=200710140153"></script>
<script language="JavaScript" type="text/javascript" src="/js/common.js?v=<?php echo time(); ?>"></script>
<script language="JavaScript" type="text/javascript" src="/js/streaming.js?v=201408260510"></script>
<script language="JavaScript" type="text/javascript">
  SelMainMarket=parseInt("0",10);
</script>


<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:1px;
	top:20px;
	width:424px;
	height:311px;
	z-index:1;
}
-->
</style>
<script language="javascript">
    if (fFrame.SiteMode == 1)
        window.setTimeout("SelectRefresh('0', 't')", 30000);

// .sidebar (project list)
$(document).ready(function(){
	//sidebar slide
	var arrowsMoveTimer;
	var timer;
	$thisTab = $(".sidebar .tab");
	$thisTab.click(function(){
		_indexTab = $(this).index();
		//console.log(_indexTab);
		if(_indexTab == 0){
			$(".sidebar").addClass("shadow");			
		} else {
			$(".sidebar").removeClass("shadow");
		}
		$(".productList").eq(_indexTab).slideUp(200, function(){
			$(this).siblings(".productList").slideDown(300);
			$thisTab.eq(_indexTab).hide().siblings(".tab").stop(true,true).fadeIn();
		});
	});
	
	//When page load open .sidebar
	setTimeout(	function(){
		$thisTab.eq(0).click();
		timer = setTimeout(function(){
			  $thisTab.eq(1).click();
		  }, 3000);
	}, 2000);
	//sidebar event
	$(".sidebar").hover(function(){
          clearTimeout(timer);
     }, function(){
          timer = setTimeout(function(){
			  $thisTab.eq(1).click();
		  }, 2000);
     });
	 
	//icon-arrowsDown move
	arrowsMove = function() {
		$("div.productList").children(".icon-arrowsDown").animate({marginTop: "3px"}, 100, function() { 
			$(this).animate({marginTop: "0px"}, 200) ;
		});
		arrowsMoveTimer = setTimeout(arrowsMove, 300);
	}
	$thisTab.eq(0).hover(function(){
		arrowsMove();
	}, function(){
		clearTimeout(arrowsMoveTimer);
	});
	//productContent
	$("ul.productList li").each(function(i){
		var _thisLi = $(this);
		_thisLi.children(".productContent").css("top", i * 20);		
	}).hover(function(){
		var _this = $(this),
			_subnav = _this.children(".productContent");
		_this.addClass("selected").siblings(this).removeClass("selected");
		$("ul.productList li").children(".productContent").hide();
		_subnav.stop(true,true).fadeIn();
	},function(){
		$(this).removeClass("selected").children(".productContent").hide();
	});
});
</script>

</head>
<body id="UnderOver" onload="OverWriteFormSubmit();initialDisstyle('3'); refreshAll();checkHasParlay('t','1');">
<!-- sidebar Start -->

<!-- sidebar End -->
<iframe name='DataFrame_L' src="" style="display: none"></iframe>
<iframe name='DataFrame_D' src="" style="display: none"></iframe>
<iframe name='fav' id='fav' src="" style="display: none"></iframe>
<div id="column1" class="titleBar">
	<div class="title">Today events</div>
    <div class="right">
    	<a id="b_SwitchToParlay" href="javascript:SwitchToParlay('1');" class="button mark" style="display:none" title="Cá cược tổng hợp"><span>Parlay</span></a> 
        <div id="selLeagueType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selLeagueType',event);return false;" onclick="onClickSelecter('selLeagueType');" class="button select icon">
<input type="hidden" name="selLeagueType" id="selLeagueType" value="0" />
<span  id="selLeagueType_Txt" title='Tất Cả Trận Đấu'><div id="selLeagueType_Icon" class="icon_All"></div></span>
<ul id="selLeagueType_menu" class="submenu">
<li  title='Tất Cả Trận Đấu' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'0',true);changeLeagueType(0);"><div class="icon_All"></div>All Markets</li>
<li  title='Các Trận Đấu Chính' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selLeagueType',this,'1',true);changeLeagueType(1);"><div class="icon_Main"></div>Main Markets</li>
</ul>
</div>

    	<span id="Tbl_TimeRange" style="display:none" >
    	   <div id="HourContainer_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('HourContainer',event);return false;" onclick="onClickSelecter('HourContainer');" class="button select">
<input type="hidden" name="HourContainer" id="HourContainer" value="" />
<span  id="HourContainer_Txt" title='Phạm vi thời gian'>Phạm vi thời gian</span>
<ul id="HourContainer_menu" class="submenu">
<li id=HourSpan0 title='Tất Cả' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('HourContainer',this,'HourSpan0',false);HourLinkClick(this,0);">Tất Cả</li>
<li id=HourSpan3 title='12:00~16:00' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('HourContainer',this,'HourSpan3',false);HourLinkClick(this,3);">12:00~16:00</li>
<li id=HourSpan7 title='16:00~20:00' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('HourContainer',this,'HourSpan7',false);HourLinkClick(this,7);">16:00~20:00</li>
<li id=HourSpan11 title='20:00~00:00' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('HourContainer',this,'HourSpan11',false);HourLinkClick(this,11);">20:00~00:00</li>
<li id=HourSpan15 title='00:00~04:00' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('HourContainer',this,'HourSpan15',false);HourLinkClick(this,15);">00:00~04:00</li>
<li id=HourSpan19 title='04:00~08:00' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('HourContainer',this,'HourSpan19',false);HourLinkClick(this,19);">04:00~08:00</li>
<li id=HourSpan23 title='08:00~12:00' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('HourContainer',this,'HourSpan23',false);HourLinkClick(this,23);">08:00~12:00</li>
</ul>
</div>

    	</span>
    	

       <!-- <a id="aSorter" href="javascript:setRefreshSort();" class="button"><span id="t_Order"><div id="aSorter_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('aSorter',event);return false;" onclick="onClickSelecter('aSorter');" class="button select icon">
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
<li  title='Chọn Lựa Theo Thời Gian' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);"><div class="icon_ST"></div>Sort by time</li>
<li  title='Lựa chọn bình thường' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);"><div class="icon_NO"></div>Normal Sorting</li>
</ul>
</div>


        <a href="javascript:openLeague(640,'Choise Leagues','t','1','1,3,5,7,8,15','0','UnderOver');" class="button selectLeague" style="display:inline-block;" title="Choise Leagues">
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
             Choise Leagues</div>
            </span>
        </a>       

        <div id="disstyle_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('disstyle',event);return false;" onclick="onClickSelecter('disstyle');" class="button select icon">
<input type="hidden" name="disstyle" id="disstyle" value="3" />
<span  id="disstyle_Txt" title='Dòng Kép'><div id="disstyle_Icon" class="icon_DL"></div></span>
<ul id="disstyle_menu" class="submenu">
<li  title='Một Dòng' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1',true);changeDisplayMode('1','bong88.com'); parent.focus();"><div class="icon_SL"></div>Sigle line</li>
<li  title='Dòng Kép' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'3',true);changeDisplayMode('3','bong88.com'); parent.focus();"><div class="icon_DL"></div>Double line</li>
<li  title='Toàn Thời Gian' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1F',true);changeDisplayMode('1F','bong88.com'); parent.focus();"><div class="icon_FT"></div>Full time</li>
<li  title='Hiệp 1' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1H',true);changeDisplayMode('1H','bong88.com'); parent.focus();"><div class="icon_HT"></div>Haft time</li>
</ul>
</div>

        
        
            <div id="selOddsType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selOddsType',event);return false;" onclick="onClickSelecter('selOddsType');" class="button select icon disable">
<input type="hidden" name="selOddsType" id="selOddsType" value="4" />
<span  id="selOddsType_Txt" title='Malay Odds'><div id="selOddsType_Icon" class="icon_MY"></div></span>
<ul id="selOddsType_menu" class="submenu">
<li  title='Malay Odds' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'4',true);changeOddsType_ou(4);"><div class="icon_MY"></div>Malay Odds</li>
</ul>
</div>

        
        <a href="javascript:refreshData_D();" id="btnRefresh_D" class="button disable">
        	<span>
            	<div class="icon-refresh" title="Xin vui lòng chờ đợi"></div>
            </span>
        </a>
        <a href="javascript:refreshData_L();" id="btnRefresh_L" class="button disable" style="display:none"><span><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></span></a>
    </div>
</div>

<!--改版預計刪除 Start-->
<div style="display:none">
      


        <div id="SelLeague">
        <select id="LF" name='LF' onchange="SelectChange();">
          
          
          <option value="0" style="font-size:small;" selected>--- No League---</option>
          		
        </select>
        </div>
        

      <span id="tdSelPeriod" style="display:none">
      <select id="selPeriod" onchange="changePeriod(this.options[this.selectedIndex].value); parent.focus();" class="select_Line" style="font-size: 11px; color: #FF0000;">
        <option value="1">{{lbl_10before}}</option>
        <option value="2">{{lbl_10after}}</option>
        <option value="0">All Markets</option>
      </select>
      </span>

      
      
    
    
</div>
<!--改版預計刪除 End-->

<div class="column3" id="column2">
  <div id='OddsTr' style="display: none">
    <div id="divSelectDate" class="board" style="display:none">
              <ul class="panelInfo">
                <li><span class="title" onclick="selectDate(this,'');" style="cursor:pointer;color:#003399">{{lbl_all}}</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_1}}');" style="cursor:pointer;color:{{spnSelectDate_Color_1}}">{{day_1}} {{month_1}}({{week_1}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_2}}');" style="cursor:pointer;color:{{spnSelectDate_Color_2}}">{{day_2}} {{month_2}}({{week_2}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_3}}');" style="cursor:pointer;color:{{spnSelectDate_Color_3}}">{{day_3}} {{month_3}}({{week_3}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_4}}');" style="cursor:pointer;color:{{spnSelectDate_Color_4}}">{{day_4}} {{month_4}}({{week_4}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_5}}');" style="cursor:pointer;color:{{spnSelectDate_Color_5}}">{{day_5}} {{month_5}}({{week_5}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_6}}');" style="cursor:pointer;color:{{spnSelectDate_Color_6}}">{{day_6}} {{month_6}}({{week_6}})</span></li>
                <li><span class="title" onclick="selectDate(this,'{{date_7}}');" style="cursor:pointer;color:{{spnSelectDate_Color_7}}">{{day_7}} {{month_7}}({{week_7}})</span></li>
              </ul>
            </div>
      <div class="tabbox" id="tabbox">
        <div class="tabbox_F" id="oTableContainer_L"></div>
        <div class="tabbox_F" id="oTableContainer_D"></div>
      </div>
 </div>
      <div id="TrNoInfo"  style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;">Không có trận đấu nào vào lúc này.</td>
                </tr>
            </table>
            </div>
      <div id="BetList" align="center"><img src="/images/layout/loading.gif" vspace="2" /></div></td>
</div>
<form action="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/UnderOverData" target="DataFrame_L" name="DataForm_L" style="display: none">
  <input type="hidden" name="Market" value="l" />
  <input type="hidden" name="Sport" value="1">
  <input type="hidden" name="DT" value="" />
  <input type="hidden" name="RT" value="W" />
  <input type="hidden" name="CT" value="" />
  <input type="hidden" name="Game" value="0" />
  <input type="hidden" name="OrderBy" value="0" />
  <input type="hidden" name="OddsType" value="4" />
  <input type="hidden" name="MainLeague" value="0" />
  <input type="hidden" name="<?php echo $key[0] ?>" value="<?php echo $key[1] ?>" />
  <input type="hidden" name="key" value="" />
</form>
<form action="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/UnderOverData" target="DataFrame_D" name="DataForm_D" style="display: none">
  <input type="hidden" name="Market" value="t" />
  <input type="hidden" name="Sport" value="1">
  <input type="hidden" name="DT" value="" />
  <input type="hidden" name="RT" value="W" />
  <input type="hidden" name="CT" value="" />
  <input type="hidden" name="Game" value="0" />
  <input type="hidden" name="OrderBy" value="0" />
  <input type="hidden" name="OddsType" value="4" />
  <input type="hidden" name="MainLeague" value="0" />
  <input type="hidden" name="DispRang" value="0" />
  <input type="hidden" name="<?php echo $key[0] ?>" value="<?php echo $key[1] ?>" />
  <input type="hidden" name="key" value="" />
</form>
<form name="MoreForm" action="UnderOverPop.aspx" target="PopFrame" style="display: none">
  <input type="hidden" name="MatchId" />
  <input type="hidden" name="LeagueName" />
  <input type="hidden" name="HomeName" />
  <input type="hidden" name="AwayName" />
  <input type="hidden" name="isParlay" />
  <input type="hidden" name="Market" value="t" />
</form>
<form id="frmChangeOddsType" style="display:none;" name="frmChangeOddsType" method="post" action="ChangeOddsType.aspx">
  <input id="hidOddsType" name="hidOddsType" type="hidden" />
  <input id="hidDispVer" name="hidDispVer" type="hidden" />
</form>


<div id="PopDiv" style="display: none;">
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


<iframe name='PopFrame' id='PopFrame' src="" style="display: none" onload="document.getElementById('oPopContainer').innerHTML=this.contentWindow.document.body.innerHTML;OverWriteFormSubmit();"></iframe>




<div id="cm-nav" style="display:none">
    <ul class="cm-nav">
        <li><a href="#L">Large View</a></li>
        <li><a href="#S">Small View</a></li>
    </ul>
</div>
<div id="Soccer_More" style="display:none"></div>
</body>
</html>
