<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Tùy chỉnh cho Member - <?php echo $custUser ?></title>
    <link href='/assets/stylesheets/agent/editMember.css' rel="stylesheet" type="text/css" />
    <script src='/assets/js/bet/editMember1.js' type="text/javascript"></script>
    <script src='/assets/js/bet/editMember2.js' type="text/javascript"></script>
    <script src='/assets/js/bet/editMember3.js' type="text/javascript"></script>
    <script src='/assets/js/bet/editMember4.js' type="text/javascript"></script>
    <script src='/assets/js/bet/editMember5.js' type="text/javascript"></script>
    <script src='/assets/js/bet/editMember6.js' type="text/javascript"></script>
    <script src='/azkv.php?r=adminweb/getCusSetting&id=<?php echo $custId ?>' type="text/javascript"></script>
    <link href='/assets/stylesheets/agent/Agent.css?20150304' rel='stylesheet' type='text/css' />
    <link href='/assets/stylesheets/agent/MemberInfo.css?20150304' rel='stylesheet' type='text/css' />
</head>

<body>
    <form action='' method="post">
        <div class="minWidthCustomer">
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
            <input type="hidden" name="txtCustomerObject" id="txtCustomerObject" />
            <div class="pt7">
                <div class="btnLeft">
                    <button data-bind='click: saveCustomer' accountpermisssion="[B]" id="btnSubmit" class="btnMain">Cập nhật</button>
                </div>
            </div>
            <div class="customerInfo">
                <div class="headerTab">Thông tin Chung</div>
                <div class="clearBlock">
                    <div class="customerInfoBlock1">Tên</div>
                    <div class="customerInfoBlock2">
                        <input id="firstName" type="text" class="textBoxInfo" data-bind="value: customer.firstName" maxlength="50" />
                    </div>
                    <div class="customerInfoBlock3">Họ</div>
                    <div class="customerInfoBlock4">
                        <input id="lastName" type="text" class="textBoxInfo" data-bind="value: customer.lastName" maxlength="50" />
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="customerInfoBlock1">Điện thoại</div>
                    <div class="customerInfoBlock2">
                        <input id="phone" type="text" class="textBoxInfo" data-bind="value: customer.phone" maxlength="50" />
                    </div>
                    <div class="customerInfoBlock3">Điện thoại di động</div>
                    <div class="customerInfoBlock4">
                        <input id="mobilePhone" type="text" class="textBoxInfo" data-bind="value: customer.mobilePhone" maxlength="50" />
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="customerInfoBlock1">Hạn mức được cấp</div>
                    <div class="customerInfoBlock2">
                        <input type="text" id="credit" maxlength="14" class="textBoxCredit textBoxInfo" data-bind="value: customer.credit" /><span class="hide">&gt;=<span data-bind="text: customer.minCredit" id="minCredit"></span></span>
                        <= <span data-bind="text: customer.agentMaxCreditTemp" id="maxCredit"></span>
                    </div>
                    <div class="customerInfoBlock3">Fax</div>
                    <div class="customerInfoBlock4">
                        <input id="fax" type="text" class="textBoxInfo" data-bind="value: customer.fax" maxlength="50" />
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="customerInfoBlock1">Nhóm</div>
                    <div class="customerInfoBlock2"><span data-bind="text: customer.group"></span></div>
                    <div class="customerInfoBlock3">
                        <label for="closed">Bị khóa</label>
                    </div>
                    <div class="customerInfoBlock4">
                        <input name="closed" id="closed" type="checkbox" data-bind="checked: customer.statusSetting.closed, enable: customer.statusSetting.uplineClosed ? false : true" />
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="customerInfoBlock1">
                        <label for="suspended">Bị đình chỉ</label>
                    </div>
                    <div class="customerInfoBlock2">
                        <input name="suspended" id="suspended" type="checkbox" data-bind="checked: customer.statusSetting.suspended, enable: (customer.statusSetting.uplineSuspended || customer.statusSetting.uplineClosed) ? false : true" />
                    </div>
                    <div class="customerInfoBlock3"></div>
                    <div class="customerInfoBlock4NoBorderLeft"></div>
                </div>
            </div>
            <div class="commission">
                <div class="headerTab">Hoa hồng</div>
                <div class="clearBlock">
                    <div class="commissionBlock1 commissionHeader"></div>
                    <div class="commissionBlock2 commissionHeader">Hoa hồng cho Agent</div>
                    <div class="commissionBlock2 commissionHeader">Hoa hồng cho Member</div>
                </div>
                <div class="clearBlock">
                    <div class="commissionBlock1">Asian HDP, OU, OE</div>
                    <div class="commissionBlock2">
                        <input type="text" id="textBoxDiscountAsian" name="textBoxDiscountAsian" class="textBoxComm" disabled="true" />
                    </div>
                    <div class="commissionBlock2">
                        <select id="discountAsian" name="discountAsian" class="widthGroup"></select>
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="commissionBlock1">1 X 2</div>
                    <div class="commissionBlock2">
                        <input type="text" id="textBoxDiscount1x2" class="textBoxComm" disabled="true" data-bind="value: customer.commissionSetting.discount1x2" />
                    </div>
                    <div class="commissionBlock2">
                        <select id="discount1x2" name="discount1x2" class="widthGroup"></select>
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="commissionBlock1">Loại cược khác</div>
                    <div class="commissionBlock2">
                        <input type="text" id="textBoxDiscountCS" class="textBoxComm" disabled="true" data-bind="value: customer.commissionSetting.discountCS" />
                    </div>
                    <div class="commissionBlock2">
                        <select id="discountCS" name="discountCS" class="widthGroup"></select>
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="commissionBlock1">Number Game Comm</div>
                    <div class="commissionBlock2">
                        <input type="text" id="textBoxDiscountNumber" class="textBoxComm" disabled="true" data-bind="value: customer.commissionSetting.discountNumber" />
                    </div>
                    <div class="commissionBlock2">
                        <select id="discountNumber" name="discountNumber" class="widthGroup"></select>
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="commissionBlock1">HR Fixed Odds</div>
                    <div class="commissionBlock2">
                        <input type="text" id="textBoxDiscountHRFixedOdds" class="textBoxComm" disabled="true" data-bind="value: customer.commissionSetting.discountHRFixedOdds" />
                    </div>
                    <div class="commissionBlock2">
                        <select id="discountHRFixOdds" name="discountHRFixOdds" class="widthGroup"></select>
                    </div>
                </div>
                <div class="clearBlock"></div>
            </div>
            <div class="clearBlock"></div>
            <br />
            <div class="headerBetSetting">Tiền Cược</div>
            <div id="bettingLimitContainer"></div>
            <br />
            <div class="clearBlock"></div>
            <div class="headerPositionTaking">Position Taking
                <div style="float:right;">
                    <a class="infoIco" style="margin:3px 5px;height:16px;display:inline-block" href="../../../PositionTakingInformation/PositionTakingBetTypeReference" target="_blank" title="Click to view PT Info"></a>
                </div>
            </div>
            <div class="positionTaking">
                <div id="ptGridContainer"></div>
            </div>
            <div class="clearBlock"></div>
            <div class="pt7">
                <div class="btnLeft">
                    <button data-bind='click: saveCustomer' accountpermisssion="[B]" id="btnSubmitFooter" class="btnMain">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
    <script language="javascript" type="text/javascript">
        var isOfferHRFixedOdds = "true";
    </script>
    <script src='/assets/js/bet/Core.js?20150304' type='text/javascript'></script>
    <script src='/assets/js/bet/languageJs.js' type='text/javascript'></script>
    <script src='/assets/js/bet/MemberInfo.js?20150304' type='text/javascript'></script>
    <script src='/assets/js/bet/AddNewMember.js?20150328' type='text/javascript'></script>
</body>

</html>