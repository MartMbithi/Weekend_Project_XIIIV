<?php
/* End Session */
session_start();
unset($_SESSION['login_id']);
unset($_SESSION['login_access_level']);
session_destroy();
header("Location: ../");
exit;
