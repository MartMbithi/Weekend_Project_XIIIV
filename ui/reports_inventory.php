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
                                    <table class="table data_table table-striped">
                                        <thead>
                                            <tr>
                                                <th>S/no</th>
                                                <th>Category</th>
                                                <th>Product</th>
                                                <th>Details</th>
                                                <th>QTY</th>
                                                <th>Unit Price</th>
                                                <th>Manage</th>
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
                                                        <td>
                                                            <?php if ($products['product_available_qty'] > 0) { ?>
                                                                <a data-toggle="modal" href="#order_<?php echo $products['product_id']; ?>" class="badge badge-success"><i class="fas fa-shopping-cart"></i> Order</a>
                                                            <?php } ?>
                                                            <a data-toggle="modal" href="#update_<?php echo $products['product_id']; ?>" class="badge badge-primary"><i class="fas fa-edit"></i> Edit</a>
                                                            <a data-toggle="modal" href="#delete_<?php echo $products['product_id']; ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt = $cnt + 1;
                                                    include('../app/modals/products.php');
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