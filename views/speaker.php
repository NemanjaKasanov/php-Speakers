<?php
    if(isset($_GET['id']) && $_GET['id'] != ''):
    
    $user = $_GET['id'];

    $queryData = "SELECT u.name, u.last_name, u.email, ud.description, ud.image, ud.image_sm FROM users AS u INNER JOIN user_data AS ud ON u.id = ud.user_id WHERE u.id=$user";
    $queryCategories = "SELECT c.category FROM (users AS u INNER JOIN user_categories AS uc ON u.id=uc.user_id) INNER JOIN categories AS c ON c.id=uc.category_id WHERE u.id=$user";

    $data = executeQuery($queryData);
    $categories = executeQuery($queryCategories);

    if(count($data) != 0):
?>

<section class="site-section" id="about-section">
    <div class="col-12 d-flex justify-content-center">
        <div class="col-lg-9 col-md-12 d-flex flex-wrap mt-4 mb-5 d-flex justify-content-center">
            <div class="col-lg-6 col-sm-12">
                <div class="col-12">
                    <div class="col-12 text-center">
                        <img src="
                            <?php 
                                if(isset($data[0]->image_sm)) echo 'assets/images/users/'.$data[0]->image_sm; 
                                else echo 'assets/images/generic_user.png';
                            ?>"
                        alt="<?= $data[0]->name.' '.$data[0]->last_name ?>" class="rounded-circle img-fluid w-50 mb-4"/>
                    </div>
                    <div class="col-12 text-center">
                        <p class="h2 mb-5"><?= $data[0]->name.' '.$data[0]->last_name ?></p>
                        <?php
                            if(isset($data[0]->description)):
                            ?>
                                <p><span class="font-weight-bold">About the speaker:</span><br/><?= $data[0]->description ?></p>
                            <?php
                            endif;

                            if(isset($data[0]->email)):
                            ?>
                                <p><span class="font-weight-bold">Contact email:</span><br/><?= $data[0]->email ?></p>
                            <?php
                            endif;

                        ?>
                    </div> 
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="col-12 text-center">
                <?php
                    if(isset($categories[0]) && count($categories) > 0):
                        echo '<p class="h5 font-weight-bold">Areas of knowledge:</p>';
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
                <div class="col-12 text-center mt-4 text-center">
                    <p class="font-weight-bold">Average grade:</p>
                    <span class="h3 text-info">
                        <?php
                            $queryGrades = "SELECT AVG(grade) AS grade FROM user_grades WHERE user_id=$user";
                            $grades = executeQuery($queryGrades);
                            $grade = $grades[0]->grade;
                            $grade = round($grade);

                            for($i = 0; $i < 5; $i++){
                                if($i < $grade){
                                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                                }
                                else{
                                    echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                                }
                            }

                            $queryTotal = "SELECT COUNT(user_id) AS total FROM user_grades WHERE user_id=".$user;
                            $total = executeQuery($queryTotal);
                        ?>
                    </span>
                    <p>Total grades: <?= $total[0]->total ?></p>
                </div>
                <?php if(isset($_SESSION['userStatus']) && $user != $_SESSION['userId']): ?>
                <div class="col-12 text-center mt-5">
                    <input type="hidden" value="<?= $_SESSION['userId'] ?>" name="user_id" id="user_id"/> 
                    <input type="hidden" value="<?= $user ?>" name="speaker_id" id="speaker_id"/> 
                    <p><span class="font-weight-bold">Grade the speaker:</span><br>To help our community be as objective and honest as possible.</p>
                    <span class="h3">
                        <button class="starButton" value="1"><i class="fa fa-star grade" aria-hidden="true"></i></button>
                        <button class="starButton" value="2"><i class="fa fa-star grade" aria-hidden="true"></i></button>
                        <button class="starButton" value="3"><i class="fa fa-star grade" aria-hidden="true"></i></button>
                        <button class="starButton" value="4"><i class="fa fa-star grade" aria-hidden="true"></i></button>
                        <button class="starButton" value="5"><i class="fa fa-star grade" aria-hidden="true"></i></button>
                    </span>
                    <div class="col-12 text-center mt-3" id="gradedText">
                        <p><span class="text-info">Thank you for grading and supporting the community!</span><br/>If you ever change your mind you can change the grade here.</p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
    endif;

    if(count($data) == 0):
        echo '<section class="site-section" id="about-section"><p class="text-center h2 mt-5 mb-5">This user is not registered as a speaker.</p></div>';
    endif;

    endif;
?>