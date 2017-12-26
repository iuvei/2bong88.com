
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Bet List</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/table_w.css" rel="stylesheet" type="text/css" />
<link href="/css/button.css" rel="stylesheet" type="text/css" />
<link href="/css/oddsFamily.css" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js?v=201206260354"></script>
<script language="javascript" src="/js/common.js?v=201409020504"></script>
</head>
<body>
<div class="titleBar">
  <div class="title">Bet List</div>
  <div class="right"> <a id="rfbu" href="#" target="_self" onclick="window.print()" class="button"><span>Print This Page</span></a> <a onclick ="this.className='button disable';" href="index.php?r=site/betList" id="btnRefresh_D" class="button" title="Refresh"><span><div class="icon-refresh" title="Refresh"></div></span></a> </div>
</div>
<div class="tabbox">
  <div class="tabbox_F">
    <table class="oddsTable info" width="100%" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <th width="20">No.</th>
        <th width="115" align="left" class="even">Date</th>
        <th width="260" align="left">Choice</th>
        <th width="55" align="right" class="even">Odds</th>
        <th width="55" align="right">Stake</th>
        <th width="110" align="left" class="even">Status</th>
      </tr>
       
       <?php $i=1;$totalWin = 0;$totalLost = 0; foreach($totalBet as $bet){ ?>
      <?php 
		if($i%2==0)
			$class="bgcpe";
		else $class="bgcpelight";
		
	  ?>
      <tr valign="top" class="<?php echo $class ?>" onmouseover="this.className='trbgov';" onmouseout="this.className='bgcpe';">
        <td align="center" valign="top"><?php echo $i ?></td>
        <td  valign="top" nowrap><div><strong>Ref No:<?php echo $bet->Id ?></strong></div>
          <div><?php echo date("d/m/Y H:i:s",$bet->timeBet) ?></div></td>
        <td valign="top">
        <div class="TextStyle01"> </div>
        
          <div class="multiple">
          <div class="TextStyle01 "><?php echo $bet->lblBetKind ?></div>
          <div class="FavTeamClass " onmousemove="NumberGroupTitle(this);"><?php echo $bet->lblChoiceValue ?></div>
          <span class="<?php echo ($bet->lblBetKindValue<0)?"FavOddsClass":"UdrDogOddsClass"; ?>"><?php echo $bet->lblBetKindValue ?></span><span class="TextStyle01 "><?php echo $bet->lblScoreValue ?></span><span class=" "></span>
          <div class="TextStyle04 "><?php echo $bet->lblHome ?>-vs-<?php echo $bet->lblAway ?><br></div>
          <span class="TextStyle04 "><?php echo $bet->lblLeaguename ?></span>
          </div>
           
           
          </td>
        <td align="right" valign="top" nowrap="nowrap"><span class="<?php echo ($bet->oddsRequest<0)?"FavOddsClass":"UdrDogOddsClass"; ?>"><?php echo $bet->oddsRequest ?></span><br />
          <span class="TextStyle03"><?php echo ($bet->oddsType==1)?"DEC":(($bet->oddsType==2)?"HK":"MY"); ?></span></td>
        <td align="right" valign="top" class="UdrDogOddsClass"><?php echo $bet->BPstake ?><br /></td>
        <td align="left" valign="top" class="TextStyle03 <?php echo ($bet->winLost<0)?"FavOddsClass":"UdrDogOddsClass"; ?> "><?php echo $bet->lbloddsStatus ?><br />
           
          
          
          <div class="ipColor"><?php echo $bet->ipBet ?></div></td>
      </tr>
       
      <?php $i++;}?>
      
    </table>
  </div>
</div>
<div class="note">
    <div class="noteBorder">
        <div class="title"><span>Note</span></div>
        <div class="content">Disclaimer : Please note that the displayed time is based on GMT -4 hours.</div> 
    </div>
</div>
</body>
</html>
