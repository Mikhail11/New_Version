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
		<div class="arrow pay"><b>Пополнить </b></div>
			<h3 class="popover-title"></h3>
		<div class="popover-content">
		 <select id = "list">
			<option value='0'></option>
		 	<option value='200'>200</option>
		 	<option value='400'>400</option>
		 	<option value='600'>600</option>
		 </select> <b>CMC</b>
		<form method="POST" id='payform' action="https://money.yandex.ru/quickpay/confirm.xml">
			<input type="hidden" name="receiver" value="410013647347592"> 
			<input type="hidden" name="formcomment" value = "Respot"> 
			<input type="hidden" name="short-dest" id = "shorDest">
			<input type="hidden" name="quickpay-form" value = "small">
			<input type="hidden" name="sum" id="sum"> 
			<input type="hidden" name="targets" id = "targets" value = "Оплата пакета смс">
			<input type="radio" name="paymentType" value="PC">Яндекс.Деньгами</input> 
			<input type="radio" name="paymentType" value="AC">Банковской картой</input> 
		</form>
		 <div class="pay-button-block">
			<a class="agree" id = "agree"><i class="text-success fa fa-check-circle"></i></a>
			<a class="disagree" id = "disagree"><i class="text-danger fa fa-times-circle"></i></a>
		</div>
		</div>
	</div>

