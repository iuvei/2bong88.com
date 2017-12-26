var REFRESH_GAP = true;
var CLS_ODD = "UdrDogOddsClass";
var CLS_EVEN = "FavOddsClass";
var DEPOSIT_LEAGUE_WIDTH = 600;
var MEMBER_LEAGUE_WIDTH = 640;
var fFrame = getParent(window);
var vendorSetting = {
    IsVendor: false,
    IsM88: false,
    IsALog: false,
    IsTLC: false,
    IsSpondemo: false,
    IsDela: false,
    IsSuncity: false,
    IsMayfair: false,
    IsZzun88: false
};
if (fFrame.SiteMode == "2") {
    if (fFrame.Deposit_SiteMode == "3") {
        vendorSetting.IsM88 = true
    } else {
        if (fFrame.Deposit_SiteMode == "4") {
            vendorSetting.IsALog = true
        } else {
            if (fFrame.Deposit_SiteMode == "5") {
                vendorSetting.IsDela = true
            } else {
                if (fFrame.Deposit_SiteMode == "6") {
                    vendorSetting.IsTLC = true
                } else {
                    if (fFrame.Deposit_SiteMode == "7") {
                        vendorSetting.IsSpondemo = true
                    } else {
                        if (fFrame.Deposit_SiteMode == "8") {
                            vendorSetting.IsSuncity = true
                        } else {
                            if (fFrame.Deposit_SiteMode == "9") {
                                vendorSetting.IsMayfair = true
                            } else {
                                if (fFrame.Deposit_SiteMode == "10") {
                                    vendorSetting.IsZzun88 = true
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    vendorSetting.IsVendor = (vendorSetting.IsM88 || vendorSetting.IsALog || vendorSetting.IsTLC || vendorSetting.IsSpondemo || vendorSetting.IsDela || vendorSetting.IsSuncity || vendorSetting.IsMayfair || vendorSetting.IsZzun88)
}
var siteObj = new Object();
Set4HourColor();
SetSelectDateColor();
SetSpanTag();
SetCss();
siteObj._IsPhonebet = fFrame.SiteMode == 1;

function Set4HourColor() {
    if (fFrame.DomainName == "mansion88.com") {
        siteObj._4HourColor = "#26364f"
    } else {
        if (fFrame.DomainName == "bet678.com") {
            siteObj._4HourColor = "#FFE49C"
        } else {
            siteObj._4HourColor = "#003399"
        }
    }
}

function SetSelectDateColor() {
    if (fFrame.DomainName == "mansion88.com") {
        siteObj._SelectDateColor_Def = "#26364f"
    } else {
        if (fFrame.DomainName == "bet678.com") {
            siteObj._SelectDateColor_Def = "#FFE49C"
        } else {
            if (fFrame.SiteId == "4280" || fFrame.SiteId == "4200800" || fFrame.SiteId == "4200200") {
                siteObj._SelectDateColor_Def = "#666666"
            } else {
                if (fFrame.DomainName == "zzun88.com") {
                    siteObj._SelectDateColor_Def = "#EE0000"
                } else {
                    if (fFrame.DomainName == "asiabet88.com") {
                        siteObj._SelectDateColor_Def = "#666666"
                    } else {
                        siteObj._SelectDateColor_Def = "#003399"
                    }
                }
            }
        }
    }
    if (fFrame.SiteId == "4280" || fFrame.SiteId == "4200800" || fFrame.SiteId == "4200200") {
        siteObj._SelectDateColor_Sel = "#0c5790"
    } else {
        siteObj._SelectDateColor_Sel = "#9F0915"
    }
}

function SetSpanTag() {
    if (fFrame.SiteId == "4280" || fFrame.SiteId == "4200800") {
        siteObj._SpanTagS = "<span>";
        siteObj._SpanTagE = "</span>"
    } else {
        siteObj._SpanTagS = "";
        siteObj._SpanTagE = ""
    }
}

function SetCss() {
    if (fFrame.SiteId == "4280" || fFrame.SiteId == "4200800") {
        siteObj._t_Order_Css = " right"
    } else {
        siteObj._t_Order_Css = ""
    }
}

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

function getOddsClass(a) {
    return (a < 0) ? CLS_EVEN : CLS_ODD
}
var bShowLoading = true;
var iRefreshCount = REFRESH_COUNTDOWN;
var RefresHandle;
var TennisMore_ThreadId = null;
var Tennis_More_End = false;
var SoccerMore_ThreadId = null;
var Soccer_More_End = false;

function refreshData() {
    if (typeof(refreshMoreData) != "undefined") {
        refreshMoreData(1);
        refreshMoreData(5)
    }
    if (fFrame.leftFrame == null || fFrame.leftFrame.eObj == null) {
        window.setTimeout("refreshData()", 500);
        return
    }
    if (!REFRESH_GAP) {
        return
    }
    btnstop();
    window.clearTimeout(RefresHandle);
    RefresHandle = window.setTimeout(refreshData, REFRESH_INTERVAL);
    if ((g_OddsKeeper == null) || (iRefreshCount <= 0)) {
        document.DataForm.RT.value = "W";
        iRefreshCount = REFRESH_COUNTDOWN
    } else {
        iRefreshCount--
    }
    if (bShowLoading) {
        document.getElementById("BetList").style.display = "block";
        bShowLoading = false
    }
    if (document.DataForm.key != null) {
        document.DataForm.key.value = fFrame.leftFrame.eObj.GetKey("odds")
    }
    document.DataForm.submit();
    if (PopLauncher != null) {
        if (sKeeper != null && PopLauncher.isOpened) {
            if (ThreadId != null && ThreadId != "") {
                recallAjax(ThreadId)
            }
        } else {
            ThreadId = null
        }
    } else {
        ThreadId = null
    }
}

function btnstop() {
    REFRESH_GAP = false;
    var a = document.getElementById("divSelectDate");
    if ((a != null) && (a.style.display != "none")) {
        for (var b = 0; b < a.childNodes.length; b++) {
            var e = a.childNodes[b];
            if ((e.tagName != null) && (e.tagName.toUpperCase() == "SPAN")) {
                e.disabled = true
            }
        }
    }
    setSelecterDisable("aSorter", true);
    if ($("#selOddsType_Div").length > 0) {
        setSelecterDisable("selOddsType", true)
    }
    if ($("#selLeagueType_Div").length > 0) {
        setSelecterDisable("selLeagueType", true)
    }
    var d = ["btnRefresh", "btnRefresh_L", "btnRefresh_D"];
    for (var c = 0; c < d.length; c++) {
        changeButtonStatus(d[c], true)
    }
}

function btnstart() {
    if (REFRESH_GAP) {
        return
    }
    var a = document.getElementById("divSelectDate");
    if ((a != null) && (a.style.display != "none")) {
        for (var b = 0; b < a.childNodes.length; b++) {
            var e = a.childNodes[b];
            if ((e.tagName != null) && (e.tagName.toUpperCase() == "SPAN")) {
                e.disabled = false
            }
        }
    }
    if ($("#selOddsType_Div").length > 0) {
        setSelecterDisable("selOddsType", false)
    }
    if ($("#selLeagueType_Div").length > 0) {
        setSelecterDisable("selLeagueType", false)
    }
    var d = ["btnRefresh", "btnRefresh_L", "btnRefresh_D"];
    for (var c = 0; c < d.length; c++) {
        changeButtonStatus(d[c], false)
    }
    setSelecterDisable("aSorter", false);
    REFRESH_GAP = true
}

function changeBGColor2(b, a) {
    var c = document.getElementById(b + "_1");
    var d = document.getElementById(b + "_2");
    c.style.backgroundColor = a;
    if (d != null) {
        d.style.backgroundColor = a
    }
}

function changeBGColor3(b, a) {
    var c = document.getElementById(b + "_1");
    var d = document.getElementById(b + "_2");
    var e = document.getElementById(b + "_3");
    c.style.backgroundColor = a;
    d.style.backgroundColor = a;
    e.style.backgroundColor = a
}

function initialTmpl(a, c, b) {
    if (fFrame.hash_TmplLoaded[a] == null) {
        fFrame.document.getElementById(a).contentWindow.location.href = c;
        fFrame.hash_TmplLoaded[a] = true;
        window.setTimeout(b, 500);
        return false
    }
    if (fFrame.document.getElementById(a).contentWindow.document.getElementById("tmplEnd") == null) {
        window.setTimeout(b, 500);
        return false
    }
    return true
}
var LOAD_TMPL_GAP = true;

function loadAllTmpl() {
    var a = new Array();
    a.UnderOver_tmpl_1 = "UnderOver_tmpl.aspx?form=1";
    a.UnderOver_tmpl_3 = "UnderOver_tmpl.aspx?form=3";
    a.UnderOver_tmpl_1F = "UnderOver_tmpl.aspx?form=1F";
    a.UnderOver_tmpl_1H = "UnderOver_tmpl.aspx?form=1H";
    a.NBA_tmpl = "index.php?r=site/NBATmpl";
    a.Baseball_tmpl = "index.php?r=site/BaseballTmpl";
    a.Tennis_tmpl = "index.php?r=site/TennisTmpl";
    a.Cricket_tmpl = "index.php?r=site/CricketTmpl";
    a["1X2_tmpl"] = "1X2_tmpl.aspx";
    a.CorrectScore_tmpl = "CorrectScore_tmpl.aspx";
    a.OeTg_tmpl = "OeTg_tmpl.aspx";
    a.HTFT_tmpl = "HTFT_tmpl.aspx";
    a.OeTg_tmpl = "OeTg_tmpl.aspx";
    a.FGLG_tmpl = "FGLG_tmpl.aspx";
    a.MixParlay_tmpl = "MixParlay_tmpl.aspx?sport=1";
    a.MixParlay_tmpl_NBA = "MixParlay_tmpl.aspx?sport=2";
    a.MixParlay_tmpl_Tennis = "MixParlay_tmpl.aspx?sport=5";
    a.MixParlay_tmpl_Baseball = "MixParlay_tmpl.aspx?sport=8";
    a.MixParlay_tmpl_Cricket = "MixParlay_tmpl.aspx?sport=27";
    a.Horse_tmpl = "Horse_tmpl.aspx";
    a.Horse_Fixed_tmpl = "Horse_Fixed_tmpl.aspx";
    a.Finance_tmpl = "Finance_tmpl.aspx";
    a.Outright_tmpl = "Outright_tmpl.aspx";
    a.Bingo_tmpl = "index.php?r=site/BingoTmpl";
    a.Greyhounds_tmpl = "Greyhounds_tmpl.aspx";
    a.League_tmpl = "Match_tmpl.aspx?Scope=League";
    a.Match_tmpl = "Match_tmpl.aspx?Scope=Match";
    if (LOAD_TMPL_GAP) {
        for (var c in a) {
            if (fFrame.hash_TmplLoaded[c] == null) {
                var b = fFrame.document.getElementById(c);
                if (b != null) {
                    fFrame.document.getElementById(c).contentWindow.location.href = a[c];
                    fFrame.hash_TmplLoaded[c] = true
                }
            }
        }
        LOAD_TMPL_GAP = false
    }
}

function selectDate(c, b) {
    var a;
    if (b != "") {
        if (document.DataForm != null) {
            if (!REFRESH_GAP) {
                return
            }
            a = document.DataForm
        } else {
            if (!REFRESH_GAP_D) {
                return
            }
            a = document.DataForm_D
        }
        a.DT.value = b;
        var d = b.split("/");
        if (d[0].length == 1) {
            d[0] = "0" + d[0]
        }
        if (d[1].length == 1) {
            d[1] = "0" + d[1]
        }
        b = d[2] + d[0] + d[1]
    } else {
        if (document.DataForm != null) {
            a = document.DataForm
        } else {
            a = document.DataForm_D
        }
        a.DT.value = ""
    }
    if (SelKickoffTime != b) {
        SelKickoffTime = b;
        $("#divSelectDate").find("span").css("color", siteObj._SelectDateColor_Def);
        c.style.color = "#9F0915";
        if (typeof(g_OddsKeeper_D) == "object") {
            g_OddsKeeper_D.paintOddsTable()
        } else {
            if (typeof(g_OddsKeeper) == "object") {
                g_OddsKeeper.paintOddsTable()
            }
        }
    }
    btnstop();
    btnstart();
    return;
    var a;
    if (document.DataForm != null) {
        if (!REFRESH_GAP) {
            return
        }
        a = document.DataForm
    } else {
        if (!REFRESH_GAP_D) {
            return
        }
        a = document.DataForm_D
    }
    if (a.DT.value != b) {
        $("#divSelectDate").find("span").css("color", siteObj._SelectDateColor_Def);
        c.style.color = "#9F0915";
        a.DT.value = b;
        a.RT.value = "W"
    }
    if (document.DataForm != null) {
        refreshData()
    } else {
        refreshData_D()
    }
}

function getShowMatchHtml(b, c, a) {
    return "<a href='javascript:showMatchOdds(\"" + b + '", "' + c + '", "' + a + "\");'><img border='0' src='" + fFrame.imgServerURL + "template/public/images/more_game.gif' /></a>"
}

function getStatsHtml(a) {
    return "<a href='javascript:openStatsInfo(\"" + a + "\");' title='" + fFrame.RES_StatisticInfo + '\'><span class="iconOdds stats"></span></a>'
}

function getLiveChartHtml(a) {
    return "<a href='javascript:openLiveChart(\"" + a + "\");' title='" + fFrame.RES_LiveChart + '\'><span class="iconOdds liveChart"></span></a>'
}

function getSportRadarHtml(a, b) {
    return "<a href='javascript:openLiveInfo(\"" + a + "\");' title='" + fFrame.RES_LiveInfo + '\'><span class="iconOdds liveInfo"></span></a>'
}

function openStatsInfo(a) {
    window.open("/index.php?r=site/StatsFrame&MatchId=" + a, "StatsInfo" + a)
}

function openLiveChart(b) {
    var a = function(d, e) {};
    var c = (window.screen.availHeight - 68);
    if (c > 768) {
        c = 768
    }
    fFrame.openWindowsHandle("LiveChart" + b, true, "", "/index.php?r=site/LiveChart&MatchId=" + b, "height=" + c + ", width=1024, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no", false, a)
}

function openLiveInfo(a) {
    window.open("/index.php?r=site/LiveInfo&MatchId=" + a, "LiveInfo" + a)
}

function getRedCardHtml(a) {
    var c = "";
    for (var b = 0; b < a; b++) {
        c += "<img class='code' border='0' src='" + fFrame.imgServerURL + "/images/RedCard.gif' />"
    }
    return c
}

function getFavoritesHtml(e, d, b, c) {
    
	var isFav = false;
	var listFav = getCookie("favorites");
	
	var arrayList = listFav.split('%2C');
	for(var i=0; i<arrayList.length; i++)
	{
		console.log(arrayList[i]);
		if(e=="00"+arrayList[i])
			isFav = true;
	}
	var a = (isFav) ? "iconOdds favoriteAdd" : "iconOdds favorite";
	b = isFav;
	//alert(getCookie("favorites"));
	//return "";
    return "<a href='javascript:addFavorites(\"" + e + '","' + d + '",' + b + "," + c + ");' title='" + (b ? fFrame.RES_RemoveFavorite : fFrame.RES_AddFavorite) + "'><span id='fav_" + e + "' class='" + a + "'></span></a>"
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function getScoreMapHtml(a) {
    var b = fFrame.SiteId;
    if (fFrame.SiteMode == 1) {
        return ""
    }
    return "<a onclick='javascript:popScoreMap(\"" + a + "\");' style='cursor:pointer' title='" + fFrame.RES_ScoreMap + '\'><span class="iconOdds scoreMap"></span></a>'
}

function getScoreHtml(b, a) {
    if (fFrame.SiteMode == 1) {
        return ""
    }
    return "<div id='sco_" + b + "' style='display:inline'><a href='javascript:showScores(\"" + b + '","' + a + "\");'>Score</a></div>"
}

function betBingo(b, c, f, g, e, a) {
    if (CheckIsIpad() && !CheckIScroll()) {
        parent.window.scrollTo(0, 0)
    }
    if (trim(e).length < 1) {
        return false
    }
    var d = document.getElementById("CanBetNumberMsg").value;
    if (fFrame.CanBetNumberGame) {
        fFrame.leftFrame.DoBingoBetProcess(f, g, e, a)
    } else {
        alert(d)
    }
}

function bet(b, c, e, f, d, a) {
    if (CheckIsIpad() && !CheckIScroll()) {
        parent.window.scrollTo(0, 0)
    }
    if (e != "" && d != "") {
        if (!parseInt(b, 10)) {
            fFrame.leftFrame.DoBetProcess(e, f, d, null, null, a)
        } else {
            betParlay(c, e, f, d)
        }
    } else {
        return
    }
}

function ReflashSingleStreaming() {
    if (fFrame.leftFrame != null) {
        var a = fFrame.leftFrame.document.getElementById("iTV");
        var b = a.src;
        a.src = "";
        a.src = b
    }
}
var more_mode;
var PopLauncher;
var sHTML;
var LeaguePage;
var sChkLeagueFunction;
var sSportL = "";

function openLeague(s, r, g, q, b, h, p) {
    more_mode = "SL";
    LeaguePage = p;
    nowsKeeper = null;
    document.getElementById("oPopContainer").innerHTML = "";
    var e = false;
    var d = false;
    if (!initialTmpl("League_tmpl", "/index.php?r=site/LeagueTmpl", "openLeague(" + s + ",'" + r + "','" + g + "','" + q + "','" + b + "','" + h + "','" + p + "');")) {
        return
    }
    if (p == "SportsMixParlay") {
        e = true
    }
    if (p == "Outright") {
        d = true
    }
    GetLeagueHTML(e, d);
    var k = document.getElementById("PopDiv");
    k.style.width = s + "px";
    var o = document.getElementById("PopTitleText");
    var m = document.getElementById("oPopContainer");
    o.innerHTML = r;
    m.innerHTML = sHTML.join("");
    if (PopLauncher == null) {
        var l = document.getElementById("PopTitle");
        var j = document.getElementById("PopCloser");
        PopLauncher = new DivLauncher(k, l, j)
    }
    PopLauncher.open(50, 50, true);
    var n = document.getElementById("chkSave");
    if (IsSaveLeague) {
        n.checked = true
    }
    if (e) {
        var a = sSportL.split(",");
        for (var c = 0; c < a.length; c++) {
            var f = a[c];
            checkLeagueBySport(f)
        }
    } else {
        checkLeague()
    }
}

function GetLeagueHTML(c, b) {
    var g = fFrame.document.getElementById("League_tmpl").contentWindow;
    sHTML = new Array();
    sHTML.push("<div class='popWTableArea'>");
    sHTML.push(g.document.getElementById("League_Header").innerHTML);
    if (b) {
        sHTML.push("<div class='popWBlueArea'>");
        genLeagueHeadTmpl(b);
        for (var a = 0; a < LeagueListBySport.S0.length; a++) {
            sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
            for (var d = 0; d < 2; d++) {
                a += d;
                if (a < LeagueListBySport.S0.length) {
                    genLeagueTmpl(LeagueListBySport.S0[a].SportId, LeagueListBySport.S0[a].LeagueId, LeagueListBySport.S0[a].LeagueName, c, LeagueListBySport.S0[a].Checked)
                } else {
                    genLeagueTmpl("", "", "", c, false)
                }
            }
            sHTML.push("</tr>")
        }
        genLeagueFooterTmpl(b);
        sHTML.push("</div>")
    } else {
        for (var f = 1; f < 162; f++) {
            if (typeof(LeagueListBySport["S" + f]) == "undefined" || LeagueListBySport["S" + f].length == 0) {
                continue
            }
            if (sSportL == "") {
                sSportL = f.toString()
            } else {
                sSportL = sSportL + "," + f.toString()
            }
            genSportTmpl(LeagueListBySport["S" + f][0].SportId, LeagueListBySport["S" + f][0].SportName, c);
            genLeagueHeadTmpl(b);
            if (f == 1) {
                if (SelMainMarket == 1 && !c) {
                    var e = {};
                    e = cloneMainLeague(LeagueListBySport["S" + f]);
                    for (var a = 0; a < e.length; a++) {
                        sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
                        for (var d = 0; d < 2; d++) {
                            a += d;
                            if (a < e.length) {
                                genLeagueTmpl(e[a].SportId, e[a].LeagueId, e[a].LeagueName, c, e[a].Checked)
                            } else {
                                genLeagueTmpl("", "", "", c, false)
                            }
                        }
                        sHTML.push("</tr>")
                    }
                } else {
                    for (var a = 0; a < LeagueListBySport["S" + f].length; a++) {
                        sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
                        for (var d = 0; d < 2; d++) {
                            a += d;
                            if (a < LeagueListBySport["S" + f].length) {
                                genLeagueTmpl(LeagueListBySport["S" + f][a].SportId, LeagueListBySport["S" + f][a].LeagueId, LeagueListBySport["S" + f][a].LeagueName, c, LeagueListBySport["S" + f][a].Checked)
                            } else {
                                genLeagueTmpl("", "", "", c, false)
                            }
                        }
                        sHTML.push("</tr>")
                    }
                }
            } else {
                for (var a = 0; a < LeagueListBySport["S" + f].length; a++) {
                    sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
                    for (var d = 0; d < 2; d++) {
                        a += d;
                        if (a < LeagueListBySport["S" + f].length) {
                            genLeagueTmpl(LeagueListBySport["S" + f][a].SportId, LeagueListBySport["S" + f][a].LeagueId, LeagueListBySport["S" + f][a].LeagueName, c, LeagueListBySport["S" + f][a].Checked)
                        } else {
                            genLeagueTmpl("", "", "", c, false)
                        }
                    }
                    sHTML.push("</tr>")
                }
            }
            genLeagueFooterTmpl(b)
        }
    }
    sHTML.push(g.document.getElementById("League_Footer").innerHTML);
    sHTML.push("</div>")
}

function genSportTmpl(c, d, a) {
    var b = "none";
    if (a) {
        b = "block"
    }
    sHTML.push("<div id='SportArea_" + c + "' class='popWBlueArea'>");
    sHTML.push("<div class='header'>");
    sHTML.push("<span class='icon' onclick='SportControl(" + c + ");' style='display:block;'></span>");
    sHTML.push("<input id='chkSport_" + c + "' type='checkbox' style='display:" + b + ";' onclick='checkAllBySport(" + c + ");' name='chkSport_" + c + "'>");
    sHTML.push("<span class='title' onclick='SportControl(" + c + ");'>" + d + "</span>");
    sHTML.push("</div>")
}

function genLeagueTmpl(h, d, e, c, b) {
    var f = "";
    var g = "block";
    var a = "checkLeague()";
    if (c) {
        a = "checkLeagueBySport(" + h + ")";
        h = d + "_" + h
    } else {
        h = d
    }
    if (b) {
        f = "checked"
    }
    if (d == "") {
        g = "none"
    }
    sHTML.push("<td width='23' style='vertical-align: top;'>");
    sHTML.push("<input id='" + h + "' type='checkbox' style='margin:2px;padding:0; display:" + g + ";' value='" + d + "' onclick='" + a + ";' name='LF' " + f + ">");
    sHTML.push("</td>");
    sHTML.push("<td width='270' style='vertical-align: top;'>");
    sHTML.push(e + "<br></td>");
    sHTML.push("<td width='1'> </td>")
}

function genLeagueHeadTmpl(a) {
    if (!a) {
        sHTML.push("<div class='content'>");
        sHTML.push("<div class='line'></div>")
    }
    sHTML.push("<table class='popWSelectTab' width='100%' border='0' cellspacing='0' cellpadding='0'>");
    sHTML.push("<tbody>")
}

function genLeagueFooterTmpl(a) {
    sHTML.push("</tbody>");
    sHTML.push("</table>");
    if (!a) {
        sHTML.push("</div>");
        sHTML.push("</div>")
    }
}

function checkLeagueBySport(g) {
    var b = "chkSport_" + g;
    var e = document.getElementById(b);
    var c = document.getElementById("chkLFAll");
    var f = document.getElementsByName("LF");
    for (i = 0; i < f.length; i++) {
        if (f[i].value != "0") {
            var a = f[i].value + "_" + g;
            if (document.getElementById(a) != null) {
                var d = document.getElementById(a);
                if (!d.checked) {
                    e.checked = false;
                    c.checked = false;
                    return
                }
            }
        }
    }
    if (e != null) {
        e.checked = true
    }
    checkLeague()
}

function checkLeague() {
    var a = document.getElementById("chkLFAll");
    var b = document.getElementsByName("LF");
    for (i = 0; i < b.length; i++) {
        if (b[i].value != 0) {
            if (!b[i].checked) {
                a.checked = false;
                return
            }
        }
    }
    a.checked = true
}

function checkAllBySport(e) {
    var d = document.getElementsByName("LF");
    var b = "chkSport_" + e;
    var c = document.getElementById(b);
    for (i = 0; i < d.length; i++) {
        if (d[i].value != 0) {
            var a = d[i].value + "_" + e;
            if (document.getElementById(a) != null) {
                d[i].checked = c.checked
            }
        }
    }
    checkLeague()
}

function checkAll() {
    var c = document.getElementsByName("LF");
    var b = document.getElementById("chkLFAll");
    for (i = 0; i < c.length; i++) {
        c[i].checked = b.checked
    }
    for (i = 1; i < 100; i++) {
        var a = "chkSport_" + i;
        if (document.getElementById(a) != null) {
            document.getElementById(a).checked = b.checked
        }
    }
}
var SelLeagueThreadId = "";

function go() {
    var b = document.getElementById("chkLFAll");
    var c = document.getElementsByName("LF");
    var a = document.getElementById("chkSave");
    var f = a.checked ? "1" : "0";
    IsSaveLeague = a.checked ? true : false;
    if (b.checked) {
        for (i = 0; i < c.length; i++) {
            c[i].checked = false
        }
        b.checked = true;
        arr_League = new Array("0")
    } else {
        arr_League = new Array();
        for (i = 0; i < c.length; i++) {
            if (c[i].value == "" || c[i].value == "0") {
                c[i].checked = false
            }
            if (c[i].checked) {
                arr_League.push(c[i].value)
            }
        }
    }
    var d = LeaguePage + "_data.aspx";
    var e = new Object();
    e.market = fFrame.LastSelectedMArket.toLowerCase();
    e.gamemode = fFrame.LastSelectedMenu;
    e.sport = fFrame.LastSelectedSport;
    e.pagename = d.toLowerCase();
    e.selleague = arr_League.toString();
    e.mode = "league";
    e.writedb = f;
    SelLeagueThreadId = "RecSelLeague";
    ExecAjax("RecSelData.aspx", e, "POST", SelLeagueThreadId, "RecSelLeague");
    PopLauncher.close();
    FinalpaintOddsTable()
}

function FinalpaintOddsTable() {
    if (typeof(arr_ShowMixParlay) == "object") {
        var b = new Array();
        var a = new Array();
        if (g_OddsKeeper_L != null) {
            b = g_OddsKeeper_L.getOddsKeeperArray()
        }
        if (g_OddsKeeper_D != null) {
            a = g_OddsKeeper_D.getOddsKeeperArray()
        }
        for (var c in arr_ShowMixParlay) {
            if (arr_ShowMixParlay[c] && b[c] != null) {
                var d = b[c];
                d.paintOddsTable()
            }
            if (arr_ShowMixParlay[c] && a[c] != null) {
                var d = a[c];
                d.paintOddsTable()
            }
        }
    } else {
        if (typeof(arr_OddsKeeper) == "object") {
            for (var c in arr_OddsKeeper) {
                var d = arr_OddsKeeper[c];
                if (d != null) {
                    d.paintOddsTable()
                }
            }
        } else {
            if (typeof(g_OddsKeeper_D) == "object" && g_OddsKeeper_D != null) {
                g_OddsKeeper_D.paintOddsTable()
            }
            if (typeof(g_OddsKeeper_L) == "object" && g_OddsKeeper_L != null) {
                g_OddsKeeper_L.paintOddsTable()
            }
            if (typeof(g_OddsKeeper) == "object" && g_OddsKeeper != null) {
                g_OddsKeeper.paintOddsTable()
            }
        }
    }
    btnstop();
    btnstart()
}

function RecSelLeague(a) {
    if (arr_League.length == 1 && arr_League[0] == "0") {
        SelLeagueCnt = 0
    } else {
        SelLeagueCnt = arr_League.length
    }
    checkLeagueCount()
}

function GetEventBGColor(b) {
    var a = "";
    if (fFrame.SiteMode == "1" || fFrame.SiteMode == "0") {
        if (b == "0") {
            a = "#C6D4F1"
        } else {
            a = "#E4E4E4"
        }
    } else {
        if (fFrame.SiteMode == "2") {
            if (fFrame.Deposit_SiteMode == "1") {
                if (b == "0") {
                    a = "#ffffff"
                } else {
                    a = "#efefef"
                }
            } else {
                if (fFrame.Deposit_SiteMode == "2") {
                    a = "#ffffff"
                } else {
                    if (fFrame.Deposit_SiteMode == "3") {
                        if (b == "0") {
                            a = "#C6D4F1"
                        } else {
                            a = "#F5F5F5"
                        }
                    } else {
                        if (fFrame.Deposit_SiteMode == "4") {
                            if (b == "0") {
                                a = "#EEEEEE"
                            } else {
                                a = "#FFFFFF"
                            }
                        } else {
                            if (fFrame.Deposit_SiteMode == "5") {
                                if (b == "0") {
                                    a = "#FFFFFF"
                                } else {
                                    a = "#E5E5E5"
                                }
                            } else {
                                if (fFrame.Deposit_SiteMode == "6") {
                                    if (b == "0") {
                                        a = "#EEEEEE"
                                    } else {
                                        a = "#FFFFFF"
                                    }
                                } else {
                                    if (fFrame.Deposit_SiteMode == "7") {
                                        a = "#FFFFFF"
                                    } else {
                                        if (fFrame.Deposit_SiteMode == "8") {
                                            if (b == "0") {
                                                a = "#FFFFFF"
                                            } else {
                                                a = "#eaf9fe"
                                            }
                                        } else {
                                            if (fFrame.Deposit_SiteMode == "9") {
                                                if (b == "0") {
                                                    a = "#FFFFFF"
                                                } else {
                                                    a = "#EEEAEA"
                                                }
                                            } else {
                                                if (fFrame.SiteId == "4270" || fFrame.SiteId == "4200700") {
                                                    if (b == "0") {
                                                        a = "#FFFFFF"
                                                    } else {
                                                        a = "#EEEAE9"
                                                    }
                                                } else {
                                                    if (b == "0") {
                                                        a = "#E5E5E5"
                                                    } else {
                                                        a = "#F5F5F5"
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            switch (fFrame.SiteId) {
                case "4201100":
                    if (b == "0") {
                        a = "#e5e5e5"
                    } else {
                        a = "#f5f5f5"
                    }
                    break;
                case "4201400":
                case "4200200":
                    a = "#ffffff";
                    break
            }
        }
    }
    return a
}

function GetLiveBGColor(b) {
    var a = "";
    if (fFrame.SiteMode == "1" || fFrame.SiteMode == "0") {
        if (b == "0") {
            a = "#ffccbc"
        } else {
            a = "#ffddd2"
        }
    } else {
        if (fFrame.SiteMode == "2") {
            if (fFrame.Deposit_SiteMode == "1" || fFrame.Deposit_SiteMode == "5" || fFrame.Deposit_SiteMode == "8") {
                if (b == "0") {
                    a = "#ffccbc"
                } else {
                    a = "#ffddd2"
                }
            } else {
                if (fFrame.Deposit_SiteMode == "2") {
                    if (b == "0") {
                        a = "#c2e5ff"
                    } else {
                        a = "#e8f6ff"
                    }
                } else {
                    if (fFrame.Deposit_SiteMode == "7") {
                        if (b == "0") {
                            a = "#fadac3"
                        } else {
                            a = "#fbe3d2"
                        }
                    } else {
                        if (fFrame.SiteId == "4270" || fFrame.SiteId == "4200700") {
                            a = "#ffffff"
                        } else {
                            if (fFrame.Deposit_SiteMode == "9" || fFrame.SiteId == "4290" || fFrame.SiteId == "4200900") {
                                a = "#fef8d4"
                            } else {
                                if (fFrame.SiteId == "4201200") {
                                    if (b == "0") {
                                        a = "#FFFFFF"
                                    } else {
                                        a = "#FFF5ED"
                                    }
                                } else {
                                    if (fFrame.SiteId == "4200200") {
                                        if (b == "0") {
                                            a = "#c2e5ff"
                                        } else {
                                            a = "#e8f6ff"
                                        }
                                    } else {
                                        if (fFrame.SiteId == "4201400") {
                                            if (b == "0") {
                                                a = "#fbb63d"
                                            } else {
                                                a = "#ecc76e"
                                            }
                                        } else {
                                            if (b == "0") {
                                                a = "#F9E6E6"
                                            } else {
                                                a = "#FBF0F0"
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return a
}

function changeOddsType(c) {
	return;
    if (PopLauncher != null) {
        PopLauncher.close()
    }
    var b = document.getElementById("selOddsType");
    if (b.value != c) {
        b.value = c
    }
    try {
        document.DataForm_D.RT.value;
        document.DataForm_L.OddsType.value = c;
        document.DataForm_D.OddsType.value = c;
        document.DataForm_L.RT.value = "W";
        document.DataForm_D.RT.value = "W";
        refreshAll()
    } catch (a) {
        document.DataForm.OddsType.value = c;
        document.DataForm.RT.value = "W";
        refreshData()
    }
    if (fFrame.topFrame.miniOddsObj != null) {
        fFrame.topFrame.miniOddsObj.Refresh(c)
    }
}

function changeLeagueType(d) {
    if (PopLauncher != null) {
        PopLauncher.close()
    }
    $("#ScoreMapDiv").css("visibility", "hidden");
    $("#PopDiv").css("visibility", "hidden");
    SelMainMarket = d;
    getLeagueList();
    var c = new Object();
    c.market = fFrame.LastSelectedMArket.toLowerCase();
    c.gamemode = fFrame.LastSelectedMenu;
    c.sport = fFrame.LastSelectedSport;
    if (typeof(fFrame.LastSelectedBettype) == "undefined") {
        c.pagename = "T"
    } else {
        c.pagename = fFrame.LastSelectedBettype
    }
    c.selmainmarket = SelMainMarket.toString();
    c.mode = "mainmarket";
    SelLeagueThreadId = "RecSelMainMarket";
    ExecAjax("RecSelData.aspx", c, "POST", SelLeagueThreadId, "RecSelMainMarket");
    if (typeof(arr_OddsKeeper) == "object") {
        for (var a in arr_OddsKeeper) {
            var b = arr_OddsKeeper[a];
            b.paintOddsTable()
        }
    } else {
        if (typeof(g_OddsKeeper_D) == "object" && g_OddsKeeper_D != null) {
            g_OddsKeeper_D.paintOddsTable()
        }
        if (typeof(g_OddsKeeper_L) == "object" && g_OddsKeeper_L != null) {
            g_OddsKeeper_L.paintOddsTable()
        }
        if (typeof(g_OddsKeeper) == "object" && g_OddsKeeper != null) {
            g_OddsKeeper.paintOddsTable()
        }
    }
    btnstop();
    btnstart()
}

function RecSelMainMarket(a) {}

function showLeagueOdds(a, c, b) {
    window.location.href = "Match.aspx?Scope=League&Id=" + a + "&Sport=" + c + "&Market=" + b
}

function showMatchOdds(b, c, a) {
    window.location.href = "Match.aspx?Scope=Match&Id=" + b + "&Sport=" + c + "&Market=" + a
}
var btnStartHandle_L;
var btnStartHandle_D;

function afterRepaintTable(c) {
    var a;
    if (c.parentNode.id == "oTableContainer_L") {
        document.DataForm_L.RT.value = "U";
        a = document.getElementById("oTableContainer_D");
        window.clearTimeout(btnStartHandle_L);
        btnStartHandle_L = setTimeout("startButton('l');", 3000)
    } else {
        document.DataForm_D.RT.value = "U";
        a = document.getElementById("oTableContainer_L");
        window.clearTimeout(btnStartHandle_D);
        btnStartHandle_D = setTimeout("startButton('d');", 3000)
    }
    document.getElementById("BetList").style.display = "none";
    document.getElementById("OddsTr").style.display = "block";
    var b = 0;
    if (c.tBodies.length > 0) {
        b = c.tBodies.length - 1
    }
    if (c.tBodies[b].rows.length <= 1) {
        c.parentNode.style.display = "none";
        if (a.style.display == "none") {
            document.getElementById("TrNoInfo").style.display = "block"
        } else {
            document.getElementById("TrNoInfo").style.display = "none"
        }
        if (c.parentNode.id == "oTableContainer_L") {
            document.getElementById("btnRefresh_L").style.display = "none";
            if (fFrame.SiteMode == 2) {
                if (fFrame.Deposit_SiteMode == 2) {
                    document.getElementById("RunningGames").style.display = "none"
                }
            }
        } else {
            document.getElementById("btnRefresh_D").style.display = "none";
            if (fFrame.SiteMode == 2) {
                if (fFrame.Deposit_SiteMode == 2) {
                    document.getElementById("sub_title").style.display = "none"
                }
            }
        }
    } else {
        c.parentNode.style.display = "";
        document.getElementById("TrNoInfo").style.display = "none";
        if (c.parentNode.id == "oTableContainer_L") {
            document.getElementById("btnRefresh_L").style.display = "";
            if (fFrame.SiteMode == 2) {
                if (fFrame.Deposit_SiteMode == 2) {
                    document.getElementById("RunningGames").style.display = ""
                }
            }
        } else {
            if (this.SportType != "154") {
                document.getElementById("btnRefresh_D").style.display = "none"
            } else {
                document.getElementById("btnRefresh_D").style.display = ""
            }
            if (fFrame.SiteMode == 2) {
                if (fFrame.Deposit_SiteMode == 2) {
                    document.getElementById("sub_title").style.display = ""
                }
            }
            document.getElementById("btnRefresh_D").style.display = ""
        }
    }
    if (typeof(myScroll) != "undefined") {
        myScroll.refresh()
    }
}

function refreshAll() {
    if ((PAGE_MARKET == "t") && (fFrame.SiteMode != 1)) {
        refreshData_L()
    } else {
        document.getElementById("oTableContainer_L").style.display = "none";
        if (fFrame.SiteMode == 2) {
            if (fFrame.Deposit_SiteMode == 2) {
                document.getElementById("RunningGames").style.display = "none"
            }
        }
    }
    refreshData_D()
}
var REFRESH_GAP_L = true;
var bShowLoading_L = true;
var iRefreshCount_L = REFRESH_COUNTDOWN;
var RefresHandle_L;
var Tennis_More = false;
var Soccer_More = false;

function refreshData_L() {
    if (typeof(refreshMoreData) != "undefined") {
        refreshMoreData_L(1);
        refreshMoreData_L(5)
    }
    if (fFrame.leftFrame == null || fFrame.leftFrame.eObj == null) {
        window.setTimeout("refreshData_L()", 500);
        return
    }
    if (!REFRESH_GAP_L) {
        return
    }
    window.clearTimeout(CounterHandle_L);
    window.clearTimeout(RefresHandle_L);
    stopButton("l");
    if ((g_OddsKeeper_L == null) || (iRefreshCount_L <= 0)) {
        document.DataForm_L.RT.value = "W";
        iRefreshCount_L = REFRESH_COUNTDOWN
    } else {
        iRefreshCount_L--
    }
    if (bShowLoading_L) {
        document.getElementById("BetList").style.display = "block";
        bShowLoading_L = false
    }
    if (document.DataForm_L.key != null) {
        document.DataForm_L.key.value = fFrame.leftFrame.eObj.GetKey("lodds")
    }
    document.DataForm_L.submit();
    if (PopLauncher != null) {
        if (sKeeper != null && PopLauncher.isOpened) {
            if (sKeeper.Market == "L") {
                if (ThreadId != null && ThreadId != "") {
                    recallAjax(ThreadId)
                }
            }
        } else {
            ThreadId = null
        }
    } else {
        ThreadId = null
    }
}
var REFRESH_GAP_D = true;
var bShowLoading_D = true;
var iRefreshCount_D = REFRESH_COUNTDOWN;
var RefresHandle_D;

function refreshData_D() {
    if (typeof(refreshMoreData) != "undefined") {
        refreshMoreData_D(1);
        refreshMoreData_D(5)
    }
    if (fFrame.leftFrame == null || fFrame.leftFrame.eObj == null) {
        window.setTimeout("refreshData_D()", 500);
        return
    }
    if ((PAGE_MARKET == "l") && (fFrame.SiteMode == 1)) {
        refreshData();
        return
    }
    if (!REFRESH_GAP_D) {
        return
    }
    window.clearTimeout(CounterHandle_D);
    window.clearTimeout(RefresHandle_D);
    stopButton("d");
    if ((g_OddsKeeper_D == null) || (iRefreshCount_D <= 0)) {
        document.DataForm_D.RT.value = "W";
        iRefreshCount_D = REFRESH_COUNTDOWN
    } else {
        iRefreshCount_D--
    }
    if (bShowLoading_D) {
        document.getElementById("BetList").style.display = "block";
        bShowLoading_D = false
    }
    if (document.DataForm_D.key != null) {
        document.DataForm_D.key.value = fFrame.leftFrame.eObj.GetKey("dodds")
    }
    document.DataForm_D.submit();
    if (PopLauncher != null) {
        if (sKeeper != null && PopLauncher.isOpened) {
            if (sKeeper.Market != "L") {
                if (ThreadId != null && ThreadId != "") {
                    recallAjax(ThreadId)
                }
            }
        } else {
            ThreadId = null
        }
    } else {
        ThreadId = null
    }
}

function changeButtonStatus(a, d, e) {
    var b = "";
    var c = false;
    var f = RES_REFRESH;
    if (d) {
        b = " disable";
        c = true;
        f = RES_PLEASE_WAIT
    }
    $("#" + a).each(function() {
        this.title = f;
        this.className = "button" + b;
        this.firstChild.innerHTML = '<div class="icon-refresh" title="' + f + '"></div>' + (e == null ? "" : e);
        this.disabled = c
    });
    $('a[name="' + a + '"]').each(function() {
        this.title = f;
        this.className = "btnIcon right" + b;
        this.firstChild.title = f;
        this.disabled = c
    })
}

function stopButton(c) {
    var a = document.getElementById("divSelectDate");
    if ((a != null) && (a.style.display != "none")) {
        for (var b = 0; b < a.childNodes.length; b++) {
            var d = a.childNodes[b];
            if ((d.tagName != null) && (d.tagName.toUpperCase() == "SPAN")) {
                d.disabled = true
            }
        }
    }
    if (c == "l") {
        sw1 = false
    } else {
        sw2 = false
    }
    setSelecterDisable("aSorter", true);
    if (c == "l") {
        REFRESH_GAP_L = false;
        changeButtonStatus("btnRefresh_L", true)
    } else {
        REFRESH_GAP_D = false;
        changeButtonStatus("btnRefresh_D", true);
        if ($("#HourContainer_Div").length > 0) {
            setSelecterDisable("HourContainer", true)
        }
    }
    if ($("#selOddsType_Div").length > 0) {
        setSelecterDisable("selOddsType", true)
    }
    if ($("#selLeagueType_Div").length > 0) {
        setSelecterDisable("selLeagueType", true)
    }
    var e = setTimeout("startButton('" + c + "')", 15000)
}
var sw1 = true,
    sw2 = true;

function startButton(d) {
    if ((d == "l") && (REFRESH_GAP_L)) {
        return
    } else {
        if ((d == "d") && (REFRESH_GAP_D)) {
            return
        } else {
            if ((fFrame.SiteMode == 1) && (d == "t") && (REFRESH_GAP_D)) {
                return
            } else {
                if ((fFrame.SiteMode == 1) && (d == "e") && (REFRESH_GAP_D)) {
                    return
                }
            }
        }
    }
    if (d == "l") {
        sw1 = true
    } else {
        sw2 = true
    }
    var a = document.getElementById("divSelectDate");
    if ((a != null) && (a.style.display != "none")) {
        for (var b = 0; b < a.childNodes.length; b++) {
            var e = a.childNodes[b];
            if ((e.tagName != null) && (e.tagName.toUpperCase() == "SPAN")) {
                e.disabled = false
            }
        }
    }
    var c;
    if (d == "l") {
        REFRESH_GAP_L = true;
        c = REFRESH_INTERVAL_L / 1000 - 1;
        CounterHandle_L = setTimeout("countdown('l'," + c + ")", 1000);
        changeButtonStatus("btnRefresh_L", false, c)
    } else {
        REFRESH_GAP_D = true;
        c = REFRESH_INTERVAL_D / 1000 - 1;
        if (fFrame.SiteMode == 1) {
            window.clearTimeout(CounterHandle_D);
            window.clearTimeout(RefresHandle_D)
        }
        CounterHandle_D = setTimeout("countdown('d'," + c + ")", 1000);
        changeButtonStatus("btnRefresh_D", false, c);
        if ($("#HourContainer_Div").length > 0) {
            setSelecterDisable("HourContainer", false)
        }
    }
    setSelecterDisable("aSorter", false);
    if ($("#selOddsType_Div").length > 0) {
        setSelecterDisable("selOddsType", false)
    }
    if ($("#selLeagueType_Div").length > 0) {
        setSelecterDisable("selLeagueType", false)
    }
}

function paintRefreshBtn(b) {
    var c = ["btnRefresh", "btnRefresh_L", "btnRefresh_D"];
    for (var a = 0; a < c.length; a++) {
        changeButtonStatus(c[a], false)
    }
}
var CountDownList = new Array();

function GameCountDown() {
    for (key in CountDownList) {
        var a = document.getElementById(key);
        if (a != null) {
            CountDownList[key] = parseInt(CountDownList[key], 10) - 1;
            if (CountDownList[key] <= 0) {
                CountDownList[key] = 0;
                a.innerHTML = RES_NOMOREBET;
                $(a).prev()[0].style.display = "none"
            } else {
                a.innerHTML = CountDownList[key] + (typeof(RES_Seconds) == "undefined" ? "" : ("&nbsp;" + RES_Seconds));
                $(a).prev()[0].style.display = ""
            }
        }
    }
}

function countdown(d, a) {
    var b;
    var c;
    if (d == "l") {
        if (!REFRESH_GAP_L) {
            return
        }
        if (a <= 0) {
            refreshData_L();
            return
        }
        b = document.getElementById("btnRefresh_L");
        b.title = RES_LIVE;
        if (b.hasChildNodes()) {
            b.firstChild.innerHTML = '<div class="icon-refresh" title="' + RES_LIVE + '"></div>' + a
        }
        CounterHandle_L = setTimeout("countdown('" + d + "'," + (a - 1) + ")", 1000)
    } else {
        if (!REFRESH_GAP_D) {
            return
        }
        if (a <= 0) {
            refreshData_D();
            return
        }
        b = document.getElementById("btnRefresh_D");
        b.title = RES_REFRESH;
        b.innerHTML = '<span><div class="icon-refresh" title="' + RES_REFRESH + '"></div>' + a + "</span>";
        CounterHandle_D = setTimeout("countdown('" + d + "'," + (a - 1) + ")", 1000)
    }
}

function checkLeagueCount() {
    var a = SelMainMarket == 1 ? TotlaMainLeagueCnt : TotlaLeagueCnt;
    if (document.getElementById("League_New")) {
        if (typeof(a) == "undefined" || a == "0") {
            document.getElementById("League_New").className = "displayOff";
            document.getElementById("League_Old").className = "";
            return
        }
        document.getElementById("League_New").className = "";
        document.getElementById("League_Old").className = "displayOff";
        if (TotlaSelLeagueCnt == 0) {
            document.getElementById("SelLeagueIcon").className = "displayOff";
            document.getElementById("CustSelL").className = "selected displayOff";
            document.getElementById("AllSelL").className = "displayOn"
        } else {
            document.getElementById("SelLeagueIcon").className = "displayOn";
            document.getElementById("CustSelL").className = "selected displayOn";
            document.getElementById("AllSelL").className = "displayOff"
        }
        if (parseInt(TotlaSelLeagueCnt, 10) > parseInt(a, 10)) {
            document.getElementById("CustSelL").innerHTML = a
        } else {
            document.getElementById("CustSelL").innerHTML = TotlaSelLeagueCnt
        }
        document.getElementById("AllSelL").innerHTML = a;
        document.getElementById("TotalLeagueCnt").innerHTML = a
    }
}

function checkHasParlay(d, f) {
    try {
        var a = 0;
        if (d.toUpperCase() == "L") {
            a = fFrame.leftFrame.IsHaveLiveParlay() ? 1 : 0
        } else {
            a = fFrame.leftFrame.GetParlayCount(d, f)
        }
        var c = document.getElementById("b_SwitchToParlay");
        if (c != null) {
            if (a > 0) {
                c.style.display = "block"
            } else {
                c.style.display = "none"
            }
            setTimeout("checkHasParlay('" + d + "','" + f + "')", 2000)
        }
    } catch (b) {
        setTimeout("checkHasParlay('" + d + "','" + f + "')", 1000)
    }
}

function SwitchToParlay(b) {
    try {
        if (b == "0") {
            fFrame.leftFrame.SwitchSport("LP", b)
        } else {
            fFrame.leftFrame.ShowOdds("P", b)
        }
        fFrame.leftFrame.ReloadWaitingBetList("yes", "no", "1")
    } catch (a) {}
}

function setRefreshSort() {
    setSelecterDisable("aSorter", true);
    if (document.DataForm_L != null) {
        var a = document.DataForm_L.OrderBy.value;
        var b = (fFrame.UserLang == "it" || fFrame.UserLang == "jp") ? "en" : fFrame.UserLang;
        if (a == "1") {
            document.DataForm_L.OrderBy.value = "0";
            document.DataForm_D.OrderBy.value = "0";
            if (g_OddsKeeper_L != null) {
                g_OddsKeeper_L.SortType = 0
            }
            g_OddsKeeper_D.SortType = 0
        } else {
            document.DataForm_L.OrderBy.value = "1";
            document.DataForm_D.OrderBy.value = "1";
            if (g_OddsKeeper_L != null) {
                g_OddsKeeper_L.SortType = 1
            }
            g_OddsKeeper_D.SortType = 1
        }
        if ((PAGE_MARKET == "t") && (fFrame.SiteMode != 1)) {
            document.DataForm_L.RT.value = "W";
            refreshData_L()
        }
        document.DataForm_D.RT.value = "W";
        refreshData_D()
    }
    if (document.DataForm != null) {
        var a = document.DataForm.OrderBy.value;
        var b = (fFrame.UserLang == "it" || fFrame.UserLang == "jp") ? "en" : fFrame.UserLang;
        if (a == "1") {
            document.DataForm.OrderBy.value = "0";
            g_OddsKeeper.SortType = 0
        } else {
            document.DataForm.OrderBy.value = "1";
            g_OddsKeeper.SortType = 1
        }
        document.DataForm.RT.value = "W";
        refreshData()
    }
}

function ChangeCursor(a) {
    if (trim($(":first-child", a).html()).length > 0) {
        a.style.cursor = "pointer"
    } else {
        a.style.cursor = "auto"
    }
}

function SingleNumberWheelMouseMove(a, c) {
    ChangeCursor(a);
    var b = c;
    if (document.getElementById(c).className.indexOf("trbgov") == -1) {
        document.getElementById(c).className = document.getElementById(c).className + " trbgov"
    }
    if (a.className.indexOf("trbgov") == -1) {
        a.className = a.className + " trbgov"
    }
}

function SingleNumberWheelMouseOut(a, b) {
    document.getElementById(b).className = document.getElementById(b).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "");
    a.className = a.className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
}

function BingoMouseMove(f) {
    ChangeCursor(f);
    var a = f.id.split("_");
    var b = parseInt(a[2], 10);
    var e = "";
    if (a.length == 4) {
        e = "_" + a[3]
    }
    switch (a[1]) {
        case "1":
            for (var c = 5 * b - 4; c <= 5 * b; c++) {
                if (document.getElementById(a[0] + "_5_" + c + e).className.indexOf("trbgov") == -1) {
                    document.getElementById(a[0] + "_5_" + c + e).className = document.getElementById(a[0] + "_5_" + c + e).className + " trbgov"
                }
            }
            break;
        case "2":
            for (var c = 15 * b - 14; c <= 15 * b; c++) {
                if (document.getElementById(a[0] + "_5_" + c + e).className.indexOf("trbgov") == -1) {
                    document.getElementById(a[0] + "_5_" + c + e).className = document.getElementById(a[0] + "_5_" + c + e).className + " trbgov"
                }
            }
            break;
        case "3":
            for (var c = 25 * b - 24; c <= 25 * b; c++) {
                if (document.getElementById(a[0] + "_5_" + c + e).className.indexOf("trbgov") == -1) {
                    document.getElementById(a[0] + "_5_" + c + e).className = document.getElementById(a[0] + "_5_" + c + e).className + " trbgov"
                }
            }
            break;
        case "4":
            for (var c = 0; c <= 14; c++) {
                var d = c * 5 + b;
                if (document.getElementById(a[0] + "_5_" + d + e).className.indexOf("trbgov") == -1) {
                    document.getElementById(a[0] + "_5_" + d + e).className = document.getElementById(a[0] + "_5_" + d + e).className + " trbgov"
                }
            }
            break
    }
    if (f.className.indexOf("trbgov") == -1) {
        f.className = f.className + " trbgov"
    }
}

function BingoMouseOut(f) {
    var a = f.id.split("_");
    var b = parseInt(a[2], 10);
    var e = "";
    if (a.length == 4) {
        e = "_" + a[3]
    }
    switch (a[1]) {
        case "1":
            for (var c = 5 * b - 4; c <= 5 * b; c++) {
                document.getElementById(a[0] + "_5_" + c + e).className = document.getElementById(a[0] + "_5_" + c + e).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
            }
            break;
        case "2":
            for (var c = 15 * b - 14; c <= 15 * b; c++) {
                document.getElementById(a[0] + "_5_" + c + e).className = document.getElementById(a[0] + "_5_" + c + e).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
            }
            break;
        case "3":
            for (var c = 25 * b - 24; c <= 25 * b; c++) {
                document.getElementById(a[0] + "_5_" + c + e).className = document.getElementById(a[0] + "_5_" + c + e).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
            }
            break;
        case "4":
            for (var c = 0; c <= 14; c++) {
                var d = c * 5 + b;
                document.getElementById(a[0] + "_5_" + d + e).className = document.getElementById(a[0] + "_5_" + d + e).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
            }
            break
    }
    f.className = f.className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
}
var sKeeper = null;

function DivPopMore(p, g, e, b, a, d, c, h, o) {
    if (PopLauncher != null) {
        PopLauncher.close();
        PopLauncher = null
    }
    if (!initialTmpl("MorePop_tmpl", "/index.php?r=site/MorePupopTpl", "DivPopMore(" + p + ",'" + g + "','" + e + "','" + b + "','" + a + "','" + d + "','" + c + "','" + h + "','" + o + "');")) {
        return
    }
    var f = "D";
    if (c == "true") {
        f = "L"
    }
    document.getElementById("oPopContainer").innerHTML = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById(o + f).innerHTML;
    sKeeper = new SimpleOddsKeeper();
    sKeeper.MUID = h;
    sKeeper.MatchId = g;
    sKeeper.TableContainer = document.getElementById("oPopContainer");
    sKeeper.DivTmpl = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById(o + f).innerHTML;
    sKeeper.isParlay = d;
    sKeeper.Market = f;
    var k = document.getElementById("PopDiv");
    k.style.width = (p + 100) + "px";
    var m = document.getElementById("PopTitleText");
    m.style.width = p + "px";
    if (PopLauncher == null) {
        var l = document.getElementById("PopTitle");
        var j = document.getElementById("PopCloser");
        PopLauncher = new DivLauncher(k, l, j)
    }
    var n = new Object();
    n.matchid = g;
    n.Market = f;
    n.tag = o;
    n.isparlay = d;
    ThreadId = o;
    switch (o) {
        case "UnderOver_MoreDiv":
            more_mode = "OU";
            m.innerHTML = b + " -vs- " + a;
            ExecAjax("MorePop_data.aspx", n, "GET", o, "OpenUnderOverPopDiv");
            break;
        case "Bingo_MoreDiv":
        default:
            more_mode = "NG";
            m.innerHTML = RES_B90 + " - " + b;
            ExecAjax("MorePop_data.aspx", n, "GET", o, "OpenBingoPopDiv");
            break
    }
}

function OpenBingoPopDiv(Response) {
    if (more_mode != "NG") {
        return
    }
    eval(Response);
    if (ajaxData.length == 0) {
        ThreadId = null;
        sKeeper = null;
        PopLauncher.close();
        return
    }
    var oldHash = new Object();
    for (var o in sKeeper.oHash) {
        oldHash[o] = sKeeper.oHash[o]
    }
    var first = typeof(sKeeper.oHash.MatchId) == "undefined";
    sKeeper.setDatas(ajaxData, MultiSportODDS_DEF[90]);
    sKeeper.newHash.Changed_90_1 = "";
    for (var i = 1; i <= 15; i++) {
        sKeeper.newHash["Odds_90_1_" + i + "_Cls"] = getOddsClass(sKeeper.oHash["Odds_90_1_" + i]);
        if (oldHash["Odds_90_1_" + i] != sKeeper.oHash["Odds_90_1_" + i] && !first) {
            sKeeper.newHash.Changed_90_1 = CLS_UPD
        }
    }
    sKeeper.newHash.Changed_90_2 = "";
    sKeeper.newHash.Changed_90_4 = "";
    for (var i = 1; i <= 5; i++) {
        sKeeper.newHash["Odds_90_2_" + i + "_Cls"] = getOddsClass(sKeeper.oHash["Odds_90_2_" + i]);
        if (oldHash["Odds_90_2_" + i] != sKeeper.oHash["Odds_90_2_" + i] && !first) {
            sKeeper.newHash.Changed_90_2 = CLS_UPD
        }
        sKeeper.newHash["Odds_90_4_" + i + "_Cls"] = getOddsClass(sKeeper.oHash["Odds_90_4_" + i]);
        if (oldHash["Odds_90_4_" + i] != sKeeper.oHash["Odds_90_4_" + i] && !first) {
            sKeeper.newHash.Changed_90_4 = CLS_UPD
        }
    }
    sKeeper.newHash.Changed_90_3 = "";
    for (var i = 1; i <= 3; i++) {
        sKeeper.newHash["Odds_90_3_" + i + "_Cls"] = getOddsClass(sKeeper.oHash["Odds_90_3_" + i]);
        if (oldHash["Odds_90_3_" + i] != sKeeper.oHash["Odds_90_3_" + i] && !first) {
            sKeeper.newHash.Changed_90_3 = CLS_UPD
        }
    }
    for (var i = 1; i <= 75; i++) {
        sKeeper.newHash["Odds_90_5_" + i + "_Cls"] = getOddsClass(sKeeper.oHash["Odds_90_5_" + i]);
        sKeeper.newHash["Changed_90_5_" + i] = "";
        if (oldHash["Odds_90_5_" + i] != sKeeper.oHash["Odds_90_5_" + i] && !first) {
            sKeeper.newHash["Changed_90_5_" + i] = CLS_UPD
        }
    }
    sKeeper.oHash.MatchId = sKeeper.MatchId;
    sKeeper.newHash.isParlay = sKeeper.isParlay;
    sKeeper.paintOddsTable();
    if (ThreadId != null && ThreadId != "" && more_mode == "NG") {
        var y = 120;
        if (CheckIsIpad()) {
            y += parent.window.pageYOffset
        }
        PopLauncher.open(100, y)
    }
}

function Rechkskeeper_5_15() {
    if (sKeeper != null && more_mode == "OU") {
        if (window.top.DisplayMode == 3) {
            sKeeper.newHash.SHOW5_15 = CLS_LS_OFF
        } else {
            if (sKeeper.oHash.OddsId_5 != null || sKeeper.oHash.OddsId_15 != null) {
                sKeeper.newHash.SHOW5_15 = CLS_LS_ON
            } else {
                sKeeper.newHash.SHOW5_15 = CLS_LS_OFF
            }
        }
        sKeeper.paintOddsTable()
    }
}

function OpenUnderOverPopDiv(Response) {
    if (more_mode != "OU") {
        return
    }
    eval(Response);
    if (ajaxData.length == 0) {
        ThreadId = null;
        sKeeper = null;
        PopLauncher.close();
        return
    }
    var oldHash = new Object();
    for (var o in sKeeper.oHash) {
        oldHash[o] = sKeeper.oHash[o]
    }
    var betType = new Array("5", "15", "24", "25", "26", "27", "13", "28", "121", "122", "123", "2", "12", "6", "14", "16", "4", "30", "126", "127");
    for (var i = 0; i < betType.length; i++) {
        if (ajaxData[betType[i]] != null) {
            sKeeper.setDatas(ajaxData[betType[i]], MultiSportODDS_DEF[parseInt(betType[i], 10)]);
            var oddsName;
            for (var j = 1; j < MultiSportODDS_DEF[parseInt(betType[i], 10)].length; j++) {
                oddsName = MultiSportODDS_DEF[parseInt(betType[i], 10)][j];
                if (oddsName.substr(0, 5) == "Odds_") {
                    sKeeper.newHash[oddsName + "_Cls"] = getOddsClass(sKeeper.oHash[oddsName])
                }
            }
            if (betType[i] == "28") {
                sKeeper.newHash.Odds_28_hdp = sKeeper.oHash.Odds_28_hdpx.replace(" ", "")
            }
        }
    }
    if (oldHash.MatchId != null) {
        sKeeper.oHash = sKeeper.updateOdds(oldHash, sKeeper.oHash, betType)
    }
    if (window.top.DisplayMode == 3 || sKeeper.isParlay == 1) {
        sKeeper.newHash.SHOW5_15 = CLS_LS_OFF
    } else {
        if (ajaxData["5"] != null || ajaxData["15"] != null) {
            sKeeper.newHash.SHOW5_15 = CLS_LS_ON
        } else {
            sKeeper.newHash.SHOW5_15 = CLS_LS_OFF
        }
    }
    if (ajaxData["121"] != null || ajaxData["122"] != null) {
        sKeeper.newHash.SHOW121_122 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW121_122 = CLS_LS_OFF
    }
    if (ajaxData["123"] != null || ajaxData["25"] != null) {
        sKeeper.newHash.SHOW123_25 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW123_25 = CLS_LS_OFF
    }
    if (ajaxData["24"] != null) {
        sKeeper.newHash.SHOW24 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW24 = CLS_LS_OFF
    }
    if (ajaxData["26"] != null || ajaxData["27"] != null) {
        sKeeper.newHash.SHOW26_27 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW26_27 = CLS_LS_OFF
    }
    if (ajaxData["13"] != null) {
        sKeeper.newHash.SHOW13 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW13 = CLS_LS_OFF
    }
    if (ajaxData["28"] != null) {
        sKeeper.newHash.SHOW28 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW28 = CLS_LS_OFF
    }
    if (ajaxData["2"] != null || ajaxData["12"] != null) {
        sKeeper.newHash.SHOW2_12 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW2_12 = CLS_LS_OFF
    }
    if (ajaxData["6"] != null) {
        sKeeper.newHash.SHOW6 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW6 = CLS_LS_OFF
    }
    if (ajaxData["126"] != null) {
        sKeeper.newHash.SHOW126 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW126 = CLS_LS_OFF
    }
    if (ajaxData["14"] != null) {
        sKeeper.newHash.SHOW14 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW14 = CLS_LS_OFF
    }
    if (ajaxData["127"] != null) {
        sKeeper.newHash.SHOW127 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW127 = CLS_LS_OFF
    }
    if (ajaxData["16"] != null) {
        sKeeper.newHash.SHOW16 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW16 = CLS_LS_OFF
    }
    if (ajaxData["4"] != null) {
        sKeeper.newHash.SHOW4 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW4 = CLS_LS_OFF
    }
    if (ajaxData["30"] != null) {
        sKeeper.newHash.SHOW30 = CLS_LS_ON
    } else {
        sKeeper.newHash.SHOW30 = CLS_LS_OFF
    }
    sKeeper.oHash.MatchId = sKeeper.MatchId;
    sKeeper.newHash.isParlay = sKeeper.isParlay;
    sKeeper.paintOddsTable();
    if (ThreadId != null && ThreadId != "" && more_mode == "OU") {
        var y = 120;
        if (CheckIsIpad()) {
            y += parent.window.pageYOffset
        }
        PopLauncher.open(100, y)
    }
}

function ConvertArrayIndex(a, c) {
    for (var b = 0; b < a.length; b++) {
        if (a[b] == c) {
            return b
        }
    }
    return -1
}

function SwpA(a, b, c) {
    var d = a[b];
    a[b] = a[c];
    a[c] = d
}
var ARR_FIELDS_ORG = null;
var ARR_FIELDS_ORG1 = null;
var SwpDEF_FLAG = false;

function SwpD(a) {
    if (SwpDEF_FLAG) {
        return
    }
    SwpDEF_FLAG = true;
    if (ARR_FIELDS_ORG == null) {
        ARR_FIELDS_ORG = ARR_FIELDS_DEF["1"].slice(0, ARR_FIELDS_DEF["1"].length)
    }
    if (ARR_FIELDS_ORG1 == null) {
        ARR_FIELDS_ORG1 = ARR_FIELDS_DEF1["1"].slice(0, ARR_FIELDS_DEF1["1"].length)
    }
    for (var b = 1; b < a.length; b++) {
        SwpA(ARR_FIELDS_DEF["1"], a[b - 1], a[b]);
        SwpA(ARR_FIELDS_DEF1["1"], a[b - 1], a[b])
    }
}
var InsDEF_FLAG = false;

function InsD(a) {
    if (InsDEF_FLAG) {
        return
    }
    InsDEF_FLAG = true;
    if (ARR_FIELDS_ORG == null) {
        ARR_FIELDS_ORG = ARR_FIELDS_DEF["1"].slice(0, ARR_FIELDS_DEF["1"].length)
    }
    if (ARR_FIELDS_ORG1 == null) {
        ARR_FIELDS_ORG1 = ARR_FIELDS_DEF1["1"].slice(0, ARR_FIELDS_DEF1["1"].length)
    }
    for (var b = 0; b < a.length; b++) {
        ARR_FIELDS_DEF["1"] = arrayInsert(ARR_FIELDS_DEF["1"], a[b], ["XIBCX"]);
        ARR_FIELDS_DEF1["1"] = arrayInsert(ARR_FIELDS_DEF1["1"], a[b], ["XIBCX"])
    }
}

function RstrD() {
    SwpDEF_FLAG = false;
    InsDEF_FLAG = false;
    if (ARR_FIELDS_ORG != null) {
        ARR_FIELDS_DEF["1"] = ARR_FIELDS_ORG;
        ARR_FIELDS_ORG = null
    }
    if (ARR_FIELDS_ORG1 != null) {
        ARR_FIELDS_DEF1["1"] = ARR_FIELDS_ORG1;
        ARR_FIELDS_ORG1 = null
    }
};