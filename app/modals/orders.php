<!-- Pay Orders -->
<div class="modal fade" id="pay_<?php echo $orders['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>Pay this order ?</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="order_id" value="<?php echo $orders['order_id']; ?>">
                    <input type="hidden" name="order_status" value="Paid">
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="Pay_Order" class="text-center btn btn-danger">Yes, Pay</button>
                </div>
            </form>
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