
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Reffer</title>
<link href="http://bsh1z.bong88.com/template/sportsbook/public/css/table_w.css?v=201411180733" rel="stylesheet" type="text/css" />
<link href="http://bsh1z.bong88.com/template/sportsbook/public/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<link href="http://bsh1z.bong88.com/template/sportsbook/public/css/oddsFamily.css?v=201412230650" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="http://bsh1z.bong88.com/jscalendar/calendar-blue.css" title="win2k-cold-1" />
<script language="JavaScript" type="text/javascript" src="js/jquery.min.js?v=201206260354"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/calendar-en.js"></script>
<script type="text/javascript" src="js/calendar-setup.js"></script>
<script type="text/javascript" src="js/DivLauncher.js?v=201310290839"></script>
<script type="text/javascript" src="js/common.js?v=201412230650"></script>
<script language="JavaScript" type="text/javascript" src="js/isPad.js?v=201310290839"></script>
<script type="text/javascript">
function SelectChange(mode, selsport, selleague) {
	document.forms.form1.mode.value = mode;
	var selob = document.getElementById("selDate");
    document.forms.form1.selectDate.value = selob.innerHTML;
	if (mode == 'sport') {
        document.forms.form1.sportType.value = selsport;
    }
    else {
        document.forms.form1.sportType.value = selsport;
        document.forms.form1.league.value = selleague;
    }
    document.getElementById('ResultItem').style.display = "none";
    document.getElementById("WaitLoading").style.display = "block";
	document.forms.form1.submit();
}

function dateSubmit(datediff) {
	var dateValue = 86400000 * datediff;
	var today = new Date();
    
	var displayDateValue = today.getTime() + dateValue;
	var newDate = new Date();
	newDate.setTime(displayDateValue);

	var displayfield = newDate.getMonth() + 1 + "/" + padLeft(newDate.getDate(), 2) + "/" + newDate.getFullYear();
	document.forms.form1.selectDate.value = displayfield;
	document.getElementById('ResultItem').style.display = "none";
	document.getElementById("WaitLoading").style.display = "block";
	document.forms.form1.submit();
}

function padLeft(str, length) {
    if (str.toString().length >= length)
        return str;
    else
        return padLeft("0" + str, length);
} 

function changeBGClass(ObjName, clsName) {
	for (var i = 0; i < 10; i++) {
        var trName = 'tr' + i;
        var trName = document.getElementById(ObjName + "_" + i);
	    if(trName != null) {
	        trName.className = clsName;
	    }
    }
}

function dateChanged(calendar) {
	if (calendar.dateClicked) {
		var y = calendar.date.getFullYear();
		var m = calendar.date.getMonth(); // integer, 0..11
		var d = padLeft(calendar.date.getDate(), 2); // integer, 1..31
		var selob = document.getElementById("selDate");
		selob.innerHTML = (m+1) + "/" + d + "/" + y ;
		document.forms.form1.selectDate.value = (m + 1) + "/" + d + "/" + y;
		document.getElementById('ResultItem').style.display = "none";
		document.getElementById("WaitLoading").style.display = "block";
		document.forms.form1.submit();
	}
}

var MoreLauncher;
var iX; 
var iY;
	
function popSCRInfo(EventDate,LeagueId,RaceNumber) {
	var oDiv;
	var oDragger;
	var oCloser;
	
	if (MoreLauncher != null){
		MoreLauncher.close();
	}

	document.getElementById("oMoreContainer").innerHTML = "";
	
	document.SCRInfoForm.EventDate.value = EventDate;
	document.SCRInfoForm.LeagueId.value = LeagueId;
	document.SCRInfoForm.RaceNumber.value = RaceNumber;
	document.SCRInfoForm.submit();
		
	oDiv = document.getElementById("MoreDiv");
	oDragger = document.getElementById("MoreTitle");
	oCloser = document.getElementById("MoreCloser");
	var Sender = document.getElementById("SCRPos_" + RaceNumber);
	MoreLauncher = new DivLauncher(oDiv, oDragger, oCloser);
	var aObj = Sender;
	iX = 0;
	iY = 0;
	while (aObj.offsetParent != null) {
		iX += aObj.offsetLeft;
		iY += aObj.offsetTop;
		aObj = aObj.offsetParent;
	}
	iX -= document.documentElement.scrollLeft;
	iY -= document.documentElement.scrollTop;
	iX += Sender.clientWidth - 310;
	iY += Sender.clientHeight + 18;
	MoreLauncher.open(iX, iY);
}

function popBingoSeq(MatchId, SelFrom,MatchStatus) {
	var oDiv;
	var oDragger;
	var oCloser;
	
	if (MoreLauncher != null){
		MoreLauncher.close();
	}

	document.getElementById("oMoreContainer").innerHTML = "";
	
	document.BingoSeqForm.MatchId.value = MatchId;
	document.BingoSeqForm.SelFrom.value = SelFrom;	
	document.BingoSeqForm.MatchStatus.value = MatchStatus;
	document.BingoSeqForm.submit();
		
	oDiv = document.getElementById("MoreDiv");
	oDragger = document.getElementById("MoreTitle");
	oCloser = document.getElementById("MoreCloser");
	var Sender = document.getElementById("BingoPos_" + MatchId);
	MoreLauncher = new DivLauncher(oDiv, oDragger, oCloser);
	var evt=getEvent();
	var iX =evt.clientX-520;
	var iY =evt.clientY+15;
	MoreLauncher.open(iX, iY);
}

function popLiveCasino(MatchId, MatchName, ScoreData, ResultData) {
	var oDiv;
	var oDragger;
	var oCloser;
	
	if (MoreLauncher != null){
		MoreLauncher.close();
	}

	document.getElementById("oMoreContainer").innerHTML = "";
	
	document.LiveCasinoForm.MatchId.value = MatchId;
	document.LiveCasinoForm.MatchName.value = MatchName;
	document.LiveCasinoForm.ScoreData.value = ScoreData;
	document.LiveCasinoForm.ResultData.value = ResultData;
	document.LiveCasinoForm.submit();
		
	oDiv = document.getElementById("MoreDiv");
	oDragger = document.getElementById("MoreTitle");
	oCloser = document.getElementById("MoreCloser");
	var Sender = document.getElementById("LiveCasinoPos_" + MatchId);
	MoreLauncher = new DivLauncher(oDiv, oDragger, oCloser);
	var evt=getEvent();
	var iX =evt.clientX-520;
	var iY =evt.clientY+15;
	MoreLauncher.open(iX, iY);
}
function openKeno() {
    var selob = document.getElementById("selDate").innerHTML.split("/");
    var yyyy = selob[2];
    var mm = padLeft(selob[0], 2);
    var dd = padLeft(selob[1], 2);
    var url = "ResultKeno.aspx?date=" + yyyy.toString() + mm.toString() + dd.toString();
    location.href = url;
}

function View_RD(obj,gameID) {
    if (obj.className.indexOf("off") != -1) {
        $("#" + gameID).attr('class', 'displayOff');
        obj.className = "iconOdds info";
    }
    else {
        $("#" + gameID).attr('class', 'displayOn');
        obj.className = "iconOdds info off";
    }
}

</script>
</head>
<body id="Result" style="padding-bottom:5px" onload="parent.document.title = 'Result';">
<div class="">
  <form action="/index.php?r=site/Result" method="post" name="form1" target="ResultMain">
    <input type="hidden" id="mode" name="mode" value="normal" />
    <input type="hidden" id="selectDate" name="selectDate" />
    <input type="hidden" id="sportType" name="sportType" />
    <input type="hidden" id="league" name="league" />
   <div class="titleBar">
      <div class="title">Data Reffer</div>
     
    </div>
    <div class="board">
      
	</div>
    <div id="WaitLoading" align="center" style="display: none"><img src="template/sportsbook/public/images/layout/loading.gif" vspace="2" /></div>
    <div id="ResultItem" class="tabbox" style='display: block'> 
      
      <div class="tabbox_F"> 
<table class="oddsTable info" width="100%" cellpadding="0" cellspacing="0" border="0">

	<tr>
		<th width="110" align="left" nowrap>User</th>
		<th width="400" align="left" class="even">Total bonus</th>
		<th width="95" style="white-space:nowrap;">Total user lost</th>
		<th width="80" style="white-space:nowrap;" class="even">time</th>
		<th width="75" align="left">Ip</th>
		<th width="75" align="left">Id market</th>
	</tr>
	
    <?php $i = 1; foreach($dataRef as $data){ ?>
	<?php 

		$class = ($i%2==0)?"bgcpe":"bgcpelight";
		$user = User::model()->findByPk($data->idUser);
		$username = ($user==null)?"null":$user->username;
	?>
	<tr class="<?php echo $class ?>" onMouseOver="this.className='trbgov'" onMouseOut="this.className='<?php echo $class ?>'">
		<td nowrap="nowrap"><?php echo $username ?></td>
		<td><?php echo $data->Total ?></td>
		<td align="center"><strong><?php echo $data->totaldeposit ?></strong></td>
		<td align="center"><strong><?php echo date("d/m/Y H:i:s",$data->time); ?></strong></td>
		<td><strong><?php echo $data->Ip ?></strong></td>
		<td><strong><?php echo $data->IdOrder ?></strong></td>
	</tr>
	<?php $i++; } ?>
	
	
	
	
</table>
 </div>
       
    </div>
    <div class="note">
	    <div class="noteBorder">
            <div class="title"><span>Note</span></div>
            <div class="content">Please note that the displayed time is based on GMT -4 hours.</div> 
        </div>
    </div>
  </form>
</div>

<div id="MoreDiv" style="display: none">
	<div class="popupW">
        <div id="MoreTitle" class="popupWTitle">
        	<span>
                <div class="popWIcon"></div>
                <div class="popWTitleContain">SCR Info</div>
                <div id="MoreCloser" class="popWClose" title="Close"></div>
            </span>
        </div>
        <div id="oMoreContainer" class="popWContain">
        </div>
    </div>
</div>

<iframe id='FrameMore' name="FrameMore" style="display: none" onload="document.getElementById('oMoreContainer').innerHTML=this.contentWindow.document.body.innerHTML;"></iframe>
<form name="SCRInfoForm" action="SCRInfoPopup.aspx" target="FrameMore" style="display: none">
  <input type="hidden" name="EventDate" />
  <input type="hidden" name="LeagueId" />
  <input type="hidden" name="RaceNumber" />
</form>
<form name="BingoSeqForm" action="ResultPopBingo.aspx" target="FrameMore" style="display: none">
  <input type="hidden" name="MatchId" />
  <input type="hidden" name="SelFrom" />
  <input type="hidden" name="MatchStatus" />
</form>
<form name="LiveCasinoForm" action="ResultPopLiveCasino.aspx" target="FrameMore" style="display: none">
  <input type="hidden" name="MatchId" />
  <input type="hidden" name="MatchName" />
  <input type="hidden" name="ScoreData" />
  <input type="hidden" name="ResultData" />
</form>
</body>
</html>
