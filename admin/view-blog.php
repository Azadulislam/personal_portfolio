
<?php
	$title = "Blog"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "View Blog Post";
	include ("inc/nav.php");
	include ("inc/notification.php");
	include_once ('classes/Database.php');
	$db = new classes\Database();
?>
        <div class="row small-spacing">
            <div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Your blog post</h4>
					<?php
						if(isset($_SESSION['del_blg'])){
							if($_SESSION['del_blg']=='deleted'){
								?>
								<div class="alert-warning font-weight-bold mess text-center">Blog is Deleted Successfully!</div>
								<?php
								session_unset();
							}elseif($_SESSION['del_blg']=='del_err'){
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
								<th>Links</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$blg_data = $db->select("SELECT * FROM `blog`");
								
								while($blog = $blg_data->fetch_assoc()){
									?>
									<tr>
										<td><?= $blog['title'] ?></td>
										<td><h6>https://azad.creative-jfa.com/post?blog=<?= $blog['slg']; ?>&id=<?= $blog['id'] ?></h6></td>
										<td><a class="btn btn-primary btn-sm" href="edit_blg?blg_id=<?= $blog['id'] ?>"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-sm" href="delete.php?del_blg=<?= $blog['id'] ?>&img=<?= $blog['image'] ?>"><i class="fa fa-trash-o"></i></a></td>
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