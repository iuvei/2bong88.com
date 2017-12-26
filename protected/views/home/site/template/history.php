
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  style="overflow-x:auto; overflow-y:auto">
<head>
<title>Thể Thao Kết quả cược</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/table_w.css?v=201409050447" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css?v=201408260510" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript" src="js/jquery.min.js?v=201206260354"></script>
<script language="JavaScript" type="text/javascript" src="js/common.js?v=201409020504"></script>
<script language="JavaScript" type="text/javascript" src="js/DivLauncher.js?v=201310290839"></script>


<script type="text/JavaScript">
var MoreLauncher;
var ConfirmMsg = "{{lbl_ConfirmMsg}}";
var sDate = "10/16/2014 12:00:00 am";

function popMore(TypeId,TransId) {
	var oDiv;
	var oDragger;
	var oCloser;
	
	if (MoreLauncher != null){
		MoreLauncher.close();
	}

	document.getElementById("oPopContainer").innerHTML = "";
	document.getElementById("MoreTitleValue").innerHTML="Kết quả";
	
	if(TypeId=='10')  //for outrightPop
	{
		document.FormOutrightResult.TransId.value = TransId;
		document.FormOutrightResult.submit();
	}else{
		document.FormResult.TransId.value = TransId;
		document.FormResult.BetType.value = TypeId;
		document.FormResult.submit();
	}
	
	
	oDiv = document.getElementById("MoreDiv");
	oDiv.style.left = 0;
	oDiv.style.width = "";
	oDragger = document.getElementById("MoreTitle");
	oCloser = document.getElementById("MoreCloser");
	MoreLauncher = new DivLauncher(oDiv, oDragger, oCloser);
	var evt=getEvent();
	var iX =evt.clientX;
	var iY =evt.clientY+18;
	MoreLauncher.setDEFAULT_X(iX);
	MoreLauncher.setDEFAULT_Y(iY);
}

function showPopResult(limitW,limitH)
{
   if(MoreLauncher==null) return ;
   
   if(limitW!=null){
       var iX = MoreLauncher.getDEFAULT_X();
       var divWidth = getDivW(document.getElementById("MoreDiv"));
       if (divWidth > 600)
           document.getElementById("MoreDiv").style.width = "615px";
       else
           document.getElementById("MoreDiv").style.width = "";
       if (iX + divWidth > limitW) MoreLauncher.setDEFAULT_X(iX - (iX + divWidth - limitW));
   }
   if(limitH!=null){
       var iY = MoreLauncher.getDEFAULT_Y();
       var divHigh = getDivH(document.getElementById("MoreDiv"));
       if(iY+divHigh > limitH) MoreLauncher.setDEFAULT_Y( iY -(iY+divHigh-divHigh));
   }
   MoreLauncher.open();
}

function popCombinationMore(refno,TotalStake,edate,title) {
	var oDiv;
	var oDragger;
	var oCloser;
	
	if (MoreLauncher != null){
		MoreLauncher.close();
	}

	document.getElementById("oPopContainer").innerHTML = "";
	document.getElementById("MoreTitleValue").innerHTML =title;
	
	document.FormCombination.refno.value = refno;
	document.FormCombination.TotalStake.value = TotalStake;	
	document.FormCombination.edate.value = sDate;
	document.FormCombination.submit();
	
	
	oDiv = document.getElementById("MoreDiv");
	oDiv.style.left = 0;
	oDragger = document.getElementById("MoreTitle");
	oCloser = document.getElementById("MoreCloser");	
	MoreLauncher = new DivLauncher(oDiv, oDragger, oCloser);
	var evt=getEvent();
	var iX =evt.clientX;
	var iY =evt.clientY+14;
	MoreLauncher.setDEFAULT_X(iX);
	MoreLauncher.setDEFAULT_Y(iY);	

}


function delticket(TransId, UserId) {
    document.DelTicketForm.TransId.value = TransId;
    document.DelTicketForm.SelDate.value = sDate;
    document.DelTicketForm.DelFrom.value = "DB";
    document.DelTicketForm.UserId.value = UserId;
    
    var sure = confirm(ConfirmMsg + ' #' + TransId + ' ?');
    if (sure) {
        document.DelTicketForm.submit();
    }
}

function changeBGColor(ObjName, Color) {
	var tr1 = document.getElementById(ObjName + "_1");
	var tr2 = document.getElementById(ObjName + "_2");
	var tr3 = document.getElementById(ObjName + "_3");
	var tr4 = document.getElementById(ObjName + "_4");
    var tr5 = document.getElementById(ObjName + "_5");
	var tr6 = document.getElementById(ObjName + "_6");
	var tr7 = document.getElementById(ObjName + "_7");
	var tr8 = document.getElementById(ObjName + "_8");
    var tr9 = document.getElementById(ObjName + "_9");
	var tr10 = document.getElementById(ObjName + "_10");
	var tr11 = document.getElementById(ObjName + "_11");
	var tr12 = document.getElementById(ObjName + "_12");
	var tr13 = document.getElementById(ObjName + "_13");
	var tr14 = document.getElementById(ObjName + "_14");
    var tr15 = document.getElementById(ObjName + "_15");
	var tr16 = document.getElementById(ObjName + "_16");
	var tr17 = document.getElementById(ObjName + "_17");
	var tr18 = document.getElementById(ObjName + "_18");
    var tr19 = document.getElementById(ObjName + "_19");
	var tr20 = document.getElementById(ObjName + "_20");

	tr1.style.backgroundColor = Color;
	if(tr2 != null) {
	    tr2.style.backgroundColor = Color;
	}
	if(tr3 != null) {
	    tr3.style.backgroundColor = Color;
	}
	if(tr4 != null) {
		tr4.style.backgroundColor = Color;
	}
    if(tr5 != null) {
		tr5.style.backgroundColor = Color;
	}
	if(tr6 != null) {
		tr6.style.backgroundColor = Color;
	}
	if(tr7 != null) {
	    tr7.style.backgroundColor = Color;
	}
	if(tr8 != null) {
		tr8.style.backgroundColor = Color;
	}
    if(tr9 != null) {
		tr9.style.backgroundColor = Color;
	}
	if(tr10 != null) {
		tr10.style.backgroundColor = Color;
	}
    if(tr11 != null) {
		tr11.style.backgroundColor = Color;
	}
    if(tr12 != null) {
		tr12.style.backgroundColor = Color;
	}
    if(tr13 != null) {
		tr13.style.backgroundColor = Color;
	}
    if(tr14 != null) {
		tr14.style.backgroundColor = Color;
	}
    if(tr15 != null) {
		tr15.style.backgroundColor = Color;
	}
    if(tr16 != null) {
		tr16.style.backgroundColor = Color;
	}
    if(tr17 != null) {
		tr17.style.backgroundColor = Color;
	}
    if(tr18 != null) {
		tr18.style.backgroundColor = Color;
	}
    if(tr19 != null) {
		tr19.style.backgroundColor = Color;
	}
    if(tr20 != null) {
		tr20.style.backgroundColor = Color;
	}
}

</script>
</head>

<body id="DBetlist">
<div class="titleBar">
  <div class="title">Thể Thao Kết quả cược</div>
  <div class="right"><a href="index.php?r=user/allStatement" class="button mark"><span>Trở Về</span></a><a id="rfbu" href="#" target="_self" onclick="" class="button"><span>In Trang Này</span></a><a onclick ="this.className='button disable';" href="javascript:;" id="btnRefresh_D" class="button" title="Tải Lại"><span><div class="icon-refresh" title="Tải Lại"></div></span></a></div>
</div>
<div class="board"> 
  
   <ul class="panelInfo">
        <li><span class="title selected" onclick="" style="cursor:pointer">Bảng Cược</span></li>
        <li><span class="title" onclick="" style="cursor:pointer">Bet Summary</span></li>
        <!--li><span class="title"><a href="DBetlist.aspx?fdate=10/16/2014 12:00:00 am&from=dblist&type=SB" class="active">Bảng Cược</a></span></li>
        <li><span class="title"><a href="UserBetSummary.aspx?date=10/16/2014 12:00:00 am&type=SB">Bet Summary</a></span></li-->
   </ul>
   
</div>
<div class="tabbox">
  <div class="tabbox_F">
    <table class="oddsTable info" width="100%" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <th width="22">Số.</th>
        <th width="115" align="left" class="even">Thời Gian</th>
        <th width="250" align="left">Lựa Chọn</th>
        <th width="80" align="right" class="even">Tỷ lệ</th>
        <th width="60" align="right">Tiền Cược</th>
        <th width="60" align="right" class="even">Thắng / Thua</th>
        <th width="105" align="left">Trạng Thái</th>
         </tr>
       
       <?php $i=1;$totalWinLost = 0;$totalLost = 0; $totalStake = 0; $totalCom = 0; foreach($totalBet as $bet){ ?>
      <?php 
		if($i%2==0)
			$class="bgcpe";
		else $class="bgcpelight";
		$totalWinLost = $bet->winLost+$totalWinLost;
		$totalStake = $bet->BPstake+$totalStake;
		$totalCom += $bet->com;
	  ?>
      <tr class="<?php echo $class ?>" onmouseover="this.className='trbgov';" onmouseout="this.className='bgcpe';">
        <td align="center" valign="top"><?php echo $i ?></td>
        <td valign="top" nowrap><div><strong>Ref No:<?php echo $bet->Id ?></strong></div>
          <div><?php echo date("d/m/Y H:i:s",$bet->timeBet) ?></div></td>
        <td valign="top">
        <div id="Detail_" class="TextStyle01"></div>
         
          <div class="multiple">
          <div class="TextStyle01 "><?php echo $bet->lblBetKind ?></div>
          <div class="FavTeamClass " onmousemove="NumberGroupTitle(this);"><?php echo $bet->lblChoiceValue ?></div>
          <span class="<?php echo ($bet->lblBetKindValue<0)?"FavOddsClass":"UdrDogOddsClass"; ?>"><?php echo $bet->lblBetKindValue ?></span><span class="TextStyle01 "><?php echo $bet->lblScoreValue ?></span><span class="UdrDogOddsClass "></span>
          <div class="TextStyle04 "><?php echo $bet->lblHome ?>-vs-<?php echo $bet->lblAway ?><br></div>
          <div class="TextStyle04 "><?php echo $bet->lblLeaguename ?></div>
          </div>
           
                    
          </td>
        <td align="right" valign="top" nowrap="nowrap"> 
			<?php 
				if($bet->oddsRequest<0)
					$class="FavOddsClass";
				else $class="UdrDogOddsClass";
				if($bet->winLost<0)
					$classWinLost = "FavOddsClass";
				else $classWinLost="UdrDogOddsClass";
			?>
           <span class="<?php echo $class ?>"><?php echo $bet->oddsRequest ?></span><br />
          <span class="TextStyle03"><?php echo ($bet->oddsType==1)?"DEC":(($bet->oddsType==2)?"HK":"MY"); ?></span></td>
        <td align="right" class="UdrDogOddsClass" valign="top"><?php echo $bet->BPstake ?><br/></td>
        <td align="right" valign="top"><span class="<?php echo $classWinLost ?>"><?php echo $bet->winLost ?></span><br />
          <b><?php echo round($bet->com,2); ?></b></td>
        <td valign="top"  class="TextStyle03 "><span class="<?php echo ($bet->winLost<0)?"FavOddsClass":"UdrDogOddsClass"; ?>"><?php echo $bet->lbloddsStatus ?></span><br>
          <a id="{{lbl_resultPos}}" onclick="javascript: popMore('1','<?php echo $bet->Id ?>');" style="cursor:pointer">Result</a>  
          
          
          <div class="ipColor"><?php echo $bet->ipBet ?></div></td>
         </tr>
      
	  <?php $i++;}?>
      <!--<tr class="bgcpe" onMouseOver="this.className='trbgov'" onMouseOut="this.className='bgcpe'">-->
      
      
      <tr class="Total">
	  <?php $textWinLost = ($totalWinLost>0)?"Tổng phụ(Thắng)":"Tổng phụ(Thua)"; ?>
        <td colspan="5" align="right" class="none_rline none_Bline"><div><?php echo $textWinLost ?></div></td>
        <td align="right" class="none_rline none_Bline bgGray"><div class="FavOddsClass"><?php echo $totalWinLost ?></div></td>
        <td class="none_Bline">&nbsp;</td>
      </tr>
      <tr class="Total">
        <td colspan="5" align="right" class="none_rline none_Bline"><div>Tổng phụ(Com.)</div></td>
        <td align="right" class="none_rline none_Bline bgGray"><div><?php echo $totalCom ?></div></td>
        <td class="none_Bline">&nbsp;</td>
      </tr>
      <tr class="Total">
        <td colspan="5" align="right" class="none_rline"><div>Tổng cộng</div></td>
        <td align="right" class="none_rline bgGray"><div class="FavOddsClass"><?php echo $totalWinLost+$totalCom ?></div></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>
</div>
<div class="note">
    <div class="noteBorder">
        <div class="title"><span>Lưu ý</span></div>
        <div class="content">Xin lưu ý rằng thời gian hiển thị dựa trên GMT -4 giờ.</div> 
    </div>
</div>

<div id="MoreDiv" style="display: none">
	<div class="popupW">
        <div id="MoreTitle" class="popupWTitle">
        	<span>
                <div class="popWIcon"></div>
                <div id="MoreTitleValue" class="popWTitleContain"></div>
                <div id="MoreCloser" class="popWClose" title="ĐÓNG"></div>
            </span>
        </div>
        <div id="oPopContainer" class="popWContain">
        </div>
    </div>
</div>


<iframe id='FrameMore' name="FrameMore" style="display: none" onload="document.getElementById('oPopContainer').innerHTML=this.contentWindow.document.body.innerHTML;showPopResult(790);"></iframe>
<form name="FormResult" method="post" action="index.php?r=site/ResultPopup" target="FrameMore" style="display: none">
  <input type="hidden" name="TransId" />
  <input type="hidden" name="BetType" />
</form>
<iframe id='FrameCombinationMore' name="FrameCombinationMore" style="display: none" onload="document.getElementById('oPopContainer').innerHTML=this.contentWindow.document.body.innerHTML;showPopResult(790);"></iframe>
<form name="FormCombination" action="CombinationPopup.aspx" target="FrameCombinationMore" style="display: none">
  <input type="hidden" name="refno" />
  <input type="hidden" name="title" />
  <input type="hidden" name="TotalStake" />
  <input type="hidden" name="edate" />
</form>
<form name="FormOutrightResult" action="ResultOutrightPopup.aspx" target="FrameMore" style="display: none">
  <input type="hidden" name="TransId" />
</form>
<form name="DelTicketForm" action="DelTicket.aspx" style="display: none">
  <input type="hidden" name="TransId" />
  <input type="hidden" name="SelDate" />
  <input type="hidden" name="DelFrom" />
  <input type="hidden" name="UserId" />
</form>
</body>
</html>