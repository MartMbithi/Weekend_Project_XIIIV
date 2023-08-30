<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/helpers/users.php');
require_once('../app/partials/backoffice_head.php');
?>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php require_once('../app/partials/backoffice_sidebar.php'); ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php require_once('../app/partials/backoffice_header.php'); ?>
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="d-flex justify-content-between">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Farmers Reports</h2>
                        <p class="mb-0">Export registered farmers reports</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="report_table table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email Address</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $system_users_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM farmers f
                                                INNER JOIN login l ON l.login_id = f.farmer_login_id"
                                            );
                                            if (mysqli_num_rows($system_users_sql) > 0) {
                                                while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $system_users['farmer_name']; ?></td>
                                                        <td><?php echo $system_users['login_email']; ?></td>
                                                        <td><?php echo $system_users['farmer_contacts']; ?></td>
                                                        <td><?php echo $system_users['farmer_address']; ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('../app/partials/backoffice_footer.php'); ?>
        </div>
    </div>
    <?php require_once('../app/partials/backoffice_scripts.php'); ?>
</body>

</html>