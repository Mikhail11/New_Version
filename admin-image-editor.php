<?php
	include 'includes/base/admin.php';
?><!DOCTYPE html>
<html lang="ru">
	<head>
		<?php include 'includes/base/headBootstrapAndBasics.php'; ?>
		<link href="includes/slider/css/slider.css" rel="stylesheet">
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
				<div class = "editor-tabs">

					  <!-- Nav tabs -->
					  <ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Фильтры</a></li>
					    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Настройки</a></li>
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
					    <div role="tabpanel" class="tab-pane active" id="home">
					    	<div class = "tabs-content">
						    	<table class="filters-table">
							    	<tr>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
							    	</tr>
							    	<tr>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
							    	</tr>
							    	<tr>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
								    	<td><a><img src="images/201508100708_2.jpg"></a></td>
							    	</tr>							    								    	
						    	</table>
							</div>    	
					    </div>
					    <div role="tabpanel" class="tab-pane" id="profile">
					    		<p><i class="fa fa-sun-o"></i> Яркость</p>
						    	<input id="ex1" class = "slider-input" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="10"/>
						    	<p><i class="fa fa-adjust"></i> Контраст</p>
						    	<input id="ex2" class = "slider-input" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="20"/>
						    	<p><i class="fa fa-tint" style="font-size:15px; padding-left:2px;"></i> Размытие</p>
						    	<input id="ex3" class = "slider-input" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="30"/>
						    	<p><i class="fa fa-th"></i> Прозрачность</p>
						    	<input id="ex4" class = "slider-input" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40"/>
						    	<p><i class="fa fa-camera-retro"></i> Cепия</p>
						    	<input id="ex5" class = "slider-input" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="50"/>
					    </div>
					  </div>

				</div>
					<div class = "img-editor-block">
						<img src="images/201508100708_2.jpg">
					</div>
					<div class ="button-block">
						<div class="action-buttons-mid-way-panel">
							<button type="submit" class="btn btn btn-black gradient">Сохранить <i class="fa fa-floppy-o"></i></button>
							<button type="submit" class="btn btn btn-black gradient">Отменить <i class="fa fa-ban"></i></button>
						</div>
					</div>
				</div>
			</div>
			<?php	include 'includes/base/footer.php'; ?>
		</div>
		<?php include 'includes/base/jqueryAndBootstrapScripts.html'; ?>
		<script type="text/javascript" src="includes/slider/js/bootstrap-slider.js"></script>
		<script type="text/javascript" src="includes/js/admin-image-editor.js"></script>
	
	</body>
</html>