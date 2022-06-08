<?php
	$title = "Edit About"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
	$page_name = "Edit About";
	include ("inc/nav.php");
?>
<?php
    include ("inc/notification.php");
    include_once ("classes/Profile.php");
    $pro = new classes\Profile;
    if(isset($_REQUEST['upAbout'])){
       $pro->updateAbout($_REQUEST);
    }
	$query = "SELECT * FROM `administrator`";
	$selct = $db->select($query);
    $about = $selct->fetch_assoc();
?>

		<div class="row small-spacing">
            <div class="col-xs-12">
				<div class="box-content">
                    <h4 class="box-title">Description</h4>
                    <?php
                        if(isset($pro->err)){
                            ?>
                            <div class="alert alert-warning font-weight-bold mess text-center"><?= $pro->err; ?></div>
                            <?php
                        }elseif(isset($pro->success)){
                            ?>
                            <div class="alert alert-success font-weight-bold mess text-center"><?= $pro->success; ?></div>
                            <?php
                        }
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <textarea name="shrt_dsc" id="" class="form-control" cols="30" rows="10"><?= $about['shrt_desc'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <textarea name="lng_dsc" id="tinymce"><?= $about['long_desc'] ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?= $about['id'] ?>">
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary text-center" name="upAbout" value="Update">
                        </div>
                    </form>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
		</div>
	



<?php
	include ("inc/copyright.php");
	include ("inc/footer.php");
?>