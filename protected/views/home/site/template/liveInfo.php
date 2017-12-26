
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Live Information</title>
<script type="text/javascript">

function hidestatus(){
	window.status=' ';
	return true;
}


if (document.layers) {
	document.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT);
}

document.onmouseover = hidestatus;
document.onmouseout = hidestatus;

hidestatus();
window.defaultStatus = " ";

</script>
</head>
<frameset rows="*,60" cols="*" frameborder="no" border="0" framespacing="0" scrolling="auto">
	<frame id="frameStats" src="http://ls.betradar.com/ls/livescore/?/i1328/vi/Asia:Shanghai/page/sportcenter/m<?php echo $id ?>" scrolling="auto" noresize="noresize" lang="UTF-8" />
	<frame src="/themes/liveFooter.html" name="bottomFrame" scrolling="No" noresize="noresize" />	
</frameset>
</html>