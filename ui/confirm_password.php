<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/helpers/auth.php');
require_once('../app/partials/head.php');
?>

<body class="hold-transition login-page" style="background-image: url('../public/img/main_bg.png'); background-size: cover;">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="#">Bakery Management System</a>
                </div>
                <hr>
                <p class="login-box-msg">Enter new password and confirm it</p>
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required name="new_password" placeholder="New Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required name="confirm_password" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <button type="submit" name="Reset_Password_Step_2" class="btn btn-primary btn-block">
                                Confirm Password
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <?php require_once('../app/partials/scripts.php'); ?>

</body>


</html>