<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/config/codeGen.php');
require_once('../app/helpers/services.php');
require_once('../app/partials/backoffice_head.php');
?>

<body>
    <?php if ($_SESSION['login_rank'] == 'Admin') { ?>
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
                            <h2 class="text-black font-w600">Payments</h2>
                            <p class="mb-0">Manage Payments</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="table-responsive">
                                        <table class="data table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Ref Code</th>
                                                    <th>Payment From</th>
                                                    <th>Payment To</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Payment Means</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $system_users_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM payments p
                                                INNER JOIN ploughing_service_request psr ON psr.request_id = p.payment_request_id
                                                INNER JOIN ploughing_service_providers psp ON psp.service_provider_id = psr.request_service_provider_id
                                                INNER JOIN farmers f ON f.farmer_id =psr.request_famer_id "
                                                );
                                                if (mysqli_num_rows($system_users_sql) > 0) {
                                                    while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $system_users['payment_ref_code']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $system_users['farmer_name']; ?> <br>
                                                                <?php echo $system_users['farmer_contacts']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $system_users['service_provider_name']; ?><br>
                                                                <?php echo $system_users['service_provider_contacts']; ?>
                                                            </td>
                                                            <td>Ksh <?php echo number_format($system_users['request_cost']); ?></td>
                                                            <td><?php echo date('d M Y', strtotime($system_users['payment_date'])); ?></td>
                                                            <td><?php echo $system_users['payment_means']; ?></td>
                                                            <td>
                                                                <a data-bs-toggle="modal" href="#delete_<?php echo $system_users['payment_id']; ?>" class="badge bg-danger"><i class="ti ti-trash"></i> Delete</a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        include('../app/modals/payments.php');
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
                            <h2 class="text-black font-w600">My Payments Records</h2>
                            <p class="mb-0">Manage Payments</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="table-responsive">
                                        <table class="data table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Ref Code</th>
                                                    <th>Payment From</th>
                                                    <th>Payment To</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Payment Means</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $system_users_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM payments p
                                                    INNER JOIN ploughing_service_request psr ON psr.request_id = p.payment_request_id
                                                    INNER JOIN ploughing_service_providers psp ON psp.service_provider_id = psr.request_service_provider_id
                                                    INNER JOIN farmers f ON f.farmer_id =psr.request_famer_id
                                                    WHERE f.farmer_login_id = '{$_SESSION['login_id']}' "
                                                );
                                                if (mysqli_num_rows($system_users_sql) > 0) {
                                                    while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $system_users['payment_ref_code']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $system_users['farmer_name']; ?> <br>
                                                                <?php echo $system_users['farmer_contacts']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $system_users['service_provider_name']; ?><br>
                                                                <?php echo $system_users['service_provider_contacts']; ?>
                                                            </td>
                                                            <td>Ksh <?php echo number_format($system_users['request_cost']); ?></td>
                                                            <td><?php echo date('d M Y', strtotime($system_users['payment_date'])); ?></td>
                                                            <td><?php echo $system_users['payment_means']; ?></td>
                                                            <td>
                                                                <a data-bs-toggle="modal" href="#delete_<?php echo $system_users['payment_id']; ?>" class="badge bg-danger"><i class="ti ti-trash"></i> Delete</a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        include('../app/modals/payments.php');
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
                            <h2 class="text-black font-w600">Payments Records</h2>
                            <p class="mb-0">Manage Payments</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="table-responsive">
                                        <table class="data table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Ref Code</th>
                                                    <th>Payment From</th>
                                                    <th>Payment To</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Payment Means</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $system_users_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM payments p
                                                    INNER JOIN ploughing_service_request psr ON psr.request_id = p.payment_request_id
                                                    INNER JOIN ploughing_service_providers psp ON psp.service_provider_id = psr.request_service_provider_id
                                                    INNER JOIN farmers f ON f.farmer_id =psr.request_famer_id
                                                    WHERE psp.service_provider_login_id = '{$_SESSION['login_id']}' "
                                                );
                                                if (mysqli_num_rows($system_users_sql) > 0) {
                                                    while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $system_users['payment_ref_code']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $system_users['farmer_name']; ?> <br>
                                                                <?php echo $system_users['farmer_contacts']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $system_users['service_provider_name']; ?><br>
                                                                <?php echo $system_users['service_provider_contacts']; ?>
                                                            </td>
                                                            <td>Ksh <?php echo number_format($system_users['request_cost']); ?></td>
                                                            <td><?php echo date('d M Y', strtotime($system_users['payment_date'])); ?></td>
                                                            <td><?php echo $system_users['payment_means']; ?></td>
                                                            <td>
                                                                <a data-bs-toggle="modal" href="#delete_<?php echo $system_users['payment_id']; ?>" class="badge bg-danger"><i class="ti ti-trash"></i> Delete</a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        include('../app/modals/payments.php');
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