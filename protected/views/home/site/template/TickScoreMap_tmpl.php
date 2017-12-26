

<div>
<div id="ScoreMapDivTmpl">

	<div id="ScoreMapDiv">
		<div class="popupW">
		   <div id="ScoreMapTitle" class="popupWTitle">
			  <span>
				 <div class="popWIcon"></div>
				 <div class="popWTitleContain"><div class="text-ellipsis" id="popScoreTitle" style="font-size:12px;"></div></div>
				 <div id="ScoreMapCloser" class="popWClose" title="Close"></div>				 
				 <a id="ScoreMapRefresh" class="btnIcon black right" title="Refresh" onClick="parent.topFrame.g_SMF.Refresh(true);">
					<span class="icon-refresh"></span>
				 </a>
			  </span>
		   </div>
		   <div id="ScoreMapContainer" class="popWContain"></div>
		</div>
	</div> 
</div>

<script id="scoremapArea" type="text/x-jquery-tmpl">
<div  class="scoremapArea">
    <div class="popWContain">        
        <div class="popWTableArea">
			<div class="scoremapInfo">
				<span class="iconOdds info" style="cursor: default; background-position: -90px 0px !important;"></span>
				<span class="content">Waiting bet tickets: ${wcount}</span>
				<a onclick="parent.topFrame.g_SMF.removeAllTicket();" class="button right" ><span>Remove All</span></a>
			</div>
{{if (HTTicketList!=null && HTTicketList.length>0) || NowHTScoreMap.Map !=null}}
			<table width="100%" cellpadding="0" cellspacing="0" border="0" class="oddsTable info">
				<tbody>
				<tr>
					<td class="tabtitle" colspan="${NowHTScoreMap.HE-NowHTScoreMap.HS+1}" style="border-top-right-radius:0;">
						HT
					</td>
					<td class="tabtitle" style="border-top-left-radius:0;">
						<!--<a  onClick="parent.topFrame.g_SMF.Refresh(${MatchID});this.className='btnIcon right disable';" name="btnRefresh" class="btnIcon right" title="Refresh"><div class="icon-refresh" title="Refresh"></div></a> -->
					</td>
				</tr>
				{{if (HTTicketList!=null && HTTicketList.length>0)}}
				<tr>				    
					<td  colspan="${NowHTScoreMap.HE-NowHTScoreMap.HS+2}" >
						<div class="scoremapList">
							{{each HTTicketList}}
							<div class="BetInfo" {{if $value.Off==0}}onClick="fFrame.topFrame.g_SMF.BetProcess(this,event,'${$value.OddsId}','${$value.BetTeam}','${$value.Odds}','${$value.Stake}');" style="cursor:pointer;"{{/if}}>
								<div class="TextStyle01 left{{if $value.Off==1}} linethrough{{/if}}" >
									<input {{if $value.Enable}}checked{{/if}} {{if $value.Off==1}}disabled{{/if}} onClick="parent.topFrame.g_SMF.setTicketEnable('${$value.OddsId}','${$value.BetTeam}',this.checked);" type="checkbox" style="margin-right:5px;float:left;"/>
										<span style="float:left;">${$value.BetName} -&nbsp;</span>
										<span title="${$value.Choice}" class="{{if $value.Hdp<0 || $value.Bettype !=7 }}FavTeamClass{{else}}UdrDogTeamClass{{/if}} text-ellipsis" style="float:left;max-width: 130px; line-height:16px;">${$value.Choice}</span>
										<span class="TextStyle03" style="float:left;padding-right:5px;">&nbsp;${$value.HdpTxt}<span class="TextStyle01">{{if IsLive}}[${LiveScore.H}-${LiveScore.A}]{{/if}}</span>@</span>										
										<span class="{{if $value.Odds < 0}}FavOddsClassBetProcess{{else}}UdrDogOddsClassBetProcess{{/if}}"  style="{{if $value.oddsChg}}background-color:#ffccbc;{{/if}} float:left;">${$value.Odds}</span>
								</div>
								
								<div class="right">
									<span class="stake{{if $value.Off==1}} linethrough{{/if}}">${$value.Stake}</span>
									<div class="btnIcon" onclick="fFrame.topFrame.g_SMF.removeTicket(${$value.OddsId},'${$value.BetTeam}');"><span class="icon-close"></span></div>
								</div>									
								
							</div>
							{{/each}}
						</div>						
					</td>
				</tr>	
                {{/if}}				
				</tbody>
			
{{if NowHTScoreMap.Map !=null}}					
				<tbody class="maskSet">
				<tr align="center">
					<th width="78" rowspan="2">Away</th>
					<th colspan="${NowHTScoreMap.HE-NowHTScoreMap.HS+1}" class="even tabthup">Home</th>
				</tr>
				<tr align="center">
					{{each NowHTScoreMap.Map}}<th width="72" class="even">${$index + NowHTScoreMap.HS}</th>{{/each}}
				</tr>
				{{each(a,adata) NowHTScoreMap.Map}}
				<tr align="right">					  
					<th align="center" w>${a + NowHTScoreMap.AS}</th> 
					
					{{each(h,hdata) NowHTScoreMap.Map[a]}}
					<td class="{{if hdata<0}}FavOddsClass{{else}}UdrDogOddsClass{{/if}}{{if g_SMF.openMark(NowHTScoreMap.HS+h,NowHTScoreMap.AS+a,0)}} maskOn{{/if}}" title="${NowHTScoreMap.HS+h}:${NowHTScoreMap.AS+a}" bgcolor="${g_SMF.getColor(NowHTScoreMap.HS+h,NowHTScoreMap.AS+a , (IsLive && a + NowHTScoreMap.AS==LiveScore.A && h+NowHTScoreMap.HS==LiveScore.H) , NowHTScoreMap.isWait==2,0)}" onclick="parent.topFrame.g_SMF.ClickMap(${NowHTScoreMap.HS+h},${NowHTScoreMap.AS+a},0);" onmouseover="parent.topFrame.g_SMF.ChkMap(this,${NowHTScoreMap.HS+h},${NowHTScoreMap.AS+a},0);" >
					
					   ${addCommas(hdata.toFixed(2))}
					</td>
					{{/each}}
				</tr>
				{{/each}}
				</tbody>
{{/if}}				
			</table>     			
{{/if}}					
{{if (FTTicketList!=null && FTTicketList.length>0) || NowFTScoreMap.Map !=null}}
		    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="oddsTable info">
				<tbody>
				<tr>
					<td class="tabtitle" colspan="${NowFTScoreMap.HE-NowFTScoreMap.HS+1}" style="border-top-right-radius:0;">
						FT
					</td>
					<td class="tabtitle" style="border-top-left-radius:0;">
						<!--<a  onClick="parent.topFrame.g_SMF.Refresh(${MatchID});this.className='btnIcon right disable';" name="btnRefresh" class="btnIcon right" title="Refresh"><div class="icon-refresh" title="Refresh"></div></a>          -->
					</td>
				</tr>
				{{if (FTTicketList!=null && FTTicketList.length>0)}}
				<tr>
				    <td colspan="${NowFTScoreMap.HE-NowFTScoreMap.HS+2}">
						<div class="scoremapList">
							{{each FTTicketList}}
							<div class="BetInfo" {{if $value.Off==0}}onClick="fFrame.topFrame.g_SMF.BetProcess(this,event,'${$value.OddsId}','${$value.BetTeam}','${$value.Odds}','${$value.Stake}');" style="cursor:pointer;"{{/if}}>
								<div class="TextStyle01 left{{if $value.Off==1}} linethrough{{/if}}" >
									<input {{if $value.Enable}}checked{{/if}} {{if $value.Off==1}}disabled{{/if}} onClick="parent.topFrame.g_SMF.setTicketEnable('${$value.OddsId}','${$value.BetTeam}',this.checked);" type="checkbox" style="margin-right:5px;float:left;"/>
										<span style="float:left;">${$value.BetName} -&nbsp;</span>
										<span title="${$value.Choice}" class="{{if $value.Hdp<0 || $value.Bettype !=1 }}FavTeamClass{{else}}UdrDogTeamClass{{/if}} text-ellipsis" style="float:left;max-width: 130px; line-height:16px;">${$value.Choice}</span>
										<span class="TextStyle03" style="float:left;padding-right:5px;">&nbsp;${$value.HdpTxt}<span class="TextStyle01">{{if IsLive}}[${LiveScore.H}-${LiveScore.A}]{{/if}}</span>@</span>										
										<span class="{{if $value.Odds < 0}}FavOddsClassBetProcess{{else}}UdrDogOddsClassBetProcess{{/if}}"  style="{{if $value.oddsChg}}background-color:#ffccbc;{{/if}} float:left;">${$value.Odds}</span>
								</div>
								
								<div class="right">
									<span class="stake{{if $value.Off==1}} linethrough{{/if}}">${$value.Stake}</span>
									<div class="btnIcon" onclick="fFrame.topFrame.g_SMF.removeTicket(${$value.OddsId},'${$value.BetTeam}');"><span class="icon-close"></span></div>
								</div>									
								
							</div>
							{{/each}}
						</div>					
					</td>
				</tr>	
                {{/if}}				
				</tbody>
{{if NowFTScoreMap.Map !=null}}				
				<tbody class="maskSet">
				<tr align="center">
					<th width="78" rowspan="2">Away</th>
					<th colspan="${NowFTScoreMap.HE-NowFTScoreMap.HS+1}" class="even tabthup">Home</th>
				</tr>
				<tr align="center">					  
					  {{each NowFTScoreMap.Map}}<th width="72" class="even">${$index + NowFTScoreMap.HS}</th>{{/each}}
				</tr>
				{{each(a,adata) NowFTScoreMap.Map}}
				<tr align="right">					  
					<th align="center">${a + NowFTScoreMap.AS}</th> 
					
					{{each(h,hdata) NowFTScoreMap.Map[a]}}
					<td class="{{if hdata<0}}FavOddsClass{{else}}UdrDogOddsClass{{/if}}{{if g_SMF.openMark(NowFTScoreMap.HS+h,NowFTScoreMap.AS+a,1)}} maskOn{{/if}}" title="${NowFTScoreMap.HS+h}:${NowFTScoreMap.AS+a}";  bgcolor="${g_SMF.getColor(NowFTScoreMap.HS+h,NowFTScoreMap.AS+a , (IsLive && a + NowFTScoreMap.AS==LiveScore.A && h+NowFTScoreMap.HS==LiveScore.H) , NowFTScoreMap.isWait==2,1)}" onclick="parent.topFrame.g_SMF.ClickMap(${NowFTScoreMap.HS+h},${NowFTScoreMap.AS+a},1);" onmouseover="parent.topFrame.g_SMF.ChkMap(this,${NowFTScoreMap.HS+h},${NowFTScoreMap.AS+a},1);">${addCommas(hdata.toFixed(2))}</td>
					{{/each}}
				</tr>
				{{/each}}
				</tbody>
{{/if}}					
			</table>	
{{/if}}				

{{if ((HTTicketList==null || HTTicketList.length==0) && NowHTScoreMap.Map ==null) &&  ((FTTicketList==null || FTTicketList.length==0) && NowFTScoreMap.Map ==null)}}
<table class="oddsTable info" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="noData">No information is available</td>
</tr>
</tbody>
</table>
{{/if}}
			<span id="noteValue2"><strong>Note</strong> : Forecasts don't include the..</span>
			<div class="iconOdds help" onclick="showScoreMsg();" title="Help">
				<div id="scoremapmsg" class="hint" style="visibility: hidden;">Forecasts don't include the Half Time/Full Time , First Goal/Last Goal , HT/FT Odd/Even , Home To Win Both Halves , Away To Win Both Halves , Home To Win Either Half , Away To Win Either Half , Home To Score Both Halves , Away To Score Both Halves , Penalty Shootout Yes/No , Half Time/Full Time Correct Score , Both Team To Score , 2nd Half Both Team To Score , Highest Scoring Half Home Team , Highest Scoring Half Away Team and Highest Scoring Half tickets.</div>
			</div>        
        </div>
    </div>
</script>
</div>

