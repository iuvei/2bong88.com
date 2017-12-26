
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Outright tmpl</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">

<tbody id='tmplHeader'>
	<tr>
		<th width="6%" align="center">Time</th>
		<th align="left" class="even">Event</th>
		<th width="13%" align="right" title="Tỷ lệ">Odds</th>
	</tr>
</tbody>

<tbody id='tmplLeague'>
	<tr onclick="refreshData()" style="cursor:pointer">
      	<td class="tabtitle"></td>
		<td class="tabtitle">{%LeagueName}</td>
		<td class="tabtitle" width="10%" align="right" nowrap>
        	<a name="btnRefresh" class="btnIcon right disable"><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></a></td>
	</tr>
</tbody>

<tbody id='tmplEvent'>
	<tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#fff5a5'" onmouseout="this.style.backgroundColor='{@BgColor}';">
		<td align="center">{%ShowTime}</td>
		<td align="left" class="UdrDogTeamClass" onmousemove="ChangeCursor(this);" onclick="JavaScript:BetO('{%MatchId}_Outright_{%Odds}');" ><span>{%TeamName}</span></td>
		<td align="right" class="{%Changed} UdrDogOddsClass" onmousemove="ChangeCursor(this);" onclick="JavaScript:BetO('{%MatchId}_Outright_{%Odds}');" ><a>{%Odds}</a>
		</td>
	</tr>
</tbody>

</table>

<span id="tmplEnd"></span>
</body>
</html>
