<section class="site-blocks-cover overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 align-self-center">
                <div class="row">
                    <div class="col-lg-11">
                        <h1>We are <span class="typed-words"></span></h1>
                        <p>Contact and book speakers for your events. Build networks. <a href="index.php?page=speakers">Explore.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<section>
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin-top: -7%;">
                <div class="slide-one-item home-slider owl-carousel">
                    <?php
                        $query = "SELECT * FROM images_entry ORDER BY id DESC LIMIT 3";
                        $array = executeQuery($query);
                        foreach($array as $el):
                    ?>

                    <img src="<?= $el->src ?>" alt="<?= $el->alt ?>" class="img-fluid img"/>

                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>