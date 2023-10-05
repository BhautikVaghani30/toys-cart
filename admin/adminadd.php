<?php
session_start();
if (!isset($_SESSION['admin_id'])) {

    header("location: http://localhost/toys-cart/admin/loginadmin.php");
}
$con = mysqli_connect("localhost", "root", "", "ecoomerce");
if ($con) {
    echo "connection ok";
} else {

    echo "connect failed";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin -OM Toys</title>
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <?php
        require 'saidPath.php';
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>


                <div class="navbar-nav align-items-center ms-auto">



                    <div class="nav-item ">
                        <a href="#" class="nav-link ">
                            <img class="rounded-circle me-lg-2" src="img/AVATAR.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['admin_name']; ?></span>
                        </a>

                    </div>
                </div>
            </nav>
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">


                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add New Staff</h6>
                            <form action="adminadd.php" method="POST" enctype="multipart/form-data">

                                <div class="row mb-3">
                                    <label for="aname" class="col-sm-2 col-form-label">Staff Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="adminname" class="form-control" id="pname">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="password" class="form-control" id="password">
                                    </div>
                                </div>

                                <input type="submit" value="submit" name="submit" class="btn btn-primary">
                            </form>
                            <?php

                            if (isset($_POST['submit'])) {



                                $admin = $_POST['adminname'];
                                $email = $_POST['email'];
                                $pwd = $_POST['password'];

                                if ($admin && $email && $pwd) {
                                    $sql = "insert into admin (`admin_name`,`email_id`,`pwd`) values ('" . $admin . "','" . $email . "','" . $pwd . "')";
                                    // echo $sql;
                                    // die;
                                    $result = mysqli_query($con, $sql);
                                    if (!$result) {
                                        echo mysqli_error($con);
                                    } else {
                                        echo "sucessfully inserted";
                                    }
                                } else {
                                    echo "enter valid data";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Footer End -->

            </div>
            <!-- Sale & Revenue End -->



            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">


                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Remove Staff</h6>
                            <form action="adminadd.php" method="POST" enctype="multipart/form-data">

                                <div class="row mb-3">
                                    <label for="aname" class="col-sm-2 col-form-label">Staff Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="adminR" class="form-control" id="pname">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="emailR" class="form-control" id="email">
                                    </div>
                                </div>


                                <input type="submit" value="Remove" name="Remove" class="btn btn-danger">
                            </form>
                            <?php

                            if (isset($_POST['Remove'])) {
                                $admin = $_POST['adminR'];
                                $email = $_POST['emailR'];

                                $sql = "select * from admin where admin_name='$admin'";
                                $r = mysqli_query($con, $sql);
                                //    $row = mysqli_fetch_assoc($r);
                                if (mysqli_num_rows($r) == 1) {
                                    $sql = "DELETE FROM `admin` WHERE admin_name = '$admin'";
                                    $result = mysqli_query($con, $sql);
                                    if ($result) {
                                        echo "Successfully Removed";
                                    } else {
                                        echo mysqli_error($con);
                                    }
                                } else {
                                    echo "User Does Not Exist";
                                }
                            }






                            ?>
                        </div>
                    </div>


                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4"> Om_Toys_Admin_Staff </h6>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Admin_Id</th>
                                        <th scope="col">Admin_Name</th>
                                        <th scope="col">Email_Id</th>
                                        <th scope="col">password</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $x = "select * from admin";
                                    $xy = mysqli_query($con, $x);
                                    //  print_r(mysqli_num_rows($pq));
                                    if (mysqli_num_rows($xy) > 0) {
                                        while ($row = mysqli_fetch_assoc($xy)) {
                                            // print_r($row);

                                    ?>
                                            <tr>
                                                <th scope="row"><?= $row['admin_id'] ?></th>
                                                <th scope="row"><?= $row['admin_name'] ?></th>
                                                <th scope="row"><?= $row['email_id'] ?></th>
                                                <th scope="row"><?= $row['pwd'] ?></th>


                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- Footer End -->

            </div>


        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->

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

?>