<?php
require 'auto_load.php';
session_start();
session_unset();
session_destroy();

// Evita cache do navegador
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

// Redireciona para login
header('Location: index.php');
exit;

?>