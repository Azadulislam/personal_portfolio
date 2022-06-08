<?php
	$title = "Deshbord"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "Profile";
	include ("inc/nav.php");
?>
<?php
	include ("inc/notification.php");
	$query = "SELECT * FROM `administrator`";
	$selct = $db->select($query);
	$admin = $selct->fetch_assoc();
?>

		<div class="row small-spacing">
			<div class="col-md-3 col-xs-12">
				<div class="box-content bordered primary margin-bottom-20">
					<div class="profile">
						<img src="<?= $img_dir.$admin['profile_img'] ?>" alt="Profile image">
						<h3 class="text-center "><strong></strong></h3>
						<h5 class="text-center"><?= $admin['title'] ?></h5>
						<div class="social">
							<a href="tel:<?= $admin['phn'] ?>" class="btn btn-info btn-circle" data-placement="right" data-toggle="tooltip" title="<?= $admin['phn'] ?>" target="_blank" rel="noopener noreferrer"><i class="fa fa-phone"></i></a>
							<a href="mailto:<?= $admin['email'] ?>" class="btn btn-success btn-circle" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" title="<?= $admin['email'] ?>"><i class="fa fa-envelope"></i></a>
							<a href="http://<?= $admin['facebook'] ?>" class="btn btn-primary btn-circle" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" title="<?= $admin['facebook'] ?>"><i class="fa fa-facebook"></i></a>
							<a href="http://<?= $admin['twitter'] ?>" class="btn btn-info btn-circle" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" title="<?= $admin['twitter'] ?>"><i class="fa fa-twitter"></i></a>
						</div>
					</div>
					<!-- .profile-avatar -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-md-3 col-xs-12 -->
			<div class="col-md-9 col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-content card">
							<h4 class="box-title"><i class="fa fa-user ico"></i>About</h4>
							<!-- /.box-title -->
							<div class="dropdown js__drop_down">
								<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
								<ul class="sub-menu">
									<li><a href="edit_profile">Edit</a></li>
								</ul>
								<!-- /.sub-menu -->
							</div>
							<!-- /.dropdown js__dropdown -->
							<div class="card-content">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Name:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?= $admin['fname'].' '.$admin['lname']?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Title:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?= $admin['title'] ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Email:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?= $admin['email'] ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Address:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?= $admin['address'] ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.col-md-6 -->
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Birthday:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?= $admin['birthday'] ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Interested:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><?= $admin['interest'] ?></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Website:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><a href="https://<?= $admin['website'] ?>" target="_blank"><?= $admin['website'] ?></a></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-xs-5"><label>Phone:</label></div>
											<!-- /.col-xs-5 -->
											<div class="col-xs-7"><a href="tel:<?= $admin['phn'] ?>"><?= $admin['phn'] ?></a></div>
											<!-- /.col-xs-7 -->
										</div>
										<!-- /.row -->
									</div>
									
									<!-- /.col-md-6 -->
								</div>
								<!-- /.row -->
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