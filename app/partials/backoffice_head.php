<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AUTOMATED PLOUGHING SYSTEM</title>
    <link rel="shortcut icon" type="image/png" href="../public/backoffice/images/logos/favicon.png" />
    <link rel="stylesheet" href="../public/backoffice/css/styles.min.css" />
    <!-- Sweet Alerts -->
    <link href="../public/backoffice/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Data Tables CDN-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" />
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