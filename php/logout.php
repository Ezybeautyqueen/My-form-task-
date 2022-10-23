<?php
function logOut(){
session_start();
if ($_SESSION){
    session_destroy();
    header("Location: ../index.php");
    echo "you have successfully,logged out";
    exit();
}else{
    header("Location:../index.php?error= Your are currently not logged in");
}
   logOut();
}