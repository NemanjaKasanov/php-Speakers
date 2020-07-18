<section class="site-blocks-cover overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 align-self-center">
                <div class="row">
                    <div class="col-lg-11">
                        <?php
                            if($_GET['page'] == "speakers" || $_GET['page'] == "events"){
                                echo "<h1>Find speakers:</h1><p>Find and contact people with skills you need. Build your network.</p>";
                            }
                            else if($_GET['page'] == "login"){
                                echo "<h1>Log In:</h1><p>Log in to an existing account.</p>";
                            }
                            else if($_GET['page'] == "register"){
                                echo "<h1>Register here:</h1><p>Create a new account and become a member now.</p>";
                            }
                            else if($_GET['page'] == "aboutAuthor"){
                                echo "<h1>About Author:</h1>";
                            }
                            else if($_GET['page'] == "registerSuccess"){
                                echo "<h1>Account registered:</h1>";
                            }
                            else if($_GET['page'] == "verify"){
                                if($_GET['error'] == "") echo "<h1>Account activated:</h1><p>Click <a href='index.php?page=login'>here</a> to log in.</p>";
                                else echo "<h1>Error:</h1><p>An error has occured while processing your information. <br/> Please try again later.</p>";
                            }
                            else if($_GET['page'] == "admin"){
                                echo "<h1>Admin panel:</h1>";
                                if(!isset($_SESSION['userRole']) || $_SESSION['userRole'] != 1) echo "<p>You are not authorised to access this page.</p>";
                            }
                            else if($_GET['page'] == "account"){
                                echo "<h1>My Account:</h1><p>Account Settings:</p>";
                                if(!isset($_SESSION['userStatus']) || $_SESSION['userStatus'] != 1) echo "<p>You are not authorised to access this page.</p>";
                            }
                            else if($_GET['page'] == "speaker"){
                                if(isset($_GET['id']) && $_GET['id'] != '') echo "<h1>Speaker:</h1><p>Find details about a speaker and leave a grade to help the community.</p>";
                                else echo "<h1>Error:</h1><p>User not found.</p>";
                            }
                            else if($_GET['page'] == "change"){
                                echo "<h1>Admin panel(change):</h1>";
                                if(!isset($_SESSION['userRole']) || $_SESSION['userRole'] != 1) echo "<p>You are not authorised to access this page.</p>";
                            }
                            else if($_GET['page'] == "add"){
                                echo "<h1>Admin panel(add data):</h1>";
                                if(!isset($_SESSION['userRole']) || $_SESSION['userRole'] != 1) echo "<p>You are not authorised to access this page.</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>