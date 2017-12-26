
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Outright</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="/css/table_w.css?v=201409050447" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css?v=201408260510" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var REFRESH_INTERVAL = 60000;
var REFRESH_COUNTDOWN = 720; //60;
var RES_REFRESH = "Tải Lại";
var RES_PLEASE_WAIT = "Xin vui lòng chờ đợi";
var RES_DISABLE_OUTRIGHT_MSG="Tài khoản của bạn không thể chơi cược thắng. Vui lòng liên hệ chúng tôi để được trợ giúp.";
</script>
<script language="JavaScript" type="text/javascript" src="js/jquery.min.js?v=201206260354"></script>
<script language="JavaScript" type="text/javascript" src="js/getDataClass.js?v=201206270324"></script>
<script language="JavaScript" type="text/javascript" src="js/ajaxData.js?v=201302271550"></script>
<script language="JavaScript" type="text/javascript" src="js/MultiSport_Def.js?v=201409230524"></script>
<script language="JavaScript" type="text/javascript" src="js/OddsUtils.js?v=201408260510"></script>
<script language="JavaScript" type="text/javascript" src="js/OutrightKeeper.js?v=201409230524"></script>
<!--<script language="JavaScript" type="text/javascript" src="js/odds/Outright_Def.js?v=200801180612"></script>-->
<script language="JavaScript" type="text/javascript" src="js/Outright.js?v=201310290839"></script>
<script language="JavaScript" type="text/javascript" src="js/DivLauncher.js?v=201310290839"></script>
<script language="JavaScript" type="text/javascript" src="js/common.js?v=201409020504"></script>

</head>

<body id="Outright" onload="refreshData();">
<iframe name='DataFrame' src="" style="display: none"></iframe>
<div class="titleBar">
    <div class="title">Outright</div>
    <div class="right">
        <a href="javascript:openLeague(640,'Chọn Giải Đấu','Outright','0','10','0','Outright');" class="button selectLeague" title="Chọn Giải Đấu">
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
              Chọn Giải Đấu</div>
            </span>
        </a>
        <a href="javascript:refreshData();" id="btnRefresh_D" class="button disable"><span><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></span></a>
    </div>
</div>


	<div id='OddsTr' style="display: none">
				<div class="tabbox_F" id="oTableContainer"></div>
		</div>

            <div id="TrNoInfo"  style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;">Không có trận đấu nào vào lúc này.</td>
                </tr>
            </table>
            </div>
			<div id="BetList" align="center"><img src="/images/loading.gif" vspace="2" /></div>


<form action="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=site/OutRightData" target="DataFrame" name="DataForm" style="display: none">
	<input type="hidden" name="Market" value="OT" />
	<input type="hidden" name="Sport" value="<?php echo $sport ?>" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="Game" value="0" />
	<input type="hidden" name="Page" value="OUTRIGHT" />
	<input type="hidden" name="r" value="site/OutRightData" />
	<input type="hidden" name="key" value="" />
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

</body>
</html>