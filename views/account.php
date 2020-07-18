<?php

if(isset($_SESSION['userStatus']) && $_SESSION['userStatus'] == 1):
    $name = $_SESSION['userName'];
    $lname = $_SESSION['userLName'];
    $email = $_SESSION['userEmail'];
    $user = $_SESSION['userId'];
?>

<section class="site-section d-flex justify-content-center flex-wrap" id="about-section">
    <div class="row col-lg-8 col-sm-12">
        <div class="col-lg-5 col-sm-12 text-left">
            <?php
                if(isset($_SESSION['changes']) && $_SESSION['changes'] == 'yes'):
            ?>
                <p class="h4 text-danger">Changes to your account were applied.</p>
            <?php 
                endif;
                $_SESSION['changes'] = '';

                $queryData = "SELECT ud.description, ud.image, ud.image_sm FROM users AS u INNER JOIN user_data AS ud ON u.id = ud.user_id WHERE u.id=$user";
                $data = executeQuery($queryData);

                $queryCategories = "SELECT c.category FROM (users AS u INNER JOIN user_categories AS uc ON u.id=uc.user_id) INNER JOIN categories AS c ON c.id=uc.category_id WHERE u.id=$user";
                $categories = executeQuery($queryCategories);
            ?>

            <img src="
            <?php 
                if(isset($data[0]->image_sm)) echo 'assets/images/users/'.$data[0]->image_sm; 
                else echo 'assets/images/generic_user.png';
            ?>"
            alt="<?= $name.' '.$lname ?>" class="rounded-circle img-fluid w-50 mb-4"/>

            <h3 class="h4 text-black"><?= $name." ".$lname ?></h3>

            <p>Contact: <?= $email ?></p>
            <?php if(isset($data[0])): ?>
                <p><?= $data[0]->description ?></p>
            <?php endif; 

                if(isset($categories[0]) && count($categories) > 0):
                    echo '<p class="h5">Categories:</p>';
                    echo '<ul class="list-group list-group-flush">';
                    foreach($categories as $el):
                    ?>
                        <li class="list-group-item"><?= $el->category ?></li>
                    <?php
                    endforeach;
                    echo '</ul>';
                endif;
            ?>
            
        </div>

        <div class="col-lg-7 col-sm-12 mt-3">
            <h3 class="mb-4 text-black">Fill this form to register yourself as a speaker or change your settings.</h3>
            <form action="models/account/speaker.php" method="POST" name="speakerForm" enctype="multipart/form-data" onsubmit="return speakerFormCheck()">

                <h5 class="text-black">Choose your profile picture:</h5>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" accept="image/*" id="profilePicture" name="profilePicture" class="btn btn-block btn-primary text-white py-2 px-5"/>
                    </div>
                </div>

                <h5 class="text-black">Tell people about yourself:</h5>
                <div class="form-group row">
                    <div class="col-md-12">
                        <textarea class="form-control" placeholder="About you section" name="aboutYou" id="aboutYou" maxlength="200"></textarea>
                        <p id="aboutYouR" class="text-danger text-center hideThis">Text cannot contain special characters or be empty.</p>
                    </div>
                </div>

                <h5 class="text-black">Select one or more categories:</h5>
                <div class="col-12 mb-5">
                    <div clas="col-12">
                        <?php
                            $query = "SELECT * FROM categories";
                            $categories = executeQuery($query);

                            foreach($categories as $el):
                        ?>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="<?= $el->id ?>" name="category[]" value="<?= $el->id ?>"/>
                            <label class="custom-control-label" for="<?= $el->id ?>"><?= $el->category ?></label>
                        </div>

                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12 mr-auto">
                        <input type="submit" class="btn btn-block btn-primary text-white py-2 px-5" name="btn_speaker" value="Submit"/>
                        <p id="submitR" class="text-danger text-center hideThis">Fill the form correctly to proceed.</p>
                    </div>
                </div>
                
                <?php
                    if(isset($_SESSION['errors'])) {
                        show_errors_array($_SESSION['errors']);
                        $_SESSION['errors'] = [];
                    }
                ?>
            </form>
        </div>
    </div>
</section>

<?php
endif;
?>