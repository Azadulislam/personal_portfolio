<?php
	$title = "Galllery || Web Pro Azad"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
    $page_name = "Add Gallery Items";
	include ("inc/nav.php");
?>
<?php
    include ("inc/notification.php");
    include_once ('classes/Gallery.php');
	$db = new classes\Database();
	$img_dir = "uploades/img_file/";
	$gal = new classes\Gallery();
	if(isset($_POST['addGallery'])){
		$gal->inserGalleryImg($_POST);
	}
?>

        <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
                    <h4 class="box-title">Add a new gallery</h4>
                        <?php
							if(isset($gal->err)){
								?>
								<div class="alert-warning font-weight-bold mess text-center"><?= $gal->err; ?></div>
								<?php
							}elseif(isset($gal->success)){
								?>
								<div class="alert-success font-weight-bold mess text-center"><?= $gal->success; ?></div>
								<?php
							}
						?>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-content">
                            <ul class="list-unstyled">
                                <li>
                                    <input type="file" id="input-file-now" class="dropify" name="gall_img" required/>
                                </li>
                                <li class="text-center"><p class="help margin-top-10">Upload your gallry image.</p></li>
                            </ul>
                            <ul class="form-inline m-0">
                                <li class="form-group">
                                    <select name="gallStatus" id="">
                                        <option value="0">Private</option>
                                        <option value="1">Public</option>
                                    </select>
                                </li>
                                <li class="form-group ml-2">
                                    <input type="submit" name="addGallery" class="btn btn-sm btn-primary">
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