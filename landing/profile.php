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

                <div class="row">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold mb-4">Profile Settings</h5>
                                <ul class="nav nav-tabs text-center" id="custom-content-below-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-content-below-home-tab" data-bs-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">
                                            Personal Details
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-content-below-profile-tab" data-bs-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">
                                            Authentication Details
                                        </a>
                                    </li>
                                </ul>
                                <br><br>
                                <div class="tab-content" id="custom-content-below-tabContent">
                                    <?php if ($_SESSION['login_rank'] == 'Admin') {
                                        $fetch_records_sql = mysqli_query(
                                            $mysqli,
                                            "SELECT * FROM administrator a INNER JOIN login l
                                            ON l.login_id = a.admin_login_id 
                                            WHERE l.login_id = '{$_SESSION['login_id']}' "
                                        );
                                        if (mysqli_num_rows($fetch_records_sql) > 0) {
                                            while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                    ?>

                                                <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                                    <form method="post">
                                                        <div class="row">
                                                            <div class="mb-3 col-12">
                                                                <label for="exampleInputEmail1" class="form-label">Full Names</label>
                                                                <input required type="hidden" name="admin_login_id" class="form-control" value="<?php echo $_SESSION['login_id']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                <input required type="text" name="admin_name" value="<?php echo $rows['admin_name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="mb-3 col-6">
                                                                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                                                <input required type="email" name="login_email" value="<?php echo $rows['login_email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="mb-3 col-6">
                                                                <label for="exampleInputEmail1" class="form-label">Contacts</label>
                                                                <input required type="text" name="admin_contacts" value="<?php echo $rows['admin_contacts']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="mb-3 col-12">
                                                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                                                <input required type="text" name="admin_address" value="<?php echo $rows['admin_address']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end mb-4">
                                                            <button type="submit" name="Update_Admin" class=" btn btn-primary rounded-2">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade show " id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                                    <form method="post">
                                                        <div class="row">
                                                            <div class="mb-3 col-12">
                                                                <label for="exampleInputEmail1" class="form-label">Login Username</label>
                                                                <input required type="text" name="login_email" class="form-control" value="<?php echo $rows['login_email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>

                                                            <div class="mb-4 col-6">
                                                                <label for="exampleInputPassword1" class="form-label">Login Password</label>
                                                                <input required type="password" name="new_password" class="form-control" id="exampleInputPassword1">
                                                            </div>
                                                            <div class="mb-4 col-6">
                                                                <label for="exampleInputPassword1" class="form-label">Confirm Login Password</label>
                                                                <input required type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end mb-4">
                                                            <button type="submit" name="Update_Auth_Details" class=" btn btn-primary rounded-2">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php }
                                        }
                                    } else if ($_SESSION['login_rank'] == 'Farmer') {
                                        $fetch_records_sql = mysqli_query(
                                            $mysqli,
                                            "SELECT * FROM farmers f
                                            INNER JOIN login l ON l.login_id = f.farmer_login_id
                                            WHERE l.login_id = '{$_SESSION['login_id']}'"
                                        );
                                        if (mysqli_num_rows($fetch_records_sql) > 0) {
                                            while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                            ?>

                                                <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                                    <form method="post" enctype="multipart/form-data" role="form">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="mb-3 col-12">
                                                                    <label for="exampleInputEmail1" class="form-label">Full Names</label>
                                                                    <input required type="hidden" name="farmer_login_id" value="<?php echo $rows['farmer_login_id']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                    <input required type="text" name="farmer_name" value="<?php echo $rows['farmer_name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                </div>
                                                                <div class="mb-3 col-6">
                                                                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                                                    <input required type="email" name="login_email" value="<?php echo $rows['login_email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                </div>
                                                                <div class="mb-3 col-6">
                                                                    <label for="exampleInputEmail1" class="form-label">Contacts</label>
                                                                    <input required type="text" name="farmer_contacts" value="<?php echo $rows['farmer_contacts']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                </div>
                                                                <div class="mb-3 col-12">
                                                                    <label for="exampleInputEmail1" class="form-label">Address</label>
                                                                    <input required type="text" name="farmer_address" value="<?php echo $rows['farmer_address']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="Update_Farmer" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade show " id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                                    <form method="post">
                                                        <div class="row">
                                                            <div class="mb-3 col-12">
                                                                <label for="exampleInputEmail1" class="form-label">Login Username</label>
                                                                <input required type="text" name="login_email" class="form-control" value="<?php echo $rows['login_email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>

                                                            <div class="mb-4 col-6">
                                                                <label for="exampleInputPassword1" class="form-label">Login Password</label>
                                                                <input required type="password" name="new_password" class="form-control" id="exampleInputPassword1">
                                                            </div>
                                                            <div class="mb-4 col-6">
                                                                <label for="exampleInputPassword1" class="form-label">Confirm Login Password</label>
                                                                <input required type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end mb-4">
                                                            <button type="submit" name="Update_Auth_Details" class=" btn btn-primary rounded-2">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php }
                                        }
                                    }
                                    $fetch_records_sql = mysqli_query(
                                        $mysqli,
                                        "SELECT * FROM ploughing_service_providers sp
                                        INNER JOIN login l ON l.login_id = sp.service_provider_login_id
                                        WHERE l.login_id = '{$_SESSION['login_id']}'"
                                    );
                                    if (mysqli_num_rows($fetch_records_sql) > 0) {
                                        while ($rows = mysqli_fetch_array($fetch_records_sql)) {
                                            ?>

                                            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                                <form method="post" enctype="multipart/form-data" role="form">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="mb-3 col-12">
                                                                <label for="exampleInputEmail1" class="form-label">Full Names</label>
                                                                <input required type="hidden" name="service_provider_login_id" value="<?php echo $rows['service_provider_login_id']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                <input required type="text" name="service_provider_name" value="<?php echo $rows['service_provider_name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="mb-3 col-6">
                                                                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                                                <input required type="email" name="login_email" value="<?php echo $rows['login_email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="mb-3 col-6">
                                                                <label for="exampleInputEmail1" class="form-label">Contacts</label>
                                                                <input required type="text" name="service_provider_contacts" value="<?php echo $rows['service_provider_contacts']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="mb-3 col-12">
                                                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                                                <input required type="text" name="service_provider_address" value="<?php echo $rows['service_provider_address']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="Update_Service_Provider" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade show " id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="mb-3 col-12">
                                                            <label for="exampleInputEmail1" class="form-label">Login Username</label>
                                                            <input required type="text" name="login_email" class="form-control" value="<?php echo $rows['login_email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>

                                                        <div class="mb-4 col-6">
                                                            <label for="exampleInputPassword1" class="form-label">Login Password</label>
                                                            <input required type="password" name="new_password" class="form-control" id="exampleInputPassword1">
                                                        </div>
                                                        <div class="mb-4 col-6">
                                                            <label for="exampleInputPassword1" class="form-label">Confirm Login Password</label>
                                                            <input required type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end mb-4">
                                                        <button type="submit" name="Update_Auth_Details" class=" btn btn-primary rounded-2">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                    <?php }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('../app/partials/backoffice_footer.php'); ?>
        </div>
    </div>
    </div>
    <?php require_once('../app/partials/backoffice_scripts.php'); ?>
</body>

</html>