<!--**********************************
            Nav header start
        ***********************************-->
<div class="nav-header shadow-sm">
    <a href="index.html" class="brand-logo">
        <img src="../../assets/images/abaca_white.png" class="logo-abbr" alt="">
        <p class="brand-title my-0 fs-14">
            <span>Abaca Handicraft</span>
        </p>
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line bg-white"></span><span class="line bg-white"></span><span class="line bg-white"></span>
        </div>
    </div>
</div>
<!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="input-group search-area right d-lg-inline-flex d-none">
                        <input type="text" class="form-control" placeholder="Find something here...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <a href="javascript:void(0)">
                                    <i class=" bx bx-search"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav header-right main-notification">

                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <img src="../assets/images/users/<?= $admin['photo'] ?>" class="rounded-circle" width="20" alt="">
                            <div class="header-info">
                                <span><?php echo $admin['firstname'] . ' ' . $admin['lastname'] ?></span>
                                <small>Admin</small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="profile.php" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="ml-2">Profile </span>
                            </a>
                            <a href="../app/logout.php" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ml-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="sub-header">
            <div class="d-flex align-items-center flex-wrap mr-auto">
                <h5 class="dashboard_bar"><?php echo isset($header_title)? $header_title: "Admin Panel" ?></h5>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->