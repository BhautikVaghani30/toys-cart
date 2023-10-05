<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "ecoomerce");
if ($con) {
    // echo "sucess";
} else {
    echo "error" . mysqli_connect_error();
}
if (isset($_GET['delete'])) {
    $cid = $_GET['delete'];
    $q = "DELETE FROM `cart` WHERE cart__id = '$cid'";
    echo $q;
    $rq = mysqli_query($con, $q);
    if ($rq) {

        header("location:http://localhost/toys-cart/cart.php");
    }
}
