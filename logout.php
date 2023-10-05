<?php
 $con= mysqli_connect("localhost","root","","ecoomerce");
 if($con){
 echo "sucess";

 }
 else{
 echo "error".mysqli_connect_error();
}
session_start();

session_unset();

session_destroy();

header("location: http://localhost/toys-cart/login.php");
