<?php
session_start();
if (!isset($_SESSION['user_id'])) {

    header("location: http://localhost/toys-cart/login.php");
}

$con = mysqli_connect("localhost", "root", "", "ecoomerce");
if ($con) {
    // echo"sucess";

} else {
    echo "error" . mysqli_connect_error();
}
$uid = $_SESSION['user_id'];
$q = "select * from `order` where `user_id` = '$uid'";
$rq = mysqli_query($con, $q);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <!-- swiper css -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" /> -->
    <!-- font -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <!-- <link rel="stylesheet" href="./bootstrap.css"> -->
    <style>
        table {
            margin-top: 20px;
            width: 100%;
            font-size: large;
        }

        table tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>

    <!-- header -->
    <section class="header">
        <a href="home.php" class="logo"><span>OM TOYS</span> </a>
        <nav class="navbar">
            <a href="home.php">On Sale</a>
            <a href="about.php">About</a>

            <a href="product.php">Product</a>
            <?php
            if (!empty($_SESSION['user_id'])) { ?>

                <a href="cart.php">Payment</a>
                <a href="myorders.php">MyOrder</a>
                <a href="logout.php">Log out</a>
                <div style=" display: flex; justify-content: center; align-items: center;">
                    <img class="rounded-circle" width="20px" style="border:2px solid black; display:inline; margin-left:20px; border-radius:60px;" src="./img/AVATAR.png" alt="user logo">
                    <p style=" color:#d7de19;  font-size:medium;margin:5px; font-weight:bold;"><?php echo $_SESSION['user_name']; ?></p>
                </div>
            <?php } else { ?>

                <a href="login.php">Login</a>
            <?php } ?>

        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>



    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">picture</th>
                    <th scope="col">Product_Name</th>
                    <th scope="col">Que</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Bill</th>
                    <th scope="col">Date&Time</th>
                    <th scope="col">Order Status</th>
                </tr>
            </thead>
            <tbody>


                <?php
                // print_r(mysqli_num_rows($rq));
                if (mysqli_num_rows($rq) >= 0) {
                    while ($row = mysqli_fetch_assoc($rq)) {


                ?>
                        <tr>
                            <td><img src="./admin/prod_img/<?= $row['picture'] ?>" width="60px" alt="not found"></td>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['que']; ?></td>
                            <td>₹<?php echo $row['amount']; ?></td>
                            <td>₹<?php echo $row['total_amount']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td style="color:<?php if ($row['order_status'] == 'Confirm') {
                                                    echo 'green';
                                                } else {
                                                    echo 'red';
                                                } ?>;"><?php echo $row['order_status']; ?></td>





                        </tr>
                <?php
                    }
                } else {
                    echo "<h3>No Orders</h3>";
                    echo '<a href="product.php" class="btn btn-primary">Go Shoping</a>';
                }
                ?>








            </tbody>
        </table>


    </div>


    <!-- footer -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="home.php"><i class="fas fa-angle-right"></i> Home</a>
                <a href="about.php"><i class="fas fa-angle-right"></i> About</a>
                <a href="package.php"><i class="fas fa-angle-right"></i> Package</a>
                <a href="book.php"><i class="fas fa-angle-right"></i> Cart</a>
            </div>
            <div class="box">
                <h3>Extra Links</h3>
                <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
                <a href="#"><i class="fas fa-angle-right"></i> About Company</a>
                <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
                <a href="#"><i class="fas fa-angle-right"></i> Terms</a>
            </div>
            <div class="box">
                <h3>Contact Info</h3>
                <a href="#"><i class="fas fa-phone"></i> +123-456-7890</a>
                <a href="#"><i class="fas fa-phone"></i> +113-556-9990</a>
                <a href="#"><i class="fas fa-envelope"></i> omtoysshop@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> Surat ,India - 395008</a>
            </div>
            <div class="box">
                <h3>Follow Us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i>OM TOYS SHP</a>
                <a href="#"><i class="fab fa-twitter"></i> @OM TOYS</a>
                <a href="#"><i class="fab fa-instagram"></i> @OM_TOYS_2002</a>
                <a href="#"><i class="fab fa-linkedin"></i>OM TOYS SHOP</a>
            </div>
        </div>
        <div class="credit">Created By <span>OM Group</span> | All Rights Reserved !</div>
        <!-- swiper js script -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- javascript -->
        <script src="./script.js"></script>
</body>

</html>