<?php

?>

<section class="site-section d-flex justify-content-center" id="about-section">
    <div class="col-lg-10 col-sm-12 d-flex flex-wrap">
        <div class="col-lg-3 col-sm-12 border-right">

            <!-- SEARCH, SORTING AND FILTERING -->

            <div class="col-12">
                <form class="col-12" action="#" method="POST">
                    <div class="col-12 mb-3 mt-3">
                        <!-- SEARCH -->
                        <div class="md-form active-cyan active-cyan-2 mb-3">
                            <input class="form-control col-12" type="text" placeholder="Search by name" aria-label="Search" id="search" name="search"/>
                        </div>
                    </div>

                    <div class="col-12 mb-3 mt-4">
                        <!-- STARS FILTERS -->
                        <p>Filter by stars rated:</p>
                        <div class="form-check">
                            <input class="form-check-input cbxClass starCbx" type="checkbox" id="starCbx1" name="starCbx1" value="5"/>
                            <label class="form-check-label" for="starCbx1">5 STARS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input cbxClass starCbx" type="checkbox" id="starCbx2" name="starCbx2" value="4"/>
                            <label class="form-check-label" for="starCbx2">4 STARS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input cbxClass starCbx" type="checkbox" id="starCbx3" name="starCbx3" value="3"/>
                            <label class="form-check-label" for="starCbx3">3 STARS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input cbxClass starCbx" type="checkbox" id="starCbx4" name="starCbx4" value="2"/>
                            <label class="form-check-label" for="starCbx4">2 STARS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input cbxClass starCbx" type="checkbox" id="starCbx5" name="starCbx5" value="1"/>
                            <label class="form-check-label" for="starCbx5">1 STAR</label>
                        </div>
                    </div>

                    <div class="col-12 mb-3 mt-4">
                        <!-- CATEGORY FILTERS -->
                        <p>Filter by expertise:</p>
                        <?php
                            $query_categories = "SELECT * FROM categories";
                            $categories = executeQuery($query_categories);

                            foreach($categories as $ctg):
                        ?>

                        <div class="form-check">
                            <input class="form-check-input categCbx cbxClass" type="checkbox" id="<?= $ctg->id ?>" name="<?= $ctg->id ?>"  value="<?= $ctg->id ?>"/>
                            <label class="form-check-label" for="<?= $ctg->id ?>"><?= $ctg->category ?></label>
                        </div>

                        <?php endforeach; ?>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-9 col-sm-12 pt-5" id="speakersDisplay">

            <!-- DISPLAY SPEAKERS -->
            
            <!-- <div class="col-12 d-flex flex-wrap border-bottom mb-5 pb-3">
                <div class="col-lg-4 col-sm-12 text-center">
                    <a href="index.php?page=speaker&id=11" class="h3">
                        <img src="assets/images/users/nemanja.kasanov.79.18@ict.edu.rs__sm__user123.png" alt="asdasdasd" class="rounded-circle img-fluid w-50 mb-4"/>
                    </a>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="col-12">
                        <a href="index.php?page=speaker&id=11" class="h3">Nemanja Kasanov</a>
                        <p>This is a place for the description of a speaker that you selected.</p>
                    </div>
                    <div class="col-12 d-flex flex-wrap">
                        <div class="col-lg-10 col-sm-12">
                            <ul>
                                <li>Motivation</li>
                                <li>Programming</li>
                                <li>Writting/Literature</li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-sm-12 text-center">
                            <p><i class="fa fa-star" aria-hidden="true"></i><br/>4</p>
                        </div>
                    </div>
                </div>
            </div> -->

        </div> 
    </div>
</section>