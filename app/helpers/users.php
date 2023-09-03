<?php
/* Staff Detils */


/* Add Staff */
if (isset($_POST['Add_Staff'])) {
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $user_contact = mysqli_real_escape_string($mysqli, $_POST['user_contact']);
    $user_address = mysqli_real_escape_string($mysqli, $_POST['user_address']);
    $login_email = mysqli_real_escape_string($mysqli, $_POST['login_email']);
    $login_password = mysqli_real_escape_string($mysqli, $_POST['login_password']);
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
if (isset($_POST['Add_Staff'])) {
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
    $delete_sql = "DELETE FROM login WHERE login_id = '{$login_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "User detais deleted";
    } else {
        $err = "Failed, please try again";
    }
}











/* Customer Details */