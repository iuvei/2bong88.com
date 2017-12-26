<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Bet List</title>
    <link href="/assets/stylesheets/agent/Agent.css?20141215" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/BetList.css?20141215" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="bl_title">Danh sách đặt cược của Member <?php echo $fdate ?> --> <?php echo $tdate ?>- <?php echo $username ?>
        <div id="exportExcelDiv" class="divBoxRight">
            <input type="image" id="exporttoexcel" name="exporttoexcel" alt="Excel" nofocus="true" src="/assets/_GlobalResources/Images/excel.gif" title="Excel" class="hand" />
        </div>
    </div>
    <div id="spData">
        <table id="hor-minimalist-a">
            <thead>
                <tr>
                    <th style="width: 20px;">#</th>
                    <th style="width: 110px;">Thời gian</th>
                    <th>Lựa chọn</th>
                    <th style="width: 50px;">Tỷ lệ</th>
                    <th style="width: 50px;">Tiền cược</th>
                    <th style="width: 50px;">Thắng-thua</th>
                    <th style="width: 75px;">Trạng thái</th>
                    <th style="width: 85px;">PT của Agent/
                        <br/>Hoa hồng</th>
                </tr>
            </thead>
            <tbody>
				<?php $i = 1; $totalWinLost = 0; $totalGross = 0; foreach($data as $bet){

					$totalWinLost += $bet->winLost;
					if($bet->winLost!=0)
					{
						$totalGross += $bet->com;
					}

				?>
                <tr id='<?php echo $bet->Id ?>'>
                    <td class='w-order'><?php echo $i ?></td>
                    <td class='c nonbreak'>Ref No: <?php echo $bet->Id ?>
                        <div class="time"><?php echo date("m/d/Y H:i:s",$bet->timeBet) ?></div>
                    </td>
                    <td class='r bl_evt'>
                        <div>
                            <div class=''><span class="favorite"><?php echo $bet->lblChoiceValue ?><span class='handicap'> <?php echo $bet->lblBetKindValue ?></span><span class="favorite"> <?php echo $bet->lblScoreValue ?></span></span>
                                <div class="bettype"> <?php echo $bet->lblBetKind ?></div>
                                <div class="match"><span><?php echo $bet->lblHome ?></span><span>&nbsp;-&nbsp;vs&nbsp;-&nbsp;</span><span><?php echo $bet->lblAway ?></span>&nbsp;
                                    <div class='firstGoal '>&nbsp;</div>
                                    <div class='lastGoal'>&nbsp;</div>
                                    <div class='fhFirstGoal'>&nbsp;</div>
                                    <div class='fhLastGoal'>&nbsp;</div>
                                </div>
                                <div class="league"><span class="sport">Bóng đá</span><span class="leagueName">&nbsp;*<?php echo $bet->lblLeaguename ?></span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class='bl_underdog nonbreak'><span class="underdog"><font color='#B50000'><?php echo $bet->oddsRequest ?></font></span>
                        <br /><span class="oddstype">MY</span>
                    </td>
                    <td class='bl_underdog'><span class="stake"><?php echo $bet->BPstake ?></span>
                    </td>
                    <td class='r nonbreak'>
                        <div><span class="bl_underdog"><?php echo $bet->winLost ?></span>
                        </div>
                        <div><font class="bl_underdog"><?php echo $bet->com ?></font>
                        </div>
                    </td>
                    <td class='c'>
                        <div class="status"><?php echo $bet->lbloddsStatus ?></div>
                        <div class="result" onclick="ViewResult(11478526, 0, 1, 1, 6700759916, '<?php echo $bet->username ?>', '12/13/2014 12:00:00 AM', 0, 3, 0, 0);">Kết quả</div>
                        <div class="ip">
                            <br />
                            <div class="iplink" onclick="OpenIPInfo('<?php echo $bet->ipBet ?>');"><?php echo $bet->ipBet ?></div>
                        </div>
                    </td>
                    <td class='r'>
                        <div class="div_pt"><font class="bl_underdog">0%</font>
                            <br /><span class="bl_underdog">0.00</span>
                            <br />
                        </div>0.25%
                        <br />0.00
                        <br />
                    </td>
                </tr>
               <?php $i++; } ?>
				<tr class="bl_footertotal" id="tr_footer">
                    <td class="r" colspan="5">
                        <div>
                            <div>Tổng phụ (thắng thua):</div>
                            <div>Tổng phụ (hoa hồng):</div>
                            <div>Tổng cộng:</div>
                        </div>
                    </td>
                    <td class="r">
                        <div>
                            <div class="bl_footertotal"><font color='#B50000'><?php echo number_format($totalWinLost,2) ?></font>
                            </div>
                            <div class="bl_footertotal"><?php echo number_format($totalGross,2) ?></div>
                            <div class="bl_footertotal"><font color='#B50000'><?php echo number_format($totalWinLost+$totalGross,2) ?></font>
                            </div>
                        </div>
                    </td>
                    <td colspan="2"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="comm_note">
        <div class="title"><span>Note</span>
        </div>
        <div class="content">Com. is rounded for reference only. Therefore, Subtotal Com. amount may be different from the sum of Com. when it sums all the actual Com. amounts.</div>
    </div>
</body>
<script src="/assets/js/bet/Core.js?20141215" type="text/javascript"></script>
<script src="/assets/js/bet/AGEWnd.js?20141215" type="text/javascript"></script>
<script src="/assets/js/bet/BetList.js?20141215" type="text/javascript"></script>

</html>
<script type="text/javascript">
    var _page = {
        'type': 'WLByDate',
        'fdate': '12/1/2014',
        'tdate': '<?php echo date('m/d/Y'); ?>',
        'isHistoryReport': 0,
        'FilterCollection': ['chk_all', 'chk_showsb', 'chk_showcasino', 'chk_showrb', 'chk_showng', 'chk_showbi', 'chk_showp2p', 'chk_showlivecasino', 'chk_showvs', 'chk_showprogressivebonus', 'chk_showkeno'],
        'FilterStatusCollection': ['', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', '', 'on'],
        'CustId': 15695963
    };
</script>