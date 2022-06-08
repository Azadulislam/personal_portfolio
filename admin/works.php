<?php
	$title = "Works &amp Review"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "Works & Review";
	include ("inc/nav.php");
?>
<?php
	include ("inc/notification.php");
	include_once ('classes/Review.php');
	$db = new classes\Database;
	$review = new classes\Review();

	if(isset($_REQUEST['saveReview'])){
		$review->insertReview($_REQUEST);
	}
?>

        <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
                    <form action="" method="POST" enctype="multipart/form-data">
						<h4 class="box-title">Add a new works & review</h4>
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
                        <div class="card-content">
                            <ul class="form-inline">
                                <li class="form-group"><input type="text" class="form-control" name="clnt_name" placeholder="Client name" required></li>
                                <li class="form-group"><input type="text" class="form-control" name="clnt_cmmnt" placeholder="Client comment" ></li>
                                <li class="form-group"><input type="text" class="form-control" name="clnt_cntry" placeholder="Client country" ></li>
                                <li class="form-group">
                                    <select name="ratings" class="form-control" id="ratings">
                                        <?php 
                                            for($i=1;$i<=5;$i++){
                                                ?>
                                            <option value="<?= $i?>"><?= $i?></option>
                                            <?php
                                            }
										?>
                                    </select>
                                </li>
                                <br>
                                <br>
                                <input type="file" id="input-file-now" name="clnt_prof" class="dropify"  />
                                <br>
                                <li class="form-group"><input type="submit" class="btn btn-success" name="saveReview" value="Save"></li>
                            </ul>
                            
                            
                        </div>
                    </form>
				</div>
				<!-- /.box-content -->
			</div>
            <div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Works & review</h4>
					<!-- /.box-title -->
					<?php
						if(isset($_SESSION['review'])){
							if($_SESSION['review']=='deleted'){
								?>
								<div class="alert-warning font-weight-bold mess text-center">Review is Deleted Successfully!</div>
								<?php
								session_unset();
							}elseif($_SESSION['review']=='del_err'){
								?>
								<div class="alert-warning font-weight-bold mess text-center">Something Wrong Contact With Admininstator!</div>
								<?php
								session_unset();
							}
						}
					?>
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Client Name</th>
								<th>Comment</th>
								<th>Country</th>
								<th>Review</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sel_rvw = "SELECT * FROM `review`";
								$data = $db->select($sel_rvw);
								$i=1;
								while($review_data = mysqli_fetch_assoc($data)){
									?>
										<tr>
											<td><?= $review_data['clnt_name'] ?></td>
											<td><?= $review_data['clnt_cmnt'] ?></td>
											<td><?= $review_data['clnt_cntry'] ?></td>
											<td><?= $review_data['clnt_rting'] ?> <i class="fa fa-star rtings"></i></td>
											<td>
												<img style="height: 5rem;width: 5rem;border-radius: 4rem;" src="uploades/img_file/<?= $review_data['clnt_img'] ?>" alt="">	
											</td>
											<td>
												<a class="btn btn-danger btn-sm" href="delete.php?del_review=<?= $review_data['id'] ?>&img=<?= $review_data['clnt_img'] ?>"><i class="fa fa-trash-o"></i></a>	
											</td>
										</tr>
									<?php
									$i++;
								}
								
							?>
							
							
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