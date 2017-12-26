<form method="post" action="/index.php?r=user/openorder">
	<label>Total: </label>
	<input type="text" name="total"/>
	<label>Account Send: </label>
	<input type="text" disabled="disabled" value="<?php echo $user->PayAccount ?>" />
	<input type="hidden" value="deposit" name="typeOrder"/>
	<input type="submit" class="" value="Continue"/>
</form>