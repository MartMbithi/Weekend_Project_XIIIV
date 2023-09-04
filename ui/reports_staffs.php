<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/partials/head.php');
?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once('../app/partials/navigation.php'); ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Staffs</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item"><a href="">Reports</a></li>
                                <li class="breadcrumb-item active">Staffs</li>
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
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h5 class="card-title">Staffs Reports</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table export_dt table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/no</th>
                                                <th>Names</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Contacts</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $users_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM users u
                                                INNER JOIN login l ON l.login_id = u.user_login_id"
                                            );
                                            if (mysqli_num_rows($users_sql) > 0) {
                                                $cnt = 1;
                                                while ($users = mysqli_fetch_array($users_sql)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td>
                                                            <?php echo $users['user_name']; ?> <br>
                                                            <?php if ($users['login_rank'] == '0') { ?>
                                                                <span class="badge badge-success">Staff</span>
                                                            <?php } else { ?>
                                                                <span class="badge badge-danger">Administrator</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo $users['login_email']; ?></td>
                                                        <td><?php echo $users['user_address']; ?></td>
                                                        <td><?php echo $users['user_contact']; ?></td>
                                                    </tr>
                                            <?php
                                                    $cnt = $cnt + 1;
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
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php require_once('../app/partials/footer.php'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <?php require_once('../app/partials/scripts.php'); ?>
</body>


</html>