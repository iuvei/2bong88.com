var ASYN_FLAG;
var fFrame = getParent(window);
var IsFun88 = false;
var IsTLC = false;
var IsM88 = false;
var IsALog = false;
var IsDela = false;
var IsSuncity = false;
var IsMayfair = false;
var IsZzun88 = false;
var dobet = false;
var confirmMode = "";
var CombiOddsChange = false;
var ShowSuccessBet = false;

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
if (fFrame.SiteMode == "2") {
    if (fFrame.Deposit_SiteMode == "2") {
        IsFun88 = true
    } else {
        if (fFrame.Deposit_SiteMode == "6") {
            IsTLC = true
        } else {
            if (fFrame.Deposit_SiteMode == "3") {
                IsM88 = true
            } else {
                if (fFrame.Deposit_SiteMode == "4") {
                    IsALog = true
                } else {
                    if (fFrame.Deposit_SiteMode == "5") {
                        IsDela = true
                    } else {
                        if (fFrame.Deposit_SiteMode == "8") {
                            IsSuncity = true
                        } else {
                            if (fFrame.Deposit_SiteMode == "9") {
                                IsMayfair = true
                            } else {
                                if (fFrame.Deposit_SiteMode == "10") {
                                    IsZzun88 = true
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
var boolchKeepBet = false;
var boolchKeepBet_bingo = false;
var boolchKeepBet_horse = false;

function SwitchBettingMode(c) {
    var a = GetCurrentSingleTag();
    var d = document.getElementById(a);
    var g = document.getElementById("Betslip");
    var f = document.getElementById("div_menu_single");
    var e = document.getElementById("div_menu_multiple");
    var h = document.getElementById("txtSingleEachWay");
    var i = document.getElementById("sporttype").value;
    var b = false;
    if (i == "151" || i == "152" || i == "153") {
        b = true
    }
    if (d == null || g == null) {
        return
    }
    if (c == 0) {
        f.className = "R_menu_R current";
        e.className = "R_menu_gr";
        d.style.display = "";
        g.style.display = "none";
        if (fFrame.LastSingleType == 0) {
            if (b) {
                document.getElementById("HorseBPstake").focus()
            } else {
                document.getElementById("BPstake").focus()
            }
        } else {
            if (fFrame.LastSingleType == 1) {
                document.getElementById("Bingo_BPstake").focus()
            }
        }
        if (document.getElementById("chKeepBet") != null) {
            document.getElementById("chKeepBet").checked = boolchKeepBet
        }
        if (document.getElementById("Bingo_chKeepBet") != null) {
            document.getElementById("Bingo_chKeepBet").checked = boolchKeepBet_bingo
        }
        if (document.getElementById("FScreen") != null) {
            document.getElementById("FScreen").checked = boolchKeepBet_horse
        }
        fFrame.LastBettingMode = c;
        if (tmp_obj == null) {
            OddsKeepCountTime(tmp_obj)
        } else {
            if (tmp_obj.id == "FScreen") {
                FreezeScreen(tmp_obj)
            } else {
                OddsKeepCountTime(tmp_obj)
            }
        }
    } else {
        f.className = "R_menu_gr current";
        e.className = "R_menu_R";
        g.style.display = "";
        d.style.display = "none";
        FocusInputBox();
        DropTimeoutHandlers();
        if (document.getElementById("chKeepBet") != null) {
            boolchKeepBet = document.getElementById("chKeepBet").checked;
            document.getElementById("chKeepBet").checked = false
        }
        if (document.getElementById("Bingo_chKeepBet") != null) {
            boolchKeepBet_bingo = document.getElementById("Bingo_chKeepBet").checked;
            document.getElementById("Bingo_chKeepBet").checked = false
        }
        if (document.getElementById("FScreen") != null) {
            boolchKeepBet_horse = document.getElementById("FScreen").checked;
            document.getElementById("FScreen").checked = false
        }
        fFrame.LastBettingMode = c
    }
}

function GetCurrentSingleTag() {
    if (fFrame.LastSingleType == 0) {
        return "BetProcessContainer"
    } else {
        if (fFrame.LastSingleType == 1) {
            return "BingoBetProcessContainer"
        }
    }
    return ""
}

function ChangeDisplayMode(c, d, b, f) {
    if (!IsPageLoadCompleted()) {
        return
    }
    if (fFrame.SiteMode == "1") {
        var a = document.getElementById("txt_betcredit").innerHTML.replace(/,/g, "");
        document.getElementById("txt_betcreditInfo").innerHTML = addCommas(Math.floor(a) + "")
    }
    switch (c) {
        case "acF":
            document.getElementById("div_accountInfoFull").style.display = "block";
            document.getElementById("div_accountInfoMini").style.display = "none";
            document.getElementById("BettingModeContainer").style.display = "none";
            document.getElementById("BetProcessContainer").style.display = "none";
            document.getElementById("Betslip").style.display = "none";
            if (document.getElementById("BingoBetProcessContainer") != null) {
                document.getElementById("BingoBetProcessContainer").style.display = "none"
            }
            document.getElementById("SuccessBetContainer").style.display = "none";
            document.getElementById("MessageDisplayContainer").style.display = "none";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "none"
            }
            document.getElementById("MenuContainer").style.display = "";
            document.getElementById("div_MixParlay").style.display = "none";
            if (!IsDela) {
                document.getElementById("div_WaitingBets").style.display = "none";
                document.getElementById("div_VoidTicket").style.display = "none";
                document.getElementById("div_BetListMini").style.display = "none"
            }
            DoLeftMenuDisplay();
            if (fFrame.SiteMode == "1") {
                document.getElementById("BetProcessPhoneContainer").style.display = "none"
            }
            openMenu(userlang);
            AccountTimeOut = window.setTimeout("ReloadWaitingBetList('yes','no','fromTimer')", 30000);
            break;
        case "acM":
            if (!IsDela && !IsZzun88 && !IsMayfair) {
                document.getElementById("div_accountInfoMini").style.display = "block";
                document.getElementById("div_accountInfoFull").style.display = "none"
            } else {
                document.getElementById("div_accountInfoMini").style.display = "none";
                document.getElementById("div_accountInfoFull").style.display = "block"
            }
            break;
        case "Amp":
            document.getElementById("btnMPSubmit").disabled = false;
            document.getElementById("MessageDisplayContainer").style.display = "none";
            if (!IsDela && !IsZzun88 && !IsMayfair) {
                document.getElementById("div_accountInfoFull").style.display = "none"
            } else {
                document.getElementById("div_accountInfoFull").style.display = ""
            }
            document.getElementById("div_accountInfoMini").style.display = "";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "none";
                if (IsM88 || IsDela || IsSuncity || IsMayfair || fFrame.SiteId == "4270" || fFrame.siteId == "4200700" || fFrame.siteId == "4201100" || fFrame.SiteId == "4201200" || fFrame.SiteId == "4200200") {
                    document.getElementById("div_favorite").style.display = "none"
                } else {
                    if (IsALog) {
                        document.getElementById("div_favorite").style.display = "none";
                        document.getElementById("div_howtobet").style.display = "none"
                    }
                }
            }
            document.getElementById("MenuContainer").style.display = "none";
            document.getElementById("div_MixParlay").style.display = "block";
            document.getElementById("div_WaitingBets").style.display = "none";
            document.getElementById("div_VoidTicket").style.display = "none";
            document.getElementById("div_BetListMini").style.display = "none";
            ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 45000);
            break;
        case "Dmp":
            document.getElementById("div_MixParlay").style.display = "block";
            document.getElementById("div_WaitingBets").style.display = "none";
            document.getElementById("div_VoidTicket").style.display = "none";
            break;
        case "Cmp":
            document.getElementById("ParlayDetail").innerHTML = "";
            document.getElementById("MessageDisplayContainer").style.display = "none";
            if (!IsDela && !IsZzun88 && !IsMayfair) {
                document.getElementById("div_accountInfoFull").style.display = "none"
            } else {
                document.getElementById("div_accountInfoFull").style.display = ""
            }
            document.getElementById("div_accountInfoMini").style.display = "";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "";
                if (IsM88 || IsDela || IsSuncity || IsMayfair || fFrame.SiteId == "4270" || fFrame.SiteId == "4200700" || fFrame.SiteId == "4201100" || fFrame.SiteId == "4201200" || fFrame.SiteId == "4200200") {
                    document.getElementById("div_favorite").style.display = ""
                } else {
                    if (IsALog) {
                        document.getElementById("div_favorite").style.display = "";
                        document.getElementById("div_howtobet").style.display = ""
                    }
                }
            }
            document.getElementById("MenuContainer").style.display = "inline";
            document.getElementById("div_MixParlay").style.display = "none";
            document.getElementById("div_WaitingBets").style.display = "block";
            document.getElementById("div_VoidTicket").style.display = "none";
            document.getElementById("div_BetListMini").style.display = "none";
            break;
        case "wb":
            document.getElementById("BettingModeContainer").style.display = "none";
            document.getElementById("BetProcessContainer").style.display = "none";
            document.getElementById("Betslip").style.display = "none";
            if (document.getElementById("BingoBetProcessContainer") != null) {
                document.getElementById("BingoBetProcessContainer").style.display = "none"
            }
            if (fFrame.SiteMode == "1") {
                document.getElementById("BetProcessPhoneContainer").style.display = "none"
            }
            if (!ShowSuccessBet) {
                document.getElementById("SuccessBetContainer").style.display = "none"
            }
            document.getElementById("MessageDisplayContainer").style.display = "none";
            if (!IsDela && !IsZzun88 && !IsMayfair) {
                document.getElementById("div_accountInfoFull").style.display = "none"
            } else {
                document.getElementById("div_accountInfoFull").style.display = "block"
            }
            document.getElementById("div_accountInfoMini").style.display = "";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "";
                if (IsM88 || IsDela || IsSuncity || IsMayfair || fFrame.SiteId == "4270" || fFrame.SiteId == "4200700" || fFrame.SiteId == "4201100" || fFrame.SiteId == "4201200" || fFrame.SiteId == "4200200") {
                    document.getElementById("div_favorite").style.display = ""
                } else {
                    if (IsALog) {
                        document.getElementById("div_favorite").style.display = "";
                        document.getElementById("div_howtobet").style.display = ""
                    }
                }
            }
            document.getElementById("MenuContainer").style.display = "inline";
            if ((fFrame.SiteMode == "2" || fFrame.SiteMode == "3") && (!IsM88 && !IsALog && !IsDela && !IsSuncity && !IsMayfair && fFrame.SiteId != "4270" && fFrame.SiteId != "4200700" && fFrame.SiteId != "4201100" && fFrame.SiteId != "4201200" && fFrame.SiteId != "4200200")) {
                openMenu(userlang)
            } else {
                if (d == "yes") {
                    openMenu(userlang)
                } else {
                    if (d == "no") {
                        hideMenu(userlang)
                    }
                }
            }
            document.getElementById("div_MixParlay").style.display = "none";
            document.getElementById("div_WaitingBets").style.display = "block";
            document.getElementById("div_BetListMini").style.display = "none";
            document.getElementById("div_VoidTicket").style.display = "none";
            break;
        case "bm":
            document.getElementById("MessageDisplayContainer").style.display = "none";
            document.getElementById("BettingModeContainer").style.display = "none";
            document.getElementById("BetProcessContainer").style.display = "none";
            document.getElementById("Betslip").style.display = "none";
            if (document.getElementById("BingoBetProcessContainer") != null) {
                document.getElementById("BingoBetProcessContainer").style.display = "none"
            }
            if (fFrame.SiteMode == "1") {
                document.getElementById("BetProcessPhoneContainer").style.display = "none"
            }
            if (!IsDela && !IsZzun88 && !IsMayfair) {
                document.getElementById("div_accountInfoFull").style.display = "none"
            } else {
                document.getElementById("div_accountInfoFull").style.display = "block"
            }
            document.getElementById("div_accountInfoMini").style.display = "";
            document.getElementById("div_WaitingBets").style.display = "none";
            document.getElementById("div_VoidTicket").style.display = "none";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "";
                if (IsM88 || IsDela || IsSuncity || IsMayfair || fFrame.SiteId == "4270" || fFrame.SiteId == "4200700" || fFrame.SiteId == "4201100" || fFrame.SiteId == "4201200" || fFrame.SiteId == "4200200") {
                    document.getElementById("div_favorite").style.display = ""
                } else {
                    if (IsALog) {
                        document.getElementById("div_favorite").style.display = "";
                        document.getElementById("div_howtobet").style.display = ""
                    }
                }
            }
            document.getElementById("MenuContainer").style.display = "";
            if ((fFrame.SiteMode == "2" || fFrame.SiteMode == "3") && (!IsM88 && !IsALog && !IsDela && !IsSuncity && !IsMayfair && fFrame.SiteId != "4270" && fFrame.SiteId != "4200700" && fFrame.SiteId != "4201100" && fFrame.SiteId != "4201200" && fFrame.SiteId != "4200200")) {
                openMenu(userlang)
            } else {
                if (d == "yes") {
                    openMenu(userlang)
                } else {
                    hideMenu(userlang)
                }
            }
            document.getElementById("div_MixParlay").style.display = "none";
            if (!IsDela) {
                document.getElementById("div_WaitingBets").style.display = "none"
            }
            document.getElementById("div_BetListMini").style.display = "block";
            DoLeftMenuDisplay();
            break;
        case "Vtk":
            document.getElementById("MessageDisplayContainer").style.display = "none";
            document.getElementById("BettingModeContainer").style.display = "none";
            document.getElementById("BetProcessContainer").style.display = "none";
            document.getElementById("Betslip").style.display = "none";
            if (document.getElementById("BingoBetProcessContainer") != null) {
                document.getElementById("BingoBetProcessContainer").style.display = "none"
            }
            if (fFrame.SiteMode == "1") {
                document.getElementById("BetProcessPhoneContainer").style.display = "none"
            }
            if (!IsDela && !IsZzun88 && !IsMayfair) {
                document.getElementById("div_accountInfoFull").style.display = "none"
            } else {
                document.getElementById("div_accountInfoFull").style.display = "block"
            }
            document.getElementById("div_accountInfoMini").style.display = "";
            document.getElementById("div_WaitingBets").style.display = "none";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "";
                if (IsM88 || IsDela || IsSuncity || IsMayfair || fFrame.SiteId == "4270" || fFrame.SiteId == "4200700" || fFrame.SiteId == "4201100" || fFrame.SiteId == "4201200" || fFrame.SiteId == "4200200") {
                    document.getElementById("div_favorite").style.display = ""
                } else {
                    if (IsALog) {
                        document.getElementById("div_favorite").style.display = "";
                        document.getElementById("div_howtobet").style.display = ""
                    }
                }
            }
            document.getElementById("MenuContainer").style.display = "";
            if ((fFrame.SiteMode == "2" || fFrame.SiteMode == "3") && (!IsM88 && !IsALog && !IsDela && !IsSuncity && !IsMayfair && fFrame.SiteId != "4270" && fFrame.SiteId != "4200700" && fFrame.SiteId != "4201100" && fFrame.SiteId != "4201200" && fFrame.SiteId != "4200200")) {
                openMenu(userlang)
            } else {
                if (d == "yes") {
                    openMenu(userlang)
                } else {
                    hideMenu(userlang)
                }
            }
            document.getElementById("div_MixParlay").style.display = "none";
            document.getElementById("div_BetListMini").style.display = "none";
            document.getElementById("div_VoidTicket").style.display = "block";
            DoLeftMenuDisplay();
            break;
        case "betO":
            ClearOTStake();
            DropTimeoutHandlers();
            fFrame.LastSingleType = 0;
            document.getElementById("MessageDisplayContainer").style.display = "none";
            CtrlSubmitBtnDisabled(false);
            document.getElementById("div_accountInfoFull").style.display = "none";
            document.getElementById("div_accountInfoMini").style.display = "";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "none";
                if (IsM88 || IsDela || IsSuncity || IsMayfair || fFrame.SiteId == "4270" || fFrame.SiteId == "4200700" || fFrame.SiteId == "4201100" || fFrame.SiteId == "4201200" || fFrame.SiteId == "4200200") {
                    document.getElementById("div_favorite").style.display = "none"
                } else {
                    if (IsALog) {
                        document.getElementById("div_favorite").style.display = "none";
                        document.getElementById("div_howtobet").style.display = "none"
                    }
                }
            }
            document.getElementById("MenuContainer").style.display = "none";
            document.getElementById("SuccessBetContainer").style.display = "none";
            if (document.getElementById("BingoBetProcessContainer") != null) {
                document.getElementById("BingoBetProcessContainer").style.display = "none"
            }
            document.getElementById("BettingModeContainer").style.display = RES_Open_Multi ? "" : "none";
            if (fFrame.LastBettingMode == 0) {
                document.getElementById("BetProcessContainer").style.display = "";
                document.getElementById("Betslip").style.display = "none"
            } else {
                document.getElementById("BetProcessContainer").style.display = "none";
                document.getElementById("Betslip").style.display = ""
            }
            document.getElementById("div_BetListMini").style.display = "none";
            document.getElementById("div_WaitingBets").style.display = "none";
            document.getElementById("div_VoidTicket").style.display = "none";
            if (fFrame.SiteMode == "1") {
                document.getElementById("BetProcessPhoneContainer").style.display = "none"
            }
            document.getElementById("BPstake").value = "";
            document.getElementById("payOut").innerHTML = "";
            if (fFrame.LastBettingMode == 0) {
                document.getElementById("BPstake").focus();
                ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 20000)
            }
            break;
        case "betOP":
            DropTimeoutHandlers();
            document.getElementById("MessageDisplayContainer").style.display = "none";
            document.getElementById("btnBPSubmit_P").disabled = false;
            document.getElementById("div_accountInfoFull").style.display = "none";
            document.getElementById("div_accountInfoMini").style.display = "";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "none"
            }
            document.getElementById("MenuContainer").style.display = "none";
            document.getElementById("SuccessBetContainer").style.display = "none";
            document.getElementById("BettingModeContainer").style.display = "none";
            document.getElementById("BetProcessContainer").style.display = "none";
            if (document.getElementById("BingoBetProcessContainer") != null) {
                document.getElementById("BingoBetProcessContainer").style.display = "none"
            }
            document.getElementById("BetProcessPhoneContainer").style.display = "";
            document.getElementById("RemarkContainer").style.display = "none";
            document.getElementById("liveScoreContainer").style.display = "none";
            document.getElementById("phoneOutright").style.display = "";
            document.getElementById("phoneInputBox1").style.display = "none";
            document.getElementById("phoneInputBox2").style.display = "none";
            document.getElementById("phoneInputBox3").style.display = "none";
            document.getElementById("div_BetListMini").style.display = "none";
            document.getElementById("div_WaitingBets").style.display = "none";
            document.getElementById("BPstake_P").value = "";
            if (fFrame.LastBettingMode == 0) {
                document.getElementById("BPstake_P").focus()
            }
            document.getElementById("payOut_P").innerHTML = "";
            break;
        case "su":
            document.getElementById("SuccessBetContainer").style.display = "";
            if (b == "True") {
                document.getElementById("BettingModeContainer").style.display = "none";
                document.getElementById("BetProcessContainer").style.display = "none";
                document.getElementById("Betslip").style.display = "none";
                if (document.getElementById("BingoBetProcessContainer") != null) {
                    document.getElementById("BingoBetProcessContainer").style.display = "none"
                }
                if (CheckIsIpad()) {
                    ShowSuccessBet = true;
                    var e = function() {
                        alert(document.getElementById("successInfo1").value);
                        ShowSuccessBet = false;
                        document.getElementById("SuccessBetContainer").style.display = "none"
                    };
                    window.setTimeout(e, 1000)
                } else {
                    window.setTimeout('alert(document.getElementById("successInfo1").value)', 100)
                }
                window.setTimeout("ReloadWaitingBetList('no','yes')", 100)
            } else {
                alert(document.getElementById("successInfo2").value);
                ReloadBetListMini("no", "no")
            }
            break;
        case "bet":
            ClearBPStake();
            fFrame.LastSingleType = 0;
            CtrlSubmitBtnDisabled(false);
            document.getElementById("MessageDisplayContainer").style.display = "none";
            if (document.getElementById("BingoBetProcessContainer") != null) {
                document.getElementById("BingoBetProcessContainer").style.display = "none"
            }
            document.getElementById("div_accountInfoFull").style.display = "none";
            document.getElementById("div_WaitingBets").style.display = "none";
            document.getElementById("div_VoidTicket").style.display = "none";
            document.getElementById("div_accountInfoMini").style.display = "";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "none";
                if (IsM88 || IsDela || IsSuncity || IsMayfair || fFrame.SiteId == "4270" || fFrame.SiteId == "4200700" || fFrame.SiteId == "4201100" || fFrame.SiteId == "4201200" || fFrame.SiteId == "4200200") {
                    document.getElementById("div_favorite").style.display = "none"
                } else {
                    if (IsALog) {
                        document.getElementById("div_favorite").style.display = "none";
                        document.getElementById("div_howtobet").style.display = "none"
                    }
                }
            }
            document.getElementById("MenuContainer").style.display = "none";
            if (fFrame.SiteMode == "1") {
                document.getElementById("BetProcessPhoneContainer").style.display = "none"
            }
            document.getElementById("SuccessBetContainer").style.display = "none";
            document.getElementById("div_BetListMini").style.display = "none";
            document.getElementById("BettingModeContainer").style.display = RES_Open_Multi ? "" : "none";
            if (fFrame.LastBettingMode == 0) {
                document.getElementById("BetProcessContainer").style.display = "";
                document.getElementById("Betslip").style.display = "none"
            } else {
                document.getElementById("BetProcessContainer").style.display = "none";
                document.getElementById("Betslip").style.display = ""
            }
            if (tmp_obj != null) {
                if (fFrame.LastBettingMode == 0) {
                    if (tmp_obj.id == "FScreen") {
                        if (document.getElementById("FScreen") != null) {
                            if (!document.getElementById("FScreen").checked) {
                                ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 20000)
                            } else {
                                DropTimeoutHandlers()
                            }
                        }
                    }
                } else {
                    DropTimeoutHandlers()
                }
            }
            break;
        case "betP":
            document.getElementById("btnBPSubmit_P").disabled = false;
            ClearBPStake();
            document.getElementById("MessageDisplayContainer").style.display = "none";
            document.getElementById("div_accountInfoFull").style.display = "none";
            document.getElementById("div_WaitingBets").style.display = "none";
            document.getElementById("div_accountInfoMini").style.display = "";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "none"
            }
            document.getElementById("MenuContainer").style.display = "none";
            if (fFrame.SiteMode == "1") {
                document.getElementById("BetProcessPhoneContainer").style.display = ""
            }
            document.getElementById("SuccessBetContainer").style.display = "none";
            document.getElementById("div_BetListMini").style.display = "none";
            document.getElementById("BettingModeContainer").style.display = "none";
            document.getElementById("BetProcessContainer").style.display = "none";
            if (document.getElementById("BingoBetProcessContainer") != null) {
                document.getElementById("BingoBetProcessContainer").style.display = "none"
            }
            break;
        case "betBingo":
            ClearBPStake();
            fFrame.LastSingleType = 1;
            document.getElementById("Bingo_btnBPSubmit").disabled = false;
            document.getElementById("MessageDisplayContainer").style.display = "none";
            document.getElementById("div_accountInfoFull").style.display = "none";
            document.getElementById("div_WaitingBets").style.display = "none";
            document.getElementById("div_VoidTicket").style.display = "none";
            document.getElementById("div_accountInfoMini").style.display = "";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "none";
                if (IsM88 || IsDela || IsSuncity || IsMayfair || fFrame.SiteId == "4270" || fFrame.SiteId == "4200700" || fFrame.SiteId == "4201100" || fFrame.SiteId == "4201200" || fFrame.SiteId == "4200200") {
                    document.getElementById("div_favorite").style.display = "none"
                } else {
                    if (IsALog) {
                        document.getElementById("div_favorite").style.display = "none";
                        document.getElementById("div_howtobet").style.display = "none"
                    }
                }
            }
            document.getElementById("MenuContainer").style.display = "none";
            if (fFrame.SiteMode == "1") {
                document.getElementById("BetProcessPhoneContainer").style.display = "none"
            }
            document.getElementById("SuccessBetContainer").style.display = "none";
            document.getElementById("div_BetListMini").style.display = "none";
            document.getElementById("BetProcessContainer").style.display = "none";
            document.getElementById("BettingModeContainer").style.display = RES_Open_Multi ? "" : "none";
            if (document.getElementById("BingoBetProcessContainer") != null) {
                if (fFrame.LastBettingMode == 0) {
                    document.getElementById("BingoBetProcessContainer").style.display = "";
                    document.getElementById("Betslip").style.display = "none"
                } else {
                    document.getElementById("BingoBetProcessContainer").style.display = "none";
                    document.getElementById("Betslip").style.display = ""
                }
            }
            if (document.getElementById("Bingo_chKeepBet") != null) {
                if (!document.getElementById("Bingo_chKeepBet").checked) {
                    ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 20000)
                } else {
                    DropTimeoutHandlers()
                }
            }
            break;
        case "msg":
            document.getElementById("btnMPSubmit").disabled = false;
            if (!IsDela && !IsZzun88 && !IsMayfair) {
                document.getElementById("div_accountInfoFull").style.display = "none"
            } else {
                document.getElementById("div_accountInfoFull").style.display = "block"
            }
            document.getElementById("div_accountInfoMini").style.display = document.getElementById("msg_type").value == "oddschange" ? "" : "none";
            if (fFrame.SiteMode != "2" || (fFrame.Deposit_SiteMode != "1" && fFrame.Deposit_SiteMode != "2" && fFrame.Deposit_SiteMode != "7")) {
                document.getElementById("div_menu").style.display = "none";
                if (IsM88 || IsALog || IsDela || IsSuncity || IsMayfair || fFrame.SiteId == "4270" || fFrame.SiteId == "4200700" || fFrame.SiteId == "4201100" || fFrame.SiteId == "4201200" || fFrame.SiteId == "4200200") {
                    document.getElementById("div_favorite").style.display = "none"
                }
            }
            document.getElementById("MenuContainer").style.display = "none";
            document.getElementById("BettingModeContainer").style.display = "none";
            document.getElementById("BetProcessContainer").style.display = "none";
            document.getElementById("Betslip").style.display = "none";
            if (document.getElementById("BingoBetProcessContainer") != null) {
                document.getElementById("BingoBetProcessContainer").style.display = "none"
            }
            if (fFrame.SiteMode == "1") {
                document.getElementById("BetProcessPhoneContainer").style.display = "none"
            }
            document.getElementById("div_MixParlay").style.display = document.getElementById("msg_type").value == "oddschange" ? "block" : "none";
            document.getElementById("div_WaitingBets").style.display = "none";
            document.getElementById("div_BetListMini").style.display = "none";
            document.getElementById("div_VoidTicket").style.display = "none";
            AccountTimeOut = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 30000);
            break
    }
}

function refreshAccountInfo(a) {
    if (!IsPageLoadCompleted()) {
        return
    }
    document.getElementById("accountUpdate").value = a;
    document.getElementById("FrameAllAccount").submit();
    $("a[name='btnRefresh']").attr("class", "btnIcon right disable");
    if (a == "full") {
        ChangeDisplayMode("acF")
    } else {
        if (a == "mini") {
            ChangeDisplayMode("acM")
        }
    }
}

function loadAccountData(b) {
    if (!IsPageLoadCompleted()) {
        return
    }
    document.getElementById("accountUpdate").value = b;
    $("a[name='btnRefresh']").attr("class", "btnIcon right");
    if (b == "full") {
        document.getElementById("cashBalance").className = iFrameAllAccount.cashClass;
        document.getElementById("txt_cash").innerHTML = iFrameAllAccount.txt_cash;
        document.getElementById("txt_outstanding").innerHTML = iFrameAllAccount.txt_outstanding;
        document.getElementById("txt_betcredit").innerHTML = iFrameAllAccount.txt_betcredit;
        document.getElementById("txt_credit").innerHTML = iFrameAllAccount.txt_credit;
        document.getElementById("txt_login").innerHTML = iFrameAllAccount.txt_login;
        document.getElementById("txt_transaction").innerHTML = iFrameAllAccount.txt_transaction;
        document.getElementById("txt_expassword").innerHTML = iFrameAllAccount.txt_expassword
    } else {
        if (b == "mini") {
            if (fFrame.SiteMode == "2" || fFrame.SiteMode == "3") {
                document.getElementById("txt_cash").innerHTML = iFrameAllAccount.txt_cash;
                document.getElementById("txt_outstanding").innerHTML = iFrameAllAccount.txt_outstanding
            } else {
                var a = iFrameAllAccount.txt_betcredit.replace(/,/g, "");
                document.getElementById("txt_betcreditInfo").innerHTML = addCommas(Math.floor(a) + "");
                document.getElementById("txt_betcredit").innerHTML = document.getElementById("txt_betcreditInfo").innerHTML
            }
        }
    }
}
var retryMenu;
var refreshMenu;
var ParlaySportType;
var TimeoutWaitingBetIndex;
var TimeoutCountdownIndex;
var ProcessBetTimeoutHandler;
var AccountTimeOut;
var CounterHandle_L;

function ClearMPStake() {
    if (!IsPageLoadCompleted()) {
        return
    }
    document.getElementById("betform").stake.value = "";
    document.getElementById("betform").stake.focus();
    document.getElementById("txtPayOut").innerHTML = "";
    var a = document.getElementById("TotalStakeValue");
    if (a != null) {
        a.innerHTML = ""
    }
}

function checkCombOdds(g, e, f, a, b) {
    if (b == null) {
        var c = document.getElementById("cbCombiOdds");
        c.checked = !c.checked;
        if (c.checked) {
            document.getElementById("MPMaxBet").innerHTML = iframMixParlay.CombiMaxBet;
            document.betform.MAXBET.value = iframMixParlay.CombiMaxBet.replace(/\,/g, "")
        } else {
            document.getElementById("MPMaxBet").innerHTML = iframMixParlay.MaxBet;
            document.betform.MAXBET.value = iframMixParlay.MaxBet.replace(/\,/g, "")
        }
    } else {
        if (b.checked) {
            document.getElementById("MPMaxBet").innerHTML = iframMixParlay.CombiMaxBet;
            document.betform.MAXBET.value = iframMixParlay.CombiMaxBet.replace(/\,/g, "")
        } else {
            document.getElementById("MPMaxBet").innerHTML = iframMixParlay.MaxBet;
            document.betform.MAXBET.value = iframMixParlay.MaxBet.replace(/\,/g, "")
        }
    }
    var d = document.getElementById(g);
    checkCombiValue(d, e, f, a)
}

function checkCombiValue(b, f, g, a) {
    var c = document.getElementById("cbCombiOdds");
    var d = document.getElementById("TotalStakeValue");
    var e = document.getElementById("tr_mixparlay_odds");
    if (c.checked) {
        if (e != null) {
            e.style.display = "none"
        }
        checkValue(b, a, g);
        if (b.value != "") {
            d.innerHTML = addCommas(parseInt(removeCommas(b.value), 10) * parseInt(iframMixParlay.CombiCount, 10) + "")
        } else {
            d.innerHTML = ""
        }
    } else {
        if (e != null) {
            e.style.display = ""
        }
        checkValue(b, f, g);
        d.innerHTML = b.value
    }
}

function loadParlayData() {
    if (!IsPageLoadCompleted()) {
        return
    }
    CtrlSubmitBtnDisabled(false);
    ParlaySportType = iframMixParlay.SportType;
    document.betform.count.value = iframMixParlay.CartCount;
    if (parseInt(iframMixParlay.CartCount, 10) < parseInt(iframMixParlay.CanBetTicketCnt, 10)) {
        document.getElementById("divKeepOdds").style.display = "none";
        document.getElementById("parlay_bet_info2").style.display = "none";
        document.getElementById("parlay_bet_info").style.display = "none"
    } else {
        document.getElementById("divKeepOdds").style.display = "";
        document.getElementById("parlay_bet_info2").style.display = "";
        document.getElementById("parlay_bet_info").style.display = ""
    }
    if (fFrame.SiteMode == "1") {
        document.betform.AdminLevel.value = iframMixParlay.AdminLevel
    }
    document.betform.MAXBET.value = iframMixParlay.MaxBet.replace(/\,/g, "");
    document.betform.MINBET.value = iframMixParlay.MinBet.replace(/\,/g, "");
    document.betform.sport.value = iframMixParlay.SportType;
    document.getElementById("TotalOdds").innerHTML = iframMixParlay.TotalOdds;
    document.getElementById("mincurrency").innerHTML = iframMixParlay.Currency;
    document.getElementById("maxcurrency").innerHTML = iframMixParlay.Currency;
    document.getElementById("MPMinBet").innerHTML = iframMixParlay.MinBet;
    document.getElementById("MPMaxBet").innerHTML = iframMixParlay.MaxBet;
    document.getElementById("ParlayDetail").innerHTML = iframMixParlay.parlaydata;
    document.getElementById("BetKey").value = iframMixParlay.hiddenBetKey;
    confirmMode = iframMixParlay.confirmMode;
    var b = document.getElementById("cbCombiOdds");
    if (b != null) {
        if (!CombiOddsChange) {
            b.checked = false
        }
        if (iframMixParlay.CombiOdds != 0) {
            document.getElementById("CombiOdds").innerHTML = iframMixParlay.CombiOdds;
            document.getElementById("CombiName").innerHTML = iframMixParlay.CombiName;
            document.getElementById("CombiTB").style.display = "";
            if (b.checked) {
                document.getElementById("MPMaxBet").innerHTML = iframMixParlay.CombiMaxBet;
                document.betform.MAXBET.value = iframMixParlay.CombiMaxBet.replace(/\,/g, "")
            }
        } else {
            document.getElementById("CombiOdds").innerHTML = "0";
            document.getElementById("CombiName").innerHTML = "";
            document.getElementById("CombiTB").style.display = "none"
        }
    }
    var c = document.getElementById("tr_mixparlay_odds");
    if (c != null) {
        c.style.display = ""
    }
    if (fFrame.SiteMode == "1") {
        var a = document.betform.AdminLevel.value;
        if (a == "8") {
            document.getElementById("PhoneRemarkContainer").style.display = "block"
        } else {
            document.getElementById("PhoneRemarkContainer").style.display = "none"
        }
    }
    if (ASYN_FLAG == "1" && document.getElementById("msg_type").value == "oddschange") {
        document.fomMessageDisplay.submit()
    }
    if (document.getElementById("stake").value == "" || (iframMixParlay.CartCount == "1" && document.ParlayBetForm.del.value == "")) {
        document.getElementById("stake").value = iframMixParlay.hiddenStakeRequest
    }
    var d = payOutCalculate(removeCommas(document.getElementById("TotalOdds").innerHTML), removeCommas(document.getElementById("stake").value), false);
    if (parseInt(d, 10) == 0) {
        d = ""
    }
    document.getElementById("txtPayOut").innerHTML = d;
    checkCombiValue(document.getElementById("stake"), "TotalOdds", "txtPayOut", "CombiOdds");
    if (CombiOddsChange) {
        CombiOddsChange = false
    }
    if (document.getElementById("parlay_bet_info").style.display != "none") {
        document.getElementById("stake").focus();
        document.getElementById("stake").select()
    }
}

function ReloadWaitingBetList(c, a, b) {
    if (!IsPageLoadCompleted()) {
        return
    }
    DropTimeoutHandlers();
    if (a == "yes") {
        refreshAccountInfo("mini")
    }
    if (document.getElementById("div_MixParlay").style.display == "none" || b != "fromTimer") {
        ChangeDisplayMode("wb", c)
    }
    document.frmWaitingBets.action = "index.php?r=site/WaitingBetData&IsFromWaitingBtn=yes";
    document.frmWaitingBets.submit();
    disableMiniRefresh("WaitingBetRefreshIcon");
    scrollTo(0, top)
}

function ReloadVoidTicket(a) {
    if (!IsPageLoadCompleted()) {
        return
    }
    DropTimeoutHandlers();
    ChangeDisplayMode("Vtk", a);
    document.frmWaitingBets.action = "index.php?r=site/WaitingBetData";
    document.frmWaitingBets.submit();
    disableMiniRefresh("VoidTicketRefreshIcon");
    scrollTo(0, top)
}

function loadBetProcess(b) {
    CtrlSubmitBtnDisabled(true);
    if (!IsPageLoadCompleted()) {
        return
    }
    var c;
    var a;
    if (b == "Bingo_chKeepBet") {
        c = document.getElementById("Bingo_sporttype").value;
        a = document.getElementById("BingoBetProcessContainer").style.display
    } else {
        c = document.getElementById("sporttype").value;
        a = document.getElementById("BetProcessContainer").style.display
    }
    if (document.getElementById(b).checked == true && a != "none") {
        if (fFrame.SiteMode == "1") {
            document.fomBetProcessPhone_Data.action = "BetProcess_Data.aspx";
            if (eObj != null) {
                document.fomBetProcessPhone_Data.bp_p_key.value = eObj.GetKey("bet")
            }
            document.fomBetProcessPhone_Data.submit()
        } else {
            DoLeftMenuDisplay();
            if (c == "201" || c == "151" || c == "152" || c == "153") {
                document.fomBetProcess_Data.action = "BetProcess_Data_S.aspx?autoLoad=yes";
                document.fomBetProcess_Data.submit()
            } else {
                if (c == "161") {
                    document.Bingo_fomBetProcess_Data.action = "bingo/BetProcess_Data.aspx?autoLoad=yes";
                    if (eObj != null) {
                        document.Bingo_fomBetProcess_Data.Bingo_bp_key.value = eObj.GetKey("bbet")
                    }
                    document.Bingo_fomBetProcess_Data.submit()
                } else {
                    if (c != "181" && c != "182" && c != "183" && c != "184" && c != "185") {
                        document.fomBetProcess_Data.action = "index.php?r=site/BetProcessData&autoLoad=yes";
                        if (eObj != null) {
                            document.fomBetProcess_Data.bp_key.value = eObj.GetKey("bet")
                        }
                        document.fomBetProcess_Data.submit()
                    }
                }
            }
        }
    }
}

function loadWaitingBetList() {
    if (!IsPageLoadCompleted()) {
        return
    }
    if (WaitingBets.data != undefined) {
        var a = document.getElementById("WaitingBetsSpan");
        if (document.all) {
            a.innerHTML = WaitingBets.data
        } else {
            replaceHtml("WaitingBetsSpan", WaitingBets.data)
        }
    }
}

function loadVoidTicket() {
    if (!IsPageLoadCompleted()) {
        return
    }
    if (WaitingBets.data != undefined) {
        var a = document.getElementById("VoidTicketSpan");
        if (document.all) {
            a.innerHTML = WaitingBets.data
        } else {
            replaceHtml("VoidTicketSpan", WaitingBets.data)
        }
    }
}

function replaceHtml(a, b) {
    var d = typeof a == "string" ? document.getElementById(a) : a;
    var c = d.cloneNode(false);
    c.innerHTML = b;
    d.parentNode.replaceChild(c, d);
    return c
}

function counting(a) {
    if (!IsPageLoadCompleted()) {
        return
    }
    document.getElementById("lastrefresh").style.display = "block";
    document.getElementById("lastrefresh_time").innerHTML = a - 1;
    var b = a - 1;
    if ((a - 1) > 0) {
        TimeoutCountdownIndex = setTimeout("counting(" + b + ")", 1000)
    } else {
        document.getElementById("lastrefresh").style.display = "none";
        document.getElementById("checkStatus").style.display = "block"
    }
}

function Countdown() {
    counting(6);
    TimeoutWaitingBetIndex = window.setTimeout("ReloadWaitingBetList('','no','fromTimer')", 6000)
}

function ReloadBetListMini(b, a) {
    if (!IsPageLoadCompleted()) {
        return
    }
    DropTimeoutHandlers();
    ChangeDisplayMode("bm", b);
    if (a == "yes") {
        document.frmBetListMini.showBetAcceptedMsg.value = "yes"
    } else {
        document.frmBetListMini.showBetAcceptedMsg.value = "no"
    }
    document.frmBetListMini.from.value = "mini";
    document.frmBetListMini.submit();
    disableMiniRefresh("BetListMiniRefreshIcon");
    scrollTo(0, top)
}

function disableMiniRefresh(b, c) {
    var a = " disable";
    if (c != null && !c) {
        a = ""
    }
    if (document.getElementById(b) != null) {
        document.getElementById(b).className = "btnIcon mark right" + a
    }
}

function showBetAcceptedMsg(a) {
    document.getElementById("ParlayDetail").innerHTML = "";
    alert(a)
}

function ClearOTStake() {
    if (!IsPageLoadCompleted()) {
        return
    }
    if (fFrame.SiteMode == "1") {
        document.getElementById("spBetKind_P").innerHTML = "";
        document.getElementById("spOddsStatus_P").innerHTML = "";
        document.getElementById("spChoiceClass_P").innerHTML = "";
        if (document.getElementById("phoneInputBox1").style.display != "none") {
            document.getElementById("bp_hdp1Value_1").value = "";
            document.getElementById("bp_hdp2Value_1").value = "";
            document.getElementById("bp_odds1").value = ""
        } else {
            if (document.getElementById("phoneInputBox2").style.display != "none") {
                document.getElementById("bp_hdp1Value_2").value = "";
                document.getElementById("bp_hdp2Value_2").value = "";
                document.getElementById("bp_odds2").value = ""
            } else {
                if (document.getElementById("phoneInputBox3").style.display != "none") {
                    document.getElementById("BetKindValue").innerHTML = "";
                    document.getElementById("bp_hdp1Value_3").value = "";
                    document.getElementById("bp_hdp2Value_3").value = "";
                    document.getElementById("bp_odds3").value = ""
                }
            }
        }
        document.getElementById("spHome_P").innerHTML = "";
        document.getElementById("spAway_P").innerHTML = "";
        document.getElementById("spLeaguename_P").innerHTML = "";
        document.getElementById("BPstake_P").value = "";
        document.getElementById("liveScoreH").value = "0";
        document.getElementById("liveScoreA").value = "0";
        document.getElementById("payOut_P").innerHTML = "";
        document.getElementById("spMinBetValue_P").innerHTML = "";
        document.getElementById("spMaxBetValue_P").innerHTML = ""
    } else {
        document.getElementById("BPstake").value = "";
        document.getElementById("payOut").innerHTML = "";
        document.getElementById("tdBetKind").innerHTML = "";
        document.getElementById("spChoiceClass").innerHTML = "";
        document.getElementById("spLeaguename").innerHTML = "";
        document.getElementById("spMinBetValue").innerHTML = "";
        document.getElementById("spMaxBetValue").innerHTML = "";
        document.getElementById("sbBetKindValue").innerHTML = "";
        document.getElementById("spScoreValue").innerHTML = "";
        document.getElementById("ot_dvChoiceValue").innerHTML = ""
    }
}

function ClearBPStake() {
    if (!IsPageLoadCompleted()) {
        return
    }
    if (fFrame.siteMode == "1") {
        document.getElementById("BPstake_P").OTPStake.value = "";
        document.getElementById("payOut_P").innerHTML = ""
    } else {
        var a = false;
        a = document.getElementById("trHorseTotoKeep") == null ? true : false;
        if (a || document.getElementById("trHorseTotoKeep").style.display == "none") {
            document.getElementById("tdBetKind").innerHTML = "";
            document.getElementById("spChoiceClass").innerHTML = "";
            document.getElementById("spHome").innerHTML = "";
            document.getElementById("spAway").innerHTML = "";
            document.getElementById("spLeaguename").innerHTML = "";
            document.getElementById("spMinBetValue").innerHTML = "";
            document.getElementById("spMaxBetValue").innerHTML = "";
            document.getElementById("menuTitle").innerHTML = ""
        }
    }
}

function FromConfirmBetProcess(a) {
    if (!IsPageLoadCompleted()) {
        return
    }
    DropTimeoutHandlers();
    if (fFrame.SiteMode == "1") {
        document.getElementById("bp_p_Match").value = a;
        document.fomBetProcessPhone_Data.action = "BetProcess_Data.aspx";
        if (eObj != null) {
            document.fomBetProcessPhone_Data.bp_p_key.value = eObj.GetKey("bet")
        }
        document.fomBetProcessPhone_Data.submit()
    } else {
        var b = document.getElementById("sporttype").value;
        DoLeftMenuDisplay();
        document.getElementById("bp_Match").value = a;
        if (b == "151" || b == "152" || b == "153") {
            document.fomBetProcess_Data.action = "BetProcess_Data_S.aspx?FromConfimBet=yes";
            document.fomBetProcess_Data.submit()
        } else {
            if (tmp_obj == null) {
                document.getElementById("otbp_Match").value = a;
                document.fomBetProcess_Data_OT.action = "outright/BetProcess_Data.aspx?FromConfimBet=yes";
                document.fomBetProcess_Data_OT.submit()
            } else {
                if (tmp_obj.id == "Bingo_chKeepBet") {
                    document.getElementById("Bingo_bp_Match").value = a;
                    document.Bingo_fomBetProcess_Data.action = "bingo/BetProcess_Data.aspx?FromConfimBet=yes";
                    if (eObj != null) {
                        document.Bingo_fomBetProcess_Data.Bingo_bp_key.value = eObj.GetKey("bbet")
                    }
                    document.Bingo_fomBetProcess_Data.submit()
                } else {
                    if (tmp_obj.id == "chKeepBet") {
                        document.fomBetProcess_Data.action = "BetProcess_Data.aspx?FromConfimBet=yes";
                        if (eObj != null) {
                            document.fomBetProcess_Data.bp_key.value = eObj.GetKey("bet")
                        }
                        document.fomBetProcess_Data.submit()
                    }
                }
            }
        }
    }
}

function SetConfirmBetResult(a, d, c) {
    if (!IsPageLoadCompleted()) {
        return
    }
    switch (a) {
        case "Msg":
            DoMessageDisplay(d);
            break;
        case "BListMini":
            ReloadBetListMini("no", "yes");
            break;
        case "Success":
            DoSuccessBet();
            break;
        case "Bet":
            DoBetProcess(d);
            break;
        case "BetO":
            DoOutrightBetProcess(d);
            break;
        case "BetS":
            DoSpecialBetProcess(d, c);
            break;
        case "BetC":
            FromConfirmBetProcess(d);
            break;
        case "Fnc":
            var b = 8;
            if (d == "OddsChanged") {
                b += 1
            }
            if (d == "IndexChanged") {
                b += 2
            }
            document.getElementById("chk_BettingChange").value = b;
            processMsg("201");
            document.fomBetProcess_Data.action = "BetProcess_Data_S.aspx?autoLoad=yes";
            document.fomBetProcess_Data.submit();
            break;
        case "WaitingBet":
            ReloadWaitingBetList("no", "no");
            break
    }
}
var tmp_obj = null;

function OddsKeepCountTime(b) {
    tmp_obj = b;
    if (!IsPageLoadCompleted()) {
        return
    }
    DropTimeoutHandlers();
    if (tmp_obj == null) {
        if (fFrame.LastBettingMode == 0) {
            ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 20000)
        }
        return
    }
    if (b.id == "chKeepBet") {
        document.getElementById("HorseFixchKeepBet").checked = b.checked;
        if (document.getElementById("Bingo_chKeepBet") != null) {
            document.getElementById("Bingo_chKeepBet").checked = b.checked
        }
    }
    if (b.id == "HorseFixchKeepBet") {
        document.getElementById("chKeepBet").checked = b.checked;
        if (document.getElementById("Bingo_chKeepBet") != null) {
            document.getElementById("Bingo_chKeepBet").checked = b.checked
        }
    }
    if (b.id == "Bingo_chKeepBet") {
        document.getElementById("chKeepBet").checked = b.checked;
        if (document.getElementById("Bingo_chKeepBet") != null) {
            document.getElementById("HorseFixchKeepBet").checked = b.checked
        }
    }
    if (b.checked) {
        var a = OddsKeepREFRESH / 1000 - 1;
        CounterHandle_L = setTimeout("KeepOddscountdown(" + a + ",'" + b.id + "')", 1000)
    } else {
        if (fFrame.LastBettingMode == 0) {
            ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 20000)
        }
    }
}

function KeepOddscountdown(a, b) {
    if (!IsPageLoadCompleted()) {
        return
    }
    if (a <= 0 && !dobet) {
        loadBetProcess(b);
        return
    }
    if (a <= 0) {
        a = 0
    }
    if (b == "HorseFixchKeepBet") {
        document.getElementById("HorseFixKeep").innerHTML = "<span>" + RES_KeepOdds + "(" + a + ")</span>"
    } else {
        if (b == "Bingo_chKeepBet") {
            document.getElementById("Bingo_KeepOdds").innerHTML = "<span>" + RES_KeepOdds + "(" + a + ")</span>"
        } else {
            document.getElementById("KeepOdds").innerHTML = "<span>" + RES_KeepOdds + "(" + a + ")</span>"
        }
    }
    CounterHandle_L = setTimeout("KeepOddscountdown(" + (a - 1) + ",'" + b + "')", 1000)
}

function FreezeScreen(a) {
    tmp_obj = a;
    ChangeDisplayMode("bet")
}

function DoMessageDisplay(b, d, c) {
    if (!IsPageLoadCompleted()) {
        return
    }
    document.getElementById("msg_type").value = b;
    document.getElementById("msg_u_title").value = d;
    document.getElementById("msg_u_msg").value = c;
    if (document.getElementById("msg_type").value == "oddschange") {
        var a = document.getElementById("cbCombiOdds");
        if (a != null) {
            if (a.checked) {
                CombiOddsChange = true
            }
        }
        ASYN_FLAG = "1";
        document.ParlayBetForm.mode.value = "confirm";
        if (eObj != null) {
            document.ParlayBetForm.key.value = eObj.GetKey("mbet")
        }
        document.ParlayBetForm.submit()
    } else {
        document.fomMessageDisplay.submit()
    }
}

function SetMessageDisplayData(e, c, a, d) {
    if (!IsPageLoadCompleted()) {
        return
    }
    var b;
    ChangeDisplayMode("msg", null, null, d);
    if (document.getElementById("msg_type").value == "oddschange") {
        document.getElementById("MessageDisplayContainer").style.display = "none";
        alert(a)
    } else {
        document.getElementById("MessageDisplayContainer").style.display = "";
        b = document.getElementById("spSubTitle");
        b.innerHTML = c;
        b = document.getElementById("spTitle");
        b.innerHTML = e;
        b = document.getElementById("spContent");
        b.innerHTML = a
    }
}

function DropTimeoutHandlers() {
    if (AccountTimeOut != null && typeof AccountTimeOut != "undefined") {
        clearTimeout(AccountTimeOut);
        AccountTimeOut = null
    }
    if (ProcessBetTimeoutHandler != null && typeof ProcessBetTimeoutHandler != "undefined") {
        clearTimeout(ProcessBetTimeoutHandler);
        ProcessBetTimeoutHandler = null
    }
    if (TimeoutWaitingBetIndex != null && typeof TimeoutWaitingBetIndex != "undefined") {
        clearTimeout(TimeoutWaitingBetIndex);
        TimeoutWaitingBetIndex = null
    }
    if (TimeoutCountdownIndex != null && typeof TimeoutCountdownIndex != "undefined") {
        clearTimeout(TimeoutCountdownIndex);
        TimeoutCountdownIndex = null
    }
    if (CounterHandle_L != null && typeof CounterHandle_L != "undefined") {
        clearTimeout(CounterHandle_L);
        CounterHandle_L = null
    }
}

function DoLeftMenuDisplay() {
    if (!IsM88 && !IsALog && !IsTLC && !IsDela && !IsSuncity && !IsMayfair && fFrame.SiteId != "4270" && fFrame.SiteId != "4200700" && fFrame.SiteId != "4201100" && fFrame.SiteId != "4201200" && fFrame.SiteId != "4200200") {
        fFrame.topFrame.setleftMenu_tooltip()
    }
}
AccountTimeOut = window.setTimeout("ReloadWaitingBetList('yes','no','fromTimer')", 30000);

function IsPageLoadCompleted() {
    var a = document.getElementById("PageLoadCompleted");
    if (a != null) {
        return true
    } else {
        return false
    }
}

function CleanMixParlayInfo() {
    if (!IsPageLoadCompleted()) {
        return
    }
    ParlaySportType = "";
    document.betform.count.value = "";
    if (fFrame.SiteMode == "1") {
        document.betform.AdminLevel.value = ""
    }
    document.betform.MAXBET.value = "";
    document.betform.MINBET.value = "";
    document.betform.sport.value = "";
    document.getElementById("TotalOdds").innerHTML = "";
    document.getElementById("mincurrency").innerHTML = "";
    document.getElementById("maxcurrency").innerHTML = "";
    document.getElementById("MPMinBet").innerHTML = "";
    document.getElementById("MPMaxBet").innerHTML = "";
    document.getElementById("ParlayDetail").innerHTML = "";
    var b = document.getElementById("cbCombiOdds");
    if (b != null) {
        b.checked = false;
        if (iframMixParlay.CombiOdds != 0) {
            document.getElementById("CombiOdds").innerHTML = "";
            document.getElementById("CombiName").innerHTML = "";
            document.getElementById("CombiTB").style.display = ""
        } else {
            document.getElementById("CombiOdds").innerHTML = "0";
            document.getElementById("CombiName").innerHTML = "";
            document.getElementById("CombiTB").style.display = "none"
        }
    }
    if (fFrame.SiteMode == "1") {
        var a = document.betform.AdminLevel.value;
        if (a == "8") {
            document.getElementById("PhoneRemarkContainer").style.display = "block"
        } else {
            document.getElementById("PhoneRemarkContainer").style.display = "none"
        }
    }
    document.getElementById("txtPayOut").innerHTML = ""
}

function LiveSuccessInfo() {
    alert(document.getElementById("successInfo1").value)
}

function SetAcceptBetterOddsCheck(b) {
    if (b != "") {
        var a = false;
        if (b == "1") {
            a = true
        }
        obj1 = document.getElementById("cbAcceptBetterOdds");
        obj1.checked = a;
        obj1.disabled = false;
        obj2 = document.getElementById("Bingo_cbAcceptBetterOdds");
        if (obj2 != null) {
            obj2.checked = a;
            obj2.disabled = false
        }
    }
}

function SyncAcceptBetterOddsCheck(a) {
    obj1 = document.getElementById("cbAcceptBetterOdds");
    obj1.checked = a.checked;
    obj2 = document.getElementById("Bingo_cbAcceptBetterOdds");
    if (obj2 != null) {
        obj2.checked = a.checked
    }
}

function CtrlSubmitBtnDisabled(e) {
    var b = new Array("btnBPSubmit", "btnAutoAccept", "Bingo_btnBPSubmit", "Race_btnBPSubmit", "btnMPSubmit");
    for (var d = 0; d < b.length; d++) {
        var c = $("#" + b[d]);
        if (c.length) {
            var a = c.attr("class");
            c.attr("disabled", e);
            if (e) {
                if (a.indexOf("disable") == -1) {
                    c.attr("class", a + " disable")
                }
            } else {
                c.attr("class", a.replace(/disable/gi, "").replace(/(^\s*)|(\s*$)/g, ""))
            }
        }
    }
}
var eObj = new encrypt();

function initFlash(b) {
    var a = getFlashMovieObject(b);
    if (a.GetKey != null) {
        eObj = a
    } else {
        eObj = new encrypt()
    }
}

function getFlashMovieObject(a) {
    if (window.document[a]) {
        return window.document[a]
    }
    if (navigator.appName.indexOf("Microsoft Internet") == -1) {
        if (document.embeds && document.embeds[a]) {
            return document.embeds[a]
        }
    } else {
        return document.getElementById(a)
    }
}

function encrypt() {
    this.GetKey = function(a) {
        return a
    }
}

function CheckeObj() {
    if (eObj == null) {
        eObj = new encrypt()
    }
};