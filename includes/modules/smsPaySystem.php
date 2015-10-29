<h1>
	<i class="fa fa-envelope"></i>
	Остаток СМС
</h1>
	<div class="sms-payment">
			<a href = "#" data-toggle="popover" data-placement="bottom" data-trigger="click" id = "smsPay" >
			<?php echo $database->getValueByShortName('SMS_PAYMENTS_COUNT')['VALUE']; ?>
			</a>
	</div>

	<div class="popover" id = "smsPayPopover" role="tooltip">
		<div class="arrow pay"><b>Пополнить на </b></div>
			<h3 class="popover-title"></h3>
		<div class="popover-content">
		 <select>
		 	<option >200</option>
		 	<option >400</option>
		 	<option selected>600</option>
		 </select> <b>CMC</b>
		 <div class="pay-button-block">
			<a class="agree" id = "agree"><i class="text-success fa fa-check-circle"></i></a>
			<a class="disagree" id = "disagree"><i class="text-danger fa fa-times-circle"></i></a>
		</div>
		</div>
	</div>

