<!DOCTYPE html>
<html>

<head>
    <title>Header</title>
    <link href="/assets/stylesheets/agent/Agent.css?20141215" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/header.css?20141215" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Header2.css?20141215" rel="stylesheet" type="text/css" />
	<meta content='text/html;charset=utf-8' http-equiv='content-type'>
</head>

<body>
    <div id="banner_main">
        <div id="logo"></div>
        <div id="banner">
            <div id="language"><a id="logout" href="javascript: logout();">Đăng Xuất</a> <a id="Help" title="Giúp đỡ"  href="javascript:void(0);" target="_blank">Giúp đỡ</a>
                <div id="standLine">&nbsp;</div>
                <div id="language_box">
                    <div class="langFlag langFlag_vi">
                        <select id="selLanguage"  style="margin-top: -1px">
                            
                            <option value="vi-VN">Tiếng Việt</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="button">
                <div id="g_left">&nbsp;</div>
                <div id="g_right">&nbsp;</div>
                <div id="button_main">
                    <div id="Popup_top" style="display: none">
                        <div id="Popup_line">
                            <a onclick="javascript:ShowPopupTop(false)" style="cursor: pointer;"><img alt="Close" src="/assets/_GlobalResources/Images/icon_close.jpg" width="14px" height="14px" border="0" title="Close" />
                            </a>
                        </div>
                        <div style="height: 60px; width: auto;">
                            <div id="Popup_contents" class="messageBlock"></div>
                            <div id="Popup_contents2" class="messageBlock"></div>
                        </div>
                    </div>
                    <ul class="HeaderMenu">
                        <li><a id="balance" href="javascript:Change2Menu('/azkv.php?r=adminweb/portalPage')">Trang chủ</a>
                        </li>
                        <li><a id="transfer"  href="javascript:Change2Menu('/azkv.php?r=adminweb/transfer')">Chuyển khoản</a>
                        </li>
                        <li><a id="changepass"  href="javascript:Change2Menu('/azkv.php?r=adminweb/ChangePassword')">Bảo mật</a>
                        </li>
                        <li><a id="viewlog"  href="javascript:Change2Menu('/azkv.php?r=adminweb/ViewLog');">Nhật ký</a>
                        </li>
                    </ul>
                    <div id="clock"></div>
                </div>
                <div id="news_main">
                    <table border="0" cellpadding="0" cellspacing="0" width="99%">
                        <tr>
                            <td style="width: 99%">
                                <div id="text_news_out">
                                    <div id="text_news" style="overflow: hidden; position: relative">
                                        <div id="scroller" style="position: absolute; white-space: nowrap; left: 1000px">
                                            <a id="topnews" style="overflow: hidden; position: relative" href="javascript:;"></a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div id="button_top"><a id="privateMsgLnk" class="b_top" href="javascript:;">&nbsp;&nbsp;Tin nhắn cá nhân(0)</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="showFlashAccInfo" value="1" />
    <input type="hidden" id="ctime" value="6-20-31-AM" />
    <input type="hidden" id="cdate" value="Dec 18,2014 GMT+8" />
    <input type="hidden" id="userid" value="<?php echo Yii::app()->user->getId(); ?>" />
    <input type="hidden" id="subaccid" value="0" />
    <input type="hidden" id="roleid" value="2" />
    <div id="divPopupAd" style="display: none">Temporary need this tag for other pages work</div>
    <script src="/assets/js/bet/Core.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/CustomerProfile.js?20150304" type="text/javascript"></script>
    <script language="javascript" type="text/javascript">
        customerProfle.loadCustomerProfile(src = "/azkv.php?r=adminweb/customProfile");
    </script>
    <script src="/assets/js/bet/header.js?20150404" type="text/javascript"></script>
    
</body>

</html>
<script type="text/javascript">
    var _page = {
        'Language': 'vi-VN',
        'OnUserID': <?php echo $user->Id ?>,
        'ShowLetter': false,
        'Months': '[\u0027Tháng 1\u0027, \u0027Tháng 2 \u0027, \u0027Tháng 3\u0027, \u0027Tháng 4\u0027, \u0027Tháng 5\u0027, \u0027Tháng 6\u0027, \u0027Tháng 7\u0027, \u0027Tháng 8\u0027, \u0027Tháng 9\u0027, \u0027Tháng 10\u0027, \u0027Tháng 11\u0027, \u0027Tháng 12\u0027]',
        'year': '<?php echo date("Y") ?>',
        'month': '<?php echo date("m") ?>',
        'day': '<?php echo date("d") ?>',
        'hrs': '<?php echo date("H") ?>',
        'min': '<?php echo date("i") ?>',
        'sec': '<?php echo date("s") ?>',
        'PM': 'PM',
        'AM': 'AM',
        'CookieCurrentURLKey': '58655615',
        'msgList': []
    };
	function logout()
	{

		window.top.location.href = 'azkv.php?r=site/logout';
		//

	}
</script>