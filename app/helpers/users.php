<?php
/* Staff Detils */


/* Add Staff */
if (isset($_POST['Add_Staff'])) {
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $user_contact = mysqli_real_escape_string($mysqli, $_POST['user_contact']);
    $user_address = mysqli_real_escape_string($mysqli, $_POST['user_address']);
    $login_email = mysqli_real_escape_string($mysqli, $_POST['login_email']);
    $login_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['login_password'])));
    $login_rank = mysqli_real_escape_string($mysqli, $_POST['login_rank']);

    /* Prevent duplications */
    $sql = "SELECT * FROM  login WHERE login_email = '{$login_email}' ";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $err = "User details already exists";
    } else {
        /* Persist Auth */
        $add_auth = "INSERT INTO login(login_email, login_password, login_rank)
        VALUES('{$login_email}', '{$login_password}', '{$login_rank}')";

        if (mysqli_query($mysqli, $add_auth)) {
            /* Get User Login ID*/
            $user_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

            /* Persist User Details On Users Table */
            $add_user = "INSERT INTO users (user_login_id, user_name, user_contact, user_address)
            VALUES('{$user_login_id}', '{$user_name}', '{$user_contact}', '{$user_address}')";

            if (mysqli_query($mysqli, $add_user)) {
                $success = "User account created";
            } else {
                $err = "Failed to create user account, please try again";
            }
        } else {
            $err = "Failed to persist auth details, please try again";
        }
    }
}


/* Update Staff */
if (isset($_POST['Update_Staff'])) {
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $user_contact = mysqli_real_escape_string($mysqli, $_POST['user_contact']);
    $user_address = mysqli_real_escape_string($mysqli, $_POST['user_address']);
    $login_email = mysqli_real_escape_string($mysqli, $_POST['login_email']);
    $login_rank = mysqli_real_escape_string($mysqli, $_POST['login_rank']);
    $user_login_id = mysqli_real_escape_string($mysqli, $_POST['user_login_id']);

    /* Persist */
    $update_auth = "UPDATE login SET login_email = '{$login_email}', login_rank = '{$login_rank}'
    WHERE login_id = '{$user_login_id}'";
    $update_staff = "UPDATE users SET user_name = '{$user_name}', user_contact = '{$user_contact}', user_address = '{$user_address}'
    WHERE user_login_id = '{$user_login_id}'";

    if (mysqli_query($mysqli, $update_auth) && mysqli_query($mysqli, $update_staff)) {
        $success = "User account details updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Change Password */
if (isset($_POST['Change_Password'])) {
    $user_login_id  = mysqli_real_escape_string($mysqli, $_POST['user_login_id']);
    $new_password =  sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Change Password */
    $change_password_sql = "UPDATE login SET login_password = '{$confirm_password}' WHERE login_id = '{$user_login_id}'";

    if (mysqli_query($mysqli, $change_password_sql)) {
        $success = "Password updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Staff */
if (isset($_POST['Delete_Staff'])) {
    $user_login_id = mysqli_real_escape_string($mysqli, $_POST['user_login_id']);

    /* Delete */
    $delete_sql = "DELETE FROM login WHERE login_id = '{$user_login_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "User detais deleted";
    } else {
        $err = "Failed, please try again";
    }
}




/* Customer Details */

/* Add Customer */
if (isset($_POST['Add_Customer'])) {
    $customer_name = mysqli_real_escape_string($mysqli, $_POST['customer_name']);
    $customer_contact = mysqli_real_escape_string($mysqli, $_POST['customer_contact']);
    $customer_address = mysqli_real_escape_string($mysqli, $_POST['customer_address']);

    /* Prevent Duplications */
    $duplication_checker_sql = "SELECT * FROM  customers WHERE customer_contact = '{$customer_contact}' ";
    $res = mysqli_query($mysqli, $duplication_checker_sql);
    if (mysqli_num_rows($res) > 0) {
        $err = "Customer details already exists";
    } else {
        /* Persist */
        $add_customer_sql = "INSERT INTO customers (customer_name, customer_contact, customer_address)
        VALUES('{$customer_name}', '{$customer_contact}', '{$customer_address}')";

        if (mysqli_query($mysqli, $add_customer_sql)) {
            $success = "Customer added";
        } else {
            $err = "Failed, please try again";
        }
    }
}


/* Update Customer */
if (isset($_POST['Update_Customer'])) {
    $customer_name = mysqli_real_escape_string($mysqli, $_POST['customer_name']);
    $customer_contact = mysqli_real_escape_string($mysqli, $_POST['customer_contact']);
    $customer_address = mysqli_real_escape_string($mysqli, $_POST['customer_address']);
    $customer_id = mysqli_real_escape_string($mysqli, $_POST['customer_id']);

    /* Persist */
    $update_customer_sql = "UPDATE customers SET customer_name = '{$customer_name}', customer_contact = '{$customer_contact}',
    customer_address = '{$customer_address}' WHERE customer_id = '{$customer_id}'";

    if (mysqli_query($mysqli, $update_customer_sql)) {
        $success = "Customer details updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Customer */
if (isset($_POST['Delete_Customer'])) {
    $customer_id = mysqli_real_escape_string($mysqli, $_POST['customer_id']);

    /* Persist */
    $delete_customer_sql = "DELETE FROM customers WHERE customer_id = '{$customer_id}'";

    if (mysqli_query($mysqli, $delete_customer_sql)) {
        $success  = "Customer details deleted";
    } else {
        $err = "Failed, please try again";
    }
}
