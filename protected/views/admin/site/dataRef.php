<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Dữ liệu Reffer</title>
    <link href="https://mb.b88ag.com/_GlobalResources/Css/Agent.css?20141215" rel="stylesheet" type="text/css" />
    <link href="https://mb.b88ag.com/_Reports/Resources/Reports.css?20141215" rel="stylesheet" type="text/css" />
    <link href="https://mb.b88ag.com/_MemberInfo/PositionTakingList/Resources/PositionTakingList.css?20141215" rel="stylesheet" type="text/css" />
    <link href="https://mb.b88ag.com/_MemberInfo/CustomerList/Components/Print_Control/Resources/Print.css?20141215" rel="stylesheet" type="text/css" media="print" />
</head>

<body onload="initContextMenu(0, 110)">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <div id="page_main">
                    <div id="header_main">Dữ liệu Reffer &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="javascript:getPrint('tbl-container');" id="imgPrint" title="In"></a>
                    </div>
                    <div id="box_header" style="width: 100%">
                        <table class="l" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td>
                                    <link href="https://mb.b88ag.com/_Components/DoubleCommissionSearchUserName_Control/SearchUserName_Control.css?20141215" rel="stylesheet" type="text/css" />
                                    <link href="https://mb.b88ag.com/_Components/DoubleCommissionSearchUserName_Control/styles.css?20141215" rel="stylesheet" type="text/css" />
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
                                                <div style="width:65px; float:right; text-align:right">
                                                    <input id="dSubmit" type="button" value="Xác nhận" class="buttonSubmit" onclick="searchByUsername('CreditBalanceList.aspx','')" />
                                                </div>
                                                <div class="shadow" id="shadow" />
                                                <div class="output" id="output" />
                                                <script src="https://mb.b88ag.com/_Components/DoubleCommissionSearchUserName_Control/SearchUserName_Control.js?20141215" type="text/javascript"></script>
                                                <script src="https://mb.b88ag.com/_Components/DoubleCommissionSearchUserName_Control/autocomplete.js?20141215" type="text/javascript"></script>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="warning"><ul><li>Bạn được phép chuyển khoản: Thứ 2 - Thứ 3 - Thứ 4 - Thứ 5 - Thứ 6 - Thứ 7</li></ul></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="tbl-container">
                        <div id="boderRight">
                            <link href="https://mb.b88ag.com/_Components/PagingHeader/PagingHeader.css?20141215" rel="stylesheet" type="text/css" />
                            <table id="tblHeader" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="bgleft"></td>
                                    <td class="bgcenter">&nbsp;
                                        <link href="https://mb.b88ag.com/_Components/Paging/Paging.css?20141215" rel="stylesheet" type="text/css" />
                                        <script src="https://mb.b88ag.com/_Components/Paging/Paging.js?20141215" type="text/javascript"></script>
                                        <div id="_PagingTop" class="pagingHiden" pagesize="500" currentindex="1" rowcount="500" pagecount="1">
                                            <input disabled id="btnFirst_PagingTop" type="button" onclick="_PagingTop.First()" class="icon pagingFirst" />
                                            <input disabled id="btnPrev_PagingTop" type="button" onclick="_PagingTop.Move(-1)" class="icon pagingPrev" /><span class="pagingSeperator"></span>Trang
                                            <input id="txt_PagingTop" type="text" class="pagingCurrent" maxlength="4" size="2" value="1" onkeydown="_PagingTop.DoEnter(event, '_PagingTop.Go()')" />of 1<span class="pagingSeperator"></span>
                                            <input disabled id="btnNext_PagingTop" type="button" onclick="_PagingTop.Move(1)" class="icon pagingNext" />
                                            <input disabled id="btnLast_PagingTop" type="button" onclick="_PagingTop.Last()" class="icon pagingLast" />
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
                            <div id="ctxContainer">
                                <style>
                                    .ST {
                                        display: none;
                                    }
                                    table.showST .ST {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .FN {
                                        display: none;
                                    }
                                    table.showFN .FN {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .LN {
                                        display: none;
                                    }
                                    table.showLN .LN {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .CD {
                                        display: none;
                                    }
                                    table.showCD .CD {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .BL {
                                        display: none;
                                    }
                                    table.showBL .BL {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .YB {
                                        display: none;
                                    }
                                    table.showYB .YB {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .BC {
                                        display: none;
                                    }
                                    table.showBC .BC {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .OT {
                                        display: none;
                                    }
                                    table.showOT .OT {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .TO {
                                        display: none;
                                    }
                                    table.showTO .TO {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .LL {
                                        display: none;
                                    }
                                    table.showLL .LL {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .LI {
                                        display: none;
                                    }
                                    table.showLI .LI {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .UN {
                                        display: none;
                                    }
                                    table.showUN .UN {
                                        display: table-cell;
                                        *display: block;
                                    }
                                    .LCS {
                                        display: none;
                                    }
                                    table.showLCS .LCS {
                                        display: table-cell;
                                        *display: block;
                                    }
                                </style>
                                <link href="https://mb.b88ag.com/_Components/ShowHideColumn/Resources/ContextMenuColumns_Control.css?20141215" rel="stylesheet" type="text/css" />
                                <div id="PopupCtx" class="divMenuPopup">
                                    <table id="Popup" cellspacing="2" cellpadding="1" cols="ST,FN,LN,CD,BL,YB,BC,OT,TO,LL,LI,UN,LCS">
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('ST', 'chk_ST', '', '', true);" type="checkbox" id="chk_ST" />
                                                <label for="chk_ST"><span class="padding">Trạng thái</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('FN', 'chk_FN', '', '', true);" type="checkbox" id="chk_FN" />
                                                <label for="chk_FN"><span class="padding">Tên</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('LN', 'chk_LN', '', '', true);" type="checkbox" id="chk_LN" />
                                                <label for="chk_LN"><span class="padding">Họ</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('CD', 'chk_CD', '', '', true);" type="checkbox" id="chk_CD" />
                                                <label for="chk_CD"><span class="padding">Hạn mức tín dụng</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('BL', 'chk_BL', '', '', true);" type="checkbox" id="chk_BL" />
                                                <label for="chk_BL"><span class="padding">Số dư tài khoản</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('YB', 'chk_YB', '', '', true);" type="checkbox" id="chk_YB" />
                                                <label for="chk_YB"><span class="padding">Hôm qua Số dư tài khoản</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('BC', 'chk_BC', '', '', true);" type="checkbox" id="chk_BC" />
                                                <label for="chk_BC"><span class="padding">Hạn mức khả dụng</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('OT', 'chk_OT', '', '', true);" type="checkbox" id="chk_OT" />
                                                <label for="chk_OT"><span class="padding">Số  tiền chưa xử lý</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('TO', 'chk_TO', '', '', true);" type="checkbox" id="chk_TO" />
                                                <label for="chk_TO"><span class="padding">Tổng tiền cược của Member</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('LL', 'chk_LL', '', '', true);" type="checkbox" id="chk_LL" />
                                                <label for="chk_LL"><span class="padding">Lần đăng nhập cuối</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('LI', 'chk_LI', '', '', true);" type="checkbox" id="chk_LI" />
                                                <label for="chk_LI"><span class="padding">IP đăng nhập</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('UN', 'chk_UN', '', '', true);" type="checkbox" id="chk_UN" />
                                                <label for="chk_UN"><span class="padding">Tài khoản</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="padding" onclick="onChangeColumn('LCS', 'chk_LCS', '', '', true);" type="checkbox" id="chk_LCS" />
                                                <label for="chk_LCS"><span class="padding">LCS Win %</span>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="menuPopupAd">
                                    <div class="left"></div>
                                    <div class="bg">
                                        <div class="normal">
                                            <div style="margin: 5px 5px;">Nhấp chuột phải trên đầu của mỗi cột để Ẩn/ Hiện cột đó</div>
                                            <div>
                                                <input id="chkAd" type="checkbox" onclick="hidePopupAd();" />
                                                <label for="chkAd">Không hiển thị lại</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right"></div>
                                </div>
                            </div>
                            <table id="tblMain" class=" showST .ST  showFN .FN  showLN .LN  showCD .CD  showBL .BL  showYB .YB  showBC .BC  showOT .OT  showTO .TO  showLL .LL  showLI .LI  showUN .UN " border="1" cellpadding="2" cellspacing="0" style="width: 100%;">
                                <thead>
                                    <tr id="headerTop" class="RptHeader">
                                        <td class="NO">#</td>
                                        <td class="ST">Reffer</td>
                                        <td>Mã đơn hàng</td>
                                        <td class="FN">Địa chỉ Ip</td>
                                        <td class="LN">Thời gian thực hiện</td>
                                        <td class="CD">Được bonus</td>
                                        <td class="BL">Số tiền user nạp</td>
                                        
                                    </tr>
                                </thead>
                                <tbody>
									<?php $i=1; foreach($dataRef as $u){ ?>
									<?php $class = ($i%2==0)?"BgEven":"BgOdd"; ?>
                                    <tr class="<?php echo $class ?>">
                                        <td class="w-order"><?php echo $i ?></td>
                                        <?php $user = User::model()->findByPk($u->IdRef);if($user!=null) $username = $user->username;else $username = ""; ?>
                                        <td class="l"><?php echo $username ?></td>
                                        <td class="FN l"><?php echo $u->IdOrder ?></td>
                                        <td class="LN l"><?php echo $u->Ip ?></td>
                                        <td class="LC r"><?php echo date("d/m/Y H:i:s",$u->time) ?></td>
                                        <td class="BL r"><?php echo $u->Total ?></td>
                                        <td class="YB r"><font color='#1e1eeb'><?php echo $u->totaldeposit ?><font></td>
										
										</tr>
									<?php }?>
										</tbody>
								</table></div></div></div></td></tr></table>
						<script type="text/javascript" src="https://mb.b88ag.com/_GlobalResources/Js/Core.js"></script>
						<script type="text/javascript" src="http://ibetpm.com/assets/javascripts/new/AGEWnd.js"></script>
						<script type="text/javascript" src="https://mb.b88ag.com/_Components/ShowHideColumn/Resources/ContextMenuColumns_Control.js"></script>
						<script type="text/javascript" src="/assets/js/bet/CreditBalanceList.js"></script>
						</body></html><script type="text/javascript">var _page = {'tableId':'tblMain','cookiePrefix':'462822294','containerId':['headerTop'],'parentId':'ctxContainer','sessionId':'ybywbgen2pcapktxaoa5y3p2','wrnTransferSuccessful':'Chuyển khoản thành công','UserNameDefault':'Tên đăng nhập hoặc Tên/Họ','CustId':15508308,'PageSize':500};</script>