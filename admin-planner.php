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

			<div class="modal fade" id="modalPostCreate" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-post">
					<!-- <form> -->
						<div class="modal-content narrow-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<div class="img-block">
										<img src="images/2121.jpg" id='imageData' >
									</div>
											<form name="uploadimages" method="post" enctype="multipart/form-data">
											
										<!-- <button type="submit" class="btn-white" id = "buttonGallery"><i class="fa fa-picture-o"></i> Галерея</button> -->
										<button type="submit" class="btn-white button-right" id = "buttonUpload">
										       <i class="fa fa-upload"></i> Загрузить</button>
										</form>
										<div class="row">

											<div class="col-md-12">
												<textarea rows="2" class="form-control textarea_title" id="textarea_title"></textarea>
											</div>
											<div class="col-md-12">
												<textarea rows="5" class="form-control textarea_content" id="textarea_content"></textarea>
											</div>
											<div class="col-md-5">
												<input type="time" class="form-control input_time" id="input_time">
											</div>
											<div class="col-md-7">
												<input type="date" class="form-control input_date" id="input_date">
											</div>
											<div class="col-md-7">
												<input type="hidden" class="form-control input_hidden" id="input_hidden">
											</div>	
										</div>
								</div>
							</div>
							<div class="modal-footer">
								<button  class="quarter-white" id='editButton'><i class="fa fa-pencil"></i></i></button>
								<button  class="quarter-white" id='trashButton'><i class="fa fa-trash-o"></i></i></i></button>
								<button  class="quarter-white" id='saveButton'><i class="fa fa-floppy-o"></i></i></button>
								
								<!-- Оставить modal-footer. Он просто пустой. -->
							</div>
						</div>
					<!-- </form> -->
				</div>
			</div>

			<h1><i class="fa fa-clock-o"></i>Планирование постов</h1>
			<div class="page-wrapper">
			<table class="table-planner-row">
				<tr><td>
					<a  data-toggle="modal" data-target="#modalPostCreate" 
						data-post-title = ""
						data-post-content = ""
						data-post-time = ""
						data-post-date = ""
						data-post-image = "images/imageCap.png"
						data-info = "new">
						<span class="icon"><i class="fa fa-plus"></i></span>
					</a>
				</td>

				<?php foreach ($posts as $key => $value) {
					$i++;

				if($i%3==0) {?>
				</tr>
					<?php }?>
						<td class="on-top">
							<a  data-toggle="modal" data-target="#modalPostCreate" 
								data-post-title = "<?=$value['TITLE']?>"
								data-post-content = "<?=$value['TEXT']?>"
								data-post-time = "<?=$value['TIME']?>"
								data-post-date = "<?=$value['DATA']?>"
								data-post-image = "<?=$value['IMAGE']?>"
								data-post-id = "<?=$value['ID_POSTS']?>"
								data-info = "edit">
								<div class="img-block">
								    <img  src="<?=$value['IMAGE']?>">
								</div>
								<span class="clock"><?php echo $value['TIME']?></span>
								<p><?php echo $value['DATA']?></p>
							</a>
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
		<script type="text/javascript" src="includes/js/admin-planner.js"></script>
	</body>
</html>