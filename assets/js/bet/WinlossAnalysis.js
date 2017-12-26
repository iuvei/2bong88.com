function Daily_Onclick() {
    var roleid = _page.RoleId;
    var frmmain = $('frmmain');
    switch(roleid)
    {
        case 4:
            frmmain.action = 'Daily_WinlossAnalysisSuper.aspx';
            break;
        case 3:
            frmmain.action = 'Daily_WinlossAnalysisMaster.aspx';
            break;
        default:
            frmmain.action = '/azkv.php?r=betData/DailyWinLost';
            break;
    }
    frmmain.submit();
}

function Monthly_Onclick() {
    var roleid = _page.RoleId;
    var frmmain = $('frmmain');
    switch (roleid) {
        case 4:
            frmmain.action = 'Monthly_WinlossAnalysisSuper.aspx';
            break;
        case 3:
            frmmain.action = 'Monthly_WinlossAnalysisMaster.aspx';
            break;
        default:
            frmmain.action = '/azkv.php?r=betData/DailyWinLost&range=month';
            break;
    }
    frmmain.submit();
}

function Sport_Onclick() {
    var roleid = _page.RoleId;
    var frmmain = $('frmmain');
    switch (roleid) {
        case 4:
            frmmain.action = 'Sport_WinlossAnalysisSuper.aspx';
            break;
        case 3:
            frmmain.action = 'Sport_WinlossAnalysisMaster.aspx';
            break;
        default:
            frmmain.action = '';
            break;
    }
    frmmain.submit();    
}