<form method="post" action="/index.php?r=user/openorder">
	<label>Amount: </label>
	<input type="text" name="total" placeholder="min 0.1" />
	<label>Bank Name: </label>
	<input type="text" disabled="disabled" value="<?php echo $user->Payname ?>" />
	<label>Account Send: </label>
	<input type="text" disabled="disabled" value="<?php echo $user->PayAccount ?>" />
	<input type="hidden" value="withdraw" name="typeOrder"/>
	<input type="submit" class="" value="Continue"/>
</form>
<div style="display: block; margin-top: 20px;"><strong>Withdraw History</strong></div>
<div id="ResultItem" class="tabbox" style="display: block; margin-top: 20px;">

    <div class="tabbox_F">
        <table class="oddsTable info" width="100%" cellpadding="0" cellspacing="0" border="0">

            <tbody>
                <tr>
                    <th width="110" align="left" nowrap="">Time</th>
                    <th width="400" align="left" class="even">Type</th>
                    <th width="95" style="white-space:nowrap;">Total</th>
                    <th width="80" style="white-space:nowrap;" class="even">Bank name</th>
                    <th width="75" align="left">Status</th>
                </tr>


               <?php foreach($order as $o){ ?>

                <tr class="bgcpe" onmouseover="this.className='trbgov'" onmouseout="this.className='bgcpe'">
                    <td nowrap="nowrap"><?php echo date("d/m/Y H:i:s",$o->time_create) ?></td>
                    <td>
					<?php echo $o->type_order ?>
                    </td>
                    <td align="center">$<?php echo $o->AmountUSD ?>
                    </td>
                    <td align="center"><strong><?php echo $o->ToBankName ?></strong>
                    </td>
                    <td><strong><?php echo $o->status ?></strong>
                    </td>
                </tr>

                <?php }?>

            </tbody>
        </table>
    </div>

</div>