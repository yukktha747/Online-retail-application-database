<?php

session_start();
session_unset();
session_destroy();
echo "<script>window.open('../retail.php','_self')</script>";
?>