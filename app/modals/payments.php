<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $system_users['payment_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>Delete <br> <?php echo $system_users['farmer_name']; ?> payment record?</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="payment_id" value="<?php echo $system_users['payment_id']; ?>">
                    <input type="hidden" name="payment_request_id" value="<?php echo $system_users['payment_request_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Payment" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>