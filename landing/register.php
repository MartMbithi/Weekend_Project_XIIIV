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
                    <div class="col-md-6 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../public/backoffice/images/logos/dark-logo.svg" width="180" alt="">
                                </a>
                                <p class="text-center">Sign In To Automated Ploughing System</p>
                                <ul class="nav nav-tabs text-center" id="custom-content-below-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-content-below-home-tab" data-bs-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Sign Up As Farmer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-content-below-profile-tab" data-bs-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Sign Up As Service Provider</a>
                                    </li>
                                </ul>
                                <br>
                                <div class="tab-content" id="custom-content-below-tabContent">
                                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                        <form method="post">
                                            <div class="row">
                                                <div class="mb-3 col-12">
                                                    <label for="exampleInputEmail1" class="form-label">Full Names</label>
                                                    <input required type="text" name="farmer_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                                    <input required type="email" name="login_username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="exampleInputEmail1" class="form-label">Contacts</label>
                                                    <input required type="text" name="farmer_contacts" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-4 col-6">
                                                    <label for="exampleInputPassword1" class="form-label">Login Password</label>
                                                    <input required type="password" name="new_password" class="form-control" id="exampleInputPassword1">
                                                </div>
                                                <div class="mb-4 col-6">
                                                    <label for="exampleInputPassword1" class="form-label">Confirm Login Password</label>
                                                    <input required type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
                                                </div>
                                                <div class="mb-3 col-12">
                                                    <label for="exampleInputEmail1" class="form-label">Address</label>
                                                    <input required type="text" name="farmer_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <button type="submit" name="Register_Farmer" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign up</button>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <p class="fs-4 mb-0 fw-bold">Already have account?</p>
                                                <a class="text-primary fw-bold ms-2" href="login">Sign In</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade show " id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                        <form method="post">
                                            <div class="row">
                                                <div class="mb-3 col-12">
                                                    <label for="exampleInputEmail1" class="form-label">Full Names</label>
                                                    <input required type="text" name="service_provider_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                                    <input required type="email" name="login_username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="exampleInputEmail1" class="form-label">Contacts</label>
                                                    <input required type="text" name="service_provider_contacts" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-4 col-6">
                                                    <label for="exampleInputPassword1" class="form-label">Login Password</label>
                                                    <input required type="password" name="new_password" class="form-control" id="exampleInputPassword1">
                                                </div>
                                                <div class="mb-4 col-6">
                                                    <label for="exampleInputPassword1" class="form-label">Confirm Login Password</label>
                                                    <input required type="password" name="confirm_password" class="form-control" id="exampleInputPassword1">
                                                </div>
                                                <div class="mb-3 col-12">
                                                    <label for="exampleInputEmail1" class="form-label">Address</label>
                                                    <input required type="text" name="service_provider_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <button type="submit" name="Register_Service_Provider" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign up</button>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <p class="fs-4 mb-0 fw-bold">Already have account?</p>
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
        </div>
    </div>
    <?php require_once('../app/partials/backoffice_scripts.php'); ?>
</body>

</html>