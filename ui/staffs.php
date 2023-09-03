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
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-outline-success">
                            Add system users
                        </button>
                    </div>
                    <hr>
                    <!-- Add Modal -->
                    <div class="modal fade fixed-right" id="add_modal" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="text-center">
                                        <h6 class="mb-0 text-bold">Register new user</h6>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="">Full names</label>
                                                <input type="text" required name="user_name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Access level</label>
                                                <select type="text" required name="login_rank" class="form-control select2bs4">
                                                    <option value="0">Staff</option>
                                                    <option value="1">Administrator</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Login email</label>
                                                <input type="text" required name="login_email" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Login password</label>
                                                <input type="password" required name="login_password" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Contacts</label>
                                                <input type="text" required name="user_contact" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Address</label>
                                                <input type="text" required name="user_address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="Add_Staff" class="btn btn-outline-success">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h5 class="card-title">Registered system users</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table data_table table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/no</th>
                                                <th>Names</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Contacts</th>
                                                <th>Manage</th>
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
                                                        <td>
                                                            <a data-toggle="modal" href="#update_<?php echo $users['user_id']; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                            <a data-toggle="modal" href="#password_<?php echo $users['user_id']; ?>" class="badge badge-warning"><i class="fas fa-lock"></i> Change password</a>
                                                            <a data-toggle="modal" href="#delete_<?php echo $users['user_id']; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt = $cnt + 1;
                                                    include('../app/modals/users.php');
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