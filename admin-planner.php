<?php
	include 'includes/base/admin.php';

	$posts = $database->getInformationForPosts();
	$i = 0;
	$count = $posts ->num_rows;
?><!DOCTYPE html>
<html lang="ru">
	<head>
		<?php include 'includes/base/headBootstrapAndBasics.php'; ?>
		<title>Планирование постов <?php echo $adminPanelTitle; ?></title>
	</head>
	<body class="admin-page simple-page"><div class="background-cover"></div>
		<div class="container glass-panel">
			<?php include 'includes/base/navbar.php'; ?>

			<div class="modal fade" id="modalInternalPassword" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-post">
					<!-- <form> -->
						<div class="modal-content narrow-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<div class="img-block">
										<img src="images/2121.jpg" >
									</div>
										<button type="submit" class="btn-white"><i class="fa fa-picture-o"></i> Галерея</button>
										<button type="submit" class="btn-white button-right"><i class="fa fa-upload"></i> Загрузить</button>
										<div class="row">

											<div class="col-md-12">
												<textarea rows="2" class="form-control" id='textarea_title' readonly> Для связи с нами: +7 927 4749183, info@respot.ru #it`s-digital</textarea>
											</div>
											<div class="col-md-12">
												<textarea rows="5" class="form-control" id='textarea_content' readonly> Мы считаем, что нет невозможных в исполнении или сложных проектов! Для нас каждая разработка — интересный процесс реализации новых идей!</textarea>
											</div>
											<div class="col-md-5">
												<input type="time" class="form-control" id='input_time' value="10:58" readonly>
											</div>
											<div class="col-md-7">
												<input type="date" class="form-control" id='input_date' value="2015-08-07" readonly>
											</div>	
										</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="quarter-white"><i class="fa fa-pencil"></i></i></button>
								<button type="submit" class="quarter-white"><i class="fa fa-trash-o"></i></i></i></button>
								<button type="submit" class="quarter-white"><i class="fa fa-floppy-o"></i></i></button>
								
								<!-- Оставить modal-footer. Он просто пустой. -->
							</div>
						</div>
					<!-- </form> -->
				</div>
			</div>

			<h1><i class="fa fa-clock-o"></i>Планирование постов</h1>
			<div class="page-wrapper">
			<table class="table-planner-row">
				<tr><td><span class="icon"><i class="fa fa-plus"></i></span></td>

				<?php foreach ($posts as $key => $value) {
					$i++;
					
				if($i%3==0) {?>
				</tr>
				<?php }?>
				<td class="on-top">
				<div class="img-block">
				    <img  src="<?=$value['IMAGE']?>">
				</div>
				<span class="clock"><?php echo $value['TIME']?></span>
				<p><?php echo $value['DATA']?></p>
				</td>
				<?php
				}?>
				<?php
				if($i%3==2 || $i == count) {?>
				</tr>
				<?php }?>
				</table>
			</div>
			<?php	include 'includes/base/footer.php'; ?>
		</div>
		<?php include 'includes/base/jqueryAndBootstrapScripts.html'; ?>
	</body>
</html>