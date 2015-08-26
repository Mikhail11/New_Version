<?php 
	include 'includes/core/session.php';
	
	if (isset($_POST['form-name'])) {
	
		// Изменение периода выборки главного графика статистики
		if ($_POST['form-name'] == 'get-main-stats-chart-data') {
		
			$_SESSION['main-stats-chart-data-offset'] = $_POST['offset'];
			$_SESSION['main-stats-chart-data-limit'] = $_POST['limit'];
		
		} else if($_POST['form-name'] == 'postPlannerForm'){

			$title = $_POST['title'];
			$content = $_POST['content'];
			$time = $_POST['time'];
			$date = $_POST['date'];
			$images = $_POST['image'];
			$postId = $_POST['post'];

			$database->updatePostVars($title,$content,$time,$date,$images,$postId);
		} else if($_POST['form-name'] == 'postPlannerDelete'){

			$postId = $_POST['postId'];
			$database->postPlannerDelete($postId);
		}
	
	}


?>
