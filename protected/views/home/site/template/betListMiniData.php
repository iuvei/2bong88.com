<html>
<head>
<!-- 取消iOS自動添加電話號碼(連續數字)樣式與連結 -->
<meta name="format-detection" content="telephone=no" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="css/oddsFamily.css" rel="stylesheet" type="text/css" />
<link href="css/button.css" rel="stylesheet" type="text/css" />
<title></title>
<script type="text/javascript">
<!--
function ReturnData()
{
	var staDate = new Date();
	if(document.all)
	{
		parent.document.getElementById('BetListMiniContainer').innerHTML=document.body.innerHTML;
		
	}else
	{		
		replaceHtml('BetListMiniContainer',document.body.innerHTML);
		
	}
	parent.refreshAccountInfo('mini');
	
	
}

function replaceHtml(el, html) {
    var oldEl = typeof el == "string" ? parent.document.getElementById(el) : el;
    var newEl = oldEl.cloneNode(false);
    newEl.innerHTML = html;
    oldEl.parentNode.replaceChild(newEl, oldEl);
    return newEl;
}
-->
</script>
</head>
<body onLoad="ReturnData();">
 
 

 

<?php foreach($totalBet as $bet){ ?>
<div class="BetInfo bgcpelight" onMouseOver="this.className='BetInfo Ltrbgov'" onMouseOut="this.className='BetInfo bgcpelight'"> 
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="2" class="TextStyle01"><?php echo $bet->lblSportKind ?> / <?php echo $bet->lblBetKind ?></td>
    </tr>
    <tr>
      <td colspan="0" class="FavTeamClass <?php echo ($bet->lbloddsStatus=="canceled")?"text-canceled":""; ?>" onMouseMove="NumberGroupTitle(this);"><?php echo $bet->lblChoiceValue ?></td>
      
      <td align="right"><span  title="Score Map" onClick="javascript:popScoreMap('<?php echo $bet->matchid ?>','left');" class="iconOdds scoreMap"></span></td>
       
       
    </tr>
    <tr>
      <td nowrap><div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 110px; " title="-0.83"><span class="<?php echo ($bet->lblBetKindValue<0)?"FavOddsClass":"UdrDogOddsClass"; ?>"><?php echo $bet->lblBetKindValue ?></span><span class="TextStyle01"><?php echo $bet->lblScoreValue ?> @</span><span class="<?php echo ($bet->oddsRequest<0)?"FavOddsClass":"UdrDogOddsClass"; ?>"><?php echo $bet->oddsRequest ?></span></div></td>
      <td align="right" class="TextStyle01"><b><?php echo $bet->BPstake ?></b></td>
    </tr>
    <tr>
      <td colspan="2" class="TextStyle04 <?php echo ($bet->lbloddsStatus=="canceled")?"text-canceled":""; ?>"><?php echo $bet->lblHome ?>-vs-<?php echo $bet->lblAway ?></td>
    </tr>
    <tr>
      <td colspan="2" class="TextStyle06"><div class="left">ID:<?php echo $bet->Id ?></div><div class="right text-ellipsis" style="width:70px; text-align:right; line-height:inherit;" title="Đang Chạy"><?php echo $bet->lbloddsStatus ?></div></td>
    </tr>
  </table>
  
   
   
</div>

<?php }?>

</body>
</html>