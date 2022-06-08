<?php
	$title = "Catergory"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "Category";
	include ("inc/nav.php");
?>
<?php
	include ("inc/notification.php");
	include_once ('classes/Category.php');
	$db = new classes\Database();
	$cat = new classes\Category();
	if(isset($_POST['saveCat'])){
		$cat->insertCategory($_POST);
	}
?>

        <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Add a new Categroy</h4>
					<?php
						if(isset($cat->err)){
							?>
							<div class="alert alert-warning font-weight-bold mess text-center"><?= $cat->err; ?></div>
							<?php
						}elseif(isset($cat->success)){
							?>
							<div class="alert alert-success font-weight-bold mess text-center"><?= $cat->success; ?></div>
							<?php
						}
					?>
					<form action="" method="POST" enctype="multipart/form-data">
					<div class="card-content">
                            <ul class="form-inline">
                                <li class="form-group"><input type="text" class="form-control" name="cat_name" placeholder="Type your category name"></li>
                                <li class="form-group">
                                    <select name="cat_type" class="form-control">
                                        <?php 
                                            for($i=1;$i<=2;$i++){
                                                ?>
                                            <option value="<?= $i?>"><?= $i?></option>
                                            <?php
                                            }
                                            ?>
                                    </select>
                                </li>
                                <li class="form-group"><input type="submit" class="btn btn-primary" name="saveCat" id="saveCat" value="Save"></li>
                            </ul>
                            
                            
                        </div>
                    </form>
				</div>
				<!-- /.box-content -->
			</div>
            <div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Your Category</h4>
					<!-- /.box-title -->
					<?php
						if(isset($_SESSION['del_cat'])){
							if($_SESSION['del_cat']=='deleted'){
								?>
								<div class="alert-warning font-weight-bold mess text-center">Category Deleted Successfully!</div>
								<?php
								session_unset();
							}elseif($_SESSION['del_cat']=='del_err'){
								?>
								<div class="alert-warning font-weight-bold mess text-center">Category could not be deleted!</div>
								<?php
								session_unset();
							}
						}
					?>
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Sl no.</th>
								<th>Category Name</th>
								<th>Category type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$cat_data = $db->select( "SELECT * FROM `category`");
							$i=1;
							while($categoy = $cat_data->fetch_assoc()){
								?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $categoy['name'] ?></td>
									<td><?= $categoy['type'] ?></td>
									<td><a class="btn btn-danger btn-sm" href="delete.php?del_cat=<?= $categoy['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
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