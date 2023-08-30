<?php

$login_id = mysqli_real_escape_string($mysqli, $_SESSION['login_id']);
$login_rank = mysqli_real_escape_string($mysqli, $_SESSION['login_rank']);

if ($login_rank == 'Admin' || $login_rank == 'Staff') {
    /* High Level Analytics */
} else {
    /* Customer Analytics */
}
