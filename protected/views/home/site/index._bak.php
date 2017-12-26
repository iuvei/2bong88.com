<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml style="overflow-x:hidden"">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=1024" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title><?php echo $this->pageTitle ?></title>
<link href="" rel="shortcut icon"/>
<![if ! IE]>
<link href="" rel="shortcut icon"/>
<![endif]>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/jquery.min.js?v=201206260354"></script>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/ShowHideFrame.js?v=201203030542"></script>
<script language="JavaScript" type="text/javascript" src="/js/common.js?v=<?php echo time(); ?>"></script>
<script language="JavaScript" type="text/javascript" src="http://gtr-1-1.bongcdn.com/commJS/streaming.js?v=201408260510"></script>
<script type="text/javascript">
//--------Site Const---------------
var SiteMode = 0;
var Deposit_SiteMode = 0;
var DomainName = "bong88.com";
var IsLogin = true;
var UserLang = "vn";
var SkinRootPath = "template/sportsbook/";
<?php 

	if(Yii::app()->user->isGuest)
	{
	
		$username = "GUEST";
	
	}else $username = User::model()->findByPk(Yii::app()->user->getId())->username;

 ?>
var UserName = "<?php echo $username ?>";
var UserNameBoot = "<?php echo $username ?>";
var imgServerURL = "http://gtr-1-1.bongcdn.com/";
var SiteId = "4100600";
var IsEuro = false;
//--------Odds Display---------------
var DisplayMode	= '3';
var PopupAD = false;
var PopupNews = true;
var PopupHAD = false;
var PopupFAD = true;
var hash_TmplLoaded = new Array(); // hashtable for keeping template loaded flag (value: true / false)
//--------Streaming ---------------
var StreamingFrame = null; //streaming window handle
var IsUserStreaming = true;
//--------Menu---------------
var LastSelectedSport=-1;
var LastSelectedMArket;
var LastSelectedBettype;
var LastSelectedMenu=0; // Default All
var CanSeeNumberGame=true;
var CanBetNumberGame=true;
var CanBetOutright=true;
var CanSeeHorse=false;
var CanSeeGreyhounds=false;
var CanSeeHarness=false;
var MiniGameServerMode =true;
var CanSeeVirtualSports=true;
var CanBetVirtualSports=false;
var CanSeeESport=true;
var CanBetESport=true;
var CanSeeKeno=true;
var CanBetKeno=false;
var SelectRacingCountry;
//--------Betting------------
var LastBettingMode=0; // 0 : single , 1 : multiple
var LastSingleType=0; // 0 : underover/horse/outright , 1 : number game
//--------Casino-------------
var DisableCasino = "true";
var SyncCasino = "true";
var DisableLiveCasino = "false";
var SyncLiveCasino = "true";
var CanSeeBingo="true"
var CanBetBingo="false"

//--------AccountInfo--------
var AccountInfoData = "";
var ScoreMsg='{{ScoreDiv}}';
//--------Racing FormGuide---------
var popFormGuideWindow = null;
var popDogFormGuideWindow = null;
var popHarnessFormGuideWindow = null;
var fFrame=this;
var RES_ScoreMap="Score Map";
var RES_LiveInfo="Live Information";
var RES_LiveChart="Live Chart";
var RES_StatisticInfo="Statistic Information";
var RES_AddFavorite="Add My Favorite";
var RES_RemoveFavorite="Remove My Favorite";
var FlashSupport=null;
var RES_popAD = "";
var RES_BlockPopMsg ="Window blocked! Please check \"Block Pop-Up Windows\" setting.";
var ADLauncher=null;

var RES_SPORTS = new Array(162);
RES_SPORTS[0] = "Tất Cả";
RES_SPORTS[1] = "Bóng đá";
RES_SPORTS[2] = "Bóng rổ";
RES_SPORTS[3] = "Bóng bầu dục Mỹ";
RES_SPORTS[4] = "Khúc côn cầu trên băng";
RES_SPORTS[5] = "Quần vợt";
RES_SPORTS[6] = "Bóng chuyền";
RES_SPORTS[7] = "Snooker/Pool";
RES_SPORTS[8] = "Bóng chày";
RES_SPORTS[9] = "Cầu lông";
RES_SPORTS[10] = "Đánh Golf";
RES_SPORTS[11] = "Thể Thao Môtô";
RES_SPORTS[12] = "Bơi lội";
RES_SPORTS[13] = "Chính trị";
RES_SPORTS[14] = "Bóng nước";
RES_SPORTS[15] = "Lặn";
RES_SPORTS[16] = "Quyền anh";
RES_SPORTS[17] = "Bắn cung";
RES_SPORTS[18] = "Bóng bàn";
RES_SPORTS[19] = "Cử tạ";
RES_SPORTS[20] = "Canoeing";
RES_SPORTS[21] = "Thể dục";
RES_SPORTS[22] = "Điền kinh";
RES_SPORTS[23] = "Cưỡi ngựa";
RES_SPORTS[24] = "Bóng ném";
RES_SPORTS[25] = "Ném phi tiêu";
RES_SPORTS[26] = "Bóng bầu dục";
RES_SPORTS[27] = "Cricket";
RES_SPORTS[28] = "Khúc côn cầu trên cỏ";
RES_SPORTS[29] = "Winter Sports";
RES_SPORTS[30] = "Squash";
RES_SPORTS[31] = "Giải Trí";
RES_SPORTS[32] = "Netball";
RES_SPORTS[33] = "Đua xe đạp";
RES_SPORTS[34] = "Đấu kiếm";
RES_SPORTS[35] = "Judo";
RES_SPORTS[36] = "M. Pentathlon";
RES_SPORTS[37] = "Rowing";
RES_SPORTS[38] = "Đua thuyền buồm";
RES_SPORTS[39] = "Bắn súng";
RES_SPORTS[40] = "Taekwondo";
RES_SPORTS[41] = "Triathlon";
RES_SPORTS[42] = "Đấu vật";
RES_SPORTS[43] = "E Sports";
RES_SPORTS[99] = "Môn thể thao khác";
RES_SPORTS[161] = "Number Game";


//--------Rules & Regulations ---------------
var RuleInfo = null; //Rules & Regulations window handle for Bing Flash
function MainLoad()
{
  if(mainFrame.document.body.innerHTML.length >0)
  {
  	//loadPopAD();
  	
  	if(CheckIsIpad())
  	{
  	   SetIpad();
  	}else{
		return;
  	    var loadMiniOdds = function()
  	    {
  	       if(topFrame.miniOddsObj == null) 
 	       {
	         setTimeout(loadMiniOdds,1000);
 	         return ;
	       }
  	       topFrame.miniOddsObj.Init(); 
  	    }
        loadMiniOdds();        
        
        loadFooter();
     }
  }
  mainFrame.document.body.lang=UserLang;
}
function loadFooter()
{
    var obj=document.createElement("div");
    obj.innerHTML=BuildFooterHTML();
    //mainFrame.document.body.appendChild(obj);  
    if(mainFrame.document.getElementById("sidebar")!=null)
    {
       mainFrame.document.getElementById("sidebar").appendChild(obj);  
    }else{
       mainFrame.document.body.appendChild(obj);  
    }
    //mainFrame.chkChangeIpad();  
    
}
function SetIpad()
{
   if(typeof mainFrame.isPad_loadend == "undefined"){
      importJS('commJS/isPad.js??v=201310290839','mainFrame.isPad_loadend',function(){mainFrame.chkChangeIpad();loadFooter();},mainFrame);
   }
}
function loadPopAD()
{
   

   if(RES_popAD.length>0 && mainFrame.document.body.innerHTML.length >0)
   {
       var decoded = $("<div/>").html(RES_popAD).text();       
       $(decoded).appendTo(mainFrame.document.body);
       
       var showPopAD = function()
       {
            var oDiv = mainFrame.document.getElementById("NewsDiv");
		    var oDragger = mainFrame.document.getElementById("NewsTitleBar");
		    var oCloser = mainFrame.document.getElementById("NewsCloser");
		    if (oDiv != null) {
			    ADLauncher = new mainFrame.DivLauncher(oDiv, oDragger, oCloser);
			    ADLauncher.open();
		    }
          RES_popAD="";
       }
       
       if(typeof mainFrame.DivLauncher == "undefined")
	   {
		     importJS('commJs/DivLauncher.js','mainFrame.DivLauncher',showPopAD,mainFrame);
	   }else{
		   showPopAD();
	   }
       
       
   }
}

function BuildFooterHTML()
{   
    var aTmpl=document.getElementById("bottomFrame");
    var TemplateFrame;
    		if (aTmpl.contentDocument) { //ff
			TemplateFrame = aTmpl.contentDocument;
		}else if (aTmpl.contentWindow) {
			TemplateFrame = aTmpl.contentWindow.document;
		}else{  //ie
			TemplateFrame = aTmpl.document;
		}
    return TemplateFrame.body.innerHTML;    
}
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
function closeAllWindows()
{
   for(var key in windowsHandle)
   {
      if(windowsHandle[key]!=null)
      {
         windowsHandle[key].close();
      }
   }
}

function getOpenWindowsHandle(key)
{
  return windowsHandle[key];
}

function UpdateSetting(Refresh,OddsType,PageType,SortType,AcceptBetter,MarketType)
{
   if(Refresh!=null)   
   {       
      Refresh = Refresh=="1"?true:false;
      var sportchk = leftFrame.document.getElementById("chKeepBet");
      var bingochk = leftFrame.document.getElementById("Bingo_chKeepBet");
      var horsechk = leftFrame.document.getElementById("FScreen");

       if(leftFrame.document.getElementById('BingoBetProcessContainer').style.display!="none")
       {
         if(bingochk.checked != Refresh) bingochk.click();
       }
       
       if(leftFrame.document.getElementById('BP_SPORT').style.display!="none")
       {
         if(sportchk.checked != Refresh) sportchk.click();
       }
       if(leftFrame.document.getElementById('BP_RACE').style.display!="none")
       {
          if(horsechk.checked != Refresh) horsechk.click();
       }
       sportchk.checked=Refresh;
       bingochk.checked=Refresh;
       horsechk.checked=Refresh; 
       
   }   
   if(AcceptBetter!=null)
   {
     AcceptBetter = AcceptBetter=="1"?true:false;
     $(leftFrame.document.getElementById("cbAcceptBetterOdds")).attr("checked", AcceptBetter);
     $(leftFrame.document.getElementById("Bingo_cbAcceptBetterOdds")).attr("checked", AcceptBetter);   
     
   }
   
   
   var pageurl=[];
   var FrameUrl = mainFrame.document.location.pathname;
   if(PageType!=null )
   {   
      fFrame.DisplayMode = PageType;
      pageurl =['<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/UnderOver','favorite.aspx','live.aspx'];
   }
   if(OddsType!=null && fFrame.topFrame.miniOddsObj!=null) fFrame.topFrame.miniOddsObj.Refresh(OddsType);
   if(OddsType!=null|| SortType!=null)
   {
      pageurl =['<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/UnderOver','favorite.aspx','live.aspx','oetg.aspx','nba.aspx','tennis.aspx','baseball.aspx','cricket.aspx','bingo.aspx'];              
   }

   if (MarketType != null)
   {
      pageurl =['<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/UnderOver','1X2.aspx','live.aspx','Oe.aspx','Tg.aspx','CorrectScore.aspx','FGLG.aspx','HTFT.aspx'];
   }
  
   for(var i=0;i<pageurl.length;i++)
   {      
       if(FrameUrl.toLowerCase().indexOf(pageurl[i]) > -1)
       {
            
            mainFrame.location.reload(true);
            return ;
       }
   }
   
}


function Loadframe()
{
   $('#leftFrame').load(function(){
        $('#mainFrame').unbind('load');
        $('#mainFrame').bind('load',function(){MainLoad();});
        var mainurl = "<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/UnderOver&Market=t&DispVer=new";
        if(mainurl.length > 0) mainFrame.location =mainurl;
   });
   leftFrame.location ="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/LeftMenu";
}


</script>

</head>

<frameset rows="95,*,0" cols="*" framespacing="0" frameborder="no" border="0">
	<frame src="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/TopMenu" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" onload="Loadframe();"/>
	<frameset rows="*" cols="198,*,0" framespacing="0" frameborder="no" border="0" id="frameset1" name="frameset1">
		<frame src="about:blank" name="leftFrame" scrolling="auto" id="leftFrame" noresize="noresize" style="overflow-x:hidden" />
		<frame src="about:blank" name="mainFrame" id="mainFrame"  />
<!-- Template Frame for Odds Display -->
        <frameset rows="0,0,0,0, 0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0,0,0, 0,0,0">	

		<frame id='UnderOver_tmpl_1' />
		<frame id='UnderOver_tmpl_3' src="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/UnderOverTpl" />
		<frame id='UnderOver_tmpl_1F' />
		<frame id='UnderOver_tmpl_1H' />
		
		<frame id='1X2_tmpl' />
		<frame id='CorrectScore_tmpl' />
		<frame id='CorrectScore_tmpl_H' />
		<frame id='HTFTOE_tmpl' />
    <frame id='Oe_tmpl' />
		<frame id='Tg_tmpl' />
		<frame id='HTFT_tmpl' />
		<frame id='FGLG_tmpl' />

		<frame id='NBA_tmpl' />
		<frame id='Tennis_tmpl' />
		<frame id='Baseball_tmpl' />
		<frame id='Cricket_tmpl' />
    <frame id='Bingo_tmpl' />
    <frame id='BingoFull_tmpl' />
    <frame id='MorePop_tmpl' />
		<frame id='Finance_tmpl' />
		
		<frame id='Horse_tmpl' />
		<frame id='Horse_Fixed_tmpl' />
		<frame id='Greyhounds_tmpl' />
		<frame id='Harness_tmpl' />
		<frame id='Outright_tmpl' />
		<frame id='VirtualSports_tmpl' />
		<frame id='VirtualHorse_tmpl' />
		<frame id='Menu_tmpl' />		
		<frame id='League_tmpl' />
		<frame id='Match_tmpl' />

        <frame id='AUS_Horse_tmpl' />
		<frame id='AUS_Greyhounds_tmpl' />
		<frame id='AUS_Harness_tmpl' />
	    </frameset>
    </frameset>
    <frame src="themes/footer.html?v=201305020841" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame"/>
</frameset><noframes></noframes>
</html>

