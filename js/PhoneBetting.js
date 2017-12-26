var submit=0;
var tmpvalue="";
var Using1x2AsiaHdp = true;
var fFrame= getParent(window);
function getParent(cFrame)
{
	var aFrame = cFrame;
	for (var i = 0; i < 4; i++) {
		if(aFrame.SiteMode != null) {
			return aFrame;
		} else {
			aFrame = aFrame.parent;
		}
	}
	return null;
}

/* Phonebetting underover BetProcess
* check betting rule
 * Params -
 *         frmnm : form name
 */
function formvalidationP(frmnm)
{
    if(document.getElementById("btnBPSubmit_P").disabled) return false;
    CtrlSubmitBtn(true);
    var mf;
    var i;
    var str;
    var found=false,found1=false,login=false;
    var balance,minbet=0,maxbet=0;
    var s_home=false,s_away=false;
    var stake=0,jml=0,plafond=0,bettype;
    var hdp1=0, hdp2=0;

    mf=document.forms[frmnm];

    login=true;
    minbet=parseInt(removeCommas(mf.elements['MINBET_P'].value),10);
    maxbet=parseInt(removeCommas(mf.elements['MAXBET_P'].value),10);
    bettype=parseInt(mf.elements['bettype_P'].value,10);

    // message part
    var lmm, hmm, rusm,rusm1
    rusm = mf.elements['areyousuremesg_P'].value;
    rusm1 = mf.elements['areyousuremesg_P1'].value;
    if(document.getElementById('bettingGraphRemark') != null && document.getElementById('bettingGraphRemark').value != "")
    {
        rusm = "Press Ok to Hedge to Betting Graph";
    }

    stake=Math.round(replaceSubstring(mf.elements['BPstake_P'].value,",",""));

    //get odds value
    var bodds;
    switch(bettype)
    {
        case 28:
            hdp1= mf.elements['bp_hdp1Value_3'].value;
            hdp2= mf.elements['bp_hdp2Value_3'].value;
            bodds=mf.elements['bp_odds3'].value;
            if (isNaN(mf.elements['bp_hdp1Value_3']) && isNaN(mf.elements['bp_hdp2Value_3']))
            {
                if (hdp1 >0 && hdp2 >0)
                {
                    alert("Error: Both Hdp has Value");
                    CtrlSubmitBtn(false);
                    return false;
                }
                
                if (hdp1 != 0)
                {
                    if (hdp2 != 0)
                    {
                        alert("Error: HDP2 must be zero !"); 
                        CtrlSubmitBtn(false);
                        mf.elements['bp_hdp2Value_3'].select();   
                        return false;
                    }
                    var Remainder1;
                    Remainder1 = hdp1 % 1;
                    if(Remainder1 != 0) 
                    {
                        alert("Error: Please enter a multiple of 1 in hdp input box."); 
                        CtrlSubmitBtn(false);
                        mf.elements['bp_hdp1Value_3'].select();   
                        return false;
                    }
                }
                
                if (hdp2 != 0)
                {
                    if (hdp1 != 0)
                    {
                        alert("Error: HDP1 must be zero !"); 
                        CtrlSubmitBtn(false);
                        mf.elements['bp_hdp1Value_3'].select();   
                        return false;
                    }
                    var Remainder2;
                    Remainder2 = hdp2 % 1;
                    if(Remainder2 != 0) 
                    {
                        alert("Error: Please enter a multiple of 1 in hdp input box."); 
                        CtrlSubmitBtn(false);
                        mf.elements['bp_hdp2Value_3'].select();   
                        return false;
                    }
                }

            }
            break;
        case 1:
        case 7:
            hdp1= mf.elements['bp_hdp1Value_3'].value;
            hdp2= mf.elements['bp_hdp2Value_3'].value;
            bodds=mf.elements['bp_odds3'].value;
            if (isNaN(mf.elements['bp_hdp1Value_3']) && isNaN(mf.elements['bp_hdp2Value_3']))
            {
                if (hdp1 >0 && hdp2 >0)
                {
                    alert("Error: Both Hdp has Value");
                    CtrlSubmitBtn(false);
                    return false;
                }
                
                if (hdp1 != 0)
                {
                    var Remainder1;
                    Remainder1 = hdp1 % 0.25;
                    if(Remainder1 != 0) 
                    {
                        alert("Error: Please enter a multiple of 0.25 in hdp input box."); 
                        CtrlSubmitBtn(false);
                        mf.elements['bp_hdp1Value_3'].select();   
                        return false;
                    }
                }
                
                if (hdp2 != 0)
                {
                    var Remainder2;
                    Remainder2 = hdp2 % 0.25;
                    if(Remainder2 != 0) 
                    {
                        alert("Error: Please enter a multiple of 0.25 in hdp input box."); 
                        CtrlSubmitBtn(false);
                        mf.elements['bp_hdp2Value_3'].select();   
                        return false;
                    }
                }

            }
            break;
        case 3:
        case 8:
            hdp1= mf.elements['bp_hdp1Value_2'].value;
            hdp2= mf.elements['bp_hdp2Value_2'].value;
            bodds=mf.elements['bp_odds2'].value;
            if (isNaN(mf.elements['bp_hdp1Value_2']) && isNaN(mf.elements['bp_hdp2Value_2']))
            {
                if (hdp1 >0 && hdp2 >0)
                {
                    alert("Error: Both Hdp has Value");
                    CtrlSubmitBtn(false);
                    return false;
                }
                
                if (hdp1 != 0)
                {
                    var Remainder3;
                    Remainder3 = hdp1 % 0.25;
                    if(Remainder3 != 0) 
                    {
                        alert("Error: Please enter a multiple of 0.25 in hdp input box."); 
                        CtrlSubmitBtn(false);
                        mf.elements['bp_hdp1Value_2'].select();   
                        return false;
                    }
                }
                   
            }
            break;
        default:
            hdp1= mf.elements['bp_hdp1Value_1'].value;
            hdp2= mf.elements['bp_hdp2Value_1'].value;
            bodds=mf.elements['bp_odds1'].value;
            if (isNaN(mf.elements['bp_hdp1Value_1']) && isNaN(mf.elements['bp_hdp2Value_1']))
            {
                if (hdp1 >0 && hdp2 >0)
                {
                    alert("Error: Both Hdp has Value");
                    CtrlSubmitBtn(false);
                    return false;
                }
            }
            break;
    }
          
    if (isNaN((replaceSubstring(mf.elements['BPstake_P'].value,",",""))) || replaceSubstring(mf.elements['BPstake_P'].value.trim(),",","") == "")
	{
        alert("Incorrect stake.");
        mf.elements['BPstake_P'].value='';
        mf.elements['BPstake_P'].focus();

        document.getElementById('payOut_P').innerHTML = '';
        CtrlSubmitBtn(false);
        return false;
	}

    if (isNaN(mf.elements['BPstake_P']))
    {
        if (stake<=0)
        {
            switch(bettype)
            {
                case 4:     //correct score
                case 5:     //1x2
                case 6:     //total goal
                case 10:    //outright
                case 14:    //first goal / last goal 
                case 15:    //1x2
                case 16:    //ht / ft
                case 24:    //Double chance
                case 25:    //Draw No Bet
                case 27:    //To win to nil
                case 26:    //Both/One/Neither team to score
                case 13:    //Clean Sheet
                case 28:    //3-Way Handicap
                case 121:   //Home No Bet
                case 122:   //Away No Bet
                case 123:   //Draw / No Draw
                   if (stake==0)
                    {
                        alert('Stake must be greater than zero !');
                        mf.elements['BPstake_P'].value='';
                        mf.elements['BPstake_P'].focus();

                        document.getElementById('payOut_P').innerHTML = '';
                        CtrlSubmitBtn(false);
                        return false;
                    }
                    break;
                default:
                    alert('Stake must be greater than zero !');
                    mf.elements['BPstake_P'].value='';
                    mf.elements['BPstake_P'].focus();

                    document.getElementById('payOut_P').innerHTML = '';
                    CtrlSubmitBtn(false);
                    return false;
                    break;
            }          
        }     
    }

    var confirmMsg = rusm;
	if (confirmMode == "1" ) {
	    confirmMsg = rusm1;
	}
	if (confirm(confirmMsg))	
    {
        CtrlSubmitBtn(true);
        //mf.action='underover/confirm_bet_data.aspx';
    } 
    else
    {
        mf.elements['BPstake_P'].value='';
        CtrlSubmitBtn(false);
        return false;
    }

	mf.username.value = fFrame.UserName;
}

/* phonebetting outright BetProcess
* check outright betting rule
 * Params -
 *         frmnm : form name
 */
function formvalidation_OTP(frmnm)
{
    if(document.getElementById("btnBPSubmit_P").disabled) return false;
	document.getElementById("btnBPSubmit_P").disabled = true;
    var mf;
    var i;
    var str;
    var found=false,found1=false,login=false;
    var balance,minbet=0,maxbet=0;
    var s_home=false,s_away=false;
    var stake=0,jml=0, bettype;
    var hdp1=0, hdp2=0;

    mf=document.forms[frmnm];

    login=true;
    minbet=parseInt(removeCommas(mf.elements['MINBET_P'].value),10);
    maxbet=parseInt(removeCommas(mf.elements['MAXBET_P'].value),10);
    bettype=parseInt(mf.elements['ot_p_hidBettype'].value,10);

    var lmm, hmm, rusm, bcm
    lmm = mf.elements['lowerminmesg_P'].value;
    hmm = mf.elements['highermaxmesg_P'].value;
    rusm = mf.elements['areyousuremesg_P'].value;
    stake=Math.round(replaceSubstring(mf.elements['BPstake_P'].value,",",""));
    hdp1= mf.elements['ot_hdp1Value'].value;
    hdp2= mf.elements['ot_hdp2Value'].value;


    if (isNaN((replaceSubstring(mf.elements['BPstake_P'].value,",",""))) || replaceSubstring(mf.elements['BPstake_P'].value.trim(),",","") == "")
    {
        alert("Incorrect stake.");
        mf.elements['BPstake_P'].value='';
        mf.elements['BPstake_P'].focus();

        document.getElementById('payOut_P').innerHTML = '';
        CtrlSubmitBtn(false);
        //document.getElementById("btnOTPSubmit").disabled = false;
        return false;
    }

    if (isNaN(mf.elements['ot_hdp1Value']) && isNaN(mf.elements['ot_hdp2Value']))
	{
	    if (hdp1 >0 && hdp2 >0)
	    {
	        alert("Error: Both Hdp has Value");
	        CtrlSubmitBtn(false);
	        //document.getElementById("btnOTPSubmit").disabled = false;
    	    return false;
	    }
	}

    if (stake<=0 && bettype!=10)
    {
        alert('Stake must be greater than zero !');
        mf.elements['BPstake_P'].value='';
        mf.elements['BPstake_P'].focus();

        document.getElementById('payOut_P').innerHTML = '';
        //document.getElementById("btnOTPSubmit").disabled = false;
        return false;
    } 
    if (stake==0 && bettype==10)
    {
        alert('Stake can NOT be zero !');
        mf.elements['BPstake_P'].value='';
        mf.elements['BPstake_P'].focus();
        document.getElementById('payOut_P').innerHTML = '';
        document.getElementById("btnBPSubmit_P").disabled = false;
        return false;
    } 

    if (confirm(rusm))
    {
        //mf.action='outright/confirm_bet_data.aspx';
        document.getElementById("btnBPSubmit_P").disabled = true;
    }
    else
    {
        mf.elements['BPstake_P'].value='';
        submit=0;
        document.getElementById("btnBPSubmit_P").disabled = false;
        return false;
    }
    
}

/* Mix Parlaly betprocess input checke
* check Mix Parlaly betprocess input culumn
 * Params -
 *         obj : html Element
 */
function getTmepValue(obj)
{
	tmpvalue=obj.value;
}

function ParlayOutValue(fld,fldRowId,hdp1,hdp2,obj)
{
	document.ParlayBetForm.count.value=document.getElementById(fldRowId).value;
	var count=document.ParlayBetForm.count.value;
	//alert('count='+count);
	//alert(document.getElementById("MatchID"+count).value);
	
	document.ParlayBetForm.MId.value=document.getElementById("MatchID"+count).value;
	document.ParlayBetForm.OddsId.value=document.getElementById("OddsID"+count).value;
	document.ParlayBetForm.Odds.value=document.getElementById("Odds"+count).value;
	document.ParlayBetForm.Team.value=document.getElementById("Team"+count).value;

		if(fld=='odds')
		{
			if(hdp1!=''){
				document.ParlayBetForm.hdp1.value=document.getElementById(hdp1).value;
			}
			if(hdp2!=''){
				document.ParlayBetForm.hdp2.value=document.getElementById(hdp2).value;
			}
			document.ParlayBetForm.Odds.value=obj.value;
			document.ParlayBetForm.del.value = "";		
			document.ParlayBetForm.updatevalue.value = "yes";
			if(tmpvalue != obj.value)
			{	
				document.ParlayBetForm.submit();
			}
			return;
			
		}
		if(tmpvalue != obj.value)
		{	
			if(fld=='hdp1')
			{
				document.ParlayBetForm.hdp1.value=obj.value;
				document.ParlayBetForm.hdp2.value="";
			}else if(fld == 'hdp2'){
				document.ParlayBetForm.hdp2.value=obj.value;
				document.ParlayBetForm.hdp1.value="";
			}			
		document.ParlayBetForm.del.value = "";		
		//document.ParlayBetForm.updatStatus.value = "updValues";	
		document.ParlayBetForm.updatevalue.value = "yes";
		document.ParlayBetForm.submit();	
			
		}
		//alert('hdp1='+document.ParlayBetForm.hdp1.value +' \t hdp2='+document.ParlayBetForm.hdp2.value);
	
	
	//document.ParlayBetForm.submit();
}

function CtrlSubmitBtn(value) {
    var cbObj = document.getElementById("cb1X2AsiaHdp");
    if (cbObj != null && cbObj.checked == true) {
        var btnObj=document.getElementById("btnBPSubmit_P1");
        if (btnObj!=null)
        {
            btnObj.disabled = value;
        }
    }
    else 
        document.getElementById("btnBPSubmit_P").disabled = value;
    if (cbObj != null && value == false) cbObj.checked = false;
}
