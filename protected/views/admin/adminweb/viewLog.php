<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head id="ctl00_Head1">
    <title>View Log Customer Setting</title>
    <link href="/assets/stylesheets/agent/Agent.css" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Tab.css" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Table.css" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Paging.css" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/ViewLog.css" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/jscal2.css" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/steel.css" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <form name="aspnetForm" method="post" action="" id="aspnetForm">
        <div>
            <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="" />
        </div>
        <div>
            <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="" />
        </div>
        <div id="page_main">
            <div>
                <div id="button_hr">
                    <div id="tab_hr">
                        <ul>
                            <li id="CustomerSetting"><a href="javascript:MenuGoTo('CustomerSetting')"><span>Thiết lập</span></a></li>
                            <li id="Status"><a href="javascript:MenuGoTo('CustomerSetting')"><span>Trạng thái</span> </a></li>
                            <li id="Credit"><a href="javascript:MenuGoTo('CustomerSetting')"><span>Tín dụng</span></a></li>
                            <li id="Login"><a href="javascript:MenuGoTo('CustomerSetting')"><span>Đăng nhập</span></a></li>
                        </ul>
                    </div>
                </div>
                <div id="box_header" style="border-top: 0px; padding: 5px 5px 5px 5px;">
                    <div class="divUserName">
                        <div id="ctl00_divUserName" class="divSearch">Tài khoản
                            <input maxlength="50" id="txtUserName" name="txtUserName" class="username" type="text" style="width: 150px" title='Tên đăng nhập hoặc Tên/Họ' onkeydown='onclickUser("Tên đăng nhập hoặc Tên/Họ")' onfocus='onclickUser("Tên đăng nhập hoặc Tên/Họ")' onblur='onblurUser("Tên đăng nhập hoặc Tên/Họ")' onkeypress='KeyPress(event)' autocomplete="off" /><span id="RequiredUserName" class="required">*</span></div>
                        <div class="divLogType" id="ddlLogActionType">Xem
                            <select name="ctl00$ddlActionType" id="ctl00_ddlActionType" class="ActionType" onChange="DoSearch();">
                                <option value="-1">Tất cả</option>
                                <option value="1">Position Taking</option>
                                <option value="2">Tiền hoa hồng</option>
                                <option value="3">Thiết lập tiền cược</option>
                                <option value="4">Th&#244;ng tin t&#224;i khoản</option>
                            </select>
                        </div>
                        <link href="/assets/stylesheets/agent/DateRangeSelect.css?20150304" rel="stylesheet" type="text/css" />
                        <script src="/assets/js/bet/DateRangeSelect.js?20150304" type="text/javascript"></script>
                        <script type="text/javascript">
                            var max_server_date = '3/25/2015';
                        </script>
                        <div id="spDateTimeSearch">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tr style="height: 32px;">
                                    <td>Xem dữ liệu trong tháng&nbsp;&nbsp;</td>
                                    <td id="td1" class="l">
                                        <input type="hidden" name="fdate" id="fdate" value="<?php echo date("m/d/Y",strtotime("-24 hours")) ?>" />
                                        <input type="hidden" name="tdate" id="tdate" value="<?php echo date("m/d/Y",strtotime("-48 hours")) ?>" /><span id="spfdatetext"><div class="monthPicker"><a href="javascript:PrevMonth();" id="btnPrevMonth" class="prev" title="Previous Month"></a><span id="lblSelectedMonth" onclick="ShowMonth();" title='3/1/2015'>Tháng 3 - 2015</span>
                                        <a href="javascript:NextMonth();" id="btnNextMonth" class="next disabled" title="Next Month"></a>
                        </div>
                        <div id="monthPickerDropDown">
                            <ul class="monthPickerDropDownInner">
                                <li class="year"><a id="ID_2015" class='selected' href="javascript:SelectedYear('2015');" year="2015"><span class="bullet">2015</span></a></li>
                                <li class="month" id="LI_2015_3"><a id="3/1/2015" class='selected' href="javascript:SetSelectedMonth('3/1/2015', true);" title="Tháng 3">Tháng 3</a></li>
                                <li class="month" id="LI_2015_2"><a id="2/1/2015" href="javascript:SetSelectedMonth('2/1/2015', true);" title="Tháng 2">Tháng 2</a></li>
                                <li class="month" id="LI_2015_1"><a id="1/1/2015" href="javascript:SetSelectedMonth('1/1/2015', true);" title="Tháng 1">Tháng 1</a></li>
                                <li class="year"><a id="ID_2014" href="javascript:SelectedYear('2014');" year="2014"><span class="bullet">2014</span></a></li>
                                <li class="month" id="LI_2014_12" style='display: none'><a id="12/1/2014" href="javascript:SetSelectedMonth('12/1/2014', true);" title="Tháng 12">Tháng 12</a></li>
                                <li class="month" id="LI_2014_11" style='display: none'><a id="11/1/2014" href="javascript:SetSelectedMonth('11/1/2014', true);" title="Tháng 11">Tháng 11</a></li>
                                <li class="month" id="LI_2014_10" style='display: none'><a id="10/1/2014" href="javascript:SetSelectedMonth('10/1/2014', true);" title="Tháng 10">Tháng 10</a></li>
                                <li class="month" id="LI_2014_9" style='display: none'><a id="9/1/2014" href="javascript:SetSelectedMonth('9/1/2014', true);" title="Tháng 9">Tháng 9</a></li>
                                <li class="month" id="LI_2014_8" style='display: none'><a id="8/1/2014" href="javascript:SetSelectedMonth('8/1/2014', true);" title="Tháng 8">Tháng 8</a></li>
                                <li class="month" id="LI_2014_7" style='display: none'><a id="7/1/2014" href="javascript:SetSelectedMonth('7/1/2014', true);" title="Tháng 7">Tháng 7</a></li>
                                <li class="month" id="LI_2014_6" style='display: none'><a id="6/1/2014" href="javascript:SetSelectedMonth('6/1/2014', true);" title="Tháng 6">Tháng 6</a></li>
                                <li class="month" id="LI_2014_5" style='display: none'><a id="5/1/2014" href="javascript:SetSelectedMonth('5/1/2014', true);" title="Tháng 5">Tháng 5</a></li>
                                <li class="month" id="LI_2014_4" style='display: none'><a id="4/1/2014" href="javascript:SetSelectedMonth('4/1/2014', true);" title="Tháng 4">Tháng 4</a></li>
                                <li class="month" id="LI_2014_3" style='display: none'><a id="3/1/2014" href="javascript:SetSelectedMonth('3/1/2014', true);" title="Tháng 3">Tháng 3</a></li>
                                <li class="month" id="LI_2014_2" style='display: none'><a id="2/1/2014" href="javascript:SetSelectedMonth('2/1/2014', true);" title="Tháng 2">Tháng 2</a></li>
                                <li class="month" id="LI_2014_1" style='display: none'><a id="1/1/2014" href="javascript:SetSelectedMonth('1/1/2014', true);" title="Tháng 1">Tháng 1</a></li>
                            </ul>
                            <input type="hidden" name="listYear" id="listYear" value="2015-2014" />
                            <input id="maxDate" name="maxDate" type="hidden" value="3/1/2015" />
                            <input id="minDate" name="minDate" type="hidden" value="1/1/2014" />
                        </div>
                        </span>
                        </td>
                        <td>&nbsp;&nbsp;Từ&nbsp;</td>
                        <td><span id="spfdate"><select name="ddlDateFrom" id="ddlDateFrom" onchange="ChangeDateFrom();"><option value="1" >1</option><option value="2" >2</option><option value="3" >3</option><option value="4" >4</option><option value="5" >5</option><option value="6" >6</option><option value="7" >7</option><option value="8" >8</option><option value="9" >9</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option><option value="13" >13</option><option value="14" >14</option><option value="15" >15</option><option value="16" >16</option><option value="17" >17</option><option value="18" >18</option><option value="19" >19</option><option value="20" >20</option><option value="21" >21</option><option value="22" >22</option><option value="23" >23</option><option value="24" selected>24</option><option value="25" >25</option></select></span></td>
                        <td>&nbsp;đến&nbsp;</td>
                        <td><span id="sptdate"><select name="ddlDateTo" id="ddlDateTo" onchange="ChangeDateTo();"><option value="1" >1</option><option value="2" >2</option><option value="3" >3</option><option value="4" >4</option><option value="5" >5</option><option value="6" >6</option><option value="7" >7</option><option value="8" >8</option><option value="9" >9</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option><option value="13" >13</option><option value="14" >14</option><option value="15" >15</option><option value="16" >16</option><option value="17" >17</option><option value="18" >18</option><option value="19" >19</option><option value="20" >20</option><option value="21" >21</option><option value="22" >22</option><option value="23" >23</option><option value="24" >24</option><option value="25" selected>25</option></select></span></td>
                        <td class="l">&nbsp;&nbsp;
                            <input type="button" class="btn" style="width: 55px" id="dSubmit" value="Xác nhận" onclick="DisableButton(); SearchByDate();" />
                        </td>
                        <td valign="top">
                            <div id="loading" class="" style="float: left;"></div>
                        </td>
                        </tr>
                        </table>
                    </div>
                    <div id="divShowOldValue">
                        <input type="checkbox" value="true" id="chk_showOldValue" onchange="setShowOldValueCookie(this)" />
                        <label for="chk_showOldValue">Hiển thị giá trị cũ</label>
                    </div>
                </div>
            </div>
            <div class="warning" id="divMessageWarning" style="display: none">
                <ul>
                    <li>Nhật ký đăng nhập của thành viên hiện chưa có.</li>
                </ul>
            </div>
            <div id="content">
                <table width="100%" cellpadding="0" cellspacing="0" id="DataLog">
                    <tr>
                        <th>ID</th>
                        <th>Thởi điểm</th>
                        <th>Thay đổi bởi</th>
                        <th>Hành động</th>
                        <th>Chi tiết</th>
                    </tr>
                    <tr id="ctl00_contentData_ltrNoInfo" class="noInfo">
                        <td colspan="8">Thông tin chưa được cập nhật</td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </form>
    <script src="/assets/js/bet/Core.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/AGEWnd.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/autocomplete.js" type="text/javascript"></script>
    <script src="/assets/js/bet/ViewLogLibs.js?20150304" type="text/javascript"></script>
    <script type="text/javascript" language="javascript">
        var ctrInput = "<?php echo "n/d/Y A:i:s" ?>";
        var ddlActionType = 'ctl00_ddlActionType';
        var role = '2';
        var enterusername = 'Tên đăng nhập hoặc Tên/Họ';
        RegisterStartUp('Initialize()');
    </script>
    <div class="shadow" id="shadow" />
    <div class="output" id="output" />
</body>

</html>