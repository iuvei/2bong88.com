
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Single_Line</title>
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>

<body>

<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
	
<tbody id='tmplHeader'>
	<tr>
		<th nowrap width="6%" rowspan="2" title="Giờ">Time</th>
		<th nowrap rowspan="2" colspan="2" class="even" title="Lựa Chọn">Event</th>
		<th nowrap colspan="8" class="tabthup" title="Toàn Thời Gian">Full time</th>
	</tr>
	<tr class="tabthdwn">
		<th nowrap width="45" title="Handicap">HDP</th>
		<th nowrap width="45" title="Home">Home</th>
		<th nowrap width="45" title="Away">Away</th>
		<th nowrap width="45" title="Trái">Goal</th>
		<th nowrap width="45" title="Over">Over</th>
		<th nowrap width="45" title="Under">Under</th>
		<th colspan="2" width="1"></th>
	</tr>
</tbody>

<tbody id='tmplLeague_L'>
	<tr id="l_{%LeagueId}" onclick="refreshData_L();" style="cursor:pointer">
      	<td class="tabtitle"></td>
		<td colspan="8" class="tabtitle">{%LeagueName}</td>
		<td colspan="2" class="tabtitle" align="right">
        	<a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></a></td>
	</tr>
</tbody>

<tbody id='tmplLive'>
	<tr id="e_{%MatchId}_{%MatchCount}" align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
		<td nowrap="nowrap" class="text_time {%Changed_Score}">
			<b>{%ScoreH}-{%ScoreA}</b>
			<div nowrap style="color:red"><span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color:#566C9E">{@InjuryTime}</span></span></div>
		</td>
		<td class="line_unR" align="left"><span class="{@Home_Cls}">{%HomeName}{@RedCardH}</span> -vs- <span class="{@Away_Cls}">{%AwayName}{@RedCardA}</span></td>
		<td align="right" width="8%">{@SportRadarInfo}{@Streaming}{@LiveChart}{@Favorites}</td>
		<td nowrap="nowrap" class="HdpGoalClass">{%Value_1}</td>
		<td nowrap="nowrap" class="{@Odds_1_H_Cls} {%Changed_1}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a></td>
		<td nowrap="nowrap" class="{@Odds_1_A_Cls} {%Changed_1}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a></td>
		<td nowrap="nowrap" class="HdpGoalClass">{%Goal_3}</td>
		<td nowrap="nowrap" class="{@Odds_3_O_Cls} {%Changed_3}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a></td>
		<td nowrap="nowrap" class="{@Odds_3_U_Cls} {%Changed_3}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a></td>
		<td nowrap="nowrap"><a href="#" onclick="GetMore(1,'{%MatchId}','{%HomeName}','{%AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this); return false;" >{@More}</a></td>
		<td align="center">{@ScoreMap}<br />{@StatsInfo}</td>
	</tr>
  <tr><td class="moreBetType {@Display_More}" colspan="11">{@MoreData}</td></tr>
</tbody>

<tbody id='tmplLeague'>
	<tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor:pointer">
      	<td class="tabtitle"></td>
		<td colspan="8" class="tabtitle indent">{%LeagueName}</td>
		<td colspan="2" class="tabtitle" align="right">
        	<a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></a></td>
	</tr>
</tbody>

<tbody id='tmplEvent'>
	<tr id="Tr2" align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
		<td class="text_time">{%ShowTime}</td>
		<td class="line_unR" align="left"><span class="{@Home_Cls}">{%HomeName}{@RedCardH}</span> -vs- <span class="{@Away_Cls}">{%AwayName}{@RedCardA}</span></td>
		<td align="right" width="8%">{@SportRadarInfo}{@Streaming}{@LiveChart}{@Favorites}</td>
		<td nowrap="nowrap" class="HdpGoalClass">{%Value_1}</td>
		<td nowrap="nowrap" class="{@Odds_1_H_Cls} {%Changed_1}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a></td>
		<td nowrap="nowrap" class="{@Odds_1_A_Cls} {%Changed_1}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a></td>
		<td nowrap="nowrap" class="HdpGoalClass">{%Goal_3}</td>
		<td nowrap="nowrap" class="{@Odds_3_O_Cls} {%Changed_3}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a></td>
		<td nowrap="nowrap" class="{@Odds_3_U_Cls} {%Changed_3}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a></td>
		<td nowrap="nowrap"><a href="#" onclick="GetMore(1,'{%MatchId}','{%HomeName}','{%AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this); return false;" >{@More}</a></td>
		<td align="center">{@ScoreMap}<br />{@StatsInfo}</td>
	</tr>
  <tr><td class="moreBetType {@Display_More}" colspan="11">{@MoreData}</td></tr>
</tbody>

</table>

<span id="tmplEnd"></span>
</body>
</html>
