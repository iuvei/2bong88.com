
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="overflow-x: hidden">
<head>
<title>Message History</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/table_w.css?v=201502050407" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<!--
<link href="css/table_w.css" rel="stylesheet" type="text/css" />
<link href="css/button.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" type="text/css" media="all" href="/css/calendar-blue.css" title="win2k-cold-1" />
<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js?v=201206260354"></script>
<script type="text/javascript" src="/js/calendar.js"></script>
<script type="text/javascript" src="/js/lang/calendar-en.js"></script>
<script type="text/javascript" src="/js/calendar-setup.js"></script>
<script type="text/javascript" src="/js/common.js?v=201502240614"></script>

<script type="text/javascript" language="javascript">
var sobjDate = null;
var eobjDat = null;

function splitDate(){
	var s_date = document.getElementById("sdate");
	var e_date = document.getElementById("edate");
	var s_dataAry = new Array(2);
	var e_dataAry = new Array(2);
	
	var kk1 = s_date.value.split("/");
	for(var i = 0;i < kk1.length;i++){
		s_dataAry[i] = kk1[i];
	}
	var kk2 = e_date.value.split("/");
	for(var i = 0;i < kk2.length;i++){
		e_dataAry[i] = kk2[i];
	}
	
	sobjDate = new Date(s_dataAry[2] ,s_dataAry[0]-1 ,s_dataAry[1]);
	eobjDate = new Date(e_dataAry[2] ,e_dataAry[0]-1 ,e_dataAry[1]);
}

function queryFromDate(){
	splitDate();
	var eroMesg = document.getElementById("eroMeg").value;

	if(eobjDate < sobjDate){
		alert(eroMesg);
	}else{
	    //document.getElementById("pageQuery").value="fromDate";
//		var str1 = document.getElementById("pageQuery").value;
//		var str2 = document.getElementById("s_date").value;
//		var str3 = document.getElementById("e_date").value;
//		
//		location.href = "MessageHistory.aspx?pageQuery="+str1+"&s_date="+str2+"&e_date="+str3;
	    document.forms.FMessageHistory.submit();
	}
}

//function checkIsDate(arg_intYear,arg_intMonth,arg_intDay)
//{
// var result=false;
    //月數從0開始，所以要將參數減一
//    var objDate = new Date(arg_intYear,arg_intMonth-1,arg_intDay);
    //檢查月份是否小於12大於1
//    if((parseInt(arg_intMonth) > 12) || (parseInt(arg_intMonth) < 1))
//    {
//        alert(arg_intYear+'/'+arg_intMonth+'/'+arg_intDay+'\t The date is incorrect!!');
//    }
//    else
//    {
        //如果objDate日數進位不等於傳入的arg_intDay，代表天數格式錯誤，另外月份進位也代表日期格式錯誤
//        if((parseInt(arg_intDay) != parseInt(objDate.getDate()))||(parseInt(arg_intMonth)!= parseInt((objDate.getMonth()+1))))
//        {
//            alert(arg_intYear+'/'+arg_intMonth+'/'+arg_intDay+ '\t The date is incorrect!!');
//        }
//        else
//        {
//            result=true;
//        }
		
//    }
//	return result;
//}
function dateChangedTos_date(calendar) {
	if (calendar.dateClicked) {
		var y = calendar.date.getFullYear();
		var m = calendar.date.getMonth(); // integer, 0..11
		var d = calendar.date.getDate(); // integer, 1..31
		var sob = document.getElementById("s_date");
		sob.innerHTML = (m+1) + "/" + d + "/" + y ;
		document.forms.FMessageHistory.sdate.value = (m+1) + "/" + d + "/" + y ;
	}
}
function dateChangedToe_date(calendar) {
	if (calendar.dateClicked) {
		var y = calendar.date.getFullYear();
		var m = calendar.date.getMonth(); // integer, 0..11
		var d = calendar.date.getDate(); // integer, 1..31
		var eob = document.getElementById("e_date");
		eob.innerHTML = (m+1) + "/" + d + "/" + y ;
		document.forms.FMessageHistory.edate.value = (m+1) + "/" + d + "/" + y ;
	}
}

function showMsg(spMes){
    try
    {
	    //splitDate();
	    //var eroMesg = document.getElementById("eroMeg").value;

	    //if(eobjDate < sobjDate){
		//    setDDate();
	    //}
	    if(document.getElementById("sdate")!=null) document.getElementById("sdate").value="";
	    if(document.getElementById("edate")!=null) document.getElementById("edate").value="";
        if(spMes == 'private'){
	        if(window.opener != null)
	        {
		        window.opener.count = 0;
		        var pri_count = window.opener.document.getElementById("btnMorePriNewsCount");
		        //pri_count.innerHTML = window.opener.newmsg + "(0)";
		        pri_count.innerHTML = "0";
		    }
	    }
        document.forms.FMessageHistory.pageQuery.value = spMes;
	    document.forms.FMessageHistory.submit();
	}
	catch(err)
	{
		alert("Please open message history page again!");
	    window.opener = null; 
        window.close();
	}
}

function loadFooter()
{
  try{
      if( window.opener != null)
      {
         var obj=document.createElement("div");
         obj.innerHTML=window.opener.parent.BuildFooterHTML();
         window.document.body.appendChild(obj);     
      }
  }catch(e){}
}

function onLoadBody()
{
	if(document.getElementById("pageQuery").value=="allSpecial"){
		document.getElementById("s_date").disabled=true;
		document.getElementById("e_date").disabled=true;
		document.getElementById("btn1").disabled=true;
		document.getElementById("f_trigger_b").style.display="none"; 
		document.getElementById("f_trigger_b2").style.display="none"; 
	}
}
function setDDate(){
	var timeNow = new Date(); 
	var year=timeNow.getFullYear();
	var mon=timeNow.getMonth()+1;
	var ddate=timeNow.getDate();
	var yesterday = new Date(Date.parse(timeNow) - (3*1000*60*60*24)) ; 
	if(document.getElementById("sdate")!=null) document.getElementById("sdate").value=mon+"/"+yesterday.getDate()+"/"+year;
	if(document.getElementById("edate")!=null) document.getElementById("edate").value=mon+"/"+ddate+"/"+year;
}
</script>
</head>
<body onLoad="onLoadBody();loadFooter();">
<form id="FMessageHistory" name="FMessageHistory" action="/index.php?r=site/MessageHistory" method="post">
    <input id="sdate" name="sdate" value="3/1/2015" type="hidden" />
    <input id="edate" name="edate" value="3/4/2015" type="hidden" />
    <div class="titleBar">
        <div class="title">Message History</div>
    </div>
  <div class="board">
    <ul class="panelInfo">
      <li><span class="title">Messages:</span>
            <div id="message_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('message',event);return false;" onclick="onClickSelecter('message');" class="button select">
<input type="hidden" name="message" id="message" value="1" />
<span  id="message_Txt" title='Normal Announcements'>Normal Announcements</span>
<ul id="message_menu" class="submenu">
<li  title='Normal Announcements' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('message',this,'1',false);showMsg('normal');">Normal Announcements</li>
<li  title='Special Announcements' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('message',this,'2',false);showMsg('special');">Special Announcements</li>
<li  title='Personal Message' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('message',this,'3',false);showMsg('private');">Personal Message</li>
</ul>
</div>

      </li>
      
      <li>      
      <span class="title">Date:</span>
      <div id="f_trigger_b" class="button select"><span id="s_date">3/1/2015</span>
          <script type="text/javascript">
			  Calendar.setup({
				  inputField     :    "s_date",      // id of the input field
				  ifFormat       :    "m/d/y",       // format of the input field
				  button         :    "f_trigger_b",   // trigger for the calendar (button ID)
				  flatCallback : dateChangedTos_date,
				  singleClick    :    true           // double-click mode
			  });
		  </script>
        </div>
        <span style="margin:0 5px; float:left;">to</span>
        <div id="f_trigger_b2" class="button select"><span id="e_date"><?php echo date("m/d/y"); ?></span>
          <script type="text/javascript">
			  Calendar.setup({
				  inputField     :    "e_date",      // id of the input field
				  ifFormat       :    "m/d/y",       // format of the input field
				  button         :    "f_trigger_b2",   // trigger for the calendar (button ID)
				  flatCallback : dateChangedToe_date,
				  singleClick    :    true           // double-click mode
			  });
		  </script>
        </div>
        <a id="btn1" onClick="javascript:queryFromDate();" class="button"><span>Submit</span></a>
      </li>
      
    </ul>
    <input type="hidden" name="eroMeg" id="eroMeg" value="The &quot;From&quot; Date can not be greater than the &quot;To&quot; Date">
  </div>
  <div class="tabbox">
    <div class="tabbox_F" id="normal_1" name="normal_1">
      <input type="hidden" name="pageQuery" id="pageQuery" value="normal" />
      <table class="oddsTable info" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody>
          <tr>
            <th width="40">No.</th>
            <th width="40" align="left" class="even">ID</th>
            <th width="80" align="left">Date</th>
            <th align="left" class="even">Message</th>
          </tr>
        </tbody>
         
        <?php $i=1; foreach($lastHot as $news){ ?>
        <tr class="bgcpe" onmouseover="this.className='trbgov';" onmouseout="this.className='bgcpe';">
          <td width="40" align="center" valign="top"><?php echo $i; ?></td>
          <td width="40" valign="top"><?php echo $news->Id ?></td>
          <td width="80" valign="top"><?php echo date("d/m/Y",$news->timeAdd); ?><br/><?php echo date("H:i:s",$news->timeAdd); ?></td>
          <td class="MessageHistory"><?php echo $news->content ?></td>
        </tr>
        <?php $i++; } ?>
        
        
      </table>
    </div>
  </div>
</form>
</body>
</html>
