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
                            <h1 class="m-0 text-dark"> Products</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Products</a></li>
                                <li class="breadcrumb-item active">Manage</li>
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
                            Add Product
                        </button>
                    </div>
                    <hr>
                    <!-- Add Modal -->
                    <div class="modal fade fixed-right" id="add_modal" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header align-items-center">
                                    <div class="text-center">
                                        <h6 class="mb-0 text-bold">Register new product</h6>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="">Product Name</label>
                                                <input type="text" required name="product_name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Product Category</label>
                                                <select type="text" required name="product_category_id" class="form-control select2bs4">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $categories_sql = mysqli_query(
                                                        $mysqli,
                                                        "SELECT * FROM categories"
                                                    );
                                                    if (mysqli_num_rows($categories_sql) > 0) {
                                                        $cnt = 1;
                                                        while ($categories = mysqli_fetch_array($categories_sql)) {
                                                    ?>
                                                            <option value="<?php echo $categories['category_id']; ?>"><?php echo $categories['category_name']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Product QTY</label>
                                                <input type="text" required name="product_available_qty" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Product Price</label>
                                                <input type="text" required name="product_price" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Product Details</label>
                                                <textarea type="text" required name="product_details" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <button type="submit" name="Add_Product" class="btn btn-outline-success">Add</button>
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
                                    <h5 class="card-title">Registered products</h5>
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
                                                            <a data-toggle="modal" href="#order_<?php echo $products['product_id']; ?>" class="badge badge-success"><i class="fas fa-shopping-cart"></i> Order</a>
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