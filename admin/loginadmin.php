<?php
// Replace these values with your actual database credentials


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OM TOYS- Admin Log in</title>
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
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">


</head>

<body>
    <div class="container-xxl position-relative bg-warning d-flex p-0 bogo">


        <!-- Sign In Start -->
        <div class="container-fluid ">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3 shadow-lg p-3 mb-5 bg-body rounded" style="border:1px solid white;border-radius:30px;">
                        <div class="d-flex align-items-center justify-content-between mb-3" style="border-bottom: 2px solid orange;">

                            <h3 class="text-dark">Admin</h3>

                            <h3 class="text-dark">Log in</h3>
                        </div>
                        <form action="loginadmin.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" placeholder="enter email" name="email">
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password" placeholder=" enter Password" name="pwd">
                                <label for="password">Password</label>
                            </div>

                            <button type="submit" id="login" style="background-color:white; border:2px solid orange;" class="btn btn-light py-3 w-100 mb-4" name="submit">Log in</button>

                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $con = mysqli_connect("localhost", "root", "", "ecoomerce");
                            if ($con) {
                                echo "sucess";
                            } else {
                                echo "error" . mysqli_connect_error();
                            }
                            $email = $_POST['email'];
                            $pwd = $_POST['pwd'];
                            $sql = "SELECT admin_id , admin_name FROM admin WHERE email_id='{$email}' AND pwd='{$pwd}'";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    session_start();
                                    $_SESSION["u_id"] = $row['admin_id'];
                                    $_SESSION["admin_id"] = $row['admin_id'];
                                    $_SESSION["admin_name"] = $row['admin_name'];

                                    header("location: http://localhost/toys-cart/admin/index.php");
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