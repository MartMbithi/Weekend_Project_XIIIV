<?php
/* Staff Detils */

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
/* Customer Details */