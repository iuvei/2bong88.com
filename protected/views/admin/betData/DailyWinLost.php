<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Đánh giá kết quả thắng thua trong ngày</title>
    <link href="/assets/stylesheets/agent/Agent.css?20150304" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Reports.css?20150304" rel="stylesheet" type="text/css" />
</head>

<body>
    <form id="frmmain" method="POST" action=''>
        <div id="page_main">
            <div id="header_main">Đánh giá kết quả thắng thua trong ngày</div>
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <div id="box_header">
                            <table style="width: 100%">
                                <tr>
                                    <td>
                                        <link href="/assets/stylesheets/agent/DateRangeSelect.css?20150304" rel="stylesheet" type="text/css" />
                                        <script src="/assets/js/bet/DateRangeSelect.js?20150304" type="text/javascript"></script>
                                        <script type="text/javascript">
                                            var max_server_date = '<?php echo date("n/d/Y") ?>';
                                        </script>
                                        <div id="spDateTimeSearch">
                                            <table cellpadding="0" cellspacing="0" border="0">
                                                <tr style="height: 32px;">
                                                    <td id="tdfdatetext" style="padding-left: 6px;" class="l"><span id="spfdatetext">Từ:</span></td>
                                                    <td id="tdFromDateCal" class="l"><span id="spFromDateCal">
													<link href="/assets/stylesheets/agent/jscal2.css?20150304" rel="stylesheet" type="text/css" />
													<link href="/assets/stylesheets/agent/steel.css?20150304" rel="stylesheet" type="text/css" />
													<script src="/assets/js/bet/jscal2.js?20150304" type="text/javascript">
													</script><script src="/assets/js/bet/en.js?20150304" type="text/javascript"></script>
													<table cellpading="0" cellspacing="0" border="0"><tr><td><input id="fdate" class="date_no" value="<?php echo $fdate ?>" type="text" size="13"name="fdate" readonly="readonly" /></td><td><input type="image" alt="" src="/assets/_GlobalResources/Images/cal.gif" id="fdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" onclick="javascript:return false;" /><!-- <img alt="" src="/_GlobalResources/Images/cal.gif" id="fdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" /> --></td></tr></table><script type="text/javascript">function CalendarOnSelect() {if($("ddlSelectDate"))$("ddlSelectDate").value = 8;}var fdate = Calendar.setup({animation:false,trigger: "fdate_trigger",inputField: "fdate",min: 20130901,max: 99991231,dateFormat: "%m/%d/%Y",weekNumbers:true,onSelect: function() {CalendarOnSelect();this.hide();}});</script></span></td>
                                                    <td id="tdtdatetext" class="l">&nbsp;&nbsp; <span id="sptdatetext">đến:</span></td>
                                                    <td id="tdToDateCal" class="l"><span id="spToDateCal"><table cellpading="0" cellspacing="0" border="0"><tr><td><input id="tdate" class="date_no" value="<?php echo $tdate ?>" type="text" size="13"name="tdate" readonly="readonly" /></td><td><input type="image" alt="" src="/assets/_GlobalResources/Images/cal.gif" id="tdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" onclick="javascript:return false;" /><!-- <img alt="" src="/_GlobalResources/Images/cal.gif" id="tdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" /> --></td></tr></table><script type="text/javascript">function CalendarOnSelect() {if($("ddlSelectDate"))$("ddlSelectDate").value = 8;}var tdate = Calendar.setup({animation:false,trigger: "tdate_trigger",inputField: "tdate",min: 20130901,max: 99991231,dateFormat: "%m/%d/%Y",weekNumbers:true,onSelect: function() {CalendarOnSelect();this.hide();}});</script></span></td>
                                                    <td class="l">&nbsp;&nbsp;
                                                        <input type="button" class="btn" style="width: 55px" id="dSubmit" value="Xác nhận" onclick="DisableButton(); Winloss_SearchByDate(null, null, null, null);" />&nbsp;
                                                        <input type="button" id="dToday" class="btn" style="width: 80px" value="<?php echo date("m/d/Y") ?>" onclick="DisableButton(); Winloss_SearchOneDay(this);" />&nbsp;
                                                        <input type="button" id="dYesterday" class="btn" style="width: 80px" value="<?php echo date("m/d/Y") ?>" onclick="DisableButton(); Winloss_SearchOneDay(this);" />
                                                    </td>
                                                    <td valign="top">
                                                        <div id="loading" class="" style="float: left;"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td align="right">
                                        <input type="checkbox" id="chk_rpt_bold" onclick="boldTable(this.checked);" />
                                        <label for="chk_rpt_bold" style="color: #999; text-transform: none;font-weight:bold;line-height:18px;">Bold</label>&nbsp;
                                        <input alt="Xuất sang Excel" src="/assets/_GlobalResources/Images/excel.gif" type="image" id="exporttoexcel" name="exporttoexcel" nofocus="true" title="Xuất sang Excel" class="hand" />
                                    </td>
                                </tr>
                            </table>
                            <div id="reportFilter">
                                <input type="checkbox" id="chk_all" name="chk_all" onclick="CheckAll()" checked/>
                                <label for="chk_all">Tất cả</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showsb" name="chk_showsb" onclick="IsCheck()" checked/>
                                <label for="chk_showsb">SB</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showcasino" name="chk_showcasino" onclick="IsCheck()" checked/>
                                <label for="chk_showcasino">Casino</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showrb" name="chk_showrb" onclick="IsCheck()" checked/>
                                <label for="chk_showrb">Racing</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showng" name="chk_showng" onclick="IsCheck()" checked/>
                                <label for="chk_showng">Number Game</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showbi" name="chk_showbi" onclick="IsCheck()" checked/>
                                <label for="chk_showbi">Bingo</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="chk_showp2p" name="chk_showp2p" onclick="IsCheck()" checked/>
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
                                    <li><span id="spMsg">Bạn có thể tra cứu dữ liệu báo cáo từ ngày 09/01/2013.</span></li>
                                </ul>
                            </div>
                            <div id="reportFilterByType" style="padding-left:5px; padding-top:5px;">Báo cáo&nbsp;
                                <input id="rdbDaily" name="AnalFilter" value="" onclick="Daily_Onclick()" type="radio" Checked />
                                <label for="rdbDaily">Hằng ngày</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input id="rdbMonthly" name="AnalFilter" value="" onclick="Monthly_Onclick()" type="radio" />
                                <label for="rdbMonthly">Hằng tháng</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input id="rdbSport" name="AnalFilter" value="" onclick="Sport_Onclick()" type="radio" />
                                <label for="rdbSport">Sport</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="tbl-container">
                            <div id="boderRight">
                                <table class="tblRpt " width="750" border="0" cellpadding="0" cellspacing="1" id="tbl-rpt">
                                    <tr id="rowTitle" class="RptTitle">
                                        <td id="content_title" colspan="10">Đánh giá kết quả thắng thua trong ngày <span id='spSumaryDate'><?php echo $fdate ?>--&gt;<?php echo $tdate ?></span></td>
                                    </tr>
                                    <tr class="RptHeader">
                                        <td rowspan="2" columnname="breakdown">Hằng ngày</td>
                                        <td rowspan="2" columnname="turnover">Tiền Cược</td>
                                        <td colspan="3">Member</td>
                                        <td colspan="3">Agent</td>
                                        <td rowspan="2" columnname="betcount">Company</td>
                                        <td rowspan="2" columnname="betcount">Số lượng cược</td>
                                    </tr>
                                    <tr class="RptHeader02">
                                        <td columnname="member_winlost">Thắng-thua</td>
                                        <td columnname="member_comm">Tiền hoa hồng</td>
                                        <td columnname="member_total">Tổng cộng</td>
                                        <td columnname="agent_winlost">Thắng-thua</td>
                                        <td columnname="agent_comm">Tiền hoa hồng</td>
                                        <td columnname="agent_total">Tổng cộng</td>
                                    </tr>
                                    <tr bgcolor="#F6F8F9" onmouseover="this.style.backgroundColor='#f8ff8d'" onmouseout="this.style.backgroundColor='#F6F8F9'">
                                        <td><?php echo $fdate ?>--&gt;<?php echo $tdate ?></td>
                                        <td><?php echo $totalBet ?></td>
                                        <td class="altercol"><?php echo $totalWinLost ?></td>
                                        <td class="altercol"><?php echo $comMember ?></td>
                                        <td class="altercol_bold"><?php echo $finalWinlost ?></td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td class="b">0.00</td>
                                        <td><?php echo $company ?></td>
                                        <td><?php echo $countBet ?></td>
                                    </tr>
                                    <tr class="RptFooter">
                                        <td class="l">Tổng cộng</td>
                                        <td><?php echo $totalBet ?></td>
                                        <td class="altercol_master"><?php echo $totalWinLost ?></td>
                                        <td class="altercol_master"><?php echo $comMember ?></td>
                                        <td class="altercol_master"><?php echo $finalWinlost ?></td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td>0.00</td>
                                        <td><?php echo $company ?></td>
                                        <td><?php echo $countBet ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <input type="hidden" name="CustId" id="CustId" value="<?php echo Yii::app()->user->getId(); ?>" />
        <input type="hidden" name="IsSwitch" id="IsSwitch" value="0" />
        <input type="hidden" name="OldView" id="OldView" value="" />
        <input type="hidden" name="UserName" id="UserName" value="" />
        <input type="hidden" name="Type" id="Type" value="" />
    </form>
</body>
<script src="/assets/js/bet/Core.js?20150304" type="text/javascript"></script>
<script src="/assets/js/bet/Reports.js?20150304" type="text/javascript"></script>
<script src="/assets/js/bet/WinlossAnalysis.js?v=<?php echo time(); ?>" type="text/javascript"></script>

</html>
<script type="text/javascript">
    var _page = {
        'FilterCollection': ['chk_all', 'chk_showsb', 'chk_showcasino', 'chk_showrb', 'chk_showng', 'chk_showbi', 'chk_showp2p', 'chk_showlivecasino', 'chk_showvs', 'chk_showkeno'],
        'FilterStatusCollection': ['on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'],
        'CustId': <?php echo Yii::app()->user->getId(); ?>,
        'ReportRowCount': 1,
        'SortingColumn': '',
        'SortingUp': true,
        'SortingEnabled': true,
        '_date': '<?php echo date("n/d/Y") ?>',
        'RoleId': 2
    };
</script>