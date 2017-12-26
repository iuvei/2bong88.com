var  BetslipPath='underover/';
var IsEuro=true;
function InitBetslip(isEuro)
{
    IsEuro=isEuro;
    if(!IsEuro)
    {
        BetslipPath='EuroSite/underover/';
    }
}

function checkStakeValue(obj, e, selster)
{
   var bValidate = validateOnKPForSingle(obj, e, selster);
   
   if(bValidate) {
     UpdateSingleBetStake(obj.id,obj.value) ;   
   }else
   {
     obj.value=removeCommas(obj.value);
     $("#"+Key).val(addCommas_euro(obj.value));
   }
   
   return bValidate;
}

function validateOnKPForSingleKeyUP(fld, e, selster) 
{
    var keyCode = (document.all) ? e.keyCode : e.which;
	
	//判斷當有輸入資料且選擇開始的位置是最開頭 就不准輸入0
	if(fld.value.length>0 && selster==0)
	{
	    if(keyCode==48) return false;
	}
	
    //Permit Enter and BackSpace
    if (keyCode == 8 || keyCode == 13) return true;    

    //Escape Prefix 0
   	if (/^$/.test(removeCommas(fld.value)) && /0/.test(String.fromCharCode(keyCode))) return false;

    //Escape NaN Number
    if (/[^0-9]/.test(String.fromCharCode(keyCode))) return false;
    return true ;
}

function validateOnKPForSingle(fld, e, selster) 
{    
    var ren = validateOnKPForSingleKeyUP(fld, e, selster);
    var keyCode = (document.all) ? e.keyCode : e.which;
    if(ren)
    {
            if (keyCode == 13 )//&&  fld.id =="txtSingleEachWay" )// $("input[id$='_SingleStake']").length>0)
            {
                if(fld.id =="txtSingleEachWay")
                {
                   UpdateEachStake();
                }else{
                   if(fld.value == '') return ren;                   
                   UpdateSingleBetStake(fld.id,fld.value);
                }       
                
                SingleBetPlaceBet();
                ren = true;
             }
    }
    return ren;
}



function addCommas_euro(strValue) {
    var objRegExp  = new RegExp('(-?[0-9]+)([0-9]{3})');
    while(objRegExp.test(strValue)) {
        strValue = strValue.replace(objRegExp, '$1,$2');
    }
    return strValue;
}

function removeCommas(strValue) {
    var objRegExp = /,/g;
    return strValue.replace(objRegExp, '');
}

function UpdatePayOutTotalStake(obj , bValidate)
{
    UpdatePayOut(obj , bValidate);
    UpdateTotalStake(bValidate);
}

function UpdatePayOut(obj , bValidate)
{
  //if(!bValidate) return ;
  var Key = obj.id.replace('SingleStake','');
  var stake =  removeCommas(obj.value);
  obj.value = (addCommas_euro(stake.toString()));  
  if($("#"+Key+"ibettype") == null) return ;
  var ibettype = $("#"+Key+"ibettype").val();
  var odds = $("#"+Key+"oddsvalue").val();
  var OddsType = $("#"+Key+"oddsType").val();
  var Payout = 0;
   
  var pairOdds ="'1', '2', '3', '7', '8', '12', '20' ,'81','82','83','84','85','86','87','88','89'";
   
  if (pairOdds.indexOf("'"+ibettype+"'") > -1)
  {
      if (OddsType == "5")
      {
          Payout = stake * (1 + Math.abs(odds / 100));
      }
      else
      {
           if(OddsType != "1")
               Payout = stake * (1 + Math.abs(odds));
           else
              Payout = stake * Math.abs(odds);
      }
  } else
  {
      Payout = stake * Math.abs(odds);
  }
  
  var payoutKey=Key +'Payout';

  $("#"+payoutKey).html(addCommas_euro(Payout.toFixed(2).toString()));
  
  return Payout;
   
   
}


// Set Each Way value to all single bet stake
function SetSingleBetEachWay(fld, e, selster)
{
   //if(!validateOnKP(fld, e, selster)) return ;
   var eachway = fld.value;
   eachway=removeCommas(eachway);
   eachway=addCommas_euro(eachway);
   fld.value = eachway;
   
   $("input[id$='_SingleStake']").each(function(){
          
          
       $(this).val(eachway);   
       UpdatePayOut(this,true);

   })
   UpdateTotalStake(true);
   
   
/*
    var eachway =$("#txtSingleEachWay").val();
    eachway=removeCommas(eachway);
    var elementCount = $("#divSingleTickets").find("input").length;
    for(var i=elementCount-3;i>-1;i--)
    {
		$("#divSingleTickets").find("input:eq("+i+")").val(eachway);
         
		 UpdateSingleBetStake($("#divSingleTickets").find("input:eq("+i+")").attr('id'),eachway,validateOnKP(fld, e, selster));

    }
	eachway=addCommas_euro(eachway);
    $("#txtSingleEachWay").val(eachway);
    */
 }

//Get Betslip
function GetBetslip()
{

  $.ajax
  (
    {
        type: 'post',
        url: BetslipPath+'GetBetslip.aspx',
        data:{},
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        error: function(err) 
        {
            alert('Request error '+err);
        },
        success: function(result) 
        {
            if(result!='')
            {
                $('#Betslip').html(result);
                OpenMask();
                updateMultiTitle();
            }
        }
    }
  );
}

//Get Single Bet Confirm Bet 
function GetSingleBetConfirmBet()
{
    $('#SingleBetConfirm').attr("disabled",true); 

    var elementCount = $("#divSingleTickets").find("input").length;
    //alert(elementCount);
    for(i=0;i<elementCount-2;i++)
    {
         var Key='';
         var Stake=0;
		if( $("#divSingleTickets").find("input:eq("+i+")").val()!='');
        {
			Key= $("#divSingleTickets").find("input:eq("+i+")").attr('id');
			Stake= $("#divSingleTickets").find("input:eq("+i+")").val();
        }
        UpdateSingleBetStake(Key,Stake);
    }
    
  $.ajax
  (
    {
        type: 'post',
        url: 'underover/GetConfirmBet.aspx',
        data:{CurrentTab:1}, 
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        complete: function(){ $('#SingleBetConfirm').attr("disabled",false); },
        error: function(err) 
        {
            alert('Request error '+err);
        },
        success: function(result) 
        {
            if(result!='')
            {
                $('#Betslip').html(result);
                OpenMask();
            }
        }
    }
  );
}

//Get Mix Parlay Confirm Bet 
function GetMixParlayConfirmBet()
{
   $('#MixParlayConfirmBet').attr("disabled",true); 
   UpdateMixParlayStake($("#txtParlayStake").val(), $("#ckKeepOdds:checked").val());

  $.ajax
  (
    {
        type: 'post',
        url: 'underover/GetConfirmBet.aspx',
        data:{CurrentTab:2}, 
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        error: function(err) 
        {
            alert('Request error '+err);
        },
        complete: function(){ $('#MixParlayConfirmBet').attr("disabled",false); },
        success: function(result) 
        {
            if(result!='')
            {
                $('#Betslip').html(result);
                OpenMask();
            }
        }
    }
  );
}
//Single Bet Place Bet
function SingleBetPlaceBet()
{
   var rusm = document.getElementById('areyousuremesg').value;      
   if(!confirm(rusm)) return ;

   $('#btnSingleBetPlaceBet').attr("disabled",true); 
    var obj=document.getElementById('btnSingleBetPlaceBet');
    obj.href='JavaScript:';
    obj.className='disabled';
    
    
    
    
  $.ajax
  (
    {
        type: 'post',
        url: BetslipPath+'SingleBetPlaceBet.aspx',
        data:{},
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        //complete: function(){ $('#btnSingleBetPlaceBet').attr("disabled",false); },
        error: function(err) 
        {
            var obj=document.getElementById('btnSingleBetPlaceBet');
            alert('Request error '+err);
            
        },
        success: function(result) 
        {
            if(result!='')
            {
                refreshAccountInfo('mini');
                $('#Betslip').html(result);
                if(IsEuro)
                {
                    ShowBetListMini();
                }
                OpenMask();
                
               
            }
            updateMultiTitle(); 
        }
    }
  );
  obj.href='JavaScript:SingleBetPlaceBet();';
  obj.className='button';

}
//Mix Parlay Place Bet
function MixParlayPlaceBet()
{
    $('#btnMixParlayPlaceBet').attr("disabled",true); 
    var obj=document.getElementById('btnMixParlayPlaceBet');
    obj.href='JavaScript:';
    obj.className='disabled';

  $.ajax
  (
    {
        type: 'post',
        url: 'mixcom/MixParlayPlaceBet.aspx',
        data:{},
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        complete: function(){ $('#btnMixParlayPlaceBet').attr("disabled",false); },
        error: function(err) 
        {
            alert('Request error '+err);
        },
        success: function(result) 
        {
            if(result!='')
            {
                $('#Betslip').html(result);
                ShowBetListMini();
                OpenMask();
            }
        }
    }
  );
  obj.href='JavaScript:MixParlayPlaceBet();';
  obj.className='button';

}

// Add Outright Bet Ticket
function AddOutrightBetTicket(Params)
{
  if(!RES_Open_Multi) return ;
  $.ajax
  (
    {
        type: 'post',
        url: BetslipPath+'AddOutrightBetTicket.aspx',
        data:{Params:Params}, 
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        error: function(err) 
        {
            alert('Request error '+err);
        },
        success: function(result) 
        {
            if(result!='')
            {
                $('#Betslip').html(result);
                OpenMask();
                updateMultiTitle();
                FocusInputBox();

            }
        }
    }
  );
}

//Add Horse Racing Ticket
function AddHorseTicket(Orid,ProgramID,RaceNum,Runner,BetType,SportType,PoolType)
{

  if(!RES_Open_Multi) return ;
  $.ajax
  (
    {
        type: 'post',
        url: BetslipPath+'AddHorseBetTicket.aspx',
        data: { OddsID: Orid, ProgramID: ProgramID, RaceNum: RaceNum, Runner: Runner, BType: BetType, SportType: SportType, PoolType: PoolType}, 
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        error: function(err) 
        {
            alert('Request error '+err);
        },
        success: function(result) 
        {
            if(result!='')
            {
                $('#Betslip').html(result);
                OpenMask();
                updateMultiTitle();
                FocusInputBox();

            }
        }
    }
  );
}
function FocusInputBox()
{
        /*var elementCount=0;
        if(IsEuro)
        {
            if($("#divSingleTickets").attr("display") != "none")
            { 
                elementCount=$("#divSingleTickets").find("input").length;
                $("#divSingleTickets").find("input:eq("+(elementCount-3)+")").focus();
            }
            if($("#divParlayTickets").attr("display") != "none")
            { 
                $("#divParlayTickets").find("input:eq(0)").focus();
            }
        }
        else
        {*/
        //alert(document.getElementById('div_AlertBox').style.display);

        if(!navigator.userAgent.match(/iPad/i))
{
        if(document.getElementById("txtSingleEachWay") != null)
        {
          setTimeout(function() { try{  if((document.getElementById('txtSingleEachWay').clientWidth > 0||document.getElementById('txtSingleEachWay').clientHeight > 0) && document.getElementById('div_AlertBox').style.display =='none') document.getElementById('txtSingleEachWay').focus(); }catch(e){} } ,  600);
           
        }
}
            // $("#txtSingleEachWay").focus();
        //}
}
// Add  Bet Ticket
function AddBetTicket(OddsID,BTeam,Odds,IsBingo)
{
  if(!RES_Open_Multi) return ;
  
  var bp_keyValue = '' ;
  
  if(eObj!=null)
  {
      if(IsBingo)
      {
         bp_keyValue=eObj.GetKey("bbet");
      }else{
         bp_keyValue=eObj.GetKey("bet");
      }
  }
  

  
  $.ajax
  (
    {
        type: 'post',
        url: BetslipPath+'AddBetTicket.aspx',
        data:{OddsID:OddsID,BTeam:BTeam,Odds:Odds,bp_key:bp_keyValue}, 
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        error: function(err) 
        {
            alert('Request error '+err);
        },
        success: function(result) 
        {
            if(result!='')
            {
                
                $('#Betslip').html(result);
                OpenMask();                
                updateMultiTitle();
                FocusInputBox();
               
            }
        }
    }
  );
}

var OrgMultiTitle="";
function updateMultiTitle()
{
   if(OrgMultiTitle=="") OrgMultiTitle =  $('#div_menu_multiple').find("a").html(); //$('#Multi_title_txt').html();
   
  
   
   
   var elementCount = $("#divSingleSelectionTicket").find(".BetInfo").length
   
  
   if(elementCount>0){
      $('#div_menu_multiple').find("a").html(OrgMultiTitle+"("+ elementCount+")");
      

      
   }else{
       $('#div_menu_multiple').find("a").html(OrgMultiTitle);
   }
   
   if($("input[id$='_SingleStake']").length>0)
   {
       $("#btnSingleBetPlaceBet").attr("disabled", false);
   }else{
       $("#btnSingleBetPlaceBet").attr("disabled", true);
   }
   
}


// Add  Spondemo Bet Ticket
function flashDoJob()
{
  $.ajax
  (
    {
        type: 'post',
        url: 'underover/AddBetTicket.aspx',
        data:{KK:"1"}, 
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        error: function(err) 
        {
            alert('Request error '+err);
        },
        success: function(result) 
        {
            if(result!='')
            {
                
                $('#Betslip').html(result);
                OpenMask();
                FocusInputBox();
            }
        }
    }
  );
}
// Remove  Ticket By Key
function RemoveTicketByKey(Key)
{
  $('#div_Betslip_Mask').show();
  OpenMask();
  $.ajax
  (
    {
        type: 'post',
        url: BetslipPath+'RemoveBetTicket.aspx',
        data:{RT:1,Key:Key}, 
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        error: function(err) 
        {
            alert('Request error '+err);
            $('#div_Betslip_Mask').hide();
        },
        success: function(result) 
        {
            if(result!='')
            {
                $('#Betslip').html(result);
                OpenMask();
                updateMultiTitle();
                FocusInputBox();
            }
        }
    }
  );
}

// Remove All Ticket
function RemoveAllTicket()
{
  $('#div_Betslip_Mask').show();
  OpenMask();
  $.ajax
  (
    {
        type: 'get',
        url: BetslipPath+'RemoveBetTicket.aspx',
        data:{RT:2}, 
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        asyncBoolean:false,
        error: function(err) 
        {
            alert('Request error '+err);
            $('#div_Betslip_Mask').hide();
        },
        success: function(result) 
        {
            if(result!='')
            {
                $('#Betslip').html(result);
                OpenMask();
                updateMultiTitle();
            }
        }
    }
  );
}


function UpdateEachStake()
{
   var KeyCollection="";
   var StakeCollection = "";
   $("input[id$='_SingleStake']").each(function(){
       
       //$(this).blur();   
       
       var orgStake = $("#"+this.id.replace('SingleStake','OrgStake')).val();
       var Stake= this.value;
       orgStake = removeCommas(orgStake);
       Stake=removeCommas(Stake);
       if(orgStake!=Stake)
       {
           KeyCollection+=this.id+"|";
           StakeCollection+=(Stake==""?"0":Stake)+"|";       
       }
   });
   if(KeyCollection!="" && StakeCollection!="")
   {
         var successFuc = function(result) 
                {
                
                    if(result.length == 0)
                    {                    
                      alert('UpdateEachStake Error !!');                      
                    }
                    else{
                       $("input[id$='_OrgStake']").each(function()
                       {
                          this.value = removeCommas($("#txtSingleEachWay").val());
                       });
                    }
                };
         var errorFnc = function(err) 
                {
                    alert('Request error '+err);                    
                    return false;
                };               
     
         KeyCollection=KeyCollection.substr(0,KeyCollection.length-1);
         StakeCollection = StakeCollection.substr(0,StakeCollection.length-1);
         AjaxUpdateStake(KeyCollection,StakeCollection,successFuc,errorFnc,false);
   } 
}

function UpdateTotalStake(bValidate)
{
   //if(!bValidate) return ;
   var TotalVal= 0 ; 
   
  
   $("input[id$='_SingleStake']").each(function(){
          
       var singlestake = $(this).val();
       if(singlestake !=='') 
       {
            singlestake = removeCommas(singlestake);
            TotalVal+= parseInt(singlestake);
       }    

   })

   if(TotalVal>0)
   {
   $("#txt_TotalStakes").val(addCommas_euro(TotalVal.toString()));
   }else{
    $("#txt_TotalStakes").val("");
   }
   

}

function AjaxUpdateStake(Key,Stake,successFuc,errorFnc,Async)
{
          $.ajax
          (
            {
                type: 'post',
                url: BetslipPath+'UpdateBetStake.aspx',
                data:{Key:Key,Stake:Stake}, 
                contentType:'application/x-www-form-urlencoded; charset=UTF-8',
                cache: false,
                async:Async,
                error: errorFnc,
                success: successFuc
            }
          ); 
}

//Update SingleBet Stake
function UpdateSingleBetStake(Key,Stake)
{

     var orgStake = $("#"+Key.replace('SingleStake','OrgStake')).val();
     orgStake = removeCommas(orgStake);
     Stake=removeCommas(Stake);
     if(orgStake=="") orgStake="0";
     if(Stake=="") Stake="0";
     if(orgStake!=Stake)
     {
         var successFuc = function(result) 
                {
                    if(result.length > 0)
                    {
                      $("#"+Key.replace('SingleStake','OrgStake')).val(Stake);
                    }else{
                      alert('UpdateSingleBetStake error !!');
                      $("#"+Key).val(addCommas_euro(orgStake));
                    }
                };
         var errorFnc = function(err) 
                {
                    alert('Request error '+err);
                    $("#"+Key).val(addCommas_euro(orgStake));
                    return false;
                };               
     
         
         AjaxUpdateStake(Key,Stake,successFuc,errorFnc,false);
     
     
          /*$.ajax
          (
            {
                type: 'post',
                url: BetslipPath+'UpdateBetStake.aspx',
                data:{Key:Key,Stake:Stake}, 
                contentType:'application/x-www-form-urlencoded; charset=UTF-8',
                cache: false,
                async:false,
                error: function(err) 
                {
                    alert('Request error '+err);
                    $("#"+Key).val(addCommas_euro(orgStake));
                    return false;
                },
                success: function(result) 
                {
                    if(result.length > 0)
                    {
                      $("#"+Key.replace('SingleStake','OrgStake')).val(Stake);
                    }else{
                      alert('UpdateSingleBetStake error !!');
                      $("#"+Key).val(addCommas_euro(orgStake));
                    }
                }
            }
          );*/   
      }     


  /*if(bValidate==null) bValidate=true;
  Stake=removeCommas(Stake);
  if(bValidate)
  {
      var TotalVal=0;
      var payoutKey=Key.replace('SingleStake','Payout');
      $.ajax
      (
        {
            type: 'post',
            url: BetslipPath+'UpdateBetStake.aspx',
            data:{Key:Key,Stake:Stake}, 
            contentType:'application/x-www-form-urlencoded; charset=UTF-8',
            cache: false,
            async:false,
            error: function(err) 
            {
                alert('Request error '+err);
                return false;
            },
            success: function(result) 
            {
                var elementCount = $("#divSingleTickets").find("input").length;
                for(i=0;i<elementCount-2;i++)
                {
                   if( $("#divSingleTickets").find("input:eq("+i+")").val()=='')
                   {
                         TotalVal+=0;
                   }
                   else
                   {
                        var singlestake=$("#divSingleTickets").find("input:eq("+i+")").val();
                        singlestake=removeCommas(singlestake);
                        TotalVal+= parseInt(singlestake);

                   }
                }
                TotalVal=addCommas_euro(TotalVal.toString());
                $("#divSingleTickets").find("input:eq("+(elementCount-1)+")").val(TotalVal);
                //update payout
                if(result!='')
                {
                       $("#"+payoutKey).html(result);
                }
            }
        }
      );    
  }
   $("#"+Key).val(addCommas_euro(Stake));
   */
}
//Update MixParlay Stake
function UpdateMixParlayStake(Stake, ckKeepOdds)
{
  Stake=removeCommas(Stake);

  $.ajax
  (
    {
        type: 'post',
        url: 'underover/UpdateBetStake.aspx',
        data:{Stake:Stake,ckKeepOdds:ckKeepOdds}, 
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        error: function(err) 
        {
            alert('Request error '+err);
           
        },
        success: function(result) 
        {
            var PayOut = 0;
            $("#txtParlayTotalStake").val(addCommas_euro(Stake));
            if(removeCommas(Stake) > 0 && $("#MP_Acc_Odds").val() > 0)
            {
                PayOut = parseFloat(removeCommas(Stake)) * parseFloat($("#MP_Acc_Odds").val());
                $("#MP_PayOut").html(addCommas_euro(PayOut.toFixed(2)));
            }else{
                $("#MP_PayOut").html(0);
            }
        }
    }
  );
  $("#txtParlayStake").val(addCommas(Stake));
}

//Switch Single Bet or Mix Parlay
function SwitchBetslipTab(CurrentTab)
{
  $.ajax
  (
    {
        type: 'post',
        url: 'underover/UpdateBetslipCurrentTab.aspx',
        data:{CurrentTab:CurrentTab}, 
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        error: function(err) 
        {
            alert('Request error '+err);
        },
        success: function(result) 
        {
            var objSingle=document.getElementById('menu_single');
            var objParlay=document.getElementById('menu_parlay');
            var objSingleDiv=document.getElementById('divSingleTickets');
            var objParlayDiv=document.getElementById('divParlayTickets');
            var objSingleNoData=document.getElementById('SingleNoData');
            var objParlayNoData=document.getElementById('ParlayNoData');

            //Click Single Bet
            if (CurrentTab==1)
            {
                objSingle.className='TabOpen';
                objParlay.className='TabClose';
                objSingleDiv.display='';
                objParlayDiv.display='none';
                
                if(objSingleNoData!=null)
                {
                    objSingleNoData.style.display='';
                    objParlayNoData.style.display='none';
                }
                else
                {
                    objSingleDiv.style.display='';
                    objParlayDiv.style.display='none';
                }
                
            }
            //Click Mix Parlay
            else if(CurrentTab==2)
            {
                objSingle.className='TabClose';
                objParlay.className='TabOpen';
                objSingleDiv.display='none';
                objParlayDiv.display='';
                
                if(objParlayNoData!=null)
                {
                    objSingleNoData.style.display='none';
                    objParlayNoData.style.display='';
                }
                else
                {
                    objSingleDiv.style.display='none';
                    objParlayDiv.style.display='';
                }
            }
        }
    }
  );
}

//Click Back Button in ConfirmBet
function ConfirmGoBack()
{
  $.ajax
  (
    {
        type: 'post',
        url: 'underover/GetBetslip.aspx',
        data:{BACK:'B'},
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        error: function(err) 
        {
            alert('Request error '+err);
        },
        success: function(result) 
        {
            if(result!='')
            {
                $('#Betslip').html(result);
                OpenMask();
            }
        }
    }
  );
}

//Open Mask
function OpenMask()
{
	//alert('in OpenMask');
	var objMask= document.getElementById('div_Betslip_Mask');	
	var objSingleTickets=document.getElementById('divSingleTickets');
	var objParlayTickets=document.getElementById('divParlayTickets');
	var objTitle=document.getElementById('div_Title');
	var TicketsHight=0;
	if(objMask)
	{
		  
			if(objSingleTickets && objSingleTickets.style.display=='')
			{
			    TicketsHight=objSingleTickets.offsetHeight;
			}
			else if(objParlayTickets && objParlayTickets.style.display=='')
			{
			    TicketsHight=objParlayTickets.offsetHeight;
			}
			
			if(objMask.style.display=='' && objTitle)
			{  
				//alert('show mask');
			   objMask.style.display = "block";
		
			   var TitleHight=objTitle.offsetHeight;
		
			   //objMask.style.width=objMainDiv.offsetWidth+"px";
			   objMask.style.height=TitleHight+TicketsHight+"px";  
			   
			}
  }
	//alert('out OpenMask');
}

//Close Mask And Alert Box
function CloseMaskAndAlertBox()
{
    //Hide Mask
    var objMask= document.getElementById('div_Betslip_Mask');
    if(objMask!=null)
    {
        objMask.style.display='none';
    }
    //Hide Alert Box
    var objMask= document.getElementById('div_AlertBox');
    objMask.style.display='none';
    FocusInputBox();
}

//Open or Hide Single Bet Ticket Info
function SwitchSingleSelections()
{
    var objSelections=document.getElementById('divSingleSelections');
    var objSelectionTicket=document.getElementById('divSingleSelectionTicket');
    if(objSelectionTicket.style.display=='')
    {
        objSelectionTicket.style.display='none';
        objSelections.className='stakeline_close';
    }
    else
    {
        objSelectionTicket.style.display='';
        objSelections.className='stakeline_open';

    }
}
//Open or Hide MixParlay Ticket Info
function SwitchMixParlaySelections()
{
    var objSelections=document.getElementById('divParlaySelections');
    var objSelectionTicket=document.getElementById('divParlaySelectionTicket');
    if(objSelectionTicket.style.display=='')
    {
        objSelectionTicket.style.display='none';
        objSelections.className='stakeline_close';

    }
    else
    {
        objSelectionTicket.style.display='';
        objSelections.className='stakeline_open';

    }
}

function SwitchMoreInfo(InfoBoxID,MoreInfoID)
{
    var objInfoBox=document.getElementById(InfoBoxID);
    var objMoreInfo=document.getElementById(MoreInfoID);
    if(objInfoBox.style.display=='')
    {
        objInfoBox.style.display='none';
        objMoreInfo.className='infoclose'
    }
    else
    {
        objInfoBox.style.display='';
        objMoreInfo.className='infolink'
    }
}

function BetslipFocus(InCurrent)
{
    var objFocus=document.getElementById('betslipFocus');
    objFocus.value=InCurrent;
}
function CheckBetslipFocus(objFocus)
{
        if(objFocus == 2)
        {
            $('#MixParlayConfirmBet').focus();
        }else{
             $('#SingleBetConfirm').focus();
        }

}

function SwitchBetListMini(hasLive)
{
    if(!hasLive)
    {
         ReloadBetListMini('no','no'); 
    }else{
         ReloadWaitingBetList('no','yes');
    }
}

function ShowBetListMini()
{
  $.ajax
  (
    {
        type: 'post',
        url: 'EuroSite/BetslipToBetlist.aspx',
        data:{},
        contentType:'application/x-www-form-urlencoded; charset=UTF-8',
        cache: false,
        error: function(err) 
        {
            alert('Request error '+err);
        },
        success: function(result) 
        {
            if(result!='')
            {
                SwitchBetListType(result);             
               
            }
        }
    }
  );
}