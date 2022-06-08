<?php
    include_once ('classes/Admin.php');
    $title = "Admin Login";
    include ('inc/header_one.php');
    if(isset($_SESSION['user'])){
        header('location:index');
    }else{

    if(isset($_POST['login'])){
        $login = $admin->login($_REQUEST);
        if($login == true){
            header('location:index');
        }
    }
?>

        <form action="" method="POST" class="frm-single">
            <div class="inside">
                <div class="title"><strong>Admin Login</strong></div>
                <!-- /.title -->
                <div class="frm-title">Welcome back</div>
                <a href="#" class="avatar"><img src="<?= $dir.$adm['profile_img'] ?>"></a>
                <?php
						if(isset($_SESSION['reg'])){
							if($_SESSION['reg']=='Registerd'){
								?>
								<div class="alert alert-success font-weight-bold mess text-center">Register succssefull login again!</div>
								<?php
								session_unset();
                            }
						}
						if(isset($admin->err)){
                            ?>
                            <div class="alert alert-warning font-weight-bold mess text-center"><?= $admin->err ?></div>
                            <?php
						}
					?>
                <p class="text-center">Enter your Pin to access the admin.</p>
                <div class="frm-input"><input type="text" placeholder="Enter your pin" class="frm-inp" name="pin" autocomplete="off"><i class="fa fa-lock frm-ico"></i></div>
                <!-- /.clearfix -->
                <button type="submit" class="frm-submit" name="login">Login<i class="fa fa-arrow-circle-right"></i></button>
                
                <!-- /.row -->
                <a href="register.php" class="a-link"><i class="fa fa-sign-in"></i>Go to register page</a>
                <div class="frm-footer text-center">Web Pro Azad © <?= date("Y") ?>.</div>
                <!-- /.footer -->
            </div>
            <!-- .inside -->
        </form>
        <!-- /.frm-single -->

<?php
    }
    include ('inc/footer_one.php');
?>