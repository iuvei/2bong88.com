<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Số tiền chưa xử lý của Member</title>
    <link href="/assets/stylesheets/agent/Agent.css?20141230" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Reports.css?20141230" rel="stylesheet" type="text/css" />
</head>

<body>
    <form id="frmmain" method="POST" action="">
        <div id="page_main">
            <div id="header_main">
                <div style="width: 690px"><span style="float:left">Số  tiền chưa xử lý của Member</span><span class="right_box"><input type="checkbox" id="chk_rpt_bold"  onclick="boldTable(this.checked);" /><label for="chk_rpt_bold" style="color: #999; text-transform: none;font-weight:bold;line-height:18px;">Bold</label>&nbsp;</span>
                </div>
            </div>
            <div style="width: 100%; padding: 5px 0px;">
                <div id="tbl-container">
                    <div id="boderRight">
                        <table class="tblRpt " width="700" style="display:none" border="0" cellpadding="0" cellspacing="1" id="tbl-rpt">
                            <tr class="RptHeader">
                                <td width="100px" rowspan="2" columnname="UserName">Tài khoản</td>
                                <td colspan="2" title="Sportsbook - Racing - Number Game - Live Casino - Virtual Sports - Keno">Số tiền chưa xử lý</td>
                                <td colspan="2">Bingo</td>
                                <td colspan="2">Casino</td>
                                <td colspan="2">Poker</td>
                            </tr>
                            <tr class="RptHeader02">
                                <td width="120px" columnname="outstanding">Member</td>
                                <td width="120px" columnname="positiontaking">Agent</td>
                                <td width="120px" columnname="BingoTransfer">Chuyển khoản</td>
                                <td width="120px" columnname="BingoOutstanding">Số tiền chưa xử lý</td>
                                <td width="120px" columnname="CasinoTransfer">Chuyển khoản</td>
                                <td width="120px" columnname="CasinoOutstanding">Số tiền chưa xử lý</td>
                                <td width="120px" columnname="P2PTransfer">Chuyển khoản</td>
                                <td width="120px" columnname="P2POutstanding">Số tiền chưa xử lý</td>
                            </tr>
							
							<?php $totalOut = 0;  foreach($data as $bet){ ?>
							<?php 

								$totalU = 0;
								
								$user = User::model()->findByAttributes(array(
								
									'username'=>$bet->username,
								
								));
								$totalU = $user->outStanding;
								$totalOut += $user->outStanding;

							?>
                            <tr bgcolor="#F6F8F9" onmouseover="this.style.backgroundColor='#f8ff8d'" onmouseout="this.style.backgroundColor='#F6F8F9'">
                                <td class="left_normal"><?php echo $bet->username ?></td>
                                <td><span class="downline_link" onclick="viewSBBetList('15800254','<?php echo $bet->username ?>','RunByDate_Mem')"><?php echo number_format($totalU,2); ?></span>
                                </td>
                                <td></td>
                                <td></td>
                                <td><span class="downline_link" onclick="viewBingoOutstandingBetList('15800254','<?php echo $bet->username ?>','RunByDate_Mem',2)"></span>
                                </td>
                                <td></td>
                                <td><span class="downline_link" onclick="viewCasinoOutstandingBetList('15800254','<?php echo $bet->username ?>','RunByDate_Mem',2)"></span>
                                </td>
                                <td></td>
                                <td><span></span>
                                </td>
                            </tr>
							<?php }?>
                            <tr class="RptFooter">
                                <td class="l">Tổng cộng</td>
                                <td><?php echo number_format($totalOut,2); ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="/assets/js/bet/Core.js?20141230" type="text/javascript"></script>
    <script src="/assets/js/bet/Reports.js?v=<?php echo time(); ?>" type="text/javascript"></script>
</body>

</html>
<script type="text/javascript">
    var _page = {
        'ReportRowCount': 1,
        'SortingColumn': '',
        'SortingUp': true,
        'SortingEnabled': true,
        '_date': '1/4/2015',
        'RoleId': 2
    };
</script>