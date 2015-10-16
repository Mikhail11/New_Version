<?php
	include 'includes/base/admin.php';

	$posts = $database->getInformationForPosts();
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
										<div class="img-block">
											<img src="" id='imageData'  >

													<div id="rg-gallery" class="rg-gallery"  style = "display:none;">
														<div class="rg-thumbs">
															<!-- Elastislide Carousel Thumbnail Viewer -->
															<div class="es-carousel-wrapper">
																<div class="es-nav">
																	<span class="es-nav-prev">Previous</span>
																	<span class="es-nav-next">Next</span>
																</div>
																<div class="es-carousel">
																	<ul>
																		<li><a href="#"><img src="images/thumbs/1.jpg" data-large="images/1.jpg" alt="image01" data-description="From off a hill whose concave womb reworded" /></a></li>
																		<li><a href="#"><img src="images/thumbs/2.jpg" data-large="images/2.jpg" alt="image02" data-description="A plaintful story from a sistering vale" /></a></li>
																		<li><a href="#"><img src="images/thumbs/3.jpg" data-large="images/3.jpg" alt="image03" data-description="A plaintful story from a sistering vale" /></a></li>
																		<li><a href="#"><img src="images/thumbs/4.jpg" data-large="images/4.jpg" alt="image04" data-description="My spirits to attend this double voice accorded" /></a></li>
																		<li><a href="#"><img src="images/thumbs/5.jpg" data-large="images/5.jpg" alt="image05" data-description="And down I laid to list the sad-tuned tale" /></a></li>
																		<li><a href="#"><img src="images/thumbs/6.jpg" data-large="images/6.jpg" alt="image06" data-description="Ere long espied a fickle maid full pale" /></a></li>
																		<li><a href="#"><img src="images/thumbs/7.jpg" data-large="images/7.jpg" alt="image07" data-description="Tearing of papers, breaking rings a-twain" /></a></li>
																		<li><a href="#"><img src="images/thumbs/8.jpg" data-large="images/8.jpg" alt="image08" data-description="Storming her world with sorrow's wind and rain" /></a></li>
																		<li><a href="#"><img src="images/thumbs/9.jpg" data-large="images/9.jpg" alt="image09" data-description="Upon her head a platted hive of straw" /></a></li>
																		<li><a href="#"><img src="images/thumbs/10.jpg" data-large="images/10.jpg" alt="image10" data-description="Which fortified her visage from the sun" /></a></li>
																		<li><a href="#"><img src="images/thumbs/11.jpg" data-large="images/11.jpg" alt="image11" data-description="Whereon the thought might think sometime it saw" /></a></li>
																		<li><a href="#"><img src="images/thumbs/12.jpg" data-large="images/12.jpg" alt="image12" data-description="The carcass of beauty spent and done" /></a></li>
																		<li><a href="#"><img src="images/thumbs/13.jpg" data-large="images/13.jpg" alt="image13" data-description="Time had not scythed all that youth begun" /></a></li>
																		<li><a href="#"><img src="images/thumbs/14.jpg" data-large="images/14.jpg" alt="image14" data-description="Nor youth all quit; but, spite of heaven's fell rage" /></a></li>
																		<li><a href="#"><img src="images/thumbs/15.jpg" data-large="images/15.jpg" alt="image15" data-description="Some beauty peep'd through lattice of sear'd age" /></a></li>
																		<li><a href="#"><img src="images/thumbs/16.jpg" data-large="images/16.jpg" alt="image16" data-description="Oft did she heave her napkin to her eyne" /></a></li>
																		<li><a href="#"><img src="images/thumbs/17.jpg" data-large="images/17.jpg" alt="image17" data-description="Which on it had conceited characters" /></a></li>
																		<li><a href="#"><img src="images/thumbs/18.jpg" data-large="images/18.jpg" alt="image18" data-description="Laundering the silken figures in the brine" /></a></li>
																		<li><a href="#"><img src="images/thumbs/19.jpg" data-large="images/19.jpg" alt="image19" data-description="That season'd woe had pelleted in tears" /></a></li>
																		<li><a href="#"><img src="images/thumbs/20.jpg" data-large="images/20.jpg" alt="image20" data-description="And often reading what contents it bears" /></a></li>
																		<li><a href="#"><img src="images/thumbs/21.jpg" data-large="images/21.jpg" alt="image21" data-description="As often shrieking undistinguish'd woe" /></a></li>
																		<li><a href="#"><img src="images/thumbs/22.jpg" data-large="images/22.jpg" alt="image22" data-description="In clamours of all size, both high and low" /></a></li>
																		<li><a href="#"><img src="images/thumbs/23.jpg" data-large="images/23.jpg" alt="image23" data-description="Sometimes her levell'd eyes their carriage ride" /></a></li>
																		<li><a href="#"><img src="images/thumbs/24.jpg" data-large="images/24.jpg" alt="image24" data-description="As they did battery to the spheres intend" /></a></li>
																	</ul>
																</div>
															</div>
															<!-- End Elastislide Carousel Thumbnail Viewer -->
														</div><!-- rg-thumbs -->
													</div><!-- rg-gallery -->
										</div>
									</div>	
											<form name="uploadimages" method="post" enctype="multipart/form-data">
											
										<!-- <button type="submit" class="btn-white" id = "buttonGallery"><i class="fa fa-picture-o"></i> Галерея</button> -->
										<button type="submit" class="btn-white button-right" id = "buttonUpload">
										       <i class="fa fa-upload"></i> Загрузить</button>
										</form>
										

											<div class="col-sm-12">
												<textarea rows="2" class="form-control textarea_title" id="textarea_title"></textarea>
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
												<textarea rows="5" class="form-control textarea_content" id="textarea_content"></textarea>
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
												<input type="time" class="form-control input_time" id="input_time" data-toggle="tooltip" data-placement="left" title="Время по МСК">
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
		<script type="text/javascript" src="includes/js/admin-planner.js"></script>
		<script><?=$additionalScripts;?></script>
	</body>
</html>