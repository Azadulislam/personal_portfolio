<?php
    include ("inc/header_one.php");
?>
    <header id="header" style="background-image:url('<?= $dir.$img['home_bg'] ?>')">
        <section id="homeBan">
            <div class="container">
                <div class="home rowpt-5">
                    <div class="title col-md-12 my-5">
                        <h1 class="titleText text-center text-white"><?= $admin['title'] ?></h1>
                    </div>
                    <section class="cd-intro">
                        <h1 class="cd-headline clip is-full-width">
                            <span class="font-weight-normal">I Am</span>
                            <span class="cd-words-wrapper">
                                <b class="is-visible">Web Developer</b>
                                <b>Graphics Designer</b>
                                <b><?= $admin['title'] ?></b>
                            </span>
                        </h1>
                    </section>
                </div>
                <a href="#about" class="downBtn text-white text-center mb-3">
                    <span class=""><i class="fas fa-arrow-down"></i></span>
                </a>
            </div>
        </section>
    </header>
    <!-- header section end -->
    