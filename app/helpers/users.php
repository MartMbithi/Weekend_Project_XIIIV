<?php
/*
 *   Crafted On Sun May 21 2023
 *   Author Martin Mbithi (martin@devlan.co.ke)
 *   
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */
/* Add Admin */
if (isset($_POST['Add_Admin'])) {
    $admin_name = mysqli_real_escape_string($mysqli, $_POST['admin_name']);
    $admin_contacts = mysqli_real_escape_string($mysqli, $_POST['admin_contacts']);
    $admin_address = mysqli_real_escape_string($mysqli, $_POST['admin_address']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));
    $login_email = mysqli_real_escape_string($mysqli, $_POST['login_email']);

    /* Prevent Duplications */
    /* Check Passwords */
    if ($confirm_password != $new_password) {
        $err = "Passwords does not match";
    } else {

        /* Prevent Duplications */
        $duplication_checker = "SELECT * FROM login WHERE login_email = '{$login_email}'";
        $res = mysqli_query($mysqli, $duplication_checker);
        if (mysqli_num_rows($res) > 0) {
            $err = "An account with this email already exists";
        } else {
            /* Persist */
            $add_admin_auth = "INSERT INTO login (login_email, login_password, login_rank)
            VALUES('{$login_email}', '{$confirm_password}', 'Admin')";

            if (mysqli_query($mysqli, $add_admin_auth)) {
                /* Get Admin Login ID */
                $admin_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

                /* Persist Farmer */
                $add_admin_sql = "INSERT INTO administrator (admin_login_id, admin_name, admin_contacts, admin_address)
                VALUES('{$admin_login_id}', '{$admin_name}', '{$admin_contacts}', '{$admin_address}')";

                if (mysqli_query($mysqli, $add_admin_sql)) {
                    $success = "Account created";
                } else {
                    $err = "Failed, please try again";
                }
            } else {
                $err = "Please try again";
            }
        }
    }
}

/* Update Admin */
if (isset($_POST['Update_Admin'])) {
    $admin_name = mysqli_real_escape_string($mysqli, $_POST['admin_name']);
    $admin_contacts = mysqli_real_escape_string($mysqli, $_POST['admin_contacts']);
    $admin_address = mysqli_real_escape_string($mysqli, $_POST['admin_address']);
    $admin_login_id = mysqli_real_escape_string($mysqli, $_POST['admin_login_id']);
    $login_email  = mysqli_real_escape_string($mysqli, $_POST['login_email']);

    /* Persist */
    $update_sql = "UPDATE administrator SET admin_name = '{$admin_name}',admin_contacts = '{$admin_contacts}', admin_address = '{$admin_address}'
    WHERE admin_login_id = '{$admin_login_id}'";
    $update_login = "UPDATE login SET login_email = '{$login_email}' WHERE login_id = '{$admin_login_id}'";

    if (mysqli_query($mysqli, $update_sql) && mysqli_query($mysqli, $update_login)) {
        $success = "Profile Details Updated";
    } else {
        $err = "Failed, Please Try Again";
    }
}

/* *********************************************************************************** */

/* Add Farmer */
if (isset($_POST['Add_Farmer'])) {
    $farmer_name = mysqli_real_escape_string($mysqli, $_POST['farmer_name']);
    $farmer_contacts = mysqli_real_escape_string($mysqli, $_POST['farmer_contacts']);
    $farmer_address = mysqli_real_escape_string($mysqli, $_POST['farmer_address']);
    $login_email = mysqli_real_escape_string($mysqli, $_POST['login_email']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));
    $login_rank = mysqli_real_escape_string($mysqli, 'Farmer');

    /* Check Passwords */
    if ($confirm_password != $new_password) {
        $err = "Passwords does not match";
    } else {

        /* Prevent Duplications */
        $duplication_checker = "SELECT * FROM login WHERE login_email = '{$login_email}'";
        $res = mysqli_query($mysqli, $duplication_checker);
        if (mysqli_num_rows($res) > 0) {
            $err = "An account with this email already exists";
        } else {
            /* Persist */
            $add_farmer_auth = "INSERT INTO login (login_email, login_password, login_rank)
            VALUES('{$login_email}', '{$confirm_password}', '{$login_rank}')";

            if (mysqli_query($mysqli, $add_farmer_auth)) {
                /* Get Farmer Login ID */
                $farmer_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

                /* Persist Farmer */
                $add_farmer_sql = "INSERT INTO farmers (farmer_login_id, farmer_name, farmer_contacts, farmer_address)
                VALUES('{$farmer_login_id}', '{$farmer_name}', '{$farmer_contacts}', '{$farmer_address}')";

                if (mysqli_query($mysqli, $add_farmer_sql)) {
                    $success = "Account Created";
                } else {
                    $err = "Failed, please try again";
                }
            } else {
                $err = "Please try again";
            }
        }
    }
}

/* Update Farmer */
if (isset($_POST['Update_Farmer'])) {
    $farmer_name = mysqli_real_escape_string($mysqli, $_POST['farmer_name']);
    $farmer_contacts = mysqli_real_escape_string($mysqli, $_POST['farmer_contacts']);
    $farmer_address = mysqli_real_escape_string($mysqli, $_POST['farmer_address']);
    $login_email = mysqli_real_escape_string($mysqli, $_POST['login_email']);
    $login_id = mysqli_real_escape_string($mysqli, $_POST['farmer_login_id']);

    /* Update */
    $update_sql = "UPDATE farmers SET farmer_name = '{$farmer_name}', farmer_contacts = '{$farmer_contacts}',
    farmer_address = '{$farmer_address}' WHERE farmer_login_id = '{$login_id}'";
    $update_auth = "UPDATE login SET login_email = '{$login_email}' WHERE login_id  = '{$login_id}'";

    if (mysqli_query($mysqli, $update_sql) && mysqli_query($mysqli, $update_auth)) {
        $success = "Account updated";
    } else {
        $err = "Failed, please try again";
    }
}


/* ************************************************************************************ */

/* Add Service Provider */
if (isset($_POST['Add_Service_Provider'])) {
    $service_provider_name = mysqli_real_escape_string($mysqli, $_POST['service_provider_name']);
    $service_provider_contacts = mysqli_real_escape_string($mysqli, $_POST['service_provider_contacts']);
    $service_provider_address = mysqli_real_escape_string($mysqli, $_POST['service_provider_address']);
    $login_email = mysqli_real_escape_string($mysqli, $_POST['login_email']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));
    $login_rank = mysqli_real_escape_string($mysqli, 'Service Provider');

    /* Check Passwords */
    if ($confirm_password != $new_password) {
        $err = "Passwords does not match";
    } else {

        /* Prevent Duplications */
        $duplication_checker = "SELECT * FROM login WHERE login_email = '{$login_email}'";
        $res = mysqli_query($mysqli, $duplication_checker);
        if (mysqli_num_rows($res) > 0) {
            $err = "An account with this email already exists";
        } else {
            /* Persist */
            $add_provider_auth = "INSERT INTO login (login_email, login_password, login_rank)
            VALUES('{$login_email}', '{$confirm_password}', '{$login_rank}')";

            if (mysqli_query($mysqli, $add_provider_auth)) {
                /* Get Farmer Login ID */
                $service_provider_login_id = mysqli_real_escape_string($mysqli, mysqli_insert_id($mysqli));

                /* Persist Farmer */
                $add_provider_sql = "INSERT INTO ploughing_service_providers (service_provider_login_id, service_provider_name, service_provider_contacts, service_provider_address)
                VALUES('{$service_provider_login_id}', '{$service_provider_name}', '{$service_provider_contacts}', '{$service_provider_address}')";

                if (mysqli_query($mysqli, $add_provider_sql)) {
                    $success = "Account Created Successfully";
                } else {
                    $err = "Failed, please try again";
                }
            } else {
                $err = "Please try again";
            }
        }
    }
}


/* Update Service Provers  */
if (isset($_POST['Update_Service_Provider'])) {
    $service_provider_name = mysqli_real_escape_string($mysqli, $_POST['service_provider_name']);
    $service_provider_contacts = mysqli_real_escape_string($mysqli, $_POST['service_provider_contacts']);
    $service_provider_address = mysqli_real_escape_string($mysqli, $_POST['service_provider_address']);
    $login_email = mysqli_real_escape_string($mysqli, $_POST['login_email']);
    $service_provider_login_id = mysqli_real_escape_string($mysqli, $_POST['service_provider_login_id']);

    /* Update */
    $update_sql = "UPDATE ploughing_service_providers SET
    service_provider_name = '{$service_provider_name}', service_provider_contacts = '{$service_provider_contacts}',
    service_provider_address = '{$service_provider_address}' WHERE service_provider_login_id = '{$service_provider_login_id}'";

    $update_auth = "UPDATE login SET login_email = '{$login_email}' WHERE login_id = '{$service_provider_login_id}'";

    if (mysqli_query($mysqli, $update_sql) && mysqli_query($mysqli, $update_auth)) {
        $success = "Account Updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Passwords Details */
if (isset($_POST['Update_Auth_Details'])) {
    $login_id = mysqli_real_escape_string($mysqli, $_SESSION['login_id']);
    $login_email = mysqli_real_escape_string($mysqli, $_POST['login_email']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Check If Passwords Match */
    if ($confirm_password != $new_password) {
        $err = "Please enter matching passwords";
    } else {
        /* Change Passwords */
        $update_auth = "UPDATE login SET login_email = '{$login_email}', login_password = '{$confirm_password}'
        WHERE login_id = '{$login_id}'";

        if (mysqli_query($mysqli, $update_auth)) {
            $success = "Passwords updated";
        } else {
            $err =  "Failed, please try again";
        }
    }
}


/* Delete User */
if (isset($_POST['Delete_User'])) {
    $login_id = mysqli_real_escape_string($mysqli, $_POST['login_id']);

    /* Delete */
    $delete_sql = "DELETE FROM login WHERE login_id = '{$login_id}'";

    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Account Deleted";
    }
}
