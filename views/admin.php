<?php
if($_SESSION['userRole'] == 1):
require_once "models/admin/users_data.php";
?>

<section class="site-section d-flex justify-content-center flex-wrap" id="about-section">
    <div class="col-12 mt-5 mb-5">
        <div class="col-12 d-flex flex-wrap">
            <div class="col-lg-4 col-md-12 p-5">
                <p class="h5">Page entries last 24 hours:</p>
                <?php

                foreach($page_entries as $el):
                ?>

                    <p class="h6"><?= $el[1] ?> ----- <?= $el[0] ?></p>

                <?php
                endforeach;
                ?>
            </div>
            <div class="col-lg-4 col-md-12 p-5">
                <p class="h5">Page entries in total:</p>
                <?php
                
                foreach($page_entries_all as $el):
                ?>

                    <p class="h6"><?= $el[1] ?> (<?= round(100 - ($el[1] / $total_entries) * 100 ,2) ?>) ----- <?= $el[0] ?></p>

                <?php
                endforeach;
                ?>
            </div>
            <div class="col-lg-4 col-md-12 p-5">
                <div class="col-12">
                    <p class="h4">Users logged in: 
                        <?php
                        $time_now = time();
                        $time_yesterday = $time_now - (60 * 60 * 24);

                        $users_online = "SELECT * FROM online WHERE time BETWEEN $time_yesterday AND $time_now";
                        $users_online_array = executeQuery($users_online);
                        $users_online_now = count($users_online_array);

                        echo "$users_online_now";
                        ?>
                    </p>
                    <p class="h5">Total page entries in last 24h: <?= $total_entries ?></p>
                    <p class="h5">Total page entries in total: <?= count($file_array) ?></p>
                    <a href="models/admin/export_log.php">Open current LOG file in Excel.</a>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex flex-wrap">
            <div class="col-lg-8 col-sm-12 p-5">
                <p class="h3 mb-4">Change data:</p>
                <div class="col-12 p-3 border mb-3">
                    <details class="col-12">
                        <summary class="h4">Users:</summary>
                        <table class="table col-12">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Change</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = executeQuery("SELECT * FROM users");
                                foreach($data as $el):
                                ?>

                                <tr>
                                    <td><?= $el->id ?></td>
                                    <td><?= $el->name ?></td>
                                    <td><?= $el->last_name ?></td>
                                    <td><?= $el->email ?></td>
                                    <td><?= $el->role ?></td>
                                    <td><?= $el->status ?></td>
                                    <td><a href="index.php?page=change&table=users&id=<?= $el->id ?>">Change</a></td>
                                    <td><a href="models/admin/delete.php?table=users&id=<?= $el->id ?>">Delete</a></td>
                                </tr>

                                <?php 
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </details>

                    <details class="col-12 mt-5">
                        <summary class="h4">Categories:</summary>

                        <a href="index.php?page=add&table=categories" class="h4">Add category.</a>
                        
                        <table class="table col-12">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Change</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = executeQuery("SELECT * FROM categories");
                                foreach($data as $el):
                                ?>

                                <tr>
                                    <td><?= $el->id ?></td>
                                    <td><?= $el->category ?></td>
                                    <td><a href="index.php?page=change&table=categories&id=<?= $el->id ?>">Change</a></td>
                                    <td><a href="models/admin/delete.php?table=categories&id=<?= $el->id ?>">Delete</a></td>
                                </tr>

                                <?php 
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </details>

                    <details class="col-12 mt-5">
                        <summary class="h4">Nav Menu Elements:</summary>
                        
                        <table class="table col-12">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Parent</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Login Status</th>
                                    <th scope="col">Change</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = executeQuery("SELECT * FROM nav_elements");
                                foreach($data as $el):
                                ?>

                                <tr>
                                    <td><?= $el->id_nav ?></td>
                                    <td><?= $el->name ?></td>
                                    <td><?= $el->href ?></td>
                                    <td><?= $el->parent ?></td>
                                    <td><?= $el->level ?></td>
                                    <td><?= $el->position ?></td>
                                    <td><?= $el->login_status ?></td>
                                    <td><a href="index.php?page=change&table=nav_elements&id=<?= $el->id_nav ?>">Change</a></td>
                                    <td><a href="models/admin/delete.php?table=nav_elements&id=<?= $el->id_nav ?>">Delete</a></td>
                                </tr>

                                <?php 
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </details>

                    <details class="col-12 mt-5">
                        <summary class="h4">Big Images on Home Page:</summary>
                        
                        <a href="index.php?page=add&table=big_images" class="h4">Add Image.</a>
                        
                        <table class="table col-12">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Src</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = executeQuery("SELECT * FROM images_entry");
                                foreach($data as $el):
                                ?>

                                <tr>
                                    <td><?= $el->id ?></td>
                                    <td><?= $el->src ?></td>
                                    <td><?= $el->alt ?></td>
                                    <td><a href="models/admin/delete.php?table=images_entry&id=<?= $el->id ?>">Delete</a></td>
                                </tr>

                                <?php 
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </details>
                    
                    <details class="col-12 mt-5">
                        <summary class="h4">Events:</summary>

                        <a href="index.php?page=add&table=event" class="h4">Add Event.</a>
                        
                        <table class="table col-12">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Event Name</th>
                                    <th scope="col">Event Description</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = executeQuery("SELECT * FROM events");
                                foreach($data as $el):
                                ?>

                                <tr>
                                    <td><?= $el->id ?></td>
                                    <td><?= $el->event_name ?></td>
                                    <td><?= $el->event_description ?></td>
                                    <td><a href="models/admin/delete.php?table=events&id=<?= $el->id ?>">Delete</a></td>
                                </tr>

                                <?php 
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </details>

                </div>
            </div>

            <div class="col-lg-4 col-sm-12 p-5">
                <p class="h3 mb-4">Accessed pages data (last 50):</p>
                <ul>
                <?php
                $file = fopen("data/log.txt", "r");

                if($file):
                    $file_array = file("data/log.txt");

                    for($i = count($file_array) - 1; $i >= count($file_array) - 60; $i--):
                        ?>
                        
                        <li><?= $file_array[$i] ?></li>

                        <?php
                    endfor;

                    fclose($file);
                endif;
                ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
endif;
?>