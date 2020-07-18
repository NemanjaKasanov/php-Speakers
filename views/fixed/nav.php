<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="home-section">
    <!-- <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        
        <header class="site-navbar js-sticky-header site-navbar-target" role="banner" >
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-xl-2">
                        <h1 class="mb-0 site-logo"><a href="index.php" class="h2 mb-0">Speakers<span class="text-primary">.</span> </a></h1>
                    </div>

                    <div class="col-12 col-md-10 d-none d-xl-block">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">

                                <?php
                                    require_once "models/functions.php";

                                    $query;

                                    if(isset($_SESSION['userStatus']) && $_SESSION['userStatus'] == 1) $query = "SELECT * FROM nav_elements WHERE parent=0 AND login_status=0 OR login_status=2 ORDER BY position ASC";
                                    else $query = "SELECT * FROM nav_elements WHERE parent=0 AND login_status=0 OR login_status=1 ORDER BY position ASC";
                                    
                                    $rows = executeQuery($query);
                                    
                                    foreach($rows as $row):

                                    if(check_for_children($row->id_nav)){
                                        echo '<li class="has-children">';
                                    }
                                    else{
                                        echo '<li>';
                                    }
                                ?>
                                <a href="<?= $row->href ?>" class="nav-link"><?= $row->name ?></a>
                                <?php 
                                    if(check_for_children($row->id_nav)){
                                        echo '<ul class="dropdown">';
                                        show_nav_elements($row->id_nav); 
                                        echo '</ul>';
                                    }
                                ?>

                                <?php
                                    echo '</li>';
                                    endforeach;

                                    if(isset($_SESSION['userStatus']) && $_SESSION['userRole'] == 1):
                                    ?>
                                        <li><a href="index.php?page=admin" class="nav-link">Admin Panel</a></li>
                                    <?php
                                    endif;
                                ?>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>
                </div>
            </div>
        </header>