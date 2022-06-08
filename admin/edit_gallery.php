<?php
	$title = "Edit Galllery"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
    $page_name = "Edit Gallery";
	include ("inc/nav.php");
?>
<?php
    include ("inc/notification.php");
    include_once ('classes/Gallery.php');
	$db = new classes\Database();
	$img_dir = "uploades/img_file/";
	$gal = new classes\Gallery();
	if(isset($_POST['updateGallery'])){
		$gal->updateGalleryImg($_POST);
    }
    if(isset($_REQUEST['gal_id'])){
        $id = $_REQUEST['gal_id'];
    }
    $gal_data = $db->select("SELECT * FROM `gallery` WHERE `id`='$id'");
    $gallery = $gal_data->fetch_assoc();
?>

        <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
                    <h4 class="box-title">Add a new gallery</h4>
                        <?php
							if(isset($gal->err)){
								?>
								<div class="alert alert-warning font-weight-bold mess text-center"><?= $gal->err; ?></div>
								<?php
							}elseif(isset($gal->success)){
								?>
								<div class="alert alert-success font-weight-bold mess text-center"><?= $gal->success; ?></div>
								<?php
							}
						?>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-content">
                            <ul class="list-unstyled">
                                <li>
                                    <input type="file" id="input-file-now" class="dropify" name="gall_img"/>
                                    <input type="hidden" value="<?= $gallery['gal_img'] ?>" name="old_gall_img"/>
                                    <input type="hidden" value="<?= $gallery['id'] ?>" name="id"/>
                                    <input type="hidden" value="<?= $gallery['name'] ?>" name="img_nm"/>
                                </li>
                                <li class="text-center"><p class="help margin-top-10">Upload your gallry image.</p></li>
                            </ul>
                            <ul class="form-inline m-0">
                                <li class="form-group">
                                    <select name="gallStatus" id="">
                                        <option value="0" <?= $gallery['status']=='0'?'selected':'' ?>>Private</option>
                                        <option value="1" <?= $gallery['status']=='1'?'selected':'' ?>>Public</option>
                                    </select>
                                </li>
                                <li class="form-group ml-2">
                                    <input type="submit" name="updateGallery" class="btn btn-sm btn-primary">
                                </li>
                            </ul>
                        </div>
                    </form>
				</div>
				<!-- /.box-content -->
			</div>
	



<?php
	include ("inc/copyright.php");
	include ("inc/footer.php");
?>