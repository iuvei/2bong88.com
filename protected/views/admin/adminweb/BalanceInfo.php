<div class="balanceInfo">TÀI KHOẢN</div>
<table id="table-pp" style="width: 350px;">
    <tr>
        <td class="leftTD"><?php echo ($model->role=="admin")?"Admin":(($model->role=="ProSuperMaster")?"Pro Super":(($model->role=="superMaster")?"Super Master":($model->role=="master")?"Master":"Agent")) ?></td>
        <td class="r b rightTD"><?php echo $model->Username ?></td>
    </tr>
    <tr>
        <td class="leftTD">Tiền tệ</td>
        <td class="r b rightTD">UT </td>
    </tr>
    <tr>
        <td class="leftTD">Số dư tài khoản</td>
        <td class="r b rightTD"><span class='bl_underdog'><?php echo number_format($model->Credit,2) ?></span></td>
    </tr>
    <tr>
        <td class="leftTD">Số dư tài khoản đến hết hôm qua</td>
        <td class="r b rightTD"><span class='bl_underdog'>0.00</span></td>
    </tr>
    <tr>
        <td class="leftTD">Tổng số tiền giao dịch</td>
        <td class="r b rightTD"><span class='bl_underdog'>0.00</span></td>
    </tr>
    <tr>
        <td class="leftTD">Tổng tiền giao dịch đến hết hôm qua</td>
        <td class="r b rightTD"><span class='bl_underdog'>0.00</span></td>
    </tr>
    <tr>
        <td class="leftTD">Thắng thua trong ngày (<?php echo date("d/m/Y",strtotime("yesterday")) ?>)</td>
        <td class="r b rightTD"><span class='bl_underdog'>0.00</span></td>
    </tr>
    <tr>
        <td class="leftTD">Thắng thua hôm qua (<?php echo date("d/m/Y",strtotime("yesterday")) ?>)</td>
        <td class="r b rightTD"><span class='bl_underdog'>0.00</span></td>
    </tr>
    <tr>
        <td class="leftTD">Hạn mức tín dụng được cấp</td>
        <td class="r b rightTD"><span class='bl_underdog'><?php echo number_format($model->givenCredit,2) ?></span></td>
    </tr>
    <tr>
        <td class="leftTD">Tổng mức tín dụng của Member</td>
        <td class="r b rightTD"><span class='bl_underdog'><?php echo number_format($model->totalCreditUser(),2) ?></span></td>
    </tr>
</table>