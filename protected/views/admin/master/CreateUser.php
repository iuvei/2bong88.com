<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Add New Member</title>
    
    <link href='/assets/stylesheets/agent/Agent.css?20150126' rel='stylesheet' type='text/css' />
    <link href='/assets/stylesheets/agent/MemberInfo.css?20150126' rel='stylesheet' type='text/css' />
	<script>
	var CreditAllow = <?php echo $user->Credit ?>;
	function checkThisUser()
	{
	
		var userCheck = $("#parentUsername").html()+$("#selectedOne").val()+$("#selectedTwo").val();
		var parentUser = $("#parentUsername").html();
		$.ajax({
		
			type: "POST",
			url: '/azkv.php?r=site/checkExit',
			data: 'user='+userCheck,
			success: function(data){
			
				$("#msgIcon").html(data);
			
			},
		});
	
	}
	$(document).ready(function(){
	
	
		$(".btnMain").click(function(){
	
			var name = $("#parentUsername").html()+$("#selectedOne").val()+$("#selectedTwo").val();
			$("#usernameHide").val(name);
			if($("#msgIcon").html()!="username availabel")
			{
			
				alert("Vui lòng chọn username khác!!!");
				return;
			
			}
			if($("#password").val()=="")
			{
			
				alert("Vui lòng nhập password!!!");
				return;
			
			}
			if( ($("#credit").val()) > CreditAllow )
			{
			
				alert("Hạn mức tín dụng vượt quá hạn mức của bạn!!!");
				//alert($("#credit").val());
				return;
			
			}
			
			$("#formCreateUser").submit();
		
		});

	
	});
	
</script>
</head>

<body>
    <form action='' method="post" id="formCreateUser">
        <div class="minWidthCustomer">
            <?php if($message!=""){ ?>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="diverrmsg" style="display: block;">
                <tr>
                    <td id="msg_1_1" class="emsg_1_1"><?php echo $message ?></td>
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
			<?php }?>
            <input type="hidden" name="txtCustomerObject" id="txtCustomerObject" />
            <div class="pt7">
                <div class="btnLeft">
                    <button type="button" accountpermisssion="[B]" id="btnSubmit" class="btnMain">Add</button>
                </div>
            </div>
            <div class="customerInfo">
                <div class="headerTab">General Information</div>
                <div class="clearBlock">
                    <div class="customerInfoBlock1">Username</div>
                    <div class="customerInfoBlock2"><b><span data-bind="text: customer.userName" id="parentUsername"><?php echo $user->Username ?></span></b>
                        <select id="selectedOne" name="selectedOne" onchange="checkThisUser();">
						<?php 
							
							$data = '0123456789ABCDFGHIJKLMNOPKRSTUVWXYZ';
							for($i=0;$i<strlen($data)-1;$i++){
							?>
							<option value="<?php echo $data[$i] ?>"><?php echo $data[$i] ?></option>
						<?php } ?>
						</select>
						<select id="selectedTwo" name="selectedTwo" onchange="checkThisUser();">
						<?php 
							
							$data = '0123456789ABCDFGHIJKLMNOPKRSTUVWXYZ';
							for($i=0;$i<strlen($data)-1;$i++){
							?>
							<option value="<?php echo $data[$i] ?>"><?php echo $data[$i] ?></option>
						<?php } ?>
						</select>
                       
                        <span id="msgIcon"></span>
                    </div>
					
					<input id="usernameHide" type="hidden" name="User[username]" />
					<input id="parentUser" type="hidden" name="User[parentUser]" value="<?php echo $user->Username ?>" />
                    <div class="customerInfoBlock3">Password</div>
                    <div class="customerInfoBlock4" id="divPassword" title="Password must be at least 8 characters without white-space and contain at least 3 of the following:

  • Uppercase letter [A-Z] 
  • Lowercase letter [a-z] 
  • Numeric [0-9] 
  • Special character (!,@,#,etc..)

For example: 59D7!4$h, 493abcDE
Notes: your password is cAsE sEnSiTiVe">
                        <div class="float_l">
                            <input id="password" autocomplete="off" class="textBoxInfo" type="password" data-bind="value: customer.password" name="User[password]" maxlength="50" />
                        </div>
                        <div class="float_l pt3"><span id="spnNewPwdIcon">&nbsp;</span>
                        </div>
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="customerInfoBlock1">First Name</div>
                    <div class="customerInfoBlock2">
                        <input id="firstName" type="text" class="textBoxInfo" data-bind="value: customer.firstName" maxlength="50" />
                    </div>
                    <div class="customerInfoBlock3">Last Name</div>
                    <div class="customerInfoBlock4">
                        <input id="lastName" type="text" class="textBoxInfo" data-bind="value: customer.lastName" maxlength="50" />
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="customerInfoBlock1">Phone</div>
                    <div class="customerInfoBlock2">
                        <input id="phone" type="text" class="textBoxInfo" data-bind="value: customer.phone" maxlength="50" />
                    </div>
                    <div class="customerInfoBlock3">Mobile Phone</div>
                    <div class="customerInfoBlock4">
                        <input id="mobilePhone" type="text" class="textBoxInfo" data-bind="value: customer.mobilePhone" maxlength="50" />
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="customerInfoBlock1">Given Credit</div>
                    <div class="customerInfoBlock2">
                        <input type="text" id="credit" maxlength="14" name="User[credit]" value="0" class="textBoxCredit textBoxInfo" data-bind="value: customer.credit" /><span class="hide">&gt;=<span data-bind="text: customer.minCredit" id="minCredit"></span></span>
                        <=<span id="CreditAllow"><?php echo $user->Credit ?></span>
                    </div>
                    <div class="customerInfoBlock3">Fax</div>
                    <div class="customerInfoBlock4">
                        <input id="fax" type="text" class="textBoxInfo" data-bind="value: customer.fax" maxlength="50" />
                    </div>
                </div>
                <div class="clearBlock">
                    
                    <div class="customerInfoBlock3">
                        <label for="closed">Closed</label>
                    </div>
                    <div class="customerInfoBlock4">
                        <input name="closed" id="closed" type="checkbox" data-bind="checked: customer.statusSetting.closed, enable: customer.statusSetting.uplineClosed ? false : true" />
                    </div>
                </div>
                <div class="clearBlock">
                    <div class="customerInfoBlock1">
                        <label for="suspended">Suspended</label>
                    </div>
                    <div class="customerInfoBlock2">
                        <input name="suspended" id="suspended" type="checkbox" data-bind="checked: customer.statusSetting.suspended, enable: (customer.statusSetting.uplineSuspended || customer.statusSetting.uplineClosed) ? false : true" />
                    </div>
                    <div class="customerInfoBlock3"></div>
                    <div class="customerInfoBlock4NoBorderLeft"></div>
                </div>
            </div>
           
            <div class="clearBlock"></div>
            <div class="pt7">
                <div class="btnLeft">
                    <button type="button" accountpermisssion="[B]" id="btnSubmitFooter" class="btnMain">Add</button>
                </div>
            </div>
        </div>
    </form>
    
</body>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

</html>