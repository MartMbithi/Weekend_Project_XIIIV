<?php
/* Login */
if (isset($_POST['Login'])) {
    $login_email = mysqli_real_escape_string($mysqli, $_POST['login_email']);
    $login_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['login_password'])));

    /* Process login */
    $login_sql = "SELECT * FROM login WHERE login_email = '{$login_email}' AND login_password = '{$login_password}'";
    $res = mysqli_query($mysqli, $login_sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['login_id'] = $row['login_id'];
        $_SESSION['login_rank'] = $row['login_rank'];

        /* Bind success variable via session */
        $_SESSION['success'] = 'Logged in successfully';
        header('Location: dashboard');
        exit;
    } else {
        $_SESSION['err'] = 'Incorrect login details';
        header('Location: login');
        exit;
    }
}


/* Reset Password Step 1 */
if (isset($_POST['Reset_Password_1'])) {
    $login_email  = mysqli_real_escape_string($mysqli, $_POST['login_email']);

    /* Check If Login Username Exists */
    $username_checker = "SELECT * FROM login WHERE login_email = '{$login_email}'";
    $res = mysqli_query($mysqli, $username_checker);
    if (mysqli_num_rows($res) > 0) {
        /* Redirect to reset password step 2 */
        $_SESSION['login_email'] = $login_email;
        $_SESSION['success'] = "Login username verified, proceed to reset password";
        header('Location: confirm_password');
        exit;
    } else {
        $err = "Login email does not exist";
    }
}

/* Reset Password Step 2 */
if (isset($_POST['Reset_Password_Step_2'])) {
    $login_email = mysqli_real_escape_string($mysqli, $_SESSION['login_email']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Check Passwords Compatibility */
    if ($confirm_password != $new_password) {
        $err = "Passwords does not match";
    } else {
        /* Persist */
        $update_passwords = "UPDATE login SET login_password = '{$confirm_password}' WHERE login_email = '{$login_email}'";

        if (mysqli_query($mysqli, $update_passwords)) {
            /* Redirect to login */
            $_SESSION['success'] = "Login password updated, proceed to login";
            header('Location: login');
            exit;
        } else {
            $err = "Failed to update password, please try again";
        }
    }
}
