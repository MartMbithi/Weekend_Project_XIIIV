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
                <div class="d-flex justify-content-between">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Administrators</h2>
                        <p class="mb-0">Manage system administrators</p>
                    </div>
                    <div class="">
                        <button data-bs-toggle="modal" data-bs-target="#add_modal" type="button" class="btn btn-outline-secondary m-1">Register Administrator</button>
                    </div>
                </div>
                <!-- Add Admin Modal -->
                <div class="modal fade fixed-right" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">
                                <div class="modal-title">
                                    <h6 class="mb-0">Register Administrator</h6>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form method="post" enctype="multipart/form-data" role="form">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-3 col-12">
                                            <label for="exampleInputEmail1" class="form-label">Full Names</label>
                                            <input required type="text" name="admin_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                            <input required type="email" name="login_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleInputEmail1" class="form-label">Contacts</label>
                                            <input required type="text" name="admin_contacts" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                                            <input required type="text" name="admin_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="Add_Admin" class="btn btn-primary">Save</button>
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
                                                <th>Full Name</th>
                                                <th>Email Address</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $system_users_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM administrator a
                                                INNER JOIN login l ON l.login_id = a.admin_login_id"
                                            );
                                            if (mysqli_num_rows($system_users_sql) > 0) {
                                                while ($system_users = mysqli_fetch_array($system_users_sql)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $system_users['admin_name']; ?></td>
                                                        <td><?php echo $system_users['login_email']; ?></td>
                                                        <td><?php echo $system_users['admin_contacts']; ?></td>
                                                        <td><?php echo $system_users['admin_address']; ?></td>
                                                        <td>
                                                            <a data-bs-toggle="modal" href="#update_<?php echo $system_users['admin_id']; ?>" class="badge bg-warning"><i class="ti ti-edit"></i> Edit</a>
                                                            <a data-bs-toggle="modal" href="#delete_<?php echo $system_users['admin_id']; ?>" class="badge bg-danger"><i class="ti ti-trash"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    include('../app/modals/admins.php');
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
    <?php require_once('../app/partials/backoffice_scripts.php'); ?>
</body>

</html>