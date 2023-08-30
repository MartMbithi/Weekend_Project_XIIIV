<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="dashboard" class="text-nowrap logo-img">
                <img src="../public/backoffice/images/logos/dark-logo.svg" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <?php if ($_SESSION['login_rank'] == 'Admin') { ?>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="dashboard" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="admins" aria-expanded="false">
                            <span>
                                <i class="ti ti-user-check"></i>
                            </span>
                            <span class="hide-menu">Adminstrators</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="farmers" aria-expanded="false">
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Farmers</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="providers" aria-expanded="false">
                            <span>
                                <i class="ti ti-list"></i>
                            </span>
                            <span class="hide-menu">Service Providers</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="requests" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-check"></i>
                            </span>
                            <span class="hide-menu">Service Requests</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="payments" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-invoice"></i>
                            </span>
                            <span class="hide-menu">Payments</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Reports</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="reports_farmers" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-download"></i>
                            </span>
                            <span class="hide-menu">Farmers</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="reports_providers" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-download"></i>
                            </span>
                            <span class="hide-menu">Service Providers</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="reports_requests" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-download"></i>
                            </span>
                            <span class="hide-menu">Service Requests</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="reports_payments" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-download"></i>
                            </span>
                            <span class="hide-menu">Payments</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php } else if ($_SESSION['login_rank'] == 'Farmer') { ?>
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="dashboard" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="requests" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-check"></i>
                            </span>
                            <span class="hide-menu">My Service Requests</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="payments" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-invoice"></i>
                            </span>
                            <span class="hide-menu">My Payments</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Reports</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="reports_requests" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-download"></i>
                            </span>
                            <span class="hide-menu">My Service Requests</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="reports_payments" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-download"></i>
                            </span>
                            <span class="hide-menu">My Payments</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php } else { ?>
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="dashboard" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="requests" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-check"></i>
                            </span>
                            <span class="hide-menu">Service Requests</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="payments" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-invoice"></i>
                            </span>
                            <span class="hide-menu">Payments</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Reports</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="reports_requests" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-download"></i>
                            </span>
                            <span class="hide-menu">Service Requests</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="reports_payments" aria-expanded="false">
                            <span>
                                <i class="ti ti-file-download"></i>
                            </span>
                            <span class="hide-menu">Payments</span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>