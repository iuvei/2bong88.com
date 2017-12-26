<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link href="/assets/stylesheets/agent/Agent.css?20150304" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Transfer.css?20150304" rel="stylesheet" type="text/css" />
</head>

<body>
    <table id="tblMain">
        <tr>
            <td>
                <div id="title_header">Chuyển khoản đồng loạt &nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="javascript:getPrint('print');"><img alt='print' border="0" src='/assets/stylesheets/agent/Images/printer1.gif' /></a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div id="box_header" style="width:100%">
                    <link href="/assets/stylesheets/agent/SearchUserName_Control.css?20150304" rel="stylesheet" type="text/css" />
                    <link href="/assets/stylesheets/agent/styles.css?20150304" rel="stylesheet" type="text/css" />
                    <table id="tblSearch" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>Tài khoản</td>
                            <td>
                                <input type="text" style="width:145px;" class="text_normal" name="txtUserName" id="txtUserName" value="" onkeypress="onKeyPressUser('dSubmit',event);" onclick="onclickUser('Tên đăng nhập hoặc Tên/Họ')" onblur="onblurUser('Tên đăng nhập hoặc Tên/Họ')" autocomplete="off" />
                            </td>
                            <td>Trạng thái</td>
                            <td>
                                <div id="box_option">
                                    <select id="statusFilter" name="statusFilter">
                                        <option value="0">Tất cả</option>
                                        <option value="1" selected>Mở</option>
                                        <option value="2">Bị đình chỉ</option>
                                        <option value="3">Bị khóa</option>
                                        <option value="4">Vô hiệu hóa</option>
                                    </select>
                                </div>
                                <div id="box_checking_filter">
                                    <input type="checkbox" id="chkYesterdayBalance" name="chkYesterdayBalance" onclick="" /> Tất cả số dư tính đến hôm qua</div>
                                <div style="width:65px; float:right; text-align:right">
                                    <input id="dSubmit" type="button" value="Xác nhận" class="buttonSubmit" onclick="" />
                                </div>
                                <div class="shadow" id="shadow" />
                                <div class="output" id="output" />
                                <script src="/assets/js/bet/SearchUserName_Control.js?20150304" type="text/javascript"></script>
                                <script src="/assets/js/bet/autocomplete.js?20150304" type="text/javascript"></script>
                            </td>
                        </tr>
                    </table>
                    <table id="tblMessage">
                        <tr>
                            <td><span class="warning"><ul><li>Bạn được phép chuyển khoản: Thứ 2 - Thứ 3 - Thứ 4 - Thứ 5 - Thứ 6 - Thứ 7</li></ul></span></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td>
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
            </td>
        </tr>
        <tr>
            <td>
                <div id="page_main">
                    <link href="/assets/stylesheets/agent/PagingHeader.css?20150304" rel="stylesheet" type="text/css" />
                    <table id="tblHeader" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="bgleft">&nbsp;&nbsp;
                                <div id="bttTransfer" class="btnSubmit" onclick="ShowFrmTransferMulti(this,'divTransferMulti');">Chuyển khoản
                                    <div class="arrowIco"></div>
                                </div>
                            </td>
                            <td class="bgcenter">&nbsp;
                                <link href="/assets/stylesheets/agent/Paging.css?20150304" rel="stylesheet" type="text/css" />
                                <script src="/_Components/Paging/Paging.js?20150304" type="text/javascript"></script>
                                <div id="_PagingTop" class="pagingHiden" pagesize="500" currentindex="1" rowcount="0" pagecount="0">
                                    <input disabled id="btnFirst_PagingTop" type="button" onclick="_PagingTop.First()" class="icon pagingFirst" />
                                    <input disabled id="btnPrev_PagingTop" type="button" onclick="_PagingTop.Move(-1)" class="icon pagingPrev" /><span class="pagingSeperator"></span>Trang
                                    <input id="txt_PagingTop" type="text" class="pagingCurrent" maxlength="4" size="2" value="1" onkeydown="_PagingTop.DoEnter(event, '_PagingTop.Go()')" />of 0<span class="pagingSeperator"></span>
                                    <input {disabledNext} id="btnNext_PagingTop" type="button" onclick="_PagingTop.Move(1)" class="icon pagingNext" />
                                    <input {disabledLast} id="btnLast_PagingTop" type="button" onclick="_PagingTop.Last()" class="icon pagingLast" />
                                </div>
                                <script type="text/javascript">
                                    var _PagingTop = new Paging('_PagingTop');
                                </script>
                            </td>
                            <td class="bgright">Dung lượng trang
                                <select id="sel_PagingTop" name="sel_PagingTop" onchange="_PagingTop.SetPageSize(this.value)">
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="500" selected>500</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div id="print">
                        <link href="/assets/stylesheets/agent/Print.css?20150304" rel="stylesheet" type="text/css" media="print" />
                        <table id="tblTransferList" cellspacing="1" cellpadding="0">
                            <thead>
                                <tr class="Header">
                                    <th style="width: 3%;">#</th>
                                    <th style="width: 5%;">
                                        <input id="chkall" name="chkall" type="checkbox" onclick="CheckAll();" />
                                        <br />Hôm qua</th>
                                    <th style="width: 12%;">Tài khoản</th>
                                    <th style="width: 11%;">Giao dịch đến hết hôm qua</th>
                                    <th style="width: 11%;">Số dư tài khoản</th>
                                    <th style="width: 11%;">Số tiền chưa xử lý</th>
                                    <th style="width: 11%;">Hạn mức được cấp</th>
                                    <th style="width: 12%;">Tên</th>
                                    <th style="width: 12%;">Họ</th>
                                    <th style="width: 12%;">Tài khoản</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <td class="SubTitle" colspan="13" style="padding: 3px 0px 3px 0px">Thông tin chưa được cập nhật</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <link href="/assets/stylesheets/agent/MenuPopup_Control.css?20150304" rel="stylesheet" type="text/css" />
    <div id="divTransferMulti" class="divMenuPopup">
        <div id="tr_transfer"><a class="LinkPopup" href="javascript:;" id="transfer" value="0">Chỉ trang này</a></div>
        <div id="tr_transferAll"><a class="LinkPopup" href="javascript:;" id="transferAll" value="0">Tất cả các trang</a></div>
    </div>
    <script src="/assets/js/bet/Core.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/AGEWnd.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/Transfer.js?20150304" type="text/javascript"></script>
    <script src="/assets/js/bet/MemberList.js?20150304" type="text/javascript"></script>
</body>

</html>
<script type="text/javascript">
    var _page = {
        'custid': <?php echo Yii::app()->user->getId() ?>,
        'roleid': 2,
        'wrnResetMaxTransfer': 'Sau khi tất toán, hạn mức chuyển khoản sẽ được reset lại giá trị tối đa Bạn có chắc muốn chuyển khoản?',
        'wrnTransfer': 'Bạn có chắc muốn chuyển khoản?',
        'wrnTransferSuccessful': 'Chuyển khoản thành công',
        'CallBack': 'OnTransferComplete()',
        'status': 1,
        'pageIndex': 1,
        'totalPage': 0,
        'pageSize': 500,
        'userName': '',
        'userNameDefault': 'Tên đăng nhập hoặc Tên/Họ',
        'isYesterdayBalance': false,
        'cusidSyncAll': ''
    };
</script>