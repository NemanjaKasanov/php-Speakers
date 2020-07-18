<section class="site-section" id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h2 class="text-black">Hey there, I'm Nemanja The Founder</h2>
            </div>
            <div class="col-md-6 mb-5">
                <p>I believe in improvement and progress, so I have decided to build this platform to connect people and help organise events where people would learn and advance professionally or otherwise.</p>
                <p>Here you can connect, talk to or book speakers for your events or if you are a speaker find a gig for yourself.</p>
                <p>Even with this platform being new thousands of people have shared positive experiences and reported to us that they have found people needed for their jobs and formed new friendships.</p>
                <p class="mt-5"><img src="assets/images/signature.jpg" alt="Signature" class="img-fluid w-25"></p>
            </div>
            <div class="col-md-5 ml-auto">
                <h2 class="text-black mb-4 h6">Upcmoing Speaking Gigs</h2>
                <ul class="list-unstyled">
                    <?php
                        $eventsQuery = "SELECT * FROM events ORDER BY id DESC LIMIT 4";
                        $events = executeQuery($eventsQuery);

                        foreach($events as $el):
                    ?>

                    <li class="mb-4">
                        <h3 class="text-black m-0"><?= $el->event_name ?></h3>
                        <span class="text-muted"><?= $el->event_description ?></span>
                    </li>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="row">
            <?php
            $query = "SELECT u.id, u.name, ud.description, ud.image_sm FROM users AS u INNER JOIN user_data AS ud ON u.id = ud.user_id ORDER BY u.id DESC LIMIT 4";
            $users_to_display = executeQuery($query);

            foreach($users_to_display as $el):
            ?>

            <div class="col-lg-3 text-left">
                <a href="index.php?page=speaker&id=<?= $el->id ?>">
                    <img src="assets/images/users/<?= $el->image_sm ?>" alt="<?= $el->name ?>" class="rounded-circle img-fluid w-50 mb-4">
                    <h3 class="h4 text-black"><?= $el->name ?></h3>
                </a>
                <p><?= $el->description ?></p>
            </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>
