<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bakery Management System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $base_dir; ?>../public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $base_dir; ?>../public/css/adminlte.min.css">
 <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700" rel="stylesheet">    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?php echo $base_dir; ?>../public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo $base_dir; ?>../public/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo $base_dir; ?>../public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Sweet Alerts -->
    <link rel="stylesheet" href="<?php echo $base_dir; ?>../public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo $base_dir; ?>../public/plugins/toastr/toastr.min.css">
    <!-- Data tables Buttons -->
    <link rel="stylesheet" href="<?php echo $base_dir; ?>../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $base_dir; ?>../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $base_dir; ?>../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <?php
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['err'])) {
        $err = $_SESSION['err'];
        unset($_SESSION['err']);
    }
    ?>
</head>