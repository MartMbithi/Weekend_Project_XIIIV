<?php
/* Register Your Application Logic Here */
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
/* Redirect To Index Under Views */
header('Location: ' . $uri . '/bms/landing/');
exit;
