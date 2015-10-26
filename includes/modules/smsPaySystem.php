<h1>
	<i class="fa fa-envelope"></i>
	Остаток СМС
</h1>
	<div class="sms-payment">
			<?php echo $database->getValueByShortName('SMS_PAYMENTS_COUNT')['VALUE']; ?>
	</div>