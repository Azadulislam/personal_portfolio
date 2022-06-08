<?php
	$title = "Portfolio"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "Portfolio";
	include ("inc/nav.php");
?>
<?php
	include ("inc/notification.php");
	include_once ('classes/Portfolio.php');
	$page_nam = "Portfolio";
	$img_dir = "uploades/img_file/";
	$port = new classes\Portfolio;
	if(isset($_POST['insPort'])){
		$port->insertPortfolio($_POST);
	}
?>

        <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Add a new <?= $page_nam ?></h4>
					<?php
						if(isset($port->err)){
							?>
							<div class="alert-warning font-weight-bold mess text-center"><?= $port->err; ?></div>
							<?php
						}elseif(isset($port->success)){
							?>
							<div class="alert-success font-weight-bold mess text-center"><?= $port->success; ?></div>
							<?php
						}
					?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-content">
                            <ul class="list-unstyled">
                                <li class="form-group"><input type="text" class="form-control" name="title" id="title" placeholder="Type your Title"></li>
                                <li>
                                    <textarea class="form-control" id="" placeholder="Desctiption" name="port_desc" cols="30" rows="10"></textarea>
                                </li>
                                <br>
                                <input type="file" id="input-file-now" class="dropify" name="port_img"/>
                                <li class="text-center"><p class="help margin-top-10">Upload your portfoio image.</p></li>
                                <li class="form-group"><input type="submit" class="btn btn-success" name="insPort" id="insPort" value="Save"></li>
                            </ul>
                        </div>
                    </form>
				</div>
				<!-- /.box-content -->
			</div>
            <div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Your <?= $page_nam ?></h4>
					<!-- /.box-title -->
					<?php
						if(isset($_SESSION['del_port'])){
							if($_SESSION['del_port']=='deleted'){
								?>
								<div class="alert-warning font-weight-bold mess text-center"><?= $page_name ?> Deleted Successfully!</div>
								<?php
								session_unset();
							}elseif($_SESSION['del_port']=='del_err'){
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
								<th>Title</th>
								<th>Desctription</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
								$select_port = "SELECT * FROM `portfolio`";
								$port_data = $db->select($select_port);
								while($portfolio = $port_data->fetch_assoc()){
									?>
									<tr>
										<td><?= $portfolio['title'] ?></td>
										<td><?= $portfolio['port_desc'] ?></td>
										<td><img style="width: 7rem;" src="<?= $img_dir.$portfolio['port_img'] ?>" alt=""></td>
										<td><a class="btn btn-danger btn-sm" href="delete.php?port=<?= $portfolio['id'] ?>&Prt_img=<?= $portfolio['port_img'] ?>"><i class="fa fa-trash-o"></i></a></td>
									</tr>
							<?php } ?>
							
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