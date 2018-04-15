<?php
session_start() ;
session_destroy();
$_SESSION=[];
unset($_SESSION);
header ("Location: index.php");
die;
?>
