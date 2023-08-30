<?php

function check_login()
{
	if ((strlen($_SESSION['login_id']) == 0) || strlen($_SESSION['login_rank']) == 0) {
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "../";
		$_SESSION["login_id"] = "";
		$_SESSION['login_rank'] = "";
		header("Location: http://$host$uri/$extra");
	}
}

/* Invoke IT */
check_login();
