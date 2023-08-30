<div class="modal fade fixed-right" id="update_<?php echo $system_users['request_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="modal-title">
                    <h6 class="mb-0">Update Service Request</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Farm Location</label>
                            <input required type="hidden" name="request_id" value="<?php echo $system_users['request_id']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <input required type="text" name="request_location" value="<?php echo $system_users['request_location']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Farm Size (Ha)</label>
                            <input required type="text" name="request_farm_size" value="<?php echo $system_users['request_farm_size']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Ploughing Date</label>
                            <input required type="date" name="request_date" value="<?php echo $system_users['request_date']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Service Cost</label>
                            <input required type="text" name="request_cost" value="<?php echo $system_users['request_cost']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Update_Service" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade fixed-right" id="pay_<?php echo $system_users['request_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="modal-title">
                    <h6 class="mb-0">Pay Request</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label for="exampleInputEmail1" class="form-label">Payment Ref</label>
                            <input required type="hidden" name="payment_request_id" class="form-control" value="<?php echo $system_users['request_id']; ?>">
                            <input required type="text" readonly name="payment_ref_code" class="form-control" value="<?php echo $code; ?>">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="exampleInputEmail1" class="form-label">Payment Amount</label>
                            <input required type="text" readonly name="payment_amount" class="form-control" value="<?php echo $system_users['request_cost']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="exampleInputEmail1" class="form-label">Payment Means</label>
                            <select required type="text" name="payment_means" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <option>Cash</option>
                                <option>Debit / Credit Card</option>
                                <option>Mpesa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Pay_Service" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $system_users['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>Delete <br> <?php echo $system_users['farmer_name']; ?> details?</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="request_id" value="<?php echo $system_users['request_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="submit" name="Delete_Service" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>