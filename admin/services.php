<?php
	$title = "Services";
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "Services";
	include ("inc/nav.php");
?>
<?php
	include ("inc/notification.php");
	include_once ('classes/Service.php');
	$srv = new classes\Services();
	if(isset($_POST['insService'])){
		$srv->insertServices($_POST);
	}
?>

        <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
						<h4 class="box-title">Add new services</h4>
						<?php
							if(isset($srv->err)){
								?>
								<div class="alert-warning font-weight-bold mess text-center"><?= $srv->err; ?></div>
								<?php
							}elseif(isset($srv->success)){
								?>
								<div class="alert-success font-weight-bold mess text-center"><?= $srv->success; ?></div>
								<?php
							}
						?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-content">
                            <ul class="list-unstyled">
                                <li class="form-group"><input type="text" class="form-control" name="srv_name" id="srv_name" placeholder="Type your service name" required></li>
                                <li>
                                    <textarea name="srv_desc" class="form-control" placeholder="Description" id="" cols="30" rows="10" required></textarea>
                                </li>
                                <br>
                                <input type="file" name="srv_img" id="input-file-now" class="dropify" required/>
                                <li class="text-center"><p class="help margin-top-10">Upload your service icon (.png) file.</p></li>
                                <li class="form-group"><input type="submit" id="uplaod" class="btn btn-success" name="insService" id="insService" value="Save"></li>
                            </ul>
                        </div>
                    </form>
				</div>
				<!-- /.box-content -->
			</div>
            <div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Your services</h4>
					<!-- /.box-title -->
					<?php
						if(isset($_SESSION['services'])){
							if($_SESSION['services']=='deleted'){
								?>
								<div class="alert-warning font-weight-bold mess text-center">Sevice is Deleted Successfully!</div>
								<?php
								session_unset();
							}elseif($_SESSION['services']=='del_err'){
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
								<th>Description</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$select_srv = "SELECT * FROM `services`";
								$srv_data = $db->select($select_srv);
								$i= 1;
								while($services = $srv_data->fetch_assoc()){
									?>
									<tr>
										<td><?= $services['name'] ?></td>
										<td><?= $services['srv_desc'] ?></td>
										<td><img style="width: 7rem;" src="<?= $img_dir.$services['image'] ?>" alt=""></td>
										<td><a class="btn btn-danger btn-sm" href="delete.php?srv=<?= $services['id'] ?>&img=<?= $services['image'] ?>"><i class="fa fa-trash-o"></i></a></td>
									</tr>
							<?php $i++; } ;?>
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