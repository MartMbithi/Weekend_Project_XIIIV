<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/helpers/auth.php');
require_once('../app/partials/head.php');
?>

<body class="hold-transition login-page" style="background-image: url('../public/img/main_bg.png'); background-size: cover;">
    <div class="login-box">
        <div class="card border border-success">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="#">Bakery Management System</a>
                </div>
                <p class="login-box-msg">Forgot password</p>
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" required name="login_email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12">
                            <button type="submit" name="Reset_Password_1" class="btn btn-primary btn-block">
                                Reset Password
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <hr>
                <p class="mb-1">
                    <a href="../">I remember password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <?php require_once('../app/partials/scripts.php'); ?>

</body>


</html>