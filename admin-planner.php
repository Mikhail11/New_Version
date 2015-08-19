<?php
	include 'includes/base/admin.php';
?><!DOCTYPE html>
<html lang="ru">
	<head>
		<?php include 'includes/base/headBootstrapAndBasics.php'; ?>
		<title>Планирование постов <?php echo $adminPanelTitle; ?></title>
	</head>
	<body class="admin-page simple-page"><div class="background-cover"></div>
		<div class="container glass-panel">
			<?php include 'includes/base/navbar.php'; ?>

			<h1><i class="fa fa-clock-o"></i>Планирование постов</h1>
			<div class="page-wrapper">
			<table class="table-planner-row">
				<tr><td><span class="icon"><i class="fa fa-plus"></i></span></td>
				<td class="on-top">
				<img src="images/201508100708_2.jpg">
				<p class="post-title">Мы считаем, что нет невозможных в исполнении или сложных проектов! Для нас каждая разработка — интересный процесс реализации новых идей! bbb</p>
				<p class="post-content">Мы считаем, что нет невозможных в исполнении или сложных проектов! Для нас каждая разработка — интересный процесс реализации новых идей! bbb</p>
				</td>
				<td class="on-top">Plus</td></tr>
			</table>
			</div>
			<?php	include 'includes/base/footer.php'; ?>
		</div>
		<?php include 'includes/base/jqueryAndBootstrapScripts.html'; ?>
	</body>
</html>