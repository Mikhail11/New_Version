<?php
	include 'includes/base/admin.php';
?><!DOCTYPE html>
<html lang="ru">
	<head>
		<?php include 'includes/base/headBootstrapAndBasics.php'; ?>
		<title>Редактор изображений <?php echo $adminPanelTitle; ?></title>
	</head>
	<body class="admin-page simple-page"><div class="background-cover"></div>
		<div class="container glass-panel">
			<?php include 'includes/base/navbar.php'; ?>

			<h1 class="huge-cover"><i class="fa fa-paint-brush"></i> Редактор изображений</h1>
			<div class="page-wrapper">
				<div class = "editor-buttons-block">
					<button class = "editor-buttons" data-toggle="tooltip" data-placement="right" title="Добавить текст"><i class="fa fa-font"></i></button>
					<button class = "editor-buttons" data-toggle="tooltip" data-placement="right" title="Обрезать изображение"><i class="fa fa-scissors"></i></button>
					<button class = "editor-buttons" data-toggle="tooltip" data-placement="right" title="Наложить изображение"><i class="fa fa-picture-o"></i></button>
					<button class = "editor-buttons" data-toggle="tooltip" data-placement="right" title="Загрузить новое изображение"><i class="fa fa-upload"></i></button>
				</div>	
				<div class = "img-editor-block">
					<img src="images/201508100708_2.jpg">
				</div>


			</div>
			<?php	include 'includes/base/footer.php'; ?>
		</div>
		<?php include 'includes/base/jqueryAndBootstrapScripts.html'; ?>
		<script type="text/javascript" src="includes/js/admin-image-editor.js"></script>	
	</body>
</html>