<?php
	$admins = $db->select("SELECT * FROM `administrator`");
	$adm = $admins->fetch_assoc();
?>

<div class="main-menu">
	<header class="header">
		<a href="index.html" class="logo"><?= $adm['web_name'] ?></a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="profile" class="avatar"><img src="<?= $img_dir.$adm['profile_img'] ?>" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="profile"><?= $adm['fname'].' '.$adm['lname'] ?></a></h5>
			<h5 class="position"><?= $adm['position'] ?></h5>
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">
		<?php
			$pge = explode("/",$_SERVER['PHP_SELF']);
			$page = end($pge);
		?>
		<div class="navigation">
			<h5 class="title">Navigation</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li class="<?= $page == 'index.php'? 'current':''?>">
					<a class="waves-effect" href="index"><i class="menu-icon fa fa-home"></i><span>Home</span></a>
				</li>
				<li class="<?= $page == 'profile.php'? 'current':''?>">
					<a class="waves-effect" href="profile"><i class="menu-icon fa fa-user"></i><span>Profile</span></a>
				</li>
				<li class="<?= $page == 'about.php'? 'current':''?>">
					<a class="waves-effect" href="about"><i class="menu-icon fa fa-info-circle"></i><span>About</span></a>
				</li>
				<li class="<?= $page == 'images.php'? 'current':''?>">
					<a class="waves-effect" href="images"><i class="menu-icon fa fa-picture-o"></i><span>Images</span></a>
				</li>
				<li class="<?= $page == 'skille.php'? 'current':''?>">
					<a class="waves-effect" href="skille"><i class="menu-icon fa fa-key"></i><span>Skill</span></a>
				</li>
				<li class="<?= $page == 'works.php'? 'current':''?>">
					<a class="waves-effect" href="works"><i class="menu-icon fa fa-code"></i><span>Work</span></a>
				</li>
				<li class="<?= $page == 'services.php'? 'current':''?>">
					<a class="waves-effect" href="services"><i class="menu-icon fa fa-headphones"></i><span>Services</span></a>
				</li>
				<li class="<?= $page == 'portfolio.php'? 'current':''?>">
					<a class="waves-effect" href="portfolio"><i class="menu-icon fa fa-paragraph"></i><span>Portfolio</span></a>
				</li>
				<li class="<?= $page == 'resume.php'? 'current':''?>">
					<a class="waves-effect" href="resume"><i class="menu-icon fa fa-clipboard"></i><span>Short Resume</span></a>
				</li>
				<li class="<?= $page == 'category.php'? 'current':''?>">
					<a class="waves-effect" href="category"><i class="menu-icon fa fa-caret-up"></i><span>Category</span></a>
				</li>
				<li class="<?= $page == 'add-blog.php'? 'current':''?> <?= $page == 'view-blog.php'? 'current':''?> <?= $page == 'edit_blg.php'? 'current':''?>">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-rss"></i><span>Blog</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li class="<?= $page == 'add-blog.php'? 'current':''?>"><a href="add-blog">Add blog</a></li>
						<li class="<?= $page == 'view-blog.php'? 'current':''?>"><a href="view-blog">View Blog</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li class="<?= $page == 'add-gallery.php'? 'current':''?> <?= $page == 'view-gallery.php'? 'current':''?> <?= $page == 'edit_gallery.php'? 'current':''?>">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-adn"></i><span>Gallery</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li class="<?= $page == 'add-gallery.php'? 'current':''?>"><a href="add-gallery">Add</a></li>
						<li class="<?= $page == 'view-gallery.php'? 'current':''?>"><a href="view-gallery">View</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				
				
			</ul>
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->
