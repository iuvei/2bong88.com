
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Total Goal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/table_w.css" rel="stylesheet" type="text/css" />
    <link href="css/button.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody id='tmplHeader'>
            <tr class="tabthdwn">
                <th width="6%" nowrap="nowrap">
                    Giờ</th>
                <th width="30%" colspan="2" align="left" class="even">
                    Lựa Chọn</th>
                <th width="45" class="tabt_L" title="HH">
                    HH</th>
                <th width="45" class="even" title="HD">
                    HD</th>
                <th width="45" title="HA">
                    HA</th>
                <th width="45" class="even tabt_L" title="DH">
                    DH</th>
                <th width="45" title="DD">
                    DD</th>
                <th width="45" class="even" title="DA">
                    DA</th>
                <th width="45" class="tabt_L" title="AH">
                    AH</th>
                <th width="45" class="even" title="AD">
                    AD</th>
                <th width="45" title="AA">
                    AA</th>
                <th width="1" class="even tabt_L">
                </th>
            </tr>
        </tbody>
        <tbody id='tmplLeague'>
            <tr id="l_{%LeagueId}" onclick="refreshData()" style="cursor: pointer">
     			 <td class="tabtitle"></td>
                <td colspan="10" class="tabtitle indent">{%LeagueName}</td>
                <td colspan="2" class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh" class="btnIcon right disable"><div class="icon-refresh" title="Xin vui lòng chờ đợi"></div></a></td>
            </tr>
        </tbody>
        <tbody id='tmplLive'>
            <tr align="center" bdcolor="#FFCCBC" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='#FFCCBC';">
                <td class="text_time {%Changed_Score}">
                    <b>{%ScoreH}-{%ScoreA}</b><div nowrap class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td align="left" class="UdrDogTeamClass line_unR">
                    {%HomeName}<br />
                    {%AwayName}</td>
                <td align="right" width="6%">{@Streaming}{@SportRadarInfo}</td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','11','{%Odds_16_HH}',16)">
                        {%Odds_16_HH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','10','{%Odds_16_HD}',16)">
                        {%Odds_16_HD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','12','{%Odds_16_HA}',16)">
                        {%Odds_16_HA}</a></td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','01','{%Odds_16_DH}',16)">
                        {%Odds_16_DH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','00','{%Odds_16_DD}',16)">
                        {%Odds_16_DD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','02','{%Odds_16_DA}',16)">
                        {%Odds_16_DA}</a></td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','21','{%Odds_16_AH}',16)">
                        {%Odds_16_AH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','20','{%Odds_16_AD}',16)">
                        {%Odds_16_AD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','22','{%Odds_16_AA}',16)">
                        {%Odds_16_AA}</a></td>
                <td class="tabt_L">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
        <tbody id='tmplEvent'>
            <tr align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    {%ShowTime}</td>
                <td align="left" class="UdrDogTeamClass line_unR">
                    {%HomeName}<br />
                    {%AwayName}</td>
                <td align="right" width="6%">{@Streaming}{@SportRadarInfo}</td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','11','{%Odds_16_HH}',16)">
                        {%Odds_16_HH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','10','{%Odds_16_HD}',16)">
                        {%Odds_16_HD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','12','{%Odds_16_HA}',16)">
                        {%Odds_16_HA}</a></td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','01','{%Odds_16_DH}',16)">
                        {%Odds_16_DH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','00','{%Odds_16_DD}',16)">
                        {%Odds_16_DD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','02','{%Odds_16_DA}',16)">
                        {%Odds_16_DA}</a></td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','21','{%Odds_16_AH}',16)">
                        {%Odds_16_AH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','20','{%Odds_16_AD}',16)">
                        {%Odds_16_AD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','22','{%Odds_16_AA}',16)">
                        {%Odds_16_AA}</a></td>
                <td class="tabt_L">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
    </table>
    <span id="tmplEnd"></span>
</body>
</html>
