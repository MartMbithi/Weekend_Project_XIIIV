<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/helpers/users.php');
require_once('../app/partials/head.php');
?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once('../app/partials/navigation.php');
        $user_details_sql = mysqli_query(
            $mysqli,
            "SELECT * FROM users u
            INNER JOIN login l ON l.login_id = u.user_login_id
            WHERE user_login_id = '{$login_id}'"
        );
        if (mysqli_num_rows($user_details_sql) > 0) {
            while ($user = mysqli_fetch_array($user_details_sql)) {
        ?>
                <!-- /.navbar -->

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0"><?php echo $user['user_name']; ?> Profile Details</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                        <li class="breadcrumb-item"><a href="dashboard">Dashbard</a></li>
                                        <li class="breadcrumb-item active">Profile Settings</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <div class="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <!-- Profile Image -->
                                    <div class="card card-success card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="../public/img/avatar.png" alt="User profile picture">
                                            </div>

                                            <h3 class="profile-username text-center"><?php echo $user['user_name']; ?></h3>

                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Contacts: </b> <a class="float-right"><?php echo $user['user_contact']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Email: </b> <a class="float-right"><?php echo $user['login_email']; ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Address: </b> <a class="float-right"><?php echo $user['user_address']; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-md-9">
                                    <div class="card card-success card-outline">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3 col-sm-3">
                                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Edit personal details</a>
                                                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Change password</a>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-sm-9">
                                                    <div class="tab-content" id="vert-tabs-tabContent">
                                                        <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Edit personal details</h3>
                                                            </div>
                                                            <br>

                                                            <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                                                <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="">Full names</label>
                                                                        <input type="text" required name="user_names" value="<?php echo $user['user_names']; ?>" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label for="">Login username</label>
                                                                        <input type="text" required name="user_login_name" value="<?php echo $user['user_login_name']; ?>" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="Update_Personal_Details" class="btn btn-outline-success">Save</button>
                                                                </div>
                                                            </form>
                                                            <!-- /.card-body -->
                                                        </div>
                                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Change login details</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="">Old password</label>
                                                                            <input type="password" required name="old_password" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="">New password</label>
                                                                            <input type="password" required name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="">Confirm password</label>
                                                                            <input type="password" required name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <button type="submit" name="Update_Personal_Password" class="btn btn-outline-success">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Main Footer -->
                    </div>
                    <!-- ./wrapper -->
            <?php }
        } ?>
                </div>

                <!-- Scripts -->
                <?php require_once('../app/partials/scripts.php'); ?>

    </div>
</body>

</html>