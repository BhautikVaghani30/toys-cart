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

$q = "select * from `cart` where user_id= {$_SESSION['user_id']};";

$rq = mysqli_query($con, $q);
$payment = false;
$order_address = false;
$order = false;
if (mysqli_num_rows($rq) > 0) {



    // order payment

    if (isset($_POST['submit'])) {
        $cardname = $_POST['cardname'];
        $cardnumber = $_POST['cardnumber'];
        $expmonth = $_POST['expmonth'];
        $expyear = $_POST['expyear'];
        $cvv = $_POST['cvv'];
        $u_id = $_SESSION['user_id'];


        $sql = "INSERT INTO `payment` (`name_onc_card`, `credit_card_number`, `exp_month`, `exp_year`, `cvv`, `user_id`) VALUES ('$cardname', '$cardnumber', '$expmonth', '$expyear', '$cvv', '$u_id');";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $payment = true;
        } else {
            echo " not insert";
        }
    }

    // User address

    if (isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $u_id = $_SESSION['user_id'];

        $sql = "INSERT INTO `order_address` ( `fullname`, `email`, `address`, `city`, `state`, `zip`, `user_id`) VALUES ('$firstname', '$email', '$address', '$city', '$state', '$zip', '$u_id')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $order_address = true;
        } else {
            echo " not insert";
        }
    }


    // order table

    $q = "select * from `cart` where user_id= {$_SESSION['user_id']};";
    $rq = mysqli_query($con, $q);
    if ($rq) {
        if (mysqli_num_rows($rq) > 0) {
            if (isset($_POST['submit'])) {
                // echo $item_name;
                // $q = "select * from `payment` where user_id= {$_SESSION['user_id']}";
                // $rq = mysqli_query($con, $q);
                // $row = mysqli_fetch_assoc($rq);
                // $pid = $row['pay_id'];
                while ($row = mysqli_fetch_assoc($rq)) {
                    $uid = $row['user_id'];
                    $pid = $row['product_id'];
                    $item_name = $row['item_name'];
                    $picture = $row['picture'];
                    $amount = $row['amount'];
                    $que = $row['que'];
                    $total_amount = $row['total_amount'];
                    $u_id = $_SESSION['user_id'];



                    $sql = "INSERT INTO `order` (`user_id`, `product_id`, `item_name`, `picture`, `amount`, `total_amount`, `que`) VALUES ('$uid', '$pid', '$item_name', '$picture', '$amount', '$total_amount', '$que')";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        $order = true;
                        mysqli_query($con, "DELETE FROM `cart` WHERE user_id='$u_id'") or die('query failed');
                    } else {
                        echo " not success";
                    }
                }
            }
        }
    }
} else {
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./payment.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>


<body>



    <div class="row">






        <div class="col-25">
            <?php



            ?>

            <div class="container">

                <?php
                $total = 0;
                if (mysqli_num_rows($rq) > 0) {
                ?>

                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Que</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Total_Amount</th>

                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            while ($row = mysqli_fetch_assoc($rq)) {
                                $total_amount = $row['que'] * $row['amount'];
                                $total += $total_amount;

                            ?>



                                <tr>

                                    <td><img src="admin/storeimages/<?php echo $row['picture']; ?>" width="60px" alt="this is images"></td>
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['que']; ?></td>
                                    <td><?php echo $row['amount']; ?></td>

                                    <td><?php echo $total_amount ?></td>
                                    <td><a href="delete.php?delete=<?= $row['cart__id'] ?>" class="btn btn-danger">Delete</a></td>
                                </tr>



                        <?php

                            }
                        } else {
                            echo "<div class='heading'>
                                        <h1>Cart Empty</h1>
                                    </div>";
                        }
                        if ($order == true && $payment == true && $order_address == true) {

                            echo '<div class="heading">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Done!</strong> your Order successfully Excepted.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    </div>';
                        }
                        ?>
                        <tr>
                            <td><strong>
                                    <bold>Total Bill </bold>
                                </strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $total; ?></td>
                            <td><a href="product.php" class="btn  btn-primary">Go Shoping</a></td>
                        </tr>
                        </tbody>
                    </table>


            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-75">
            <div class="container">
                <form action="" id="myForm" method="post" onsubmit="return validateForm()">

                    <div class="row">
                        <div class="col-50">

                            <h3>Billing Address</h3>

                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                            <span id="fnameErr" style="color:red;"></span><br>

                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com">
                            <span id="emailErr" style="color:red;"></span><br>

                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                            <span id="adrErr" style="color:red;"></span><br>

                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York">
                            <span id="cityErr" style="color:red;"></span><br>

                            <div class="row">

                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY">
                                    <span id="stateErr" style="color:red;"></span><br>
                                </div>

                                <div class="col-50">
                                    <label for="zip">Pincode</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001">
                                    <span id="zipErr" style="color:red;"></span><br>
                                </div>

                            </div>

                        </div>

                        <?php





                        ?>



                        <!-- payment method -->



                        <div class="col-50">

                            <h3>Payment</h3>

                            <label for="fname">Accepted Cards</label>

                            <div class="icon-container">

                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>

                            </div>

                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                            <span id="cnameErr" style="color:red;"></span><br>

                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <span id="ccnumErr" style="color:red;"></span><br>

                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">
                            <span id="expmonthErr" style="color:red;"></span><br>

                            <div class="row">

                                <div class="col-50">

                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                                    <span id="expyearErr" style="color:red;"></span><br>

                                </div>
                                <div class="col-50">

                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                    <span id="cvvErr" style="color:red;"></span><br>

                                </div>
                            </div>
                        </div>

                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <input type="submit" value="Continue to checkout" name="submit" class="btn">
                </form>





                <script>
                    function validateForm() {
                        var fname = document.getElementById('fname').value;
                        var email = document.getElementById('email').value;
                        var adr = document.getElementById('adr').value;
                        var city = document.getElementById('city').value;
                        var state = document.getElementById('state').value;
                        var zip = document.getElementById('zip').value;
                        var cname = document.getElementById('cname').value;
                        var ccnum = document.getElementById('ccnum').value;
                        var expmonth = document.getElementById('expmonth').value;
                        var expyear = document.getElementById('expyear').value;
                        var cvv = document.getElementById('cvv').value;

                        document.getElementById("fnameErr").textContent = "";
                        document.getElementById("emailErr").textContent = "";
                        document.getElementById("adrErr").textContent = "";
                        document.getElementById("cityErr").textContent = "";
                        document.getElementById("stateErr").textContent = "";
                        document.getElementById("zipErr").textContent = "";
                        document.getElementById("cnameErr").textContent = "";
                        document.getElementById("ccnumErr").textContent = "";
                        document.getElementById("expmonthErr").textContent = "";
                        document.getElementById("expyearErr").textContent = "";
                        document.getElementById("cvvErr").textContent = "";

                        if (fname === "") {
                            document.getElementById("fnameErr").textContent = "Please Enter a Full Name.";
                            return false;
                        }


                        if (email === "" || email.indexOf("@") === -1 || email.indexOf(".") === -1) {
                            document.getElementById("emailErr").textContent = "Please enter a valid email address.";
                            return false;
                        }

                        if (adr === "") {
                            document.getElementById("adrErr").textContent = "Please Enter a Full Name.";
                            return false;
                        }
                        if (city === "") {
                            document.getElementById("cityErr").textContent = "Please Enter a Full Name.";
                            return false;
                        }
                        if (state === "") {
                            document.getElementById("stateErr").textContent = "Please Enter a State";
                            return false;
                        }


                        if (zip.length < 6) {
                            document.getElementById("zipErr").textContent = "zip code must be at least 6 characters long.";
                            return false;
                        }

                        if (cname === "") {
                            document.getElementById("cnameErr").textContent = "Please Enter Card Name.";
                            return false;
                        }
                        if (ccnum === "") {
                            document.getElementById("ccnumErr").textContent = "Please Enter Card number.";
                            return false;
                        }
                        if (expmonth === "") {
                            document.getElementById("expmonthErr").textContent = "Please Enter valid Month";
                            return false;
                        }
                        if (expyear.length <= 4 && xpyear.length >= 4) {
                            document.getElementById("expyearErr").textContent = "Please Enter Valid Year.";
                            return false;
                        }
                        if (cvv === "") {
                            document.getElementById("cvvErr").textContent = "Please Enter cvv.";
                            return false;
                        }

                        return true;
                    }
                </script>


            </div>
        </div>

    </div>



    <!-- footer -->
    <!-- <section class="footer">
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
    </section> -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>