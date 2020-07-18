<div class="site-section" id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-black">Fill the form to log in:</h2>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-md-12 mb-5">
                <form action="models/login/login.php" method="POST" name="registerForm" onsubmit="return loginFormCheck()">

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Email address" name="email" id="email"/>
                            <p id="emailR" class="text-danger text-center hideThis">Invalid email format.</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="pass" id="pass"/>
                            <p id="passR" class="text-danger text-center hideThis">Invalid password format.</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 mr-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-2 px-5" name="sub_register" value="Log In"/>
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
    </div>
</div>