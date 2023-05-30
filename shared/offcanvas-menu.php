<div class="offcanvas offcanvas-top bg-white" tabindex="-1" id="offcanvas-menu" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
    </div>
    <div class="offcanvas-body p-0 h-100">
        <div class="px-4 text-start mb-5">
            <button type="button" class="btn-close p-4 rounded-circle shadow border me-auto btn-close text-orange btn-sm btn-no-outline" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div>
            <img src="../assets/images/abaca-logo.png" width="200px" alt="">
        </div>
        <ul class="nav flex-row align-items-center justify-content-center px-0 mx-0">
            <?php
            include_once '../classes/NavLink.php';
            $nav_links = [
                new NavLink("Home", "home", "index.php", "home"),
                new NavLink("Shop", "shop", "shop.php", "storefront"),
                new NavLink("About", "about", "about.php", "info"),
                new NavLink("Contact", "", "contact.php", "phone"),
                new NavLink("Orders", "orders", "orders.php", "schedule"),
            ];

            foreach ($nav_links as $key => $nav_link) {
            ?>
                <li class="nav-item mb-2 py-3 text-center <?php echo $active_page == $nav_link->key ? 'active' : '' ?>">
                    <a href="<?php echo $nav_link->url ?>" class="nav-link link-dark d-flex align-items-center flex-column justify-content-center fw-bold w-auto">
                        <div class="icon">
                            <span class="material-icon text-dark-brown"><?php echo $nav_link->icon ?></span>
                        </div>
                        <span class="fs-6 text-uppercas"><?php echo $nav_link->text ?></span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
        <ul class="nav flex-row align-items-center justify-content-center px-0 mx-0 mt-3">
            <?php
            if (!isset($user)) {
                $nav_links = [
                    new NavLink("Log In", "login", "login.php", "login"),
                    new NavLink("Sign up", "signup", "signup.php", "edit"),
                ];

                foreach ($nav_links as $key => $nav_link) {
            ?>
                    <li class="nav-item mb-2 py-3 text-center <?php echo $active_page == $nav_link->key ? 'active' : '' ?>">
                        <a href="<?php echo $nav_link->url ?>" class="nav-link link-dark d-flex align-items-center flex-column justify-content-center fw-bold w-auto">
                            <div class="icon">
                                <span class="material-icon text-dark-brown"><?php echo $nav_link->icon ?></span>
                            </div>
                            <span class="fs-6 text-orange"><?php echo $nav_link->text ?></span>
                        </a>
                    </li>
                <?php
                }
            } else {
                ?>
                <li class="nav-item mb-2 py-3 text-center <?php echo $active_page == 'profile' ? 'active' : '' ?>">
                    <a href="profile.php" class="nav-link link-dark d-flex align-items-center flex-column justify-content-center fw-bold w-auto">
                        <div class="profile-pic mb-3">
                            <div class="photo-div rounded-circle border border-3 border-white shadow" data-image="<?= $user['photo'] ?>">
                            </div>
                            <span class="fs-6 mt-2 text-dark-brown"><?php echo $user['firstname'] . ' ' . $user['lastname'] ?></span>
                    </a>
                </li>
                <li class="nav-item mb-2 py-3 text-center">
                    <a href="../app/logout.php" class="nav-link link-dark d-flex align-items-center flex-column justify-content-center fw-bold w-auto">
                        <div class="icon">
                            <span class="material-icon text-dark-brown">logout</span>
                        </div>
                        <span class="fs-6 text-uppercas">Log Out</span>
                    </a>
                </li>
            <?php
            }
            ?>


        </ul>
    </div>
</div>