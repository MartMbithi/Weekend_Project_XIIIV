<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/functions/analytics.php');
require_once('../app/partials/backoffice_head.php');
?>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php require_once('../app/partials/backoffice_sidebar.php'); ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <?php if ($_SESSION['login_rank'] == 'Admin') { ?>
            <div class="body-wrapper">
                <!--  Header Start -->
                <?php require_once('../app/partials/backoffice_header.php'); ?>
                <!--  Header End -->
                <div class="container-fluid">
                    <!--  Row 1 -->
                    <div class="row">
                        <!-- Farmers -->
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-9 fw-semibold">Farmers</h5>
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h4 class="fw-semibold mb-3"><?php echo $farmers; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Service Providers -->
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-9 fw-semibold">Service Providers</h5>
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h4 class="fw-semibold mb-3"><?php echo $providers; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Service Requests -->
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-9 fw-semibold">Service Requests</h5>
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h4 class="fw-semibold mb-3"><?php echo $requests; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Payments -->
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-9 fw-semibold">Payments</h5>
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h4 class="fw-semibold mb-3">Ksh <?php echo number_format($payments, 2); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Recent Payment Transactions</h5>
                                    <div class="table-responsive">
                                        <table class="table text-nowrap mb-0 align-middle">
                                            <thead class="text-dark fs-4">
                                                <tr>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">REF</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Payment From</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Payment To</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Amount Paid</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $fetch_records_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM payments p
                                                INNER JOIN ploughing_service_request psr ON psr.request_id = p.payment_request_id
                                                INNER JOIN ploughing_service_providers psp ON psp.service_provider_id = psr.request_service_provider_id
                                                INNER JOIN farmers f ON f.farmer_id =psr.request_famer_id "
                                                );
                                                if (mysqli_num_rows($fetch_records_sql) > 0) {
                                                    while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                                ?>
                                                        <tr>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0"><?php echo $rows['payment_ref_code']; ?></h6>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-1"><?php echo $rows['farmer_name']; ?></h6>
                                                                <span class="fw-normal"><?php echo $rows['farmer_contacts']; ?></span>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-1"><?php echo $rows['service_provider_name']; ?></h6>
                                                                <span class="fw-normal"><?php echo $rows['service_provider_contacts']; ?></span>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0 fs-4">Ksh <?php echo  number_format($rows['payment_amount'], 2); ?></h6>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0 fs-4"><?php echo  date('d M Y g:ia', strtotime($rows['payment_date'])); ?></h6>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php require_once('../app/partials/backoffice_footer.php'); ?>
                </div>
            </div>
        <?php } else if ($_SESSION['login_rank'] == 'Farmer') { ?>
            <div class="body-wrapper">
                <!--  Header Start -->
                <?php require_once('../app/partials/backoffice_header.php'); ?>
                <!--  Header End -->
                <div class="container-fluid">
                    <!--  Row 1 -->
                    <div class="row">
                        <!-- Service Requests -->
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-9 fw-semibold">Ploughing Service Requests</h5>
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h4 class="fw-semibold mb-3"><?php echo $requests; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Payments -->
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-9 fw-semibold">Expenditure</h5>
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h4 class="fw-semibold mb-3">Ksh <?php echo number_format($payments, 2); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Recent Payment Transactions</h5>
                                    <div class="table-responsive">
                                        <table class="table text-nowrap mb-0 align-middle">
                                            <thead class="text-dark fs-4">
                                                <tr>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">REF</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Payment From</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Payment To</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Amount Paid</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $fetch_records_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM payments p
                                                INNER JOIN ploughing_service_request psr ON psr.request_id = p.payment_request_id
                                                INNER JOIN ploughing_service_providers psp ON psp.service_provider_id = psr.request_service_provider_id
                                                INNER JOIN farmers f ON f.farmer_id =psr.request_famer_id 
                                                WHERE f.farmer_login_id = '{$_SESSION['login_id']}'"
                                                );
                                                if (mysqli_num_rows($fetch_records_sql) > 0) {
                                                    while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                                ?>
                                                        <tr>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0"><?php echo $rows['payment_ref_code']; ?></h6>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-1"><?php echo $rows['farmer_name']; ?></h6>
                                                                <span class="fw-normal"><?php echo $rows['farmer_contacts']; ?></span>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-1"><?php echo $rows['service_provider_name']; ?></h6>
                                                                <span class="fw-normal"><?php echo $rows['service_provider_contacts']; ?></span>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0 fs-4">Ksh <?php echo  number_format($rows['payment_amount'], 2); ?></h6>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0 fs-4"><?php echo  date('d M Y g:ia', strtotime($rows['payment_date'])); ?></h6>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php require_once('../app/partials/backoffice_footer.php'); ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="body-wrapper">
                <!--  Header Start -->
                <?php require_once('../app/partials/backoffice_header.php'); ?>
                <!--  Header End -->
                <div class="container-fluid">
                    <!--  Row 1 -->
                    <div class="row">
                        <!-- Service Requests -->
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-9 fw-semibold">Ploughing Service Requests</h5>
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h4 class="fw-semibold mb-3"><?php echo $requests; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Payments -->
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-9 fw-semibold">Revenue</h5>
                                            <div class="row align-items-center">
                                                <div class="col-12">
                                                    <h4 class="fw-semibold mb-3">Ksh <?php echo number_format($payments, 2); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold mb-4">Recent Payment Transactions</h5>
                                    <div class="table-responsive">
                                        <table class="table text-nowrap mb-0 align-middle">
                                            <thead class="text-dark fs-4">
                                                <tr>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">REF</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Payment From</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Payment To</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Amount Paid</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $fetch_records_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM payments p
                                                    INNER JOIN ploughing_service_request psr ON psr.request_id = p.payment_request_id
                                                    INNER JOIN ploughing_service_providers psp ON psp.service_provider_id = psr.request_service_provider_id
                                                    INNER JOIN farmers f ON f.farmer_id =psr.request_famer_id 
                                                    WHERE psp.service_provider_login_id = '{$_SESSION['login_id']}'"
                                                );
                                                if (mysqli_num_rows($fetch_records_sql) > 0) {
                                                    while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                                ?>
                                                        <tr>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0"><?php echo $rows['payment_ref_code']; ?></h6>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-1"><?php echo $rows['farmer_name']; ?></h6>
                                                                <span class="fw-normal"><?php echo $rows['farmer_contacts']; ?></span>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-1"><?php echo $rows['service_provider_name']; ?></h6>
                                                                <span class="fw-normal"><?php echo $rows['service_provider_contacts']; ?></span>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0 fs-4">Ksh <?php echo  number_format($rows['payment_amount'], 2); ?></h6>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0 fs-4"><?php echo  date('d M Y g:ia', strtotime($rows['payment_date'])); ?></h6>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php require_once('../app/partials/backoffice_footer.php'); ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php require_once('../app/partials/backoffice_scripts.php'); ?>
</body>

</html>