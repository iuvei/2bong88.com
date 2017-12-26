
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Double_Line</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body onload="window.top.hash_TmplLoaded['UnderOver_tmpl_3']=true">
<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tbody id='tmplHeader'>
    <tr>
      <th width="6%" nowrap>Time</th>
      <th width="34%" colspan="2" align="left" class="even">Event</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="text-ellipsis" title="Toàn Thời Gian Handicap">FT. HDP</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="text-ellipsis" title="Toàn Thời Gian Over/Under">FT. O/U</th>
      <th style="min-width:48px;max-width:60px;" nowrap="nowrap" class="text-ellipsis" title="Toàn Thời Gian 1X2">FT. 1X2</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="even tabt_L text-ellipsis" title="Hiệp 1 Handicap">1H. HDP</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="even text-ellipsis" title="Hiệp 1 Over/Under">1H. O/U</th>
      <th style="min-width:48px;max-width:60px;" nowrap="nowrap" class="even text-ellipsis" title="Hiệp 1 1X2">1H. 1X2</th>
      <th width="1" nowrap="nowrap"></th>
    </tr>
  </tbody>
  <tbody id="tmplLeague_L">
    <tr id="l_{%LeagueId}" valign="middle" onclick="refreshData_L();" style="cursor:pointer">
      <td class="tabtitle"></td>
      <td colspan="7" valign="middle" class="tabtitle">{%LeagueName}</td>
      <td colspan="2" class="tabtitle" align="right"><a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></a></td>
    </tr>
  </tbody>
  <tbody id="tmplLive">
    <tr id="e_{%MatchId}_{%MatchCount}_1" class="{@Tr_Cls}" onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','{@BgColor}');">
      <td rowspan="2" nowrap="nowrap" class="text_time {%Changed_Score}"><b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap="nowrap" style="color:red"><span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color:#566C9E">{@InjuryTime}</span></span></div></td>
      <td rowspan="2" valign="top" class="line_unR"><div class="{@Home_Cls}">{%HomeName}{@RedCardH}</div>
        <div class="{@Away_Cls}">{%AwayName}{@RedCardA}</div>
        {@Draw} </td>
      <td rowspan="2" align="right" nowrap="nowrap">{@SportRadarInfo}{@Streaming}{@LiveChart}{@Favorites}</td>
      <td valign="top" class="none_rline none_dline"><div class="line_divL HdpGoalClass">{@Value_1_H}<br/>
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br/>
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a><br/>
        </div></td>
      <td  valign="top" class="none_rline none_dline"><div class="line_divL HdpGoalClass">{%Goal_3}<br/>
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br/>
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a><br/>
        </div></td>
      <td rowspan="2" valign="top" align="right" class="tabt_R"><div class="line_divL line_divR UdrDogOddsClass {%Changed_5}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a> </div></td>
      <td rowspan="2" valign="top" class="none_rline"><div class="line_divL HdpGoalClass">{@Value_7_H}<br/>
          {@Value_7_A}</div>
        <div class="line_divR OddsDiv {%Changed_7}"> <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">{%Odds_7_H}</a><br/>
          <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">{%Odds_7_A}</a><br/>
        </div></td>
      <td rowspan="2" valign="top" class="none_rline"><div class="line_divL HdpGoalClass">{%Goal_8}<br/>
          {@UNDER_8}</div>
        <div class="line_divR OddsDiv {%Changed_8}"> <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">{%Odds_8_O}</a><br/>
          <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">{%Odds_8_U}</a><br/>
        </div></td>
      <td rowspan="2" valign="top" align="right"><div class="line_divL line_divR UdrDogOddsClass {%Changed_15}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','1','{%Odds_15_1}',15)">{%Odds_15_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','2','{%Odds_15_2}',15)">{%Odds_15_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','X','{%Odds_15_X}',15)">{%Odds_15_X}</a> </div></td>
      <td rowspan="2" align="center">{@ScoreMap}<br />{@StatsInfo}</td>
    </tr>
    <tr id="e_{%MatchId}_{%MatchCount}_2" class="{@Tr_Cls}"  onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','{@BgColor}');">
      <td colspan="2" align="center" class="none_rline none_lline none_tline">
              <a href="#" onclick="GetMore(1,'{%MatchId}','{%HomeName}','{%AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this);return false;" class="en_Point {@More_Style}" title="More Bet Types"><span style="width:20px">{@More}</span></a>
      </td>
    </tr>
    <tr><td class="moreBetType {@Display_More}" colspan="10">{@MoreData}</td></tr>
  </tbody>
  <tbody id="tmplLeague">
    <tr id="l_{%LeagueId}" valign="middle" onclick="refreshData_D();" style="cursor:pointer">
      <td class="tabtitle"></td>
      <td colspan="7" class="tabtitle">{%LeagueName}</td>
      <td colspan="2" class="tabtitle" align="right"><a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></a></td>
    </tr>
  </tbody>
  <tbody id="tmplEvent">
    <tr id="e_{%MatchId}_{%MatchCount}_1" class="{@Tr_Cls}" onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','{@BgColor}');">
      <td rowspan="2" class="text_time">{%ShowTime}</td>
      <td rowspan="2" class="line_unR" valign="top"><div class="{@Home_Cls}">{%HomeName}</div>
        <div class="{@Away_Cls}">{%AwayName}</div>
        {@Draw} </td>
      <td align="right" rowspan="2" nowrap="nowrap">{@SportRadarInfo}{@Streaming}{@LiveChart}{@Favorites}</td>
      <td valign="top" class="none_rline none_dline"><div class="line_divL HdpGoalClass">{@Value_1_H}<br/>
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br/>
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a><br/>
        </div></td>
      <td valign="top" class="none_dline none_rline"><div class="line_divL HdpGoalClass">{%Goal_3}<br/>
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br/>
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a><br/>
        </div></td>
      <td rowspan="2" align="right" valign="top" class="tabt_R"><div class="line_divL line_divR UdrDogOddsClass {%Changed_5}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a> </div></td>
      <td valign="top" class="none_rline none_dline"><div class="line_divL HdpGoalClass">{@Value_7_H}<br/>
          {@Value_7_A}</div>
        <div class="line_divR OddsDiv {%Changed_7}"> <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">{%Odds_7_H}</a><br/>
          <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">{%Odds_7_A}</a><br/>
        </div></td>
      <td valign="top" class="none_dline none_rline"><div class="line_divL HdpGoalClass">{%Goal_8}<br/>
          {@UNDER_8}</div>
        <div class="line_divR OddsDiv {%Changed_8}"> <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">{%Odds_8_O}</a><br/>
          <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">{%Odds_8_U}</a><br/>
        </div></td>
      <td rowspan="2" align="right" valign="top"><div class="line_divL line_divR UdrDogOddsClass {%Changed_15}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','1','{%Odds_15_1}',15)">{%Odds_15_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','2','{%Odds_15_2}',15)">{%Odds_15_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','X','{%Odds_15_X}',15)">{%Odds_15_X}</a> </div></td>
      <td rowspan="2" align="center">{@ScoreMap}<br />{@StatsInfo}</td>
    </tr>
    <tr id="e_{%MatchId}_{%MatchCount}_2" class="{@Tr_Cls}" onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','{@BgColor}');">
      <td colspan="2" align="center" class="none_rline none_lline none_tline">
        <a href="#" onclick="GetMore(1,'{%MatchId}','{%HomeName}','{%AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this);return false;" class="en_Point {@More_Style}" title="More Bet Types"><span style="width:20px">{@More}</span></a>
      </td>
      <td class="none_rline none_tline" colspan="2"></td>
    </tr>
    <tr><td class="moreBetType {@Display_More}" colspan="10">{@MoreData}</td></tr>
  </tbody>
</table>
<span id="tmplEnd"></span>
</body>
</html>
