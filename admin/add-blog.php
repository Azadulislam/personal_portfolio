<?php
	$title = "Add Blog"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
    $page_name = "Add Blog Post";
	include ("inc/nav.php");
?>
<?php
    include ("inc/notification.php");
    include_once ('classes/Blog.php');
	$db = new classes\Database();
	$blg = new classes\Blog();
	if(isset($_POST['addBlog'])){
		$blg->insertBlog($_POST);
	}
?>
        <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
                    <h4 class="box-title">Add a new Blog</h4>
                        <?php
							if(isset($blg->err)){
								?>
								<div class="alert alert-warning font-weight-bold mess text-center"><?= $blg->err; ?></div>
								<?php
							}elseif(isset($blg->success)){
								?>
								<div class="alert alert-success font-weight-bold mess text-center"><?= $blg->success; ?></div>
								<?php
							}
						?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-content">
                            <ul class="list-unstyled">
                                <li class="form-group"><input type="text" class="form-control" name="blog_title" id="newSkill" placeholder="Enter Blog Tile"></li>
                                <li class="form-group">
                                    <input type="file" id="" name="blog_image" class="form-control" />
                                </li>
                                <li class="form-group">
                                    <select name="category">
                                        <?php
                                            $sel_cat = $db->select("SELECT * FROM `category`");
                                            while($category = $sel_cat->fetch_assoc()){
                                        ?>
                                                <option value="<?= $category['id']?>"><?= $category['name']?></option>
                                        <?php } ;?>
                                    </select>
                                </li>
                                <li>
                                    <textarea id="tinymce" name="blog_desc" placeholder="Type your description">
                                    </textarea>
                                </li>
                                <li class="text-center"><p class="help margin-top-10">Upload your Blog Image.</p></li>
                                <li></li>
                                <li class="form-group text-center"><input type="submit" class="btn btn-primary" name="addBlog" id="addBlog" value="Save"></li>
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