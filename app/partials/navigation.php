<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="dashboaard" class="navbar-brand">
            <span class="brand-text font-weight-light">Bakery Management System</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="#" class="dropdown-item">Some action </a></li>
                        <li><a href="#" class="dropdown-item">Some other action</a></li>

                        <li class="dropdown-divider"></li>

                        <!-- Level two dropdown-->
                        <li class="dropdown-submenu dropdown-hover">
                            <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                <li>
                                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                </li>

                                <!-- Level three dropdown-->
                                <li class="dropdown-submenu">
                                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                        <li><a href="#" class="dropdown-item">3rd level</a></li>
                                        <li><a href="#" class="dropdown-item">3rd level</a></li>
                                    </ul>
                                </li>
                                <!-- End Level three -->

                                <li><a href="#" class="dropdown-item">level 2</a></li>
                                <li><a href="#" class="dropdown-item">level 2</a></li>
                            </ul>
                        </li>
                        <!-- End Level two -->
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-th-large"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" data-toggle="modal" data-target="#end_session"><i class="fas fa-power-off"></i></a>
            </li>
        </ul>
    </div>
</nav>