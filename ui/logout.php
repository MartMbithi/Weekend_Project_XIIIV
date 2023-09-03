<?php
/* End Session */
session_start();
unset($_SESSION['login_id']);
unset($_SESSION['login_rank']);
session_destroy();
header("Location: ../");
exit;
