<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "ecoomerce");
if ($con) {
} else {
    echo "error" . mysqli_connect_error();
}


//run sql query to get single login userData

//GET (any)id form the url
//example -http://localhost/toys-cart/order.php?product_id=1
// echo $_GET['product_id'];
if (isset($_GET['product_id']) && $_SESSION['user_id']) {
    //run sql query to get product information of product id


    // echo $user_id;
    $user_id = $_SESSION['user_id'];

    // get user data which is buy a products
    $q1 = "select user_name,addres from users where user_id='$user_id' limit 1";
    $rq1 = mysqli_query($con, $q1);


    // get user details
    $user = mysqli_fetch_assoc($rq1);

    //  set user details in valiables
    $user_name = $user["user_name"];
    $address = $user["addres"];



    // echo $prod_id;
    $prod_id = $_GET['product_id'];

    // get product data which is user want to buy
    $q = "select * from product where prod_id=$prod_id limit 1";
    $rq = mysqli_query($con, $q);

    // get product details
    $product = mysqli_fetch_assoc($rq);

    // stor product details in variables
    $item = $product["item"];
    $desc = $product["desc"];
    $picture = $product["picture"];
    $price = $product["price"];




    if (isset($_POST['qu'])) {
        $quantity = $_POST['qu'];
    }
    $totalAmount = $price * $quantity;

    $make_order = "insert into `cart`(`user_id`, `product_id`, `item_name`, `picture`, `amount`, `que`, `total_amount`) values($user_id,$prod_id,'$item','$picture','$price','$quantity','$totalAmount')";
    // echo $make_order;
    $place_order = mysqli_query($con, $make_order);
    if ($place_order) {
        header("Location: http://localhost/toys-cart/home.php");
    } else {
        echo "unable to add order";
    }
} else {
    header("location: http://localhost/toys-cart/home.php");
}
