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
                            <h2 class="text-black font-w600">Ploughing Services Requests</h2>
                            <p class="mb-0">Manage Farmers Ploughing Request Services</p>
                        </div>
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#add_modal" type="button" class="btn btn-outline-secondary m-1">Add Request</button>
                        </div>
                    </div>
                    <!-- Add Admin Modal -->
                    <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="modal-title">
                                        <h6 class="mb-0">Register New Request</h6>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Farmer Details</label>
                                                <select required type="text" name="request_famer_id" class="form-control">
                                                    <option value="">Select Farmer</option>
                                                    <?php
                                                    $system_users_sql = mysqli_query(
                                                        $mysqli,
                                                        "SELECT * FROM farmers f
                                                    INNER JOIN login l ON l.login_id = f.farmer_login_id"
                                                    );
                                                    if (mysqli_num_rows($system_users_sql) > 0) {
                                                        while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                    ?>
                                                            <option value="<?php echo $system_users['farmer_id']; ?>"><?php echo $system_users['farmer_name']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Ploughing Service Provider Details</label>
                                                <select required type="text" name="request_service_provider_id" class="form-control">
                                                    <option value="">Select Service Provider</option>
                                                    <?php
                                                    $system_users_sql = mysqli_query(
                                                        $mysqli,
                                                        "SELECT * FROM ploughing_service_providers sp
                                                    INNER JOIN login l ON l.login_id = sp.service_provider_login_id"
                                                    );
                                                    if (mysqli_num_rows($system_users_sql) > 0) {
                                                        while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                    ?>
                                                            <option value="<?php echo $system_users['service_provider_id']; ?>"><?php echo $system_users['service_provider_name']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Farm Location</label>
                                                <input required type="text" name="request_location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Farm Size (Ha)</label>
                                                <input required type="text" name="request_farm_size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Ploughing Date</label>
                                                <input required type="date" name="request_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Service Cost</label>
                                                <input required type="text" name="request_cost" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="Add_Service" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="table-responsive">
                                        <table class="data table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Farmer Details</th>
                                                    <th>Service Provider</th>
                                                    <th>Farm Location</th>
                                                    <th>Farm Size</th>
                                                    <th>Request Date</th>
                                                    <th>Service Cost</th>
                                                    <th>Manage</th>
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
                                                            <td>
                                                                <?php if ($system_users['request_payment_status'] == 'Pending') { ?>
                                                                    <a data-bs-toggle="modal" href="#pay_<?php echo $system_users['request_id']; ?>" class="badge bg-success"><i class="ti ti-check"></i> Pay</a>
                                                                <?php } ?>
                                                                <a data-bs-toggle="modal" href="#update_<?php echo $system_users['request_id']; ?>" class="badge bg-warning"><i class="ti ti-edit"></i> Edit</a>
                                                                <a data-bs-toggle="modal" href="#delete_<?php echo $system_users['request_id']; ?>" class="badge bg-danger"><i class="ti ti-trash"></i> Delete</a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        include('../app/modals/requests.php');
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
                            <h2 class="text-black font-w600">Ploughing Services Requests</h2>
                            <p class="mb-0">Manage Your Ploughing Requests</p>
                        </div>
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#add_modal" type="button" class="btn btn-outline-secondary m-1">Add Request</button>
                        </div>
                    </div>
                    <!-- Add Admin Modal -->
                    <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="modal-title">
                                        <h6 class="mb-0">Register New Request</h6>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="mb-3 col-6" style="display: none;">
                                                <label for="exampleInputEmail1" class="form-label">Farmer Details</label>
                                                <select required type="text" name="request_famer_id" class="form-control">
                                                    <?php
                                                    $system_users_sql = mysqli_query(
                                                        $mysqli,
                                                        "SELECT * FROM farmers f
                                                        INNER JOIN login l ON l.login_id = f.farmer_login_id
                                                        WHERE l.login_id = '{$_SESSION['login_id']}'"
                                                    );
                                                    if (mysqli_num_rows($system_users_sql) > 0) {
                                                        while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                    ?>
                                                            <option selected value="<?php echo $system_users['farmer_id']; ?>"><?php echo $system_users['farmer_name']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="exampleInputEmail1" class="form-label">Ploughing Service Provider Details</label>
                                                <select required type="text" name="request_service_provider_id" class="form-control">
                                                    <option value="">Select Service Provider</option>
                                                    <?php
                                                    $system_users_sql = mysqli_query(
                                                        $mysqli,
                                                        "SELECT * FROM ploughing_service_providers sp
                                                    INNER JOIN login l ON l.login_id = sp.service_provider_login_id"
                                                    );
                                                    if (mysqli_num_rows($system_users_sql) > 0) {
                                                        while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                    ?>
                                                            <option value="<?php echo $system_users['service_provider_id']; ?>"><?php echo $system_users['service_provider_name']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Farm Location</label>
                                                <input required type="text" name="request_location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Farm Size (Ha)</label>
                                                <input required type="text" name="request_farm_size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Ploughing Date</label>
                                                <input required type="date" name="request_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Service Cost Budget (Cost)</label>
                                                <input required type="text" name="request_cost" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="Add_Service" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="table-responsive">
                                        <table class="data table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Service Provider</th>
                                                    <th>Farm Location</th>
                                                    <th>Farm Size</th>
                                                    <th>Request Date</th>
                                                    <th>Service Cost</th>
                                                    <th>Manage</th>
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
                                                                <?php echo $system_users['service_provider_name']; ?><br>
                                                                <?php echo $system_users['service_provider_contacts']; ?>
                                                            </td>
                                                            <td><?php echo $system_users['request_location']; ?></td>
                                                            <td><?php echo $system_users['request_farm_size']; ?> Ha</td>
                                                            <td><?php echo date('d M Y', strtotime($system_users['request_date'])); ?></td>
                                                            <td>Ksh <?php echo number_format($system_users['request_cost']); ?></td>
                                                            <td>
                                                                <?php if ($system_users['request_payment_status'] == 'Pending') { ?>
                                                                    <a data-bs-toggle="modal" href="#pay_<?php echo $system_users['request_id']; ?>" class="badge bg-success"><i class="ti ti-check"></i> Pay</a>
                                                                <?php } ?>
                                                                <a data-bs-toggle="modal" href="#update_<?php echo $system_users['request_id']; ?>" class="badge bg-warning"><i class="ti ti-edit"></i> Edit</a>
                                                                <a data-bs-toggle="modal" href="#delete_<?php echo $system_users['request_id']; ?>" class="badge bg-danger"><i class="ti ti-trash"></i> Delete</a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        include('../app/modals/requests.php');
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
                            <h2 class="text-black font-w600">Ploughing Services Requests</h2>
                            <p class="mb-0">Manage Farmers Ploughing Request Services</p>
                        </div>
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#add_modal" type="button" class="btn btn-outline-secondary m-1">Add Request</button>
                        </div>
                    </div>
                    <!-- Add Admin Modal -->
                    <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="modal-title">
                                        <h6 class="mb-0">Register New Request</h6>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="post" enctype="multipart/form-data" role="form">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="mb-3 col-12">
                                                <label for="exampleInputEmail1" class="form-label">Farmer Details</label>
                                                <select required type="text" name="request_famer_id" class="form-control">
                                                    <option value="">Select Farmer</option>
                                                    <?php
                                                    $system_users_sql = mysqli_query(
                                                        $mysqli,
                                                        "SELECT * FROM farmers f
                                                    INNER JOIN login l ON l.login_id = f.farmer_login_id"
                                                    );
                                                    if (mysqli_num_rows($system_users_sql) > 0) {
                                                        while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                    ?>
                                                            <option value="<?php echo $system_users['farmer_id']; ?>"><?php echo $system_users['farmer_name']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-12" style="display: none;">
                                                <label for="exampleInputEmail1" class="form-label">Ploughing Service Provider Details</label>
                                                <select required type="text" name="request_service_provider_id" class="form-control">
                                                    <?php
                                                    $system_users_sql = mysqli_query(
                                                        $mysqli,
                                                        "SELECT * FROM ploughing_service_providers sp
                                                        INNER JOIN login l ON l.login_id = sp.service_provider_login_id
                                                        WHERE l.login_id = '{$_SESSION['login_id']}'"
                                                    );
                                                    if (mysqli_num_rows($system_users_sql) > 0) {
                                                        while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                                    ?>
                                                            <option value="<?php echo $system_users['service_provider_id']; ?>"><?php echo $system_users['service_provider_name']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Farm Location</label>
                                                <input required type="text" name="request_location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Farm Size (Ha)</label>
                                                <input required type="text" name="request_farm_size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Ploughing Date</label>
                                                <input required type="date" name="request_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="exampleInputEmail1" class="form-label">Service Cost</label>
                                                <input required type="text" name="request_cost" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="Add_Service" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="table-responsive">
                                        <table class="data table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Farmer Details</th>
                                                    <th>Service Provider</th>
                                                    <th>Farm Location</th>
                                                    <th>Farm Size</th>
                                                    <th>Request Date</th>
                                                    <th>Service Cost</th>
                                                    <th>Manage</th>
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
                                                            <td>
                                                                <?php if ($system_users['request_payment_status'] == 'Pending') { ?>
                                                                    <a data-bs-toggle="modal" href="#pay_<?php echo $system_users['request_id']; ?>" class="badge bg-success"><i class="ti ti-check"></i> Pay</a>
                                                                <?php } ?>
                                                                <a data-bs-toggle="modal" href="#update_<?php echo $system_users['request_id']; ?>" class="badge bg-warning"><i class="ti ti-edit"></i> Edit</a>
                                                                <a data-bs-toggle="modal" href="#delete_<?php echo $system_users['request_id']; ?>" class="badge bg-danger"><i class="ti ti-trash"></i> Delete</a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        include('../app/modals/requests.php');
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