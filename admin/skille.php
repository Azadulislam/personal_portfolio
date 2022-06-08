<?php


$title = "Skills"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "Skilles";
	include ("inc/nav.php");
?>
<?php
	include ("inc/notification.php");
	include_once ('classes/Database.php');
	include_once ('classes/Skille.php');
	$db = new classes\Database;
	$skl = new classes\Skille;
	if(isset($_POST['saveSkill'])){
		$skl->insertSkille($_POST);
	}elseif(isset($_GET['deleted'])){
		$deleted = "Skille deleted successfully!";
	}
?>

        <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
                    <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
						<h4 class="box-title">Add A New Skill</h4>
						<?php
							if(isset($skl->err)){
								?>
								<div class="alert-warning font-weight-bold mess text-center"><?= $skl->err; ?></div>
								<?php
							}elseif(isset($skl->success)){
								?>
								<div class="alert-success font-weight-bold mess text-center"><?= $skl->success; ?></div>
								<?php
							}
						?>
                        <div class="card-content">
                            <ul class="form-inline">
                                <li class="form-group"><input type="text" class="form-control" name="newSkill" id="newSkill" placeholder="Type your skille here" required></li>
                                <li class="form-group">
                                    <select name="sklPrcnt" class="form-control" id="skillPer" >
                                        <?php 
                                            for($i=5;$i<=100;$i+=5){
                                                ?>
                                            <option value="<?= $i?>"><?= $i."%"?></option>
                                            <?php
                                            }
                                            ?>
                                    </select>
                                </li>
                                <li class="form-group"><input type="submit" class="btn btn-success" name="saveSkill" id="saveSkill" value="Save"></li>
                            </ul>
                        </div>
                    </form>
				</div>
				<!-- /.box-content -->
			</div>
            <div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Skiles Are Added</h4>
					<?php
						if(isset($_SESSION['skille'])){
							if($_SESSION['skille']=='deleted'){
								?>
								<div class="alert-warning font-weight-bold mess text-center">Skille is Deleted Successfully!</div>
								<?php
								session_unset();
							}elseif($_SESSION['skille']=='del_err'){
								?>
								<div class="alert-warning font-weight-bold mess text-center">Something Wrong Contact With Admininstator!</div>
								<?php
								session_unset();
							}
						}
					?>
					<!-- /.box-title -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Sl no.</th>
								<th>Name</th>
								<th>Percent</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$select_skl = "SELECT * FROM skille";
								$skl = $db->select($select_skl);
								$i= 1;
								while($skille = $skl->fetch_assoc()){
									?>
									<tr>
										<td><?= $i ?></td>
										<td><?= $skille['skl_name'] ?></td>
										<td><?= $skille['skl_prcnt'] ?>%</td>
										<td><a class="btn btn-danger btn-sm" href="delete.php?skille=<?= $skille['id'] ?>"><i class="fa fa-trash-o"></i></button></td>
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