var fFrame = getParent(window);
var TR_0 = "bgcpe";
var TR_1 = "bgcpelight";
var g_OddsKeeper_L = null;
var g_OddsKeeper_D = null;
var CounterHandle_L;
var CounterHandle_D;

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

function ShowBetList(g, h, f, d, i, e, l, m, n, k) {
    var a;
    var b;
    var c;
    if (f == "l") {
        a = document.DataForm_L;
        b = DataFrame_L;
        c = g_OddsKeeper_L
    } else {
        a = document.DataForm_D;
        b = DataFrame_D;
        c = g_OddsKeeper_D
    }
    a.CT.value = h;
    if (g == "U") {
        if (c == null) {
            if (f == "l") {
                refreshData_L()
            } else {
                refreshData_D()
            }
            return
        }
        c.refreshOddsTable(d, i, e, l, m, n, k)
    } else {
        var j;
        if (f == "l") {
            j = "L";
            g_OddsKeeper_L = new OddsKeeper();
            c = g_OddsKeeper_L;
            c.tag = "L";
            c.TableContainer = document.getElementById("oTableContainer_L")
        } else {
            j = "D";
            g_OddsKeeper_D = new OddsKeeper();
            c = g_OddsKeeper_D;
            c.tag = "D";
            c.TableContainer = document.getElementById("oTableContainer_D")
        }
        if (!initialTmpl("1X2_tmpl", "index.php?r=site/1X2Tpl", "ShowBetList('" + g + "','" + h + "','" + f + "', DataFrame_" + j + ".N" + f + ");")) {
            return
        }
        c.SportType = "1";
        c.afterNewEvent = afterNewEvent;
        c.setTemplate(fFrame.document.getElementById("1X2_tmpl").contentWindow);
        c.afterRepaintTable = afterRepaintTable;
        c.BetTypes = new Array(5, 15);
        c.setDatas(d, FIELDS_DEF_1X2);
        FinalpaintOddsTable()
    }
}

function afterNewLeague(a, c, b) {
    b = b.replace("{@Market}", document.DataForm_D.Market.value);
    return b.replace("{@Refresh}", RES_REFRESH)
}

function afterNewEvent(a, c, b, d) {
    var f = a[c];
    var e = new Array();
    if (d) {
        if (f.LivePeriod == 0) {
            e.LiveTimeCls = (f.CsStatus == "1") ? "HalfTime" : "IsLive"
        } else {
            e.LiveTimeCls = "LiveTime"
        }
        if (f.Div == 0) {
            e.Tr_Cls = "live";
            e.BgColor = GetLiveBGColor(f.Div)
        } else {
            e.Tr_Cls = "liveligh";
            e.BgColor = GetLiveBGColor(f.Div)
        }
        e.InjuryTime = (f.InjuryTime > "0") ? "+" + f.InjuryTime : ""
    } else {
        if (f.Div == 0) {
            e.Tr_Cls = TR_0;
            e.BgColor = GetEventBGColor(f.Div)
        } else {
            e.Tr_Cls = TR_1;
            e.BgColor = GetEventBGColor(f.Div)
        }
    }
    if (f.TimerSuspend == "1") {
        e.TimeSuspendCls1 = CLS_LS_OFF;
        e.TimeSuspendCls = CLS_LS_ON
    } else {
        e.TimeSuspendCls1 = CLS_LS_ON;
        e.TimeSuspendCls = CLS_LS_OFF
    }
    if ((c == 0) || (a[c - 1]["MatchId"] != f.MatchId)) {
        e.StatsInfo = f.StatsId == "0" ? "" : getStatsHtml(f.MatchId);
        e.SportRadarInfo = f.SportRadar == 0 ? "" : getSportRadarHtml(f.MatchId, d ? "IsLive" : "");
        e.Streaming = getStreamingHtml(f.MatchId, f.StreamingId, d)
    }
    e.isParlay = 0;
    b = _formatTemplate(b, "{@", "}");
    b = _replaceTags(e, b);
    return b
}

function afterScoreChanged(a, c) {
    if (c < a.length && c >= 0 && a.length > 0) {
        var f = a[c];
        var e = new Array();
        e.HomeName = f.HomeName;
        e.AwayName = f.AwayName;
        e.ScoreH = f.ScoreH;
        e.ScoreA = f.ScoreA;
        e.ShowTime = f.ShowTime;
        e.InjuryTime = f.InjuryTime;
        var b = fFrame.ScoreMsg;
        b = _formatTemplate(b, "{@", "}");
        b = _replaceTags(e, b);
        var d = new MsgBox(b, 10000, 5, "MainMsg");
        d.openMsg()
    }
};