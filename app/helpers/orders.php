<?php
/*Update Orders */

/* Delete Orders */

/* Pay Orders */
if (isset($_POST['Pay_Order'])) {
    $order_id = mysqli_real_escape_string($mysqli, $_POST['order_id']);
    $order_status = mysqli_real_escape_string($mysqli, $_POST['order_status']);

    /* Payment */
    $add_payment = "UPDATE orders SET order_status = '{$order_status}' WHERE order_id = '{$order_id}'";

    if (mysqli_query($mysqli, $add_payment)) {
        $success = "Payment Successful";
    } else {
        $err = "Failed, please try again";
    }
}
