<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="" />

    <link href='/assets/stylesheets/agent/common.css' type='text/css' rel='stylesheet' />
    <link href='/assets/stylesheets/agent/main.css' type='text/css' rel='stylesheet' />
    <script type='text/javascript' src='/assets/js/bet/Core.js?20150304'></script>
    <script type='text/javascript' src='/assets/js/bet/Common.js?20150304'></script>


    <script type="text/javascript">
        var sobjDate = null;
        var eobjDate = null;
        var fromDateControlID = "fdate";
        var toDateControlID = "tdate";
        var agentNumber = 1;

        function splitDate() {
            var s_date = $(fromDateControlID);
            var e_date = $(toDateControlID);
            var s_dataAry = new Array(2);
            var e_dataAry = new Array(2);

            var kk1 = s_date.value.split("/");
            for (var i = 0; i < kk1.length; i++) {
                s_dataAry[i] = kk1[i];
            }
            var kk2 = e_date.value.split("/");
            for (var i = 0; i < kk2.length; i++) {
                e_dataAry[i] = kk2[i];
            }

            sobjDate = new Date(s_dataAry[2], s_dataAry[0], s_dataAry[1]);
            eobjDate = new Date(e_dataAry[2], e_dataAry[0], e_dataAry[1]);
        }

        function showMsg(msgType) {
            splitDate();
            if (eobjDate < sobjDate) {
                if (msgType != 'special' && msgType != 'allSpecial') {
                    alert($("eroMeg").value);
                    return;
                } else {
                    setDDate();
                }
            }

            if (msgType == '') {
                msgType = $("msgType").value;
            }
            var str1 = msgType;
            var str2 = $(fromDateControlID).value;
            var str3 = $(toDateControlID).value;
            var extraParam = "";
            // update count of private messages in header frame
            if ((msgType == 'private') && (agentNumber > 0)) {
                var open = "(",
                    close = ")";
                var countPriMsg = "0";

                var countText = parent.frHeader.$('privateMsgLnk').innerHTML;
                if (countText.indexOf(open) >= 0) {
                    var temp = countText.substring(0, countText.indexOf(open) + 1) + countPriMsg + ")";
                    var temp2 = countText.substring(countText.indexOf(open) + 1, countText.indexOf(close));
                    extraParam = (parseInt(temp2) > 0 ? "&extra=1" : "");
                    parent.frHeader.$('privateMsgLnk').innerHTML = temp;
                }
            }

            location.href = "azkv.php?r=site/messageHistory&pageQuery=" + str1 + "&s_date=" + str2 + "&e_date=" + str3 + extraParam;
        }

        function setDDate() {
            var timeNow = new Date();
            var year = timeNow.getFullYear();
            var mon = timeNow.getMonth() + 1;
            var ddate = timeNow.getDate();
            var yesterday = new Date(Date.parse(timeNow) - (3 * 1000 * 60 * 60 * 24));
            $(fromDateControlID).value = mon + "/" + yesterday.getDate() + "/" + year;
            $(toDateControlID).value = mon + "/" + ddate + "/" + year;
        }

        function enableCalendar(IsDisabled) {
            $(fromDateControlID + "_tg").disabled = IsDisabled;
            $(toDateControlID + "_tg").disabled = IsDisabled;
            $("dSubmit").disabled = IsDisabled;
        }

        function setStatusCalendar() {
            var spMes = $("msgType").value;
            if (spMes == 'special' || spMes == 'allSpecial') {
                enableCalendar(true);
            } else {
                enableCalendar(false);
            }
        }
    </script>
</head>

<body>
    <script src="/assets/js/bet/calendar.js" type="text/javascript"></script>
    <script src="/assets/js/bet/date.js" type="text/javascript"></script>
    <script src="/assets/js/bet/calendar-E.js" type="text/javascript"></script>
    <script src="/assets/js/bet/calendar-setup.js" type="text/javascript"></script>
    <link href="/assets/stylesheets/agent/calendar-blue.css" media="all" rel="stylesheet" type="text/css" title="Blue" />
    <link rel="StyleSheet" href="/assets/stylesheets/agent/message.css" type="text/css">
    <div id="header_cont">
        <div class="b_msg0"><span class="text_header">Thông báo</span></div>
        <div class="msg">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <div id="msg_menu">
                            <ul>
                                <li id="current"><a href="javascript:showMsg('normal');"><span>Thông báo chung</span></a></li>
                                <li><a href="javascript:showMsg('special');"><span>Thông báo đăc biệt</span></a></li>
                                <li><a href="javascript:showMsg('private');"><span>Tin nhắn cá nhân</span></a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td nowrap="nowrap">Từ:&nbsp;
                                    <input id="fdate" class="date_no" value="<?php echo date("m/d/Y"); ?>" type="text" size="13" name="fdate" readonly />
                                </td>
                                <td nowrap="nowrap">
                                    <a href="#" class="imaLink"><img alt="" id="fdate_tg" title="Date selector" style="margin: 0px; cursor:pointer;" src="/assets/stylesheets/agent/Images/cal.gif" /></a>
                                    <script type="text/javascript">
                                        var ctrInput = "<?php echo date("n/d/Y",strtotime("yesterday")); ?>";
                                        Calendar.setup({
                                            inputField: "fdate",
                                            ifFormat: "%m/%d/%Y",
                                            showsTime: false,
                                            button: "fdate_tg",
                                            singleClick: true,
                                            showOthers: true,
                                            step: 1
                                        });
                                    </script>
                                </td>
                                <td nowrap="nowrap">đến:&nbsp;
                                    <input id="tdate" class="date_no" value="<?php echo date("/d/n/Y",strtotime("yesterday")); ?>" type="text" size="13" name="tdate" readonly />
                                </td>
                                <td nowrap="nowrap">
                                    <a href="#" class="imaLink"><img alt="" id="tdate_tg" title="Date selector" style="margin: 0px; cursor:pointer;" src="/assets/stylesheets/agent/Images/cal.gif" /></a>
                                    <script type="text/javascript">
                                        var ctrInput = "<?php echo date("/d/n/Y",strtotime("yesterday")); ?>";
                                        Calendar.setup({
                                            inputField: "tdate",
                                            ifFormat: "%m/%d/%Y",
                                            showsTime: false,
                                            button: "tdate_tg",
                                            singleClick: true,
                                            showOthers: true,
                                            step: 1
                                        });
                                    </script>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <input type="button" class="btn" style="width:55px" id="dSubmit" value="Xác nhận" onclick="javascript:showMsg('');" />
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="divMsgContent">
        <table cellspacing="1" cellpadding="0" width="100%" class="tblRpt" border="0">
            <tr class="RptHeader">
                <td width="20px">#</td>
                <td width="60px">ID</td>
                <td width="80px">Thời điểm</td>
                <td>Tin nhắn</td>
            </tr>
			<?php $i=1; foreach($message as $mes){ ?>
            <tr bgcolor="<?php echo ($i%2==0)?"#ffffff":"#f9f9f7" ?>" onmouseover="bgColor='#ffff00'" onmouseout="bgColor='<?php echo ($i%2==0)?"#ffffff":"#f9f9f7" ?>'">
                <td class="w_order_ms"><?php echo $i ?></td>
                <td class="c_ms"><?php echo $mes->Id ?></td>
                <td class="bl_time_ms"><?php echo date("d/m/Y",$mes->timeAdd); ?>
                    <br/><?php echo date("H:i:s",$mes->timeAdd); ?></td>
                <td class="message_content">
                    <?php echo $mes->content ?>
				</td>
            </tr>
			<?php $i++; } ?>
            
            
        </table>
    </div>
    <input type="hidden" name="eroMeg" id="eroMeg" value="The &quot;From&quot; Date cannot be greater than the &quot;To&quot; Date">
    <input type="hidden" name="msgType" id="msgType" value="normal">
    <script type="text/javascript">
        setStatusCalendar();
    </script>
</body>

</html>