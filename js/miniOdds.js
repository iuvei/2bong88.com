var miniOdds = function() {
    var b = null;
    var c = null;
    var j = null;
    var d = this;
    var h;
    var f = null;
    var g = new Array();
    var i = null;
    var a = null;
    var e = {
        ellipsis: "...",
        setTitle: "never",
        live: false,
        maxWords: 10
    };

    function q() {
        jQuery.ajax({
            type: "get",
            url: "/index.php?r=site/MiniOddsTpl",
            data: {},
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            cache: false,
            async: false,
            error: function(u) {},
            success: function(u) {
                if (u != "") {
                    c = $(u).find("#minioddstmpl");
                    j = $(u).find("#minioddsDiv").html()
                }
            }
        })
    }

    function p(u, v) {
        jQuery.ajax({
            type: "get",
            url: "/index.php?r=site/MiniOdds",
            data: u,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            cache: false,
            async: true,
            dataType: "json",
            error: function(w) {},
            success: function(w) {
                if (w != "") {
                    v(w)
                }
            }
        })
    }
    this.clickOdds = function(x, u, w, v) {
        fFrame.leftFrame.DoBetProcess(x, u, w, null, true, v)
    };
    this.Refresh = function(u) {
        s(u)
    };

    function r(v) {
        if (c == null) {
            q()
        }
        var u = $(h.document).find("#minioddCcontainer");
        u.empty();
        c.tmpl(k(v)).appendTo(u);
        o();
        $(h.document).find("#btnMiniOddsRefresh").attr("class", "btnIcon right");
        clearTimeout(i);
        i = setTimeout(s, 20000)
    }

    function s(v) {
        $(h.document).find("#btnMiniOddsRefresh").attr("class", "btnIcon right disable");
        if (v == null) {
            v = ""
        }
        var u = {
            OddsType: v
        };
        p(u, r)
    }
    this.Init = function() {
        if (h == null) {
            h = fFrame.mainFrame
        }
        var w = ["allstatement.aspx", "bettingstatement.aspx", "dbetlist.aspx", "userbetsummary.aspx", "betlist.aspx", "result.aspx", "resultoutright.aspx"];
        var u = h.document.location.pathname;
        for (var v = 0; v < w.length; v++) {
            if (u.toLowerCase().indexOf(w[v]) > -1) {
                return
            }
        }
        if (c == null) {
            q()
        }
        $(j).prependTo(h.document.body);
        n();
        if (a == null) {
            t(10000)
        }
        s()
    };

    function m() {
        f = $.connection.miniOdds;
        f.refreshData = function(u) {
            r(jQuery.parseJSON(u))
        };
        $.connection.hub.start().done(function() {
            f.startTimer(5000)
        })
    }

    function t(u) {
        $gamingMenu = $(h.document).find(".gaming li");
        $promotion = $(h.document).find(".promotion-banner > ul > li");
        $banner = $(h.document).find(".promotion-banner");
        if ($gamingMenu.eq(0).attr("class") == "disable") {
            return
        }
        $gamingMenu.removeClass("selected");
        $banner.hide();
        $banner.fadeIn("normal");
        $promotion.hide();
        $promotion.eq(0).fadeIn("normal");
        $gamingMenu.eq(0).addClass("selected");
        if (u != null) {
            a = setTimeout(function() {
                $(h.document).find(".gaming li").removeClass("selected");
                $(h.document).find(".promotion-banner").fadeOut("normal")
            }, u)
        }
    }

    function n() {
        $gamingMenu = $(h.document).find(".gaming li");
        $promotion = $(h.document).find(".promotion-banner > ul > li");
        $gamingMenu.click(function() {
            if (!$(this).hasClass("disable")) {
                $(h.document).find(".promotion-banner").fadeIn("fast");
                $promotion.hide();
                $promotion.eq($(this).index()).fadeIn("fast");
                $(this).addClass("selected").siblings(this).removeClass("selected");
                clearTimeout(a)
            }
        });
        $(h.document).find(".promotion-banner .close, .promotion-banner a").click(function() {
            $(h.document).find(".promotion-banner").hide();
            $gamingMenu.removeClass("selected");
            clearTimeout(a)
        })
    }

    function l(v, u) {
        if (g[v] == true) {
            $(u).removeClass("current");
            $(u).next(".miniContent").slideUp("fast")
        } else {
            $(u).addClass("current");
            $(u).next(".miniContent").slideDown("fast");
            $(u).next(".miniContent").find("div[name='teamName']").ellipsis(e)
        }
        g[v] = !g[v]
    }

    function o() {
        $(h.document).find(".miniodds li a").each(function() {
            var u = this.id.split("_")[1];
            if (g[u] == null) {
                g[u] = true
            }
            if (g[u]) {
                $(this).addClass("current");
                $(this).next(".miniContent").show()
            } else {
                $(this).removeClass("current");
                $(this).next(".miniContent").hide()
            }
            $(this).click(function() {
                l(u, this)
            })
        });
        $(h.document).find("div[name='teamName']").ellipsis(e)
    }

    function k(v) {
        if (b != null && !v.renew) {
            for (var y in v.data) {
                for (var x in b.data) {
                    if (v.data[y].SportName == b.data[x].SportName) {
                        for (var u in v.data[y].matchs) {
                            for (var w in b.data[x].matchs) {
                                if (v.data[y].matchs[u].Matchid == b.data[x].matchs[w].Matchid) {
                                    if (v.data[y].matchs[u].OddsH != b.data[x].matchs[w].OddsH) {
                                        v.data[y].matchs[u].Ischg = true
                                    }
                                    if (v.data[y].matchs[u].ScoreH != b.data[x].matchs[w].ScoreH || v.data[y].matchs[u].ScoreA != b.data[x].matchs[w].ScoreA) {
                                        v.data[y].matchs[u]["Scorechg"] = true
                                    }
                                    if (v.data[y].matchs[u].Hdp != b.data[x].matchs[w].Hdp) {
                                        v.data[y].matchs[u]["Hdpchg"] = true
                                    }
                                    break
                                }
                            }
                        }
                        break
                    }
                }
            }
        }
        b = v;
        return b
    }
};
var miniOddsObj = new miniOdds();