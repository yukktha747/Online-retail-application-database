<?php

session_start();
if(isset($_SESSION['username'])){
echo "Welcome ".$_SESSION['username'];
echo "And your password is ".$_SESSION['password'];
echo "And your email is ".$_SESSION['email'];
}else{
    echo "Please login to continue";
}
?>
