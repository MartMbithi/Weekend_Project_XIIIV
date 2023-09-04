<!-- Pay Orders -->

<!-- Edit Orders -->
<div class="modal fade fixed-right" id="update_<?php echo $orders['order_id']; ?>" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="text-center">
                    <h6 class="mb-0 text-bold">Update order</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Order QTY</label>
                            <input type="hidden" required name="order_product_id" value="<?php echo $orders['order_product_id']; ?>" class="form-control">
                            <input type="text" required name="order_qty" value="<?php echo $orders['order_qty']; ?>" class="form-control">
                            <input type="hidden" required name="order_id" value="<?php echo $orders['order_id']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Date</label>
                            <input type="date" required name="order_date" value="<?php echo $orders['order_date']; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="Update_Orders" class="btn btn-outline-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete Orders -->
<div class="modal fade" id="delete_<?php echo $orders['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <img src='../public/img/bin.gif' height="120px">
                    <h4>Cancel this order ?</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="order_id" value="<?php echo $orders['order_id']; ?>">
                    <input type="hidden" name="order_qty" value="<?php echo $orders['order_qty']; ?>">
                    <input type="hidden" name="order_product_id" value="<?php echo $orders['order_product_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Orders" class="text-center btn btn-danger">Yes, Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>