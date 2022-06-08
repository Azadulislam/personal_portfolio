    <script src="js\jquery.min.js" ></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js\popper.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
    <!--=============== Fontawesome js======================--->
    <!-- conunter script -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js\jquery.counterup.min.js"></script>
    <!-- owl carousel js -->
    <script src="js\owl.carousel.min.js"></script>
    <!-- common script -->
    <script src="js/script.js"></script>
    <script src="js/main.js"></script>
    <!-- owl carousel script -->
    <script>
        $(document).ready(function () {
            
            var owlone = $('.1st-slid');
            owlone.owlCarousel({
                items:1,
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
            });
            $('.nxtone').click(function() {
                owlone.trigger('next.owl.carousel');
            })
            // Go to the previous item
            $('.prvone').click(function() {
                owlone.trigger('prev.owl.carousel', [300]);
            });

            var owltwo = $('.2nd-slid');
            owltwo.owlCarousel({
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:1,
                    },
                    768:{
                        items:2,
                    },
                    992:{
                        items:3,
                    }
                }
            });
            $('.nxttwo').click(function() {
                owltwo.trigger('next.owl.carousel');
            })
            // Go to the previous item
            $('.prvtwo').click(function() {
                owltwo.trigger('prev.owl.carousel', [300]);
            })
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
            
        });
    </script>
  </body>
</html>