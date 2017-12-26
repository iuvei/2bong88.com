<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Thắng thua theo loại cược</title>
    <link href="/assets/stylesheets/agent/Agent.css?20150304" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Reports.css?20150304" rel="stylesheet" type="text/css" />
</head>

<body>
    <form id="frmmain" method="get" action="">
        <div id="page_main">
            <div id="header_main">Thắng thua theo loại cược</div>
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
													<script src="/assets/js/bet/jscal2.js?20150304" type="text/javascript"></script>
													<script src="/assets/js/bet/en.js?20150304" type="text/javascript"></script>
													<table cellpading="0" cellspacing="0" border="0"><tr><td><input id="fdate" class="date_no" value="<?php echo date("m/d/Y") ?>" type="text" size="13"name="fdate" readonly="readonly" /></td><td>
													<input type="image" alt="" src="/assets/_GlobalResources/Images/cal.gif" id="fdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" onclick="javascript:return false;" /><!-- <img alt="" src="/_GlobalResources/Images/cal.gif" id="fdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" /> --></td></tr></table><script type="text/javascript">function CalendarOnSelect() {if($("ddlSelectDate"))$("ddlSelectDate").value = 8;}var fdate = Calendar.setup({animation:false,trigger: "fdate_trigger",inputField: "fdate",min: 20150228,max: 99991231,dateFormat: "%m/%d/%Y",weekNumbers:true,onSelect: function() {CalendarOnSelect();this.hide();}});</script></span></td>
                                                    <td id="tdtdatetext" class="l">&nbsp;&nbsp; <span id="sptdatetext">đến:</span></td>
                                                    <td id="tdToDateCal" class="l"><span id="spToDateCal"><table cellpading="0" cellspacing="0" border="0"><tr><td><input id="tdate" class="date_no" value="03/11/2015" type="text" size="13"name="tdate" readonly="readonly" /></td><td><input type="image" alt="" src="/assets//_GlobalResources/Images/cal.gif" id="tdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" onclick="javascript:return false;" /><!-- <img alt="" src="/_GlobalResources/Images/cal.gif" id="tdate_trigger" title="Date selector"style="margin: 0px; cursor: pointer" /> --></td></tr></table><script type="text/javascript">function CalendarOnSelect() {if($("ddlSelectDate"))$("ddlSelectDate").value = 8;}var tdate = Calendar.setup({animation:false,trigger: "tdate_trigger",inputField: "tdate",min: 20150228,max: 99991231,dateFormat: "%m/%d/%Y",weekNumbers:true,onSelect: function() {CalendarOnSelect();this.hide();}});</script></span></td>
                                                    <td class="l">&nbsp;&nbsp;
                                                        <input type="button" class="btn" style="width: 55px" id="dSubmit" value="Xác nhận" onclick="DisableButton(); SearchByDate();" />&nbsp;
                                                        <input type="button" id="dToday" class="btn" style="width: 80px" value="<?php echo date("n/d/Y") ?>" onclick="DisableButton(); SearchOneDay(this.value);" />&nbsp;
                                                        <input type="button" id="dYesterday" class="btn" style="width: 80px" value="3/10/2015" onclick="DisableButton(); SearchOneDay(this.value);" />
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
                                        <label for="chk_rpt_bold" style="color: #999; text-transform: none; font-weight: bold;line-height: 18px;">Bold</label>&nbsp;
                                        <input alt="Xuất sang Excel" src="/assets/_GlobalResources/Images/excel.gif" type="image" id="exporttoexcel" name="exporttoexcel" nofocus="true" title="Xuất sang Excel" class="hand" />
                                    </td>
                                </tr>
                            </table>
                            <div class="warning l" style="margin-bottom: 5px; margin-top: -7px; padding:0 2px;">
                                <ul>
                                    <li><span>Bạn có thể tra cứu dữ liệu báo cáo từ ngày 02/28/2015.</span></li>
                                </ul>
                            </div>
                            <div id="dvMsg" class="warning l" style="margin-bottom: 5px; margin-top: 10px; padding:0 2px;">
                                <ul></ul>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="tbl-container">
                            <div id="boderRight">
                                <table class="tblRpt " width="750px" border="0" cellpadding="0" cellspacing="1" id="tbl-rpt" style="display:none;">
                                    <tr id="rowTitle" class="RptTitle">
                                        <td colspan="11" id="content_title">Thắng thua theo loại cược&nbsp;03/11/2015--&gt;03/11/2015</td>
                                    </tr>
                                    <tr class="RptHeader">
                                        <td rowspan="2" class="nowrap">Thể loại cá cược</td>
                                        <td rowspan="2" columnname="noofticket">Số trận cược</td>
                                        <td rowspan="2" columnname="turnover">Tiền Cược</td>
                                        <td rowspan="2" class="nowrap" style="width: 80px" columnname="GrossComm">Gross Comm</td>
                                        <td colspan="3">Member</td>
                                        <td colspan="3">Agent</td>
                                        <td rowspan="2" columnname="company">Company</td>
                                    </tr>
                                    <tr class="RptHeader02">
                                        <td columnname="memberwinlost">Thắng / Thua</td>
                                        <td columnname="playercomm">Hoa hồng</td>
                                        <td columnname="membertotal">Tổng cộng</td>
                                        <td columnname="agwinlost">Thắng / Thua</td>
                                        <td columnname="agcomm">Hoa hồng</td>
                                        <td columnname="agtotal">Tổng cộng</td>
                                    </tr>
									<?php $totalBetAll = 0;$totalWinLostAll = 0; $comMemberAll = 0; $finalWinlostAll = 0; $companyAll = 0; $countAll = 0; $comMember = 0; ?>
									<?php $i = 1; foreach($betData as $bet){ ?>
                                    <tr bgcolor="<?php echo ($i%2==0)?"#F6F8F9": "#faf9ee" ?>" onmouseover="this.style.backgroundColor='#f8ff8d'" onmouseout="this.style.backgroundColor='#faf9ee'">
                                        <td class="left_normal"><?php echo $bet->lblBetKind ?></td>
                                        <?php 
											
											$criteria = new CDbCriteria;
											$criteria->condition = "lblBetKind = :lblBetKind AND (lbloddsStatus = :stt OR lbloddsStatus = :stt2)";
											$criteria->params = array(":lblBetKind"=>$bet->lblBetKind,":stt"=>"win",":stt2"=>"lost");
											$criteria->select = array("BPstake","winLost");
											$betDataType = betData::model()->findAll($criteria);
											$totalBet = 0;
											$totalWinLost = 0;
											foreach($betDataType as $bet)
											{
												$totalBet += $bet->BPstake;
												$totalWinLost += $bet->winLost;
												$comMember += $bet->com;
												
											}
											$finalWinlost = $totalWinLost + $comMember;
											$company = -($finalWinlost);
											$count = count($betDataType);
											
											$totalBetAll += $totalBet;
											$totalWinLostAll += $totalWinLost;
											$comMemberAll += $comMember;
											$finalWinlostAll += $finalWinlost;
											$companyAll += $company;
											$countAll += $count;

										?>
										<td><?php echo $count ?></td>
                                        <td><?php echo $totalBet ?></td>
                                        <td><?php echo $comMember ?></td>
                                        <td><?php echo $totalWinLost ?></td>
                                        <td><?php echo $comMember ?></td>
                                        <td class="b"><?php echo $finalWinlost ?></td>
                                        <td class="altercol">0.00</td>
                                        <td class="altercol">0.00</td>
                                        <td class="altercol_bold">0.00</td>
                                        <td class="b"><?php echo $company ?></td>
                                    </tr>
									<?php $i++; } ?>
                                    
                                    <tr class="RptFooter">
                                        <td class="l">Tổng cộng</td>
                                        <td><?php echo $countAll ?></td>
                                        <td class="nowrap"><?php echo $totalBetAll ?></td>
                                        <td class="nowrap"><?php echo $comMemberAll ?></td>
                                        <td class="nowrap"><?php echo $totalWinLostAll ?></td>
                                        <td class="nowrap"><?php echo $comMemberAll ?></td>
                                        <td class="nowrap"><?php echo $finalWinlostAll ?></td>
                                        <td class="altercol_master">0.00</td>
                                        <td class="altercol_master">0.00</td>
                                        <td class="altercol_master">0.00</td>
                                        <td class="nowrap"><?php echo $companyAll ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <script src="/assets/js/bet/Core.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/Reports.js?20150304" type="text/javascript"></script>
</body>

</html>
<script type="text/javascript">
    var _page = {
        'role': 2,
        'ReportRowCount': 2,
        'SortingColumn': '',
        'SortingUp': true,
        'SortingEnabled': true,
        '_date': '3/11/2015',
        'RoleId': 2
    };
</script>