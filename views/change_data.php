<?php
$table = $_GET['table'];
$id = $_GET['id'];

if($_SESSION['userRole'] == 1):
?>

<section class="site-section d-flex justify-content-center flex-wrap" id="about-section">
    <div class="col-12 d-flex justify-content-center">
        <div class="col-lg-6 col-sm-12 border p-3">
            <?php
            if($_GET['table'] == "users"): 
            ?>

                <div class="col-12 text-center">
                    <form action="models/admin/change_user.php" method="POST">
                        <p class="h4 m-3">Change admin status of this user:</p>
                        <div class="radio">
                            <label><input type="radio" name="admin" value="1">Admin</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="admin" checked="checked" value="0">User</label>
                        </div>

                        <p class="h4 m-3">Activate or deactivate account of the user:</p>
                        <div class="radio">
                            <label><input type="radio" name="status" checked="checked" value="1">Activate</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="status" value="0">Deactivate</label>
                        </div>

                        <input type="hidden" name="id" id="id" value="<?= $id ?>"/>
                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                    </form>
                </div>

            <?php 
            endif; 

            if($_GET['table'] == "categories"): 
            ?>

                <div class="col-12 text-center">
                    <p class="h4 m-3">Rename category:</p>
                    <form action="models/admin/change_category.php" method="POST">
                        <input type="text" name="category" id="category"/>

                        <input type="hidden" name="id" id="id" value="<?= $id ?>"/>
                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                    </form>
                </div>

            <?php
            endif;
            
            if($_GET['table'] == "nav_elements"): 
            ?>

                <div class="col-12 text-center">
                    <p class="h4 m-3">Change Navigation Element:</p>
                    <p class="h5 m-3">Fill in all the elements of the form:</p>
                    <form action="models/admin/change_nav_item.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="href" name="href" placeholder="href (link)"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="parent" name="parent" placeholder="Parent (Id number)" maxlength="2"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="level" name="level" placeholder="Level (number)" maxlength="2"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="position" name="position" placeholder="Position (number)" maxlength="2"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="login_status" name="login_status" placeholder="Login Status (number 0, 1, 2)" maxlength="1"/>
                            <label for="login_status">0 for all, 1 for logged in users, 2 for admins</label>
                        </div>

                        <input type="hidden" name="id" id="id" value="<?= $id ?>"/>
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