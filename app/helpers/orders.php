<?php
/*Update Orders */
if (isset($_POST['Update_Orders'])) {
    $order_id = mysqli_real_escape_string($mysqli, $_POST['order_id']);
    $order_qty = mysqli_real_escape_string($mysqli, $_POST['order_qty']);
    $order_product_id = mysqli_real_escape_string($mysqli, $_POST['order_product_id']);
    $order_status = mysqli_real_escape_string($mysqli, $_POST['order_status']);

    /* Roll Back */
    $roll_back_product = "UPDATE products SET product_available_qty = product_available_qty + '{$order_qty}' WHERE product_id = '{$order_product_id}'";
    $update_order = "UPDATE orders SET order_qty = '{$order_qty}', order_status = '{$order_status}' WHERE order_id = '{$order_id}'";

    if (mysqli_query($mysqli, $update_order) && mysqli_query($mysqli, $roll_back_product)) {
        $success = "Order updated";
    } else {
        $err = "Failed, Please try again";
    }
}

/* Delete Orders */
if (isset($_POST['Delete_Orders'])) {
    $order_id = mysqli_real_escape_string($mysqli, $_POST['order_id']);
    $order_qty = mysqli_real_escape_string($mysqli, $_POST['order_qty']);
    $order_product_id = mysqli_real_escape_string($mysqli, $_POST['order_product_id']);

    /* Roll Back */
    $roll_back_product = "UPDATE products SET product_available_qty = product_available_qty + '{$order_qty}' WHERE product_id = '{$order_product_id}'";
    $delete_order = "DELETE FROM orders WHERE order_id = '{$order_id}'";

    if (mysqli_query($mysqli, $delete_order) && mysqli_query($mysqli, $roll_back_product)) {
        $success = "Order deleted";
    } else {
        $err = "Failed, Please try again";
    }
}


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
