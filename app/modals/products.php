<!-- Order -->
<div class="modal fade fixed-right" id="order_<?php echo $products['product_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Order <?php echo $products['product_name']; ?></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="">Customer</label>
                            <input type="hidden" required name="product_price" value="<?php echo $products['product_price']; ?>" class="form-control">
                            <input type="hidden" required name="product_id" value="<?php echo $products['product_id']; ?>" class="form-control">
                            <select type="text" required name="order_customer_id" class="form-control select2bs4">
                                <option value="">Select Customer</option>
                                <?php
                                $customers_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM customers"
                                );
                                if (mysqli_num_rows($customers_sql) > 0) {
                                    while ($customers = mysqli_fetch_array($customers_sql)) {
                                ?>
                                        <option value="<?php echo $customers['customer_id']; ?>"><?php echo $customers['customer_name']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Order QTY</label>
                            <input type="text" required name="order_qty" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Date</label>
                            <input type="date" required name="order_date" class="form-control">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="Add_Order" class="btn btn-outline-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Order -->

<!-- Edit -->
<div class="modal fade fixed-right" id="update_<?php echo $products['product_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Update product</h6>
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
                            <input type="hidden" required name="product_id" value="<?php echo $products['product_id']; ?>" class="form-control">
                            <input type="text" required name="product_name" value="<?php echo $products['product_name']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Product Category</label>
                            <select type="text" required name="product_category_id" class="form-control select2bs4">
                                <option value="<?php echo $products['category_id']; ?>"><?php echo $products['category_name']; ?></option>
                                <?php
                                $categories_sql = mysqli_query(
                                    $mysqli,
                                    "SELECT * FROM categories
                                    WHERE category_id != '{$products['category_id']}'"
                                );
                                if (mysqli_num_rows($categories_sql) > 0) {
                                    while ($categories = mysqli_fetch_array($categories_sql)) {
                                ?>
                                        <option value="<?php echo $categories['category_id']; ?>"><?php echo $categories['category_name']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Product QTY</label>
                            <input type="text" required name="product_available_qty" value="<?php echo $products['product_available_qty']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Product Price</label>
                            <input type="text" required name="product_price" value="<?php echo $products['product_price']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Product Details</label>
                            <textarea type="text" required name="product_details" class="form-control"><?php echo $products['product_details']; ?></textarea>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="Update_Product" class="btn btn-outline-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit -->

<!-- Delete  -->

<!-- End Delete -->