
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  style="overflow-x:auto; overflow-y:auto">
<head>
<title><?php echo $this->pageTitle ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/table_w.css" rel="stylesheet" type="text/css" />
<link href="/css/button.css" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css" rel="stylesheet" type="text/css" />
<link href="/css/myStyle.css" rel="stylesheet" type="text/css" />


<script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/common.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/DivLauncher.js"></script>


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
  <div class="title"><?php echo $this->pageTitle ?></div>
  <div class="right"><a href="#" class="button mark"><span>Back</span></a><a id="rfbu" href="#" target="_self" onclick="window.print()" class="button"><span>Print this page</span></a><a onclick ="this.className='button disable';" href="#" id="btnRefresh_D" class="button" title="Tải Lại"><span><div class="icon-refresh" title="Tải Lại"></div></span></a></div>
</div>

<div class="note">
    <div class="noteBorder">
        <div class="title"><span>Choice payment</span></div>
        <div class="content">
		
			<?php echo $content; ?>
		
		</div> 
    </div>
</div>





</body>
</html>