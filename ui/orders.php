<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/helpers/orders.php');
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
                            <h1 class="m-0 text-dark"> Orders</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Orders</li>
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
                                    <h5 class="card-title">Registered orders</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table data_table table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/no</th>
                                                <th>Customer</th>
                                                <th>Product</th>
                                                <th>Order QTY</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $orders_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM orders o
                                                INNER JOIN products p ON o.order_product_id = p.product_id
                                                INNER JOIN customers c ON o.order_customer_id = c.customer_id"
                                            );
                                            if (mysqli_num_rows($orders_sql) > 0) {
                                                $cnt = 1;
                                                while ($orders = mysqli_fetch_array($orders_sql)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td>
                                                            <?php echo $orders['customer_name']; ?> <br>
                                                        </td>
                                                        <td>
                                                            <?php echo $orders['product_name']; ?> <br>
                                                        </td>
                                                        <td>
                                                            <?php echo $orders['order_qty']; ?> <br>
                                                        </td>
                                                        <td>
                                                            Ksh <?php echo number_format($orders['order_price']); ?> <br>
                                                        </td>
                                                        <td>
                                                            <?php echo date('d M Y', strtotime($orders['order_date'])); ?> <br>
                                                        </td>
                                                        <td>
                                                            <?php if ($orders['order_status'] != 'Paid') { ?>
                                                                <a data-toggle="modal" href="#pay_<?php echo $orders['order_id']; ?>" class="badge badge-success"><i class="fas fa-hand-holding-usd"></i> Pay</a>
                                                            <?php } ?>
                                                            <a data-toggle="modal" href="#update_<?php echo $orders['order_id']; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                            <a data-toggle="modal" href="#delete_<?php echo $orders['order_id']; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt = $cnt + 1;
                                                    include('../app/modals/orders.php');
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