<?php
include 'config.php';
?>
<?php
session_start();
session_unset();
session_destroy();
header("location:$hostname/admin/");
?>
