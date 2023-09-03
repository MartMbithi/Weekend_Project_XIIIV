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
                    <a href="dashboard" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="staffs" class="nav-link">Staffs</a>
                </li>
                <li class="nav-item">
                    <a href="customers" class="nav-link">Customers</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Products</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="reports_staffs" class="dropdown-item">Categories </a></li>
                        <li><a href="reports_customers" class="dropdown-item">Products</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="orders" class="nav-link">Orders</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Reports</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="reports_staffs" class="dropdown-item">Staffs </a></li>
                        <li><a href="reports_customers" class="dropdown-item">Customers</a></li>
                        <li><a href="reports_inventory" class="dropdown-item">Inventory</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                <a class="nav-link text-primary" href="profile"><i class="fas fa-user-cog"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" data-toggle="modal" data-target="#end_session"><i class="fas fa-power-off"></i></a>
            </li>
        </ul>
    </div>
</nav>