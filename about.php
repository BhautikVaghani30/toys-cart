<?php
session_start();
if (!isset($_SESSION['user_id'])) {

    header("location: http://localhost/toys-cart/login.php");
}
$con = mysqli_connect("localhost", "root", "", "ecoomerce");
if ($con) {
} else {
    echo "error" . mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="./style.css">
    <style>
        .desc {
            /* border: 2px solid black; */
            height: 300px;
        }
    </style>
</head>

<body>

    <!-- header -->
    <section class="header">
        <a href="home.php" class="logo"><span>OM TOYS</span></a>

        <nav class="navbar" style=" display: flex; align-items: center;">
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
    <div class="heading">
        <img src="./img/about_img.webp" width="100%" alt="">
    </div>
    <!-- about section -->
    <section class="about">

        <div class="content">
            <h3>Why Choose Us ?</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur porro laudantium non eveniet repudiandae rem perferendis reprehenderit accusamus, necessitatibus ea expedita ad error modi sequi ipsam cum numquam illo excepturi!</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, error culpa unde natus soluta hic doloremque qui laboriosam.</p>
            <div class="icon-container">
                <div class="icons">
                    <i class="fas fa-map"></i>
                    <span>Top Quality</span>
                </div>
                <div class="icons">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>Affordable Price</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 Guide Service</span>
                </div>
            </div>
        </div>
    </section>
    <!-- reviews -->
    <section class="reviews">
        <h1 class="heading-title">CUSTOMERS REVIEWS</h1>
        <div class="swiper reviews-slider">
            <div class="swiper-wrapper" style="width: 40px;
    height: 500px;">

                <?php
                

                $sql = "SELECT * FROM `feedbacks`;";
                $result = mysqli_query($con, $sql);
                if ($result) {


                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                            <div class="swiper-slide slide">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="desc">

                                    <p><?php echo $row['F_desc']; ?></p>
                                </div>
                                <h3><?php echo $row['username']; ?></h3>
                                <div class="botnum">

                                    <img src="./feedimg/f2.jpg" alt="">
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>







            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </section>
    <div>
        <center><button class="btn btn primary"><a href="feedback.php">Feedback</a></button></center>
    </div><br>
    <!-- footer -->

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
        <!-- javascript -->
        <script src="./script.js"></script>
</body>

</html>