<div class="col-12 mt-5 mb-5 d-flex align-items-center justify-content-center">
    <div class="col-lg-6 col-sm-12 text-center">
        <img class="img-fluid mb-5" id="authorImg" src="assets/images/author.png" alt="Author"/>
        <?php 
        $data = executeQuery("SELECT * FROM author");
        foreach($data as $el):
        ?>

            <p class="h3 mb-3"><?= $el->desc ?></p>

        <?php endforeach;?>
        <a href="https://www.linkedin.com/in/nemanja-ka%C5%A1anov-3ab60a189/" target="_blank">My LinkedIn</a>
        <br/>
        <a href="models/author/word.php">Export About Author in Word.</a>
    </div>
</div>