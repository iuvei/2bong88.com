<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <title>Menu</title>
    <link href="/assets/stylesheets/agent/Agent.css?20141215" rel="stylesheet" type="text/css" />
    <link href="/assets/stylesheets/agent/Menu.css?20141215" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="leftpanewrapper">
        <div id="tab_menu">
            <div id="tab_menu_m"><a class="tab_menu01AC" style="cursor: default;">Menu </a></div>
            <div id="tab_menu_L"><a id="lnkAccInfo" class="tab_menu02" target="menu" onclick="ShowFlashAccInfoMaster();" href="/azkv.php?r=site/AccountInfo"><span id="lblAccInfo">Thông tin</span></a></div>
        </div>
        <div id="leftpane">
            <div class="top_left"><img alt="" width="202px" height="6" src="/assets/stylesheets/_GlobalResources/Images/dot.gif" /></div>
            <div id="button_left">
                <div class="Bleft_Parent0"><a class="Bleft_Parent" id="a0" href="javascript:MenuToggle('0');"><span id="menu0">Tổng Cược</span> </a>
                    <div id="div0" style="display: none">
                        <div class="left_line"><img alt="" width="1" height="1" name="" src="/assets/stylesheets/_GlobalResources/Images/dot.gif" /></div>
                        <div class="Bleft_Sub0" id="SubMenu">
							<a id="" onclick="MenuItemSelect(11);" href="/azkv.php?r=betData/totalBetRunning&pageType=HandicapPage&type=<?php echo Yii::app()->user->getState("typeUser") ?>" target="main" class="Bleft_Sub">Handicap/Over Under/Live</a>
							<a id="" onclick="MenuItemSelect(13);" href="/azkv.php?r=betData/totalBetRunning&pageType=1x2Page&type=<?php echo Yii::app()->user->getState("typeUser") ?>" target="main" class="Bleft_Sub">Lẻ/Chẵn + 1x2 + DND</a>
							<a id="" onclick="MenuItemSelect(14);" href="/azkv.php?r=betData/totalBetRunning&pageType=CorrectScore&type=<?php echo Yii::app()->user->getState("typeUser") ?>" target="main" class="Bleft_Sub">Điểm số chính xác</a>
							<a id="" onclick="MenuItemSelect(15);" href="/azkv.php?r=betData/totalBetRunning&pageType=TotalGoal&type=<?php echo Yii::app()->user->getState("typeUser") ?>" target="main" class="Bleft_Sub">FT & HT Total Goal</a>
							<a id="" onclick="MenuItemSelect(16);" href="javascript:;" target="main" class="Bleft_Sub">Cá cược tổng hợp</a>
							<a id="" onclick="MenuItemSelect(17);" href="javascript:;" target="main" class="Bleft_Sub">Cược Thắng</a>
							<a id="" onclick="MenuItemSelect(18);" href="javascript:;" target="main" class="Bleft_Sub">Hiệp 1 / Toàn thời gian</a>
							<a id="" onclick="MenuItemSelect(19);" href="javascript:;" target="main" class="Bleft_Sub">FT & HT FG/LG</a>
							<a id="" onclick="MenuItemSelect(110);" href="javascript:;" target="main" class="Bleft_Sub">Clean Sheet</a>
							<a id="" onclick="MenuItemSelect(111);" href="javascript:;" target="main" class="Bleft_Sub">Double Chance</a>
							<a id="" onclick="MenuItemSelect(112);" href="javascript:;" target="main" class="Bleft_Sub">Home/Draw/Away No Bet</a>
							<a id="" onclick="MenuItemSelect(113);" href="javascript:;" target="main" class="Bleft_Sub">Both/One/Neither Team To Score</a>
							<a id="" onclick="MenuItemSelect(114);" href="javascript:;" target="main" class="Bleft_Sub">To Win To Nil</a>
							<a id="" onclick="MenuItemSelect(115);" href="javascript:;" target="main" class="Bleft_Sub">3-Way Handicap</a>
							<a id="numbergame" onclick="MenuItemSelect(116);" href="javascript:;" target="main" class="Bleft_Sub">Number Game</a>
							<a id="hr" onclick="MenuItemSelect(117);" href="javascript:;" target="main" class="Bleft_Sub">Racing</a>
						</div>
						
                    </div>
                </div>
            </div>
			<div id="button_left">
                <div class="Bleft_Parent0"><a class="Bleft_Parent" id="a1" href="javascript:MenuToggle('1');"><span id="menu1">Dự đoán </span> </a>
                    <div id="div1" style="display: none">
                        <div class="left_line"><img alt="" width="1" height="1" name="" src="/assets/stylesheets/_GlobalResources/Images/dot.gif" /></div>
                        <div class="Bleft_Sub0" id="SubMenu">
							<a id="" onclick="MenuItemSelect(21);" href="javascript:;" target="main" class="Bleft_Sub">Handicap/Over Under/Live</a>
							<a id="" onclick="MenuItemSelect(22);" href="javascript:;" target="main" class="Bleft_Sub">1 X 2</a>
							<a id="ScoreMap" onclick="MenuItemSelect(23);" href="javascript:;" target="main" class="Bleft_Sub">Score Map</a>
						</div>
                    </div>
                </div>
            </div>
			 <div id="button_left">
                <div class="Bleft_Parent0"><a class="Bleft_Parent" id="a3" href="javascript:MenuToggle('3');"><span id="menu3">Biểu đồ</span> </a>
                    <div id="div3" style="display: none">
                        <div class="left_line"><img alt="" width="1" height="1" name="" src="/assets/stylesheets/_GlobalResources/Images/dot.gif" /></div>
                        <div class="Bleft_Sub0" id="SubMenu"><a id="" onclick="MenuItemSelect(41);" href="javascript:;" target="main" class="Bleft_Sub">Phân tích hệ số thắng thua</a></div>
                    </div>
                </div>
            </div>
           
            <div id="button_left">
                <div class="Bleft_Parent0"><a class="Bleft_Parent" id="a2" href="javascript:MenuToggle('2');"><span id="menu2">Báo cáo</span> </a>
                    <div id="div2" style="display: none">
                        <div class="left_line"><img alt="" width="1" height="1" name="" src="/assets/stylesheets/_GlobalResources/Images/dot.gif" /></div>
                        <div class="Bleft_Sub0" id="SubMenu">
						<a id="" onclick="MenuItemSelect(32);" href="/azkv.php?r=site/DetailWinLost&type=<?php echo Yii::app()->user->getState("typeUser") ?>" target="main" class="Bleft_Sub">Chi tiết thắng thua của Member</a>
						<a id="" onclick="MenuItemSelect(33);" href="/azkv.php?r=site/Outstanding&type=<?php echo Yii::app()->user->getState("typeUser") ?>" target="main" class="Bleft_Sub">Số tiền chưa xử lý của Member</a>
						<a id="" onclick="MenuItemSelect(38);" href="/azkv.php?r=betData/DailyWinLost" target="main" class="Bleft_Sub">Phân tích hệ số thắng thua</a>
						<a id="" onclick="MenuItemSelect(310);" href="/azkv.php?r=betData/WinLossByBettype" target="main" class="Bleft_Sub">Thắng thua theo loại cược</a>
						<a id="" onclick="MenuItemSelect(313);" href="/azkv.php?r=betData/CancelBetList" target="main" class="Bleft_Sub">Cược hủy/từ chối</a>
						<a id="LastBetMonitoring" onclick="MenuItemSelect(314);" href="/azkv.php?r=betData/totalBetRunning&pageType=lastBet&type=<?php echo Yii::app()->user->getState("typeUser") ?>" target="main" class="Bleft_Sub">Giám sát lượt cược gần nhất</a>
						<a id="cs" onclick="MenuItemSelect(34);" href="javascript:;" target="main" class="Bleft_Sub">Thắng thua hiện tại của Casino</a>
						<a id="bg" onclick="MenuItemSelect(35);" href="javascript:;" target="main" class="Bleft_Sub">Thắng thua hiện tại của Bingo</a>
						<a id="" onclick="MenuItemSelect(36);" href="javascript:;" target="main" class="Bleft_Sub">Thắng thua theo trận</a>
						<a id="" onclick="MenuItemSelect(311);" href="javascript:;" target="main" class="Bleft_Sub">Hoa hồng theo loại cược</a>
						<a id="hr" onclick="MenuItemSelect(312);" href="javascript:;" target="main" class="Bleft_Sub">Hoa hồng cho Racing</a>
						<a id="" onclick="MenuItemSelect(315);" href="/azkv.php?r=betData/Statemen" target="main" class="Bleft_Sub">Sao kê</a>
						<a id="" onclick="MenuItemSelect(317);" href="javascript:;" target="main" class="Bleft_Sub">Kết quả</a>
						</div>
                    </div>
                </div>
            </div>
            <?php 

				$user = Admin::model()->findByPk(Yii::app()->user->getId());
				if($user!=null)
				{
					$role = $user->role;
					switch($role)
					{
						case "admin": $level = 1;
						break;
						case "ProSuperMaster": $level = 2;
						break;
						case "superMaster": $level = 3;
						break;
						case "master": $level = 4;
						break;
						case "agent": $level = 5;
						break;
						
					}
				}
				else
				{
					Yii::app()->user->logout();
				}

			?>
			<?php if($level==1 || $level==5){ ?>
            <div id="button_left">
                <div class="Bleft_Parent0"><a class="Bleft_Parent" id="a4" href="javascript:MenuToggle('4');"><span id="menu4">Thông tin Thành viên</span> </a>
                    <div id="div4" style="display: none">
                        <div class="left_line"><img alt="" width="1" height="1" name="" src="/assets/stylesheets/_GlobalResources/Images/dot.gif" /></div>
                        <div class="Bleft_Sub0" id="SubMenu">
						<a id="" onclick="MenuItemSelect(52);" href="/azkv.php?r=site/CreateUser" target="main" class="Bleft_Sub">Tạo thành viên mới</a>
						<a id="subacc" onclick="MenuItemSelect(52);" href="/azkv.php?r=adminWeb/CreateSubUser" target="main" class="Bleft_Sub">Tài khoản phụ</a>
						<a id="" onclick="MenuItemSelect(53);" href="/azkv.php?r=site/listUser" target="main" class="Bleft_Sub">Danh sách Thành viên</a>
						<a id="" onclick="MenuItemSelect(54);" href="/azkv.php?r=site/userBalance" target="main" class="Bleft_Sub">Hạn mức /Tín dụng</a>
						<a id="" onclick="MenuItemSelect(58);" href="/azkv.php?r=site/userCom" target="main" class="Bleft_Sub">Hoa hồng của Member</a></div>
                    </div>
                </div>
            </div>
			<?php }?>
			<?php if($level==4 || $level==1){ ?>
			<div id="button_left">
                <div class="Bleft_Parent0"><a class="Bleft_Parent" id="a5" href="javascript:MenuToggle('5');"><span id="menu4">Thông tin Agent</span> </a>
                    <div id="div5" style="display: none">
                        <div class="left_line"><img alt="" width="1" height="1" name="" src="/assets/stylesheets/_GlobalResources/Images/dot.gif" /></div>
                        <div class="Bleft_Sub0" id="SubMenu">
						<a id="" onclick="MenuItemSelect(52);" href="/azkv.php?r=Agent/CreateUser" target="main" class="Bleft_Sub">Tạo Agent Mới</a>
						<a id="subacc" onclick="MenuItemSelect(52);" href="/azkv.php?r=Agent/CreateSubAgent" target="main" class="Bleft_Sub">Tài khoản phụ</a>
						<a id="" onclick="MenuItemSelect(53);" href="/azkv.php?r=Agent/listUser" target="main" class="Bleft_Sub">Danh sách Agent</a>
						<a id="" onclick="MenuItemSelect(54);" href="/azkv.php?r=Agent/userBalance" target="main" class="Bleft_Sub">Hạn mức /Tín dụng</a>
						<a id="" onclick="MenuItemSelect(58);" href="/azkv.php?r=Agent/AgentCom" target="main" class="Bleft_Sub">Hoa hồng của Agent</a></div>
                    </div>
                </div>
            </div>
			<?php }?>
			<?php if($level==3 || $level==1){ ?>
			<div id="button_left">
                <div class="Bleft_Parent0"><a class="Bleft_Parent" id="a6" href="javascript:MenuToggle('6');"><span id="menu4">Thông tin Master</span> </a>
                    <div id="div6" style="display: none">
                        <div class="left_line"><img alt="" width="1" height="1" name="" src="/assets/stylesheets/_GlobalResources/Images/dot.gif" /></div>
                        <div class="Bleft_Sub0" id="SubMenu">
						<a id="" onclick="MenuItemSelect(52);" href="/azkv.php?r=Master/CreateUser" target="main" class="Bleft_Sub">Tạo Master Mới</a>
						<a id="subacc" onclick="MenuItemSelect(52);" href="/azkv.php?r=Master/CreateSubMaster" target="main" class="Bleft_Sub">Tài khoản phụ</a>
						<a id="" onclick="MenuItemSelect(53);" href="/azkv.php?r=Master/listUser" target="main" class="Bleft_Sub">Danh sách Master</a>
						<a id="" onclick="MenuItemSelect(54);" href="/azkv.php?r=Master/userBalance" target="main" class="Bleft_Sub">Hạn mức /Tín dụng</a>
						<a id="" onclick="MenuItemSelect(58);" href="/azkv.php?r=Master/MasterCom" target="main" class="Bleft_Sub">Hoa hồng của Master</a></div>
                    </div>
                </div>
            </div>
			<?php }?>
			<?php if($level==2 || $level==1){ ?>
			<div id="button_left">
                <div class="Bleft_Parent0"><a class="Bleft_Parent" id="a7" href="javascript:MenuToggle('7');"><span id="menu4">Thông tin Super Master</span> </a>
                    <div id="div7" style="display: none">
                        <div class="left_line"><img alt="" width="1" height="1" name="" src="/assets/stylesheets/_GlobalResources/Images/dot.gif" /></div>
                        <div class="Bleft_Sub0" id="SubMenu">
						<a id="" onclick="MenuItemSelect(52);" href="/azkv.php?r=SuperMaster/CreateUser" target="main" class="Bleft_Sub">Tạo Super Master Mới</a>
						<a id="subacc" onclick="MenuItemSelect(52);" href="/azkv.php?r=SuperMaster/CreateSubMaster" target="main" class="Bleft_Sub">Tài khoản phụ</a>
						<a id="" onclick="MenuItemSelect(53);" href="/azkv.php?r=SuperMaster/listUser" target="main" class="Bleft_Sub">Danh sách Super Master</a>
						<a id="" onclick="MenuItemSelect(54);" href="/azkv.php?r=SuperMaster/userBalance" target="main" class="Bleft_Sub">Hạn mức /Tín dụng</a>
						<a id="" onclick="MenuItemSelect(58);" href="/azkv.php?r=SuperMaster/MasterCom" target="main" class="Bleft_Sub">Hoa hồng của Super Master</a></div>
                    </div>
                </div>
            </div>
			<?php }?>
			<?php if($level==1){ ?>
			<div id="button_left">
                <div class="Bleft_Parent0"><a class="Bleft_Parent" id="a8" href="javascript:MenuToggle('8');"><span id="menu4">Thông tin PS Master</span> </a>
                    <div id="div8" style="display: none">
                        <div class="left_line"><img alt="" width="1" height="1" name="" src="/assets/stylesheets/_GlobalResources/Images/dot.gif" /></div>
                        <div class="Bleft_Sub0" id="SubMenu">
						<a id="" onclick="MenuItemSelect(52);" href="/azkv.php?r=ProSuperMaster/CreateUser" target="main" class="Bleft_Sub">Tạo PS Master Mới</a>
						<a id="subacc" onclick="MenuItemSelect(52);" href="/azkv.php?r=ProSuperMaster/CreateSubMaster" target="main" class="Bleft_Sub">Tài khoản phụ</a>
						<a id="" onclick="MenuItemSelect(53);" href="/azkv.php?r=ProSuperMaster/listUser" target="main" class="Bleft_Sub">List PS Master</a>
						<a id="" onclick="MenuItemSelect(54);" href="/azkv.php?r=ProSuperMaster/userBalance" target="main" class="Bleft_Sub">Hạn mức /Tín dụng</a>
						<a id="" onclick="MenuItemSelect(58);" href="/azkv.php?r=ProSuperMaster/userCom" target="main" class="Bleft_Sub">Hoa hồng của Super Master</a></div>
                    </div>
                </div>
            </div>
			<?php }?>
			
			
        </div>
    </div>
</body>
<script src="/assets/js/bet/Core.js?20150304" type="text/javascript"></script>
<script src="/assets/js/bet/Menu.js?20150304" type="text/javascript"></script>

</html>