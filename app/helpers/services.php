<?php
/*
 *   Crafted On Wed May 17 2023
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

/* Add Service */
if (isset($_POST['Add_Service'])) {
    $request_famer_id = mysqli_real_escape_string($mysqli, $_POST['request_famer_id']);
    $request_service_provider_id = mysqli_real_escape_string($mysqli, $_POST['request_service_provider_id']);
    $request_location =  mysqli_real_escape_string($mysqli, $_POST['request_location']);
    $request_farm_size = mysqli_real_escape_string($mysqli, $_POST['request_farm_size']);
    $request_date = mysqli_real_escape_string($mysqli, $_POST['request_date']);
    $request_payment_status = mysqli_real_escape_string($mysqli, 'Pending');
    $request_cost = mysqli_real_escape_string($mysqli, $_POST['request_cost']);

    /* Add Services */
    $add_sql = "INSERT INTO ploughing_service_request (request_famer_id, request_service_provider_id, request_location, request_farm_size,
    request_date, request_payment_status, request_cost) VALUES('{$request_famer_id}', '{$request_service_provider_id}', '{$request_location}', '{$request_farm_size}',
    '{$request_date}', '{$request_payment_status}', '{$request_cost}')";

    if (mysqli_query($mysqli, $add_sql)) {
        $success = "Ploughing service request submitted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Service */
if (isset($_POST['Update_Service'])) {
    $request_id = mysqli_real_escape_string($mysqli, $_POST['request_id']);
    $request_location =  mysqli_real_escape_string($mysqli, $_POST['request_location']);
    $request_farm_size = mysqli_real_escape_string($mysqli, $_POST['request_farm_size']);
    $request_date = mysqli_real_escape_string($mysqli, $_POST['request_date']);
    $request_cost = mysqli_real_escape_string($mysqli, $_POST['request_cost']);

    /* Update */
    $update_sql = "UPDATE ploughing_service_request SET request_location = '{$request_location}', request_farm_size = '{$request_farm_size}', request_date = '{$request_date}',
    request_cost = '{$request_cost}' WHERE request_id = '{$request_id}'";

    if (mysqli_query($mysqli, $update_sql)) {
        $success = "Ploughing service request updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Service */
if (isset($_POST['Delete_Service'])) {
    $request_id = mysqli_real_escape_string($mysqli, $_POST['request_id']);

    /* Delete */
    $delete_sql = "DELETE FROM ploughing_service_request WHERE request_id = '{$request_id}'";
    if (mysqli_query($mysqli, $delete_sql)) {
        $success = "Ploughing service request deleted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Pay Service */
if (isset($_POST['Pay_Service'])) {
    $payment_request_id = mysqli_real_escape_string($mysqli, $_POST['payment_request_id']);
    $payment_amount = mysqli_real_escape_string($mysqli, $_POST['payment_amount']);
    $payment_ref_code = mysqli_real_escape_string($mysqli, $_POST['payment_ref_code']);
    $payment_means = mysqli_real_escape_string($mysqli, $_POST['payment_means']);
    $request_payment_status = mysqli_real_escape_string($mysqli, 'Paid');


    /* Post Payment */
    $add_payment = "INSERT INTO payments (payment_request_id, payment_amount, payment_ref_code, payment_means)
    VALUES('{$payment_request_id}', '{$payment_amount}', '{$payment_ref_code}', '{$payment_means}')";
    $update_request_sql = "UPDATE ploughing_service_request SET request_payment_status = '{$request_payment_status}'
    WHERE  request_id = '{$payment_request_id}'";

    if (mysqli_query($mysqli, $add_payment) && mysqli_query($mysqli, $update_request_sql)) {
        $success = "Ploughing service paid";
    } else {
        $err = "Failed, please try again";
    }
}


/* Delete Service */
if (isset($_POST['Delete_Payment'])) {
    $payment_id = mysqli_real_escape_string($mysqli, $_POST['payment_id']);
    $payment_request_id = mysqli_real_escape_string($mysqli, $_POST['payment_request_id']);

    /* Delete */
    $delete_sql = "DELETE FROM payments WHERE payment_id = '{$payment_id}'";
    $update_sql = "UPDATE ploughing_service_request SET request_payment_status = 'Pending'
    WHERE request_id = '{$payment_request_id}'";

    if (mysqli_query($mysqli, $delete_sql) && mysqli_query($mysqli, $update_sql)) {
        $success = "Payment deleted";
    } else {
        $err =  "Failed, please try again";
    }
}
