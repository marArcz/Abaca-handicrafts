<header class="navbar scrolling navbar-light bg-light navbar-expand-lg main-navbar fixed-top">
    <div class="container py-3">
        <div class="row align-items-center w-100">
            <div class="col-md">
                <!-- <p class="my-1 align-items-center d-none d-lg-flex  ">
                    <i class="material-symbols-outlined filled me-1 text-orange">
                        mail
                    </i>
                    <span class="">abacahandicraft@gmail.com</span>
                </p> -->
                <a href="" class=" link-orange text-decoration-none">
                    <span class="material-icon fs-3">menu</span>
                </a>
            </div>
            <div class="col-md-6 text-center">
                <a href="index.php" class="navbar-brand text-center mx-auto">
                    <img src="./assets/images/navbar_logo.png" class="img-fluid mx-auto" alt="">
                </a>
                <ul class="nav custom-nav flex-row mt-2 justify-content-center d-none d-lg-flex">
                    <?php
                    include_once './classes/NavLink.php';
                    $nav_links = [
                        new NavLink("Home", "home", "index.php"),
                        new NavLink("Shop", "shop", "shop.php"),
                        new NavLink("About", "", "#about"),
                        new NavLink("Contact", "", "#contact"),
                    ];

                    foreach ($nav_links as $key => $nav_link) {
                    ?>
                        <li class="nav-item <?php echo $active_page == $nav_link->key ? 'active':'' ?>">
                            <a href="<?php echo $nav_link->url ?>" class="nav-link link-secondary text-uppercase fw-bold"><?php echo $nav_link->text ?></a>
                        </li>
                    <?php
                    }
                    ?>

                  
                </ul>
            </div>
            <div class="col-md">
                <ul class="nav justify-content-end align-items-center flex-row d-none d-lg-flex">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="material-symbols-outlined filled fs-4 fw-bold me-1 text-orange">
                                search
                            </i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="material-symbols-outlined filled fs-4 me-1 fw-bold text-orange">
                                shopping_cart
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>