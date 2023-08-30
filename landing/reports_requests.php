<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/config/codeGen.php');
require_once('../app/helpers/services.php');
require_once('../app/partials/backoffice_head.php');
?>

<body>
    <!--  Body Wrapper -->
    <?php if ($_SESSION['login_rank'] == 'Admin') { ?>
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
                            <h2 class="text-black font-w600">Ploughing Services Requests Reports</h2>
                            <p class="mb-0">Export Farmers Ploughing Request Services Reports</p>
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
                                                    <th>Farmer Details</th>
                                                    <th>Service Provider</th>
                                                    <th>Farm Location</th>
                                                    <th>Farm Size</th>
                                                    <th>Request Date</th>
                                                    <th>Service Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $system_users_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM ploughing_service_request psr 
                                                INNER JOIN farmers f ON f.farmer_id = psr.request_famer_id
                                                INNER JOIN ploughing_service_providers psp ON psp.service_provider_id = psr.request_service_provider_id"
                                                );
                                                if (mysqli_num_rows($system_users_sql) > 0) {
                                                    while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $system_users['farmer_name']; ?> <br>
                                                                <?php echo $system_users['farmer_contacts']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $system_users['service_provider_name']; ?><br>
                                                                <?php echo $system_users['service_provider_contacts']; ?>
                                                            </td>
                                                            <td><?php echo $system_users['request_location']; ?></td>
                                                            <td><?php echo $system_users['request_farm_size']; ?> Ha</td>
                                                            <td><?php echo date('d M Y', strtotime($system_users['request_date'])); ?></td>
                                                            <td>Ksh <?php echo number_format($system_users['request_cost']); ?></td>
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
    <?php } else if ($_SESSION['login_rank'] == 'Farmer') { ?>
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
                            <h2 class="text-black font-w600">Ploughing Services Requests Reports</h2>
                            <p class="mb-0">Export Farmers Ploughing Request Services Reports</p>
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
                                                    <th>Farmer Details</th>
                                                    <th>Service Provider</th>
                                                    <th>Farm Location</th>
                                                    <th>Farm Size</th>
                                                    <th>Request Date</th>
                                                    <th>Service Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $system_users_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM ploughing_service_request psr 
                                                    INNER JOIN farmers f ON f.farmer_id = psr.request_famer_id
                                                    INNER JOIN ploughing_service_providers psp ON psp.service_provider_id = psr.request_service_provider_id
                                                    WHERE f.farmer_login_id = '{$_SESSION['login_id']}'"
                                                );
                                                if (mysqli_num_rows($system_users_sql) > 0) {
                                                    while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $system_users['farmer_name']; ?> <br>
                                                                <?php echo $system_users['farmer_contacts']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $system_users['service_provider_name']; ?><br>
                                                                <?php echo $system_users['service_provider_contacts']; ?>
                                                            </td>
                                                            <td><?php echo $system_users['request_location']; ?></td>
                                                            <td><?php echo $system_users['request_farm_size']; ?> Ha</td>
                                                            <td><?php echo date('d M Y', strtotime($system_users['request_date'])); ?></td>
                                                            <td>Ksh <?php echo number_format($system_users['request_cost']); ?></td>
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
    <?php } else { ?>
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
                            <h2 class="text-black font-w600">Ploughing Services Requests Reports</h2>
                            <p class="mb-0">Export Farmers Ploughing Request Services Reports</p>
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
                                                    <th>Farmer Details</th>
                                                    <th>Service Provider</th>
                                                    <th>Farm Location</th>
                                                    <th>Farm Size</th>
                                                    <th>Request Date</th>
                                                    <th>Service Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $system_users_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM ploughing_service_request psr 
                                                    INNER JOIN farmers f ON f.farmer_id = psr.request_famer_id
                                                    INNER JOIN ploughing_service_providers psp ON psp.service_provider_id = psr.request_service_provider_id
                                                    WHERE psp.service_provider_login_id = '{$_SESSION['login_id']}'"
                                                );
                                                if (mysqli_num_rows($system_users_sql) > 0) {
                                                    while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $system_users['farmer_name']; ?> <br>
                                                                <?php echo $system_users['farmer_contacts']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $system_users['service_provider_name']; ?><br>
                                                                <?php echo $system_users['service_provider_contacts']; ?>
                                                            </td>
                                                            <td><?php echo $system_users['request_location']; ?></td>
                                                            <td><?php echo $system_users['request_farm_size']; ?> Ha</td>
                                                            <td><?php echo date('d M Y', strtotime($system_users['request_date'])); ?></td>
                                                            <td>Ksh <?php echo number_format($system_users['request_cost']); ?></td>
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
    <?php } ?>
    <?php require_once('../app/partials/backoffice_scripts.php'); ?>
</body>

</html>