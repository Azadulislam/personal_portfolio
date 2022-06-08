<?php
    ob_start();
	$title = "Edit Profile"; 
    include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
    $page_name = "Edit Profile";
	include ("inc/nav.php");
?>
<?php
    include ("inc/notification.php");
    include_once ("classes/Profile.php");
    $pro = new classes\Profile;
    if(isset($_REQUEST['savePro'])){
       $pro->updateProfle($_REQUEST);
    }
?>
        <div class="row small-spacing">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="col-xs-12">
                    <div class="box-content card white">
                        <h4 class="box-title">Section 01</h4>
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
                        <?php
                            $selectData = "SELECT * FROM administrator";
                            $result = $db->select($selectData);
                            $profile = $result->fetch_assoc();
                        ?>
                        <div class="card-content">
                            <ul class="list-inline">
                                <input type="hidden" value="<?= $profile['id']; ?>" name="id">
                                <li class="form-group"><input class="form-control" placeholder="Firs name" type="text" value="<?= $profile['fname']; ?>" name="fname"></li>
                                <li class="form-group"><input class="form-control" placeholder="last name" type="text" value="<?= $profile['lname']; ?>" name="lname"></li>
                                <li class="form-group"><input class="form-control" placeholder="Your title here" type="text" value="<?= $profile['title']; ?>" name="title"></li>
                                <li class="form-group"><input class="form-control" placeholder="Your title here" type="text" value="<?= $profile['position']; ?>" name="pos"></li>
                                <li class="form-group"><input class="form-control" placeholder="Your email" type="text" value="<?= $profile['email']; ?>" name="email"></li>
                                <li class="form-group"><input class="form-control" placeholder="Your Address" type="text" value="<?= $profile['address']; ?>" name="address"></li>
                                <li class="form-group"><input class="form-control" placeholder="Type what you like" type="text" value="<?= $profile['interest']; ?>" name="interest"></li>
                                <li class="form-group"><input class="form-control" placeholder="Your website" type="text" value="<?= $profile['website']; ?>" name="website"></li>
                                <li class="form-group"><input class="form-control" placeholder="Enter your website name" type="text" value="<?= $profile['web_name']; ?>" name="wb_nm"></li>
                                <li class="form-group"><input class="form-control" placeholder="Enter your linkedin account" type="text" value="<?= $profile['linkedin']; ?>" name="linkedin"></li>
                                <li class="form-group"><input class="form-control" placeholder="Enter your youtube account" type="text" value="<?= $profile['youtube']; ?>" name="youtube"></li>
                                <li class="form-group"><input class="form-control" placeholder="Enter your behance account" type="text" value="<?= $profile['behance']; ?>" name="behance"></li>
                                <li class="form-group"><input class="form-control" placeholder="Enter your resrme" type="text" value="<?= $profile['resume']; ?>" name="resume"></li>
                                <li class="form-group"><input class="form-control" placeholder="Enter your skype account" type="text" value="<?= $profile['skype']; ?>" name="skype"></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box-content -->
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="box-content card white">
                        <h4 class="box-title">Section 02</h4>
                        <!-- /.box-title -->
                        <div class="card-content">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Birthday</label>
                                    <div class="col-sm-8">
                                            <input type="text" class="form-control" name="bDate" placeholder="mm/dd/yyyy" value="<?= $profile['birthday'] ?>" id="datepicker">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inp-type-2" class="col-sm-4 control-label">Phone number</label>
                                    <div class="col-sm-8">
                                        <input type="tes" class="form-control" id="inp-type-2" name="phnNum" value="<?= $profile['phn'] ?>" placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inp-type-3" class="col-sm-4 control-label">Facebook</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inp-type-3" name="facebook" value="<?= $profile['facebook'] ?>" placeholder="Facebook Link" value="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inp-type-4" class="col-sm-4 control-label">Twitter</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inp-type-4" name="twitter" value="<?= $profile['twitter'] ?>" placeholder="Twitter Link">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-content -->
                    </div>
                    <!-- /.box-content card white -->
                </div>
                <div class="col-lg-6 col-xs-12">
                <div class="box-content card white">
                        <h4 class="box-title">Section 03</h4>
                        <div class="card-content">
                            <input type="file" name="pro_img" id="input-file-now" class="dropify"/>
                            <input type="hidden" value="<?= $profile['profile_img']; ?>" name="old_img">
                            <p class="text-center margin-top-10">Upload your photo</p>
                        </div>
                    </div>
                </div>
                <div class="text-center col-sm-12">
                    <input type="submit" class="btn btn-primary" name="savePro" value="Save">
                </div>
            </form>
        </div>
<?php

	include ("inc/copyright.php");
	include ("inc/footer.php");
?>