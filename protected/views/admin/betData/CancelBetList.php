<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link href="/assets/stylesheets/agent/Agent.css?20141230" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Reports.css?20141230" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/BetList.css?20141230" rel="stylesheet" type="text/css" />
</head>

<body>
    <form id="frmmain" method="get">
        <div id="page_main">
            <div id="header_main">Danh sách cược Hủy</div>
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <div id="box_header">
                            <table style="width: 100%">
                                <tr>
                                    <td>
                                        <link href="/assets/stylesheets/agent/DateRangeSelect.css?20141230" rel="stylesheet" type="text/css" />
                                        <script src="/assets/js/bet/DateRangeSelect.js?20141230" type="text/javascript">
										</script>
                                        <script type="text/javascript">
                                            var max_server_date = '<?php echo date("m/d/Y") ?>';
                                        </script>
                                        <div id="spDateTimeSearch">
                                            <table cellpadding="0" cellspacing="0" border="0">
                                                <tr style="height: 32px;">
                                                    <td id="td2" style="padding-left: 6px;" class="l"><span id="Span1">
													<select id="idoption" name="idoption" onchange="OnchangeData(this)">
													
													<option value="" selected>Danh sách cược ( đã bị hủy )</option></select>
													</span>
                                                    </td>
                                                    <td id="tdfdatetext" style="padding-left: 6px;" class="l"><span id="spfdatetext">Từ:</span>
                                                    </td>
                                                    <td id="tdFromDateCal" class="l"><span id="spFromDateCal">
													<link href="/assets/stylesheets/agent/jscal2.css?20141230" rel="stylesheet" type="text/css" />
													<link href="/assets/stylesheets/agent/steel.css?20141230" rel="stylesheet" type="text/css" />
													<script src="/assets/js/bet/jscal2.js?20141230" type="text/javascript"></script>
													<script src="/assets/js/bet/en.js?20141230" type="text/javascript"></script><table cellpading="0" cellspacing="0" border="0"><tr><td><input id="fdate" class="date_no" value="<?php echo date("d/m/Y") ?>" type="text" size="13"name="fdate" readonly="readonly" /></td><td><input type="image" alt="" src="/assets/_GlobalResources/Images/cal.gif" id="fdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" onclick="javascript:return false;" /><!-- <img alt="" src="/_GlobalResources/Images/cal.gif" id="fdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" /> --></td></tr></table><script type="text/javascript">function CalendarOnSelect() {if($("ddlSelectDate"))$("ddlSelectDate").value = 8;}var fdate = Calendar.setup({animation:false,trigger: "fdate_trigger",inputField: "fdate",min: 20141001,max: 99991231,dateFormat: "%m/%d/%Y",weekNumbers:true,onSelect: function() {CalendarOnSelect();this.hide();}});</script></span>
                                                    </td>
                                                    <td id="tdtdatetext" class="l">&nbsp;&nbsp; <span id="sptdatetext">đến:</span>
                                                    </td>
                                                    <td id="tdToDateCal" class="l"><span id="spToDateCal"><table cellpading="0" cellspacing="0" border="0"><tr><td><input id="tdate" class="date_no" value="<?php echo date("d/m/Y") ?>" type="text" size="13"name="tdate" readonly="readonly" /></td><td><input type="image" alt="" src="/assets/_GlobalResources/Images/cal.gif" id="tdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" onclick="javascript:return false;" /><!-- <img alt="" src="/_GlobalResources/Images/cal.gif" id="tdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" /> --></td></tr></table><script type="text/javascript">function CalendarOnSelect() {if($("ddlSelectDate"))$("ddlSelectDate").value = 8;}var tdate = Calendar.setup({animation:false,trigger: "tdate_trigger",inputField: "tdate",min: 20141001,max: 99991231,dateFormat: "%m/%d/%Y",weekNumbers:true,onSelect: function() {CalendarOnSelect();this.hide();}});</script></span>
                                                    </td>
                                                    <td>&nbsp;&nbsp; Chọn hết</td>
                                                    <td>
                                                        <input type="checkbox" checked id="chkgetall" name="chkgetall" onclick="ChkGetAll()" />
                                                    </td>
                                                    <td class="l">&nbsp;&nbsp;
                                                        <input type="button" class="btn" style="width: 55px" id="dSubmit" value="Xác nhận" onclick="DisableButton(); Winloss_SearchByDate(null, null, null, null);" />&nbsp;
                                                        <input type="button" id="dToday" class="btn" style="width: 80px" value="<?php echo date("d/m/Y") ?> onclick="DisableButton(); Winloss_SearchOneDay(this);" />&nbsp;
                                                        <input type="button" id="dYesterday" class="btn" style="width: 80px" value="<?php echo date("d/m/Y") ?>" onclick="DisableButton(); Winloss_SearchOneDay(this);" />
                                                    </td>
                                                    <td valign="top">
                                                        <div id="loading" class="" style="float: left;"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td align="right"></td>
                                </tr>
                            </table>
                            <div id="reportFilter">
                                <input type="checkbox" id="chk_all" name="chk_all" onclick="CheckAll()" />
                                <label for="chk_all">Tất cả</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showsb" name="chk_showsb" onclick="IsCheck()" checked/>
                                <label for="chk_showsb">SB</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showcasino" name="chk_showcasino" onclick="IsCheck()" />
                                <label for="chk_showcasino">Casino</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showrb" name="chk_showrb" onclick="IsCheck()" checked/>
                                <label for="chk_showrb">Racing</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showng" name="chk_showng" onclick="IsCheck()" checked/>
                                <label for="chk_showng">Number Game</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showbi" name="chk_showbi" onclick="IsCheck()" />
                                <label for="chk_showbi">Bingo</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showp2p" name="chk_showp2p" onclick="IsCheck()" />
                                <label for="chk_showp2p">Poker</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showlivecasino" name="chk_showlivecasino" onclick="IsCheck()" checked/>
                                <label for="chk_showlivecasino">Live Casino</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showvs" name="chk_showvs" onclick="IsCheck()" checked/>
                                <label for="chk_showvs">Virtual Sports</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showkeno" name="chk_showkeno" onclick="IsCheck()" checked/>
                                <label for="chk_showkeno">Keno</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="hidden" name="FilterPostback" id="FilterPostback" value="postback" />
                            </div>
                            <div id="dvMsg" class="warning l" style="margin-bottom: 5px; margin-top: 10px; padding:0 2px;">
                                <ul>
                                    <li><span>Bạn có thể tra cứu dữ liệu báo cáo từ ngày 10/01/2014.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table id="hor-minimalist-a">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">#</th>
                                    <th style="width: 110px;">Thời gian</th>
                                    <th>Lựa chọn</th>
                                    <th style="width: 50px;">Tỷ lệ</th>
                                    <th style="width: 50px;">Tiền cược</th>
                                    <th style="width: 75px;">Trạng thái</th>
                                    <th style="width: 85px;">PT của Agent/
                                        <br/>Hoa hồng</th>
                                </tr>
                            </thead>
							<?php $i = 1; foreach($data as $bet){ ?>
                            <tr id='r<?php echo $bet->Id ?>'>
                                <td class='w-order'><?php echo $i ?></td>
                                <td class='c nonbreak'>Ref No: <?php echo $bet->Id ?>
                                    <div class="time"><?php echo date("d/m/Y H:i:s",$bet->timeBet) ?></div>
                                </td>
                                <td class='r bl_evt'>
                                    <div class=''><span class='scoremap'><a href="javascript:;"title="Score Map"><div class='scoremapIcon'></div></a></span><span class="favorite">&nbsp;<?php echo $bet->lblChoiceValue ?><span class='handicap'> <?php echo $bet->lblBetKindValue ?></span></span>
                                        <div class="bettype"> <?php echo $bet->lblBetKind ?></div>
										<div class="bettype"> <?php echo $bet->lblScoreValue ?></div>
                                        <div class="match"><span><?php echo $bet->lblHome ?></span><span>&nbsp;-&nbsp;vs&nbsp;-&nbsp;</span><span><?php echo $bet->lblAway ?></span>
                                        </div>
                                        <div class="league"><span class="sport">Bóng đá</span><span class="leagueName">&nbsp;<?php echo $bet->lblLeaguename ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class='bl_underdog nonbreak'><span class="underdog"><?php echo $bet->oddsRequest ?></span>
                                    <br /><span class="oddstype"><?php echo ($bet->oddsType==1)?"DEC":(($bet->oddsType==2)?"HK":"MY"); ?></span>
                                </td>
                                <td class='bl_underdog'><span class="stake"><?php echo $bet->BPstake ?></span>
                                </td>
                                <td class='c'>
                                    <div class="status">Đã hủy</div>
                                    <div class="ip">
                                        <br />
                                        <div class="iplink" onclick=""><?php echo $bet->ipBet ?></div>
                                    </div>
                                </td>
                                <td class='r'>
                                    <div class="div_pt"><font class="bl_underdog">0%</font>
                                        <br />
                                    </div>0%
                                    <br />
                                </td>
                            </tr>
							<?php $i++; } ?>
                            
							</tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
<script src="/assets/js/bet/Core.js?20141230" type="text/javascript"></script>
<script src="/assets/js/bet/AGEWnd.js?20141230" type="text/javascript"></script>
<script src="/assets/js/bet/BetList.js?20141230" type="text/javascript"></script>
<script src="/assets/js/bet/Reports.js?20141230" type="text/javascript"></script>
<script src="/assets/js/bet/OutstandingDetail.js?20141230" type="text/javascript"></script>

</html>
<script type="text/javascript">
    var _page = {
        'FilterCollection': ['chk_all', 'chk_showsb', 'chk_showcasino', 'chk_showrb', 'chk_showng', 'chk_showbi', 'chk_showp2p', 'chk_showlivecasino', 'chk_showvs', 'chk_showkeno'],
        'FilterStatusCollection': ['', 'on', '', 'on', 'on', '', '', 'on', 'on', 'on'],
        'CustId': 15800254,
        'fdate': '12/28/2014',
        'tdate': '1/4/2015',
        'page': '',
        'option': '5'
    };
</script>