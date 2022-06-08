<?php
    $title = "Admin Register";
    include ('inc/header_one.php');
    if(isset($_REQUEST['addAdmin'])){
        $addAdmin = $admin->addAdmin($_REQUEST);
        if($admin->insert){
            $_SESSION['reg'] = "Registerd";
            header ("location:login");
        }
    }
?>
    <form action="#" method="POST" class="frm-single">
		<div class="inside">
			<div class="title">Admin Register</div>
			<!-- /.title -->
            <div class="frm-title">Welcome</div>
            <a href="#" class="avatar"><img src="<?= $dir.$adm['profile_img'] ?>"></a>
                <?php
                    if(isset($admin->err)){
                        ?>
                        <div class="alert alert-danger  font-weight-bold mess text-center"><?= $admin->err; ?></div>
                        <?php
                    }elseif(isset($admin->success)){
                        ?>
                        <div class="alert alert-success font-weight-bold mess text-center"><?= $admin->success; ?></div>
                        <?php
                    }
                ?>
			<!-- /.frm-title -->
			<div class="frm-input"><input type="text" placeholder="Type user name" name="usr_name" class="frm-inp"><i class="fa fa-envelope frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="number" placeholder="Type secure pin" name="scr_pin" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="number" placeholder="Type new pin" name="pin" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<button type="submit" name="addAdmin" class="frm-submit">Register<i class="fa fa-arrow-circle-right"></i></button>
			
			<!-- /.row -->
			<a href="login.php" class="a-link"><i class="fa fa-sign-in"></i>Already have account? Login.</a>
			<div class="frm-footer text-center">Web Pro Azad © <?= date("Y") ?>.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>


<?php
    include ('inc/footer_one.php');
?>