<!DOCTYPE html>
<html>

<head>
    <title>1X2 / Chẵn / Lẻ</title>
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <link href="/assets/stylesheets/agent/Agent.css?20150304" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Reports.css?20150304" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/ErrorMsg.css?20150304" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/BetList.css?20150304" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/LastBetMonitoring.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <form id="frmMain" method="get" action="/azkv.php?r=betData/totalBetRunning">
        <div id="page_main">
            <div id="header_main">1X2 / Chẵn / Lẻ</div>
            <div id="Content">
                <div id="box_header">
                    <table width="100%">
                        <tr class="l">
                            <td nowrap id="BetTypeGroup45" class="c selectedBetType"><a href="javascript:LoadDataByBetType(_page.BetTypes_All);">Tất cả loại cược</a></td>
                            <td nowrap id="BetTypeGroup4" class="c"><a href="javascript:LoadDataByBetType(_page.BetTypes_1X2);">1X2</a></td>
                            <td nowrap id="BetTypeGroup5" class="c"><a href="javascript:LoadDataByBetType(_page.BetTypes_EvenOdd);">Chẵn/Lẻ</a></td>
                            <td width="50%"></td>
                            <td nowrap class="l">Cuối cùng --></td>
                            <td id="paging10" class="c b"><a href="javascript:LoadDataByRowCount('10');">10</a></td>
                            <td id="paging20" class="c"><a href="javascript:LoadDataByRowCount('20');">20</a></td>
                            <td id="paging30" class="c"><a href="javascript:LoadDataByRowCount('30');">30</a></td>
                            <td>
                                <div id="loading">&nbsp;</div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="betTable"></div>
                <link href="/assets/stylesheets/agent/ErrorMsg.css?20150304" rel="stylesheet" type="text/css" />
                <script src="/assets/js/bet/ErrorMsg.js?20150304" type="text/javascript"></script>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="diverrmsg" style="display: none;">
                    <tr>
                        <td id="msg_1_1" class="emsg_1_1">&nbsp;</td>
                        <td id="msg_1_2" class="emsg_1_2">&nbsp;</td>
                        <td id="msg_1_3" class="emsg_1_3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td id="msg_2_1" valign="top" class="emsg_2_1">&nbsp;</td>
                        <td valign="top" id="spmsgerr" class="msgerr"></td>
                        <td id="msg_2_2" class="emsg_2_2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td id="msg_3_1" class="emsg_3_1">&nbsp;</td>
                        <td id="msg_3_2" class="emsg_3_2">&nbsp;</td>
                        <td id="msg_3_3" class="emsg_3_3">&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
    <script src="/assets/js/bet/Core.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/LastBetMonitoring.js?v=<?php echo time() ?>" type="text/javascript"></script>
    <script src="/assets/js/bet/smoothie.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/AGEWnd.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/shortcut.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/ErrorMsg.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/BetList.js?20150304" type="text/javascript"></script>
</body>

</html>
<script type="text/javascript">
    var _page = {
        'sportTypeGroup': 0,
        'betTypeGroup': 45,
        'limitRowCount': 10,
        'TransIdCookieKey': '1B988E72748B178',
        'BetTypes_All': 45,
        'BetTypes_HDP': 1,
        'BetTypes_OU': 3,
		'BetTypes_1X2': 4,
		'BetTypes_EvenOdd': 5,
		'BetTypes_totalGoal': 6,
        'BetTypes_Others': 45,
		'custId': <?php echo $custId ?>,
    };
</script>