<?php
	$title = "Gallary Items"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "View Gallery Items";
	include ("inc/nav.php");
	include ("inc/notification.php");
	include_once ('classes/Database.php');
	$db = new classes\Database();
?>
        <div class="row small-spacing">
            <div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Your Gallery Image</h4>
					<?php
						if(isset($_SESSION['del_gal'])){
							if($_SESSION['del_gal']=='deleted'){
								?>
								<div class="alert-warning font-weight-bold mess text-center">Image is Deleted Successfully!</div>
								<?php
								session_unset();
							}elseif($_SESSION['del_gal']=='del_err'){
								?>
								<div class="alert-warning font-weight-bold mess text-center">Something Wrong Contact With Admininstator!</div>
								<?php
								session_unset();
							}
						}
					?>
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Link</th>
								<th>Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$gal_data = $db->select("SELECT * FROM `gallery`");
								while($gallery = $gal_data->fetch_assoc()){
							?>
									<tr>
										<td><?= $gallery['name'] ?></td>
										<td>https://azad.creative-jfa.com/<?= $img_dir.$gallery['gal_img'] ?></td>
										<td><?= $gallery['status']=='1'?'<i class="fa fa-unlock-alt text-success"></i>':'<i class="fa fa-lock text-danger"></i>' ?></td>
										<td><a class="btn btn-primary btn-sm" href="edit_gallery.?gal_id=<?= $gallery['id'] ?>"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-sm" href="delete.php?del_gal=<?= $gallery['id'] ?>&img=<?= $gallery['gal_img'] ?>"><i class="fa fa-trash-o"></i></a></td>
									</tr>
									<?php }; ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
<?php
	include ("inc/copyright.php");
	include ("inc/footer.php");
?>