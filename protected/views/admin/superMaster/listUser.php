<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <link href="/assets/stylesheets/agent/Agent.css?20141215" rel="stylesheet" type="text/css" />
      <link href="/assets/stylesheets/agent/CustomerList.css?20141215" rel="stylesheet" type="text/css" />
      <link href="/assets/stylesheets/agent/IcoEdit_Control.css?20141215" rel="stylesheet"type="text/css" />
      <link href="/assets/stylesheets/agent/IconEditMulti_Control.css?20141215"rel="stylesheet" type="text/css" />
      <link href="/assets/stylesheets/agent/IcoOther_Control.css?20141215" rel="stylesheet"type="text/css" />
      <link href="/assets/stylesheets/agent/IcoStatus.css?20141215" rel="stylesheet"type="text/css" />
      <link href="/assets/stylesheets/agent/IcoViewDownline_Control.css?20141215"rel="stylesheet" type="text/css" />
      <link href="/assets/stylesheets/agent/MenuPopup_Control.css?20141215" rel="stylesheet"type="text/css" />
   </head>
   <body>
      <table>
         <tr>
            <td><input type="hidden" id="arrayCustID" name="arrayCustID" /><input type="hidden" id="arrayUserName" name="arrayUserName" /><input type="hidden" id="arrayStatus" name="arrayStatus" /><input type="hidden" id="isDisableSuspendedStatus" name="isDisableSuspendedStatus"value="false" /><input type="hidden" id="isDisableAllowOutrightStatus" name="isDisableAllowOutrightStatus"value="true" /></td>
         </tr>
      </table>
      <table>
         <tr>
            <td>
               <link href="/assets/stylesheets/agent/ErrorMsg.css?20141215" rel="stylesheet" type="text/css" />
               <script src="/assets/js/bet/ErrorMsg.js?20141215" type="text/javascript"></script>
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
               <div id="title_header">Danh sách Thành viên &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:getPrint('page_main');" id="imgPrint" title="In"></a></div>
            </td>
         </tr>
         <tr>
            <td>
               <div id="box_header" style="width:100%">
               <link href="/assets/stylesheets/agent/SearchUserName_Control.css?20141215" rel="stylesheet" type="text/css" />
               <link href="/assets/stylesheets/agent/styles.css?20141215" rel="stylesheet" type="text/css" />
               <table id="tblSearch" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                     <td>Tài khoản</td>
                     <td><input type="text" style="width:145px;" class="text_italic" name="txtUserName" id="txtUserName" value="Tên đăng nhập hoặc Tên/Họ" onkeypress="onKeyPressUser('dSubmit',event);"onclick="onclickUser('Tên đăng nhập hoặc Tên/Họ')" onblur="onblurUser('Tên đăng nhập hoặc Tên/Họ')" autocomplete="off"/></td>
                     <td>Trạng thái</td>
                     <td>
                        <div id="box_option">
                           <select id="statusFilter" name="statusFilter">
                              <option value="0" >Tất cả</option>
                              <option value="1" >Mở</option>
                              <option value="2" >Bị đình chỉ</option>
                              <option value="3" >Bị khóa</option>
                              <option value="4" >Vô hiệu hóa</option>
                           </select>
                        </div>
                        <div style="width:65px; float:right; text-align:right"><input id="dSubmit" type="button" value="Xác nhận" class="buttonSubmit" onclick="GetCustomer('MemberList.aspx')" /></div>
                        <div class="shadow" id="shadow" />
                        <div class="output" id="output" />
                           <script src="/assets/js/bet/SearchUserName_Control.js?20141215" type="text/javascript"></script><script src="/assets/js/bet/autocomplete.js?<?php echo time(); ?>" type="text/javascript"></script>
                     </td>
                  </tr>
               </table>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div id="page_main">
                  <link href="/assets/stylesheets/agent/Print.css?20141215" rel="stylesheet" type="text/css"media="print" />
                  <link href="/assets/stylesheets/agent/PagingHeader.css?20141215" rel="stylesheet" type="text/css" />
                  <table id="tblHeader" cellspacing="0" cellpadding="0">
                     <tr>
                        <td class="bgleft">&nbsp;&nbsp;Lưa chọn : <a href="#" id="chkAll" onclick="CheckAll_onClick(true);">Tất cả</a> | <a href="#" id="chkNone" onclick="CheckAll_onClick(false);">None</a></td>
                        <td class="bgcenter">
                           &nbsp;
                           <link href="/assets/stylesheets/agent/Paging.css?20141215" rel="stylesheet" type="text/css" />
                           <script src="/assets/js/bet/Paging.js?20141215" type="text/javascript"></script>
                           <div id="_PagingTop" class="pagingHiden" pagesize="500" currentindex="1" rowcount="500" pagecount="1"><input disabled id="btnFirst_PagingTop" type="button" onclick="_PagingTop.First()" class="icon pagingFirst" /><input disabled id="btnPrev_PagingTop" type="button" onclick="_PagingTop.Move(-1)" class="icon pagingPrev" /><span class="pagingSeperator"></span>Trang<input id="txt_PagingTop" type="text" class="pagingCurrent" maxlength="4" size="2" value="1" onkeydown="_PagingTop.DoEnter(event, '_PagingTop.Go()')" />of 1<span class="pagingSeperator"></span><input disabled id="btnNext_PagingTop" type="button" onclick="_PagingTop.Move(1)" class="icon pagingNext" /><input disabled id="btnLast_PagingTop" type="button" onclick="_PagingTop.Last()" class="icon pagingLast" /></div>
                           <script type="text/javascript">var _PagingTop = new Paging('_PagingTop');</script>
                        </td>
                        <td class="bgright">
                           Dung lượng trang
                           <select id="sel_PagingTop" name="sel_PagingTop" onchange="_PagingTop.SetPageSize(this.value)">
                              <option value="10">10</option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                              <option value="500" selected>500</option>
                           </select>
                        </td>
                     </tr>
                  </table>
                  <table id="tblCustomerList">
                     <thead>
                        <tr>
                           <th id="headerNo" rowspan="2" userId="15508308" subAccId="0">No.</th>
                           <th rowspan="2"  isDirectDownline="1" isShowDCom=False>
                              <div onclick="RenderMulti(this,'MultiPopup','Agent','15508308','15508308');" class="btnEditMult" id="EdiMulti"></div>
                           </th>
                           <th rowspan="2">Tài khoản</th>
                           <th rowspan="2">Trạng thái</th>
                           <th rowspan="2">Tùy chỉnh</th>
                           <th rowspan="2" style="white-space: pre-line;">Nhân đôi hoa hồng</th>
                           <th rowspan="2">Biệt danh</th>
                           <th rowspan="2">Tên</th>
                           <th rowspan="2">Họ</th>
                           <th rowspan="2">Nhóm</th>
                           <th colspan="7" class="header_comm">Hoa hồng</th>
                           <th rowspan="2">Ngày tạo</th>
                           <th rowspan="2">IP đăng nhập</th>
                           <th rowspan="2">Tài khoản</th>
                        </tr>
                        <tr class="header">
                           <th>A Comm 1</th>
                           <th>A Comm 2</th>
                           <th>A Comm 3</th>
                           <th>P Comm 1</th>
                           <th>P Comm 2</th>
                           <th>P Comm 3</th>
                           <th>Number Game</th>
                        </tr>
                     </thead>
                     <tbody>
						<?php $i=1; foreach($users as $user){ ?>
                        <tr class="RowBgOpen" id="<?php echo $user->Id ?>" iconhr="2" iconcs="2" iconbg="2" iconp2p="0" isDisabledP2P="1" iconLiveCasino="1" isDisabledLiveCS="0" iconVirtualSport="2" isDisabledVS="1" iconKeno="2" isDisabledKeno="1" iconEdit="" statusKeno="0">
                           <td><?php echo $i; ?></td>
                           <td ><input type="checkbox" id="chkid_<?php echo $user->Id ?>" name="chkid" value="<?php echo $user->Username ?>" statuscs="<?php echo $user->status ?>" statusracing="0" statusbingo="1" statusp2p="-1" statusLiveCasino="1" statusVirtualSport="1"/></td>
                           <td class="l">
                              <div class='text' onclick="viewCustOutSt('<?php echo $user->Username ?>',<?php echo $user->Id ?>)"><?php echo $user->Username ?></div>
                           </td>
                           <td>
                              <div id="IdStatus"><span class="text" onclick="" title="<?php echo ($user->status==1)?"Mở":(($user->status==2)?"Khóa":"Đình chỉ"); ?>"><?php echo ($user->status==1)?"Mở":(($user->status==2)?"Khóa":"Đình chỉ"); ?></span><span onclick="RenderStatus(this,'Popup','<?php echo $user->Id ?>',false,false,0,false, 'chkid_<?php echo $user->Id ?>');" class="arrow" title="Trạng thái">&nbsp;&nbsp;&nbsp</span></div>
                           </td>
                           <td align="center">
                              <div title="Tùy chỉnh" class="divOther" onclick="ShowFrmUpdOthers(this,'divUpdOthers', '<?php echo $user->Id ?>', '<?php echo $user->Username ?>', 'Member');"></div>
                           </td>
                           <td>
                              <link href="/assets/stylesheets/agent/MemberIcoDComm.css?20141215" rel="stylesheet" type="text/css" />
                              <script src="/assets/js/bet/MemberIcoDComm.js?20141215" type="text/javascript"></script>
                              <div class="bkgDcommDisallowed"><a onclick="">Đóng</a></div>
                           </td>
                           <td class="l"></td>
                           <td class="l"></td>
                           <td class="l"></td>
                           <td>a</td>
                           <td>0.0025</td>
                           <td>0.0025</td>
                           <td>0.01</td>
                           <td>0.0025</td>
                           <td>0.0025</td>
                           <td>0.01</td>
                           <td>0</td>
                           <td class="bl_time"><?php echo date("d/m/Y H:i:s",$user->timelog) ?></td>
                           <td><a href="javascript:;" class="iplink"><?php echo $user->Ip ?></a></td>
                           <td class="l">
                              <div class='text' onclick="viewCustOutSt('<?php echo $user->Username ?>',<?php echo $user->Id ?>)"><?php echo $user->Username ?></div>
                           </td>
                        </tr>
                       <?php $i++; } ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <td colspan="23">
                              <div id="MemberListAgent_PagingBottom" class="pagingHiden" pagesize="500" currentindex="1" rowcount="500" pagecount="1"><input disabled id="btnFirstMemberListAgent_PagingBottom" type="button" onclick="MemberListAgent_PagingBottom.First()" class="icon pagingFirst" /><input disabled id="btnPrevMemberListAgent_PagingBottom" type="button" onclick="MemberListAgent_PagingBottom.Move(-1)" class="icon pagingPrev" /><span class="pagingSeperator"></span>Trang<input id="txtMemberListAgent_PagingBottom" type="text" class="pagingCurrent" maxlength="4" size="2" value="1" onkeydown="MemberListAgent_PagingBottom.DoEnter(event, 'MemberListAgent_PagingBottom.Go()')" />of 1<span class="pagingSeperator"></span><input disabled id="btnNextMemberListAgent_PagingBottom" type="button" onclick="MemberListAgent_PagingBottom.Move(1)" class="icon pagingNext" /><input disabled id="btnLastMemberListAgent_PagingBottom" type="button" onclick="MemberListAgent_PagingBottom.Last()" class="icon pagingLast" /></div>
                              <script type="text/javascript">var MemberListAgent_PagingBottom = new Paging('MemberListAgent_PagingBottom');</script>
                           </td>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </td>
         </tr>
      </table>
      <link href="/assets/stylesheets/agent/MenuPopup_Control.css?20141215" rel="stylesheet" type="text/css" />
      <div id="Popup" class="divMenuPopup">
         <div id="tr_{id}"><input type="checkbox" id="chk_closed" value="0" />&nbsp;&nbsp;Bị khóa</div>
         <div id="tr_{id}"><input type="checkbox" id="chk_suspended" value="0" />&nbsp;&nbsp;Bị đình chỉ</div>
         <div id="tr_{id}"><input type="checkbox" id="chk_allowAutoPT" value="1" />&nbsp;&nbsp;Cho Auto PT</div>
         <div id="tr_{id}"><input type="checkbox" id="chk_outright" value="0" />&nbsp;&nbsp;Cho phép Outright</div>
		 <div id="tr_{id}"><input type="checkbox" id="chk_isActive" value="0" />&nbsp;&nbsp;Hoạt động</div>
      </div>
      <link href="/assets/stylesheets/agent/MenuPopup_Control.css?20141215" rel="stylesheet" type="text/css" />
      <div id="MultiPopup" class="divMenuPopup">
         <div id="tr_sportBook"><a class="LinkPopup" href="javascript:;" id="sportBook" value="0">Tùy chỉnh đồng loạt cho Sportsbook</a></div>
         <div id="tr_racing"><a class="LinkPopup" href="javascript:;" id="racing" value="0">Tùy chỉnh đồng loạt cho Racing</a></div>
         <div id="tr_casino"><a class="LinkPopup" href="javascript:;" id="casino" value="0">Tùy chỉnh đồng loạt cho Casino</a></div>
         <div id="tr_bingo"><a class="LinkPopup" href="javascript:;" id="bingo" value="0">Tùy chỉnh đồng loạt cho Bingo</a></div>
         <div id="tr_keno"><a class="LinkPopup" href="javascript:;" id="keno" value="0">Edit Multiple Keno</a></div>
         <div id="tr_P2P"><a class="LinkPopup" href="javascript:;" id="P2P" value="0">Tùy chỉnh đồng loạt cho Poker</a></div>
         <div id="tr_livecasino"><a class="LinkPopup" href="javascript:;" id="livecasino" value="0">Tùy chỉnh đồng loạt cho Live Casino</a></div>
         <div id="tr_virtualsports"><a class="LinkPopup" href="javascript:;" id="virtualsports" value="0">Tùy chỉnh đồng loạt cho Virtual Sports</a></div>
         <div id="tr_doublecomm"><a class="LinkPopup" href="javascript:;" id="doublecomm" value="0">Tùy chỉnh đồng loạt giá trị Nhân Đôi hoa hồng</a></div>
      </div>
      <link href="/assets/stylesheets/agent/MenuPopup_Control.css?20141215" rel="stylesheet" type="text/css" />
      <div id="divUpdOthers" class="divMenuPopup">
         <div id="tr_racingPT" style="display: none;"><a class="LinkPopup" href="javascript:;" id="racingPT" value="0">Racing</a></div>
         <div id="tr_casinoPT" style="display: none;"><a class="LinkPopup" href="javascript:;" id="casinoPT" value="0">Casino</a></div>
         <div id="tr_p2pPT" style="display: none;"><a class="LinkPopup" href="javascript:;" id="p2pPT" value="0">Poker</a></div>
         <div id="tr_bingoPT" style="display: none;"><a class="LinkPopup" href="javascript:;" id="bingoPT" value="0">Bingo</a></div>
         <div id="tr_livecasinoPT" style="display: none;"><a class="LinkPopup" href="javascript:;" id="livecasinoPT" value="0">Live Casino</a></div>
         <div id="tr_virtualsportsPT" style="display: none;"><a class="LinkPopup" href="javascript:;" id="virtualsportsPT" value="0">Virtual Sports</a></div>
         <div id="tr_kenoPT" style="display: none;"><a class="LinkPopup" href="javascript:;" id="kenoPT" value="0">Keno</a></div>
         <div id="tr_editInfo"style="display: none;"><a class="LinkPopup" href="javascript:;" id="editInfo" value="0">Thông tin</a></div>
         <div id="tr_betSetting"style="display: none;"><a class="LinkPopup" href="javascript:;" id="betSetting" value="0">Tiền Cược</a></div>
         <div id="tr_commission"style="display: none;"><a class="LinkPopup" href="javascript:;" id="commission" value="0">Hoa hồng</a></div>
         <div id="tr_password"><a class="LinkPopup" href="javascript:;" id="password" value="0">Mật Khẩu</a></div>
      </div>
      <form id="target" method="post" target="AGEWndIframe" action=""><input type="hidden" id="uplineId" name="uplineId" value="" /><input type="hidden" id="parentId" name="parentId" value="" /><input type="hidden" id="customerIds" name="customerIds" value="" /><input type="hidden" id="syncStatuses" name="syncStatuses" value="" /><input type="hidden" id="usernames" name="usernames" value="" /><input type="hidden" id="uplineLevel" name="uplineLevel" value="" /><input type="hidden" id="customerLevel" name="customerLevel" value="" /><input type="hidden" id="actorId" name="actorId" value="" /><input type="hidden" id="actorIdUsername" name="actorIdUsername" value="" /><input type="hidden" id="subAccId" name="subAccId" value="" /><input type="hidden" id="subAccUsername" name="subAccUsername" value="" /><input type="hidden" id="language" name="language" value="" /></form>
   </body>
   <script src="/assets/js/bet/Core.js?20141215" type="text/javascript"></script><script src="/assets/js/bet/AGEWnd.js?v=<?php echo time() ?>" type="text/javascript"></script>
   <script src="/assets/js/bet/SportBook.js?20141215" type="text/javascript"></script>
   <script src="/assets/js/bet/Racing.js?20141215" type="text/javascript"></script>
   <script src="/assets/js/bet/P2P.js?20141215" type="text/javascript"></script>
   <script src="/assets/js/bet/Casino.js?20141215" type="text/javascript"></script>
   <script src="/assets/js/bet/Bingo.js?20141215" type="text/javascript"></script>
   <script src="/assets/js/bet/LiveCasino.js?20141215" type="text/javascript"></script>
   <script src="/assets/js/bet/VirtualSports.js?20141215" type="text/javascript"></script>
   <script src="/assets/js/bet/Keno.js?20141215" type="text/javascript"></script>
	<script src="/assets/js/bet/CustomerList.js?v=<?php echo time() ?>" type="text/javascript"></script>
   </html>
<script type="text/javascript">var _page = {'loginId':1,'strConfirmDisableDoubleComm':'\"Bạn có chắc muốn khóa chức năng Nhân đôi hoa hồng với những cá cược bị thua trong Sportbooks của tài khoản này không?\\n\\n Cảnh báo, tất cả những thành viên cấp dưới trực thuộc tài khoản này sẽ đều bị khóa chức năng đó!\"','loginUsername':'<?php echo Yii::app()->user->getId(); ?>','confirmCloseMemDownline':'Bạn có chắc muốn khóa thành viên này?\\nKhuyến cáo: tất cả cấp dưới của tài khoản này cũng sẽ bị khóa?','isHideTransfer':'1','roleidLiveCasino':1,'confirmCloseMem':'Bạn có chắc muốn thay đổi trạng thái \"Khóa\" của thành viên này không?','strDisallowed':'Đóng','roleid':2,'lblAlertDisableDoubleCommMember':'Bạn có chắc muốn tắt chức năng Nhân đôi hoa hồng đối với  những cá cược bi thua trong Sportbooks  của thành viên này không?','roleidP2P':1,'confirmUnSuspendDownline':'Bạn có chắc muốn bỏ trạng thái \"Đình Chỉ\" cho thành viên này không? Khuyến cáo: tất cả cấp dưới trực thuộc thành viên này sẽ được bỏ trạng thái \"Đình Chỉ\".','strAllowed':'Mở','lblConfirmClearCredit':'Bạn có chắc sẻ thu hồi hạn mức tín dụng của tài khoản { tên đăng nhập } này?','confirmUnSuspendMem':'Bạn có chắc muốn thay đổi trạng thái \"Đình Chỉ\" cho thành viên này không?','confirmDisableNumberGameDownline':'Bạn có chắc muốn chặn thành viên này chơi Number Game?','roleidVirtualSports':1,'custid':15508308,'langKey':'VI','confirmSuspendDownline':'Bạn có chắc muốn đình chỉ thành viên này?\\n Khuyến cáo, tất cả cấp dưới trực thuộc thành viên này sẽ không thể đặt cược?','isAgentLevel':0,'confirmSuspendMem':'Bạn có chắc muốn đình chỉ thành viên này?\\n Khuyến cáo: thành viên này sẽ không thể đặt cược?','strConfirmEnableDoubleComm':'Bạn có chắc muốn cho phép sử dụng chức năng Nhân đôi hoa hồng đối với những cá cược bị thua trong Sportbooks của tài khoản này không?','usernamedefault':'Tên đăng nhập hoặc Tên/Họ','strConfirmEnableDoubleCommMember':'Bạn có chắc muốn mở chức năng Nhân đôi hoa hồng đối với những cá cược bi thua trong Sportbooks  của thành viên này không?','subUserName':'','typePage':'superMaster'};</script>