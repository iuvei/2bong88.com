<div class="statistic">THỐNG KÊ CỦA BẠN</div>
<table id="table-pp" style="width: 350px;">
    <tr>
        <td class="leftTD">Tổng số tiền chưa xử lý</td>
        <td class="r b rightTD"><span class='bl_underdog'><?php echo $model->getTotalOutStanding(); ?></span></td>
    </tr>
    <tr>
        <td class="leftTD">Tổng số tiền chuyển khoản /chưa xử lý bên Casino</td>
        <td class="r b rightTD"><span class='bl_underdog'>0.00</span>|<span class='bl_underdog'>0.00</span></td>
    </tr>
    <tr>
        <td class="leftTD">Tổng số tiền chuyển khoản /chưa xử lý bên Bingo</td>
        <td class="r b rightTD"><span class='bl_underdog'>0.00</span>|<span class='bl_underdog'>0.00</span></td>
    </tr>
    <tr>
        <td class="leftTD">Tổng số tiền chuyển khoản /chưa xử lý bên Poker</td>
        <td class="r b rightTD"><span class='bl_underdog'>0.00</span>|<span class='bl_underdog'>0.00</span></td>
    </tr>
    <tr class="leftTD">
        <td colspan="2"><span id="ACST" onclick="toogleDiv('ACST', 'ACS', 'imgACS', null, 'highest', 'newmem', 'imgHighest', 'imgNewmem', 'top10', 'imgTop10');">Tổng số tài khoản hiện đang: Kích hoạt / Khóa / Đình chỉ <img id="imgACS" class="imgLoading" alt="Show" src="/_Reports/PortalPage/Images/collapse.png" /></span>
            <div onmouseover="divOnMouseOver();" onmouseout="divOnMouseOut();" id="ACS" class="divCollapse3">
                <table class="portalTable" style="width: 100%">
                    <tr class="oddRow">
                        <td class="l" id="td1">Member</td>
                        <td class="r rightACS"><span class='active'>0</span>|<span class='closed'>18</span>|<span class='suspended'>0</span></td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr class="leftTD">
        <td colspan="2"><span id="top10T" onclick="toogleDiv('top10T', 'top10', 'imgTop10', null, 'highest', 'newmem', 'imgHighest', 'imgNewmem', 'ACS', 'imgACS');">10 thành viên thắng cược nhiều nhất trong tháng&nbsp;<img class="imgLoading" id="imgTop10" alt="Show" src="/_Reports/PortalPage/Images/collapse.png" /></span>
            <div onmouseover="divOnMouseOver();" onmouseout="divOnMouseOut();" class="divCollapse" id="top10"></div>
        </td>
    </tr>
    <tr class="leftTD">
        <td colspan="2"><span id="highestT" onclick="toogleDiv('highestT', 'highest', 'imgHighest', null, 'top10', 'newmem', 'imgTop10', 'imgNewmem', 'ACS', 'imgACS');">Thành viên đặt cược nhiều nhất trong tháng&nbsp;<img class="imgLoading" id="imgHighest" alt="Show" src="/_Reports/PortalPage/Images/collapse.png" /></span>
            <div onmouseover="divOnMouseOver();" onmouseout="divOnMouseOut();" class="divCollapse" id="highest"></div>
        </td>
    </tr>
    <tr class="leftTD">
        <td colspan="2"><span id="newmemT" onclick="toogleDiv('newmemT', 'newmem', 'imgNewmem', null, 'top10', 'highest', 'imgTop10', 'imgHighest', 'ACS', 'imgACS');">Thành viên mới trong tháng: <span id="newmemVal" class="b">0</span>&nbsp;<img class="imgLoading" id="imgNewmem" alt="Show" src="/_Reports/PortalPage/Images/collapse.png" /></span>
            <div style="position: absolute; text-indent: 0px;" id="newmemH" onmouseover="divOnMouseOver();" onmouseout="divOnMouseOut();">
                <table class="portalTable newMemWidth" style="padding-left: -5px">
                    <tr>
                        <th class="c">Tài khoản</th>
                        <th class="c newMemCol">Hạn mức được cấp</th>
                        <th class="c newMemCol">Ngày tạo</th>
                    </tr>
                    <tr>
                        <td colspan="3" class="c">Thông tin chưa được cập nhật</td>
                    </tr>
                </table>
                <div class="divCollapse2" id="newmem"></div>
            </div>
        </td>
    </tr>
</table>