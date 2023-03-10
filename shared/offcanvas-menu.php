<div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvas-menu" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close ms-auto btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <ul class="nav flex-column justify-content-center mt-2 px-0 mx-0">
            <?php
            include_once './classes/NavLink.php';
            $nav_links = [
                new NavLink("Home", "home", "index.php","home"),
                new NavLink("Shop", "shop", "shop.php","storefront"),
                new NavLink("About", "", "about.php","info"),
                new NavLink("Contact", "", "contact.php","phone"),
                new NavLink("Sign In", "", "signin.php","login"),
                new NavLink("Sign Up", "", "signup.php","edit"),
            ];

            foreach ($nav_links as $key => $nav_link) {
            ?>
                <li class="nav-item mb-2 py-3 mx-0 <?php echo $active_page == $nav_link->key ? 'active' : '' ?>">
                    <a href="<?php echo $nav_link->url ?>" class="nav-link link-light text-uppercase d-flex align-items-center fw-bold w-auto">
                        <span class="material-icon fs-5 p-0 m-0"><?php echo $nav_link->icon ?></span>
                        <span class="fs-6 ms-4"><?php echo $nav_link->text ?></span>
                    </a>
                </li>
            <?php
            }
            ?>


        </ul>
        <!-- <div class="container mt-4">
            <div class="row">
                <div class="col-md">
                    <div class="text-center">
                        <a href="login.php" class="link-light text-decoration-none fs-5">
                            <span class="material-icon">login</span>
                            <br>
                            <span>SIGN IN</span>
                        </a>
                    </div>
                </div>
                <div class="col-md">
                    <div class="text-center">
                        <a href="login.php" class="link-light text-decoration-none fs-5">
                            <span class="material-icon">person_add</span>
                            <br>
                            <span class=" text-uppercase">SIGN UP</span>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>