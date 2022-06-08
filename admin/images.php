<?php
	$title = "Images"; 
    include ("inc/header.php");
    ob_start();
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
    $page_name = "Images";
	include ("inc/nav.php"); 
?>
<?php
    include ("inc/notification.php");
    include_once ('classes/Database.php');
    include_once ('classes/Image.php');
    $db = new classes\Database;
    $img = new classes\Image;
    if(isset($_REQUEST['saveHomeBg'])){
       $img->updateHomeBg($_REQUEST);
    }elseif(isset($_REQUEST['upLogo'])){
        $img->updateLogo($_REQUEST);
    }elseif(isset($_REQUEST['upIcon'])){
        $img->updateIcon($_REQUEST);
    }
    
    
    
?>

        <div class="row small-spacing">
            <div class="col-md-12 col-xs-12"><!--Deatils-->
				<div class="row">
					<div class="col-xs-12">
						<div class="box-content card">
                            <h4 class="box-title"><i class="menu-icon fa fa-picture-o"></i> Image</h4>
                            <?php
                                if(isset($img->err)){
                                    ?>
                                    <div class="alert-warning font-weight-bold mess text-center"><?= $img->err; ?></div>
                                    <?php
                                }elseif(isset($img->success)){
                                    ?>
                                    <div class="alert-success font-weight-bold mess text-center"><?= $img->success; ?></div>
                                    <?php
                                }
                            ?>
							<!-- /.box-title -->
							<!-- /.dropdown js__dropdown -->
							<div class="card-content">
								<div class="image-desh row text-center">
                                    <?php
                                      $selectData = "SELECT * FROM images";
                                      $result = $db->select($selectData);
                                      $img_data = $result->fetch_assoc();
                                    ?>
                                    <table class="w-10">
                                        <tr>
                                            <td>
                                                <span>background Image</span>
                                                <img class="" style="width: 20rem;" src="uploades/img_file/<?= $img_data['home_bg']; ?>" alt="Home banner Background">
                                            </td>
                                            <td>
                                                <span>logo Image</span>
                                                <img class="" style="width: 15rem;" src="uploades/img_file/<?= $img_data['logo_img']; ?>" alt="Site Logo">
                                            </td>
                                            <td>
                                                <span>icon Image</span>
                                                <img class="" style="width: 25rem;" src="uploades/img_file/<?= $img_data['fav_icon']; ?>" alt="Fave Icon">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
								<!-- /.row -->
							</div>
							<!-- /.card-content -->
						</div>
						<!-- /.box-content card -->
					</div>
	

					<!-- /.col-md-6 -->
				</div>
				
				<!-- /.row -->
            </div><!--Deatils-->
			<div class="col-xs-12">
				<div class="box-content card white">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h4 class="box-title">Upload your background image</h4>
                        
                        <div class="card-content">
                            <input type="file" id="input-file-now" name="homebg" class="dropify" required/>
                            <input type="hidden" value="<?= $img_data['home_bg']; ?>" name="oldbg">
                            <div class="text-center">
                                <p class="help margin-top-10">Upload your background file.(Must be image file)</p>
                                <button type="submit" name="saveHomeBg" class="btn btn-success btn-sm waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
				</div>
				<!-- /.box-content -->
			</div>
			<div class="col-xs-12">
                <div class="box-content card white">
                    <div class="row">
                        <form action="" method="POST" enctype="multipart/form-data" class="col-md-6">
                            <h4 class="box-title">Upload your logo</h4>
                            <div class="card-content">
                                <input type="file" name="logo" id="input-file-now" class="dropify" required/>
                                <input type="hidden" value="<?= $img_data['logo_img']; ?>" name="oldlogo">
                                <div class="text-center">
                                    <p class="help margin-top-10">Upload your logo (.jpg or .png ) file.</p>
                                    <button type="submit" name="upLogo" class="btn btn-success btn-sm m-auto waves-effect waves-light">Save</button>
                                </div>
                            </div>
                        </form>
                        <form action="" method="POST" enctype="multipart/form-data" class="col-md-6">
                            <h4 class="box-title">Upload your icon</h4>
                            <div class="card-content">
                                <input type="file" name="icon" id="input-file-now" class="dropify" required/>
                                <input type="hidden" value="<?= $img_data['fav_icon']; ?>" name="oldicon">
                                <div class="text-center">
                                    <p class="help margin-top-10">Upload your icon (.ico or .png ) file.</p>
                                    <button type="submit" name="upIcon" class="btn btn-success btn-sm m-auto waves-effect waves-light">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
				<!-- /.box-content -->
			    </div>
           
			<!-- /.col-md-6 col-xs-12 -->
		    </div>
	



<?php

	include ("inc/copyright.php");
	include ("inc/footer.php");
?>