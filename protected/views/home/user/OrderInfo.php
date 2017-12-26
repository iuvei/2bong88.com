
<div class="row content-middle">
	<div class="border-main"></div>
	
	<div class="col-lg-8 col-sm-8 col-xs-12 col-md-10 right-content">
		<div class="title-box"><span>Order</span></div>
			<div class="row form-open-order">
				
				 <?php if($message==""){ ?>
		    <div class="table-responsive table-order table-order-info">
		        <div style="margin-bottom: 10px"></div>
		        <table class="table oddsTable info" style="width: 100%;">
					<tr>
						<td>Order type</td>
						<?php $type = ($order->type_order=="withdraw")?"Withdraw":"Deposit" ?>
						<td><?php echo $type ?></td>
					
					</tr>
					<tr>
						<td>Status</td>
						<?php 
							$textStatus = "";
							
							switch($order->status)
							{
							
								case 'incomplete':
									if($order->type_order=="withdraw")
									{
										$textStatus = "Waiting for check balance";
									}else $textStatus = "Wait paid";
									break;
								case 'recieved':
									
									if($order->type_order=="withdraw")
									{
										$textStatus = "Balance is okie";
									}else $textStatus = "Found your payment, processing";
									
									break;
								case 'havedOPT':
									$textStatus = "Processing";
									break;
								case 'completed':
									$textStatus = "Completed";
									break;
								case 'error':
									$textStatus = "Order error, please contact with support";
									break;
							
							}
							
						?>
						<td class="status-order"><?php echo $textStatus ?><img id="loading-order" src="/images/ajax-loader.gif" title="loading" /></td>
						
					
					</tr>
					<tr>
						<td>Bank name</td>
						<td><?php echo $order->ToBankName ?></td>
					</tr>
					<tr>
						<td>Bank Account Number</td>
						<td><?php echo $order->ToAccount ?></td>
					</tr>
					<tr>
						<td>Bank Account Name</td>
						<td><?php echo $order->ToAccountName ?></td>
					</tr>
					<tr>
						<td>Total</td>
						<td>$<?php echo $order->AmountUSD ?></td>
					</tr>
					<tr>
						<td>Order code</td>
						<td><?php echo $order->code ?></td>
					</tr>
					<tr>
						<td>Time Create</td>
						<td><?php echo date("H:i:s d/m/Y",$order->time_create) ?></td>
					</tr>
					
					<?php if($order->status=="incomplete" && $order->type_order=="deposit" && $order->ToBankName=="PM"){ ?>
					<tr>
						
						
						<td colspan="2" style="text-align: center;">
							
							<?php 

								$Payment = Payment::model()->findByPk(1);

							?>
							<form action="https://perfectmoney.com/api/step1.asp" method="post">
								<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $order->AmountUSD ?>">
								<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $Payment->IdPm; ?>">
								<input type="hidden" name="PAYEE_NAME" value="ibetpm.Com">
								<input type="hidden" name="PAYMENT_UNITS" value="USD">
								<input type="hidden" name="STATUS_URL" value="http://ibetpm.com/index.php?r=user/SuccessPm">
								<input type="hidden" name="PAYMENT_URL" value="http://ibetpm.com/index.php?r=user/SuccessPm">
								<input type="hidden" name="NOPAYMENT_URL" value="http://ibetpm.com/">
								<input type="hidden" name="BAGGAGE_FIELDS" value="<?php echo $order->code ?>">
								<input type="hidden" name="SUGGESTED_MEMO" value="<?php echo $order->code ?>">
								<input type="hidden" name="ORDER_NUM" value="<?php echo $order->code ?>">
								<input type="hidden" name="CUST_NUM" value="<?php echo $order->code ?>">
								<input type="hidden" name="PAYMENT_ID" value="<?php echo $order->code ?>">
								<input type="hidden" name="SUGGESTED_MEMO_NOCHANGE" value="1">
								<button type="submit" class="btn btn-default btn-home btn-login">Pay now</button>
							</form>
							
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;">
							Please click "Pay now" to process order.<br>
							
						</td>
					</tr>
					<?php }  elseif($order->status=="incomplete" && $order->type_order=="deposit" &&  $order->ToBankName=="BTC"){ ?>
					
					<tr>
						
						<?php 
						
							$eBank = Ebank::model()->findByPk(1);
							$crypt = new Crypt();
							$passBtc = $crypt->decrypt($eBank->BtcPass);
							$passBtc2 = $crypt->decrypt($eBank->BtcSencondPass);
							$idBtc = $eBank->BtcId;
							$btc = new BTC($idBtc,$passBtc,$passBtc2,"","");
							
							$address = $btc->CreateAddress($order->Cookie);
							$amount = round(($order->AmountUSD/$eBank->BtcRate),8);
							
							
							
						
						?>
						<td colspan="2" style="text-align: center;">
							
							
							BTC address: <?php echo $address ?></br>
							Bank name: BTC </br>
							Total: <?php  echo  $amount; ?> BTC</br>
							
							
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;">
							Please send money with above info.<br>
							
						</td>
					</tr>
					<script type="text/javascript">
					
						var address = "<?php echo $address ?>", tBtc = 3000;
						function checkStatusBTC()
						{
							$.ajax({
								type: "post",
								url: "/index.php?r=user/CheckBTC",
								data: {"code":"<?php echo $order->code ?>","address":"<?php echo $address ?>"}
							})
							.done(function(data)
							{
								
								
								if (data=="okie")
									alert('found your payment!!!');
									
								else
								{
									console.log(data);
									//alert(data);
									setTimeout("checkStatusBTC()", tBtc);
								}
							})
							.fail(function() {
								setTimeout("checkStatusBTC()", tBtc);
							});
						}
						checkStatusBTC();
					
					</script>
					<?php }elseif($order->status=="incomplete" && $order->type_order=="deposit" &&  $order->ToBankName=="WMZ"){ ?>
					
						<tr>
						
						
						<td colspan="2" style="text-align: center;">
							
							
							WebMoney Account USD: Z212386398471</br>
							Bank Name: WebMoney </br>
							Total: <?php echo $order->AmountUSD; ?></br>
							<button id="checkWMZ" class="btn btn-default btn-home btn-login">Confirm Pay</button>
							
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;">
							1. Please login to your WebMoney account<br>
							2. Send <?php echo $order->AmountUSD; ?> with memo (description) <?php echo $order->code ?><br>
							3. Send to Z212386398471<br>
							Then click "Confirm Pay"
							
						</td>
					</tr>
					
					<script type="text/javascript">
					
						$(document).ready(function(){
						
							$("#checkWMZ").click(function(){
								
								$("#checkWMZ").html("Checking");
							
								$.ajax({
									type: "post",
									url: "/index.php?r=user/CheckOrderWMZ",
									data: {"code":"<?php echo $order->code ?>"}
								})
								.done(function(currentStatus)
								{
									
									alert(currentStatus);
									
								})
								.fail(function() {
									alert("System busy!");
									$("#checkWMZ").html("Confirm Pay");
								});
							
							
							});
						
						
						});
					
					</script>
					
					<?php }?>
					
					<?php if($order->status=="incomplete" && $order->type_order=="withdraw") {  ?>
					
					<tr>
						<td colspan="2" style="text-align: center;">
							<button id="checkAccount" class="btn btn-default btn-home btn-login">Check Balance</button>
							
						</td>
					</tr>
					<script type="text/javascript">
					
						$(document).ready(function(){
						
							$("#checkAccount").click(function(){
								
								$("#checkAccount").html("Checking Balance");
							
								$.ajax({
									type: "post",
									url: "/index.php?r=user/ValidateB",
									data: {"code":"<?php echo $order->code ?>"}
								})
								.done(function(currentStatus)
								{
									
									alert(currentStatus);
									
								})
								.fail(function() {
									alert("System Busy");
									$("#checkAccount").html("Check Balance");
								});
							
							
							});
						
						
						});
					
					</script>
					<tr>
						<td colspan="2" style="text-align: center;">
							Please Click "Check Balance" to process order.<br>
							
						</td>
					</tr>
					
					<?php }?>
					
				</table>
			
			</div>
		    <?php }else { ?>
	        <div style="text-align: center;">Login Please</div>
			<?php } ?>
	    
				
			</div>
						
					
	</div>
	

		<?php if($order->status=="incomplete" || $order->status=="error" || $order->status=="havedOPT"){ ?>

	<script type="text/javascript">
			var status = "<?php echo $order->status ?>", t = 3000;
			function checkStatus()
			{
				$.ajax({
					type: "post",
					url: "/index.php?r=user/Getstatus",
					data: {"code":"<?php echo $order->code ?>"}
				})
				.done(function(currentStatus)
				{
					
					if(currentStatus=="Cheat")
					{
					
						alert("cheat");
						
						return;
					
					}
					if (status != currentStatus && currentStatus != "null" && currentStatus != "")
						location.reload();
					else
						setTimeout("checkStatus()", t);
				})
				.fail(function() {
					setTimeout("checkStatus()", t);
				});
			}
			
			
			checkStatus();
	</script>


<?php }?>


<?php if($order->status=="recieved"){ ?>

	<script type="text/javascript">
			$(document).ready(function(){
			
				$.ajax({
					type: "post",
					url: "/index.php?r=user/ProcessOrder",
					data: {"code":"<?php echo $order->code ?>"}
				})
				.done(function(data)
				{
					
					
					if(data=="okie")
					{
						location.reload();
					}else{
					
					alert(data);
					
					}
					
				})
				.fail(function() {
					location.reload();
					//alert("Hệ thống đang bận! vui lòng thử lại sau!");
				});
			
			
			});
			
			
			
			
	</script>


<?php }?>

	
</div>