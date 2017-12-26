var submit = 0;
var fFrame = getParent(window);

function getParent(b) {
    var a = b;
    for (var c = 0; c < 4; c++) {
        if (a.SiteMode != null) {
            return a
        } else {
            a = a.parent
        }
    }
    return null
}

function formvalidation_OT(f) {
    if (document.getElementById("BetProcessContainer").style.display == "none" && document.getElementById("Betslip").style.display == "none") {
        return false
    }
    if (document.getElementById("btnBPSubmit").disabled) {
        return false
    }
    document.getElementById("btnBPSubmit").disabled = true;
    var n;
    var h;
    var v;
    var d = false,
        e = false,
        l = false;
    var a, o = 0,
        m = 0;
    var t = false,
        s = false;
    var u = 0,
        j = 0,
        p = 0;
    n = document.forms[f];
    l = true;
    o = parseInt(removeCommas(n.elements.MINBET.value), 10);
    m = parseInt(removeCommas(n.elements.MAXBET.value), 10);
    var k, g, q, b, r;
    k = n.elements.lowerminmesg.value;
    g = n.elements.highermaxmesg.value;
    q = n.elements.areyousuremesg.value;
    r = n.elements.areyousuremesg1.value;
    b = n.elements.betconfirmmesg.value;
    u = Math.round(replaceSubstring(n.elements.BPstake.value, ",", ""));
    if (isNaN((replaceSubstring(n.elements.BPstake.value, ",", "")))) {
        alert("Incorrect stake.");
        n.elements.BPstake.value = "";
        n.elements.BPstake.focus();
        document.getElementById("payOut").innerHTML = "";
        document.getElementById("btnBPSubmit").disabled = false;
        return false
    }
    if (u < 0) {
        alert("Stake must be greater than zero !");
        n.elements.BPstake.value = "";
        n.elements.BPstake.focus();
        document.getElementById("payOut").innerHTML = "";
        document.getElementById("btnBPSubmit").disabled = false;
        return false
    }
    if (u < o) {
        alert(k);
        n.elements.BPstake.value = o;
        n.elements.BPstake.focus();
        document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), o, false);
        document.getElementById("btnBPSubmit").disabled = false;
        return false
    }
    if (u > m) {
        alert(g);
        n.elements.BPstake.value = m;
        n.elements.BPstake.focus();
        document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), m, false);
        document.getElementById("btnBPSubmit").disabled = false;
        return false
    }
    var c = q;
    if (confirmMode == "1") {
        c = r
    }
    if (confirm(c)) {
        document.getElementById("btnBPSubmit").disabled = true
    } else {
        n.elements.BPstake.value = "";
        submit = 0;
        document.getElementById("btnBPSubmit").disabled = false;
        return false
    }
    n.username.value = fFrame.UserName;
    return true
}

function DoOutrightBetProcess(a) {
    tmp_obj = null;
    DropTimeoutHandlers();
    if (fFrame.SiteMode == "1") {
        document.getElementById("otpbp_Match").value = a;
        document.fomBetProcess_Data_OTP.submit()
    } else {
        if (fFrame.SiteMode == "0") {
            CloseMiniGame()
        }
        DoLeftMenuDisplay();
        document.getElementById("KeepOdds").innerHTML = "";
        document.getElementById("otbp_Match").value = a;
        document.getElementById("sporttype").value = fFrame.LastSelectedSport;
        document.fomBetProcess_Data_OT.action = "index.php?r=site/BetProcessDataOutRight";
        document.fomBetProcess_Data_OT.submit();
        CtrlSubmitBtnDisabled(true)
    }
}

function SetOutrightBetProcessData(a) {
    selBetMode = "OT";
    if (document.getElementById("cbAutoAccept") != null) {
        document.getElementById("cbAutoAccept").checked = false
    }
    if (document.getElementById("divAutoAccept") != null) {
        document.getElementById("btnAutoAccept").style.display = "none";
        document.getElementById("divAutoAccept").style.display = "none"
    }
    if (document.getElementById("BP_RACE") != null) {
        document.getElementById("BP_RACE").style.display = "none"
    }
    if (document.getElementById("BP_SPORT") != null) {
        document.getElementById("BP_SPORT").style.display = ""
    }
    if (document.getElementById("BetInfo") != null) {
        document.getElementById("BetInfo").className = "BetInfo"
    }
    if (document.getElementById("trlPayOut") != null) {
        document.getElementById("trlPayOut").style.display = ""
    }
    $("#scoremap").unbind("click");
    $("#scoremap").hide();
    var c;
    var b = false;
    DropTimeoutHandlers();
    if (fFrame.SiteMode == "1") {
        ChangeDisplayMode("betOP");
        b = true
    } else {
        ChangeDisplayMode("betO")
    }
    document.getElementById("trOddsInfo").style.display = "";
    if (b) {
        var e = document.getElementById("tr1X2AsiaHdp");
        if (e != null) {
            e.style.display = "none";
            document.getElementById("cb1X2AsiaHdp").checked = false
        }
        document.getElementById("BetProcessPhoneData").style.display = "none";
        document.getElementById("BetProcessPhoneDataOT").style.display = "";
        document.getElementById("spBetKind_P").style.display = "none";
        document.getElementById("spChoiceClass_P").style.display = "none";
        document.getElementById("PhoneBetKind").style.display = "none";
        document.getElementById("phoneOutright").style.display = "";
        c = document.getElementById("BPstake_P");
        if (document.all) {
            c.onKeyDown = function() {
                validateOnKD(this, event)
            };
            c.onkeyup = function() {
                payOutOnKUOT(this, event)
            }
        } else {
            c.setAttribute("onkeyup", "payOutOnKUOT(this, event)");
            c.setAttribute("onKeyDown", "validateOnKD(this, event)")
        }
        c = document.forms.fomConfirmBetPhone;
        if (document.all) {
            c.onsubmit = function() {
                return formvalidation_OTP("fomConfirmBetPhone")
            }
        } else {
            c.setAttribute("onsubmit", "return formvalidation_OTP('fomConfirmBetPhone')")
        }
    } else {
        document.getElementById("tr_StakeMultiples").style.display = "none";
        document.getElementById("menuTitle").style.display = "none";
        document.getElementById("menuTitleOT").style.display = "";
        c = document.getElementById("tdBetKind");
        c.setAttribute("height", "=0");
        document.getElementById("divKeepBetProcess").style.display = "none";
        document.getElementById("divAcceptBetterOdds").style.display = "none";
        document.getElementById("ot_dvChoiceValue").style.display = "";
        document.getElementById("spHome_id").style.display = "none";
        document.getElementById("spAway_id").style.display = "none";
        document.getElementById("ot_dvChoiceValue_id").style.display = "none";
        document.getElementById("imgHorseJockey").style.display = "none";
        if (document.getElementById("trHorseTotoKeep") != null) {
            document.getElementById("trHorseTotoKeep").style.display = "none"
        }
        c = document.getElementById("BPstake");
        if (document.all) {
            c.onkeyup = function() {
                payOutOnKUOT(this, event)
            }
        } else {
            c.setAttribute("onkeyup", "payOutOnKUOT(this, event)")
        }
    }
    document.getElementById("trOddsHorseFixedInfo").style.display = "none";
    if (b) {
        c = document.getElementById("tdLiveBgColor_P")
    } else {
        c = document.getElementById("tdLiveBgColor")
    }
    c.className = "bet";
    c.bgColor = "#FFFFFF";
    if (b) {
        c = document.getElementById("PhoneBetKind");
        c.setAttribute("height", "=0")
    }
    if (b) {
        c = document.getElementById("ot_p_spChoiceValue")
    } else {
        c = document.getElementById("spChoiceClass");
        c.className = "FavTeamClass"
    }
    c.innerHTML = a.lblChoiceValue;
    if (b) {
        c = document.getElementById("ot_hdp1Value");
        c.value = a.hdp1Value;
        c = document.getElementById("ot_hdp2Value");
        c.value = a.hdp2Value
    }
    if (b) {
        c = document.getElementById("odds");
        c.value = a.lblOddsValue;
        c.className = a.lblOddsColor
    } else {
        c = document.getElementById("bodds");
        c.innerHTML = a.lblOddsValue;
        c.className = a.lblOddsColor
    }
    if (b) {
        c = document.getElementById("oddsRequest_P")
    } else {
        c = document.getElementById("oddsRequest")
    }
    c.value = a.hiddenOddsRequest;
    if (b) {
        c = document.getElementById("spHome_P");
        document.getElementById("spAway_P").style.display = "none"
    } else {
        c = document.getElementById("ot_dvChoiceValue")
    }
    c.innerHTML = a.lblChoiceValue;
    if (b) {
        c = document.getElementById("spLeaguename_P")
    } else {
        c = document.getElementById("spLeaguename")
    }
    c.innerHTML = a.lblLeaguename;
    if (b) {
        c = document.getElementById("spMinBetValue_P")
    } else {
        c = document.getElementById("spMinBetValue")
    }
    c.innerHTML = a.lblMinBetValue;
    if (b) {
        c = document.getElementById("spMaxBetValue_P")
    } else {
        c = document.getElementById("spMaxBetValue")
    }
    c.innerHTML = a.lblMaxBetValue;
    if (b) {
        c = document.getElementById("MINBET_P")
    } else {
        c = document.getElementById("MINBET")
    }
    c.value = a.hiddenMinBet;
    if (b) {
        c = document.getElementById("MAXBET_P")
    } else {
        c = document.getElementById("MAXBET")
    }
    c.value = a.hiddenMaxBet;
    if (b) {
        c = document.getElementById("stakeRequest_P");
        c.value = ""
    } else {
        c = document.getElementById("stakeRequest");
        c.value = a.hiddenStakeRequest;
        if (a.hiddenStakeRequest != "") {
            document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(a.hiddenOddsRequest), removeCommas(a.hiddenStakeRequest), false)
        }
    }
    if (!b) {
        document.getElementById("chk_BettingChange").value = a.chk_BettingChange;
        var d = new Object();
        d.IsRacing = false;
        processMsg(a.hiddenSportType, d)
    }
    document.fomConfirmBetPhone.action = "outright/confirm_bet_data.aspx";
    document.fomConfirmBet.action = "outright/confirm_bet_data.aspx";
    confirmMode = a.confirmMode;
    document.getElementById("BPBetKey").value = a.hiddenBetKey;
    if (a.singleBetData != "") {
        document.getElementById("Betslip").innerHTML = HTMLDecode(a.singleBetData)
    }
};