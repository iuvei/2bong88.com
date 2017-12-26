var PreferencesSelect = new Array(10);
var DefPreferencesKey = new Array(10);
var DefPreferencesSelectChildValue = new Array(10);
var HelpList = new Array(10);
PreferencesSelect[0] = "DefaultLanguage";
PreferencesSelect[1] = "OddsType";
PreferencesSelect[2] = "LayoutMode";
PreferencesSelect[3] = "BetStake";
PreferencesSelect[4] = "BetterOdds";
PreferencesSelect[5] = "AutoRefresh";
PreferencesSelect[6] = "ShowScoreMap";
PreferencesSelect[7] = "OddsSort";
PreferencesSelect[8] = "ShowLiveCasino";
PreferencesSelect[9] = "MarketType";
DefPreferencesKey[0] = "en";
DefPreferencesKey[1] = "4";
DefPreferencesKey[2] = "2";
DefPreferencesKey[3] = "-1";
DefPreferencesKey[4] = "1";
DefPreferencesKey[5] = "0";
DefPreferencesKey[6] = "0";
DefPreferencesKey[7] = "1";
DefPreferencesKey[8] = "1";
DefPreferencesKey[9] = "1";
DefPreferencesSelectChildValue[0] = 0;
DefPreferencesSelectChildValue[1] = 2;
DefPreferencesSelectChildValue[2] = 1;
DefPreferencesSelectChildValue[3] = 2;
DefPreferencesSelectChildValue[4] = 0;
DefPreferencesSelectChildValue[5] = 1;
DefPreferencesSelectChildValue[6] = 1;
DefPreferencesSelectChildValue[7] = 0;
DefPreferencesSelectChildValue[8] = 0;
DefPreferencesSelectChildValue[9] = 1;
HelpList[0] = "langHelp";
HelpList[1] = "otHelp";
HelpList[2] = "ptHelp";
HelpList[3] = "stHelp";
HelpList[4] = "boHelp";
HelpList[5] = "arHelp";
HelpList[6] = "smHelp";
HelpList[7] = "osHelp";
HelpList[8] = "lcHelp";
HelpList[9] = "mtHelp";

function FormEnterKey(a) {
    var b;
    if (window.event) {
        b = window.event.keyCode
    } else {
        b = a.which
    }
    return (b != 13)
}
$(document).ready(function() {
    $(".CSPriority input").on("click", function() {
        if ($(this).is(":checked")) {
            $(this).closest(".CSPriority").removeClass("default")
        } else {
            $(this).closest(".CSPriority").addClass("default")
        }
    })
});

function showHelp(a) {
    if (document.getElementById(a).style.visibility == "hidden") {
        for (i = 0; i <= HelpList.length - 1; i = i + 1) {
            document.getElementById(HelpList[i]).style.visibility = "hidden"
        }
        document.getElementById(a).style.visibility = "visible"
    } else {
        document.getElementById(a).style.visibility = "hidden"
    }
}

function SwitchUssInput(a) {
    if (a == "c") {
        document.getElementById("uusSet").style.display = "none"
    } else {
        document.getElementById("uusSet").style.display = ""
    }
}

function RestorePreferences() {
    for (i = 0; i <= PreferencesSelect.length - 1; i = i + 1) {
        setSelecter(PreferencesSelect[i], this, DefPreferencesKey[i]);
        if (PreferencesSelect[i] == "OddsType" && document.getElementById("OddsType") == null) {} else {
            document.getElementById(PreferencesSelect[i] + "_Txt").innerHTML = document.getElementById(PreferencesSelect[i] + "_menu").children[DefPreferencesSelectChildValue[i]].innerHTML
        } if (PreferencesSelect[3]) {
            document.getElementById("uus").value = "";
            SwitchUssInput("c")
        }
    }
}

function callPreferencesSubmit(b) {
    if (b == "YES") {
        if (getSelecterValue("BetStake") > 0 || getSelecterValue("BetStake") == "") {
            if (document.getElementById("uus").value == "") {
                alert(document.getElementById("hidBetStakeNotNullMessage").value);
                return false
            } else {
                if (isNaN(removeCommas(document.getElementById("uus").value))) {
                    alert(document.getElementById("hidBetStakeNotNumericMessage").value);
                    return false
                } else {
                    if (document.getElementById("uus").value <= 0) {
                        alert(document.getElementById("hidBetStakeMoreThenZeroMessage").value);
                        return false
                    } else {
                        if (document.getElementById("uus").value.indexOf(".") != -1) {
                            alert(document.getElementById("hidBetSatkeNumbericValueMessage").value);
                            return false
                        }
                    }
                }
            }
        }
        if (document.getElementById("ValidateDiv").style.visibility == "visible" && document.getElementById("txtCode").value == "") {
            alert(document.getElementById("hiderrlogin_enter_valid").value);
            return false
        }
        var a = new Object();
        a.Type = "P";
        a.DefaultLanguage = getSelecterValue("DefaultLanguage");
        a.OddsType = getSelecterValue("OddsType");
        a.LayoutMode = getSelecterValue("LayoutMode");
        if ((getSelecterValue("BetStake") != "" && getSelecterValue("BetStake") > 0) || getSelecterValue("BetStake") == "") {
            a.BetStake = removeCommas(document.getElementById("uus").value)
        } else {
            a.BetStake = getSelecterValue("BetStake")
        }
        a.BetterOdds = getSelecterValue("BetterOdds");
        a.AutoRefresh = getSelecterValue("AutoRefresh");
        a.ShowScoreMap = getSelecterValue("ShowScoreMap");
        a.OddsSort = getSelecterValue("OddsSort");
        a.ShowLiveCasino = getSelecterValue("ShowLiveCasino");
        a.MarketType = getSelecterValue("MarketType");
        a.txtCode = document.getElementById("txtCode").value;
        $.ajax({
            url: "UserProfileUpdate.ashx",
            async: false,
            cache: false,
            type: "GET",
            dataType: "json",
            data: {
                Type: a.Type,
                DefaultLanguage: a.DefaultLanguage,
                OddsType: a.OddsType,
                LayoutMode: a.LayoutMode,
                BetStake: a.BetStake,
                BetterOdds: a.BetterOdds,
                AutoRefresh: a.AutoRefresh,
                ShowScoreMap: a.ShowScoreMap,
                OddsSort: a.OddsSort,
                ShowLiveCasino: a.ShowLiveCasino,
                MarketType: a.MarketType,
                ValidateCode: a.txtCode
            },
            success: function(c) {
                var d = c.ValidateCheck;
                alert(c.Msg.replace("\\n", "\n"));
                if (d == true) {
                    document.getElementById("ValidateDiv").style.visibility = "visible";
                    $("#validateCode").click()
                } else {
                    document.getElementById("ValidateDiv").style.visibility = "hidden"
                }
                document.getElementById("txtCode").value = "";
                window.opener.UpdateSetting(c.AutoRefresh, c.OddsType, c.PageType, c.OddsSort, c.BetterOdds, c.MarketType)
            }
        })
    }
    return true
}

function RestoreCSPriority() {
    var a = document.getElementById("SportCount").value;
    var c = document.getElementById("DefaultSortType").value.split(",");
    var b = document.getElementById("DefaultSportName").value.split(",");
    for (i = 1; i <= a; i = i + 1) {
        $(document.getElementById("SN" + i)).find("input").val(c[i - 1]);
        $(document.getElementById("SN" + i)).find("div")[1].innerHTML = b[i - 1];
        document.getElementById("SN" + i).style.color = ""
    }
}

function callCSPrioritySubmit(d) {
    var b = new Object();
    b.Type = "S";
    if (d == "NO") {
        b.NewSportSort = "NO"
    } else {
        var c = "";
        var a = document.getElementById("SportCount").value;
        for (i = 1; i <= a; i = i + 1) {
            c += $(document.getElementById("SN" + i)).find("input").val();
            if (i < a) {
                c = c + ","
            }
        }
        b.NewSportSort = c
    }
    $.ajax({
        url: "UserProfileUpdate.ashx",
        async: false,
        cache: false,
        type: "GET",
        dataType: "json",
        data: {
            Type: b.Type,
            NewSportSort: b.NewSportSort
        },
        success: function(e) {
            alert(e.Msg.replace("\\n", "\n"));
            window.top.location.href = "UserProfile_CSPriority.aspx"
        }
    });
    return true
}

function setMoveDataColor(a) {
    var b = document.getElementById("SportCount").value;
    for (i = 1; i <= b; i = i + 1) {
        document.getElementById("SN" + i).style.color = ""
    }
    document.getElementById("SN" + a).style.color = "#ff0000"
}

function moveUp(a) {
    var h = a.offsetParent.id.replace("SN", "");
    if (h == 1) {
        return false
    }
    var k = h.replace("SN", "");
    var g = parseInt(k) - 1;
    var d = a.parentNode.parentNode.parentNode;
    var b = $(d).find("input").val();
    var e = $(d).find("div")[1].innerHTML;
    var c = $(document.getElementById("SN" + g)).find("input").val();
    var f = $(document.getElementById("SN" + g)).find("div")[1].innerHTML;
    if (h == "2" && b == "252") {
        alert($("#BingoTopMsg").val());
        return false
    }
    $(document.getElementById("SN" + g)).find("input").val(b);
    $($(document.getElementById("SN" + g)).find("div")[1]).html(e);
    $(document.getElementById("SN" + k)).find("input").val(c);
    $($(document.getElementById("SN" + k)).find("div")[1]).html(f);
    setMoveDataColor(g)
}

function moveDown(a) {
    var h = a.offsetParent.id.replace("SN", "");
    if (h == document.getElementById("SportCount").value) {
        return false
    }
    var k = h.replace("SN", "");
    var g = parseInt(k) + 1;
    var d = a.parentNode.parentNode.parentNode;
    var b = $(d).find("input").val();
    var e = $(d).find("div")[1].innerHTML;
    var c = $(document.getElementById("SN" + g)).find("input").val();
    var f = $(document.getElementById("SN" + g)).find("div")[1].innerHTML;
    if (h == "1" && c == "252") {
        alert($("#BingoTopMsg").val());
        return false
    }
    $(document.getElementById("SN" + g)).find("input").val(b);
    $($(document.getElementById("SN" + g)).find("div")[1]).html(e);
    $(document.getElementById("SN" + k)).find("input").val(c);
    $($(document.getElementById("SN" + k)).find("div")[1]).html(f);
    setMoveDataColor(g)
}

function moveUpToTop(a) {
    var d;
    var b = document.getElementById("SportCount").value;
    var g = a.offsetParent.id.replace("SN", "");
    if (g == 1) {
        setMoveDataColor(1);
        return false
    } else {
        if (g == 2 && $(document.getElementById("SN" + g)).find("input").val() == "252") {
            alert($("#BingoTopMsg").val());
            return false
        } else {
            if ($(document.getElementById("SN" + g)).find("input").val() == "252") {
                var f = parseInt(g);
                d = new Array((f - 1))
            } else {
                d = new Array(parseInt(g))
            }
        }
    }
    var c = new Array(parseInt(d.length));
    var e = new Array(parseInt(d.length));
    if ($(document.getElementById("SN" + g)).find("input").val() != "252") {
        for (i = 0; i <= d.length - 1; i = i + 1) {
            if (i == 0) {
                c[i] = $(document.getElementById("SN" + g)).find("input").val();
                e[i] = $(document.getElementById("SN" + g)).find("div")[1].innerHTML
            } else {
                c[i] = $(document.getElementById("SN" + i)).find("input").val();
                e[i] = $(document.getElementById("SN" + i)).find("div")[1].innerHTML
            }
        }
    } else {
        c[0] = $(document.getElementById("SN" + g)).find("input").val();
        e[0] = $(document.getElementById("SN" + g)).find("div")[1].innerHTML;
        for (i = 1; i <= d.length - 1; i = i + 1) {
            c[i] = $(document.getElementById("SN" + (i + 1))).find("input").val();
            e[i] = $(document.getElementById("SN" + (i + 1))).find("div")[1].innerHTML
        }
    }
    var k = 1;
    if ($(document.getElementById("SN" + g)).find("input").val() == "252") {
        k = 2
    }
    for (j = 0; j <= e.length - 1; j = j + 1) {
        var h = j + k;
        $(document.getElementById("SN" + h)).find("input").val(c[j]);
        $(document.getElementById("SN" + h)).find("div")[1].innerHTML = e[j]
    }
    setMoveDataColor(k)
}

function moveDownToLast(a) {
    var d;
    var b = document.getElementById("SportCount").value;
    var g = a.offsetParent.id.replace("SN", "");
    if (g == 1) {
        d = new Array(parseInt(b))
    } else {
        var e = parseInt(b) - parseInt(g) + 1;
        d = new Array(parseInt(e))
    }
    var c = new Array(parseInt(d.length));
    var f = new Array(parseInt(d.length));
    for (i = 0; i <= d.length - 1; i = i + 1) {
        if (i == parseInt(d.length - 1)) {
            c[i] = $(document.getElementById("SN" + g)).find("input").val();
            f[i] = $(document.getElementById("SN" + g)).find("div")[1].innerHTML
        } else {
            var h = parseInt(g) + i + 1;
            c[i] = $(document.getElementById("SN" + h)).find("input").val();
            f[i] = $(document.getElementById("SN" + h)).find("div")[1].innerHTML
        }
    }
    if (g == 1 && c[0] == "252") {
        alert($("#BingoTopMsg").val());
        return false
    }
    for (j = 0; j <= f.length - 1; j = j + 1) {
        var h = parseInt(g) + j;
        $(document.getElementById("SN" + h)).find("input").val(c[j]);
        $(document.getElementById("SN" + h)).find("div")[1].innerHTML = f[j]
    }
    setMoveDataColor(b)
}

function callSecSubmit(h) {
    if (document.getElementById("txtSecCode").value == "") {
        alert("{{lbl_EmptyError}}");
        return false
    }
    if (document.getElementById("hidCheckSecRule").value.toLowerCase() == "true") {
        if (document.getElementById("txtSecCode").value.length != 6) {
            alert("{{lbl_LengthError}}");
            return false
        }
        var d = /^[0-9]*$/;
        if (!d.test(document.getElementById("txtSecCode").value)) {
            alert("{{lbl_NumberError}}");
            return false
        }
        var b = document.getElementById("txtSecCode").value;
        var a = "(\\d)(\\1{" + (b.length - 1) + "})";
        var e = new RegExp(a, "gi");
        if (e.test(b)) {
            alert("{{lbl_2NumberDiff}}");
            return false
        }
        var f = "0123456789";
        var g = "9876543210";
        if (f.indexOf(document.getElementById("txtSecCode").value) > -1 || g.indexOf(document.getElementById("txtSecCode").value) > -1) {
            alert("{{lbl_SeqError}}");
            return false
        }
    }
    document.getElementById("hidSubmit").value = h;
    document.getElementById("hidChangeMode").value = "sec";
    if (confirm(document.getElementById("hidconfirm").value)) {
        var c;
        c = document.getElementById("txtSecCode");
        document.getElementById("hidEncryptSecCode").value = CFS(c.value);
        c.value = "";
        document.getElementById("frmChangePW").submit();
        return true
    }
    return false
}

function callSubmit(f) {
    var d = new RegExp(/[a-zA-Z0-9]*/);
    var e;
    var a;
    if (document.getElementById("txtOldPW").value == "") {
        alert(document.getElementById("hidOldPW").value);
        return false
    }
    if (document.getElementById("txtPW").value == "") {
        alert(document.getElementById("hidPW").value);
        return false
    }
    if (document.getElementById("txtConPW").value == "") {
        alert(document.getElementById("hidConPW").value);
        return false
    }
    if (document.getElementById("txtPW").value.length > 10) {
        alert(document.getElementById("hidPW").value + " " + document.getElementById("hidExecPW").value);
        return false
    }
    if (document.getElementById("txtConPW").value.length > 10) {
        alert(document.getElementById("hidConPW").value + " " + document.getElementById("hidExecPW").value);
        return false
    }
    if (document.getElementById("txtPW").value.length < 6) {
        alert(document.getElementById("hidPW").value + " " + document.getElementById("hidExecPW").value);
        return false
    }
    if (document.getElementById("txtConPW").value.length < 6) {
        alert(document.getElementById("hidConPW").value + " " + document.getElementById("hidExecPW").value);
        return false
    }
    a = document.getElementById("txtPW").value;
    e = d.test(a);
    if (e == false) {
        alert(document.getElementById("hidSpecialCharactersNewPassword").value);
        document.getElementById("txtPW").focus();
        return false
    }
    a = document.getElementById("txtConPW").value;
    e = d.test(a);
    if (e == false) {
        alert(document.getElementById("hidSpecialCharactersConfirmPassword").value);
        document.getElementById("txtConPW").focus();
        return false
    }
    if (document.getElementById("txtPW").value != document.getElementById("txtConPW").value) {
        alert(document.getElementById("hidPWdiff").value);
        return false
    }
    if (document.getElementById("txtPW").value == document.getElementById("txtOldPW").value) {
        alert(document.getElementById("hidpwdnotsame").value);
        return false
    }
    document.getElementById("hidSubmit").value = f;
    document.getElementById("hidChangeMode").value = "pwd";
    /*
	var c;
    var b;
    c = document.getElementById("txtPW");
    c.value = CFS(c.value);
    c = document.getElementById("txtConPW");
    c.value = CFS(c.value);
    c = document.getElementById("txtOldPW");
    b = c.value.toLowerCase();
    c.value = CFS(c.value);
    c = document.getElementById("hidLowerCaseOldPW");
    c.value = CFS(b);*/
    document.getElementById("frmChangePW").submit();
    return true
}

function checkKeyForChPassword(c, a) {
    var b = (document.all) ? a.keyCode : a.which;
    if (whichCode == 13 || whichCode == 8 || whichCode == 9) {
        return true
    }
    key = whichCode;
    if (key >= 48 && key <= 57) {
        return true
    }
    if (key >= 65 && key <= 90) {
        return true
    }
    if (key >= 96 && key <= 122) {
        return true
    }
    return false
}

function userBrowser() {
    var a = navigator.userAgent.toLowerCase();
    if (/msie/i.test(a) && !/opera/.test(a)) {
        return "IE"
    } else {
        if (/firefox/i.test(a)) {
            return "Firefox"
        } else {
            if (/chrome/i.test(a) && /webkit/i.test(a) && /mozilla/i.test(a)) {
                return "Chrome"
            } else {
                if (/opera/i.test(a)) {
                    return "Opera"
                } else {
                    if (/webkit/i.test(a) && !(/chrome/i.test(a) && /webkit/i.test(a) && /mozilla/i.test(a))) {
                        return "Safari"
                    } else {
                        return "unKnow"
                    }
                }
            }
        }
    }
}

function resetPW() {
    document.getElementById("txtOldPW").value = "";
    document.getElementById("txtPW").value = "";
    document.getElementById("txtConPW").value = "";
    $(".testresult").remove()
}

function resetSEC() {
    document.getElementById("txtSecCode").value = ""
}

function showmessage(a) {
    if (a == "") {
        return false
    } else {
        alert(a)
    }
}

function addCommas(b) {
    var a = new RegExp("(-?[0-9]+)([0-9]{3})");
    while (a.test(b)) {
        b = b.replace(a, "$1,$2")
    }
    document.getElementById("uus").value = b
}

function removeCommas(b) {
    var a = /,/g;
    return b.replace(a, "")
};