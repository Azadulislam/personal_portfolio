<?php
ob_start();
$title = "Home || Azadul Islam";
include("inc/header.php");

?>
<section id="about">
    <div class="container">
        <div class="row abtContent">
            <div class="col-lg-4">
                <div class="about_img">
                    <img src="<?= $dir . $admin['profile_img'] ?>" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="about-text">
                    <h1 class="text-capitalize title">I am <?= $admin['title'] ?> </h1>
                    <p class="text-muted pl-1"><?= $admin['shrt_desc'] ?></p>
                    <div class="social">
                        <a href="<?= $admin['facebook'] ?>" target="_blank"><span class="social-icon"><i class="fab fa-facebook"></i></span></a>
                        <a href="<?= $admin['twitter'] ?>" target="_blank"><span class="social-icon"><i class="fab fa-twitter"></i></span></a>
                        <a href="<?= $admin['linkedin'] ?>" target="_blank"><span class="social-icon"><i class="fab fa-linkedin"></i></span></a>
                        <a href="<?= $admin['youtube'] ?>" target="_blank"><span class="social-icon"><i class="fab fa-youtube-square"></i></span></a>
                        <a href="<?= $admin['behance'] ?>" target="_blank"><span class="social-icon"><i class="fab fa-behance-square"></i></span></a>
                    </div>
                    <div class="aboutBtn">
                        <a class="hireme" href="mailto:<?= $admin['email'] ?>">hire me</a>
                        <a class="dwn-cv" href="<?= $admin['resume'] ?>">download c.v</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->
<!-- skille section strart -->
<section id="skille">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="skille-title text-center">
                    <h1 class="code-icon text-center"><i class="fas fa-code"></i></h1>
                    <h1 class="titleText text-white">my skills</h1>
                </div>
                <div class="skille-con col-sm-7 m-auto text-center">
                    <?php
                    $sel_skille = $db->select("SELECT * FROM `skille`");
                    while ($skille = $sel_skille->fetch_assoc()) {
                    ?>
                        <div class="skillbar">
                            <p class=" text-justify"><?= $skille['skl_name'] ?> <span class=" d-inline-block float-right">20%</span></p>
                            <div class="skldiv">
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $skille['skl_prcnt'] ?>%; height: 10px" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- skille section end -->
<!-- service section strart -->
<section id="service">
    <div class="container">
        <div class="service-content text-center">
            <h1 class="titleText text-dark">My Services</h1>
            <div class="row my-5">
                <?php
                $select_srv = $db->select("SELECT * FROM `services`");
                while ($service = $select_srv->fetch_assoc()) {
                ?>
                    <div class="col-md-4 col-sm-6 my-4">
                        <div class="srvdiv">
                            <span class="d-block"><img src="<?= $dir . $service['image'] ?>" alt="Service icon"></span>
                            <h3 class="srv-title"><?= $service['name'] ?></h3>
                            <p><?= $service['srv_desc'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a href="service" class="btn more-btn text-capitalize">view more</a>
        </div>
    </div>
</section>
<!-- service section end -->
<!-- resume secton strart -->
<section id="resume">
    <div class="container my-5">
        <div class="row">
            <?php
            $sel_rsm = $db->select("SELECT * FROM `resume`");
            $resume = $sel_rsm->fetch_assoc();
            ?>
            <div class="col-md-3 col-sm-6 text-center">
                <h1 class="res-icon"><i class="far fa-smile"></i></h1>
                <h1 class="counter count"><?= $resume['clnt'] ?></h1>
                <p class="text-capitalize">customers</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <h1 class="res-icon"><i class="fas fa-layer-group"></i></h1>
                <h1 class="counter count"><?= $resume['project'] ?></h1>
                <p class="text-capitalize">Projects Completed</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <h1 class="res-icon"><i class="fas fa-star"></i></h1>
                <h1 class="counter count"><?= $resume['review'] ?></h1>
                <p class="text-capitalize">Full Review</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <h1 class="res-icon"><i class="fas fa-sync-alt"></i></h1>
                <h1 class="counter count"><?= $resume['runing_pro'] ?></h1>
                <p class="text-capitalize">Running Project</p>
            </div>
        </div>
    </div>
</section>
<!-- portfolio section strart -->
<section id="portfolio">
    <div class="container">
        <div class="portfolio-con text-center">
            <h1 class="portfolio-title">my portfolio</h1>
            <div class="row my-3">
                <?php
                $sel_prt = $db->select("SELECT * FROM `portfolio` LIMIT 6");
                while ($portfolio = $sel_prt->fetch_assoc()) {
                ?>
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="port-image" data-image="<?= $dir . $portfolio['port_img'] ?>" title="<?= $portfolio['title'] ?>" data-title="<?= $portfolio['title'] ?>" desc="<?= $portfolio['port_desc'] ?>" data-desc="<?= $portfolio['title'] ?>">
                            <img src="<?= $dir . $portfolio['port_img'] ?>" class="img-fluid portImg" alt="">
                        </div>
                    </div>
                <?php } ?>
                <!-- image Modal -->
                <div class="modal fade" id="imgmodalTwo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="modalclose ml-auto" data-dismiss="modal" aria-label="Close">
                                    <i class="far fa-window-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img class="modal-port-img img-fluid" alt="">
                            </div>
                            <div class="modal-footer justify-content-center">
                                <p class="prot-image-footer"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="portfolio" class="btn more-btn text-capitalize mt-4">view more</a>
        </div>
    </div>
</section>
<!-- portfolio section end -->
<!-- gallery secton start -->
<section id="gallery">
    <div class="container">
        <div class="gall-con  text-center">
            <h1 class="gal-title">my gallery</h1>
            <div class="row my-4">
                <?php
                $sel_gal = $db->select("SELECT * FROM `gallery` WHERE `status`='1' LIMIT 6");
                while ($gallery = $sel_gal->fetch_assoc()) {
                ?>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="gall-img">
                            <img src="<?= $dir . $gallery['gal_img'] ?>" class="img-fluid" alt="My image">
                        </div>
                    </div>
                <?php } ?>

                <!-- ======modall imgae==== -->
                <!-- Modal -->
                <div class="modal fade" id="imgmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content bg-transparent border-0">
                            <button type="button" class="modalclose ml-auto" data-dismiss="modal" aria-label="Close">
                                <i class="far fa-window-close"></i>
                            </button>
                            <img id="show-img" src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <a href="gallery" class="btn more-btn text-capitalize mt-4">view more</a>
        </div>
    </div>
</section>
<!-- gallery secton end -->
<!-- testimonial secton start -->
<section id="testimonial">
    <div class="container">
        <div class="tstmn-con text-center">
            <h1 class="tst-icon"><i class="far fa-handshake"></i></h1>
            <h1 class="test-title">my testimonial</h1>
            <div class="row">
                <div class="col-md-12 py-3">
                    <!-- owl carousel slider -->
                    <!-- Set up your HTML -->
                    <div class="owl-carousel 1st-slid">
                        <?php
                        $sel_test = $db->select("SELECT * FROM `review`");
                        while ($test = $sel_test->fetch_assoc()) {
                        ?>
                            <div class="slid-content text-white">
                                <div class="test-image"><img class="rounded-circle" src="<?= $dir . $test['clnt_img'] ?>" alt=""></div>
                                <div class="tst-comm my-4">
                                    <p class="text-muted"><?= $test['clnt_cmnt'] ?></p>
                                </div>
                                <p class="tst-name"><?= $test['clnt_name'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <button class="btn prvone"><i class="fas fa-arrow-left"></i></button>
                    <button class="btn nxtone"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial secton end -->
<!-- blog secton start -->
<section id="blog">
    <div class="container">
        <div class="blog-con text-center">
            <h1 class="blogTitle">my blog</h1>
            <div class="row">
                <div class="col-md-12 py-3">
                    <!-- owl carousel slider -->
                    <!-- Set up your HTML -->
                    <div class="owl-carousel 2nd-slid">
                        <?php
                        $sel_blg = $db->select("SELECT blog.*, category.name FROM blog INNER JOIN category ON blog.category = category.id ORDER BY id DESC");
                        while ($blog = $sel_blg->fetch_assoc()) {
                        ?>
                            <div class="slid-content">
                                <div class="blog-div">
                                    <div class="blog-img"><a href="post.php?blog=<?= $blog['slg'] ?>&id=<?= $blog['id'] ?>"><img class="img-fluid" src="<?= $dir . $blog['image'] ?>" alt="">
                                            <div class="img-title"><?= $blog['name'] ?></div>
                                        </a></div>
                                    <div class="blog-title my-4"><a href="#">
                                            <h4><?= $blog['title'] ?></h4>
                                        </a></div>
                                    <div class="blog-div-foot row mb-3">
                                        <div class="col-md-6"> <a class="btn bolg-post-btn text-muted text-capitalize" href="post?blog=<?= $blog['slg'] ?>&id=<?= $blog['id'] ?>">read more</a></div>
                                        <div class="col-md-6"> <a class="btn bolg-post-btn text-muted text-capitalize" href="#">by: <?= $blog['user'] ?></a></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <button class="btn prvtwo"><i class="fas fa-arrow-left"></i></button>
                    <button class="btn nxttwo"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog secton end -->
<!-- contact secton start -->
<section id="contact">
    <div class="container">
        <div class="contact-con text-center">
            <h1 class="conTitle text-white">get in touch</h1>
            <?= isset($_REQUEST['mailed']) ? '<div class="alert alert-success text-center">We have recived your email. We will get back to you soon. Thanks!</div>' : '' ?>
            <div class="row">
                <div class="col-md-12 my-5">
                    <form class="cotnact-form" action="mail.php" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input id="" class="form-control form-input" placeholder="Name *" type="text" name="name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input id="" class="form-control form-input" placeholder="Email *" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input id="" class="form-control form-input" placeholder="Subject" type="text" name="subject" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-input" name="mess" id="" cols="30" rows="10" placeholder="Message *" required></textarea>
                        </div>
                        <button class="btn cont-btn ml-0 mb-5" name="sendMess" type="submint">Send</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="cont-add">
                        <h5 class="">Phone</h5>
                        <p><?= $admin['phn'] ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cont-add">
                        <h5 class="">Email</h5>
                        <p><?= $admin['email'] ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cont-add">
                        <h5 class="">Address</h5>
                        <p><?= $admin['address'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact secton ecn -->
<?php
include("inc/footer.php")
?>