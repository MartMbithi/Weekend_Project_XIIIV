<?php
session_start();
require_once('../app/config/config.php');
require_once('../app/config/checklogin.php');
require_once('../app/helpers/products.php');
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
                            <h1 class="m-0 text-dark"> Inventory</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Reports</a></li>
                                <li class="breadcrumb-item active">Inventory</li>
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
                                    <h5 class="card-title">Products Inventory</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table export_dt table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/no</th>
                                                <th>Category</th>
                                                <th>Product</th>
                                                <th>Details</th>
                                                <th>QTY Available</th>
                                                <th>Unit Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $products_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM products p INNER JOIN
                                                categories c ON c.category_id = p.product_category_id"
                                            );
                                            if (mysqli_num_rows($products_sql) > 0) {
                                                $cnt = 1;
                                                while ($products = mysqli_fetch_array($products_sql)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>
                                                        <td>
                                                            <?php echo $products['category_name']; ?> <br>
                                                        </td>
                                                        <td>
                                                            <?php echo $products['product_name']; ?> <br>
                                                        </td>
                                                        <td>
                                                            <?php echo $products['product_details']; ?> <br>
                                                        </td>
                                                        <td>
                                                            <?php echo $products['product_available_qty']; ?> <br>
                                                        </td>
                                                        <td>
                                                            Ksh <?php echo number_format($products['product_price']); ?> <br>
                                                        </td>
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