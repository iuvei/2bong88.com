<?php if($betData!=null){ ?>

<script>
var data = '<div align="center"></div>';
data += '<div align="center" id="lastrefresh" style="display: none">Time : <span id="lastrefresh_time"></span>';
data += '</div>';
data += '<div align="center" id="checkStatus" style="display: none">Checking Status Now...</div>';
<?php foreach($betData as $bet){ ?>
data += '<div class="BetInfo liveligh" onmouseover="this.className=\'BetInfo Ltrbgov\'" onmouseout="this.className=\'BetInfo liveligh\'">';
    data += '<table width="100%" border="0" cellpadding="0" cellspacing="0">';
        data += '<tr>';
            data += '<td colspan="2" class="TextStyle01 ">Soccer / <?php echo $bet->lblBetKind ?></td>';
        data += '</tr>';
        data += '<tr>';
            data += '<td colspan="2" class="TextStyle02 <?php echo ($bet->lbloddsStatus=="canceled")?"text-canceled":"" ?>" onmousemove="NumberGroupTitle(this);"> <?php echo $bet->lblChoiceValue ?></td>';
        data += '</tr>';
        data += '<tr>';
            data += '<td><span class="TextStyle03 "><span class=\'TextStyle03 \'><?php echo $bet->lblBetKindValue ?></span><span class=\'TextStyle01\'><?php echo $bet->lblScoreValue ?></span></span><span class="">@</span><span class="UdrDogOddsClass"><?php echo $bet->oddsRequest ?></span>';
            data += '</td>';
            data += '<td align="right" class="TextStyle01 "><b><?php echo $bet->BPstake ?></b>';
            data += '</td>';
        data += '</tr>';
        data += '<tr>';
            data += '<td colspan="2" class="TextStyle04 <?php echo ($bet->lbloddsStatus=="canceled")?"text-canceled":"" ?>">';
                data += '<div><?php echo $bet->lblHome ?> -vs- <?php echo $bet->lblAway ?></div>';
                data += '<div></div>';
            data += '</td>';
        data += '</tr>';
        data += '<tr>';
            data += '<td colspan="2" class="TextStyle06">';
                data += '<div class="left">ID:<?php echo $bet->Id ?></div>';
                data += '<div class="right text-ellipsis" style="width:70px; text-align:right; line-height:inherit;" title="<?php echo $bet->lbloddsStatus ?>"><?php echo $bet->lbloddsStatus ?></div>';
            data += '</td>';
        data += '</tr>';
    data += '</table>';
data += '</div>';
<?php }?>
parent.loadWaitingBetList();
parent.Countdown();//-->
</script>
<?php } else{ ?>
<script>
	<!--
	var data='<div align="center">Have no data</div><div align="center" id="lastrefresh" style="display: none">{{lbl_countDown}} : <span id="lastrefresh_time"></span></div><div align="center" id="checkStatus" style="display: none">{{lbl_checkStatus}}</div>   ';
	parent.loadWaitingBetList();
	//-->
</script>
<?php }?>