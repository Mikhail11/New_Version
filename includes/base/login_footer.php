<footer class="footer">
	 <a href="privacy.php">   Политика конфиденциальности</a> &copy; <a href="https://respot.ru"><img src="images/logo+++.png" width="4%" ></a> 
</footer>

<?php
// 	Notification::add("Total number of queries performed: ".$database->getNumQueriesPerformed());
	if (count(Notification::getMessages()) > 0) {
	$first_key = key(Notification::getMessages());
?>
<div class="notification group-notification bg-<?=$first_key;?> animated bounceInDown no-padding"><?php
	
	foreach (Notification::getMessages() as $kind => $message) {
		
		?>
		<div class="sub-notification bg-<?=$kind;?>">
			<a class="pull-right" href="#" onclick="$(this).parent().remove();"><i class="fa fa-times"></i><span class="sr-only">Закрыть уведомление</span></a>
			<?=$message;?>
		</div>
		
		
		<?
		
	}
?></div><?php } ?>