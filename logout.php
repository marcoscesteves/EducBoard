<?php
require 'auto_load.php';
session_unset();
session_destroy();
header('Location: index.php');
?>