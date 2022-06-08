<?php
	$title = "Deshbord"; 
	include ("inc/header.php");
?>
<?php
	$page_name = "Deshbord";
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "Deshboard";
	include ("inc/nav.php");
?>
<?php
	include ("inc/notification.php");
?>
		<div class="row small-spacing">
			<h3 class="desh-title">Skill</h3>
			<?php
				$sel_skille = $db->select("SELECT * FROM `skille` LIMIT 4");
				while($skille = $sel_skille->fetch_assoc()){
					?>
					<div class="col-lg-3 col-md-6 col-xs-12">
						<div class="box-content user-info text-center">
							<h3><?= $skille['skl_name'] ?></h3>
							<h5 class="text-warning"><?= $skille['skl_prcnt'] ?>%</h5>
						</div>
						<!-- /.user-info -->
					</div>
					<?php
				}
			?>
		</div>
		<div class="row small-spacing">
			<h3 class="desh-title">Works & Review</h3>
			<?php
				$sel_rvw = $db->select("SELECT * FROM `review` LIMIT 4");
				while($review = $sel_rvw->fetch_assoc()){
					$dir = "uploades/img_file/";
					?>
					<div class="col-lg-3 col-md-6 col-xs-12">
						<div class="box-content user-info">
							<div class="avatar" style="height: 78px;width: 78px"><img style="height: 100%;width: 100%" src="<?= $dir.$review['clnt_img'] ?>" alt=""></div>
							<!-- /.avatar -->
							<div class="right-content">
								<h4 class="name"><?= $review['clnt_name'] ?></h4>
								<!-- /.name -->
								<p><?= $review['clnt_cntry'] ?></p>
								<div class="text-warning small"><?= $review['clnt_rting'] ?> <i class="fa fa-star-o"></i><!--<i class="fa fa-star"></i>--></div>
								<!-- /.text-custom -->
							</div>
							<!-- /.right-content -->
						</div>
						<!-- /.user-info -->
					</div>
					<?php
				}
			?>
		</div>
		<div class="row small-spacing">
			<!-- /.col-lg-6 col-xs-12 -->
			<h3 class="desh-title">Blog Post</h3>
			<?php
				$sel_blg = $db->select("SELECT * FROM `blog` LIMIT 4");
				while($blog = $sel_blg->fetch_assoc()){
					?>
					<div class="col-lg-3 col-md-6 col-xs-12">
						<div class="box-content user-info text-center">
							<h3><?= $blog['title'] ?></h3>
						</div>
					</div>
					<?php
				}
			?>
		</div>
		<!-- /.row -->		
		<?php
			include ("inc/copyright.php");
		?>
<?php
	include ("inc/footer.php");
?>

