<div class="modal fade fixed-right" id="update_<?php echo $system_users['admin_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="modal-title">
                    <h6 class="mb-0">Update Administrator</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="exampleInputEmail1" class="form-label">Full Names</label>
                            <input required type="hidden" name="admin_login_id" value="<?php echo $system_users['admin_login_id']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <input required type="text" name="admin_name" value="<?php echo $system_users['admin_name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Email Address</label>
                            <input required type="email" name="login_email" value="<?php echo $system_users['login_email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Contacts</label>
                            <input required type="text" name="admin_contacts" value="<?php echo $system_users['admin_contacts']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <input required type="text" name="admin_address" value="<?php echo $system_users['admin_address']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Update_Admin" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $system_users['admin_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-body text-center text-danger">
                    <h4>Delete <br> <?php echo $system_users['admin_name']; ?> details?</h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="login_id" value="<?php echo $system_users['login_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="submit" name="Delete_User" class="text-center btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>