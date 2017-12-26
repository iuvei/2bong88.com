function removeCommasFunc(b) {
    if (b == null) {
        b = "0"
    }
    b = "" + b;
    var a = /,/g;
    return b.replace(a, "")
}

function EmptyMap(d, e) {
    var c = new Array(e);
    for (var a = 0; a <= e; a++) {
        c[a] = new Array(d);
        for (var b = 0; b <= d; b++) {
            c[a][b] = 0
        }
    }
    return c
}

function isString(a) {
    return typeof a == "string" || a.constructor == String
}
var ScoreMapData = function(H) {
    var j = H;
    var l = {
        MatchID: H,
        TicketList: {}
    };
    var m = this;
    var i = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "$", "_", "~"];
    var n = G();
    var k = i[64];
    var o = [];
    this.Matchid = function() {
        return j
    };
    this.onUpdateScoreMap = null;
    this.getScoreMapInfo = function() {
        return l
    };
    this.changeStake = function(K, L) {
        K = K.toLowerCase();
        if (!jQuery.isEmptyObject(l.TicketList)) {
            if (!jQuery.isEmptyObject(l.TicketList[K])) {
                if (L.length == 0) {
                    L = "0"
                }
                l.TicketList[K].Stake = L;
                l.TicketList[K].Enable = true;
                c()
            }
        }
    };
    this.addTicket = function(M, O, K, N, L, P) {
        if (M != j) {
            return false
        }
        K = K.toLowerCase();
        var Q = O + K;
        if (jQuery.isEmptyObject(l.TicketList)) {
            l.TicketList = {}
        }
        if (m.getTicket(Q) == null) {
            l.TicketList[Q] = {
                OddsId: O,
                BetTeam: K,
                Odds: N,
                Hdp: L,
                Bettype: 0,
                Stake: P,
                Enable: true,
                Off: 0
            };
            o.push(Q)
        } else {
            l.TicketList[Q].Odds = N;
            l.TicketList[Q].Hdp = L;
            l.TicketList[Q].Stake = P.length == 0 ? "0" : P
        }
        return true
    };
    this.updateMatchData = function(L, M) {
        var K = {
            matchid: j
        };
        if (!jQuery.isEmptyObject(l.TicketList)) {
            var O = "";
            for (var N in l.TicketList) {
                var P = l.TicketList[N];
                if (O.length > 0) {
                    O += ","
                }
                O += P.OddsId + "_" + P.BetTeam
            }
            K.oddsdata = O;
            if (M != null) {
                K.isRefresh = 1
            }
        }
        jQuery.ajax({
            type: "get",
            url: "/index.php?r=site/TickScoreMapData",
            data: K,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            cache: false,
            async: L,
            error: function(Q) {
                alert("Request error " + Q)
            },
            success: function(Q) {
				
                if (Q != "") {
                    if (Q.charCodeAt(0) != 123) {
                        Q = d(Q)
						
                    }
                    p(jQuery.parseJSON(Q));
                    c();
                }
            }
        })
    };
    this.removeTicket = function(N, M) {
        N = N.toLowerCase();
        if (!jQuery.isEmptyObject(l.TicketList)) {
            delete l.TicketList[N];
            var L = -1;
            for (var K = 0; K < o.length; K++) {
                if (o[K] == N) {
                    L = K;
                    break
                }
            }
            if (L > -1) {
                o.splice(L, 1);
                if (M == null || M) {
                    c()
                }
            }
        }
    };
    this.removeAllTicket = function() {
        l.TicketList = {};
        o = [];
        c()
    };
    this.setTicketEnable = function(K, L) {
        K = K.toLowerCase();
        if (!jQuery.isEmptyObject(l.TicketList)) {
            l.TicketList[K].Enable = L;
            c()
        }
    };
    this.getTicket = function(K) {
        if (K != null && isString(K)) {
            K = K.toLowerCase()
        }
        if (!jQuery.isEmptyObject(l.TicketList)) {
            return l.TicketList[K]
        }
        return null
    };

    function d(S) {
        if (n == null) {
            return ""
        }
        var R = [];
        var N;
        var O;
        var P;
        var Q;
        var M = 0;
        var K = 0;
        S = S.replace(/[^0-9A-Za-z$_~]/g, "");
        while (M < S.length) {
            N = n[S.charAt(M++)];
            O = n[S.charAt(M++)];
            P = n[S.charAt(M++)];
            Q = n[S.charAt(M++)];
            R[K++] = (N << 2) | (O >> 4);
            R[K++] = ((O & 15) << 4) | (P >> 2);
            R[K++] = ((P & 3) << 6) | Q
        }
        var L = S.slice(-2);
        if (L.charAt(0) == k) {
            R.length = R.length - 2
        } else {
            if (L.charAt(1) == k) {
                R.length = R.length - 1
            }
        }
        return a(R)
    }

    function a(O) {
        var K = false;
        var N = "";
        for (var M = 0; M < O.length; ++M) {
            var L = O[M];
            if (L == 29) {
                K = !K;
                continue
            }
            if (K) {
                N += String.fromCharCode(L * 256 + O[++M])
            } else {
                N += String.fromCharCode(L)
            }
        }
        return N
    }

    function f(K) {
        if (K > 63) {
            return f(Math.floor(K / 63) + (K % 63))
        } else {
            return K
        }
    }

    function E(M) {
		//return "z2zpuzttir5v5zc0x4fa10j1";
        var N = document.cookie.indexOf(M + "=");
        var L = N + M.length + 1;
        if ((!N) && (M != document.cookie.substring(0, M.length))) {
            return null
        }
        if (N == -1) {
            return null
        }
        var K = document.cookie.indexOf(";", L);
        if (K == -1) {
            K = document.cookie.length
        }
        return unescape(document.cookie.substring(L, K))
    }

    function G() {
        var P = E("_SessionId");
		
		var S = [];
        var L = i;
        if (P == null) {
            return null
        }
        if (P.length < 64) {
            var Q = P;
            var M = Math.floor(64 / P.length);
            for (var N = 0; N < M; N++) {
                P += Q
            }
        }
        for (var O = 0; O < 64; O++) {
            if (O > P.length - 1) {
                break
            }
            var R = f(P.charCodeAt(O));
            var T = L[O];
            L[O] = L[R];
            L[R] = T
        }
        for (var K = 0; K < 64; ++K) {
            S[L[K]] = K
        }
        return S
    }
	function getSession()
	{
	
		jQuery.ajax({
                type: "get",
                url: "/index.php?r=site/GetSession",
                data: {},
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                cache: false,
                async: false,
                error: function(K) {
                    alert("Request error " + K)
                },
                success: function(K) {
                    if (K != "") {
						
                        return K;
                    }
					else
						return null;
                }
            })
	
	}

    function c() {
        var K = jQuery.extend(true, {}, l.FTScoreMap);
        var L = jQuery.extend(true, {}, l.HTScoreMap);
        l.HTTicketList = new Array();
        l.FTTicketList = new Array();
        K.isWait = 1;
        L.isWait = 1;
        if (!jQuery.isEmptyObject(l.TicketList)) {
            for (var N = 0; N < o.length; N++) {
                var O = o[N];
                var Q = l.TicketList[O];
                var M = F(Q.Bettype);
                if (M != null) {
                    Q.isHT = M.isHT;
                    var P = null;
                    if (Q.isHT) {
                        l.HTTicketList.push(Q);
                        if (!Q.Enable) {
                            continue
                        }
                        P = L
                    } else {
                        l.FTTicketList.push(Q);
                        if (!Q.Enable) {
                            continue
                        }
                        P = K
                    }
                    if (P.Map == null) {
                        P.Map = EmptyMap(P.AE - P.AS, P.HE - P.HS)
                    }
                    P.Map = J(P, P.Map, Q, M.Func, l.LiveScore)
                }
            }
        }
        if (l.wcount > 0) {
            var R = [K, L];
            for (var N = 0; N < R.length; N++) {
                if (R[N].Map2 == null) {
                    R[N].isWait = 0;
                    R[N].Map2 = R[N].Map
                } else {
                    if (R[N].Map == null) {
                        R[N].Map = EmptyMap(R[N].AE - R[N].AS, R[N].HE - R[N].HS)
                    }
                    R[N].Map2 = I(R[N].Map, R[N].Map2)
                }
            }
        }
        l.NowFTScoreMap = K;
        l.NowHTScoreMap = L;
        m.onUpdateScoreMap(l)
    }

    function I(N, O) {
        var Q = N.length - 1;
        var P = N[0].length - 1;
        if (O == null) {
            return N
        }
        var M = new Array(Q);
        for (var K = 0; K <= Q; K++) {
            M[K] = new Array(P);
            for (var L = 0; L <= P; L++) {
                M[K][L] = N[K][L] + O[K][L]
            }
        }
        return M
    }

    function J(L, P, S, M, N) {
        var Q = parseFloat(removeCommasFunc(S.Odds));
        var R = parseInt(removeCommasFunc(S.Stake), 10);
        var T = g(Q, R, S.OddsType);
        var O = e(Q, R, S.OddsType);
        for (var K = 0; K < L.Map.length; K++) {
            for (h = 0; h < L.Map[K].length; h++) {
                P[K][h] += M(S, h + L.HS, K + L.AS, N, T, O)
            }
        }
        return P
    }

    function F(K) {
        return b[K]
    }

    function p(L) {
        var O = l.TicketList;
        var M = L.TicketList;
        l = L;
        for (var K in O) {
            var P = O[K];
            if (jQuery.isEmptyObject(M)) {
                M = {}
            }
            if (M[K] != null) {
                var N = M[K];
                N.Enable = P.Enable;
                N.Stake = P.Stake;
                N.BetTeam = N.BetTeam.toLowerCase();
                N.oddsChg = false;
                if (N.Hdp != P.Hdp) {
                    N.hdpChg = true
                } else {
                    N.hdpChg = false
                }
                if (N.Off == 1) {
                    N.Enable = false;
                    N.oddsChg = false;
                    N.hdpChg = false;
                    N.Odds = P.Odds
                }
            } else {
                P.Off = 1;
                P.Enable = false;
                P.oddsChg = false;
                P.hdpChg = false;
                M[K] = P
            }
        }
        l.TicketList = M
    }
    var y = function(Q, M, K, N, R, O) {
        var L = parseFloat(Q.Hdp);
        if (Q.BetTeam == "h") {
            L = L * -1
        }
        var P = (M - N.H - L) - (K - N.A);
        if (Q.BetTeam == "a") {
            P = -(P)
        }
        if (P > 0) {
            return P >= 0.5 ? R : R / 2
        } else {
            if (P == 0) {
                return 0
            } else {
                return P <= -0.5 ? O : O / 2
            }
        }
    };
    var A = function(P, L, K, M, Q, N) {
        var O = (L + K) % 2;
        if (((P.BetTeam == "h") && (O > 0)) || ((P.BetTeam == "a") && (O == 0))) {
            return Q
        } else {
            return N
        }
    };
    var D = function(P, L, K, M, Q, N) {
        var O = L + K - parseFloat(P.Hdp);
        if (P.BetTeam == "a") {
            O = -(O)
        }
        if (O > 0) {
            return O >= 0.5 ? Q : Q / 2
        } else {
            if (O == 0) {
                return 0
            } else {
                return O <= -0.5 ? N : N / 2
            }
        }
    };
    var q = function(P, L, K, M, Q, N) {
        var O = (L - K);
        if (((P.BetTeam == "1") && (O > 0)) || ((P.BetTeam == "2") && (O < 0)) || ((P.BetTeam == "x") && (O == 0))) {
            return Q
        } else {
            return N
        }
    };
    var B = function(P, L, K, M, Q, N) {
        var O = L + K;
        if (P.Bettype == 126) {
            if (((P.BetTeam == "0-1") && (O < 2)) || ((P.BetTeam == "2-3") && (O > 1 && O < 4)) || ((P.BetTeam == "4-over") && (O > 3))) {
                return Q
            } else {
                return N
            }
        } else {
            if (((P.BetTeam == "0-1") && (O < 2)) || ((P.BetTeam == "2-3") && (O > 1 && O < 4)) || ((P.BetTeam == "4-6") && (O > 3 && O < 7)) || ((P.BetTeam == "7-over") && (O > 6))) {
                return Q
            } else {
                return N
            }
            s
        }
    };
    var v = function(Q, N, L, O, S, P) {
        if (Q.BetTeam.replace(":", "").length != 2) {
            return 0
        }
        var M = parseInt(Q.BetTeam.replace(":", "").substr(0, 1), 10);
        var K = parseInt(Q.BetTeam.replace(":", "").substr(1, 1), 10);
        var R = 5;
        if (Q.Bettype == 30) {
            R = 4
        }
        if ((M == N && K == L) || (Q.BetTeam == R + "0" && N - L >= R) || (Q.BetTeam == "0" + R && L - N >= R)) {
            return S
        } else {
            return P
        }
    };
    var u = function(O, L, K, M, P, N) {
        if ((O.BetTeam == "hy" && K == 0) || (O.BetTeam == "hn" && K > 0) || (O.BetTeam == "ay" && L == 0) || (O.BetTeam == "an" && L > 0)) {
            return P
        } else {
            return N
        }
    };
    var w = function(O, L, K, M, P, N) {
        if ((O.BetTeam == "1x" && L >= K) || (O.BetTeam == "2x" && K >= L) || (O.BetTeam == "12" && L != K)) {
            return P
        } else {
            return N
        }
    };
    var t = function(O, L, K, M, P, N) {
        if ((O.BetTeam == "b" && L + K >= 2 && L != 0 && K != 0) || (O.BetTeam == "o" && (K == 0 || L == 0) && L + K >= 1) || (O.BetTeam == "n" && K + L == 0)) {
            return P
        } else {
            return N
        }
    };
    var C = function(O, L, K, M, P, N) {
        if ((O.BetTeam == "h" && L > 0 && K == 0) || (O.BetTeam == "a" && K > 0 && L == 0)) {
            return P
        } else {
            return N
        }
    };
    var r = function(P, M, K, N, Q, O) {
        var L = parseFloat(P.Hdp);
        if ((P.BetTeam == "1" && (L + M - K) > 0) || (P.BetTeam == "2" && (L + K - M) > 0) || (P.BetTeam == "x" && (L - (M - K)) == 0)) {
            return Q
        } else {
            return O
        }
    };
    var z = function(O, L, K, M, P, N) {
        if ((O.Bettype == 25 && L == K) || (O.Bettype == 121 && L > K) || (O.Bettype == 122 && L < K)) {
            return 0
        }
        if ((O.BetTeam == "h" && L > K) || (O.BetTeam == "x" && L == K) || (O.BetTeam == "a" && L < K)) {
            return P
        } else {
            return N
        }
    };
    var x = function(O, L, K, M, P, N) {
        if ((O.BetTeam == "h" && L == K) || (O.BetTeam == "a" && L != K)) {
            return P
        } else {
            return N
        }
    };

    function g(K, M, L) {
        if (L == 1) {
            return M * (K - 1)
        } else {
            if (K < 0) {
                return M
            } else {
                return M * K
            }
        }
    }

    function e(K, M, L) {
        if (L == 1) {
            return -(M)
        } else {
            if (K < 0) {
                return M * K
            } else {
                return -(M)
            }
        }
    }
    var b = {};
    b[1] = {
        Func: y,
        isHT: false
    };
    b[7] = {
        Func: y,
        isHT: true
    };
    b[2] = {
        Func: A,
        isHT: false
    };
    b[12] = {
        Func: A,
        isHT: true
    };
    b[3] = {
        Func: D,
        isHT: false
    };
    b[8] = {
        Func: D,
        isHT: true
    };
    b[4] = {
        Func: v,
        isHT: false
    };
    b[30] = {
        Func: v,
        isHT: true
    };
    b[5] = {
        Func: q,
        isHT: false
    };
    b[15] = {
        Func: q,
        isHT: true
    };
    b[6] = {
        Func: B,
        isHT: false
    };
    b[126] = {
        Func: B,
        isHT: true
    };
    b[13] = {
        Func: u,
        isHT: false
    };
    b[24] = {
        Func: w,
        isHT: false
    };
    b[25] = {
        Func: z,
        isHT: false
    };
    b[26] = {
        Func: t,
        isHT: false
    };
    b[27] = {
        Func: C,
        isHT: false
    };
    b[28] = {
        Func: r,
        isHT: false
    };
    b[121] = {
        Func: z,
        isHT: false
    };
    b[122] = {
        Func: z,
        isHT: false
    };
    b[123] = {
        Func: x,
        isHT: false
    };
    b[151] = {
        Func: w,
        isHT: true
    }
};
var ScoreMapForecast = function() {
    var i = {};
    var n = null;
    var l;
    var o = this;
    var m = null;
    var w = 790;
    var v = null;
    var c;
    var y = parent.mainFrame;
    var p = null;
    var g = false;
    var f = {
        HomeScore: -1,
        AwayScore: -1
    };
    var d = {
        HomeScore: -1,
        AwayScore: -1
    };
    var j = null;

    function e(A) {
        var z = i[A];
        if (z == null) {
            z = new ScoreMapData(A);
            i[A] = z
        }
        return z
    }
    this.stopWatcher = function() {
        var z = $(parent.leftFrame.document.getElementById("BPstake"));
        t.cancelWatchForChange();
        z.unbind("focus");
        z.unbind("blur")
    };

    function a(C, z, B) {
        var A = $(parent.leftFrame.document.getElementById("BPstake"));
        var D = function(F) {
            var G = true;
            if (u() && B == fFrame.leftFrame.g_BetProcesCurrMatchid) {
                var H = $(parent.leftFrame.document.getElementById("bp_Match")).val();
                var E = H.toLowerCase().split("_");
                if (c.getTicket(E[0] + E[1]) == null) {
                    c.addTicket(B, E[0], E[1], parent.leftFrame.document.getElementById("bodds").innerHTML, 0, A.val());
                    c.updateMatchData(true)
                } else {
                    c.changeStake(E[0] + E[1], A.val())
                }
            } else {
                o.stopWatcher();
                G = false
            }
            return G
        };
        t.afterChange = D;
        o.stopWatcher();
        A.bind("focus", function() {
            t.watchForChange(A.get(0))
        });
        A.bind("blur", function() {
            t.cancelWatchForChange()
        });
        t.watchForChange(A.get(0))
    }
    var t = {
        timeout: null,
        currentValue: "",
        watchForChange: function(z) {
            clearTimeout(this.timeout);
            var A = true;
            if (z.value != this.currentValue) {
                A = this.changed(z)
            }
            if (A && parent.leftFrame.document.getElementById("BetProcessContainer").style.display != "none") {
                this.timeout = setTimeout(function() {
                    t.watchForChange(z)
                }, 200)
            }
        },
        cancelWatchForChange: function() {
            clearTimeout(this.timeout);
            this.timeout = null
        },
        changed: function(z) {
            this.currentValue = z.value;
            if (this.afterChange != null) {
                return this.afterChange()
            }
            return true
        },
        afterChange: null
    };
    this.changeStake = function(A, z, B) {
        c.changeStake("" + A + z, B)
    };
    this.openScoreMap = function(B, F, G, D, z, C, A, E) {
        if (typeof y.DivLauncher == "undefined") {
			alert("not divlauncher");
            importJS("DivLauncher.js", "parent.mainFrame.DivLauncher", function() {
                k(B, F, G, D, z, C, A, E)
            }, y)
        } else {
			
			k(B, F, G, D, z, C, A, E)
        }
    };
    var q = null;

    function k(C, I, J, E, z, D, B, G) {
        if (n == null) {
            jQuery.ajax({
                type: "get",
                url: "/index.php?r=site/TickScoreMapTmpl",
                data: {},
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                cache: false,
                async: false,
                error: function(K) {
                    alert("Request error " + K)
                },
                success: function(K) {
                    if (K != "") {
						
                        l = $(K).find("#ScoreMapDivTmpl").html();
                        n = $(K).find("#scoremapArea")
                    }
                }
            })
        }
        c = e(C);
        if (u()) {
            var H = $(y).scrollTop();
            var A = $(y).scrollTop() + $(y).height();
            var F = $(y.document.getElementById("ScoreMapDiv")).position().top;
            if (F < H || F > A) {
                o.Close()
            }
        }
        if (j != C || c.getTicket(E + z) == null || !m.isOpened) {
            m = b();
            m.beforeClose = function() {
                fFrame.mainFrame.$("#scoremapmsg").css("visibility", "hidden");
                return true
            };
            m.setDEFAULT_X(I);
            m.setDEFAULT_Y(J);
            f = {
                HomeScore: -1,
                AwayScore: -1
            };
            d = {
                HomeScore: -1,
                AwayScore: -1
            }
        }
        j = C;
        if (E != null && G != "") {
            c.addTicket(C, E, z, D, B, G);
            c.onUpdateScoreMap = function(K) {
                r(K);
                a(E, z, C)
            }
        } else {
            c.onUpdateScoreMap = r
        }
        c.updateMatchData(false)
    }
    this.BetProcess = function(E, B, D, z, C, F) {
        try {
            var G = B.srcElement ? B.srcElement : B.target;
            if (G.type == "checkbox" || G.className == "icon-close") {
                return
            }
            $(E).attr("onclick", "");
            $(E).unbind();
            o.setTicketEnable(D, z, true);
            c.onUpdateScoreMap = function(H) {
                r(H);
                a(D, z, c.Matchid())
            };
            fFrame.leftFrame.DoBetProcess(D, z, C, F == "0" ? "" : F);
            o.Refresh()
        } catch (A) {}
    };
    this.setTicketEnable = function(A, z, B) {
        c.setTicketEnable(A + z, B)
    };
    this.Refresh = function(z) {
        if (!u()) {
            return
        }
        var A = y.document.getElementById("ScoreMapRefresh");
        A.className = "btnIcon black right disable";
        c.updateMatchData(true, z);
        q = function() {
            A.className = "btnIcon black right";
            q = null
        }
    };
    this.removeAllTicket = function() {
        c.removeAllTicket()
    };
    this.removeTicket = function(C, z, B) {
        if (B == null) {
            c.removeTicket("" + C + z)
        } else {
            var A = i[B];
            if (A != null) {
                A.removeTicket("" + C + z, u());
                setTimeout(function() {
                    if (u() && B == c.Matchid()) {
                        o.Refresh()
                    }
                }, 2000)
            }
        }
    };
    this.IsOpen = function() {
        return u()
    };
    this.Close = function() {
        try {
            if (m != null && m.isOpened) {
                m.close()
            }
            $("#scoremapmsg").css("visibility", "hidden")
        } catch (z) {
            m.isOpened = false
        }
    };

    function u() {
        var A = y.document.getElementById("ScoreMapDiv");
        if (A == null || A.style.visibility != "visible") {
            try {
                if (m != null && m.isOpened) {
                    m.close()
                }
            } catch (z) {
                m.isOpened = false
            }
            return false
        }
        return true
    }

    function b() {
        var z = y.document.getElementById("ScoreMapDiv");
        if (z == null) {
            if (y.document.getElementById("sidebar") != null) {
                $(l).appendTo(y.document.getElementById("sidebar"))
            } else {
                $(l).appendTo(y.document.body)
            }
        }
        var B = y.document.getElementById("ScoreMapDiv");
        var C = y.document.getElementById("ScoreMapTitle");
        var A = y.document.getElementById("ScoreMapCloser");
        if (typeof y.DivLauncher != "undefined") {
            return new y.DivLauncher(B, C, A, y)
        } else {
            return new DivLauncher(B, C, A, y)
        }
    }

    function r(F, C) {
        if (F.wcount > 0) {
            C = C == null ? 0 : C;
            if (C > 3) {
                o.Refresh();
                return
            }
            if (C > -1) {
                x(F.NowFTScoreMap);
                x(F.NowHTScoreMap);
                clearTimeout(p);
                C++;
                p = setTimeout(function() {
                    if (u()) {
                        r(F, C)
                    }
                }, 1500)
            }
        } else {
            clearTimeout(p)
        }
        var z = $(m.popDiv).find("#ScoreMapContainer");
        var G = $(m.titleDiv).find("#popScoreTitle");
        var H = F.HName + " -vs- " + F.AName;
        G.html(H);
        G.attr("title", H);
        z.empty();
        n.tmpl(F).appendTo(z);
        if (!m.isOpened) {
            if (w != null) {
                var D = m.getDEFAULT_X();
                var B = getDivW(m.popDiv);
                if (D + B > w) {
                    m.setDEFAULT_X(D - (D + B - w))
                }
            }
            if (v != null) {
                var E = m.getDEFAULT_Y();
                var A = getDivH(m.popDiv);
                if (E + A > v) {
                    m.setDEFAULT_Y(E - (E + A - A))
                }
            }
            m.open(m.getDEFAULT_X(), m.getDEFAULT_Y(), CheckIScroll())
        }
        if (q != null) {
            q()
        }
    }
    this.openMark = function(B, z, C) {
        var D = {
            h: 0,
            a: 0
        };
        var A = {
            h: 99,
            a: 99
        };
        if (C == 0 && d.HomeScore != -1 && d.AwayScore != -1) {
            A.h = d.HomeScore;
            A.a = d.AwayScore
        }
        if (C == 1 && f.HomeScore != -1 && f.AwayScore != -1) {
            D.h = f.HomeScore;
            D.a = f.AwayScore
        }
        if (B >= D.h && B <= A.h && z >= D.a && z <= A.a) {
            return false
        }
        return true
    };
    this.getColor = function(C, z, E, D, F) {
        var I = "#F5F3F2";
        var A = "#FFFF73";
        var G = "#FFCCBC";
        var K = "#FFDDD2";
        var H = "#857C77";
        var J = I;
        if (E) {
            J = G
        }
        if (!E && D) {
            J = K
        }
        var B = null;
        if (F == 0) {
            B = f
        } else {
            B = d
        }
        if (B.HomeScore == C && B.AwayScore == z) {
            J = A
        }
        return J
    };
    this.ChkMap = function(D, A, z, B) {
        var C = true;
        if (B == 0) {
            if (d.HomeScore != -1) {
                if (A > d.HomeScore || z > d.AwayScore) {
                    C = false
                }
            }
        } else {
            if (f.HomeScore != -1) {
                if (A < f.HomeScore || z < f.AwayScore) {
                    C = false
                }
            }
        }
        if (D != null) {
            if (C) {
                D.style.cursor = "pointer"
            } else {
                D.style.cursor = ""
            }
        }
        return C
    };
    this.ClickMap = function(B, z, C) {
        var A = null;
        if (!o.ChkMap(null, B, z, C)) {
            return
        }
        if (C == 0) {
            A = f
        } else {
            A = d
        }
        if (A.HomeScore == B && A.AwayScore == z) {
            A.HomeScore = -1;
            A.AwayScore = -1
        } else {
            A.HomeScore = B;
            A.AwayScore = z
        }
        r(c.getScoreMapInfo())
    };

    function x(z) {
        var A = z.Map;
        z.Map = z.Map2;
        z.Map2 = A;
        if (z.isWait == 1) {
            z.isWait = 2
        } else {
            if (z.isWait == 2) {
                z.isWait = 1
            }
        }
    }
};
var g_SMF = new ScoreMapForecast();