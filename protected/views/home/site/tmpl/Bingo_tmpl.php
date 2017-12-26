
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Bingo Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
    <table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
<tbody id="tmplLeague_L">
            <tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
      			<td class="tabtitle"></td>
                <td colspan="9" class="tabtitle">
                    {%LeagueName}</td>
                <td colspan="2" class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="Please Wait"></div></a></td>
            </tr>
        </tbody>
        <tbody id="tmplHeader_L">
            <tr>
                <th width="7%" nowrap="nowrap">
                    <font title="Time">Time</font></th>
                <th colspan="2" align="left" class="even" style="min-width:120px;">
                    <font title="Event Number">Event</font></th>
                <th width="60" nowrap>
                    <font title="Next Over/Under">Next O/U</font></th>
                <th width="60" nowrap class="even">
                    <font title="Next Odd/Even">Next O/E</font></th>
                <th width="55" align="center" nowrap>
                    <font title="Number Wheel">No. Wheel</font></th>                    
                <th width="150" colspan="2" nowrap class="even">
                    <font title="Next Combo">Next Combo</font></th>
                <th width="70" nowrap>
                    <font title="Next High/Low">Next H/L</font></th>
                <th width="70" nowrap class="even">
                    <font title="Warrior">Warrior</font></th>

                <th width="1%" align="center" nowrap>
                    <font></font></th>    
            </tr>
        </tbody>
        <tbody id="tmplLive">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td nowrap="nowrap" class="text_time {%Changed_Score}">
                    <div nowrap>
                        <font title="Number of The Last Drawn Ball">Ball No. : </font>
                        <font class="{@LiveTimeCls}" title="Number of The Last Drawn Ball"><b>{%CsStatus}</b></font>
                    </div>                            
                    <div class="{@OU_Div}">
                        <font title="Ratio of Over/Under">O/U:<b>[{%ScoreH}-{%ScoreA}]</b></font></div>
                    <div class="{@OE_Div}">
                        <font title="Ratio of Odd/Even">O/E:<b>[{%RedCardH}-{%RedCardA}]</b></font></div>
                </td>
                <td class="line_unR">
                    <span class="{@Home_Cls}">{@GameNo} {%MatchCode}</span><br />
                    <span class="{@Home_Cls}" style ="display:{@TimerTitle}">{@BingoGameStart}</span> <span class="color01" id="CountDown_{%MatchCode}">{@ShowTime}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    <a id="BingoPos_{%MatchId}" onclick="javascript: popBingoSeq('{%MatchId}', 1);" style="float: right;cursor: pointer" title="Kickoff Sequence">
                    	<span class="iconOdds info"></span></a>
                    <a href='javascript:fFrame.openBingoStreamingMain();' title="Live Streaming" style="display:{@Streaming};float: right;"><span class="iconOdds tv"></span></a>
                    </td>
                <td width="70" class="none_rline">
      <div class="line_divL HdpGoalClass">
                        <span class="{@Goal_85}" title="37.5">37.5</span><br />
                        <span title="Under">{@UNDER_85}</span></div>
                    <div class="line_divR OddsDiv {%Changed_85}">
                        <a class="{@Odds_85_O_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_85}','h','{%Odds_85_O}',85)">
                            {%Odds_85_O}</a><br />
                        <a class="{@Odds_85_U_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_85}','a','{%Odds_85_U}',85)">
                            {%Odds_85_U}</a><br />
                    </div>
                </td>
          <td width="70">
<div class="line_divL HdpGoalClass">
                        <span title="Odd">{@ODD_86}</span><br />
                        <span title="Even">{@EVEN_86}</span></div>
                    <div class="line_divR OddsDiv {%Changed_86}">
                        <a class="{@Odds_86_O_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_86}','h','{%Odds_86_O}',86)">
                            {%Odds_86_O}</a><br />
                        <a class="{@Odds_86_E_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_86}','a','{%Odds_86_E}',86)">
                            {%Odds_86_E}</a><br />
                    </div>
                </td>
                <td align="center" valign="middle" onmousemove="javascript:if('{@SHOW90}' == 'displayOn')this.style.cursor='pointer'; else this.style.cursor='auto';" onclick="javascript:if('{@SHOW90}' == 'displayOn')popMoreDiv('{%MUID}','{@GameNo} {%MatchCode}');">
                     <div class="{@SHOW90}" title="Number Wheel"><span class="iconOdds nWheel"></span></div>
                </td>                
          <td width="80" class="none_rline">
  <div class="line_divL HdpGoalClass">
                        <span title="Over/Odd">{@OO_89}</span><br />
                        <span title="Over/Even">{@OE_89}</span></div>
                    <div class="line_divR OddsDiv {%Changed_89}">
                        <a class="{@Odds_89_OO_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_89}','1:1','{%Odds_89_OO}',89)">
                            {%Odds_89_OO}</a><br />
                        <a class="{@Odds_89_OE_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_89}','1:2','{%Odds_89_OE}',89)">
                            {%Odds_89_OE}</a><br />
                    </div>
                </td>
          <td width="80">
  <div class="line_divL HdpGoalClass">
                        <span title="Under/Odd">{@UO_89}</span><br />
                        <span title="Under/Even">{@UE_89}</span></div>
                    <div class="line_divR OddsDiv {%Changed_89}">
                        <a class="{@Odds_89_UO_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_89}','2:1','{%Odds_89_UO}',89)">
                            {%Odds_89_UO}</a><br />
                        <a class="{@Odds_89_UE_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_89}','2:2','{%Odds_89_UE}',89)">
                            {%Odds_89_UE}</a><br />
                    </div>
                </td>
          <td width="70">
<div class="line_divL HdpGoalClass">
                        <span title="{@Goal_87}">{@Goal_87}</span><br />
                        <span title="Low">{@LOW_87}</span></div>
                    <div class="line_divR OddsDiv {%Changed_87}">
                        <a class="{@Odds_87_H_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_87}','h','{%Odds_87_H}',87)">
                            {%Odds_87_H}</a><br />
                        <a class="{@Odds_87_L_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_87}','a','{%Odds_87_L}',87)">
                            {%Odds_87_L}</a><br />
                    </div>
                </td>
          <td width="70">
<div class="line_divL HdpGoalClass">
                        <span title="2nd">{@2ND_88}</span><br />
                        <span title="3rd">{@3RD_88}</span></div>
                    <div class="line_divR OddsDiv {%Changed_88}">
                        <a class="{@Odds_88_H_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_88}','h','{%Odds_88_H}',88)">
                            {%Odds_88_H}</a><br />
                        <a class="{@Odds_88_A_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_88}','a','{%Odds_88_A}',88)">
                            {%Odds_88_A}</a><br />
                    </div>
                </td>

          <td align="center" title="Result" valign="middle" style="white-space: nowrap; height: 15px; width: 15px;">
                 <a onclick="OpenNumberGameresresult();">
                        <span class="iconOdds stats"></span></a></td>
          </tr>
        </tbody>
        <tbody id="tmplLeague">
            <tr id="Tr1" onclick="refreshData_D()" style="cursor: pointer">
                <td colspan="7" class="tabtitle">
                    {%LeagueName}</td>
                <td colspan="2" class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="Please Wait"></div></a></td>
            </tr>
        </tbody>
        <tbody id="tmplHeader">
            <tr>
                <th width="34%" colspan="2" align="left" title="Event Number">Event</th>
                <th style="min-width:70px;max-width:82px;" align="center" nowrap class="even text-ellipsis" title="Full Time Odd/Even">FT. O/E</th>
                <th style="min-width:70px;max-width:82px;" align="center" nowrap class="text-ellipsis" title="1st Ball Over/Under">1st Ball O/U</th>
                <th style="min-width:80px;max-width:92px;" align="center" nowrap class="even text-ellipsis" title="1st Ball Odd/Even">1st Ball O/E</th>
                <th style="min-width:60px;max-width:72px;" align="center" nowrap class="text-ellipsis" title="Number Wheel">No. Wheel</th>                    
                <th style="min-width:80px;max-width:92px;" align="center" nowrap class="even text-ellipsis" title="Last Ball Over/Under">Last Ball O/U</th>
                <th style="min-width:70px;max-width:82px;" align="center" nowrap class="text-ellipsis" title="Last Ball Odd/Even">Last Ball O/E</th>
                <th style="min-width:70px;max-width:82px;" align="center" nowrap class="even text-ellipsis" title="Warrior">Warrior</th>
            </tr>
        </tbody>
        <tbody id="tmplEvent">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="line_unR">
                    <span class="{@Home_Cls}">{@GameNo} {%MatchCode}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}</td>
                <td width="70">
                    <div class="line_divL HdpGoalClass">
                        <span title="Odd">{@ODD_86}</span><br />
                        <span title="Even">{@EVEN_86}</span></div>
                    <div class="line_divR OddsDiv {%Changed_86}">
                        <a class="{@Odds_86_O_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_86}','h','{%Odds_86_O}',86)">
                            {%Odds_86_O}</a><br />
                        <a class="{@Odds_86_E_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_86}','a','{%Odds_86_E}',86)">
                            {%Odds_86_E}</a><br />
                    </div>
                </td>
                <td width="70" class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        <span title="37.5">37.5</span><br />
                        <span title="Under">{@UNDER_81}</span></div>
                    <div class="line_divR OddsDiv {%Changed_81}">
                        <a class="{@Odds_81_O_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_81}','h','{%Odds_81_O}',81)">
                            {%Odds_81_O}</a><br />
                        <a class="{@Odds_81_U_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_81}','a','{%Odds_81_U}',81)">
                            {%Odds_81_U}</a><br />
                    </div>
                </td>
                <td width="80">
                    <div class="line_divL HdpGoalClass">
                        <span title="Odd">{@ODD_83}</span><br />
                        <span title="Even">{@EVEN_83}</span></div>
                    <div class="line_divR OddsDiv {%Changed_83}">
                        <a class="{@Odds_83_O_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_83}','h','{%Odds_83_O}',83)">
                            {%Odds_83_O}</a><br />
                        <a class="{@Odds_83_E_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_83}','a','{%Odds_83_E}',83)">
                            {%Odds_83_E}</a><br />
                    </div>
                </td>
                <td align="center" valign="middle" onmousemove="javascript:if('{@SHOW90}' == 'displayOn')this.style.cursor='pointer'; else this.style.cursor='auto';" onclick="javascript:if('{@SHOW90}' == 'displayOn')DivPopMore(500,'{%MatchId}','{%LeagueName}','{@GameNo} {%MatchCode}','','{@isParlay}','false','{%MUID}','Bingo_MoreDiv');">
                  <div class="{@SHOW90}" title="Number Wheel"><span class="iconOdds nWheel"></span></div>
                </td>                
                <td width="80" class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        <span class="{@Goal_82}" title="37.5">37.5</span><br />
                        <span title="Under">{@UNDER_82}</span></div>
                    <div class="line_divR OddsDiv {%Changed_82}">
                        <a class="{@Odds_82_O_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_82}','h','{%Odds_82_O}',82)">
                            {%Odds_82_O}</a><br />
                        <a class="{@Odds_82_U_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_82}','a','{%Odds_82_U}',82)">
                            {%Odds_82_U}</a><br />
                    </div>
                </td>
                <td width="70">
                    <div class="line_divL HdpGoalClass">
                        <span title="Odd">{@ODD_84}</span><br />
                        <span title="Even">{@EVEN_84}</span></div>
                    <div class="line_divR OddsDiv {%Changed_84}">
                        <a class="{@Odds_84_O_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_84}','h','{%Odds_84_O}',84)">
                            {%Odds_84_O}</a><br />
                        <a class="{@Odds_84_E_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_84}','a','{%Odds_84_E}',84)">
                            {%Odds_84_E}</a><br />
                    </div>
                </td>
                <td width="70">
                    <div class="line_divL HdpGoalClass">
                        <span title="2nd">{@2ND_88}</span><br />
                        <span title="3rd">{@3RD_88}</span></div>
                    <div class="line_divR OddsDiv {%Changed_88}">
                        <a class="{@Odds_88_H_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_88}','h','{%Odds_88_H}',88)">
                            {%Odds_88_H}</a><br />
                        <a class="{@Odds_88_A_Cls}" href="javascript:betBingo({@isParlay},'{%MatchId}','{%OddsId_88}','a','{%Odds_88_A}',88)">
                            {%Odds_88_A}</a><br />
                    </div>
                </td>

            </tr>
        </tbody>
    </table>
<span id="tmplEnd"></span>
</body>
</html>
