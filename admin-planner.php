<?php
	include 'includes/base/admin.php';

	$posts = $database->getInformationForPosts();
	$gallery = $database ->getImagesForGallery();
	$i = 0;
	$count = $posts ->num_rows;
	$additionalScripts = "";
?><!DOCTYPE html>
<html lang="ru">
	<head>
		<?php include 'includes/base/headBootstrapAndBasics.php'; ?>
		<title>Планирование постов <?php echo $adminPanelTitle; ?></title>
				<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
			<div class="rg-image-wrapper">
				{{if itemsCount > 1}}
					<div class="rg-image-nav">
						<a href="#" class="rg-image-nav-prev">Previous Image</a>
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
				{{/if}}
				<div class="rg-image"></div>
				<div class="rg-loading"></div>
				<div class="rg-caption-wrapper">
				</div>
			</div>
		</script>
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
							 <div class="row">
								<div class="form-group">
									<div class = "col-sm-12">
										<div class="img-block" >
											<img src="" id='imageData' >

													<div id="rg-gallery" class="rg-gallery"  >
														<div class="rg-thumbs">
															<!-- Elastislide Carousel Thumbnail Viewer -->
															<div class="es-carousel-wrapper">
																<div class="es-nav">
																	<span class="es-nav-prev">Previous</span>
																	<span class="es-nav-next">Next</span>
																</div>
																<div class="es-carousel">
																	<ul>
																	<?php foreach ($gallery as $key => $value) { ?>

																		<li><a href="#"><img src="<?=$value['IMAGE']?>" data-large="<?=$value['IMAGE']?>"  /></a></li>
																		<?php } ?>
																	</ul>
																</div>
															</div>
															<!-- End Elastislide Carousel Thumbnail Viewer -->
														</div><!-- rg-thumbs -->
													</div><!-- rg-gallery -->
										</div>
									</div>	

									<button  class="btn-white" id = "buttonGallery"><i class="fa fa-picture-o"></i> Галерея</button>
											<form name="uploadimages" method="post" enctype="multipart/form-data">
										<button type="submit" class="btn-white button-right" id = "buttonUpload">
										       <i class="fa fa-upload"></i> Загрузить</button>
										</form>
										

											<div class="col-sm-12">
												<textarea rows="2" class="form-control textarea_title" id="textarea_title" data-toggle="tooltip" data-placement="top" title="Заголовок вашего поста"></textarea>
														<div class="textarea-word-count" id="title_word_count">≤70</div>
													<?php ob_start(); ?>
														var textarea_title = $("#textarea_title");
														var word_count_title = $("#title_word_count");
														$(textarea_title).keyup( function() {
																update_title_word_count(
																	$(textarea_title),
																	$(word_count_title)
																);
															}
														);
														update_title_word_count(textarea_title, word_count_title);
													<?php $additionalScripts = $additionalScripts.ob_get_clean(); ?>
											</div>
											<div class="col-sm-12">
												<textarea rows="5" class="form-control textarea_content" id="textarea_content" data-toggle="tooltip" data-placement="top" title="Текст вашего поста"></textarea>
												<div class="textarea-word-count" id="content_word_count">≤140</div>
													<?php ob_start(); ?>
														var textarea_content = $("#textarea_content");
														var word_count_content = $("#content_word_count");
														$(textarea_content).keyup( function() {
																update_textarea_word_count(
																	$(textarea_content),
																	$(word_count_content)
																);
															}
														);
														update_textarea_word_count(textarea_content, word_count_content);
													<?php $additionalScripts = $additionalScripts.ob_get_clean(); ?>
											</div>
											<div class="col-sm-5">
												<input type="time" class="form-control input_time" id="input_time" data-toggle="tooltip" data-placement="top" title="Время по МСК">
											</div>
											<div class="col-sm-7">
												<input type="date" class="form-control input_date" id="input_date">
											</div>
											<div class="col-md-7 col-xs-7">
												<input type="hidden" class="form-control input_hidden" id="input_hidden" >
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

			<h1 class="huge-cover"><i class="fa fa-clock-o"></i>Планирование постов</h1>
			<div class="page-wrapper">
			<table class="table-planner-row">
				<tr><td>
					<a href="#"  data-toggle="modal" data-target="#modalPostCreate" 
						data-post-title = ""
						data-post-content = ""
						data-post-time = ""
						data-post-date = ""
						data-post-image = "images/imageCap.png"
						data-info = "new"
						id = "addButton">
						<span class="icon"><i class="fa fa-plus"></i></span>
					</a>
				</td>

				<?php foreach ($posts as $key => $value) {
					$i++;

				if($i%3==0) {?>
				</tr>
					<?php }?>
						<td class="on-top" style="background:url('<?=$value['IMAGE']?>') no-repeat center top;">

							<a href="#"  data-toggle="modal" data-target="#modalPostCreate" 
								data-post-title = "<?=$value['TITLE']?>"
								data-post-content = "<?=$value['TEXT']?>"
								data-post-time = "<?=$value['TIME']?>"
								data-post-date = "<?=$value['DATA']?>"
								data-post-image = "<?=$value['IMAGE']?>"
								data-post-id = "<?=$value['ID_POSTS']?>"
								data-info = "edit">
								<div class="img-overlay">
									<p><?php echo date('d.m',strtotime($value['DATA']))?></p>
									<span class="clock"><?php echo $value['TITLE']?></span>
								</div>
							</a>
						</td>
					<?php
					}?>
				<?php
				if($i%3==2 || $i == $count) {?>
				</tr>
				<?php }?>
				</table>
			</div>
			<?php	include 'includes/base/footer.php'; ?>
		</div>
		<?php include 'includes/base/jqueryAndBootstrapScripts.html'; ?>
		<script type="text/javascript" src="includes/js/ajaxupload.3.5.js"></script>
		<script type="text/javascript" src="js/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.elastislide.js"></script>
		<script type="text/javascript" src="js/gallery.js"></script>
		<script type="text/javascript" src="includes/js/legacy.js"></script>
		<script type="text/javascript" src="includes/js/picker.js"></script>
		<script type="text/javascript" src="includes/js/picker.date.js"></script>
		<script type="text/javascript" src="includes/js/picker.time.js"></script>
		<script src="includes/js/ru_RU.js"></script>
		<script type="text/javascript" src="includes/js/admin-planner.js"></script>
		<script><?=$additionalScripts;?></script>
	</body>
</html>