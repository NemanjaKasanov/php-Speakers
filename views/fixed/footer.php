            <footer class="site-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h2 class="footer-heading mb-4">About Us</h2>
                            <p>This is a platform that helps people find professionals in their fields to speak on events or conferences or help speakers find speaking gigs in their respected fields. Using the platform is absolutely free.</p>
                        </div>

                        <div class="col-md-3 ml-auto">
                            <h2 class="footer-heading mb-4">Quick Links</h2>
                            <ul class="list-unstyled">
                                <?php
                                    $query = "SELECT * FROM nav_elements WHERE parent != 0";
                                    $links = executeQuery($query);

                                    foreach($links as $link):
                                ?>
                                    <li><a href="<?= $link->href ?>" class="smoothscroll"><?= $link->name ?></a></li>
                                <?php
                                    endforeach;
                                ?>
                            </ul>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-5">
                            <h2 class="footer-heading mb-4">Follow Us</h2>
                            <a href="https://www.facebook.com/" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                            <a href="https://twitter.com/" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                            <a href="https://www.instagram.com/" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="https://www.linkedin.com/" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- .site-wrap -->

        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.countdown.min.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/aos.js"></script>
        <script src="assets/js/jquery.fancybox.min.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        
        <script src="assets/js/typed.js"></script>
                    <script>
                    var typed = new Typed('.typed-words', {
                    strings: ["Motivational Speakers","Professional Speakers","Business Speakers"],
                    typeSpeed: 80,
                    backSpeed: 80,
                    backDelay: 4000,
                    startDelay: 1000,
                    loop: true,
                    showCursor: true
                    });
                    </script>
        
        <script src="assets/js/main.js"></script>
        <script src="assets/js/checks.js"></script>
        <script src="assets/js/grades.js"></script>
        <script src="assets/js/speakers.js"></script>
    </body>
</html>
