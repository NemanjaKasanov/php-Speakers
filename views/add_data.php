<?php
$table = $_GET['table'];

if($_SESSION['userRole'] == 1):
?>

<section class="site-section d-flex justify-content-center flex-wrap" id="about-section">
    <div class="col-12 d-flex justify-content-center">
        <div class="col-lg-6 col-sm-12 border p-3">
            <?php
            if($_GET['table'] == "categories"): 
            ?>

                <div class="col-12 text-center">
                    <p class="h4 m-3">Add category:</p>
                    <form action="models/admin/add_category.php" method="POST">
                        <input type="text" name="category" id="category"/>

                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                    </form>
                </div>

            <?php
            endif;

            if($_GET['table'] == "big_images"):
            ?>

                <div class="col-12 text-center">
                    <p class="h4 m-3">Add Big Image on Entry:</p>
                    <p class="h5 m-3">Only the last three added will be displayed.</p>
                    <p class="h5 m-3">Image must be under 2MB.</p>
                    <form action="models/admin/add_big_image.php" method="POST" enctype="multipart/form-data" class="mt-5">
                        <input type="file" name="image" id="image" accept="image/*"/>
                        <input type="text" name="description" id="description" placeholder="Description"/>

                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                    </form>
                </div>

            <?php
            endif;

            if($_GET['table'] == "event"):
            ?>

                <div class="col-12 text-center">
                    <p class="h4 m-3">Add Event:</p>
                    <p class="h5 m-3">Only the last four added will be displayed.</p>
                    <form action="models/admin/add_event.php" method="POST" class="mt-5">
                        <input type="text" name="event_name" id="event_name" placeholder="Event Name"/>
                        <input type="text" name="event_description" id="event_description" placeholder="Event Description"/>

                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                    </form>
                </div>

            <?php
            endif;
            ?>
        </div>
    </div>
</section>

<?php
endif;
?>