
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Correct Score Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody id='tmplHeader'>
            <tr align="middle" class="OddsValue">
                <th colspan="11" align="left" title="Lựa Chọn">
                    Event</th>
                <th colspan="5" class="even" title="Giờ">
                    Time</th>
                <th>&nbsp;
                    </th>
            </tr>
        </tbody>
        <tbody id="tmplLeague">
            <tr id="l_{%LeagueId}" bgcolor="#B1B1B1" align="center" onclick="refreshData()" style="cursor: pointer">
                <td colspan="13" align="left" class="tabtitle">
                    {%LeagueName}</td>
              <td colspan="4" class="tabtitle" align="right" nowrap><a name="btnRefresh" class="btnIcon right disable"><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></a></td>
            </tr>
        </tbody>
        <tbody id='tmplLive'>
            <tr align="center" valign="middle" bgcolor="#c3c3c3">
                <td colspan="11" align="left">
                    <span class="UdrDogTeamClass">{%HomeName}</span> <span class="text_11BlackB">-vs-</span>
                    <span class="UdrDogTeamClass">{%AwayName}</span>
                </td>
                <td colspan="6" class="text_time">
                    <b>{%ScoreH}-{%ScoreA}&nbsp;&nbsp;<font class="{@LiveTimeCls}">{%ShowTime}</font></b></td>
            </tr>
            <tr align="center" valign="middle" class="bgcpe text_11Black">
                <td width="44" class="none_rline">
                    1-0</td>
                <td width="44" class="none_rline">
                    2-0</td>
                <td width="44" class="none_rline">
                    2-1</td>
                <td width="44" class="none_rline">
                    3-0</td>
                <td width="44" class="none_rline">
                    3-1</td>
                <td width="44" class="none_rline">
                    3-2</td>
                <td width="44" class="none_rline">
                    4-0</td>
                <td width="44" class="none_rline">
                    4-1</td>
                <td width="44" class="none_rline">
                    4-2</td>
                <td width="44" class="none_rline">
                    4-3</td>
                <td width="46">
                    5-0UP</td>
                <td width="40" class="none_rline">
                    0-0</td>
                <td width="40" class="none_rline">
                    1-1</td>
                <td width="40" class="none_rline">
                    2-2</td>
                <td width="40" class="none_rline">
                    3-3</td>
                <td width="40">
                    4-4</td>
                <td width="1">&nbsp;
                    </td>
            </tr>
            <tr id="e_{%MatchId}_1" align="center" valign="middle" bgcolor='#FFCCBC'
                onmouseover="changeBGColor2('e_{%MatchId}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}','#FFCCBC');">
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','10','{%Odds_4_10}',4)" class="UdrDogOddsClass">
                        {%Odds_4_10}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','20','{%Odds_4_20}',4)" class="UdrDogOddsClass">
                        {%Odds_4_20}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','21','{%Odds_4_21}',4)" class="UdrDogOddsClass">
                        {%Odds_4_21}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','30','{%Odds_4_30}',4)" class="UdrDogOddsClass">
                        {%Odds_4_30}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','31','{%Odds_4_31}',4)" class="UdrDogOddsClass">
                        {%Odds_4_31}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','32','{%Odds_4_32}',4)" class="UdrDogOddsClass">
                        {%Odds_4_32}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','40','{%Odds_4_40}',4)" class="UdrDogOddsClass">
                        {%Odds_4_40}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','41','{%Odds_4_41}',4)" class="UdrDogOddsClass">
                        {%Odds_4_41}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','42','{%Odds_4_42}',4)" class="UdrDogOddsClass">
                        {%Odds_4_42}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','43','{%Odds_4_43}',4)" class="UdrDogOddsClass">
                        {%Odds_4_43}</a></td>
                <td width="46">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','50','{%Odds_4_50}',4)" class="UdrDogOddsClass">
                        {%Odds_4_50}</a></td>
                <td rowspan="3" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','00','{%Odds_4_00}',4)" class="UdrDogOddsClass">
                        {%Odds_4_00}</a></td>
                <td rowspan="3" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','11','{%Odds_4_11}',4)" class="UdrDogOddsClass">
                        {%Odds_4_11}</a></td>
                <td rowspan="3" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','22','{%Odds_4_22}',4)" class="UdrDogOddsClass">
                        {%Odds_4_22}</a></td>
                <td rowspan="3" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','33','{%Odds_4_33}',4)" class="UdrDogOddsClass">
                        {%Odds_4_33}</a></td>
                <td rowspan="3">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','44','{%Odds_4_44}',4)" class="UdrDogOddsClass">
                        {%Odds_4_44}</a></td>
                <td rowspan="3" align="center" valign="middle">{@SportRadarInfo}{@StatsInfo}</td>
            </tr>
            <tr align="center" valign="middle" class="bgcpe text_11Black">
                <td width="44" class="none_rline">
                    0-1</td>
                <td width="44" class="none_rline">
                    0-2</td>
                <td width="44" class="none_rline">
                    1-2</td>
                <td width="44" class="none_rline">
                    0-3</td>
                <td width="44" class="none_rline">
                    1-3</td>
                <td width="44" class="none_rline">
                    2-3</td>
                <td width="44" class="none_rline">
                    0-4</td>
                <td width="44" class="none_rline">
                    1-4</td>
                <td width="44" class="none_rline">
                    2-4</td>
                <td width="44" class="none_rline">
                    3-4</td>
                <td width="46">
                    0-5UP</td>
            </tr>
            <tr id="e_{%MatchId}_2" align="center" valign="middle" bgcolor='#FFCCBC'
                onmouseover="changeBGColor2('e_{%MatchId}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}','#FFCCBC');">
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','01','{%Odds_4_01}',4)" class="UdrDogOddsClass">
                        {%Odds_4_01}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','02','{%Odds_4_02}',4)" class="UdrDogOddsClass">
                        {%Odds_4_02}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','12','{%Odds_4_12}',4)" class="UdrDogOddsClass">
                        {%Odds_4_12}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','03','{%Odds_4_03}',4)" class="UdrDogOddsClass">
                        {%Odds_4_03}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','13','{%Odds_4_13}',4)" class="UdrDogOddsClass">
                        {%Odds_4_13}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','23','{%Odds_4_23}',4)" class="UdrDogOddsClass">
                        {%Odds_4_23}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','04','{%Odds_4_04}',4)" class="UdrDogOddsClass">
                        {%Odds_4_04}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','14','{%Odds_4_14}',4)" class="UdrDogOddsClass">
                        {%Odds_4_14}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','24','{%Odds_4_24}',4)" class="UdrDogOddsClass">
                        {%Odds_4_24}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','34','{%Odds_4_34}',4)" class="UdrDogOddsClass">
                        {%Odds_4_34}</a></td>
                <td width="46">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','05','{%Odds_4_05}',4)" class="UdrDogOddsClass">
                        {456%Odds_4_05}</a></td>
            </tr>
        </tbody>
        <tbody id='tmplEvent'>
            <tr valign="middle" align="center" bgcolor="#C3C3C3">
                <td colspan="11" align="left">
                    <span class="UdrDogTeamClass">{%HomeName}</span> <span class="text_11BlackB">-vs-</span>
                    <span class="UdrDogTeamClass">{%AwayName}</span>
                </td>
                <td align="center" colspan="6" class="text_time">
                    {%ShowTime}</td>
            </tr>
            <tr align="center" valign="middle" class="bgcpe text_11Black">
                <td width="44" class="none_rline">
                    1-0</td>
                <td width="44" class="none_rline">
                    2-0</td>
                <td width="44" class="none_rline">
                    2-1</td>
                <td width="44" class="none_rline">
                    3-0</td>
                <td width="44" class="none_rline">
                    3-1</td>
                <td width="44" class="none_rline">
                    3-2</td>
                <td width="44" class="none_rline">
                    4-0</td>
                <td width="44" class="none_rline">
                    4-1</td>
                <td width="44" class="none_rline">
                    4-2</td>
                <td width="44" class="none_rline">
                    4-3</td>
                <td width="46">
                    5-0 UP</td>
                <td width="40" class="none_rline">
                    0-0</td>
                <td width="40" class="none_rline">
                    1-1</td>
                <td width="40" class="none_rline">
                    2-2</td>
                <td width="40" class="none_rline">
                    3-3</td>
                <td width="40">
                    4-4</td>
                <td width="1">&nbsp;
                    </td>
            </tr>
            <tr id="e_{%MatchId}_1" class="bgcpelight" align="center" valign="middle" onmouseover="changeBGColor2('e_{%MatchId}','#F5EEB8');"
                onmouseout="changeBGColor2('e_{%MatchId}','#E4E4E4');">
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','10','{%Odds_4_10}',4)" class="UdrDogOddsClass">
                        {%Odds_4_10}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','20','{%Odds_4_20}',4)" class="UdrDogOddsClass">
                        {%Odds_4_20}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','21','{%Odds_4_21}',4)" class="UdrDogOddsClass">
                        {%Odds_4_21}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','30','{%Odds_4_30}',4)" class="UdrDogOddsClass">
                        {%Odds_4_30}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','31','{%Odds_4_31}',4)" class="UdrDogOddsClass">
                        {%Odds_4_31}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','32','{%Odds_4_32}',4)" class="UdrDogOddsClass">
                        {%Odds_4_32}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','40','{%Odds_4_40}',4)" class="UdrDogOddsClass">
                        {%Odds_4_40}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','41','{%Odds_4_41}',4)" class="UdrDogOddsClass">
                        {%Odds_4_41}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','42','{%Odds_4_42}',4)" class="UdrDogOddsClass">
                        {%Odds_4_42}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','43','{%Odds_4_43}',4)" class="UdrDogOddsClass">
                        {%Odds_4_43}</a></td>
                <td width="46">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','50','{%Odds_4_50}',4)" class="UdrDogOddsClass">
                        {%Odds_4_50}</a></td>
                <td rowspan="3" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','00','{%Odds_4_00}',4)" class="UdrDogOddsClass">
                        {%Odds_4_00}</a></td>
                <td rowspan="3" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','11','{%Odds_4_11}',4)" class="UdrDogOddsClass">
                        {%Odds_4_11}</a></td>
                <td rowspan="3" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','22','{%Odds_4_22}',4)" class="UdrDogOddsClass">
                        {%Odds_4_22}</a></td>
                <td rowspan="3" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','33','{%Odds_4_33}',4)" class="UdrDogOddsClass">
                        {%Odds_4_33}</a></td>
                <td rowspan="3">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','44','{%Odds_4_44}',4)" class="UdrDogOddsClass">
                        {%Odds_4_44}</a></td>
                <td rowspan="3" align="center" valign="middle">{@SportRadarInfo}{@StatsInfo}</td>
            </tr>
            <tr align="center" valign="middle" class="bgcpe text_11Black">
                <td width="44" class="none_rline">
                    0-1</td>
                <td width="44" class="none_rline">
                    0-2</td>
                <td width="44" class="none_rline">
                    1-2</td>
                <td width="44" class="none_rline">
                    0-3</td>
                <td width="44" class="none_rline">
                    1-3</td>
                <td width="44" class="none_rline">
                    2-3</td>
                <td width="44" class="none_rline">
                    0-4</td>
                <td width="44" class="none_rline">
                    1-4</td>
                <td width="44" class="none_rline">
                    2-4</td>
                <td width="44" class="none_rline">
                    3-4</td>
                <td width="46">
                    0-5 UP</td>
            </tr>
            <tr id="e_{%MatchId}_2" class="bgcpelight" align="center" valign="middle" onmouseover="changeBGColor2('e_{%MatchId}','#F5EEB8');"
                onmouseout="changeBGColor2('e_{%MatchId}','#E4E4E4');">
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','01','{%Odds_4_01}',4)" class="UdrDogOddsClass">
                        {%Odds_4_01}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','02','{%Odds_4_02}',4)" class="UdrDogOddsClass">
                        {%Odds_4_02}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','12','{%Odds_4_12}',4)" class="UdrDogOddsClass">
                        {%Odds_4_12}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','03','{%Odds_4_03}',4)" class="UdrDogOddsClass">
                        {%Odds_4_03}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','13','{%Odds_4_13}',4)" class="UdrDogOddsClass">
                        {%Odds_4_13}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','23','{%Odds_4_23}',4)" class="UdrDogOddsClass">
                        {%Odds_4_23}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','04','{%Odds_4_04}',4)" class="UdrDogOddsClass">
                        {%Odds_4_04}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','14','{%Odds_4_14}',4)" class="UdrDogOddsClass">
                        {%Odds_4_14}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','24','{%Odds_4_24}',4)" class="UdrDogOddsClass">
                        {%Odds_4_24}</a></td>
                <td width="44" class="none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','34','{%Odds_4_34}',4)" class="UdrDogOddsClass">
                        {%Odds_4_34}</a></td>
                <td width="46">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_4}','05','{%Odds_4_05}',4)" class="UdrDogOddsClass">
                        {%Odds_4_05}</a></td>
            </tr>
        </tbody>
    </table>
    <span id="tmplEnd"></span>
</body>
</html>
