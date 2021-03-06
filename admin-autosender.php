<?php
	include 'includes/base/admin.php';
	$protector->protectPageForbidSuperadmin();
	
	$dictionary_branches = ['AUTO_POST','AUTO_SMS','AUTO_POST_VK'];

	$smsCount = $database->getValueByShortName('SMS_PAYMENTS_COUNT')['VALUE'];

	$processSettingsUpdateResponce = null;
	$additionalScripts = "";
		
	if (isset($_POST['form-name'])) {
		if ($_POST['form-name'] == 'admin-settings') {
			$processSettingsUpdateResponce = $database->processPostRequestUpdateVars($dictionary_branches);
		} 
	}
	
	$settings = $database->getValuesForParentByShortName($dictionary_branches);
	
?><!DOCTYPE html>
<html lang="ru">
	<head>
		<?php include 'includes/base/headBootstrapAndBasics.php'; ?>
		<title>Автоматическая рассылка <?php echo $adminPanelTitle; ?></title>
	</head>
	<body class="admin-page simple-page"><div class="background-cover"></div>
		<div class="container glass-panel">
			<?php include 'includes/base/navbar.php'; ?>
			
			<h1 class="huge-cover"><i class="fa fa-calendar"></i> Автоматическая рассылка</h1>

				<input type="hidden" name="form-name" id = "smsCount" value="<?=$smsCount;?>">

			<div class="row">
				<div class="col-md-12" role="main">

					<div class="page-wrapper text-center">
						
						<form method="post" enctype="multipart/form-data" action="admin-autosender.php" id="admin-settings-form">
							<input type="hidden" name="form-name" value="admin-settings">
										
							<?php
								$prevFieldParent = null;
								$isFirst = true;
								foreach ($settings as $key => $value) {
									if ($value['ID_PARENT'] != $prevFieldParent) {
									
									if ($prevFieldParent != null) { ?>
										<div class="action-buttons-mid-way-panel">
											<button type="submit" class="btn btn btn-black gradient">Сохранить <i class="fa fa-floppy-o"></i></button>
											<?php if ($processSettingsUpdateResponce === true || $processSettingsUpdateResponce === false) { 
												echo '<i class="text-'.($processSettingsUpdateResponce === true ? 'success' : 'danger').' fa fa-'.($processSettingsUpdateResponce === true ? 'check-circle' : 'times-circle').'"></i>'; 
											} ?>
										</div>
									</div>
										<?php
									}
									
									if ($value['ID_PARENT'] != $prevFieldParent) {
										$prevFieldParent = $value['ID_PARENT'];
									}
									?>
									
									<a name="setting-group-<?=$value['ID_PARENT'];?>">
										<h2 class="<?php
										if ($isFirst == true) {
											$isFirst = false;
										} else {
											echo 'divide-top';
										}
										?>"><?=$value['PARENT_NAME'];?></h2>
									</a>
									<div class="form-horizontal">
									<? } ?>
									
										<div class="form-group">
											<label class="col-sm-4 control-label" for="<?=$key;?>"><?=$value['NAME'];?></label>
											<div class="col-sm-8">
												<?php
													
													
												if ($value['DATA_TYPE'] == 'text&file' || $value['DATA_TYPE'] == 'file') { // ЕСЛИ ФАЙЛ
													$addFileScript = true;
													
													if (isset($value['VALUE'])) { ?>
													<small>Изображение, которое используется сейчас:</small>
													<img src="<?=($value['VALUE']);?>" class="tiny-image-preview">
													<?php } ?>
													<div class="input-group">
										                <span class="input-group-btn">
															<span class="btn btn-black btn-file">
																Выбрать&hellip; <i class="fa fa-folder-open-o"></i>
																<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
																<input
																	type="file"
																	accept="image/png, image/jpeg, image/gif"
																	class="form-control"
																	name="<?=$key;?>_file"
																	id="<?=$key;?>_file"
																	value="<?=$value['VALUE'];?>">
															</span>
										                </span>
														<input type="text" class="form-control" readonly data-type="file-name">
													</div>
													<?php
												}

												if ($value['DATA_TYPE'] == 'textarea') { // ЕСЛИ TEXTAREA 
												
													if($value['SHORT_NAME']=='AUTO_MESSAGE_SMS'){ ?>
													<textarea rows="2"
														class="form-control"
														name="<?=$key;?>"
														id="<?=$key;?>"><?=$value['VALUE'];?></textarea>
													<div class="textarea-word-count" id="<?=$key;?>_word_count">≤70</div> 

													<?php ob_start(); ?>
														var textarea_<?=$key;?> = $("#<?=$key;?>");
														var word_count_<?=$key;?> = $("#<?=$key;?>_word_count");
														$(textarea_<?=$key;?>).keyup( function() {
																update_text_word_count(
																	$(textarea_<?=$key;?>),
																	$(word_count_<?=$key;?>)
																);
															}
														);
														update_text_word_count(textarea_<?=$key;?>, word_count_<?=$key;?>);
													<?php $additionalScripts = $additionalScripts.ob_get_clean(); ?>


													<?php } else { ?>
													 
													<textarea rows="3"
														class="form-control"
														name="<?=$key;?>"
														id="<?=$key;?>"><?=$value['VALUE'];?></textarea>
													<div class="textarea-word-count" id="<?=$key;?>_word_count">≤140</div> 

													<?php ob_start(); ?>
														var textarea_<?=$key;?> = $("#<?=$key;?>");
														var word_count_<?=$key;?> = $("#<?=$key;?>_word_count");
														$(textarea_<?=$key;?>).keyup( function() {
																update_textarea_word_count(
																	$(textarea_<?=$key;?>),
																	$(word_count_<?=$key;?>)
																);
															}
														);
														update_textarea_word_count(textarea_<?=$key;?>, word_count_<?=$key;?>);
													<?php $additionalScripts = $additionalScripts.ob_get_clean(); ?>

													<?php } ?>	
												<?php		
												} else if ($value['DATA_TYPE'] != 'file') { // ЕСЛИ СТАНДАРТНОЕ
													
												if ($value['DATA_TYPE'] == 'checkbox') { // ЕСЛИ CHECKBOX
														echo '<div class="checkbox">';
													}
												?>
													<input
														type="<?=$value['DATA_TYPE'];?>"
														class="form-control"
														id="<?=$key;?>"
														name="<?=$key;?>"
														<?=( // ЕСЛИ CHECKBOX
															$value['DATA_TYPE'] == 'checkbox' ? (
																$value['VALUE'] == 'T' ? 'checked' : ''
															)
															: ('value="'.$value['VALUE'].'"')
														);?>
														<?=$value['DATA_TYPE'] == 'date'? 
														'style = "width:15%;"': '' ;?>
														><?php
														
													if ($value['DATA_TYPE'] == 'checkbox') { // ЕСЛИ CHECKBOX
														echo '<label></label></div>';
													}
													
												}
													
												if ($value['COMMENT']) { ?>
													<small><?=$value['COMMENT'];?></small>
												<?php } ?>
											</div>
										</div>
									
									<?php
								}
							?>
							
								<div class="action-buttons-mid-way-panel">
									<button type="submit" class="btn btn btn-black gradient">Сохранить <i class="fa fa-floppy-o"></i></button>
									<?php if ($processSettingsUpdateResponce === true || $processSettingsUpdateResponce === false) { 
										echo '<i class="text-'.($processSettingsUpdateResponce === true ? 'success' : 'danger').' fa fa-'.($processSettingsUpdateResponce === true ? 'check-circle' : 'times-circle').'"></i>'; 
									} ?>
								</div>
							</div>
						
						</form>		
					</div>
			
				</div><!-- eof col -->
			</div><!-- eof .row -->
			<?php	include 'includes/base/footer.php'; ?>
		</div>
		<?php include 'includes/base/jqueryAndBootstrapScripts.html'; ?>
		<script type="text/javascript" src="includes/js/jquery.numeric.min.js"></script>
		<script type="text/javascript" src="includes/js/jquery.alphanum.js"></script>
		<script type="text/javascript" src="includes/js/legacy.js"></script>
		<script type="text/javascript" src="includes/js/picker.js"></script>
		<script type="text/javascript" src="includes/js/picker.date.js"></script>
		<script type="text/javascript" src="includes/js/picker.time.js"></script>
		<script src="includes/js/ru_RU.js"></script>
		<script type="text/javascript" src="includes/js/admin-autosender.js"></script>
		<script>$(document).ready(function() {<?=$additionalScripts;?>});</script>
		<?php if (isset($addFileScript) && $addFileScript) { ?>
			<script>// Добавление названия справа от кнопки Добавить... в областях выбора файлов при выборе файла для загрузки
				
				$(document).on('change', '.btn-file :file', function() {
				  var input = $(this),
				      numFiles = input.get(0).files ? input.get(0).files.length : 1,
				      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				  input.trigger('fileselect', [numFiles, label]);
				});
				
				$(document).ready(function() {
				    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
				        
				        var input = $(this).parents('.input-group').find(':text'),
				            log = numFiles > 1 ? numFiles + ' files selected' : label;
				        
				        if( input.length ) {
				            input.val(log);
				        } else if(log) {
							alert(log);
				        }
				        
				    });
				});
			</script>
		<?php } ?>
	</body>
</html>