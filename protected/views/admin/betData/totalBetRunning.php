<table id="hor-minimalist-a">
    <thead>
        <tr>
            <th style="width: 20px;">#</th>
            <th style="width: 110px;">Thành viên</th>
            <th style="width: 110px;">Thời gian</th>
            <th>Lựa chọn</th>
            <th style="width: 50px;">Tỷ lệ</th>
            <th style="width: 50px;">Tiền cược</th>
            <th style="width: 75px;">Trạng thái</th>
        </tr>
    </thead>
    <tbody>
		<?php $i=1; foreach($betData as $bet){ ?>
        <tr id='r<?php echo $bet->Id ?>'>
            <td class='w-order'><?php echo $i; ?></td>
            <td class='c'><?php echo $bet->username ?></td>
            <td class='c nonbreak'>Ref No: <?php echo $bet->Id ?>
                <div class="time"><?php echo date("d/m/Y H:i:s",$bet->timeBet) ?></div>
            </td>
            <td class='r bl_evt'>
                <div>
                    <div class=''><span class='scoremap'><a href="javascript:;"title="Score Map"><div class='scoremapIcon'></div></a></span><span class="favorite"><?php echo $bet->lblChoiceValue ?><span class='handicap'>&nbsp;&nbsp;<?php echo $bet->lblBetKindValue ?></span></span>
                        <div class=""><span class="handicap bettypeA"><?php echo $bet->lblBetKind ?></span></div>
						<div class="bettype"> <?php echo $bet->lblScoreValue ?></div>
                        <div class="match"><span><?php echo $bet->lblHome ?></span><span>&nbsp;-&nbsp;vs&nbsp;-&nbsp;</span><span><?php echo $bet->lblAway ?></span></div>
                        <div class="league"><span class="sport">Bóng đá</span><span class="leagueName">&nbsp;<?php echo $bet->lblLeaguename ?></span></div>
                    </div>
                </div>
            </td>
            <td class='bl_underdog nonbreak'><span class="underdog"><font color='#B50000'><?php echo $bet->oddsRequest ?></font></span>
                <br /><span class="oddstype"><?php echo ($bet->oddsType==1)?"DEC":(($bet->oddsType==2)?"HK":"MY"); ?></span></td>
            <td class='bl_underdog'><span class="stake"><?php echo $bet->BPstake ?></span></td>
            <td class='c'>
                <div class="status"><?php echo $bet->lbloddsStatus ?></div>
                <div class="ip">
                    <br />
                    <div class="iplink" onclick=""><?php echo $bet->ipBet ?></div>
                </div>
            </td>
        </tr>
		<?php $i++; } ?>
       
	</tbody>
</table>