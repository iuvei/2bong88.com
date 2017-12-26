
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/css/global.css" rel="stylesheet" type="text/css" />
<link href="/css/button.css" rel="stylesheet" type="text/css" />
<link href="/css/custom.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />


<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js?v=<?php echo time(); ?>"></script>
<script language="JavaScript" type="text/javascript" src="/js/common.js?v=201502050407"></script>
<script language="JavaScript" type="text/javascript" src="/js/TopMenu.js?v=432015"></script>
<script language="JavaScript" type="text/javascript" src="/js/ShowHideFrame.js?v=<?php echo time(); ?>"></script>
<script language="JavaScript" type="text/javascript" src="/js/streaming.js?v=201501130542"></script>
<script language="JavaScript" type="text/javascript" src="/js/DivLauncher.js?v=201310290839"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery.tmpl.min.js?v=201110011924"></script>
<script language="JavaScript" type="text/javascript" src="/js/ScoreMapForecast.js?v=<?php echo time(); ?>"></script>

<script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/miniOdds.js?v=<?php echo time(); ?>"></script>

<script language="JavaScript" type="text/javascript" src="/js/jquery.autoellipsis-1.0.10.js?v=201401090434"></script>




<script>
function logout()
{

	$.ajax({
	
		type: 'GET',
		url: 'index.php?r=site/logout',
		success: function(){
		
			window.top.location.href = '/index.php';
		
		},
	
	});
	//

}

$(document).ready(function(){
	$("#btn-login").click(function(){
	
		/*
		var usernameLogin = $("#usernameLogin").val();
		var passwordLogin = $("#passwordLogin").val();
		if(usernameLogin=="" || passwordLogin=="")
			return;
		$.ajax({
		
			type: "POST",
			data: "username="+usernameLogin+"&password="+passwordLogin,
			url: '/index.php?r=site/LoginAjax',
			success: function(e){
			
				if(e=="okie")
					window.top.location.href = '/index.php';
				else
					eval(e);
			
			},
		
		});
		*/
		window.top.location.href = '/index.php?r=site/login';
		
		
	
	});
	if(CheckIsIpad()){
		$("html").addClass("isPad");
		$("#ibclogo").click(function(){
			if($("html").hasClass("rollup")){
				$("html").removeClass("rollup");			
				$('frameset', window.parent.document).eq(0).attr("rows", "95,*,0");
			} else {		
				$("html").addClass("rollup");
				$('frameset', window.parent.document).eq(0).attr("rows", "55,*,0");
			}
		});
	}
    DisplayVistualSport(fFrame.CanBetVirtualSports);
});
</script>
<script language="JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

var strMonth = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

var year = <?php echo date('Y') ?>;
var month = <?php echo date('m') ?>;
var day = <?php echo date('d') ?>;
var hrs = <?php echo date('H') ?>;
var min = <?php echo date('i') ?>;
var sec = <?php echo date('s') ?>;
var lbl_private_message = "; <font color=green>Private Messages: </font>";
var pubmsg = "";
var primsg = "";
var count = 0;
var newmsg = "";//"Tin Nhắn";
var lbl_close = "ĐÓNG";
var _gmtTxt = "+8";
function getCount() {
	return count;
}

function clock(){
	sec++
	if (sec==60) {
		sec=0;
		min++;
	}
	if (min==60) {
		min=0;
		hrs++;
	}
	if (hrs==24) {
		hrs=0;
		sec=0;
		min=0;
		day++;
	}
	if (min<10) {
		strmin="0" + min
	}
	else
	{
		strmin=min
	}
	if (sec<10) {
		strsec="0" + sec
	}
	else
	{
		strsec=sec
	}

	if(!isDate(year,month,day))    //to next month
	{
		month++;
		day=1;
	}
	if(!isDate(year,month,day))    //to next year
	{
		year++;
		month=1;
		day=1;
	}

	if (hrs>=12) {
		stra="PM";
	}
	else {
		stra="AM"
	}
	if (hrs>=12) {
		strhrs=hrs-12
	}
	else {
		strhrs=hrs
	}
	var str = strhrs + ":" + strmin + ":" + strsec + " " + stra + "&nbsp;" + strMonth[month-1] + " " + day + ", " + year + " GMT "+_gmtTxt;
	var ttt = document.getElementById("clock");
	ttt.innerHTML = str;
}
setInterval("clock()",1000);

function Synctime(p_year,p_month,p_day,p_hour,p_min,p_sec)
{
	year = p_year;
	month = p_month;
	day = p_day;
	hrs = p_hour;
	min = p_min;
	sec = p_sec;
}

function isDate(TDY,TDM,TDD) //input 3 string
{ 	
	var BegDate = new Date(parseFloat(TDY)+"/"+TDM+"/"+TDD);	
	if (BegDate.getYear()<200) 
		var TBegYear=BegDate.getYear()+1900
	else var TBegYear=BegDate.getYear()
	if (TBegYear!=parseFloat(TDY) || BegDate.getMonth()+1!=parseFloat(TDM) || BegDate.getDate()!=parseFloat(TDD)) 
		return false; 
	else return true; 		
}

// Change language
function changeLan(selValue){
    //window.top.leftFrame.CloseHorseInfoPopWindow();
    fFrame.closeAllWindows();
	document.frmChangeLang.hidSelLang.value=selValue;
	document.frmChangeLang.hidIsLogin.value="yes";
	document.frmChangeLang.submit();
}

function AutoRefreshLoginCheckin() {
	document.FormLoginCheckin.username.value = parent.UserNameBoot;
	if (fFrame.leftFrame.eObj!=null)
	    document.FormLoginCheckin.key.value = fFrame.leftFrame.eObj.GetKey("login");
	document.FormLoginCheckin.submit();
}

function openWindow(){
	window.open("wap_use.aspx","_blank","width:700px;height:800px");
}

function IpadTopMenuShow(isShow){
	if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/iPad/i)){
		$("html").addClass("isPad");
                if(isShow==1)
                {
                    if($("html").hasClass("rollup")){
				$("html").removeClass("rollup");			
				$('frameset', window.parent.document).eq(0).attr("rows", "95,*,0");}
                }
                else
                {
                    if(!$("html").hasClass("rollup")){	
				$("html").addClass("rollup");
				$('frameset', window.parent.document).eq(0).attr("rows", "55,*,0");}
                }
	}
}

function SwitchShowHidMode(allwaysShow)
{
	var d=document;
	if (allwaysShow==1)
    {
        if(document.getElementById("showhidetop").className == "show_top")
	    {
		    document.getElementById("showhidetop").className = "hide_top";
		    document.getElementById("showhidetoplink").title = "Nhấp để thu hẹp menu trên cùng.";
		    parent.resizeFrame('25,*,0');
	    }        
    }
    else
    {
	    if(d.getElementById("showhidetop").className == "hide_top")
	    {
		    d.getElementById("showhidetop").className = "show_top";
		    d.getElementById("showhidetoplink").title = "Nhấp để mở rộng menu trên cùng.";
		    scroller("collapse", 50);
	    }
	    else
	    {
		    d.getElementById("showhidetop").className = "hide_top";
		    d.getElementById("showhidetoplink").title = "Nhấp để thu hẹp menu trên cùng.";
	    }
	    parent.resizeFrame('25,*,0');
    }		
}
function SwitchShowHidLeft(){
	var d=document;
	if(d.getElementById("showhideleft").className == "hide_left")
	{
		d.getElementById("showhideleft").className = "show_left";
		d.getElementById("showhideleftlink").title = "Nhấp để mở rộng menu trái.";
	}else{
		d.getElementById("showhideleft").className = "hide_left";
		d.getElementById("showhideleftlink").title = "Nhấp để thu hẹp menu trái.";
	}
}
function setleftMenu_tooltip(){
	var d=document;
	d.getElementById('showhideleft').className = "hide_left";
	d.getElementById("showhideleftlink").title = "Nhấp để thu hẹp menu trái.";
	parent.document.getElementById("frameset1").cols="198,*,0";
}
//-- casino --

var SizeX = "788";
var SizeY = "514";

function OpenP2P(para){
  fFrame.openWindowsHandle("P2PLobby" ,
                           true ,
                           "",
                           "http://qjdk4.bong88.com/p2p/tx/p2pAction?siteId=dd39ffef491f574213f8adba9dd56240&method=p2pforward&" + para ,
                           "height=" + SizeY + ", width=" + SizeX + ", top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no"                           
                            );
}



function smenuChange(k){
    k=parseInt(k);
    for(i=0;i<document.getElementsByName('Gaming').length;i++) {
        document.getElementsByName('sublink')[i].style.display='none';
   }

        document.getElementsByName('sublink')[k].style.display='';
   //document.getElementById('smenuValue').value=k;
}
function CasinoMenu_Out()
{
    document.getElementById('sublink').style.display='none';
	//alert("test!");
}

function OpenCasino()
{
	return;
 }

function openCasinoBingo()
{
	return;
}

function openUserProfile(height,width)
{
   fFrame.openWindowsHandle("Preferences" ,
                           true ,
                           "",
                           "index.php?r=user/preferences" ,
                           "height="+height+", width="+width+", top=0, left=0, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no"                           
                            );
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
	
   fFrame.openWindowsHandle("UserInfoPop",
                           true,
                           "",
                           theURL,
                           "height="+height+", width="+width+", top=0, left=0, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no",                           
                           false,
						   callback);
}

setInterval("AutoRefreshLoginCheckin()",60000);
//-->
</script>
<style type ="text/css">
   #ibclogoDemo {
	height: 70px;
	width: 210px;
	background: url(/template/sportsbook/public/images/layout/logo_DM.png) no-repeat 30px 7px;
    }
    #bong88logoDemo {
	background-image: url(/template/bong88/public/images/layout/logo_bong88_DM.png?v=20130502);
	width: 190px;
	height: 55px;
	position:absolute;
	top: 5px;
	left: 10px;
   }
</style>
</head>
<body lang="vn" onload="javascript:getPop(pubmsg,primsg);">
<a name="top" id="top"></a>
<div id="containerHead">
	<div class="headerArea">        
        <div id="bong88logo"></div>
        <div id="newtopmenu" class="topmenu">
            <!--menu-->
            <ul>
                
                
                



                
                
                <li><a href="javascript:;" target="DF_Information">How to Use</a></li>
<!--<li><a href="change_password.aspx" target="mainFrame"><strong>{{ChangePassword}}</strong></a></li>-->

            </ul>
        </div>
        <div id="Logout">
			
            <?php if(!Yii::app()->user->isGuest){ ?>
			<!--<a href="javascript:OpenListPage('index.php?r=user/deposit', 680, 810);"  class="button"><span>Deposit</span></a>
			<a href="javascript:OpenListPage('index.php?r=user/withdraw', 680, 810);"  class="button"><span>Withdraw</span></a>-->
			<a href="#"  onclick="logout();" class="button"><span>Logout</span></a>
			<?php }else{ ?>
			<!--
				<span class="label-input">Username</span>
				<input type="text" id="usernameLogin" />
				<span class="label-input">Password</span>
				<input type="password" id="passwordLogin" />-->
				<button type="button" id="btn-login" class="btn-submit">Login</button>
				<button type="button" id="btn-register" onclick="javascript: window.top.location.href = '/index.php?r=site/register';" class="btn-submit">register</button>
				<button type="button" id="btn-forget" onclick="javascript: window.top.location.href = '/index.php?r=site/forgetPass';" class="btn-submit">Forget pass</button>
				
			<?php }?>
            <div class="langForm">
                <!-- BEGIN LanOptBlock -->
                <!-- Start: SiteNav -->   
                <span>     	
        			<select name="selLang"><option value="en" selected="">English</option>
					<option value="ch">繁體中文</option>
					<option value="jp">日本語</option>
					<option value="vn">Tiếng Việt</option>
					</select>
                </span>
	            <!-- END LanOptBlock -->
        	</div>
        </div>


        <div id="odd_manu">
            <a href="javascript:if(parent.leftFrame.ReloadBetListMini!=null)parent.leftFrame.ReloadBetListMini('no','no')" class="button group" title="Bet List" ><span>Bet List</span></a>
            <a href="javascript:OpenListPage('index.php?r=site/betList', 680, 810);" class="button" style="max-width:40px; width:auto;" title="Full" ><span>Full</span></a>
            <a href="javascript:OpenListPage('index.php?r=user/allStatement', 680, 810);" class="button" title="Statement" ><span>Statement</span></a>
            <a href="javascript:if(parent.leftFrame.refreshAccountInfo!=null)parent.leftFrame.refreshAccountInfo('full')" target="leftFrame" class="button" title="Balance"><span>Balance</span></a>

            <a href="javascript:OpenListPage('index.php?r=site/ResultFrame', 680, 810);" target="mainFrame" class="button" title="Result" ><span>Result</span></a>
            <a href="javascript:openUserProfile(615,1000);"  class="button" title="Preferences" ><span>Preferences</span></a>
			
		</div>
		<!-- End: SiteNav -->
		<div class="mainMenuArea">
        	
		  <ul class="mainMenu">
		  
			
		  <li>
		  <div class="corner-new">New</div>
		  <a href="javascript:;" onmouseout="MM_swapImgRestore()" title="Keno" style="display:"><span>Keno</span></a>
		  </li>
			

		  
			
			<li><a href="javascript:;" onmouseout="MM_swapImgRestore()" title="Live Casino"><span>Live Casino</span></a></li>
			
			<li><a href="#" style="cursor:pointer" onmouseover="ShowTopGamingMenu();" onmouseout="MM_swapImgRestore();" title="Gaming"><span>Gaming</span></a>    
				<div class="SubSiteNav p01" id="TopGamingMenuContainer" style="display: none;">
					<div class="SubSiteNavArrow SubSiteNavDiamond"></div>
					<ul>
						<!-- BEGIN P2P_Block -->
						
						<!-- END P2P_Block -->
						
						<li><a href="javascript:;" title="Mini Game">Mini Game</a></li>
						
						
						<li><a href="javascript:;" title="Bingo">Bingo</a></li>         
						
						
						<li><a href="javascript:;" title="Casino">Casino</a></li>
						
						
						
						<li><a href="javascript:;" title="Live Casino">Live Casino</a></li>
							   
						

					</ul>
				</div>
			  </li>
			</ul>

        </div>

        

        
	
	</div>
</div>


<div id="timelyinfo">
	<div class="timeArea">
        <div id="clock" class="containertime">5:07:02 PM July 20, 2007 GMT +8</div>
        <div class="iconMenu">
            <ul>
                <li name="aaa" id="showhideleft" class="hide_left">
                    <a name="showhideleftlink" id="showhideleftlink" title="Nhấp để thu hẹp menu trái." href="javascript:SwitchShowHidLeft();parent.SwitchLefthideshow();"></a>
                </li>
                <li name="showhidetop" id="showhidetop" class="hide_top">
                    <a name="showhidetoplink" id="showhidetoplink" title="Nhấp để thu hẹp menu trên cùng." href="javascript:SwitchShowHidMode(0);"></a>
                </li>
                <li name="Favorite" title="Mục ưa thích của tôi" id="Favorite" class="Favorite">
                    <a href="javascript:parent.leftFrame.ShowOdds('F','1',fFrame.DisplayMode)" target="mainFrame"></a>
                </li>
                
            </ul>   
        </div>
        <div class="containerHotnews">
            <a name="collapse" id="collapse"></a>
            <marquee id="Hotnews" scrollamount='2' scrolldelay='20' onmouseover="this.stop()" onmouseout="this.start()" onclick="OpenWinMessage()" title="Show all message">
                <?php echo $message ?>
				</marquee>
            <a href="javascript:OpenWinMessage();" id="btnMoreNews" name="btnMoreNews" class="button more" title="Show all message"> + </a>
        </div>
        <div class="content">
        	<a id="btnMorePriNewsCount" name="btnMorePriNewsCount" href="javascript:OpenWinPriMessage();" title="Show private message" class="button pMag">0</a>
		</div>
    </div>
</div>
<form id="frmChangeLang" name="frmChangeLang" method="post" action="ChangeLanguage.aspx">
  <input id="hidSelLang" name="hidSelLang" type="hidden" />
  <input type="hidden" name="hidIsLogin" value="no" />
</form>
<form method="post" action="index.php?r=site/CheckLogin" target="FrameLoginCheckin" name="FormLoginCheckin">
  <input type="hidden" name="username" />
  <input type="hidden" name="key" />
</form>
<iframe name="FrameLoginCheckin" src="" width="0" height="0" frameborder="0"></iframe>
<div id="LoadCompleted"></div>
</body>
</html>