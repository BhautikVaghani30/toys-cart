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

$q = "select * from product";
$rq = mysqli_query($con, $q);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <style>
        .img {
            width: 50px;
        }
    </style>
</head>

<body>

    <!-- header -->
    <section class="header">
        <a href="home.php" class="logo"><span>OM TOYS</span></a>
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
    <!-- home section -->
    <section class="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide" style="background:url(./img/carousal2.jpg) no-repeat">
                    <div class="content">
                        <span>Explore , Enjoy , Play</span>
                        <h3>Explore Unique Latest Toy</h3>
                        <a href="product.php" class="btn">Buy Now!</a>
                    </div>
                </div>
                <div class="swiper-slide slide" style="background:url(./img/carosal1.jpg) no-repeat">
                    <div class="content">
                        <span>Play , solve puzzle</span>
                        <h3>Unique Puzzle Games</h3>
                        <a href="product.php" class="btn">Buy Now!</a>
                    </div>
                </div>
                <div class="swiper-slide slide" style="background:url(./img/carousa3.jpg) no-repeat">
                    <div class="content">
                        <span>Play and Fun with Toy</span>
                        <h3>Unnique Electric Toy</h3>
                        <a href="product.php" class="btn">Buy Now!</a>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- home about section -->
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
    <!-- home package -->
    <section class="home-packages">
        <h1 class="heading-title"> Our Product </h1>
        <div class="box-container">
            <?php
            // print_r(mysqli_num_rows($rq));
            if (mysqli_num_rows($rq) > 0) {
                while ($row = mysqli_fetch_assoc($rq)) {
                    // print_r($row);

            ?>
                    <div class="box shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="image">

                            <img class="img" src="admin/storeimages/<?php echo $row['picture']; ?>" alt="product image">
                            <!-- <img src="./img/product1.jpg" alt=""> -->
                        </div>
                        <div class="content">

                            <h3><?= $row['item'] ?></h3>
                            <p><?= $row['desc'] ?></p>

                            <h2><?= '₹' . number_format($row['price'], 2, '.', ','); ?></h2>

                            <form action="http://localhost/toys-cart/create_order.php?product_id=<?php echo $row['prod_id'] ?>" method="POST">

                                <label for="quantity">Quantity:</label>
                                <input type="number" id="que" min="1" name="qu" value="1" class="form-control m-auto text-center w-25 py-2">

                                <a href="javascript:void(0)" class="btn">
                                    <button type="submit" class="btn m-0 p-0">Book Now</button>
                                </a>


                            </form>


                        </div>
                    </div>

            <?php
                }
            }
            ?>

        </div>
    </section>
    <div class="load-more">
        <center><a href="product.php" class="btn">Load More</a></center>
    </div>
    <br>



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
    </section>
    <!-- swiper js script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- javascript -->
    <script src="./script.js"></script>
</body>

</html>