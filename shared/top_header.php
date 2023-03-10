<header class="navbar navbar-light bg-light navbar-expand-lg main-navbar fixed-top animate__animated animate__slideInDown">
    <div class="px-lg-5 px-3 d-flex w-100 align-items-center py-lg-3 py-1">
        <div class="row align-items-center w-100">
            <div class="col">
                <!-- <p class="my-1 align-items-center d-none d-lg-flex  ">
                    <i class="material-symbols-outlined filled me-1 text-orange">
                        mail
                    </i>
                    <span class="">abacahandicraft@gmail.com</span>
                </p> -->
                <a href="#offcanvas-menu" data-bs-toggle="offcanvas" class="menu-btn link-orange text-decoration-none p-0 ">
                    <div class="icon ">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </a>
            </div>
            <div class="col-6 text-center">
                <a href="index.php" class="navbar-brand text-center mx-auto">
                    <img src="./assets/images/navbar_logo.png" class="img-fluid mx-auto" alt="">
                </a>
                <!-- <ul class="nav custom-nav flex-row mt-2 justify-content-center d-none d-lg-flex">
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
                        <li class="nav-item <?php echo $active_page == $nav_link->key ? 'active' : '' ?>">
                            <a href="<?php echo $nav_link->url ?>" class="nav-link link-dark text-uppercase fw-bold"><?php echo $nav_link->text ?></a>
                        </li>
                    <?php
                    }
                    ?>


                </ul> -->
            </div>
            <div class="col">
                <ul class="nav justify-content-end text-end align-items-center flex-row ">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="material-symbols-outlined filled fs-4 fw-bold me-1 text-orange">
                                search
                            </i>
                        </a>
                    </li>
                    <li class="nav-item d-lg-flex d-none">
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