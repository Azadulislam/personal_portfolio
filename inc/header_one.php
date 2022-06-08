<?php
    require ('main_head.php');

    $pag = explode('/', $_SERVER['PHP_SELF']);
    $page = end($pag);
    $dir = "admin/uploades/img_file/";
    
?>
<!-- ================Nav start================= -->
<section id="fixdNav" class="fixed-top <?= $page=='index.php'?'':''?> <?= $page=='contact.php'?'':''?> <?= $page=='service.php'?'bg-dark':''?> <?= $page=='review.php'?'bg-dark':''?> <?= $page=='portfolio.php'?'bg-dark':''?> <?= $page=='gallery.php'?'bg-dark':''?> <?= $page=='about.php'?'bg-dark':''?> <?= $page=='post.php'?'bg-dark':''?> <?= $page=='blog.php'?'bg-dark':''?> <?= $page=='thank-you.php'?'bg-dark':''?>">
    <div class="container-fluid">
        <nav id="mainnav" class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand py-0" href="#"><img width="110px" class="img-fluid" src="<?= $dir.$img['logo_img'] ?>" alt="logo"></a>
            <button class="navbar-btn " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link text-capitalize <?= $page=='index.php'?'activelink':''?>" href="index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize <?= $page=='service.php'?'activelink':''?>" href="service">services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize <?= $page=='portfolio.php'?'activelink':''?>" href="portfolio">portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize <?= $page=='review.php'?'activelink':''?>" href="review">review</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize <?= $page=='blog.php'?'activelink':''?>" href="blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize <?= $page=='gallery.php'?'activelink':''?>" href="gallery">gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize <?= $page=='about.php'?'activelink':''?>" href="about">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize <?= $page=='contact.php'?'activelink':''?>" href="contact">contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="#" target="_blank">file share</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
<!-- ================Nav end================= -->