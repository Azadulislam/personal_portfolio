<?php
	$title = "Edit Blog"; 
	include ("inc/header.php");
?>
<?php
	include ("inc/main_menu.php");
?>
<?php
    $page_name = "Edit Blog";
	include ("inc/nav.php");
?>
<?php
    include ("inc/notification.php");
    include_once ('classes/Blog.php');
	$db = new classes\Database();
	$img_dir = "uploades/img_file/";
	$blg = new classes\Blog();
	if(isset($_POST['updateBlog'])){
		$blg->updateBlog($_POST);
    }
    
    if(isset($_REQUEST['blg_id'])){
        $id = $_REQUEST['blg_id'];
    }
?>
        <div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card white">
                    <h4 class="box-title">Edit blog post</h4>
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
                            $sel_blog = $db->select("SELECT * FROM `blog` WHERE `id`='$id'");
                            $blog = $sel_blog->fetch_assoc();
						?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-content">
                            <ul class="list-unstyled">
                                <li class="form-group"><input type="text" class="form-control" name="blog_title" value="<?= $blog['title'] ?>" placeholder="Enter Blog Tile"></li>
                                <li class="form-group">
                                    <input type="file" id="" name="blog_image" class="form-control"/>
                                    <input type="hidden" id="" name="old_blog_image" value="<?= $blog['image'] ?>"/>
                                    <input type="hidden" id="" name="id" value="<?= $blog['id'] ?>"/>
                                </li>
                                <li class="form-group">
                                    <select name="category">
                                        <option value="">Select Category</option>
                                        <?php
                                            $sel_cat = $db->select("SELECT * FROM `category`");
                                            while($category = $sel_cat->fetch_assoc()){
                                        ?>
                                                <option value="<?= $category['id']?>" <?= $category['id']==$blog['category'] ? 'selected':'' ?> > <?= $category['name']?></option>
                                        <?php } ;?>
                                    </select>
                                </li>
                                <li>
                                    <textarea id="tinymce" name="blog_desc" placeholder="Type your description">
                                        <?= $blog['blg_dsc'] ?>
                                    </textarea>
                                </li>
                                <li class="text-center"><p class="help margin-top-10">Upload your Blog Image.</p></li>
                                <li></li>
                                <li class="form-group text-center"><input type="submit" class="btn btn-primary" name="updateBlog" value="Update"></li>
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