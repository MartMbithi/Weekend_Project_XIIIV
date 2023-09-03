<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/functions/analytics.php');
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
                            <h1 class="m-0 text-dark"> Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Dashbord</li>
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
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box card-outline card-success">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Customers</span>
                                    <span class="info-box-number">
                                        <?php echo $customers; ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box card-outline card-success">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-tie"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Staffs</span>
                                    <span class="info-box-number">
                                        <?php echo $staffs; ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box card-outline card-success">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-shield"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Administrators</span>
                                    <span class="info-box-number">
                                        <?php echo $admins; ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box card-outline card-success">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-boxes"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Products</span>
                                    <span class="info-box-number">
                                        <?php echo $products; ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box card-outline card-success">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Orders</span>
                                    <span class="info-box-number">
                                        <?php echo $total_orders; ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box card-outline card-success">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Paid Orders</span>
                                    <span class="info-box-number">
                                        <?php echo $paid_orders; ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->


                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box card-outline card-success">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-times"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Unpaid Orders</span>
                                    <span class="info-box-number">
                                        <?php echo $unpaid_orders; ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box card-outline card-success">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding-usd"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Cumulative Revenue</span>
                                    <span class="info-box-number">
                                        Ksh <?php echo number_format($payments); ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h5 class="card-title">Recent Orders</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table data_table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Product</th>
                                                <th>Order QTY</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $orders_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM orders o INNER JOIN customers c
                                                ON c.customer_id = o.order_customer_id INNER JOIN
                                                products p ON p.product_id = o.order_product_id"
                                            );
                                            if (mysqli_num_rows($orders_sql) > 0) {
                                                while ($orders = mysqli_fetch_array($orders_sql)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $orders['customer_name']; ?></td>
                                                        <td><?php echo $orders['product_name']; ?></td>
                                                        <td><?php echo $orders['order_qty']; ?></td>
                                                        <td><?php echo date('d M Y', strtotime($orders['order_date'])); ?></td>
                                                        <td>Ksh <?php echo number_format($orders['order_price']); ?></td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
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