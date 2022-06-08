<?php
	$title = "Resume"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "Works";
	include ("inc/nav.php");
?>
<?php
    include ("inc/notification.php");
    include_once ('classes/Review.php');
	$db = new classes\Database;
	$review = new classes\Review();

	if(isset($_REQUEST['up_resume'])){
		$review->updateResume($_REQUEST);
    }
    
    $sel_rsm = "SELECT * FROM `resume`";
    $rsm_data = $db->select($sel_rsm);
    $resume = mysqli_fetch_assoc($rsm_data)
?>

        <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
                        <h4 class="box-title">Update Resume</h4>
                        <?php
							if(isset($review->err)){
								?>
								<div class="alert-warning font-weight-bold mess text-center"><?= $review->err; ?></div>
								<?php
							}elseif(isset($review->success)){
								?>
								<div class="alert-success font-weight-bold mess text-center"><?= $review->success; ?></div>
								<?php
							}
						?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-content">
                            <ul class="form-inline">
                                <input type="hidden" name="id" value="<?= $resume['id'] ?>">
                                <li class="form-group"><label for="clnt">Client</label><input type="number" class="form-control d-block" placeholder="Happy coustomer" name="clnt" id="clnt" value="<?= $resume['clnt'] ?>"></li>
                                <li class="form-group"><label for="project">Project</label><input type="number" class="form-control d-block" placeholder="Project" name="project" id="project" value="<?= $resume['project'] ?>"></li>
                                <li class="form-group"><label for="review">Review</label><input type="number" class="form-control d-block" placeholder="Customer review" name="review" id="review" value="<?= $resume['review'] ?>"></li>
                                <li class="form-group"><label for="r_project">Running Project</label><input type="number" class="form-control d-block" placeholder="Running Project" name="r_project" id="r_project" value="<?= $resume['runing_pro'] ?>"></li>
                                <li class="form-group"><input type="submit" class="btn btn-primary" name="up_resume" id="up_resume" value="Update"></li>
                            </ul>
                        </div>
                    </form>
				</div>
				<!-- /.box-content -->
			</div>
            
	



<?php
	include ("inc/copyright.php");
	include ("inc/footer.php");
?>