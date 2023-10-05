<?php
// Replace these values with your actual database credentials


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OM TOYS- Log in</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./admin/css/style.css" rel="stylesheet">
    <style>
        body {
            background: url(../images/footerbg.jpg);
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="container-xxl position-relative bg-warning d-flex p-0">


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3 shadow-lg p-3 mb-5 bg-body rounded" style="border:1px solid white;border-radius:30px;">
                        <div class="d-flex align-items-center justify-content-between mb-3" style="border-bottom: 2px solid orange;">
                            <a href="index.html" class="">
                                <h3 class="text-dark">OM TOYS</h3>
                            </a>
                            <h3 class="text-dark">Log in</h3>
                        </div>
                        <form action="login.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" placeholder="enter email" name="email">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password" placeholder=" enter Password" name="password">
                                <label for="password">Password</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Agree with term</label>
                                </div>
                                <!-- <a href="">Forgot Password</a> -->
                            </div>
                            <button type="submit" name="login" id="name" class="btn btn-light border-warning py-3 w-100 mb-4" style="background-color:white; border:2px solid orange;" name="login">Log in</button>
                            <p class="text-center mb-0">Don't have an Account? <a href="user_form.php">Sign Up</a></p>
                        </form>
                        <?php
                        if (isset($_POST['login'])) {
                            $con = mysqli_connect("localhost", "root", "", "ecoomerce");
                            if ($con) {
                                //echo "sucess";

                            } else {
                                echo "error" . mysqli_connect_error();
                            }
                            $email = $_POST['email'];
                            $pwd = $_POST['password'];
                            $sql = "SELECT user_id, user_name , addres FROM users WHERE email='{$email}' AND pwd='{$pwd}'";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    session_start();
                                    $_SESSION["user_id"] = $row['user_id'];
                                    $_SESSION["user_name"] = $row['user_name'];
                                    $_SESSION["addres"] = $row['addres'];
                                    header("location: http://localhost/toys-cart/home.php");
                                }
                            } else {
                                echo "<div style='color:red; text-align:center;'>Email and Password are not Match</div> ";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>