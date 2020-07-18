<div class="site-section" id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-black">Join our community:</h2>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-md-12 mb-5">
                <form action="models/register/register.php" method="POST" name="registerForm" onsubmit="return registerFormCheck()">
                    <div class="form-group row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <input type="text" class="form-control" placeholder="First name" name="name" id="name"/>
                            <p id="nameR" class="text-danger text-center hideThis">Invalid format, name must begin with a capital letter.</p>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Last name" name="lname" id="lname"/>
                            <p id="lnameR" class="text-danger text-center hideThis">Invalid format, last name must begin with a capital letter.</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Email address" name="email" id="email"/>
                            <p id="emailR" class="text-danger text-center hideThis">Invalid email format.</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="pass" id="pass"/>
                            <p id="passR" class="text-danger text-center hideThis">Insert a password that is between 6 and 20 characters, contains at least one uppercase, one lowercase letter and one digit.</p>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Repeat password" name="rpass" id="rpass"/>
                            <p id="rpassR" class="text-danger text-center hideThis">Passwords do not match.</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 mr-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-2 px-5" name="sub_register" value="Register"/>
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

