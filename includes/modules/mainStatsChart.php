<?php	
	if (sizeof($chartLegendValues) == 0) { ?>
		<h1><i class="fa fa-line-chart hidden-xs"></i> График авторизаций<span class="hidden-xs"> в&nbsp;сети</span></h1>
		<div class="page-wrapper">
			<p class="text-center">Нет данных</p>
		</div>
	<?php
	} else {
		
		// Соц. сети и их названия
		$loginOptions = $database->getLoginOptions();
		$socialNetworksNames = CommonFunctions::extractSingleValueFromMultiValueArray($loginOptions, 'NAME');


?>
<div class="complex-h1">
	<i class="fa fa-line-chart hidden-xs"></i>
	<h1>График авторизаций<span class="hidden-xs"> в&nbsp;сети</span></h1>
	
	<h2 class="hidden-xs">Количество пользователей за&nbsp;последние <?=$temp;?>&nbsp;дней</h2>
	<span class="options hidden-xs">
		<select id="main-stats-chart-period">
			<option value="365"<?php if ($temp == 365) {echo ' selected';} ?>>1 год</option>
			<option value="183"<?php if ($temp == 183) {echo ' selected';} ?>>6 месяцев</option>
			<option value="92"<?php if ($temp == 92) {echo ' selected';} ?>>3 месяца</option>
			<option value="30"<?php if ($temp == 30) {echo ' selected';} ?>>1 месяц</option>
			<option value="14"<?php if ($temp == 14) {echo ' selected';} ?>>2 недели</option>
		</select>
	</span>
		
	<h2 class="visible-xs-block">Количество пользователей за
		<select id="main-stats-chart-period_xs">
			<option value="365"<?php if ($temp == 365) {echo ' selected';} ?>>1 год</option>
			<option value="183"<?php if ($temp == 183) {echo ' selected';} ?>>6 месяцев</option>
			<option value="92"<?php if ($temp == 92) {echo ' selected';} ?>>3 месяца</option>
			<option value="30"<?php if ($temp == 30) {echo ' selected';} ?>>1 месяц</option>
			<option value="14"<?php if ($temp == 14) {echo ' selected';} ?>>2 недели</option>
		</select>
	</h2>
	
</div>
<div class="page-wrapper chart-wrapper">

	<!--Div that will hold the chart-->
	<div id="line-chart" class="chart"></div>
	
	<div class="position-relative"><div class="hAxis"></div></div>
	
</div>
<!-- Legend -->
<ul class="legend nav<?php if (!$drawFullContent) echo " not-draw-full-content";?>" id="legend">
	<?php
	for ($i = 0; $i < sizeof($chartLegendValues); $i++) {
	?>
	<li style="width:<?=(100/sizeof($chartLegendValues));?>%">
		<div class="legend-circle animated zoomIn" style="border-color: <?=$colorArray[$chartLegendValues[$i]['ID_LOGIN_OPTION']];?>;"></div>
		<div class="legend-title"><? echo $chartLegendValues[$i]['NAME'];?></div>
		<div class="legend-last-value" style="color: <?=$colorArray[$chartLegendValues[$i]['ID_LOGIN_OPTION']]; ?>;">
			<?=CommonFunctions::NVL($chartLegendValues[$i]['LOGIN_COUNT'], 0);?>
			(<?=CommonFunctions::NVL($chartLegendValues[$i]['PERCENTAGE'], 0);?>%)
		</div>
	</li>
	<?php } ?>
</ul>
<!-- EOF Legend -->
<?php } ?>