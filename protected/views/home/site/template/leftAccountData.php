<script>
var cashClass = "UdrDogOddsClass";
var txt_cash= "<?php echo number_format($user->balance,2) ?>";
var txt_outstanding= "<?php echo number_format($user->outStanding,2) ?>";
var txt_betcredit= "<?php echo number_format($user->betCredit,2) ?>";
var txt_credit= "<?php echo number_format($user->credit,2) ?>";
var txt_login= "<?php echo date("d/m/Y H:i:s",$user->lastLogin) ?>";
var txt_transaction= "11/5/2014 2:43:26 PM";
var txt_expassword= "11/5/2014 3:27:15 AM";
var doupdate = "<?php echo $type ?>";
parent.loadAccountData(doupdate);
</script>