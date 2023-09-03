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
                            <h1 class="m-0 text-dark"> Customers</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Customers</li>
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
                            Add customers
                        </button>
                    </div>
                    <hr>
                    <!-- Add Modal -->
                    <div class="modal fade fixed-right" id="add_modal" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="text-center">
                                        <h6 class="mb-0 text-bold">Register new customer</h6>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="">Full names</label>
                                                <input type="text" required name="customer_name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Contacts</label>
                                                <input type="text" required name="customer_contact" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Address</label>
                                                <input type="text" required name="customer_address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" name="Add_Customer" class="btn btn-outline-success">Add</button>
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
                                    <h5 class="card-title">Registered customers</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table data_table table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/no</th>
                                                <th>Names</th>
                                                <th>Contacts</th>
                                                <th>Address</th>
                                                <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $customers_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM customers"
                                            );
                                            if (mysqli_num_rows($customers_sql) > 0) {
                                                $cnt = 1;
                                                while ($customers = mysqli_fetch_array($customers_sql)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td>
                                                            <?php echo $customers['customer_name']; ?> <br>
                                                        </td>
                                                        <td><?php echo $customers['customer_contact']; ?></td>
                                                        <td><?php echo $customers['customer_address']; ?></td>
                                                        <td>
                                                            <a data-toggle="modal" href="#update_<?php echo $customers['customer_id']; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                            <a data-toggle="modal" href="#delete_<?php echo $customers['customer_id']; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt = $cnt + 1;
                                                    include('../app/modals/customers.php');
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