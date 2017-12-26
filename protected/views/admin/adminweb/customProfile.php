
<div id="text_logo">
    <a href="/azkv.php?r=adminweb/customProfile&custId=<?php echo $model->Id ?>" target="main">
        <img id="logoProfileImg" src='data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAz1JREFUeNrsmk+IElEcx0cd/xCZblCXiAiyWJgdlZlRMAM91a0O4TEPQXvoULF0iGWhJIgu1XWJlbpEELQdqktBHQxE/IdZbbVo0XbompGoo9P3gYclrdbxzRs39gfDvIe+936f936/936/p7wkSRq3icXKbXLh15Utm0x37b9YgS2ALQCKTszl8/mxO/T7/budTqfY6/VEVMX+5lCxWCwVm81WyWaz38YdQ5bl4QDjSDgcPtjtdhftdnsMyg9uGZrGqapKBs/g89lisfh2IkxIEAQHlFqA8hVUYxtoErVarSW0Sfl8PqepAIlEwgZzeYFiCs8oyjjwLHi93gxA7KYB1Ov1Odh2RPdJpGnEmC+ZAqAoyiEocIWCGc+jL4E5AJRfwstFAcABp05jJS3MAEKh0F68DtPawaC7EggEDjADwOzPUD9RrdYZliYk0AbAKggsAaivgN4+9ZqQYAAA0xXoGQDQY7kCawYArDEDgMNRB9A7KXpNqGbANlpjaUJPDdhGnzADKBQK7/B6T1H/T7lcrsw6Gn1EEeAh82AOCQwJ5lQKynfx3GYOUCqVPsJu0xR2n7vIxVdMSWg6nQ7JxJpjdNFCon/ZtIysXC5/7aeTemc/Bef9YmpSjx3pOkxJjxMuF4vFa6bfSmAWtWazmURxlGuSFZfLlSRtTQcgUq1Wf+C1OEKTe5lMpkHlBKcYy1SN+C4zAMi+USKHiQJAQr4HjnxxhLjnFLkUMx1AluVtiqLM8jyfQ3V6hKbHa7Xac0mSjgFmLB10Xe6Gw+H9CCXOonga9uzVOXYMyscA8RkTsaSqarp/rhi3AuQ2DoMtQ/lVVOfweCn5TgqrSEAeBINBH3UAdOrFTN3AbL9G9QRnzA8jxCdOIrR4A5BbkUhkJxUAKH4GnX7Acl9A1c4ZL2SMc+12exVjn//XleMfAeLxOI+ZuIP25IDaxbGXKYx9ExD3//Y7wlAAQRC2NxqNxygmOfMl4fF4nomiOLUhgGg06kac8hLFo9zkyBGHw/FqmF8MALRaLRIeS9zkyTT84urAobjuzx4Wt9vtgul8Z+SsekTFSuwACEmitN8PMg3KcxMuPJT/aVQwZ4r8EmAAZaYQRBe4e0sAAAAASUVORK5CYII=' alt=""  height="48" width="48" title="Nhấn v&#224;o đ&#226;y để Sửa H&#236;nh Đại Diện" style="border: 0px solid white;position: absolute; top: 13px; left: 10px; z-index: 1" />
    </a>
    <img src="/assets/_GlobalResources/Images/icon_user_bg.png" style="position: absolute; top: 0px; left: 0px; z-index: -1; padding-left: 5px;" atl="" />
        <span class="userName"><?php echo $model->Username ?></span>
        <br />
		<?php if($model->role=="agent"){ ?>
		<?php if($model->nickname==""){ ?>
        <div style="font-size: 11px; padding-top: 5px; color: Black">
            <span id="spanNickNameID">Biệt danh: </span><a  href="/azkv.php?r=adminweb/LoginOption&custId=<?php echo $model->Id ?>" class="linkConfigNow" id="linkNickNameID" target="main">
                <span style="white-space: nowrap; font-weight: bold"><span id="labelNickname">Cấu h&#236;nh ngay</span>
                    <img src="/assets/_GlobalResources/images/icondown.gif" width="10px" height="7px" border="0"
                        id="iconSetNickname" style="display: none" /></span></a>
        </div>
		<?php } else{ ?>
			
			<div style="font-size: 11px; padding-top: 5px; color: Black">
            <a href="/azkv.php?r=adminweb/LoginOption&custId=<?php echo $model->Id ?>" class="linkNickName" id="linkNickNameID" target="main">
                <span style="white-space: nowrap; font-weight: bold"><span id="labelNickname"><?php echo $model->nickname ?></span>
                    <img src="/assets/_GlobalResources/images/icondown.gif" width="10px" height="7px" border="0" id="iconSetNickname" style="display: "></span></a>
        </div>
			
		<?php }?>
		<?php }?>
</div>
