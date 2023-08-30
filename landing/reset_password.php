<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/helpers/auth.php');
require_once('../app/partials/backoffice_head.php');
?>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-4 col-lg-4 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../public/backoffice/images/logos/dark-logo.svg" width="180" alt="">
                                </a>
                                <p class="text-center">Reset Password</p>
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                        <input required type="email" name="login_username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" name="Reset_Password_1" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Reset password</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Remembered password?</p>
                                        <a class="text-primary fw-bold ms-2" href="login">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('../app/partials/backoffice_scripts.php'); ?>
</body>

</html>