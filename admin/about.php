<?php
	$title = "About || Web Pro Azad"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "About Details";
	include ("inc/nav.php");
?>
<?php
	include ("inc/notification.php");
	$selct = $db->select("SELECT * FROM `administrator`");
	$about = $selct->fetch_assoc();
?>

		<div class="row small-spacing">
			<!-- /.col-md-3 col-xs-12 -->
			<div class="col-md-12 col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-content card">
							<h4 class="box-title"><i class="fa fa-user ico"></i>Short Details</h4>
							<div class="dropdown js__drop_down">
								<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
								<ul class="sub-menu">
									<li><a href="edit_about.php">Edit</a></li>
								</ul>
								<!-- /.sub-menu -->
							</div>
							<?php
								if(isset($pro->err)){
									?>
									<div class="alert-warning font-weight-bold mess text-center"><?= $pro->err; ?></div>
									<?php
								}elseif(isset($pro->success)){
									?>
									<div class="alert-success font-weight-bold mess text-center"><?= $pro->success; ?></div>
									<?php
								}
							?>
							<div class="card-content">
								<p><?= $about['shrt_desc'] ?></p>
							</div>
							<!-- /.card-content -->
						</div>
						<!-- /.box-content card -->
					</div>
	

					<!-- /.col-md-6 -->
				</div>
				
				<!-- /.row -->
			</div>
			<div class="col-md-12 col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-content card">
							<h4 class="box-title"><i class="fa fa-user ico"></i>Details</h4>
							<!-- /.box-title -->
							<div class="dropdown js__drop_down">
								<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
								<ul class="sub-menu">
									<li><a href="edit_about.php">Edit</a></li>
								</ul>
								<!-- /.sub-menu -->
							</div>
							<!-- /.dropdown js__dropdown -->
							<div class="card-content">
							<div>
								<?= $about['long_desc'] ?>
							</div>
							</div>
							<!-- /.card-content -->
						</div>
						<!-- /.box-content card -->
					</div>
	

					<!-- /.col-md-6 -->
				</div>
				
				<!-- /.row -->
			</div>
			<!-- /.col-md-9 col-xs-12 -->
		</div>
	



<?php
	include ("inc/copyright.php");
	include ("inc/footer.php");
?>