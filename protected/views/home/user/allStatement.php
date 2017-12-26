
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="overflow-x:hidden">
<head>
<title>Statement</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/table_w.css?v=201502050407" rel="stylesheet" type="text/css" />
<link href="/css/button.css?v=201408080405" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css?v=201412230650" rel="stylesheet" type="text/css" />
<link href="/css/jquery.colorbox/appDownload.css?v=201405220620" rel="stylesheet" type="text/css">

<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js?v=201206260354"></script>
<script language="javascript" src="/js/common.js?v=201502240614"></script>
<script language="JavaScript" type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
<script type="text/javascript">
    var fFrame = getParent(window);

    function getParent(cFrame)
    {
	    var aFrame = cFrame;
	    for (var i = 0; i < 4; i++) {
		    if(aFrame.SiteMode != null) {
			    return aFrame;
		    } else {
			    aFrame = aFrame.parent;
		    }
	    }
	    return null;
    }

    function CloseTVBox() {
        if (fFrame.leftFrame!=null) {
            var obj1=fFrame.leftFrame.document.getElementById("iTV");
            if (obj1 != null) {
                obj1.src="";
            }
            var obj2=fFrame.leftFrame.document.getElementById("TVBox");
            if (obj2 != null) {
                obj2.style.display="none";
            }
            var obj3=fFrame.leftFrame.document.getElementById("div_Casino");
            if (obj3 != null) {
                obj3.style.display="";
            }
        }
    }
    
    function clickRefreshButton(obj)
    {
      // if (obj.className=='button disable') return false;
       obj.className='button disable';
       setTimeout(function(){ obj.className='button';}, 3000);
       return true;
    }

    function clickToURL(url) {
        window.location.href = url;
    }

    function onloaddata() {
        
    }

</script>
</head>

<body onLoad="onloaddata();">
    
    <div class="titleBar">
     <div class="title">Statement</div>
     <div class="right">
        <a href="#" class="button mark displayOff" title="Back"><span>Back</span></a>
        <a onclick ="" href="index.php?r=user/allStatement" id="btnRefresh_D" class="button" title="Refresh"><span><div class="icon-refresh" title="Refresh"></div></span></a>
     </div>
     </div>
    
<div class="tabbox">
		<div class="tabbox_F">
			<table class="oddsTable info" width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<th width="55" align="left">Date</th>
					<th width="280" align="left" class="even">Remark</th>
					<th width="110" align="right">Turnover</th>
					<th width="100" align="right" class="even">Credit / Debit</th>
					<th width="100" align="right">Commission</th>
					<th width="100" align="right" class="even">Balance</th>
				</tr>
				<?php foreach($statement as $data){ ?>
				<?php if($data->type==0){ ?>
				<tr class="bgcpe" onmouseover="this.className='trbgov';" onmouseout="this.className='bgcpe';" onclick=clickToURL('/index.php?r=site/history&fdate=<?php echo date("m/d/Y",$data->time) ?>&datatype=1'); style='cursor: pointer;'>
					<td><br><?php echo date("d/m/Y",$data->time) ?></td>
					<td class="TextStyle03">BET<br />- Betting Statement</td>
					<?php 
				if($data->credit<0)
					$classcredit = "FavOddsClass";
				else $classcredit="UdrDogOddsClass";
				if($data->balance<0)
					$classbalance = "FavOddsClass";
				else $classbalance="UdrDogOddsClass";
			?>
					<td align="right" class="UdrDogOddsClass"><?php echo number_format(round($data->turnover,2),2); ?></td>
					<td align="right"><span  class="<?php echo $classcredit ?>"><?php echo number_format(round($data->credit,2),2) ?></td>
					<td align="right" class="UdrDogOddsClass"><?php echo number_format(round($data->com,2),2) ?></td>
					<td align="right"><span  class="<?php echo $classbalance ?>"><?php echo number_format(round($data->balance,2),2) ?></td>
				</tr>
				<?php } else{ ?>
				<tr class="bgcpe" onmouseover="this.className='trbgov';" onmouseout="this.className='bgcpe';">
					<td><br><?php echo date("d/m/Y",$data->time) ?></td>
					<td class="TextStyle03">RESET<br />- Customer <?php echo $data->username?></td>
			<?php 
				if($data->turnover<0)
					$classturnover = "FavOddsClass";
				else $classturnover="UdrDogOddsClass";
			?>
					<td align="right"><span  class="<?php echo $classturnover ?>"><?php echo number_format(round($data->turnover,2),2); ?></td>
					<td align="right" class="UdrDogOddsClass"><?php echo number_format(round($data->credit,2),2) ?></td>
					<td align="right" class="UdrDogOddsClass"><?php echo number_format(round($data->com,2),2) ?></td>
					<td align="right" class="UdrDogOddsClass"><?php echo number_format(round($data->balance,2),2) ?></td>
				</tr>
				<?php }?>
				<?php }?>
				
				
				
                
			</table>
		</div>
	</div>
    <div class="note">
	    <div class="noteBorder">
            <div class="title"><span>Note</span></div>
            <div class="content">Please note that the displayed time is based on GMT -4 hours.</div> 
        </div>
    </div>
</body>
</html>
