
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>First Goal / Last Goal Template</title>
	<link href="css/table_w.css" rel="stylesheet" type="text/css" />
	<link href="css/button.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
		<tbody id='tmplHeader'>
			<tr align='center'>
				<th rowspan='2' width="8%" height='20' nowrap="nowrap">Giờ</th>
				<th rowspan='2' width="35%" align="left" colspan="2" class="even">Lựa Chọn</th>
				<th colspan='3' class="tabthup" title="Toàn Thời Gian">
                    Toàn Thời Gian</th>
                <th colspan='3' class="tabt_L tabthup even" title="Hiệp 1">
                    Hiệp 1</th>
				<th rowspan='2' width="1"></th>
			</tr>
            <tr class="tabthdwn">
                <th width="70" title="Bàn Thắng Đầu Tiên">Bàn Thắng Đầu Tiên</th>
				<th width="70" title="Bàn Thắng Cuối Cùng">Bàn Thắng Cuối Cùng</th>
				<th width="70" title="Không Có Bàn Thắng">Không Có Bàn Thắng</th>
                <th width="70" title="Bàn Thắng Đầu Tiên" class="tabt_L even">Bàn Thắng Đầu Tiên</th>
				<th width="70" class="even" title="Bàn Thắng Cuối Cùng">Bàn Thắng Cuối Cùng</th>
				<th width="70" title="Không Có Bàn Thắng" class="even">Không Có Bàn Thắng</th>
            </tr>
		</tbody>
		<tbody id='tmplLeague'>
			<tr id="l_{%LeagueId}" onclick="refreshData()" style="cursor: pointer">
     			 <td class="tabtitle"></td>
				<td colspan="8" class="tabtitle">{%LeagueName}</td>
				<td class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh" class="btnIcon right disable"><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></a></td>
			</tr>
		</tbody>
		<tbody id='tmplLive'>
			<tr align="center" id="e_{%MatchId}_{%MatchCount}_1" bgcolor='#FFCCBC' onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','#FFCCBC');">
				<td rowspan="2" class="text_time {%Changed_Score}">
					<b>{%ScoreH}-{%ScoreA}</b>
					<div nowrap class="{@LiveTimeCls}">{%ShowTime}</div>
				</td>
				<td rowspan="2" align="left" class="UdrDogTeamClass line_unR">{%HomeName}<br />{%AwayName}</td>
				<td rowspan="2" align="right" width="8%">{@Streaming}{@SportRadarInfo}</td>
				<td class="UdrDogOddsClass {%Changed_14} none_rline none_dline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_14}','11','{%Odds_14_HF}',14)">{%Odds_14_HF}</a></td>
				<td class="UdrDogOddsClass {%Changed_14} none_rline none_dline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_14}','12','{%Odds_14_HL}',14)">{%Odds_14_HL}</a></td>
				<td rowspan="2" class="UdrDogOddsClass {%Changed_14}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_14}','00','{%Odds_14_NO}',14)">{%Odds_14_NO}</a></td>
                <td class="UdrDogOddsClass {%Changed_127} none_rline none_dline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_127}','11','{%Odds_127_HF}',127)">{%Odds_127_HF}</a></td>
				<td class="UdrDogOddsClass {%Changed_127} none_rline none_dline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_127}','12','{%Odds_127_HL}',127)">{%Odds_127_HL}</a></td>
				<td rowspan="2" class="UdrDogOddsClass {%Changed_127}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_127}','00','{%Odds_127_NO}',127)">{%Odds_127_NO}</a></td>
				<td rowspan="2">{@StatsInfo}</td>
			</tr>
			<tr align="center" id="e_{%MatchId}_{%MatchCount}_2" bgcolor='#FFCCBC' onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','#FFCCBC');">
				<td class="UdrDogOddsClass {%Changed_14} none_rline none_lline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_14}','21','{%Odds_14_AF}',14)">{%Odds_14_AF}</a></td>
				<td class="UdrDogOddsClass {%Changed_14} none_rline none_tline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_14}','22','{%Odds_14_AL}',14)">{%Odds_14_AL}</a></td>
                <td class="UdrDogOddsClass {%Changed_127} none_rline none_lline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_127}','21','{%Odds_127_AF}',127)">{%Odds_127_AF}</a></td>
				<td class="UdrDogOddsClass {%Changed_127} none_rline none_tline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_127}','22','{%Odds_127_AL}',127)">{%Odds_127_AL}</a></td>
			</tr>
		</tbody>
		<tbody id='tmplEvent'>
			<tr align="center" id="e_{%MatchId}_{%MatchCount}_1" class="{@Tr_Cls}" onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','{@BgColor}');">
				<td rowspan="2" class="text_time">{%ShowTime}</td>
				<td rowspan="2" align="left" class="UdrDogTeamClass line_unR">{%HomeName}<br />{%AwayName}</td>
				<td rowspan="2" align="right" width="8%">{@Streaming}{@SportRadarInfo}</td>
				<td class="UdrDogOddsClass {%Changed_14} none_rline none_dline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_14}','11','{%Odds_14_HF}',14)">{%Odds_14_HF}</a></td>
				<td class="UdrDogOddsClass {%Changed_14} none_rline none_dline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_14}','12','{%Odds_14_HL}',14)">{%Odds_14_HL}</a></td>
				<td rowspan="2" class="UdrDogOddsClass {%Changed_14}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_14}','00','{%Odds_14_NO}',14)">{%Odds_14_NO}</a></td>
                <td class="UdrDogOddsClass {%Changed_127} none_rline none_dline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_127}','11','{%Odds_127_HF}',127)">{%Odds_127_HF}</a></td>
				<td class="UdrDogOddsClass {%Changed_127} none_rline none_dline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_127}','12','{%Odds_127_HL}',127)">{%Odds_127_HL}</a></td>
				<td rowspan="2" class="UdrDogOddsClass {%Changed_14}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_127}','00','{%Odds_127_NO}',127)">{%Odds_127_NO}</a></td>
				<td rowspan="2">{@StatsInfo}</td>
			</tr>
			<tr align="center" id="e_{%MatchId}_{%MatchCount}_2" class="{@Tr_Cls}" onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','{@BgColor}');">
				<td class="UdrDogOddsClass {%Changed_14} none_rline none_lline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_14}','21','{%Odds_14_AF}',14)">{%Odds_14_AF}</a></td>
				<td class="UdrDogOddsClass {%Changed_14} none_rline none_tline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_14}','22','{%Odds_14_AL}',14)">{%Odds_14_AL}</a></td>
                <td class="UdrDogOddsClass {%Changed_127} none_rline none_lline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_127}','21','{%Odds_127_AF}',127)">{%Odds_127_AF}</a></td>
				<td class="UdrDogOddsClass {%Changed_127} none_rline none_tline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_127}','22','{%Odds_127_AL}',127)">{%Odds_127_AL}</a></td>
			</tr>
		</tbody>
	</table>
	<span id="tmplEnd"></span>
</body>
</html>
