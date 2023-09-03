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
/* Delete Product */