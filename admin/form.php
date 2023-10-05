<?php
session_start();
 
$con = mysqli_connect("localhost","root","","ecoomerce");
if($con){
    // echo "sucess";
}
else{
    echo "error".mysqli_connect_error();
}
// product delete
if (isset($_GET['delete'])) {
    $q = "DELETE FROM product WHERE prod_id = {$_GET['delete']}";
    echo $q;
    $rq = mysqli_query($con,$q);
    header("location:http://localhost/toys-cart/admin/index.php");
}

// feedback delete
if (isset($_GET['fid'])) {
    $q = "DELETE FROM feedbacks WHERE fid = {$_GET['fid']}";
    // echo $q;
    $rq = mysqli_query($con,$q);
    header("location:http://localhost/toys-cart/admin/feedback.php");
}

// user delete
if (isset($_GET['uid'])) {
    $q = "DELETE FROM users WHERE user_id = {$_GET['uid']}";
    // echo $q;
    $rq = mysqli_query($con,$q);
    header("location:http://localhost/toys-cart/admin/user.php");
}


if (isset($_GET['oid'])) {
    $q = "UPDATE `order` SET `order_status`='' WHERE 1= {$_GET['oid']}";
    // echo $q;
    $rq = mysqli_query($con,$q);
    header("location:http://localhost/toys-cart/admin/user.php");
}
