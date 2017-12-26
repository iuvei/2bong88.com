
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tennis Template</title>
    
</head>
<body>
    <table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody id="tmplHeader">
            <tr>
                <th width="6%" nowrap title=" Time">Time</th>
                <th width="330" colspan="2" class="even" align="left" title=" Event">Event</th>
                <th width="69" align="right" title=" Moneyline">Moneyline</th>
                <th width="83" class="even"><font title="Full Time Handicap">FT. HDP</font></th>
                <th width="95" class="even"><font title="Full Time Over/Under">FT. O/U</font></th>
                <th width="100" class="even"><font title="Full Time Odd/Even">FT. O/E</font></th>
                <th width="1"></th>
            </tr>
        </tbody>
        <tbody id="tmplHeader_L_5">
            <tr>
                <th width="6%" nowrap title=" Time">Time</th>
                <th width="350" colspan="2" class="even" align="left" title=" Event">Event</th>
                <th align="right" nowrap="nowrap" class="text-ellipsis" style="width:69px;max-width:69px;"><font title="Moneyline">Moneyline</font></th>
                <th width="80" class="even"><font title="Full Time Handicap">FT. HDP</font></th>
                <th width="80"><font title="Full Time Game Handicap">FT. Game HDP</font></th>
                <th width="80" class="even"><font title="Full Time Over/Under">FT. O/U</font></th>
                <th width="80" class="even"><font title="Full Time Odd/Even">FT. O/E</font></th>
                <th width="1"></th>
            </tr>
        </tbody>
        <tbody id="tmplHeader_5">
            <tr>
                <th width="6%" nowrap title=" Time">Time</th>
                <th width="350" colspan="2" class="even" align="left" title=" Event">Event</th>
                <th align="right" nowrap="nowrap" class="text-ellipsis" style="width:69px;max-width:69px;"><font title="Moneyline">Moneyline</font></th>
                <th width="80" class="even"><font title="Full Time Handicap">FT. HDP</font></th>
                <th width="80"><font title="Full Time Game Handicap">FT. Game HDP</font></th>
                <th width="80" class="even"><font title="Full Time Over/Under">FT. O/U</font></th>
                <th width="80" class="even"><font title="Full Time Odd/Even">FT. O/E</font></th>
                <th width="1"></th>
            </tr>
        </tbody>
        <tbody id="tmplHeader_154">
            <tr>
                <th width="6%" nowrap title=" Time">Time</th>
                <th colspan="6" class="even" align="left" title=" Event">Event</th>
                <th width="130" align="right" title=" Moneyline">Moneyline</th>
                <!--<th width="1"></th>-->
            </tr>
        </tbody>

        <tbody id="tmplLeague_L">
            <tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
      			<td class="tabtitle"></td>
                <td colspan="6" class="tabtitle">{%LeagueName}</td>
                <td class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="Please Wait"></div></a></td>
            </tr>
        </tbody>
		<tbody id="tmplLeague_L_5">
            <tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
      			<td class="tabtitle"></td>
                <td colspan="6" class="tabtitle">{%LeagueName}</td>
                <td colspan="2" class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="Please Wait"></div></a></td>
            </tr>
        </tbody>
        <tbody id="tmplLive">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time {%Changed_Score}">
                    
                    <div nowrap class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td  class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="8%">
                    {@SportRadarInfo}{@Streaming}</td>
                <td class="none_rline">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a>
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        {@ODD_2}<br />
                        {@EVEN_2}</div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a>
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
        <tbody id="tmplLive_43">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time {%Changed_Score}">
                    
                    <div nowrap class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td  class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="8%">
                    {@SportRadarInfo}{@Streaming}</td>
                <td class="none_rline">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a>
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <br />
                        </div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a>
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
        <tbody id="tmplLive_5">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    <div class="{@TimeSuspendCls}">
                        <span class="iconInfo rain"></span></div>
                    <div nowrap class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="5%">
                    {@SportRadarInfo}{@Streaming}</td>
                <td class="none_rline">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_153_H}<br />
                        {@Value_153_A}</div>
                    <div class="line_divR OddsDiv {%Changed_153}">
                        <a class="{@Odds_153_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','h','{%Odds_153_H}',153)">{%Odds_153_H}</a><br />
                        <a class="{@Odds_153_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','a','{%Odds_153_A}',153)">{%Odds_153_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a>
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        {@ODD_2}<br />
                        {@EVEN_2}</div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a>
                    </div>
                </td>
                <td align="center"><span title="More Bet Types">{@More}</span>
                    {@StatsInfo}</td>
            </tr>
            <tr><td class="moreBetType {@Display_More}" colspan="9">{@MoreData}</td></tr>
        </tbody>
        
        <tbody id="tmplLive_6">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">                   
                    <span class="{@TimeSuspendCls} HalfTime">T.Out</span>
                    <div nowrap class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="8%">
                    {@SportRadarInfo}{@Streaming}</td>
                <td class="none_rline">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a>
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        {@ODD_2}<br />
                        {@EVEN_2}</div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a>
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
        
       <!-- <tbody id="tmplLive_6" title="tmplLive_5"></tbody> -->
        <tbody id="tmplLive_9" title="tmplLive_5"></tbody>          
	<tbody id="tmplLive_4">
			<tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
				<td class="text_time {%Changed_Score}">
                                        <span class="{@TimeSuspendCls} HalfTime">T.Out</span>
					<div class="{@TimeSuspendCls1}"><b>{%ScoreH}-{%ScoreA}</b></div>
					<div nowrap class="{@LiveTimeCls}">{%ShowTime}</div>
				</td>
				<td class="line_unR">
					<span class="{@Home_Cls}">{%HomeName}</span><br />
					<span class="{@Away_Cls}">{%AwayName}</span>
				</td>
				<td align="right" valign="middle" style="white-space: nowrap" width="8%">{@SportRadarInfo}{@Streaming}</td>
				<td class="none_rline">
					<div class="line_divL line_divR {%Changed_20}">
						<a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
						<a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
					</div>
				</td>
				<td class="none_rline">
					<div class="line_divL HdpGoalClass">{@Value_1_H}<br />{@Value_1_A}</div>
					<div class="line_divR OddsDiv {%Changed_1}">
						<a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
						<a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a>
					</div>
				</td>
				<td class="none_rline">
					<div class="line_divL HdpGoalClass">{%Goal_3}<br />{@UNDER_3}</div>
					<div class="line_divR OddsDiv {%Changed_3}">
						<a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
						<a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a>
					</div>
				</td>
				<td>
					<div class="line_divL HdpGoalClass">{@ODD_2}<br />{@EVEN_2}</div>
					<div class="line_divR OddsDiv {%Changed_2}">
						<a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
						<a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a>
					</div>
				</td>
				<td align="center">{@StatsInfo}</td>
			</tr>
		</tbody>

		<tbody id="tmplLive_28" title="tmplLive_4"></tbody>        
        <tbody id="tmplLiveFooter_4">
          <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
              <td class="text_time {%Changed_Score}">
                  <div class="{@TimeSuspendCls}">
                      <span class="{@TimeSuspendCls} HalfTime">T.Out</span></div>
                      <div class="{@TimeSuspendCls1}"><b>{%ScoreH}-{%ScoreA}</b></div>
                  <div nowrap class="{@LiveTimeCls}">
                      {%ShowTime}</div>                </td>
              <td class="line_unR">
                  <span class="{@Home_Cls}">{%HomeName}</span><br />
                  <span class="{@Away_Cls}">{%AwayName}</span>                </td>
              <td align="right" valign="middle" style="white-space: nowrap" width="8%">
                  <div style="float: right;">                      
                      <!--<div style="display: inline; float: right;">
                          <img border='0' style="cursor: pointer;padding-right: 2px;" class="{@LS_Status}" src="template/sportsbook/public/images/layout/{@LS_Status_IMG}"
                              onclick="javascript:View_LS(this,'{%MUID}','{%GS}')" /></div>-->
                      <div style="display: inline; float: right;" class="{@LS_Status}"><span class="iconOdds info {@LS_Status_IMG}" title="Live Score" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></div>
                      <div style="display: inline; float: right;">
                          {@Streaming}</div>
                      <div style="display: inline; float: right;">
                          {@SportRadarInfo}</div>
                  </div>                </td>
              <td class="none_rline">
                  <div class="line_divR {%Changed_20}">
                      <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                      <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a></div></td>
              <td class="none_rline">
                  <div class="line_divL HdpGoalClass">
                      {@Value_1_H}<br />
                      {@Value_1_A}</div>
                  <div class="line_divR OddsDiv {%Changed_1}">
                      <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                      <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a></div></td>
              <td class="none_rline">
                  <div class="line_divL HdpGoalClass">
                      {%Goal_3}<br />
                      {@UNDER_3}</div>
                  <div class="line_divR OddsDiv {%Changed_3}">
                      <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                      <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a></div></td>
              <td>
                  <div class="line_divL HdpGoalClass">
                      {@ODD_2}<br />
                      {@EVEN_2}</div>
                  <div class="line_divR OddsDiv {%Changed_2}">
                      <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
                      <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a></div></td>
              <td align="center">
                  {@StatsInfo}</td>
          </tr>
          <tr id="LS_{%MUID}_3" class="{@LS_display_3}">
              <td valign="top" class="score_box" style="border-right-style: none">
                  <table border="0" align="right" cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="width: 15px; height: 15px">
                              <span class="iconInfo hockeyPP {@PP1}" title=" Power Play"></span></td>
                      </tr>
                      <tr>
                          <td style="width: 15px; height: 15px">                         
                              <span class="iconInfo hockeyPP {@PP2}" title=" Power Play"></span></td>
                      </tr>
                  </table></td>
              <td colspan="7" class="score_box">
                  <div class="line_divL" style="width: 160px;">
                      <div class="{@Home_Cls} text-ellipsis" title=" {%HomeName}">{%HomeName}</div>
                      <div class="{@Away_Cls} text-ellipsis" title=" {%AwayName}">{%AwayName}</div>
                  </div>      
              <div class="line_divR">
                      <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
                    <tr>
                    <td width="80"><div style="height: 18px;">                       
                       <span class="iconInfo hockey {@HPP5} right" style="margin: 1px;"></span>
                       <span class="iconInfo hockey {@HPP4} right" style="margin: 1px;"></span>
                       <span class="iconInfo hockey {@HPP3} right" style="margin: 1px;"></span>
                       <span class="iconInfo hockey {@HPP2} right" style="margin: 1px;"></span>
                       <span class="iconInfo hockey {@HPP1} right" style="margin: 1px;"></span>
                  </div>
                  <div style="height: 18px;">                       
                       <span class="iconInfo hockey {@APP5} right" style="margin: 1px;"></span>
                       <span class="iconInfo hockey {@APP4} right" style="margin: 1px;"></span>
                       <span class="iconInfo hockey {@APP3} right" style="margin: 1px;"></span>
                       <span class="iconInfo hockey {@APP2} right" style="margin: 1px;"></span>
                       <span class="iconInfo hockey {@APP1} right" style="margin: 1px;"></span>
                  </div> </td>
                              <td width="80">
                            <div class="{@LS_1S}">
                                      <div class="{@Changed_1s} border line_divR">
                                          <div class="line_b">
                                              &nbsp;{%H1S}</div>
                                          <div>
                                              &nbsp;{%A1S}</div>
                                      </div>
                                      <div class="line_divR">
                                        <div class="text-ellipsis max_width" title=" 1P">1P</div></div>
                      </div>                                </td>
                        <td width="80">
                <div class="{@LS_2S}">
                                      <div class="{@Changed_2s} border line_divR">
                                          <div class="line_b">
                                              &nbsp;{%H2S}</div>
                                          <div>
                                              &nbsp;{%A2S}</div>
                                      </div>
                                      <div class="line_divR">
                                          <div class="text-ellipsis max_width" title=" 2P">2P</div></div>
                                  </div>                                </td>
                        <td width="80">
                <div class="{@LS_3S}">
                                      <div class="{@Changed_3s} border line_divR">
                                          <div class="line_b">
                                              &nbsp;{%H3S}</div>
                                          <div>
                                              &nbsp;{%A3S}</div>
                                      </div>
                                      <div class="line_divR">
                                          <div class="text-ellipsis max_width" title=" 3P">3P</div></div>
                                  </div>                                </td>
                                  <td width="82">
                 <div class="{@LS_OT}">
                                        <div class="{@ScoreChange_OT} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{%HOT}</div>
                                            <div>
                                                &nbsp;{%AOT}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title=" Overtime">OT</div></div>
                                    </div></td>
                        <td width="100">
                                  <div class="box02">
                                      <div class="{%Changed_Score} border line_r line_divR">
                                          <div class="line_b">
                                              &nbsp;{%HTG}</div>
                                          <div>
                                              &nbsp;{%ATG}</div>
                                      </div>
                                      <div class="line_divR">
                                          <div class="text-ellipsis max_width" title=" Total Goal">Total Goal</div></div>
                                  </div>                                </td>
                          </tr>
                      </table>
                  </div> </td>
          </tr>
      </tbody>
      <tbody id="tmplLiveFooter_7">
          <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
              <td class="text_time">
                  <div class="{@TimeSuspendCls}">
                      <span class="iconInfo break"></span></div>
                  <div nowrap class="{@LiveTimeCls}">
                      {%ShowTime}</div>                </td>
              <td class="line_unR">
                  <span class="{@Home_Cls}">{%HomeName}</span><br />
                  <span class="{@Away_Cls}">{%AwayName}</span>                </td>
              <td align="right" valign="middle" style="white-space: nowrap" width="8%">
                  <div style="float: right;">
                      <div style="display: inline; float: right;" class="{@LS_Status}"><span class="iconOdds info {@LS_Status_IMG}" title="Live Score" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></div>
                      <div style="display: inline; float: right;">
                          {@Streaming}</div>
                      <div style="display: inline; float: right;">
                          {@SportRadarInfo}</div>
                  </div>                </td>
              <td class="none_rline">
                  <div class="line_divR {%Changed_20}">
                      <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                      <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a></div></td>
              <td class="none_rline">
                  <div class="line_divL HdpGoalClass">
                      {@Value_1_H}<br />
                      {@Value_1_A}</div>
                  <div class="line_divR OddsDiv {%Changed_1}">
                      <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                      <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a></div></td>
              <td class="none_rline">
                  <div class="line_divL HdpGoalClass">
                      {%Goal_3}<br />
                      {@UNDER_3}</div>
                  <div class="line_divR OddsDiv {%Changed_3}">
                      <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                      <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a></div></td>
              <td>
                  <div class="line_divL HdpGoalClass">
                      {@ODD_2}<br />
                      {@EVEN_2}</div>
                  <div class="line_divR OddsDiv {%Changed_2}">
                      <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
                      <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a></div></td>
              <td align="center">
                  {@StatsInfo}</td>
          </tr>
                    <tr id="LS_{%MUID}_0" class="{@LS_display_0}">
              <td class="score_box" style="border-right-style: none"><table align="right" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td style="width: 15px; height: 15px"><span class="iconInfo injury displayOff" title="Injury"></span>
                        <!--img border='0' class="displayOff"  title="Injury" src="http://image.ibcbet.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                    <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING1}" title="Turn"></span>
                        <!--img border='0' class="displayOn" title="Serve" src="http://image.ibcbet.com/template/sportsbook/public/images/layout/point.gif" /--></td>
                  </tr>
                  <tr>
                    <td style="width: 15px; height: 15px"><span class="iconInfo injury displayOff" title="Injury"></span>
                        <!--img border='0' class="displayOff"  title="Injury" src="http://image.ibcbet.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                    <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING2}" title="Turn"></span>
                        <!--img border='0' class="displayOff" title="Serve" src="http://image.ibcbet.com/template/sportsbook/public/images/layout/point.gif" /--></td>
                  </tr>
                </tbody>
              </table></td>
              <td colspan="7" class="score_box"><div class="line_divL" style="width: 234px;">
                <div class="FavTeamClass text-ellipsis" title=" {%HomeName}">{%HomeName}</div>
                <div class="UdrDogTeamClass text-ellipsis" title=" {%AwayName}">{%AwayName}</div>
              </div>
              <div class="line_divR">
                <table class="score_box" align="right" border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td width="120"><div class="{@LS_1S}">
                          <div class="{@Changed_1s} border line_divR">
                            <div class="line_b"> &nbsp;{%HFM}</div>
                            <div> &nbsp;{%AFM}</div>
                          </div>
                          <div class="line_divR"> <span title=" Frames">Frames</span></div>
                      </div></td>
                      <td width="120" class="baseball_LS1"><div class="box03">
                          <div class="{@Changed_Cfm} border line_divR"> &nbsp;{%CFM}
                          </div>
                          <div class="line_divR"> <span title=" Current Frame">Current Frame</span></div>
                      </div></td>
                      <td width="120"><div class="box02">
                          <div class="{%Changed_Pt} border line_divR">
                            <div class="line_b"> &nbsp;{%HPT}</div>
                            <div> &nbsp;{%APT}</div>
                          </div>
                          <div class="line_divR"> <span title=" Points">Pts</span></div>
                      </div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </td>
            </tr>
      </tbody>
        <tbody id="tmplLiveFooter_5">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    <div class="{@TimeSuspendCls}">
                        <span class="iconInfo rain"></span></div>
                    <div nowrap class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="5%">{@SportRadarInfo}<div style="display: inline; float: right;" class="{@LS_Status}"><span class="iconOdds info {@LS_Status_IMG}" title="Live Score" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></div>
                            <!--<span class="iconOdds info off {@LS_Status}"></span>-->
                              <!--img border='0' style="cursor: pointer;padding-right: 2px;" class="{@LS_Status}" src="template/sportsbook/public/images/layout/{@LS_Status_IMG}"
                                onclick="javascript:View_LS(this,'{%MUID}','{%GS}')" /-->{@Streaming}</td>
                <td class="none_rline">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_153_H}<br />
                        {@Value_153_A}</div>
                    <div class="line_divR OddsDiv {%Changed_153}">
                        <a class="{@Odds_153_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','h','{%Odds_153_H}',153)">{%Odds_153_H}</a><br />
                        <a class="{@Odds_153_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','a','{%Odds_153_A}',153)">{%Odds_153_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a>
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        {@ODD_2}<br />
                        {@EVEN_2}</div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a>
                    </div>
                </td>
                <td align="center"><span title="More Bet Types">{@More}</span>
                    {@StatsInfo}</td>
            </tr>
            <tr id="LS_{%MUID}_3" class="{@LS_display_3}">
                <td valign="top" class="score_box" style="border-right-style: none">
                    <table border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@HINJ}" title="Injury"></span>
                                <!--img border='0' class="{@HINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING1}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING1}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@AINJ}" title="Injury"></span>
                                <!--img border='0' class="{@AINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING2}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING2}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                    </table>
                </td>
                <td colspan="8" class="score_box">
                    <div class="line_divL" style="width: 150px;">
                        <div class="{@Home_Cls} text-ellipsis" title=" {%HomeName}">{%HomeName}</div>
                        <div class="{@Away_Cls} text-ellipsis" title=" {%AwayName}">{%AwayName}</div>
                    </div>
                    <div class="line_divR">
                        <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
                      <tr>
                                <td width="83">
                                  <div class="box02">
                                        <div class="{@Changed_Set} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HS}</div>
                                            <div>
                                                &nbsp;{@AS}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Set">Set</div></div>
                                  </div>
                                </td>
                          <td width="83">
                                    <div class="{@LS_1S}">
                                        <div class="{@Changed_1s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H1S}</div>
                                            <div>
                                                &nbsp;{@A1S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="1Set">1S</div></div>
                                    </div>
                        </td>
                          <td width="83">
                                    <div class="{@LS_2S}">
                                        <div class="{@Changed_2s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H2S}</div>
                                            <div>
                                                &nbsp;{@A2S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="2Set">2S</div></div>
                                    </div>
                        </td>
                          <td width="83">
                                    <div class="{@LS_3S}">
                                        <div class="{@Changed_3s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H3S}</div>
                                            <div>
                                                &nbsp;{@A3S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="3Set">3S</div></div>
                                    </div>
                        </td>
                          <td width="87">
                  <div class="box02">
                                        <div class="{@Changed_Pt} border line_r line_divR">
                                            <div class="line_b" title="{@HPT_TITLE}">
                                                &nbsp;{@HPT}</div>
                                            <div title="{@APT_TITLE}">
                                                &nbsp;{@APT}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title=" {@GT_TITLE}">{@GT3}</div></div>
                                    </div>
                                </td>
                          <td width="100">
                                    <div class="box02">
                                        <div class="border line_r line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HTG}</div>
                                            <div>
                                                &nbsp;{@ATG}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Total Games">T.Games</div></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                  </div>
                </td>
            </tr>
            <tr id="LS_{%MUID}_5" class="{@LS_display_5}">
                <td valign="top" style="border-right-style: none" class="score_box">
                    <table border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@HINJ}" title="Injury"></span>
                                <!--img border='0' class="{@HINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING1}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING1}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@AINJ}" title="Injury"></span>
                                <!--img border='0' class="{@AINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING2}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING2}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                    </table>
                </td>
                <td colspan="8" class="score_box">
                    <div class="line_divL" style="width: 100px;">
                        <div class="{@Home_Cls} text-ellipsis" title=" {%HomeName}">{%HomeName}</div>                        
                        <div class="{@Away_Cls} text-ellipsis" title=" {%AwayName}">{%AwayName}</div>
                    </div>
                    <div class="line_divR">
                        <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
                            <tr>
                                <td width="82">
                                    <div class="box02">
                                        <div class="{@Changed_Set} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HS}</div>
                                            <div>
                                                &nbsp;{@AS}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Set">Set</div></div>
                                    </div>
                                </td>
                                <td width="55">
                                    <div class="{@LS_1S}">
                                        <div class="{@Changed_1s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H1S}</div>
                                            <div>
                                                &nbsp;{@A1S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="1Set">1s</div></div>
                                    </div>
                                </td>
                                <td width="55">
                                    <div class="{@LS_2S}">
                                        <div class="{@Changed_2s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H2S}</div>
                                            <div>
                                                &nbsp;{@A2S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="2Set">2s</div></div>
                                    </div>
                                </td>
                                <td width="55">
                                    <div class="{@LS_3S}">
                                        <div class="{@Changed_3s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H3S}</div>
                                            <div>
                                                &nbsp;{@A3S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="3Set">3s</div></div>
                                    </div>
                                </td>
                                <td width="55">
                                    <div class="{@LS_4S}">
                                        <div class="{@Changed_4s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H4S}</div>
                                            <div>
                                                &nbsp;{@A4S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="4Set">4s</div></div>
                                    </div>
                                </td>
                                <td width="55">
                                    <div class="{@LS_5S}">
                                        <div class="{@Changed_5s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H5S}</div>
                                            <div>
                                                &nbsp;{@A5S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="5Set">5s</div></div>
                                    </div>
                                </td>
                                <td width="85">
                                    <div class="box02">
                                        <div class="{@Changed_Pt} border line_r line_divR">
                                            <div class="line_b" title="{@HPT_TITLE}">                                            
                                                &nbsp;{@HPT}</div>
                                            <div title="{@APT_TITLE}">
                                                &nbsp;{@APT}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="{@GT_TITLE}">{@GT5}</div></div>
                                    </div>
                                </td>
                                <td width="100">
                                    <div class="box02">
                                        <div class="border line_r line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HTG}</div>
                                            <div>
                                                &nbsp;{@ATG}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Total Games">T.Games</div></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr><td class="moreBetType {@Display_More}" colspan="9">{@MoreData}</td></tr>
        </tbody>
        <tbody id="tmplLiveFooter_6">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    <span class="{@TimeSuspendCls} HalfTime">T.Out</span>
                    <div nowrap class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="8%">{@SportRadarInfo}<div style="display: inline; float: right;" class="{@LS_Status}"><span class="iconOdds info {@LS_Status_IMG}" title="Live Score" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></div>
                            <!--<span class="iconOdds info off {@LS_Status}"></span>-->
                            <!--img border='0' style="cursor: pointer;padding-right: 2px;" class="{@LS_Status}" src="template/sportsbook/public/images/layout/{@LS_Status_IMG}"
                                onclick="javascript:View_LS(this,'{%MUID}','{%GS}')" /-->{@Streaming}</td>
                <td class="none_rline">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a>
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        {@ODD_2}<br />
                        {@EVEN_2}</div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a>
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}</td>
            </tr>
            <tr id="LS_{%MUID}_3" class="{@LS_display_3}">
                <td valign="top" class="score_box" style="border-right-style: none">
                    <table border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@HINJ}" title="Injury"></span>
                                <!--img border='0' class="{@HINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING1}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING1}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@AINJ}" title="Injury"></span>
                                <!--img border='0' class="{@AINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING2}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING2}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                    </table>
                </td>
                <td colspan="7" class="score_box">
                    <div class="line_divL" style="width: 230px;">
                        <div class="{@Home_Cls} text-ellipsis" title=" {%HomeName}">{%HomeName}</div>
                        <div class="{@Away_Cls} text-ellipsis" title=" {%AwayName}">{%AwayName}</div>
                    </div>
                    <div class="line_divR">
                        <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
                      <tr>
                                <td width="83">
                              <div class="box02">
                                        <div class="{@Changed_Set} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HS}</div>
                                            <div>
                                                &nbsp;{@AS}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Set">Set</div></div>
                                    </div>
                                </td>
                          <td width="83">
                  <div class="{@LS_1S}">
                                        <div class="{@Changed_1s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H1S}</div>
                                            <div>
                                                &nbsp;{@A1S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="1Set">1S</div></div>
                                    </div>
                                </td>
                          <td width="83">
                  <div class="{@LS_2S}">
                                        <div class="{@Changed_2s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H2S}</div>
                                            <div>
                                                &nbsp;{@A2S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="2Set">2S</div></div>
                                    </div>
                                </td>
                          <td width="83">
                  <div class="{@LS_3S}">
                                        <div class="{@Changed_3s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H3S}</div>
                                            <div>
                                                &nbsp;{@A3S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="3Set">3S</div></div>
                                    </div>
                                </td>
                          <td width="100">
                                    <div class="box02">
                                        <div class="border line_r line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HTG}</div>
                                            <div>
                                                &nbsp;{@ATG}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Total Points">T.Points</div></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                  </div>
                </td>
            </tr>
            <tr id="LS_{%MUID}_5" class="{@LS_display_5}">
                <td valign="top" style="border-right-style: none" class="score_box">
                    <table border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@HINJ}" title="Injury"></span>
                                <!--img border='0' class="{@HINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING1}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING1}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@AINJ}" title="Injury"></span>
                                <!--img border='0' class="{@AINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING2}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING2}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                    </table>
                </td>
                <td  colspan="7" class="score_box">
                    <div class="line_divL"  style="width: 180px;">
                        <div class="{@Home_Cls} text-ellipsis" title=" {%HomeName}">{%HomeName}</div>                        
                        <div class="{@Away_Cls} text-ellipsis" title=" {%AwayName}">{%AwayName}</div>
                    </div>
                    <div class="line_divR">
                        <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
                            <tr>
                                <td width="82">
                                    <div class="box02">
                                        <div class="{@Changed_Set} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HS}</div>
                                            <div>
                                                &nbsp;{@AS}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Set">Set</div></div>
                                    </div>
                                </td>
                                <td width="55">
                                    <div class="{@LS_1S}">
                                        <div class="{@Changed_1s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H1S}</div>
                                            <div>
                                                &nbsp;{@A1S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="1Set">1s</div></div>
                                    </div>
                                </td>
                                <td width="55">
                                    <div class="{@LS_2S}">
                                        <div class="{@Changed_2s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H2S}</div>
                                            <div>
                                                &nbsp;{@A2S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="2Set">2s</div></div>
                                    </div>
                                </td>
                                <td width="55">
                                    <div class="{@LS_3S}">
                                        <div class="{@Changed_3s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H3S}</div>
                                            <div>
                                                &nbsp;{@A3S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="3Set">3s</div></div>
                                    </div>
                                </td>
                                <td width="55">
                                    <div class="{@LS_4S}">
                                        <div class="{@Changed_4s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H4S}</div>
                                            <div>
                                                &nbsp;{@A4S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="4Set">4s</div></div>
                                    </div>
                                </td>
                                <td width="55">
                                    <div class="{@LS_5S}">
                                        <div class="{@Changed_5s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H5S}</div>
                                            <div>
                                                &nbsp;{@A5S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="5Set">5s</div></div>
                                    </div>
                                </td>
                                <td width="100">
                                    <div class="box02">
                                        <div class="border line_r line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HTG}</div>
                                            <div>
                                                &nbsp;{@ATG}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Total Points">T.Points</div></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLiveFooter_9">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    <div class="{@TimeSuspendCls}">
                    	<span class="iconInfo rain"></span>
                    </div>
                    <div nowrap class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="8%">{@SportRadarInfo}<div style="display: inline; float: right;" class="{@LS_Status}"><span class="iconOdds info {@LS_Status_IMG}" title="Live Score" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></div>
                            <!--<span class="iconOdds info off {@LS_Status}"></span>-->
                            <!--img border='0' style="cursor: pointer;padding-right: 2px;" class="{@LS_Status}" src="template/sportsbook/public/images/layout/{@LS_Status_IMG}"
                                onclick="javascript:View_LS(this,'{%MUID}','{%GS}')" /-->{@Streaming}</td>
                <td class="none_rline">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a>
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        {@ODD_2}<br />
                        {@EVEN_2}</div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a>
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}</td>
            </tr>
            <tr id="LS_{%MUID}_3" class="{@LS_display_3}">
                <td valign="top" class="score_box" style="border-right-style: none">
                    <table border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@HINJ}" title="Injury"></span>
                                <!--img border='0' class="{@HINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING1}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING1}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@AINJ}" title="Injury"></span>
                                <!--img border='0' class="{@AINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING2}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING2}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                    </table>
                </td>
                <td colspan="7" class="score_box">
                    <div class="line_divL" style="width: 230px;">
                        <div class="{@Home_Cls} text-ellipsis" title=" {%HomeName}">{%HomeName}</div>
                        <div class="{@Away_Cls} text-ellipsis" title=" {%AwayName}">{%AwayName}</div>
                    </div>
                    <div class="line_divR">
                        <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
                      <tr>
                                <td width="83">
                                  <div class="box02">
                                        <div class="{@Changed_Set} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HS}</div>
                                            <div>
                                                &nbsp;{@AS}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Set">Set</div></div>
                                  </div>
                                </td>
                          <td width="83">
                  <div class="{@LS_1S}">
                                        <div class="{@Changed_1s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H1S}</div>
                                            <div>
                                                &nbsp;{@A1S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="1Set">1S</div></div>
                                    </div>
                                </td>
                          <td width="83">
                  <div class="{@LS_2S}">
                                        <div class="{@Changed_2s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H2S}</div>
                                            <div>
                                                &nbsp;{@A2S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="2Set">2S</div></div>
                                    </div>
                                </td>
                          <td width="83">
                  <div class="{@LS_3S}">
                                        <div class="{@Changed_3s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H3S}</div>
                                            <div>
                                                &nbsp;{@A3S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="3Set">3S</div></div>
                                    </div>
                                </td>
                          <td width="100">
                                    <div class="box02">
                                        <div class="border line_r line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HTG}</div>
                                            <div>
                                                &nbsp;{@ATG}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Total Points">T.Points</div></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                  </div>
                </td>
            </tr>
            <tr id="LS_{%MUID}_5" class="{@LS_display_5}">
                <td valign="top" class="score_box" style="border-right-style: none">
                    <table border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@HINJ}" title="Injury"></span>
                                <!--img border='0' class="{@HINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING1}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING1}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                        <tr>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo injury {@AINJ}" title="Injury"></span>
                                <!--img border='0' class="{@AINJ}"  title="Injury" src="template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
                            <td style="width: 15px; height: 15px">
                            	<span class="iconInfo point {@SERVING2}" title="Serve"></span>
                                <!--img border='0' class="{@SERVING2}" title="Serve" src="template/sportsbook/public/images/layout/point.gif" /--></td>
                        </tr>
                    </table>
                </td>
                <td colspan="7" class="score_box">
                    <div class="line_divL" style="width: 102px;">
                        <div class="{@Home_Cls} text-ellipsis" title=" {%HomeName}">{%HomeName}</div>
                        <div class="{@Away_Cls} text-ellipsis" title=" {%AwayName}">{%AwayName}</div>
                    </div>
                    <div class="line_divR">
                        <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
                      <tr>
                                <td width="82">
                                  <div class="box02">
                                        <div class="{@Changed_Set} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HS}</div>
                                            <div>
                                                &nbsp;{@AS}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Set">Set</div></div>
                                  </div>
                                </td>
                          <td width="83">
                  <div class="{@LS_1S}">
                                        <div class="{@Changed_1s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H1S}</div>
                                            <div>
                                                &nbsp;{@A1S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="1Set">1S</div></div>
                                    </div>
                                </td>
                          <td width="83">
                  <div class="{@LS_2S}">
                                        <div class="{@Changed_2s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H2S}</div>
                                            <div>
                                                &nbsp;{@A2S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="2Set">2S</div></div>
                                    </div>
                                </td>
                          <td width="83">
                  <div class="{@LS_3S}">
                                        <div class="{@Changed_3s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H3S}</div>
                                            <div>
                                                &nbsp;{@A3S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="3Set">3S</div></div>
                                    </div>
                                </td>
			            <td width="83">
		          <div class="{@LS_4S}">
                                        <div class="{@Changed_4s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H4S}</div>
                                            <div>
                                                &nbsp;{@A4S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="4Set">4S</div></div>
                                    </div>
                                </td>
                        <td width="83">
		          <div class="{@LS_5S}">
                                        <div class="{@Changed_5s} border line_divR">
                                            <div class="line_b">
                                                &nbsp;{@H5S}</div>
                                            <div>
                                                &nbsp;{@A5S}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="5Set">5S</div></div>
                                    </div>
                                </td>
                          <td width="85">
                                    <div class="box02">
                                        <div class="border line_r line_divR">
                                            <div class="line_b">
                                                &nbsp;{@HTG}</div>
                                            <div>
                                                &nbsp;{@ATG}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Total Points">T.Points</div></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                  </div>
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLeague">
            <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      			<td class="tabtitle"></td>
                <td colspan="6" class="tabtitle">{%LeagueName}</td>
                <td class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="Please Wait"></div></a></td>
            </tr>
        </tbody>
		<tbody id="tmplLeague_5">
            <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      			<td class="tabtitle"></td>
                <td colspan="6" class="tabtitle">{%LeagueName}</td>
                <td colspan="2" class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="Please Wait"></div></a></td>
            </tr>
        </tbody>
        <tbody id="tmplEvent">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    {%ShowTime}</td>
                <td class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="8%">
                    {@SportRadarInfo}{@Streaming}</td>
                <td class="none_rline">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a>
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        {@ODD_2}<br />
                        {@EVEN_2}</div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a>
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
        <tbody id="tmplEvent_154">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    {%ShowTime}</td>
                <td colspan="5" class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="8%">
                    {@SportRadarInfo}{@Streaming}</td>
                <td class="">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
                    </div>
                </td>
                <!--<td align="center">
                    {@StatsInfo}</td>-->
            </tr>
        </tbody>
      <tbody id="tmplEvent_43">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    {%ShowTime}</td>
                <td class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="8%">
                    {@SportRadarInfo}{@Streaming}</td>
                <td class="none_rline">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">
                            {%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">
                            {%Odds_20_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a>
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <br />
                        </div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a>
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
              <tbody id="tmplEvent_5">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    {%ShowTime}</td>
                <td class="line_unR">
                    <span class="{@Home_Cls}">{%HomeName}</span><br />
                    <span class="{@Away_Cls}">{%AwayName}</span>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap" width="5%">
                    {@SportRadarInfo}{@Streaming}</td>
                <td class="none_rline">
                    <div class="line_divL line_divR {%Changed_20}">
                        <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
                        <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_153_H}<br />
                        {@Value_153_A}</div>
                    <div class="line_divR OddsDiv {%Changed_153}">
                        <a class="{@Odds_153_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','h','{%Odds_153_H}',153)">{%Odds_153_H}</a><br />
                        <a class="{@Odds_153_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','a','{%Odds_153_A}',153)">{%Odds_153_A}</a>
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a>
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        {@ODD_2}<br />
                        {@EVEN_2}</div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a></div>
                </td>
                <td align="center"><span title="More Bet Types">{@More}</span>
                    {@StatsInfo}</td>
            </tr>
           <tr><td class="moreBetType {@Display_More}" colspan="9">{@MoreData}</td></tr>
        </tbody>
      <!--Tennis More NoInfo-->
      <tbody>
      <tr><td>
        <div id="NoInfo">
          <div class="styleblack" align="center" style="background-color: #E1E4E8;">There are no games available at the moment.</div>
        </div>
      </td></tr>
      </tbody>
      <!--Tennis More loading-->
      <tbody>
      <tr><td>
        <div id="Loading">
          <div align="center" style="background-color: #FFFFFF;"><img src="/images/loading.gif?v=201212261401" vspace="2" /></div>
        </div>
      </td></tr>
      </tbody>
    </table>
    <span id="tmplEnd"></span>
</body>
</html>
