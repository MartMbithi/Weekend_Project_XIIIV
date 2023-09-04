<?php
/* Categories */

/* Add Category */
if (isset($_POST['Add_Category'])) {
    $category_name = mysqli_real_escape_string($mysqli, $_POST['category_name']);

    /* Prevent Duplications */
    $duplication_checker_sql = "SELECT * FROM  categories WHERE category_name = '{$category_name}' ";
    $res = mysqli_query($mysqli, $duplication_checker_sql);
    if (mysqli_num_rows($res) > 0) {
        $err = "Product category already exists";
    } else {
        /* Persist */
        $add_sql = "INSERT INTO categories (category_name)
        VALUES('{$category_name}')";

        if (mysqli_query($mysqli, $add_sql)) {
            $success = "Category added successfully";
        } else {
            $err  = "Failed, please try again later";
        }
    }
}

/* Update Category */
if (isset($_POST['Update_Category'])) {
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);
    $category_name = mysqli_real_escape_string($mysqli, $_POST['category_name']);

    /* Persist */
    $update_category_sql = "UPDATE categories SET category_name = '{$category_name}' WHERE category_id = '{$category_id}'";

    if (mysqli_query($mysqli, $update_category_sql)) {
        $success = "Category updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Category */
if (isset($_POST['Delete_Category'])) {
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);

    /* Persist */
    $delete_category_sql = "DELETE FROM categories WHERE category_id = '{$category_id}'";

    if (mysqli_query($mysqli, $delete_category_sql)) {
        $success = "Category deleted";
    }
}



/* Products */

/* Add Product */
if (isset($_POST['Add_Product'])) {
    $product_category_id = mysqli_real_escape_string($mysqli, $_POST['product_category_id']);
    $product_name = mysqli_real_escape_string($mysqli, $_POST['product_name']);
    $product_details = mysqli_real_escape_string($mysqli, $_POST['product_details']);
    $product_available_qty = mysqli_real_escape_string($mysqli, $_POST['product_available_qty']);
    $product_price = mysqli_real_escape_string($mysqli, $_POST['product_price']);

    $add_product_sql = "INSERT INTO products (product_category_id, product_name, product_details, product_available_qty, product_price)
    VALUES('{$product_category_id}', '{$product_name}', '{$product_details}', '{$product_available_qty}', '{$product_price}')";

    if (mysqli_query($mysqli, $add_product_sql)) {
        $success = "Product added successfully";
    } else {
        $err = "Failed, please try again";
    }
}


/* Update Product */
if (isset($_POST['Update_Product'])) {
    $product_category_id = mysqli_real_escape_string($mysqli, $_POST['product_category_id']);
    $product_name = mysqli_real_escape_string($mysqli, $_POST['product_name']);
    $product_details = mysqli_real_escape_string($mysqli, $_POST['product_details']);
    $product_available_qty = mysqli_real_escape_string($mysqli, $_POST['product_available_qty']);
    $product_price = mysqli_real_escape_string($mysqli, $_POST['product_price']);
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);

    /* Persist */
    $update_product_sql = "UPDATE products SET product_name = '{$product_name}', product_details = '{$product_details}',
    product_available_qty = '{$product_available_qty}', product_price = '{$product_price}', product_category_id = '{$product_category_id}'
    WHERE  product_id = '{$product_id}'";

    if (mysqli_query($mysqli, $update_product_sql)) {
        $success = "Product details updated successfully";
    } else {
        $err = "Failed, please try again";
    }
}


/* Delete Product */
if (isset($_POST['Delete_Product'])) {
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);

    /* Delete */
    $delete_product_sql = "DELETE FROM products WHERE product_id = '{$product_id}'";

    if (mysqli_query($mysqli, $delete_product_sql)) {
        $success = "Product deleted successfully";
    } else {
        $err = "Failed, please try again";
    }
}


/* Orders */

/* Add Order */
if (isset($_POST['Add_Order'])) {
    $order_customer_id = mysqli_real_escape_string($mysqli, $_POST['order_customer_id']);
    $order_product_id = mysqli_real_escape_string($mysqli, $_POST['order_product_id']);
    $order_qty = mysqli_real_escape_string($mysqli, $_POST['order_qty']);
    $new_qty = mysqli_real_escape_string(
        $mysqli,
        ($_POST['product_available_qty'] - $order_qty)
    );
    $order_status = mysqli_real_escape_string($mysqli, 'Unpaid');
    $order_date = mysqli_real_escape_string($mysqli, $_POST['order_date']);
    $order_price = mysqli_real_escape_string(
        $mysqli,
        ($_POST['product_price'] * $order_qty)
    );


    /* Persist Order */
    $add_order_sql = "INSERT INTO orders (order_customer_id, order_product_id, order_qty, order_status, order_date, order_price)
    VALUES('{$order_customer_id}', '{$order_product_id}', '{$order_qty}', '{$order_status}', '{$order_date}', '{$order_price}')";

    $deduct_product_sql = "UPDATE products SET product_available_qty = '{$new_qty}' WHERE product_id  = '{$order_product_id}'";

    if (mysqli_query($mysqli, $add_order_sql) && mysqli_query($mysqli, $deduct_product_sql)) {
        $success = "Order posted, proceed to pay";
    } else {
        $err = "Failed, please try again";
    }
}
